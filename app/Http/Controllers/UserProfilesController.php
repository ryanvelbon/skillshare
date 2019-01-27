<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

use App\User;
use App\UserProfile;

use App\Craft;
use App\Skill;
use App\Topic;
use App\Location;

use DB;

use App\Helpers\Traits\SearchRelevance;

class UserProfilesController extends Controller
{
    use SearchRelevance;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search', 'filteredSearch', 'getHints']]);
    }

    function profileComplete($profile)
    {
        if($profile->date_of_birth === null){
            return false;
        }if($profile->craft_id === null){
            return false;
        }if($profile->location_id === null){
            return false;
        }if($profile->profile_pic == 'user.jpg'){
            return false;
        }if($profile->bio === null){
            return false;
        }

        return true;
    }

    public function index()
    {
        $members = User::all();
        
        $crafts = Craft::all();
        $skills = Skill::all();
        $topics = Topic::all();
        $locations = Location::all();

        return view('profiles.index')
            ->with('members', $members)
            ->with('crafts', $crafts)
            ->with('skills', $skills)
            ->with('topics', $topics)
            ->with('locations', $locations);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //

        // $profile->user_id = Auth::id();
    }

    public function show($id)
    {
        $user = User::with('profile')->findOrFail($id);

        $dob = new \DateTime($user->profile->date_of_birth);
        $today = new \DateTime();
        $age = $today->diff($dob)->y;

        // return view('profiles.show', compact('user'));
        return view('profiles.show')
                    ->with('user', $user)
                    ->with('age', $age);
    }

    public function edit()
    {
        $user = auth()->user();
        $crafts = Craft::all();
        $skills = Skill::all();
        $topics = Topic::all();
        $locations = Location::all();
        return view('profiles.edit')
                    ->with('user', $user)
                    ->with('crafts', $crafts)
                    ->with('skills', $skills)
                    ->with('topics', $topics)
                    ->with('locations', $locations);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();

        $profile = UserProfile::where('user_id', $user->id)->first();

        $profile->date_of_birth = $request->input('bday');

        $profile->craft_id = $request->input('craft');

        $profile->location_id = $request->input('location');

        // save profile pic

        $filename = $user->id.'_profpic'.time().'.'.request()->profile_pic->getClientOriginalExtension();

        Storage::disk('public')->put('profilepics/'.$filename, file_get_contents($request->profile_pic), 'public');

        $profile->profile_pic = $filename;

        $profile->bio = $request->input('bio');

        $profile->complete = $this->profileComplete($profile);

        $profile->save();

        // Update Pivot tables

        $user->interests()->detach();
        $user->skills()->detach();

        // save topics in topic_user pivot table

        $topic_titles = explode(',', $request->input('topics'));

        foreach($topic_titles as $topic_title){
            $user->interests()->attach(Topic::where('title', $topic_title)->first()->id);
        }

        // save skills in skill_user pivot table

        $skill_titles = explode(',', $request->input('skills'));

        foreach($skill_titles as $skill_title){
            $user->skills()->attach(Skill::where('title', $skill_title)->first()->id);
        }

        return redirect('/dashboard')->with('success', 'Your Profile has been Updated.');
    }

    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('search_query');

        $members = User::where('username', 'LIKE', "%".$query."%")->get();

        // BUG: Not DRY!
        $crafts = Craft::all();
        $skills = Skill::all();
        $topics = Topic::all();
        $locations = Location::all();

        return view('profiles.index')
                    ->with('members', $members)
                    ->with('crafts', $crafts)
                    ->with('skills', $skills)
                    ->with('topics', $topics)
                    ->with('locations', $locations);
    }

    public function filteredSearch(Request $request)
    {
        $tagsGiven = $request->input('topics') || $request->input('skills');
               
        $location = $request->input('location');
        if($location == "any"){ $location = null; }

        $craft = $request->input('craft');
        if($craft == "any"){ $craft = null; }


        $profiles = DB::select(DB::raw("
            SELECT * 
            FROM user_profiles 
            WHERE (? IS NULL OR location_id = ?)
            AND (? IS NULL OR craft_id = ?)
        "),[
            $location, $location,
            $craft, $craft,
        ]);

        $user_ids = [];

        foreach($profiles as $profile){
            array_push($user_ids, $profile->user_id);
        }

        $users = User::find($user_ids);

        if($tagsGiven)
        {
            $topic_ids = [];
            $skill_ids = [];

            // Get requested topics as IDs.
            if($request->input('topics')){
                $topic_titles = explode(',', $request->input('topics'));

                foreach($topic_titles as $topic_title){
                    array_push($topic_ids, Topic::where('title', $topic_title)->first()->id);
                }
            }

            // Get requested skills as IDs.
            if($request->input('skills')){
                $skill_titles = explode(',', $request->input('skills'));

                foreach($skill_titles as $skill_title){
                    array_push($skill_ids, Skill::where('title', $skill_title)->first()->id);
                }
            }

            $tableName = $this->createAndSeedTemporaryTableResultsWithRevelance($user_ids, $topic_ids, $skill_ids);

            $user_ids_by_revelance = DB::table($tableName)
                                            ->where('relevance', '>=', 1)
                                            ->orderBy('relevance', 'desc')
                                            ->pluck('item_id');

            Schema::dropIfExists($tableName);
        

            $users = []; // $users = User::find($user_ids_by_revelance); // Can't used this shortcut as sorting-by-relevance is lost. One alternative would be to join Users with the Temporary table so that the users can be sorted.
            foreach($user_ids_by_revelance as $id){
                array_push($users, User::find($id));
            }
        }

        // return response()->json($users); // results can also be viewed like this.

        // THIS IS ONLY TEMPORARY. THIS SHIT NEEDS TO BE CACHED

        $crafts = Craft::all();
        $skills = Skill::all();
        $topics = Topic::all();
        $locations = Location::all();
        return view('profiles.index')
                    ->with('members', $users)
                    ->with('crafts', $crafts)
                    ->with('skills', $skills)
                    ->with('topics', $topics)
                    ->with('locations', $locations);
    }

    public function getHints(Request $request)
    {
        $usernames = User::all()->pluck('username');

        $q = $request->q;

        $hints = array();

        if($q !== "") {
            $q = strtolower($q);
            $len = strlen($q);
            foreach($usernames as $username) {
                if(stristr($q, substr($username, 0, $len))) {
                    array_push($hints, $username);
                }
            }
        }

        return json_encode($hints);
    }
}