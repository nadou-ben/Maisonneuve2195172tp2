<?php

namespace App\Http\Middleware;
use Redirect;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogin
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
        /*if(!$request->user() || $request->user()->admin !=1) {
            return redirect('/');
        }
        return $next($request);*/
        if( Auth::check() && Auth::user()->admin == 1){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
