<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

class Trick extends Model
{
    //
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
