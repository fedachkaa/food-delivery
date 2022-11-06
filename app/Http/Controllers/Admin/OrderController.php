<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;

class OrderController extends Controller
{
    public function showOrders()
    {
        $carts = Cart::where('confirmed', 1)->get();
        return view('admin.orders.orders', compact('carts'));
    }

    public function orderInfo($id)
    {
        $cart = Cart::where('id', $id)->first();
        $user = User::where('id', $cart->user_id)->first();
        $order = Cart::cartInfo($cart);
        return view('admin.orders.order_info', compact('order', 'cart', 'user'));
    }

    public function takeOrder($id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->delete();
        return redirect()->route('admin')->with('success', "Замовлення №$cart->id прийнято.");
    }
}
