<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TweetController::class, 'tampil'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// karena untuk menyimpan data, maka gunakan post
// menggunakan controller TweetController yg dimasukan dalam array
Route::post('/tweets', [TweetController::class, 'simpan'])
    ->middleware(['auth', 'verified'])
    ->name('tweets.simpan');


Route::get('/tweets/{id}', [TweetController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('tweets.edit');


Route::put('/tweets/{id}', [TweetController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('tweets.update');

Route::delete('/tweets/{id}', [TweetController::class, 'hapus'])
    ->middleware(['auth', 'verified'])
    ->name('tweets.hapus');

    Route::get('/perluas/{tweet}', [TweetController::class, 'perluas'])
    ->middleware(['auth', 'verified'])
    ->name('tweets.perluas');


Route::post('tweets/{tweets}/comments', [CommentController::class, 'store'] )
    ->middleware('auth', 'verified')
    ->name('comments.store');

    Route::get('tweets/{tweet}/comments/{comment}/edit', [CommentController::class, 'edit'] )
    ->middleware('auth', 'verified')
    ->name('comments.edit');


Route::put('tweets/{tweet}/comments/{comment}', [CommentController::class, 'update'] )
    ->middleware('auth', 'verified')
    ->name('comments.update');
    
require __DIR__.'/auth.php';
