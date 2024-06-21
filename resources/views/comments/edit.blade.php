<x-app-layout>
    <div class="py-12"> 
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="divider divider-secondary text-primary-content">EDIT KOMENTAR</div>

                <form action="{{ route('comments.update', [$comment ->tweet_id, $comment]) }}" class="form-control" method="POST">
                @csrf
                @method('PUT')
                <textarea 
                    name="komentar"  
                    rows="3" 
                    class=" textarea textarea-secondary ">{{ $comment->komentar }}
                </textarea>
 
                <input type="submit" value="Edit!" class="btn btn-secondary mt-4" style="width: 3cm">
                 
                <div>
                    <a href="{{ route('dashboard')}}" class="btn btn-error mt-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
 </x-app-layout>