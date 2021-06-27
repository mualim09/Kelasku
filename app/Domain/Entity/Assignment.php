<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function marks(){
        return $this->hasMany(Mark::class);
    }
}
