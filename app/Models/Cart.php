<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function cartInfo($cart){
        $order = explode(",", ($cart->order));
        $res = array_count_values($order);
        $order = Array();
        foreach ($res as $item_id => $count){
            $menu_item = MenuItem::where('id', $item_id)->first();
            $order[] = [$menu_item, $count];
        }
        return $order;
    }
}
