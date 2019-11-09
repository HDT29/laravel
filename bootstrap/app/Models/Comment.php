<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id','post_id'];
    public function user()
    {
        return $this->beLongsTo(User::class);
    }
    public function post()
    {
        return $this->beLongsTo(Post::class);
    }
}
