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

    <div class=" p-2 text-w-5000">

        <form action="{{ route('comments.store', $tweet) }}" class="form-control" method="POST">
            @csrf
            <textarea 
                    name="komentar"  
                    rows="3" 
                    class=" textarea textarea-bordered 

                    @error ('komentar')
                    textarea-error
                    @enderror mb-2" 

                    placeholder="tuliskan komentar"></textarea>

                    @error('komentar')
                            {{-- message error bawaan dari blade --}}
                        <span class="text-error">{{ $message }}</span>
                    @enderror

            <input type="submit" value="Komen!" class="btn btn-outline btn-success">
        </form>
        <div class="mt-4 flex flex-col space-y-2 p-2">
        {{-- mengambil $tweets yg dikirim oleh fungsi tampil di controller --}}
        @foreach ($tweet->comments as $comment)
            <div class="card bg-primary w-96 text-primary-content mb-2">
                
                <div class="card-body">
                    {{-- nama user --}}   {{-- akses tabel user kolom name --}} 
                    <h2 class="card-title">{{ $comment->user->name }}</h2>

                    {{-- tweet user --}}
                    <p>{{ $comment->komentar }}</p>
                </div>

            </div>
        @endforeach
    </div>
    </div>
   
</x-app-layout>
