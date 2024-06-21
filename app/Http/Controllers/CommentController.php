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

    public function edit ($tweet, $comment)
    {
        return view('comments.edit', [
            'comment' => Comment::find($comment)
        ]);
    }

    public function update (Request $request, $tweet, $comment)
    {
        $comment = Comment::find($comment);

        $comment->update([
            'komentar' => $request->komentar
        ]);
        
        session()->flash('success', 'Berhasil memperbarui komentar');

        return to_route('tweets.perluas', $tweet);
    }



    


}