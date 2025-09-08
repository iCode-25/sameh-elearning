<?php

namespace App\Http\Middleware;

use App\Helpers\TranslationHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    //        dd(auth()->check());
    // الاساسية
    public function handle($request, Closure $next)
    {
        if (auth('admin')->check() && auth('admin')->user()->is_admin) {
            return $next($request);
        }
        return redirect('/admin/login')->with('error', 'Access Denied');
    }


    // public function handle($request, Closure $next)
    //     {
    //     if (auth()->check() && auth()->user()->is_admin) {
    //         return $next($request);
    //     }
    //     return redirect('/admin/login')->with('error', 'Access Denied');
    //     }

}
