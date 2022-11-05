<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showAll(){
        $menu = MenuItem::all();
        return view('menu', compact('menu'));
    }
}
