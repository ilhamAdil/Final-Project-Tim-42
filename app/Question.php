<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function author() {
        return $this->belongsTo('App\User');
    }
}
