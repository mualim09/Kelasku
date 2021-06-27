<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrivateComment extends Model
{
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

}
