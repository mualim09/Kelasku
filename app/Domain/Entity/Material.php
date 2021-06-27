<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
