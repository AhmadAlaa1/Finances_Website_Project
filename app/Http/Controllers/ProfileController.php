<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        $user=User::where('email',session()->get('email'))->first();
        return view("profile.index",['name'=>$user->name,'email'=>$user->email,'amount'=>$user->amount]);
    }
    
    public function update(){
        request()->validate([
            'new_username'=>'required',
            'new_email'=>'required',
        ]);
        $user=User::where('email',session()->get('email'))->first();
        User::where('id',$user->id)->update(['name'=>request()->new_username,'email'=>request()->new_email]);
        return redirect()->route('profile.index');
    }
}
