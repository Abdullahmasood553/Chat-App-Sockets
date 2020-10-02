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

    public function getMessage($user_id) {
        // return $user_id;
        // Getting all messages for selected user
        // getting those message  which is from = Auth::id() and to = user_id OR FROM user_id and to = Auth::id()
        $message = Message::where('')->get();
    }
}
