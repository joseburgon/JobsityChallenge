<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //
    protected $fillable = [
        'id_str', 'internal_user_id', 'profile_image_url',
        'text', 'user_name', 'screen_name', 'hidden', 'class',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('twitter_username');
    }
}
