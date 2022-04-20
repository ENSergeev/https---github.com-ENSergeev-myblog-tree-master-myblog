<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMiddleware
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
        // dd($request->user());
        // dd(auth()->user()->name);
        // dd((int)auth()->user()->role);
        if((int)auth()->user()->role!==User::ROLE_ADMIN){
            // dd(User::ROLE_ADMIN);
            abort(404,'Право пользователя ограничено посредником');
        }
        return $next($request);
    }
}
