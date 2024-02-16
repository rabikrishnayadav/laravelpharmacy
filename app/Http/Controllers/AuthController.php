<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Model\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function login_post(Request $request)
    {
        // dd($request->all());

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
            if(Auth::User()->is_role == '1'){
                return redirect()->intended('admin/dashboard');
            }else{
                return redirect()->back()->with('error', 'Please enter the correct credentials');
            }
        }else{
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }
}
