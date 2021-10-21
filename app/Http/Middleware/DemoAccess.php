<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DemoAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( \Illuminate\Support\Facades\Config::get('app.demo_mode')){
            if (!Cookie::get('demo_access')){
                return response()->view('client.demo_access',['request_uri'=>$request->getRequestUri()]);
            }
        }

        return $next($request);
    }
}
