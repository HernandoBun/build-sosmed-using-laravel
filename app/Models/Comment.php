<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tweet_id',
        'user_id',
        'komentar'
    ];

    public function tweet()
    {
        // komentar merupakan kepunyaan tweet
        return $this->belongsTo(Tweet::class);
    }

    // membuat relasi untuk menampilkan user yang berkomentar
    public function user()
    {
        // komentar merupakan kepunyaan user
        return $this->belongsTo(User::class);
    }

    // membuat relasi untuk menampilkan komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}