<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            'name' => 'Super Admin',
            'slug' => 'super-admin',
            'description' => 'Ceo'
        ];

        $permision = Permission::get();
        Role::create($roles)->permissions()->attach($permision->modelKeys());

 
    }
}
