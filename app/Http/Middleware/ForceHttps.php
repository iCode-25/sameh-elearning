<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request is not secure (HTTP) and redirect to HTTPS
        if (app()->environment('production')) {
            // Force HTTPS on production
            if (!$request->secure()) {
                return redirect()->secure($request->getRequestUri());
            }
        }
        return $next($request);
    }
}
