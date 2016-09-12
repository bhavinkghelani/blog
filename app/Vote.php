<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'vote';

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function articles()
    {
        return $this->belongsTo('App\Article');
    }

    public function comments()
    {
        return $this->belongsTo('App\Comment');
    }
}
