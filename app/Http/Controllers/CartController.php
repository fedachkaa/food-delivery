<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class CartController extends Controller
{
    public function showCart(){
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->first();
        $order = null;
        if($cart!=null)
            $order = Cart::cartInfo($cart);
        return view('cart', compact('order', 'cart'));
    }

    public function addToCart(Request $request){
        $menu_item_id = $request->menu_item_id;
        $user = Auth::user()->id;
        $menu_item = MenuItem::where('id', $menu_item_id)->first();
        if(Cart::where('user_id', $user)->first()){
           $cart = Cart::where('user_id', $user)->first();
           $cart->order .= "," . $menu_item_id ;
           $cart->save();
        }else{
            $cart = Cart::create([
                'user_id'=> $user,
                'order'=>$menu_item_id]);
        }
        $msg = "$menu_item->title додано в корзину!";
        return redirect()->route('menu')->with('success', $msg);
    }

    public function confirmOrder(){
        if(isset($_POST['cart_id'])) {
            $cart = Cart::where('id', $_POST['cart_id'])->first();
            $cart->confirmed = 1;
            $cart->save();
            $msg = "Ваше замовлення підтведжено. Протягом декількох хвилин адміністратор вам зателефонує!";
            return redirect()->route('menu')->with('success', $msg);
        }
    }
}
