<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model {


    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];


    protected $dates = ['published_at'];


    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnPublished($query)
    {
        $query->where('published_at','>',Carbon::now());
    }


   public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);

    }

    public function getPublishedAtAttribute($date)
    {
            return Carbon::parse($date)->format('Y-m-d');
    }



    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

}