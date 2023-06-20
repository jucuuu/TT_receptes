<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit comment
            </h2>
        </header>
    
        <form method="POST" action="/comments/{{$comment->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="content"
                    class="inline-block text-lg mb-2"
                    >Content</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="content"
                    value="{{$comment->content}}"
            />
    
            <div class="mb-6">
                <button
                    class="bg-laravel text-sky-500 rounded py-2 px-4 hover:bg-black"
                >
                    Update the comment
            </button>
    
                <a href="/recipes/{{$comment->recipe_id}}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
    </x-layout>