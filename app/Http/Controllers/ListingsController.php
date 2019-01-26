<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Craft;
use App\Skill;
use App\Topic;
use App\Location;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();
        
        $crafts = Craft::all();
        $skills = Skill::all();
        $topics = Topic::all();
        $locations = Location::all();

        return view('listings.index')
                    ->with('listings', $listings)
                    ->with('crafts', $crafts)
                    ->with('skills', $skills)
                    ->with('topics', $topics)
                    ->with('locations', $locations);
    }

    public function create()
    {
        $crafts = Craft::all();
        $skills = Skill::all();
        $topics = Topic::all();
        $locations = Location::all();
        return view('listings.create')
                    ->with('crafts', $crafts)
                    ->with('skills', $skills)
                    ->with('topics', $topics)
                    ->with('locations', $locations);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            // BUG: PENDING

        ]);

        $listing = new Listing;
        $listing->title = $request->input('title');
        $listing->description = $request->input('description');
        $listing->paid = $request->has('paid');

        $listing->user_id = auth()->user()->id;
        $listing->craft_id = (int)$request->input('craft');
        $listing->location_id = (int)$request->input('location');

        $listing->save();

        // save topics in listing_topic pivot table

        $topics_as_titles = explode(',', $request->input('topics'));

        foreach($topics_as_titles as $topic_title){
            $listing->topics()->attach(Topic::where('title', $topic_title)->first()->id);
        }

        // save skills in listing_skill pivot table

        $skills_as_titles = explode(',', $request->input('skills'));

        foreach($skills_as_titles as $skill_title){
            $listing->skills()->attach(Skill::where('title', $skill_title)->first()->id);
        }

        return redirect('/listings')->with('success', 'Listing Added');

    }

    public function show($id)
    {
        $listing = Listing::find($id);
        if($listing){
            return view('listings.show')->with('listing', $listing);
        }else{
            return view('listings.inexistent');
        }
        
    }

    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('listings.edit')->with('listing', $listing);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect('/dashboard')->with('success', 'Listing Removed');
    }

    public function search(Request $request)
    {
        $query = $request->input('search_query');

        $listings = Listing::where('title', 'LIKE', "%".$query."%")->get();
        
        // return response()->json($result);

        return view('listings.index')->with('listings', $listings);
    }
}
