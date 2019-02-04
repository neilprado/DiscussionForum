<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'aluno_id');
    }

    public function themes()
    {
        return $this->belongsTo('App\Theme', 'theme_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }
}
