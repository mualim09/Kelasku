<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

}
