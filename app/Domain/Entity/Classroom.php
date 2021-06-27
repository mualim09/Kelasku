<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function teaches()
    {
        return $this->hasMany(Teach::class, 'teacher_id');
    }

    public function takes()
    {
        return $this->hasMany(Take::class, 'student_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
