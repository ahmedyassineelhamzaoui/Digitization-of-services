<?php

namespace App\Http\Repositories;

interface RoleRepository
{
    public function getPaginatedRoles($perPage);

    public function findById($id);

    public function findByName($name);

    public function syncPermissions(Role $role, array $permissions);

    public function save(Role $role);
    
}