<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderator']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);

        $admin->syncPermissions(
            [
                'add role',
                'edit role',
                'delete role',

                'add permission',
                'edit permission',
                'delete permission',

                'add user',
                'edit user',
                'delete user',

                'add teacher',
                'edit teacher',
                'delete teacher',

                'add class',
                'edit class',
                'delete class',
            ]
        );

        $moderator->syncPermissions(
            [
                'add teacher',
                'edit teacher',
                'delete teacher',

                'add class',
                'edit class',
                'delete class',
            ]
        );

        $teacher->syncPermissions(
            'edit class',
        );
    }
}
