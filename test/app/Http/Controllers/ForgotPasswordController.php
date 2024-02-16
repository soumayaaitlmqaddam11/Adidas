<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
   public function forgetPassword(){
        return view('forget-password');
    }
   public function forgetPasswordPost(Request $request){
       $request->validate([
        'email' => "required|email|exists:users"

       ]);
       $user=User::where('email',$request->email)->first();
       $token = Str::random(64);
       $user->remember_token=$token;
       $user->save();
    Mail::to($user->email)->send(new ForgotPassMail($user));
       return redirect()->to(route("forget.password"))->with("success","We have send an message");
    }
   public function resetPassword($token){
         return view("new-password",compact('token'));


    }
   public function resetPasswordPost($token,Request $request){
          $request->validate([
            'password' => 'required', 'min:6', 'confirmed',
            'password-confirmation' => 'required'

          ]);
          $updatePassword=User::where('remember_token',$token)->first();
          
         
          if($updatePassword){
            $remember_token=Str::random(40);
            $updatePassword->remember_token=$remember_token;
            $updatePassword->password=$request->password;
            $updatePassword->save();
            return redirect()->to(route('login'))->with("success","password reset success");
          }
          return back()->with("error","Invalid");
         
        }
}
