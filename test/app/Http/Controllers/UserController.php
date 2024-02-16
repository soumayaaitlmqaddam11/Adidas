<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function liste_user(){
        $users = DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.*', 'roles.name as role_name')
        ->paginate(5);
        return view('user.user', compact('users'));
    } 
    
    public function ajouter_user(){
        $roles=role::all();
        return view('user.ajouter', compact('roles'));
    }
    public function ajouter_user_traitement(Request $request){
         $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role_id'=>'required',
         ]);
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role_id = $request->role_id;
         $user->save();
       return redirect('/user')->with('status','user a bien été ajouté avec succés');
    }
    public function update_user($id){
        $user = User::find($id);
        $roles= role::all();
        return view('user.update',compact('user','roles'));
    }
    public function update_user_traitement(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role_id'=>'required',
         ]);
         $user = User::find($request->id);
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role_id = $request->role_id;
         $user->update();
         return redirect('/user')->with('status','user a bien été modifié avec succés');

    }
    public function delete_user($id){
         $user = User::find($id);
         $user->delete();
         return redirect('/user')->with('status','user a bien été supprimé avec succés');

    }
}
