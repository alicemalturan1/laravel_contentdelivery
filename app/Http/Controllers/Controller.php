<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function setPanelColor(Request $req){
        $req->validate([
            'color'=>'required'
        ]);

        return response()->json([
            'color'=>$req->color,
            'status'=>'success'
        ])->withCookie(cookie('panel_color',$req->color,315456,'/'));
    }
}
