<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'path',
        'hidden',
    ];

    // // a post is owned by a user
    // public function owner(User $user)
    // {
    //     return $this->user_id === $user->id;
    // }

    // // a post must only be liked once per person
    // public function liked(User $user)
    // {
    //     return $this->likes->contains('user_id', $user->id);
    // }

    // a post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // a post has multiple comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // a post has multiple likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
