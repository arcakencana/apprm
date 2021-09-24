<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        if (!empty(Auth()->user())) {
            return redirect('/dashboard');
        }
        $data['title'] = "Login";

        return view('login.index', $data);
    }

    public function authenticate(Request $request)
    {

        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/dashboard');
        }

        return redirect()->route('login')->with('message', 'Email / Password Salah !');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
