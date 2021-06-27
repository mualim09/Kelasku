<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function members()
    {
        return $this->belongsTo(Member::class);
    }

    public function takes()
    {
        return $this->hasMany(Take::class);
    }
}
