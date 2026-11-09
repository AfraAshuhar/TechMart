<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::latest()->get();
        return view('order', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.detail', compact('order'));
    }

    public function success()
    {
        return view('order.success');
    }

      // Display all orders in admin panel
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }
}
