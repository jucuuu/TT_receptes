<x-layout>
@include('partials._search')

<div>
    <a href="/" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">{{__('msg.back')}}</a>
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
                <i>{{__('msg.author')}}: </i> {{$recipe->user->username}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    {{__('msg.steps')}}
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
        @can ('update', $recipe)
        <a href="{{route('recipes.edit', ['recipe' => $recipe])}}">
            <i>{{__('msg.edit')}}</i>
        </a>
        @endcan

        <form method="POST" action="/recipes/{{$recipe->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500">
                <i>{{__('msg.delete')}}</i>
            </button>
        </form>
    </x-card>

    @can ('post comments')
    <x-card class="mx-4">
            <div class="mb-6">
                <form method="POST" action="{{ route('comments.store', ['recipe' => $recipe->id]) }}">
                    @csrf
                    <label
                        for="content"
                        class="inline-block text-lg mb-2">
                        {{__('msg.leave a comment')}}:
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="content"
                        rows="10"
                        placeholder="{{__('msg.very delicious dish if I do say so myself')}}.">
                    </textarea>
                    <input type="hidden" value="{{ $recipe->id }}" name="recipe_id">
                    <input type="submit" class="btn btn-success" value="{{__('msg.post comment')}}"/>
                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </form>
            </div>
    </x-card>
    @endcan

    @foreach ($comments as $comment)
        <x-card>
            <i>{{$comment->user->username}}</i><br>
            {{$comment->content}}<br>
            
            @can ('update', $comment)
            <a href="{{ route('comments.edit', ['comment' => $comment]) }}">
                <i>{{__('msg.edit')}}</i>
            </a>
            @endcan
            
            @can ('delete', $comment)
            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                @csrf
                @method('DELETE') 
                <button class="text-red-500">
                    <i>{{__('msg.delete')}}</i>
                </button>
            </form>
            @endcan
        </x-card>
    @endforeach
</div>

</x-layout>