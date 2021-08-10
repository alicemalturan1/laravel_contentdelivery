<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Favorite;
use App\Models\Rate;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;

class ContentController extends Controller
{
    public static function get_by_id($id){
        return Content::where('id',$id)->first();
    }
    public function view($self,$id){
        return view('client.content',['content'=>self::get_by_id($id)]);
    }
    public function like_toggle(Request $req){
        if (!Cookie::get('like_content-'.$req->id)){
            Cookie::expire('disslike_content-'.$req->id);
            Content::where('id',$req->id)->update([
                'like_count'=>Content::where('id',$req->id)->first()->like_count+1
            ]);
            $cookie=cookie('like_content-'.$req->id,'true',$minute=99999999999999,'/');
            $response = new Response("Liked");
            return response()->json(['like' => "liked"], 200)->withCookie($cookie);
        }else{
            Content::where('id',$req->id)->update([
                'like_count'=>Content::where('id',$req->id)->first()->like_count-1
            ]);
            Cookie::expire('like_content-'.$req->id);
            return  response()->json(['like'=>"removed"]);
        }


        Content::where('id',$req->id);

    }
    public function disslike_toggle(Request $req){

        if (!Cookie::get('disslike_content-'.$req->id)){
            Cookie::expire('like_content-'.$req->id);
            Content::where('id',$req->id)->update([
                'disslike_count'=>Content::where('id',$req->id)->first()->disslike_count+1
            ]);
            $cookie=cookie('disslike_content-'.$req->id,'true',$minute=99999999999999,'/');
            $response = new Response("Liked");
            return response()->json(['disslike' => "dissliked"], 200)->withCookie($cookie);
        }else{
            Content::where('id',$req->id)->update([
                'disslike_count'=>Content::where('id',$req->id)->first()->disslike_count-1
            ]);
            Cookie::expire('disslike_content-'.$req->id);
            return  response()->json(['disslike'=>"removed"]);
        }




    }
    public function favorite(Request $req){
        if ($fav=Favorite::where('content_id',$req->id)->where('user_id',Auth::id())->first()){
            Favorite::where('id',$fav->id)->delete();
            return \response()->json(['favorite'=>"removed"]);
        }else{
            Favorite::insert([
                'content_id'=>$req->id,
                'user_id'=>Auth::id(),
                'created_at'=>Carbon::now()->setTimezone('GMT+3')
            ]);
            return \response()->json(['favorite'=>"added"]);
        }
    }
    public static function encode_date($date){
        $date= Carbon::parse($date);
        $day=$date->day;
        $months=['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'];
        $month=$months[$date->month-1];
        $year = $date->year;
        $year = Carbon::now()->year==$year?'':$year;
        $hour=$date->hour;
        $minute = $date->minute;
        return $day.' '.$month.' '.$year.' '.$hour.' : '.$minute;
    }
    public function rate(Request $req){
        $rate=json_decode($req->rates);
        if (!Cookie::get('rated_content-'.$req->id)) {
            if (Auth::check()) {
                Rate::insert([
                    'content_id' => $req->id,
                    'rate_ds' => $rate->ds,
                    'rate_ls' => $rate->ls,
                    'rate_ab' => $rate->ab,
                    'message' => $req->comment,
                    'user_id' => Auth::id(),
                    'created_at' => Carbon::now()->setTimezone('GMT+3')
                ]);
            } else {
                Rate::insert([
                    'content_id' => $req->id,
                    'rate_ds' => $rate->ds,
                    'rate_ls' => $rate->ls,
                    'rate_ab' => $rate->ab,
                    'message' => $req->comment,
                    'guest_name' => $req->name,
                    'guest_email' => $req->email,
                    'is_guest' => 1,
                    'created_at' => Carbon::now()->setTimezone('GMT+3')
                ]);
            }
            return response()->json(['success'=>true,])->withCookie(cookie('rated_content-'.$req->id,true,'10542','/'));
        }else{
            return response()->json([
                'error'=>'cookie_access',
                'err-code'=>'ca-1',
                'message'=>'Lütfen art arda değerlendirme göndermeyiniz.'
            ]);
        }
    }
    public function report(Request $req){
        $req->validate([
            'content'=>'required',
            'description'=>'required',
            'reason'=>'required'
        ]);

        if(Cookie::get('report_content-'.Crypt::decryptString($req->content))){
            return response()->json([
                'error'=>'cookie_access',
                'err-code'=>'ca-1',
                'message'=>'Lütfen art arda rapor göndermeyiniz.'
            ]);
        }
        if (Auth::check()){
            Report::insert([
                'content_id'=>Crypt::decryptString($req->content),
                'reason'=>$req->reason,
                'description'=>$req->description,
                'user_id'=>Auth::id(),
                'email'=>Auth::user()->email,
                'created_at'=>Carbon::now()->setTimezone('GMT+3'),
            ]);
            return response()->json([
                'success'=>true,

            ])->withCookie(cookie('report_content-'.Crypt::decryptString($req->content),true,'2560','/'));
        }else{
            Report::insert([
                'content_id'=>Crypt::decryptString($req->content),
                'reason'=>$req->reason,
                'description'=>$req->description,
                'email'=>$req->email,
                'created_at'=>Carbon::now()->setTimezone('GMT+3'),
            ]);
            return response()->json([
                'success'=>true,

            ])->withCookie(cookie('report_content-'.Crypt::decryptString($req->content),true,'2560','/'));
        }
    }
    public function download($id){
       $file="s";
       $info=pathinfo(Content::where('id',$id)->first()->link);
        copy(Content::where('id',$id)->first()->link,$file);
        return response()->download($file,Content::where('id',$id)->first()->title.'.'.$info["extension"]);
    }
}
