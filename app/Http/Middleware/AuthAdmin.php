<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user(); 

            if ($user->role === 'admin' || $user->role === 'employee') {
                return $next($request); 
            } else {
                Auth::logout(); 
                Session::flush();
                return redirect()->route('login'); 
            }
        }
        return redirect()->route('login'); 
    }
}
