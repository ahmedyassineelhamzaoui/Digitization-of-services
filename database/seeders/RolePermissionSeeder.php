<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'lister-rôles',
            'créer-rôle',
            'modifier-rôle',
            'supprimer-rôle',
            'créer-utilisateur',
            'modifier-utilisateur',
            'supprimer-utilisateur',
            'lister-utilisateurs',
            'lister-catégorie',
            'créer-catégorie',
            'modifier-catégorie',
            'supprimer-catégorie',
            'lister-demandes',
            'modifier-demandes',
            'supprimer-demandes',
            'voir-demande-action'  
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = 'Administrateur';
        $controleur = 'contrôleur';
        $user = 'utilisateur';

        Role::create(['name' => $admin])->givePermissionTo(Permission::all());

        Role::create(['name' => $controleur])->givePermissionTo([
            $permissions[13],  $permissions[15],
        ]);

        Role::create(['name' => $user])->givePermissionTo([
            $permissions[12]
        ]);
        
    
    }
}
