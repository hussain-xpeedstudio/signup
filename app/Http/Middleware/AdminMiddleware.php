<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and is an admin
        dump(Auth::check(), Auth::user());
        if (Auth::check() && Auth::user()->role_id === 1) {
            return $next($request);
        }

        dd('noo');
        // Redirect to login or unauthorized page if not admin
        return redirect('login')->with('error', 'You do not have admin access.');
    }
}
