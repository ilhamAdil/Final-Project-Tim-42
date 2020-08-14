<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function author() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'tags_has_questions', 'questions_id', 'tag_id');
    }
}
