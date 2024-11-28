<?php


namespace App\Http\Services;

use App\Http\Repositories\RoleRepository;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleService
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getRoles()
    {
        $user = Auth::user();
        if(!$user){
            Log::error("User not found");
            return ['error' => 'unauthenticated'];
        }

        if (!$user->hasPermissionTo('lister-rôles')) {
            Log::error("Forbidden ".$user->full_name." dosn't have permission to list roles");
            return ['error' => 'Forbidden'];
        }

        Log::info("User ".$user->full_name." existe and has permission to list roles");
        $roles = $this->roleRepository->getPaginatedRoles(5);
        return [
            'roles' => $roles
        ];
    }

    public function showRole($id){
        $user = Auth::user();
        if(!$user){
            Log::error("User not found");
            return ['error' => 'unauthenticated'];
        }

        if (!$user->hasPermissionTo('modifier-rôle')) {
            Log::error("Forbidden ".$user->full_name." dosn't have permission to update roles");
            return ['error' => 'Forbidden'];
        }

        $role = $this->roleRepository->findById($id);

        if (!$role) {
            Log::error("Role with ID {$id} not found");
            return ['error' => 'Role not found'];
        }

        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('name')->toArray();
        
        return [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ];
    }

    public function updateRole($roleId, $name, $permissions)
    {

        $user = Auth::user();
        if(!$user){
            Log::error("User not found");
            return ['error' => 'unauthenticated'];
        }

        $role = $this->roleRepository->findById($roleId);

        if (!$role) {
            Log::error("Role not found");
            return ['error' => 'Role not found'];
        }

        $roleExist = $this->roleRepository->findByName($name);

        Log::info("Role ".$role->name." found");

        if ($roleExist && $roleExist->name !== $role->name) {

            Log::info($roleExist->name." This role already exist");

            return ['error' => 'This role already exists'];
        }

        Log::info("Role ".$role->name." will be updated");

        $role->name = $name;
        $this->roleRepository->syncPermissions($role, $permissions);
        $this->roleRepository->save($role);

        return ['success' => 'Role has been successfully updated'];
    }

   
}