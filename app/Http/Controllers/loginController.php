<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class loginController extends Controller
{
    public function registerUser(Request $request){

        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]*$/'],
            'email' => 'required | email | unique:users,email',
            'password' => 'required | confirmed | min:5',
            'password_confirmation' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // save username on session
        $request->session()->put('name', $user->name);
        return redirect('/');
    }

    public function loginUser(Request $request){

        $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:5'
        ]);
        // find user using email Id
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            $request->session()->flash('status', 'Invalid credentials');
            return redirect('/login');
        }
        else{
            $request->session()->put('name', $user->name);
            return redirect('/');
        }
    }

    public function logoutUser(){

        if(session()->has('name')){
            session()->pull('name');
        }
        Session::flash('status', 'User has logged out');
        return redirect('/');
    }
}
