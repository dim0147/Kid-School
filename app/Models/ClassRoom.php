<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    /**
     * The class's users 
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'class_room_users', 'class_room_id', 'user_id')->using(ClassRoomUser::class);
    }
}
