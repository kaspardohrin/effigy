<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'comment',
        'post_id',
        'user_id',
    ];

    // a comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // a comment belongs to a post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
