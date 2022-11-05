<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;

class OrderController extends Controller
{
    public function showOrders()
    {
        $carts = Cart::where('confirmed', 1)->get();
        return view('admin.orders', compact('carts'));
    }

    public function orderInfo($id)
    {
        $cart = Cart::where('id', $id)->first();
        $order = Cart::cartInfo($cart);
        return view('admin.order_info', compact('order', 'cart'));
    }

    public function takeOrder($id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->delete();
        return redirect()->route('admin')->with('success', "Замовлення №$cart->id прийнято.");
    }
}
