<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class AlreadyLoggedIn
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
        $url = $request->url();

        if ( session()->has('user_id') )
        {
            if (url('login')==$url)
            {
                return redirect(RouteServiceProvider::HOME);
            }

            if ( url('registration')==$url )
            {
                return $next($request);
            }

            if ( url('/api/*')==$url )
            {
                return $next($request);
            }            
        }
        return $next($request);
    }
}
