<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function students()
    {
        return $this->HasMany(Student::class);
    }

    public function classrooms()
    {
        return $this->hasOne(Classroom::class);
    }
}
