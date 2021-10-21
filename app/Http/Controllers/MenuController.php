<?php

namespace App\Http\Controllers;

use App\Models\FooterMenuItems;
use App\Models\TopMenuItems;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function remove_topmenu_item(Request $req){
        $req->validate([
            'id'=>'required'
        ]);
        TopMenuItems::where('id',$req->id)->orWhere('parent_id',$req->id)->delete();

    }
    public function create_topmenu_item(Request $req){
        $req->validate([
            'text'=>'required|min:3',
            'link'=>'required|min:3',
            'queqe'=>'required'
        ]);
        $params=[
            'text'=>$req->text,
            'link'=>$req->link,
            'queqe'=>$req->queqe,

        ];
        if ($req->parent_id){
           $params['parent_id'] = $req->parent_id;
        }
        TopMenuItems::insert($params);
    }
    public function update_topmenu_item(Request $req){
        $req->validate([
            'link'=>'required',
            'text'=>'required',
            'queqe'=>'required',
            'id'=>'required'
        ]);
        TopMenuItems::where('id',$req->id)->update([
            'link'=>$req->link,
            'text'=>$req->text,
            'queqe'=>$req->queqe,

        ]);
    }
    public function update_bottommenu_item(Request $req){
        $req->validate([
            'link'=>'required',
            'text'=>'required',
            'queqe'=>'required',
            'id'=>'required'
        ]);
        FooterMenuItems::where('id',$req->id)->update([
            'link'=>$req->link,
            'text'=>$req->text,
            'queqe'=>$req->queqe,
        ]);
    }
    public function create_bottommenu_item(Request $req){
        $req->validate([
            'text'=>'required|min:3',
            'link'=>'required|min:3',
            'queqe'=>'required'
        ]);
        $params=[
            'text'=>$req->text,
            'link'=>$req->link,
            'queqe'=>$req->queqe,

        ];

        FooterMenuItems::insert($params);
    }
    public function remove_bottommenu_item(Request $req){
        $req->validate([
            'id'=>'required'
        ]);
        FooterMenuItems::where('id',$req->id)->delete();

    }
}
