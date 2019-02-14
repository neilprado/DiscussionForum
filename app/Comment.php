<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function posts()
    {
        return $this->belongsTo('App\Post', 'post_id');
    }
}
