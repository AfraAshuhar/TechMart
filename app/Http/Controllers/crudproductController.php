<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class crudproductController extends Controller
{
    public function index()
    {
        $product = Post::all();
        return view('crud-product', compact('products'));
    }

    public function store(Request $req)
    {
        Post::create([
            'title' => $req->title,
            'description' => $req->description,
        ]);

        return redirect()->route('crud-product.index')->with('success', 'Post Created Successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit-product', compact('product'));
    }

    public function update(Request $req, $id)
    {
        $product = Post::findOrFail($id);
        $product->update($req->all());
        return redirect()->route('crud-product.index')->with('success', 'Post Updated Successfully!');
    }

    public function destroy($id)
    {
        $product = Post::findOrFail($id);
        $product->delete();
        return redirect()->route('crud-product.index')->with('success', 'Post Deleted Successfully!');
    }
}
