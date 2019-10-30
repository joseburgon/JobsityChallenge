<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class)->select('name');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /* public function author()
    {
        return $this->belongsTo(User::class)->select('name')->get();
    } */
}
