<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function login(){
        return view('home.login');
    }
    public function loginauth(){

        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = request()->email;
        $password = request()->password;
        $DB_user = User::where('email',$email)->first();
        if($DB_user->email != $email || !Hash::check($password,$DB_user->password)) {
            return redirect()->back()->with('error', 'Incorrect username or password');
        }else{
            Session::put('username',$DB_user->name);
            Session::put('email',$DB_user->email);
            Session::put('password',$DB_user->password);
            return redirect()->route('home.index');
        }
        
    }
    public function register(){
        return view('home.register');
    }
    public function store(){

        request()->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);

        $username = request()->username;
        $email = request()->email;
        $password = request()->password;
        
        User::create([
            'name'=> $username,
            'email'=> $email,
            'password'=> $password,
        ]);

        Session::put('username',$username);
        Session::put('email',$email);
        Session::put('password',$password);
        
        return redirect()->route('home.index');

    }

   
}
