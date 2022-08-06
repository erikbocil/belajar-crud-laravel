<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        session()->forget('loginId');
        return view('auth.login')->with('title', 'Halaman Login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);
        $user = User::where('username', '=', $request->username)->first();
        if (!$user) {
            return redirect()->route('login-page')->with('error', 'Username not found');
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login-page')->with('error', 'Password is wrong');
        }
        $request->session()->put('loginId', $user->id);
        return redirect('/book');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|email',
            'username' => 'required',
            'password' => 'required|min:8',
            'password-confirmation' => 'required|min:8|same:password',
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password =  Hash::make($request->password);
        $user->save();
        if (!$user) {
            return redirect()->route('register-page')->with('error', 'Register failed please try again');
        }
        return redirect()->route('login-page')->with('success', 'Register Successfully');
    }

    // public function logout()
    // {
    //     if (session()->has('loginId')) {
    //         session()->forget('loginId');
    //         return redirect()->route('login-page');
    //     }
    //     return 'blalbalbla';
    // }
}
