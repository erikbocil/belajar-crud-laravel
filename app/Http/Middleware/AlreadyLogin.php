<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AlreadyLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $route = [route('login.page'), route('register.page'), route('home')];
        if (session()->has('loginId') && in_array($request->url(), $route)) {
            return to_route('book.index');
        }
        return $next($request);
    }
}
