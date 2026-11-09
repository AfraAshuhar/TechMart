<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     // if (!auth()->check() || auth()->user()->role !== 'admin') 
    //     // {
    //     //     return redirect()->route('admin.login')->with('error', 'Access denied.');
    //     // }
    //     // return $next($request);
    // }
     public function handle(Request $request, Closure $next)
    {
        if (!auth('admin')->check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Please login as admin');
        }

        return $next($request);
    }
}



