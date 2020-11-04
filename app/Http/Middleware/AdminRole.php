<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->isAdmin()) {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
