<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\crudController;
use App\Http\Controllers\CategoryController;

 //Frontend Routes


// Home page
Route::get('/', [PostController::class, 'index'])->name('home');

// Blog page
Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [PostController::class, 'show'])->name('post.detail');

// Posts CRUD (for admin or internal use)
// Route::get('/post', [crudController::class, 'index'])->name('post');
// Route::post('/post/create', [crudController::class, 'store'])->name('post.store');
// Route::get('/post/{id}/edit', [crudController::class, 'edit'])->name('post.edit');
// Route::put('/post/{id}', [crudController::class, 'update'])->name('post.update');
// Route::delete('/post/{id}', [crudController::class, 'destroy'])->name('post.destroy');

Route::get('/crud', [crudController::class, 'index'])->name('crud.index');
Route::post('/crud/create', [crudController::class, 'store'])->name('crud.store');
Route::get('/crud/{id}/edit', [crudController::class, 'edit'])->name('crud.edit');
Route::put('/crud/{id}', [crudController::class, 'update'])->name('crud.update');
Route::delete('/crud/{id}', [crudController::class, 'destroy'])->name('crud.destroy');
// Products
Route::get('/products', [ProductController::class, 'products'])->name('products');
Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product-detail');
Route::get('/category', [PostController::class, 'category'])->name('category');
Route::get('/category/{id}', [ProductController::class, 'productsByCategory'])->name('category.products');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout/place', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

// Orders
Route::get('/order', [OrderController::class, 'order'])->name('order');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.detail');
Route::get('/order-success', [OrderController::class, 'success'])->name('order.success');

// Search
Route::get('/search', [ProductController::class, 'search'])->name('search');


//product in post
//Route::get('/post/{id}', [PostController::class, 'show'])->name('post.detail');

//Admin Routes


Route::prefix('admin')->group(function () {

    // ---------- LOGIN ----------
     Route::get('/login', [AdminAuthController::class, 'showLoginForm'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.submit');

    
    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])
            ->name('admin.dashboard');   

        Route::post('/logout', [AdminAuthController::class, 'logout'])
            ->name('admin.logout');

        // PRODUCTS
        // Route::get('/products', [ProductController::class, 'index'])
        //     ->name('admin.products');
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');

        Route::get('/products/create', [ProductController::class, 'create'])
            ->name('admin.products.create');

        Route::post('/products', [ProductController::class, 'store'])
            ->name('admin.products.store');

        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
            ->name('admin.products.edit');

        Route::put('/products/{id}', [ProductController::class, 'update'])
            ->name('admin.products.update');

        Route::delete('/products/{id}', [ProductController::class, 'destroy'])
            ->name('admin.products.delete');

        // CATEGORIES
        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('admin.categories');

        // ORDERS
        Route::get('/orders', [OrderController::class, 'index'])
            ->name('admin.orders');

        // POSTS
        Route::get('/posts', [PostController::class, 'index'])
            ->name('admin.posts.index');
    });
});
