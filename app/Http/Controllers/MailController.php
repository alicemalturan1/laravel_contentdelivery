<?php

namespace App\Http\Controllers;

use App\Models\DeveloperTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_developer_support(Request $req){
        $last_create=null;
        if(DeveloperTicket::where('from_id',Auth::id())->first()){
            $last_create= DeveloperTicket::where('from_id',Auth::id())->first()->created_at;
            $last_create= Carbon::parse($last_create);
        }

        if (Carbon::now()->diffInMinutes($last_create)>5 || !$last_create){
            $token = Crypt::encryptString(time().Auth::id().$req->title.$req->subject);
            Mail::send('mail.developer_support',
                [
                    'name'=>Auth::user()->name." ".Auth::user()->surname,
                    'content'=>$req->content,
                    'subject'=>$req->subject,
                    'title'=>$req->title,
                    'token'=>$token
                ],
                function($message){
                $message->to("alicemalturan1@gmail.com","Ali Cemal")->subject('Destek Talebi');
            });
            DeveloperTicket::insert([
                'title'=>$req->title,
                'content'=>$req->content,
                'subject'=>$req->subject,
                'created_at'=>Carbon::now(),
                'token'=>$token
            ]);
            return response()->json([
                'status'=>'success',
                'now'=>Carbon::now(),
                'from-id'=>Auth::id(),
                'token'=>$token
            ]);
        }
        return response()->json([
            'status'=>'error',
            'error'=>'5 dakikada bir bilet oluşturabilirsiniz.',
        ]);
    }
}
