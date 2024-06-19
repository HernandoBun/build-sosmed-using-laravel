<x-app-layout>   

    <div class=" p-6 flex flex-col space-y-2 text-primary-content">
        {{-- mengambil $tweets yg dikirim oleh fungsi tampil di controller --}}
        <div class="card bg-accent w-96 text-primary-content mb-2">
                
            <div class="card-body">
                {{-- nama user --}}   {{-- akses tabel user kolom name --}} 
                <h2 class="card-title">{{ $tweet->user->name }}</h2>

                {{-- tweet user --}}
                <p>{{ $tweet->postingan }}</p>
            </div>

                
        </div>
        <div class="divider divider-accent">KOMENTAR</div>
    </div>
   
</x-app-layout>
