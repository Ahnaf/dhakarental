<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name' => 'Dashboard',
                'description' => 'Dashboard'
            ],
            [
                'name' => 'Admin List',
                'description' => 'Admin List'
            ],
            [
                'name' => 'Module',
                'description' => 'Module'
            ],
            [
                'name' => 'Permissions',
                'description' => 'Permissions'
            ],
            [
                'name' => 'Role',
                'description' => 'Role'
            ],
            [
                'name' => 'Activitylog',
                'description' => 'Activitylog'
            ],
            [
                'name' => 'DB Backup',
                'description' => 'Database Backup'
            ],
            
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
