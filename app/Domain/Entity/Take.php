<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Take extends Model
{
    public function students()
    {
        return $this->belongsTo(User::class);
    }

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }
}
