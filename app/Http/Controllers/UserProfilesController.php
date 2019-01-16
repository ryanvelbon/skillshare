<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserProfile;

use App\Craft;
use App\Skill;
use App\Topic;
use App\Location;

use DB;

class UserProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        //
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

        return view('profiles.show', compact('user'));
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
        $user = auth()->user();

        $profile = UserProfile::where('user_id', $user->id)->first();

        $profile->date_of_birth = $request->input('bday');
        $profile->location_id = $request->input('location');

        $profile->save();

        // Update Pivot tables

        $user->interests()->detach();
        $user->skills()->detach();

        // save topics in topic_user pivot table

        $topics_as_titles = explode(',', $request->input('topics'));

        foreach($topics_as_titles as $topic_title){
            $user->interests()->attach(Topic::where('title', $topic_title)->first()->id);
        }

        // save skills in skill_user pivot table

        $skills_as_titles = explode(',', $request->input('skills'));

        foreach($skills_as_titles as $skill_title){
            $user->skills()->attach(Skill::where('title', $skill_title)->first()->id);
        }

        return redirect('/dashboard')->with('success', 'Your Profile has been Updated.');
    }

    public function destroy($id)
    {
        //
    }
}
