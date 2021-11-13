<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'add role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'add permission']);
        Permission::create(['name' => 'edit permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'add teacher']);
        Permission::create(['name' => 'edit teacher']);
        Permission::create(['name' => 'delete teacher']);

        Permission::create(['name' => 'add class']);
        Permission::create(['name' => 'edit class']);
        Permission::create(['name' => 'delete class']);
    }
}
