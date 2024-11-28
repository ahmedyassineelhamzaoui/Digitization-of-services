<?php

namespace App\Http\Repositories;

interface RoleRepository
{
    public function getAllRoles($perPage = 10);

    public function findRoleById($id);

    public function updateRole($id, array $data);

    public function deleteUser($id);
}
