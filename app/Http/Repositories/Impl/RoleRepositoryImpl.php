<?php


namespace App\Http\Repositories\Impl;

use Spatie\Permission\Models\Role;

class RoleRepositoryImpl implements RoleRepository
{
    
    public function getPaginatedRoles($perPage = 5)
    {
        return Role::paginate($perPage);
    }
    
    public function findById($id)
    {
        return Role::find($id);
    }

    public function findByName($name)
    {
        return Role::where('name', $name)->first();
    }

    public function syncPermissions(Role $role, array $permissions)
    {
        $role->syncPermissions($permissions);
    }

    public function save(Role $role)
    {
        return $role->save();
    }
}
