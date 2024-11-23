<?php

namespace App\Http\Controllers;

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
}
