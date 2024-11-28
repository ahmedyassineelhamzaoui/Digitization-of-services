<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role_has_permissions;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function getRoles()
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
         }
        if($user->hasPermissionTo('lister-rôles')){
            $roles = Role::paginate(5);
            $permissions=Permission::all();
            $bottonName = 'Ajouter Rôle';
            return view('layouts.dashboard.role-dash', compact('roles','permissions','bottonName'));
        }
        return view('errors.403');
    }
   
    
    
    public function updateRole(Request $request)
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
        }
        if($user->hasPermissionTo('modifier-rôle')){
         
            $role = Role::find($request->role_editId);
            $role_exist = Role::where('name',$request->name)->first();
            if($role_exist){
                if($role_exist->name == $role->name){
                    $role->name = $request->name;
                    $role->syncPermissions($request->permission);
                    $role->save();
            
                    return response()->json([
                        'message' => 'le rôle a été bien modifier '
                    ]);
                }
                return response()->json([
                    'error' => 'ce rôle déja existe '
                ]);
            }else{
                $role->syncPermissions($request->permission);
                $role->save();
                return response()->json([
                    'message' => 'le rôle a été bien modifier '
                ]);
            }
        }
        return view('errors.403');
    }
}
