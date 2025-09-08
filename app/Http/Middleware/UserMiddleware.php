<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth('web')->check()) {
            if (auth('web')->user()->is_banned == 0) {
                return $next($request);
            }
            Auth::guard('web')->logout();
            return redirect()->route('site.home');
        }
        return redirect('/login')->with('error', 'Access Denied');
    }
}
