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
        if ($req->color=='dark'){
            session(['panel_color'=>'dark']);
        }else{
            session(['panel_color'=>'light']);
        }
        return response()->json([
            'color'=>$req->color,
            'status'=>'success'
        ]);
    }
}
