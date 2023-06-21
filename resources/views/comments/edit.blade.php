<x-layout>
    <div>
        <a href="{{ url()->previous() }}" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">Back</a>
    </div>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                {{__('msg.edit comment')}}
            </h2>
        </header>
    
        <form method="POST" action="{{ route('comments.update', ['comment' => $comment->id, 'recipe' => $comment->recipe->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="content"
                    class="inline-block text-lg mb-2"
                    >{{__('msg.content')}}</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="content"
                    value="{{$comment->content}}"
            />
    
            <div class="mb-6">
                <button type="submit"
                    class="bg-laravel text-sky-500 rounded py-2 px-4 hover:bg-black"
                >
                {{__('msg.update the comment')}}
            </button>
    
                <a href="/recipes/{{$comment->recipe->id}}" class="text-black ml-4">{{__('msg.back')}}</a>
            </div>
        </form>
    </x-card>
    </x-layout>