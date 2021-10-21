<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PanelRouteAccess
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
        $accessible= false;
        $exp= explode('admin/views/',$request->getPathInfo());

        if( Auth::check()){

            $routes=Config::get('panel.ranks_routes');
            $routes= $routes[Auth::user()->user_rank];

            foreach ($routes as $route){

                if($exp[1]==$route || $route=="*all*"){
                    $accessible=true;
                    break;
                }
            }
            if(!$accessible) return response()->view('admin.not_access',["back_url"=>url()->previous(),"parity"=>url()->previous()==$request->getUri()]);
        }else if($exp[1]!="login"){
            return response()->redirectTo(route('PanelView',['any'=>'login']));
        }

        return $next($request);

    }
}
