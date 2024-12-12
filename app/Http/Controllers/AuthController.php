<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function proccessLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
