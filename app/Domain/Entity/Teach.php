<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
    public function teachesr()
    {
        return $this->belongsTo(User::class);
    }

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }
}
