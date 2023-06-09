<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $admin = User::create([
                'full_name' => 'khaled', 
                'email' => 'admin@adminable.com',
                'password' => bcrypt('eRROR404@'),
            ]);
            $admin->assignRole('Administrateur');
        
            $user = User::create([
                'full_name' => 'ahmed', 
                'email' => 'ahmed@gmail.com',
                'password' => bcrypt('Password123!'),
            ]);
        
            $user->assignRole('utilisateur');
        
            $controller = User::create([
                'full_name' => 'said', 
                'email' => 'said@gmail.com',
                'password' => bcrypt('12345678'),
            ]);
        
            $controller->assignRole('contrôleur');
           
        
    }
}