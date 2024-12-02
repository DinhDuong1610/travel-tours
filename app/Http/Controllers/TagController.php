<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::paginate(8);
        return view('admin.tag.index', compact('tags'));
    }

    public function create() {
        return view('admin.tag.create');
    }

    public function store(CreateTagRequest $request) {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        
        return redirect()->route('admin.tag.index')->with('success', 'Tag created successfully');
    }

    public function edit($id) {
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, $id) {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        
        return redirect()->route('admin.tag.index')->with('success', 'Cập nhật tag thành công!');
    }   
}
