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
    
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
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
        $user = auth()->user();
        if (!$user) {
            return view('errors.404');
        }

        if ($user->hasPermissionTo('modifier-rôle')) {

            $result = $this->roleService->updateRole($request->role_editId, $request->name, $request->permission);

            if (isset($result['error'])) {
                return response()->json(['error' => $result['error']]);
            }

            return response()->json(['message' => $result['message']]);
        }

        return view('errors.403');
    }
}
