<x-layout>
@include('partials._search')
@include('partials._back')


<div class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="{{$recipe->cover ? asset('storage/'.$recipe->cover) :
                asset('/images/default/gnocchi.jpg')}}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{$recipe->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$recipe->description}}</div>

            <x-recipe-type-tags :tags_t="$recipe->type_tags" class="bg-black text-white rounded-xl px-3 py-1 mr-2"/>
            <x-recipe-ingredient-tags :tags_i="$recipe->ingredient_tags" class="bg-black text-white rounded-xl px-3 py-1 mr-2"/>

            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> Author
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
            <i class="fa-solid fa-pencil">Edit</i>
        </a>

        <form method="POST" action="/recipes/{{$recipe->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500">
                <i>Delete</i>
            </button>
        </form>
    </x-card>
</div>

</x-layout>