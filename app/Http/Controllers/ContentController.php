<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Favorite;
use App\Models\Rate;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;

use Genert\BBCode\BBCode;

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
    public static function bbcode_parser(){
        $bbcode=new BBCode();
        $bbcode->addParser(
            'custom-link',
            '/\[link target\=(.*?)\](.*?)\[\/link\]/s',
            '<a href="$1">$2</a>',
            '$1'
        );
    }
    public static function encodelink($key){
        $tr = array('??','??','??','I','??','??','??','??','??','??','??','??','??','(',')','/',' ',',','?');
        $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','_','_','','');
        $s = str_replace($tr,$eng,$key);
        $s = strtolower($s);
        $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = preg_replace('/#/', '', $s);
        $s = str_replace('.', '', $s);
        $s = trim($s, '-');

        return $s;
    }
    public function search_view($key){
        $result=Content::where('title','like','%'.$key.'%')->orWhere('description','like','%'.$key.'%')->paginate(9);


        return view('client.search',['key'=>$key,'results'=>$result]);
    }
    public function continue_search(Request $req){
        $currentPage=$req->page;
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        $result=Content::where('title','like','%'.$req->key.'%')->orWhere('description','like','%'.$req->key.'%')->paginate(9);
        if (!count($result))return \response()->json([
            'error'=>'items not found',
            'error_code'=>'itnf-0',

        ]);
        return \response()->view('section.continue_search',['list'=>$result]);
    }
    public static function calc_ratescore($id){
        $total=0;
        $total_ds=0;$total_ls=0;$total_ab=0;
        $rates=Rate::where('content_id',$id)->get();
        foreach ( $rates as $item){
            $score=($item->rate_ds+$item->rate_ls+$item->rate_ab)/3;
            $total_ds+=$item->rate_ds;
            $total_ls+=$item->rate_ls;
            $total_ab+=$item->rate_ab;
            $total+=$score;
        }

       if (count($rates)){
           $total = $total/count($rates);
           $total_ds=$total_ds/count($rates);
           $total_ls=$total_ls/count($rates);
           $total_ab=$total_ab/count($rates);
       }
        return
            [
                'total'=>number_format($total,1,'.',','),
                'total_ds'=>number_format($total_ds,1,'.',','),
                'total_ls'=>number_format($total_ls,1,'.',','),
                'total_ab'=>number_format($total_ab,1,'.',','),

            ];
    }
    public static function related($id){
        $current=Content::where('id',$id)->first();
        return Content::where('title','like','%'.$current->title.'%')
            ->orWhere('description','like','%'.$current->description.'%')
            ->orWhere('title','like','%'.$current->description.'%')
            ->orWhere('description','like','%'.$current->title.'%')->get();
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
        $months=['Ocak','??ubat','Mart','Nisan','May??s','Haziran','Temmuz','A??ustos','Eyl??l','Ekim','Kas??m','Aral??k'];
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
                'message'=>'L??tfen art arda de??erlendirme g??ndermeyiniz.'
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
                'message'=>'L??tfen art arda rapor g??ndermeyiniz.'
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
