<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(8);
        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(CreateCategoryRequest $request) {
        $category = new Category();
        $category->name = $request->name;

        if($request->slug) {
            $category->slug = $request->slug;
        } else {
            $category->slug = Str::slug($request->name);
        }

        if(Category::where('slug', $category->slug)->exists()) {
            $category->slug = $category->slug . '-' . uniqid();
        }

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Tạo danh mục thành công!');
    }
}
