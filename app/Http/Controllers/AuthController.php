<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login')->with('title', 'Halaman Login');
    }

    public function loginUser(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('book.index'));
        }
        return to_route('home')->with('error', 'Login Failed')->withInput();
    }

    public function register()
    {
        return view('auth.register')->with('title', 'Halaman Register');
    }

    public function registerUser(RegisterRequest $request)
    {
        User::create($request->validated());
        return to_route('login.page')->with('success', 'Register Successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('home');
    }
}
