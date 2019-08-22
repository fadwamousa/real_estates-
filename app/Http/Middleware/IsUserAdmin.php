<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUserAdmin
{
     //Before Request handled
    public function handle($request, Closure $next)
    {

        if(Auth::check()){

            if(Auth::user()->isAdmin()){

                return $next($request);

            }
        }

        return redirect('login');



        //if(Auth::user()->admin != 1){
        //
        // return redirect('login');
        //
        //}
        // return $next($request);

    }
}
