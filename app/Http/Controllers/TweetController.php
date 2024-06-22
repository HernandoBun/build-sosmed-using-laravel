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

        $request->validate([
            'postingan' => ['required'],
        ]);


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
    
    // function halaman edit
    public function edit($id)
    {

        // mengirim data 'tweet' yg diambil dari file models Tweet berdasarkan id
        return view('tweets/edit', [

            // mencari sebuah sebuah tweet dari database berdasarkan id
            // dan disimpan di dalam variabel 'tweet', variabel ini nantinya dapat digunakan di tempat lain
            'tweet' => Tweet::find($id),
        ]);
    }


    // function menyimpan hasil edit
    public function update(Request $request, $id)
    {

       
        $tweet = Tweet::find($id);

        $tweet->update([
            'user_id' => auth()->id(), //user yang sedang login
            'postingan' => $request->postingan,
        ]);

        // setelah berhasil menyimpan tweet, maka kirim session flash
        session()->flash('success', 'Berhasil update tweet');

        // balik ke halaman dashboard jika berhasil 
        return to_route('dashboard');

    }
    
    public function hapus($id)
    {
       $tweet = Tweet::find($id);

       $tweet->delete();

       session()->flash('danger', 'Berhasil hapus tweet');

        // balik ke halaman dashboard jika berhasil 
        return to_route('dashboard');
    }

    public function perluas($tweet)
    {
        return view('tweets/perluas', [
            'tweet' => Tweet::find($tweet)
                                  # parameter
        ]);
    
}


}