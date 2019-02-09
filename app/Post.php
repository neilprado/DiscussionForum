<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function theme()
    {
        return $this->belongsTo('App\Theme', 'theme_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }
}
