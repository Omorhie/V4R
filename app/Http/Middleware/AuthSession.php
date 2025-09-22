<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('username')) {
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        return $next($request);
    }
}
