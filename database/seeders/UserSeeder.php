<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
                'full_name' => 'LOBOGNON', 
                'email' => 'admin@adminable.com',
                'password' => bcrypt('eRROR404@'),
            ]);
            $admin->assignRole('Administrateur');
        
            $user = User::create([
                'full_name' => 'Kouadio Adama', 
                'email' => 'Adama@gmail.com',
                'password' => bcrypt('Password123!'),
            ]);
        
            $user->assignRole('utilisateur');
        
           
            $controller1 = User::create([
                'full_name' => 'Coulibaly Fanta', 
                'email' => 'Coulibaly@gmail.com',
                'password' => bcrypt('Coulibaly@gmail.com'),
            ]);
        
            $controller1->assignRole('controleur 1');

            $controller2 = User::create([
                'full_name' => 'Koffi Abiba', 
                'email' => 'Abiba@gmail.com',
                'password' => bcrypt('Abiba@gmail.com'),
            ]);
        
            $controller2->assignRole('controleur 2');
            $controller3 = User::create([
                'full_name' => 'Diarrassouba Bakary', 
                'email' => 'Bakary@gmail.com',
                'password' => bcrypt('Bakary@gmail.com'),
            ]);
        
            $controller3->assignRole('controleur 3');
    }
}