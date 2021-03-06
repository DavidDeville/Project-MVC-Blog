<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billets extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'tags', 'content', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments', 'billet_id');
    }
}
