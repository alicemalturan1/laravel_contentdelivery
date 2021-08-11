<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

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
    public function change_avatar(Request $req){
        $req->validate([
            'avatar'=>'required|mimes:jpg,png,jpeg',
        ]);
        $now= Carbon::now();
        $update_time=Carbon::parse(Auth::user()->updated_at);
        $diff=$update_time->diffInMinutes($now,false);
        if (!$diff<5){
            $o_name=$req->file('avatar')->getClientOriginalName();
            $tpye_arr=explode('.',$o_name);
            $new_fname='avatar-'.Crypt::encryptString(Auth::id()).'.'.end($tpye_arr);
            $filepath='/storage/app/user-'.Auth::id().'/'.$new_fname;
            $req->file('avatar')->storeAs('/user-'.Auth::id().'/',$new_fname);
            User::where('id',Auth::id())->update([
                'avatar'=>$filepath,
                'updated_at'=>Carbon::now()
            ]);
            return response()->json([
                'success'=>true,
                'update_time'=>Carbon::now('Europe/Istanbul'),
                'success-token'=>bcrypt(time().Auth::id())
            ]);
        }else{
            return response()->json([
                'error'=>'waittime_notexpired',
                'err-code'=>'wt_ne-0',
                'message'=>'5 Dakikada bir güncelleme yapabilirsiniz.'
            ]);
        }
    }
    public function update(Request $req){
        $req->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',

        ]);
        $now= Carbon::now();
        $update_time=Carbon::parse(Auth::user()->updated_at);
        $diff=$update_time->diffInMinutes($now,false);

        if (!$diff<5){

            User::where('id',Auth::id())->update([
                'name'=>$req->name,
                'surname'=>$req->surname,
                'email'=>$req->email,
                'twitter_link'=>$req->twitter,
                'facebook_link'=>$req->facebook,
                'instagram_link'=>$req->instagram,
                'about'=>$req->about,
                'updated_at'=>Carbon::now()
            ]);
            return response()->json([
                'success'=>true,
                'update_time'=>Carbon::now('Europe/Istanbul'),
                'success-token'=>bcrypt(time().Auth::id())
            ]);
        }else{
            return response()->json([
                'error'=>'waittime_notexpired',
                'err-code'=>'wt_ne-0',
                'message'=>'5 Dakikada bir güncelleme yapabilirsiniz.'
            ]);
        }
    }
    public function change_password(Request $req){
        $now= Carbon::now()->setTimezone('GMT');
        $update_time=Carbon::parse(Auth::user()->updated_at);
        $diff=$update_time->diffInMinutes($now,false);

        if (!$diff<5){
            $cu_pw=User::where('id',Auth::id())->first()->password;
            if ($req->new_pw!=$req->new_pw_r){
                return response()->json([
                    'error'=>'newpass_notequal',
                    'err-code'=>'np_ne-0',
                    'message'=>'Yeni şifre ve tekrarı birbiri ile uyumsuz.'
                ]);
            }
            if (Hash::check($req->current_pw,Auth::user()->password)){
                User::where('id',Auth::id())->update([
                    'password'=>bcrypt($req->new_pw),
                    'updated_at'=>Carbon::now()
                ]);
                return response()->json([
                    'success'=>true,
                    'update_time'=>Carbon::now('Europe/Istanbul'),
                    'success-token'=>bcrypt(time().Auth::id())
                ]);
            }else{
                return response()->json([
                    'error'=>'password_notmatch',
                    'err-code'=>'pw_nm-0',
                    'message'=>'Lütfen mevcut parolanızı doğru giriniz'
                ]);
            }
        }else{
            return response()->json([
                'error'=>'waittime_notexpired',
                'err-code'=>'wt_ne-0',
                'message'=>'5 Dakikada bir güncelleme yapabilirsiniz.'
            ]);
        }
    }
    public function access_demo(Request $req){
        if ($req->password=="3169erisim"){
            return response()->redirectTo('/')->withCookie(cookie('demo_access',true,315456,'/'));
        }else{
            return back()->withErrors(['Şifre yanlış']);
        }
    }
    public function create_support_ticket(Request $req){
         if ($req->reply_id){
             $now= Carbon::now();
             $update_time=Carbon::parse(SupportTicket::where('id',$req->reply_id)->first()->updated_at);
             $diff=$update_time->diffInMinutes($now,false);
             if($diff>3&&Auth::user()->is_admin!=1&&SupportTicket::where('id',$req->reply_id)->first()->is_locked!=1){
                 SupportTicket::insert([
                     'title'=>'answer_'.Auth::id().'-to-'.$req->reply_id,
                     'reason'=>'answer',
                     'reply_id'=>$req->reply_id,
                     'user_id'=>Auth::id(),
                     'description'=>$req->description
                 ]);
                 SupportTicket::where('id',$req->reply_id)->update(['updated_at'=>Carbon::now()]);
                 return response()->json([
                     'success'=>true,
                     'update_time'=>Carbon::now('Europe/Istanbul'),
                     'success-token'=>bcrypt(time().Auth::id())
                 ]);
             }
             else if(SupportTicket::where('id',$req->reply_id)->first()->is_locked==1){
                 return response()->json([
                     'error'=>'ticket-locked',
                     'err-code'=>'tl-1',
                     'message'=>'Destek bileti kapatılmıştır.'
                 ]);
             }
             else if(Auth::user()->is_admin){
                if (SupportTicket::where('id',$req->reply_id)->first()->is_locked){
                    SupportTicket::where('id',$req->reply_id)->update([
                        'is_locked'=>0,
                        'updated_at'=>Carbon::now(),
                    ]);
                }
                 SupportTicket::insert([
                     'title'=>'answer_'.Auth::id().'-to-'.$req->reply_id,
                     'reason'=>'answer',
                     'reply_id'=>$req->reply_id,
                     'user_id'=>Auth::id(),

                     'description'=>$req->description
                 ]);

                 return response()->json([
                     'success'=>true,
                     'update_time'=>Carbon::now('Europe/Istanbul'),
                     'success-token'=>bcrypt(time().Auth::id())
                 ]);
             }
             else{
                 return response()->json([
                     'error'=>'waittime_notexpired',
                     'err-code'=>'wt_ne-0',
                     'message'=>'3 Dakikada bir güncelleme yapabilirsiniz.'
                 ]);
             }
         }else{
             SupportTicket::insert([
                 'title'=>$req->title,
                 'reason'=>$req->reason,
                 'updated_at'=>Carbon::now(),
                 'user_id'=>Auth::id(),
                 'description'=>$req->description
             ]);
             return response()->json([
                 'success'=>true,
                 'update_time'=>Carbon::now('Europe/Istanbul'),
                 'success-token'=>bcrypt(time().Auth::id())
             ]);
         }
    }
    public function lock_support_ticket(Request $req){
        SupportTicket::where('id',$req->id)->update([
            'is_locked'=>1,
            'updated_at'=>Carbon::now()->setTimezone('GMT+3')
        ]);
        return response()->json([
            'success'=>true,
            'update_time'=>Carbon::now('Europe/Istanbul'),
            'success-token'=>bcrypt(time().Auth::id())
        ]);
    }
}
