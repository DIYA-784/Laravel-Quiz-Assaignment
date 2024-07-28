<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Auth;
use Illuminate\Support\Facades\Hash;
use validator;

class LoginController extends Controller
{
    public function reg(){
        return view('users.register');
    }
    
    public function reg_create(Request $request){
        // dd($req->all());
        $validated = $request->validate([
            'name' => 'required|max:30|min:3',
            'phone' => 'required|max:10',
            'email' => 'required|unique:members',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        $addAdmin = new Member();
        $addAdmin->name = $request->input('name');
        $addAdmin->phone = $request->input('phone');
        $addAdmin->email = $request->input('email');
        $addAdmin->password = Hash::make($request->input('password'));
        $addAdmin->save();
        return redirect()->route('user.login');
    }

    public function login(){
        return view('users.login');
    }

    public function login_create(Request $req){
        $chk_val = $req->all();
        if(Auth::guard('member')->attempt(['email'=>$chk_val['email'] , 'password'=>$chk_val['password']])){
            return redirect()->route('user.home')->with('error','Logged In Successfully!');
        }
        else{
            return back()->with('error','Invalid Email or Password');
        }
    }

    public function log_out(){
        Auth::guard('member')->logout();
        return redirect()->route('user.non_logged.index')->with('error','You logged out successfully');
        
    }
}
