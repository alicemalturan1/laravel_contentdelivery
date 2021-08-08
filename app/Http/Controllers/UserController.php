<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function login(Request $req){
        $auth=Auth::attempt(['email'=>$req->email,'password'=>$req->password],$req->remember_me);
        if ($auth){
            return response(['message'=>"ok"]);
        }else{
            return response(['message'=>'access_denied'],403);
        }

    }
    public static function get_by_id($id){
        return User::where('id',$id)->first();
    }
    public function register(Request $req){
        if (User::where('email',$req->email)->first()){
            return response(['message'=>'using_email'],403);
        }
        $api_key='apikey-'.Crypt::encryptString(time().$req->email);
        $api_secret='secret-'.Crypt::encryptString(time().$req->email);
        User::insert([
            'api_key'=>$api_key,
            'api_secret'=>$api_secret,
            'name'=>$req->name,
            'surname'=>$req->surname,
            'about'=>$req->about,
            'email'=>$req->email,
            'password'=>bcrypt($req->password)
        ]);
    }
    public function auth_check(){
        if (Auth::check()){
            return response(['authorized'=>true]);
        }else{
            return response(['authorized'=>false]);
        }
    }
    public function logout(){
        Auth::logout();
    }
}
