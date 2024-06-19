<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('tweets.update', $tweet->id) }}" class="form-control" method="post">
                @csrf
                
                @method('PUT')

                <div class="mb-3 ">

                    <textarea name="postingan" id="" cols="30" rows="3" class="textarea textarea-bordered w-full">
                        {{ $tweet->postingan }}
                    </textarea>                    
                </div>

                <div>
                    <input type="submit" value="Edit" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
</x-app-layout>