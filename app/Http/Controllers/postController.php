<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Post;
// use App\Models\Product;
// use App\Models\Category;
// class PostController extends Controller
// {
//     // Show all posts (homepage or posts page)
//     public function index()
//     {
//         $posts = Post::latest()->get();
//         return view('index', compact('posts')); // Flat view: resources/views/index.blade.php
//     }

//     // Show single post
//     public function show($id)
//     {
//         $post = Post::findOrFail($id);
//         return view('detail', compact('post')); // Flat view: resources/views/detail.blade.php
//     }

//     // Optional for admin
//     public function create()
//     {
//         return view('create'); // Flat view: resources/views/create.blade.php
//     }

//     public function store(Request $request)
//     {
//         Post::create($request->all());
//         return redirect()->route('home')->with('success', 'Post created!');
//     }
//     public function products()
//     {
//         $products = Product::all();
//         return view('products', compact('products'));
//     }
//     public function category()
//     {
//         $categories = Category::all(); // fetch all categories from DB
//         return view('categories', compact('categories'));
//     }

//     public function productsByCategory($id)
//     {
//         $category = Category::findOrFail($id);
//         $products = Product::where('category_id', $id)->get();

//         return view('products-by-category', compact('category','products'));
//     }

//     public function blog()
//     {
//         $posts = Post::latest()->get(); // fetch all posts
//         return view('blog', compact('posts'));
//     }


// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;

class PostController extends Controller
{
    /* =======================
        HOME PAGE
    ======================== */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('index', compact('posts')); // resources/views/index.blade.php
    }

    /* =======================
        SINGLE BLOG POST
    ======================== */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $products = Product::latest()->take(4)->get();
        // return view('detail', compact('post')); // resources/views/detail.blade.php
        return view('posts.show', compact('post', 'products'));
    }

    /* =======================
        ADMIN CREATE POST (optional)
    ======================== */
    public function create()
    {
        return view('create'); // resources/views/create.blade.php
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title'       => 'required',
    //         'description' => 'required',
    //         'image'       => 'nullable|image|mimes:jpg,png,jpeg',
    //     ]);

    //     $data = $request->only(['title','description']);

    //     //if ($request->hasFile('image')) {
    //     //     $imageName = time().'.'.$request->image->extension();
    //     //     $request->image->move(public_path('uploads/products'), $imageName);
    //     //     $data['image'] = $imageName;
    //     // }

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('products', 'public');
    //         $data['image'] = $imagePath;
    //     }

    //     Post::create($data);

    //     return redirect()->route('home')->with('success', 'Post created successfully!');
    // }
public function store(Request $request)
{
    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/posts'), $imageName);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'uploads/posts/'.$imageName,
        ]);

    } else {
        return back()->with('error', 'Image not received');
    }

    return back()->with('success', 'Post created successfully');
}

    /* =======================
        PRODUCTS PAGE
    ======================== */
    public function products()
    {
        $products = Product::latest()->get();
        return view('products', compact('products'));
    }

    /* =======================
        CATEGORIES PAGE
    ======================== */
    public function category()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    /* =======================
        PRODUCTS BY CATEGORY
    ======================== */
    public function productsByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        return view('products-by-category', compact('category','products'));
    }

    /* =======================
        BLOG PAGE
    ======================== */
    public function blog()
    {
        $posts = Post::latest()->get();
        return view('blog', compact('posts'));
    }
}
