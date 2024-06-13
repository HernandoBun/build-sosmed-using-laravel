<x-app-layout>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tweet App</title>
        <x-slot name="title">
            Dashboard
        </x-slot>

        <style>
            .notif-sukses {
                background-color: #d4edda;
                color: #155724;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 10px;
            }
            .notif {
                background-color: #f8d7da;
                color: #721c24;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 10px;
            }
            .card {
                border: 1px solid #e2e8f0;
                border-radius: 8px;
                overflow: hidden;
                margin-bottom: 20px;
                color: black
            }
            .card-title {
                font-weight: bold;
            }
            .card-body {
                padding: 20px;
            }
            .card-action {
                padding: 10px;
                border-top: 1px solid #e2e8f0;
                background-color: #f1f5f9;
            }
            .btn {
                display: inline-block;
                padding: 8px 16px;
                border-radius: 5px;
                text-align: center;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .btn-biru {
                background-color: #1d4ed8;
                color: white;
            }
            .btn-kuning {
                background-color: #f59e0b;
                color: white;
            }
            .btn-merah {
                background-color: #ef4444;
                color: white;
            }
            .textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #e2e8f0;
                border-radius: 5px;
                font-display: black;
            }
        </style>
    </head>
    <body class="bg-gray-100 text-gray-900">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    
                    {{-- jika session di controller berhasil dikirmkan maka tampilkan pesan berhasil  --}}
                    @if(session('success'))
                        <div class="alert notif-sukses mb-2">{{ session('success') }}</div>
                    @endif
    
                    {{-- pesan untuk session hapus tweet  --}}
                    @if(session('danger'))
                        <div class="alert notif mb-2">{{ session('danger') }}</div>
                    @endif
    
                    <div>
                        <form action="{{ route('tweets.simpan') }}" class="form-control" method="POST">
                            {{-- karena menggunakan method post, maka harus menggunakan token @csrf, agar tidak bisa dipakai oleh pihak ketiga --}}
                            @csrf
                            <textarea name="postingan" id=""
                                      cols="30" rows="3" 
                                      class="textarea textarea-bordered mb-2" 
                                      placeholder="Tuliskan Sesuatu"></textarea>
                            
                            <input type="submit" value="Posting!" class="btn btn-biru mb-10">
                        </form>
    
                        @foreach ($tweets as $tweet)
                            <div class="card">
                                <div class="card-body bg-primary text-black">
                                    {{-- nama user --}}
                                    <h2 class="card-title">{{ $tweet->user->name }}</h2>

                                    {{-- tweet user --}}
                                    <p>{{ $tweet->postingan }}</p>
                                </div>
                                <div class="card-action">
                                    <a href="{{ route('tweets.edit', $tweet->id) }}" class="btn btn-kuning">Edit!</a>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    

</x-app-layout>
