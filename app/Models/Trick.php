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

    public function labels(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Label::class, 'trick_labels');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
