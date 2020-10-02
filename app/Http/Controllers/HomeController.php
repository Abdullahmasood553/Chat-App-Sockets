<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function home() {

        // Select All Users except logged in User;
        $users = User::where('id', '!=', Auth::id())->get();
        return view('home', ['users' => $users]);
    }
}
