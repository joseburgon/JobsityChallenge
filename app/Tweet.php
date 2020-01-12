<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //
    protected $fillable = [
        'user_id', 'link', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('twitter_username');
    }
}
