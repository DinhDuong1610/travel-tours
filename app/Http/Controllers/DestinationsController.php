<?php

namespace App\Http\Controllers;

use App\Http\Requests\Destinations\CreateDestinationsRequest;
use App\Models\Category;
use App\Models\Destinations;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationsController extends Controller
{
    public function index() {
        $destinations = Destinations::paginate(5);
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
        $destination->pricing = $request->pricing;
        $destination->description = $request->description;
        $destination->content = $request->content;
        $destination->category_id = $request->category;
        $destination->image = $image;
        $destination->published_at = $request->published_at;

        if($request->slug){
            $destination->slug = $request->slug;
        } else {
            $destination->slug = Str::slug($request->title);
        }
        $destination->save();

        if($request->tags){
            $destination->tags()->attach($request->tags);
        }

        if(Destinations::where('slug', $destination->slug)->exists()){
            $destination->slug = $destination->slug . '-' . uniqid();
        }

        $destination->save();

        return redirect()->route('admin.destinations.index')->with('success', 'Tạo điểm đến thành công!');
    }
}
