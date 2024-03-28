<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        // dd(Hash::make(123)); // Code For Generate Password Hash
        if(Auth::check()){
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }else{
                return view('auth.login');
            }
        }
        return view('auth.login');
    }

    // function Check login
    function AuthLogin(Request $request)
    {
        //dd($request->all()); // Code Console view token take value From texbox Or Form
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->txtemail, 'password' =>$request->txtpassword], $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Please Enter Correct email and password');
        }
    }

    function logout(){
        Auth::logout();
        return redirect(url(''));
    }
}
