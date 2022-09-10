<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login')->with('title', 'Halaman Login');
    }

    public function loginUser(LoginRequest $request)
    {
        $request->validated();
        $user = User::where('username', '=', $request->username)->first();
        if (!$user) {
            return to_route('login.page')->with('error', 'Username not found');
        }
        if (!Hash::check($request->password, $user->password)) {
            return to_route('login.page')->with('error', 'Password is wrong');
        }
        $request->session()->put('loginId', $user->id);
        $request->session()->put('name', $user->username);
        return to_route('book.index');
    }

    public function register()
    {
        return view('auth.register')->with('title', 'Halaman Register');
    }

    public function registerUser(RegisterRequest $request)
    {
        User::create($request->validated());
        return to_route('login-page')->with('success', 'Register Successfully');
    }

    public function logout()
    {
        if (session()->has('loginId')) {
            session()->flush();
            return to_route('login-page')->with('success', 'Logout Successfully');
        }
        return to_route('home');
    }
}
