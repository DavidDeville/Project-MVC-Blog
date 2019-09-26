<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'billet_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function billets()
    {
        return $this->belongsTo('App\Billets', 'billet_id');
    }
}
