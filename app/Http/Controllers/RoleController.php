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
        if($user->hasPermissionTo('role-list')){
            $roles = Role::paginate(5);
            return view('pages.roles', compact('roles'));
        }
         return view('errors.403');
    }
}
