<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'birth_year', 'death_year', 'mother_relative_id', 'father_relative_id',
        'husband_relative_id', 'wife_relative_id',
    ];

    public function mother()
    {
        return $this->belongsTo('App\Relative', 'mother_relative_id');
    }

    public function father()
    {
        return $this->belongsTo('App\Relative', 'father_relative_id');
    }

    public function husband()
    {
        return $this->belongsTo('App\Relative', 'husband_relative_id');
    }

    public function wife()
    {
        return $this->belongsTo('App\Relative', 'wife_relative_id');
    }

    public function fromUser()
    {
        return $this->belongsTo('App\Relative', 'user_id');
    }
}
