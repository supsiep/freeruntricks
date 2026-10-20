<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //
    public function tricks(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongstoMany(Trick::class, 'trick_labels');
    }
}
