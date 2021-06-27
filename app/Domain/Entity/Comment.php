<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function materials()
    {
        return $this->belongsTo(Material::class);
    }

    public function assignments()
    {
        return $this->belongsTo(Assignment::class);
    }
}
