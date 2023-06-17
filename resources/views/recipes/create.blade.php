<x-layout>
<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Post a recipe
        </h2>
        <p class="mb-4">Share your recipe on the site</p>
    </header>

    <form method="POST" action="/recipes" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="title"
                class="inline-block text-lg mb-2"
                >Title</label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                value="{{old('title')}}"
            />

            @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="cover" class="inline-block text-lg mb-2">
                Cover Picture
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="cover"
            />

            @error('cover')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="type_tags" class="inline-block text-lg mb-2">
                Type tags (Comma Separated)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="type_tags"
                placeholder="Example: Cake, Breakfast, Lunch, Salty, etc"
                value="{{old('type_tags')}}"
            />
            @error('type_tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="ingredient_tags" class="inline-block text-lg mb-2">
                Ingredient tags (Comma Separated)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="ingredient_tags"
                placeholder="Example: Flour, Eggs, Rice, Basil, Butter, etc"
                value="{{old('ingredient_tags')}}"
            />
            @error('ingredient_tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2">
                Dish description
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="Origin, interesting facts, flavor, texture, etc">
                {{old('description')}}
            </textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="steps"
                class="inline-block text-lg mb-2">
                Steps
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="steps"
                rows="10"
                placeholder="Numbered steps"
            >{{old('steps')}}</textarea>
            @error('steps')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-laravel text-sky-500 rounded py-2 px-4 hover:bg-black"
            >
                Post the recipe
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-card>
</x-layout>