<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showAll(){
        $menu = MenuItem::all();
        $categories = MenuCategory::all();
        return view('menu', compact('menu', 'categories'));
    }

    public function showCategory($category){
        $menu = MenuItem::where('category_id', $category)->get();
        $categories = MenuCategory::all();
        return view('menu', compact('menu', 'categories'));
    }
}
