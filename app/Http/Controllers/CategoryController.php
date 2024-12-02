<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
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

    public function edit($id) {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id) {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;

        if($request->slug) {
            $category->slug = $request->slug;
        } else {
            $category->slug = Str::slug($request->name);
        }

        if(Category::where('slug', $category->slug)->exists()) {
            $category->slug = $category->slug . '-' . uniqid();
        }

        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy($id) {
        $category = Category::find($id);
        
        if($category->destinations()->count() > 0) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục nay khong the xoa!');
        } 

        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Xóa danh mục thành công!');
    }
}
