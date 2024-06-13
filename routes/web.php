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
require __DIR__.'/auth.php';
