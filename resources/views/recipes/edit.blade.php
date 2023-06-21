<x-layout>
    <div>
        <a href="/recipes/{{$recipe->id}}" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">{{__('msg.back')}}</a>
    </div>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                {{__('msg.edit recipe')}}
            </h2>
            <p class="mb-4">{{__('msg.editing')}} {{$recipe->title}}</p>
        </header>
    
        <form method="POST" action="{{route('recipes.update', ['recipe' => $recipe])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="title"
                    class="inline-block text-lg mb-2"
                    >{{__('msg.title')}}</label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    value="{{$recipe->title}}"
                />
    
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="cover" class="inline-block text-lg mb-2">
                    {{__('msg.cover picture')}}
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="cover"
                />

                <img
                class="w-48 mr-6 mb-6 mt-6"
                src="{{$recipe->cover ? asset('storage/'.$recipe->cover) :
                asset('/images/default/gnocchi.jpg')}}"
                alt=""
                    />
    
                @error('cover')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="type_tags" class="inline-block text-lg mb-2">
                    {{__('msg.type tags')}}  ({{__('msg.comma separated')}})
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="type_tags"
                    placeholder="{{__('msg.example: cake, breakfast, lunch, salty, etc')}}"
                    value="{{$recipe->type_tags}}"
                />
                @error('type_tags')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="ingredient_tags" class="inline-block text-lg mb-2">
                    {{__('msg.ingredient tags')}}  ({{__('msg.comma separated')}})
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="ingredient_tags"
                    placeholder="{{__('msg.example: flour, eggs, rice, basil, butter, etc')}}"
                    value="{{$recipe->ingredient_tags}}"
                />
                @error('ingredient_tags')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2">
                    {{__('msg.dish description')}}
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="{{__('msg.origin, interesting facts, flavor, texture, etc')}}">
                    {{$recipe->description}}
                </textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label
                    for="steps"
                    class="inline-block text-lg mb-2">
                    {{__('msg.steps')}}
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="steps"
                    rows="10"
                    placeholder="{{__('msg.numbered steps')}}"
                >{{$recipe->steps}}</textarea>
                @error('steps')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <button type="submit"
                    class="bg-laravel text-sky-500 rounded py-2 px-4 hover:bg-black"
                >
                {{__('msg.update the recipe')}}
                </button>
    
                <a href="/" class="text-black ml-4">{{__('msg.back')}}</a>
            </div>
        </form>
    </x-card>
    </x-layout>