<?php

namespace App\Http\Middleware;

use App\Enums\UserLevel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperuserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->level->value !== UserLevel::Superuser) {
            abort(401);
        }

        return $next($request);
    }
}
