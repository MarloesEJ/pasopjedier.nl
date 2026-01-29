<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->blocksReceived()->exists()){
            auth()->logout();
            return redirect()->route('login')->withErrors(['email' => 'Je account is geblokkeerd. Neem contact op met de administrator.']);
        }
    
        return $next($request);
    }
}
