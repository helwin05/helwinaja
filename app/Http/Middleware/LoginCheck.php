<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCheck
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
        if (!Auth::check()) {
            return redicert('login');
        }
        $user = Auth::user();

        if($user->level == $roles)
            return $next($request);

        return redicert('login')->with('error',"maaf anda tidak memiliki akses");
    }
}
