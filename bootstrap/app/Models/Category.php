<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','user_id'];
    public function user()
    {
        return $this->beLongsTo(User::class);
    }
    public function post()
    {
        return $this->beLongsTo(Post::class);
    }
}
