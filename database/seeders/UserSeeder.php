<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        $admin->assignRole('admin');

        $moderator = User::create([
            'name' => 'moderator',
            'email' => 'moderator@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        $moderator->assignRole('moderator');

        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        $teacher->assignRole('teacher');

        $student = User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        $student->assignRole('student');

    }
}
