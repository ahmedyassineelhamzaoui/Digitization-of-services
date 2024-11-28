<?php


namespace App\Http\Services;

use App\Repositories\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleService
{
    private $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function updateRole($roleId, $name, $permissions)
    {
        $role = $this->roleRepository->findById($roleId);
        
        if (!$role) {
            return ['error' => 'Role not found'];
        }

        // Check if a role with the same name exists
        $roleExist = $this->roleRepository->findByName($name);

        if ($roleExist && $roleExist->name !== $role->name) {
            return ['error' => 'This role already exists'];
        }

        $role->name = $name;
        $this->roleRepository->syncPermissions($role, $permissions);
        $this->roleRepository->save($role);

        return ['message' => 'Role has been successfully updated'];
    }
}