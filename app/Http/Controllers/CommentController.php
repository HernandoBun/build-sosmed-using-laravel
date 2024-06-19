<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store (Request $request, $tweet)
    {
                
        Comment::create([
            'tweet_id' => $tweet,
            'user_id'=> auth()->id(),
            'komentar' => $request->komentar,
        ]);

        session()->flash('success', 'Berhasil menambahkan komentar');

        return redirect()->back();
    }

}