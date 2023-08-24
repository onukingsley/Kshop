<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()){
            if (!auth()->user()->usertype == 1){
                return redirect('/')->with('message','Unauthorized');
            }
        }
        if (!auth()->user()){
            return redirect('/')->with('message','Unauthorised access');
        }


        return $next($request);
    }
}
