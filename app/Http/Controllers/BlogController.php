<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\CreateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::paginate(5);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create() {
        $categories = Category::select('id', 'name')->get();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(CreateBlogRequest $request) {
        $image = $request->image->store('blog', 'public');

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->category_id = $request->category;
        $blog->image = $image;
        $blog->published_at = $request->published_at;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully');
    }
}   
