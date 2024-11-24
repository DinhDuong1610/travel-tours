<?php

namespace App\Http\Controllers;

use App\Http\Requests\Destinations\CreateDestinationsRequest;
use App\Models\Category;
use App\Models\Destinations;
use App\Models\Tag;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    public function index() {
        $destinations = Destinations::all();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.destinations.create',  compact('categories', 'tags'));
    }

    public function store(CreateDestinationsRequest $request) {
        $image = $request->image->store('destinations', 'public');

        $destination = new Destinations();
        $destination->title = $request->title;
        $destination->description = $request->description;
        $destination->content = $request->content;
        $destination->category_id = $request->category;
        $destination->image = $image;
        $destination->published_at = $request->published_at;
        $destination->save();

        if($request->tags){
            $destination->tags()->attach($request->tags);
        }

        return redirect()->route('admin.destinations.index')->with('success', 'Destination created successfully');
    }
}
