<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'aluno_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'theme_id');
    }
}
