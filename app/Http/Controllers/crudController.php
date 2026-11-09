<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class crudController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('crud', compact('posts'));
    }

    // public function store(Request $req)
    // {
    //     Post::create([
    //         'title' => $req->title,
    //         'description' => $req->description,
    //     ]);

    //     return redirect()->route('crud.index')->with('success', 'Post Created Successfully!');
    // }
    public function store(Request $req)
{
    $imageName = null;

    if ($req->hasFile('image')) {
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('uploads/posts'), $imageName);
    }

    Post::create([
        'title' => $req->title,
        'description' => $req->description,
        'image' => $imageName ? 'uploads/posts/'.$imageName : null,
    ]);

    return redirect()->route('crud.index')->with('success', 'Post Created Successfully!');
}


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit-post', compact('post'));
    }

    public function update(Request $req, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($req->all());
        return redirect()->route('crud.index')->with('success', 'Post Updated Successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('crud.index')->with('success', 'Post Deleted Successfully!');
    }
}
