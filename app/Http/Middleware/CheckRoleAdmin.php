<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoleAdmin
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
        
        //check user da login & user->role == member
        if (Auth::check() === false) {
            //return fail
            return redirect()->route('auth.showLoginForm');
        }

        if (Auth::user()->role !==config('role.admin')) {
             return redirect()->route('client.index');

        }
         
        return $next($request);
    }
}