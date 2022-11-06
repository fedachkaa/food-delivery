<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $greet = "Вітаємо в адмін-панелі!";
        return view('layouts.admin', compact('greet'));
    }

    public function showClients(){
        $clients = User::where('is_admin', 0)->get();
        return view('admin.clients.clients', compact('clients'));
    }
}
