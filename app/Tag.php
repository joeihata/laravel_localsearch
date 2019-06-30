<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function book() {
        return $this->belongsToMany('Book');
    }
}
