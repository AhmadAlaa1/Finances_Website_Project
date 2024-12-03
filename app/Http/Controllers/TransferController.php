<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transformation;

class TransferController extends Controller
{
    public function index(){
        return view('payment.index');
    }

    public function transferAuth($sendername,$receivername,$newamount){
        $sender = User::where('name',$sendername)->first();
        $receiver = User::where('name',$receivername)->first();
        if($receiver->name == $sender->name){
            return redirect()->route('payment.index')->with('error', "You can't send to your self!");
        }
        if($sender->amount < $newamount){
            throw new \Exception("Insufficient balance.");
        }else{
            $sender_amount = ($sender->amount)-$newamount;
            $receiver_amount = ($receiver->amount)+$newamount;
            User::find($sender->id)->update([
                'amount'=>$sender_amount,
            ]);
            
            User::find($receiver->id)->update([
                'amount'=>$receiver_amount,
            ]);

            return true;
        }
    }

    public function store(){

        request()->validate([
            'userid'=>'required',
            'amount'=>'required'
        ]);

        $sender_name = request()->session()->get('username');
        $sender = User::where('name',$sender_name)->first();
        $receiver_id = request()->userid;
        $receiver_name = User::find($receiver_id);
        $transfered_amount = request()->amount;
        
        try {
        if ($this->transferAuth($sender_name,$receiver_name->name, $transfered_amount)) {
                Transformation::create([
                    'sender_id' => $sender->id,
                    'receiver_id' => $receiver_id,
                    'amount' => $transfered_amount,
                ]);
            }
    
            return redirect()->route('payment.index')->with('success', 'Transfer successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
