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
    public function showCreateRoleForm()
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
         }
        if(!$user->hasPermissionTo('role-create')){
            return view('errors.403');
        }
        $permissions=Permission::all();
        return view('pages.create-role',compact('permissions'));
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
    public function createRole(Request $request)
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
         }
        if(!$user->hasPermissionTo('créer-rôle')){
            return view('errors.403');
        }
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission);
        return response()->json([
            'message' => 'le rôle a été bien créer'
        ]);
    }
    public function showRole($id)
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
         }
        if(!$user->hasPermissionTo('modifier-rôle')){
            return view('errors.403');
        }
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('name')->toArray();
        return response()->json([
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }
    public function deleteRole(Request $request)
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
         }
        if(!$user->hasPermissionTo('supprimer-rôle')){
            return view('errors.403');
        }
        $role = Role::find($request->role_deletedId);
        if(!$role){
            return redirect()->back()->with('error','le role n\'éxiste pas');
        }
        $role->delete();
        return redirect()->back()->with('success','le role a été bien supprimer');
    }
    public function updateRole(Request $request)
    {
        $user=auth()->user();
        if(!$user){
            return view('errors.404');
        }
        if($user->hasPermissionTo('modifier-rôle')){
            $request->validate( [
                'name' => [
                    'required',
                    'min:3'
                ],
            ]);
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
                $role->name = $request->name;
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
