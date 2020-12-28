<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController2 extends Controller
{
    public function login(Request $request){

        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user=User::where('email',$request->email)->first();    
            /*if($user->userType===5){

                return redirect()->route('w');
            }*/
            //return redirect()->route('home');
            return redirect()->route('w');
        }
        return redirect()->back();
    }


}