<x-app-layout>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                    <div class="p-6 text-white-900 mb-2">

                        <form action="{{ route('tweets.simpan') }}" class="form-control" method="POST">
                            @csrf
                            <textarea 
                                    name="postingan"  
                                    rows="3" 
                                    class=" textarea textarea-bordered 

                                    @error ('postingan')
                                        textarea-error
                                    @enderror mb-2" 


                                    placeholder="tuliskan tweet"></textarea>

                                    @error('postingan')
                                    {{-- message error bawaan dari blade --}}
                                    <span class="text-error">{{ $message }}</span>
                                    @enderror



                            <input type="submit" value="Posting!" class="btn btn-outline btn-info">
                        </form>
                    </div>

                    <div class="mt-4 flex flex-col space-y-2">
                    {{-- mengambil $tweets yg dikirim oleh fungsi tampil di controller --}}
                    @foreach ($tweets as $tweet)
                        <div class="card bg-primary w-96 text-primary-content mb-2">
                            
                            <div class="card-body">
                                {{-- nama user --}}   {{-- akses tabel user kolom name --}} 
                                <h2 class="card-title">{{ $tweet->user->name }}</h2>

                                {{-- tweet user --}}
                                <p>{{ $tweet->postingan }}</p>
                            </div>

                            <div class="card-action p-3 ">
                                <a href="{{ route('tweets.edit', $tweet->id) }}" class="btn btn-warning">Edit!</a>
                                <form action="{{ route('tweets.hapus', $tweet->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-error" value="Hapus">
                                </form>
				<p class="text-end p-3 text-xs" style="display:inline">{{ $tweet->created_at->diffForHumans() }}</p>
                            </div>

                            
                        </div>
                    @endforeach
                </div>

                </div>

                
            </div>
        </div>
    
</x-app-layout>