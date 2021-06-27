<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function members()
    {
        return $this->belongsTo(Member::class);
    }

    public function teaches()
    {
        return $this->hasMany(Teach::class);
    }
}
