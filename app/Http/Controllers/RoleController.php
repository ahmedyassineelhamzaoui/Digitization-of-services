<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role_has_permissions;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use App\Http\Services\RoleService;

class RoleController extends Controller
{
    
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function getRoles(Request $request)
    {

        $result = $this->roleService->getRoles();

        if (isset($result['error'])) {
            if ($result['error'] === 'Forbidden') {
                return view('errors.403');
            } elseif ($result['error'] === 'unauthenticated') {
                return view('errors.404');
            }
        }

        return view('layouts.dashboard.role-dash', [
            'roles' => $result['roles'],
        ]);
    }

    public function updateRole(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'permission' => 'required|array',
            'role_editId' => 'required|integer',
        ]);

        $result = $this->roleService->updateRole($request->role_editId, $request->name, $request->permission);

        if (isset($result['error'])) {
            if ($result['error'] === 'unauthenticated') {
                return view('errors.403');
            } elseif ($result['error'] === 'Forbidden') {
                return view('errors.403');
            } elseif ($result['error'] === 'Role not found') {
                return view('errors.404');
            }
        }
        return response()->json(['success' => $result['success']]);
    }
}
