<x-layout>
@include('partials._search')

<div>
    <a href="/" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">Back</a>
</div>

<div class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="{{$recipe->cover ? asset('storage/'.$recipe->cover) :
                asset('/images/gnocchi.jpg')}}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{$recipe->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$recipe->description}}</div>

            <x-recipe-type-tags :tags_t="$recipe->type_tags" class="bg-black text-white rounded-xl px-3 py-1 mr-2"/>
            <x-recipe-ingredient-tags :tags_i="$recipe->ingredient_tags" class="bg-black text-white rounded-xl px-3 py-1 mr-2"/>

            <div class="text-lg my-4">
                <i>Author: </i> 
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Steps
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{$recipe->steps}}
                    </p>
                </div>
            </div>
        </div>
    </x-card>

    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/recipes/{{$recipe->id}}/edit">
            <i>Edit</i>
        </a>

        <form method="POST" action="/recipes/{{$recipe->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500">
                <i>Delete</i>
            </button>
        </form>
    </x-card>

    <x-card class="mx-4">
        <div class="mb-6">
            <form method="POST" action="{{ route('comments.store', ['recipe' => $recipe->id]) }}">
                @csrf
                <label
                    for="content"
                    class="inline-block text-lg mb-2">
                    Leave a comment:
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="content"
                    rows="10"
                    placeholder="Very delicious dish if I do say so myself.">
                </textarea>
                <input type="hidden" value="{{ $recipe->id }}" name="recipe_id">
                <input type="submit" class="btn btn-success" value="Post comment"/>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </form>
        </div>
    </x-card>

    @foreach ($comments as $comment)
        <x-card>
            <i>{{$comment->user->username}}</i><br>
            {{$comment->content}}<br>
            
            <a href="{{ route('comments.edit', $comment) }}">
                <i>Edit</i>
            </a>

            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                @csrf
                @method('DELETE') 
                <button class="text-red-500">
                    <i>Delete</i>
                </button>
        </form>
        </x-card>
    @endforeach
</div>

</x-layout>