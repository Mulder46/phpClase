<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
    $admin = Role::create(['name' => 'administrator']);
    $author = Role::create(['name' => 'authour']);
    $reader = Role::create(['name' => 'reader']);
    
    //Permisos
    // $edit = Permission::create(['name' => 'edit articles']);
    // $read = Permission::create(['name' => 'read articles']);

     //Se pueden asignar varios roles a un permiso
     $roles = [$admin,$author];
     $edit = Permission::create(['name' => 'edit articles'])->syncRoles($roles);
 
     // o simplemente uno
     $read = Permission::create(['name' => 'read articles'])->assignRole($reader);
    }
}
