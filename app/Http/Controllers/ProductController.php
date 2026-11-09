<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::latest()->get();
        return view('products', compact('products'));
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-detail', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $req)
    {
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('uploads/products'), $imageName);

        Product::create([
            'title' => $req->title,
            'price' => $req->price,
            'category_id' => $req->category_id,
            'description' => $req->description,
            'stock' => $req->stock,
            'image' => $imageName,
        ]);

        return redirect('/admin/products')->with('success', 'Product Added Successfully!');
    }

    public function productsByCategory($id)
    {
        // Find the category
        $category = \App\Models\Category::findOrFail($id);

        // Get all products in that category
        $products = \App\Models\Product::where('category_id', $id)->get();

        // Pass BOTH variables to the view
        return view('products-by-category', compact('category','products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // If search is empty, return empty page
        if (!$query) {
            return view('search-results')->with('products', collect());
        }

        $products = \App\Models\Product::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('search-results', compact('products', 'query'));
    }

    public function list()
    {
        $products = Product::with('category')->latest()->get(); // fetch products with category
        return view('admin.products.list', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->only(['title','price','category_id','description','stock']);
        
        if ($request->hasFile('image')) 
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

            return redirect()->route('admin.products.index')->with('success', 'Product Updated Successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path('uploads/products/' . $product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product Deleted Successfully!');
    }

}
