<?php

namespace App\Http\Controllers;

use App\Http\Requests\Destinations\CreateDestinationsRequest;
use App\Http\Requests\Destinations\UpdateDestinationsRequest;
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

        $destination->save();

        return redirect()->route('admin.destinations.index')->with('success', 'Tạo điểm đến thành công!');
    }

    public function edit($id) {
        $destination = Destinations::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.destinations.edit', compact('destination', 'categories', 'tags'));
    }

    public function update(UpdateDestinationsRequest $request, $id) {
        
        $destination = Destinations::find($id);
        $destination->title = $request->title;
        $destination->pricing = $request->pricing;
        $destination->description = $request->description;
        $destination->content = $request->content;
        $destination->category_id = $request->category;
        $destination->published_at = $request->published_at;
        
        if($request->image){
            $image = $request->image->store('destinations', 'public');
            $destination->image = $image;
        }

        if($request->slug){
            $destination->slug = $request->slug;
        } else {
            $destination->slug = Str::slug($request->title);
        }

        $destination->save();

        if($request->tags){
            $destination->tags()->sync($request->tags);
        }

        $destination->save();

        return redirect()->route('admin.destinations.index')->with('success', 'Cập nhật điểm đến thành công!');
    }

    public function destroy($id) {
        $destination = Destinations::find($id);
        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Xóa điểm đến thành công!');
    }
    
}
