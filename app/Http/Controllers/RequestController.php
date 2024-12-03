<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requests;

class RequestController extends Controller
{
    public function store(){

        request()->validate([
            'requesterid'=>'required',
            'amountrequest'=>'required|numeric',
            'message'=>'required'
        ]);

        $requester_id=User::where('name',session()->get('username'))->first();

        if($requester_id->id == request()->requesterid){
            return redirect()->route('payment.index')->with('error', "You can't Request to your self!");
        }else{

            Requests::create([
                'sender_id'=>$requester_id->id,
                'receiver_id'=>request()->requesterid,
                'amount'=>request()->amountrequest,
                'message'=>request()->message
            ]);

            return redirect()->route('payment.index')->with('success', 'Request Sent successful!');
            return redirect()->route('payment.index');
        }

    }
}
