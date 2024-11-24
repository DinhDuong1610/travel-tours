<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Destinations;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $search = request()->query('search');
        if (request()->query('search')) {
            $destinations = Destinations::where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
        } else {
            $destinations = Destinations::simplePaginate(3);
        }

        $categories = Category::limit(5)->get();
        $tags = Tag::limit(5)->get();

        return view('pages.welcome', compact('destinations', 'categories', 'tags'));
    }

    public function about() {
        return view('pages.about');
    }

    public function packages() {
        $destinations = Destinations::paginate(3);
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.packages', compact('destinations', 'tags', 'categories'));
    }

    public function blog() {
        $blogs = Blog::paginate(3);
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.blog', compact('blogs', 'tags', 'categories'));
    }

    public function contact() {
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.contact', compact('tags', 'categories'));
    }

    public function bali() {
        $destinations = Destinations::all();
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.bali', compact('destinations', 'tags', 'categories'));
    }

    public function cart() {
        $destinations = Destinations::first();
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.cart', compact('destinations', 'tags', 'categories'));
    }
}
