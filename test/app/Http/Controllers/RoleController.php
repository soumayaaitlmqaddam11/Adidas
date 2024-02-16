<?php

namespace App\Http\Controllers;

use App\Models\permission;
use App\Models\permission_role;
use App\Models\permissions_roles;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function liste_role(){
        $roles = DB::select('select permissions_roles.*, roles.name as role_name, permissions.name_permission as permessions_name,roles.id as role_id from permissions_roles join roles on permissions_roles.role_id=roles.id join permissions on permissions.id=permissions_roles.permission_id');
        $uniqueRoles = [];
        foreach ($roles as $role) {
            $roleId = $role->role_id;
            if (!isset($uniqueRoles[$roleId])) {
                $uniqueRoles[$roleId] = (object) $role;
                $uniqueRoles[$roleId]->permissions = [];
            }

            $uniqueRoles[$roleId]->permissions[] = $role->permessions_name;
        }

        $permessions = permission::all();
        return view('Role.role', compact('uniqueRoles', 'permessions'));
    
    } 
    
    public function ajouter_role(){
        $permissions=permission::all();
        return view('role.ajouter',compact('permissions'));
    }
    
    public function ajouter_role_traitement(Request $request){
         $request->validate([
            'name'=>'required',
         ]);
        
         $role = new role();
         $role->name = $request->name;
         $role->save();
          $role_id = $role->id;       
           foreach($request->state as $permission ) {
            permissions_roles::create([
                'role_id' => $role_id,
                'permission_id' => $permission,
            ]);
         }
       return redirect('/ajouter')->with('status','role a bien été ajouté avec succés');
    }
    public function update_role($id){
        $role = role::find($id);

        return view('role.update',compact('role'));
    }
    public function update_role_traitement(Request $request){
        $request->validate([
            'name'=>'required',
         ]);
         $role = role::find($request->id);
         $role->name = $request->name;
         $role->update();
         return redirect('/role')->with('status','role a bien été modifié avec succés');

    }
    public function delete_role($id){
         $role = role::find($id);
         $role->delete();
         return redirect('/role')->with('status','role a bien été supprimé avec succés');

    }
}
