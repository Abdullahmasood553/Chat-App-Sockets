<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function save_register(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if($user) {
            return response()->json(['exists' => 'Email already exists']);
        } else {
            $user = new User;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
        }

        if($user->save()) {
            return response()->json(['success' => 'Data Submitted Successfully']);
        }
    }

    public function user_login(Request $request) {
 
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')])) {
            $user = Auth()->user();
            if ($user) {
                return response()->json(['success' => 'Successfully Logged In']);
            } else {
                return response()->json(['error'=> 'Something went wrong']);
            }
        } 
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      } 
}
