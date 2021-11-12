<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ClassRoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classRoomIds = array(1, 2, 3, 4, 5);
        $user = User::find(4);
        $user->classRooms()->attach($classRoomIds); 

        $user->save();
    }
}
