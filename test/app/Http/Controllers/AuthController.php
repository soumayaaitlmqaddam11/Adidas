<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function registration()
    {
        return view('registration');
    }
    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password');
        }
        $role = $user->role_id;

        session(['user_id' => $user->id]);
        session(['user_role' => $role]);
        if(session('user_role') == 1){
            return redirect('/category');
        }
        return redirect('/');


        
    }
    public function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role_id'] = 2;

        $user = User::create($data);
        if (!$user){
            return redirect(route('registration'))->with("error", "Registration failed, try again.");
        }
        return redirect(route('login'))->with("success", "Registration success,login to access the app");
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
