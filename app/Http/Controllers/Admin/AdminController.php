<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $greet = "Вітаємо в адмін-панелі!";
        return view('layouts.admin', compact('greet'));
    }
}
