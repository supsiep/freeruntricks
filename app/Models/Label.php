<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //
    public function labels() {
        return $this->belongstoMany(Label::class, 'trick_labels');
    }
}
