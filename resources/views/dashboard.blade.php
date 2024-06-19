<x-app-layout>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                    <div class="p-6 text-gray-900 mb-2">

                        <form action="{{ route('tweets.simpan') }}" class="form-control" method="POST">
                            @csrf
                            <textarea 
                                    name="postingan"  
                                    rows="3" 
                                    class=" textarea textarea-bordered 
                                    placeholder="tuliskan tweet"></textarea>

                            <input type="submit" value="Posting!" class="btn btn-outline btn-info">
                        </form>
                    </div>

                </div>

                
            </div>
        </div>
    
</x-app-layout>