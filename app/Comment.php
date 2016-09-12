<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function articles()
    {
        return $this->belongsTo('App\Article');
    }

    public function children()
    {
        return $this->hasMany('App\Comment','parent_id','id');
    }

}
