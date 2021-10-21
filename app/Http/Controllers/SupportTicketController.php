<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SupportTicketController extends Controller
{
    public function update_presence(Request $req){
        $req->validate([
            'id'=>'required',
            'presence'=>'required'
        ]);
        SupportTicket::where('id',$req->id)->update([
            'presence'=>$req->presence,
            'updated_at'=>Carbon::now('GMT+3')
        ]);
    }
    public function show_modal(Request $req){
        $req->validate([
            'id'=>'required'
        ]);

        return view('admin.section.support_ticket-modallist',['main'=>SupportTicket::where('id',$req->id)->first(),'messages'=>SupportTicket::orWhere('id',$req->id)->orWhere('reply_id',$req->id)->get()]);
    }
}
