<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create() {
        $categories = Category::select('id', 'name')->get();
        return view('admin.blog.create', compact('categories'));
    }
}
