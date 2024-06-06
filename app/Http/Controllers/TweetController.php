<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;


class TweetController extends Controller
{
    // store untuk fungsi menyimpan
    // Request = menerima request dari use Illuminate\Http\Request;
    // akan mengambil data dari form

    public function simpan(Request $request)
    {

        // jika menggunakan create harus mendefinisikan $fillable di file model Tweet
        Tweet::create([
            'user_id' => auth()->id(), //user yang sedang login
            'postingan' => $request->postingan,
        ]);

        // setelah berhasil menyimpan tweet, maka kirim session flash
        session()->flash('success', 'Berhasil posting tweet');

        // balik ke halaman dashboard jika berhasil 
        return to_route('dashboard');

    }

    // function menampilkan tweet user
    public function tampil()
    {
        // mengirim data 'tweets' yang diambil dari file model Tweet, menggunakan get, dan diurutkan oleh yg terbaru 
        return view('dashboard', [
            'tweets' => Tweet::latest()->get(),

        ]);
    }

    
}


