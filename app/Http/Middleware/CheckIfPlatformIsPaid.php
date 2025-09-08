<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class CheckIfPlatformIsPaid
{
    public function handle(Request $request, Closure $next)
    {
        $isPaid = DB::table('settings_money')->where('id', 1)->value('is_paid') ?? true;

        \Log::info('Platform status check', [
            'is_paid' => $isPaid,
            'path' => $request->path()
        ]);

        $exceptPaths = [
            '__secure-admin-panel',
            '__secure-admin-paid',
            '__secure-admin-unpaid',
            'platform-locked',
            'test'
        ];

        foreach ($exceptPaths as $exceptPath) {
            if (str_contains($request->path(), $exceptPath)) {
                return $next($request);
            }
        }

        if (!$isPaid) {
            return redirect()->route('site.locked');
        }

        return $next($request);
    }
}
