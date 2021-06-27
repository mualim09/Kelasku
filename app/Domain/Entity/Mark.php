<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function privatecomments()
    {
        return $this->hasMany(PrivateComment::class);
    }

    public function assignments(){
        return $this->belongsTo(Assignment::class);
    }

    
}
