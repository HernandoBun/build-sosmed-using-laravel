<x-app-layout>
   <div class="py-12"> 
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            <form action="{{ route('tweets.update', $tweet->id) }}" class="form-control" method="POST">
                @csrf
                @method('PUT')
                <textarea 
                        name="postingan"  
                        rows="3" 
                        class=" input input-secondary ">{{ $tweet->postingan }}</textarea>

                <input type="submit" value="Edit!" class="btn btn-secondary mt-4" style="width: 3cm">
            </form>
            <div>
                <a href="{{ route('dashboard')}}" class="btn btn-error">Kembali</a>
            </div>
        </div>

   </div>
</x-app-layout>