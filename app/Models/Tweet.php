<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // mendefinisikan $fillable karena menggunakan create untuk tidak null
    protected $fillable = [
        'user_id',
        'postingan',
    ];


    // membuat relasi
    public function user ()
    {
        // sebuah tweet merupakan kepunyaan user
        return $this->belongsTo(User::class);
    }
}
