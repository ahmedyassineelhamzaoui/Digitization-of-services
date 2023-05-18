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

            return view('layouts.dashboard.role-dash', compact('roles','permissions'));
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
}
