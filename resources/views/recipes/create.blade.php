<x-layout>
<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            {{__('msg.post a recipe')}}
        </h2>
        <p class="mb-4">{{__('msg.share your recipe on the site')}}</p>
    </header>

    <form method="POST" action="/recipes" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="title"
                class="inline-block text-lg mb-2"
                >{{__('msg.title')}}</label>
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
                {{__('msg.cover picture')}}
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
                {{__('msg.type tags')}}  ({{__('msg.comma separated')}})
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="type_tags"
                placeholder="{{__('msg.example: cake, breakfast, lunch, salty, etc')}}"
                value="{{old('type_tags')}}"
            />
            @error('type_tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="type_tags" class="inline-block text-lg mb-2" id="type_t">
                {{__('msg.dish types')}}:
            </label>

            <select onchange="getTypeSelect()" id="types">
                <option selected disabled>{{__('msg.select at least one option')}}</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
           </select>

            <script>
                function getTypeSelect() {
                    var sel = document.getElementById("types");
                    var text = sel.options[sel.selectedIndex].text;
                    e = document.createElement("div");
                    e.setAttribute("id", sel.value);
                    e.classList.add('type_added', 'bg-gray-50', 'border', 'border-gray-200', 'rounded', 'p-2', 'text-center');
                    e.classList.add(sel.value.toString());
                    e.innerHTML = text;
                    var remove = document.createElement("a");
                    remove.innerHTML = 'X';
                    remove.classList.add('text-red-500', 'pl-1');
                    remove.href = "#";
                    remove.setAttribute("onclick", "addTypeBack('"+sel.value.toString()+"')");
                    e.appendChild(remove);
                    document.getElementById("type_t").appendChild(e);
                    var option = sel.selectedOptions[0];
                    option.disabled = true;
                }
                function addTypeBack(id) {
                    var inte = parseInt(id);
                    document.getElementById("types").options[inte].disabled = false;
                    document.getElementById(id).remove();
                }
            </script>
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
                {{__('msg.dish description')}}
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="{{__('msg.origin, interesting facts, flavor, texture, etc')}}">
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
                {{__('msg.steps')}}
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="steps"
                rows="10"
                placeholder="{{__('msg.numbered steps')}}"
            >{{old('steps')}}</textarea>
            @error('steps')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-laravel text-sky-500 rounded py-2 px-4 hover:bg-black"
            >
                {{__('msg.post the recipe')}}
            </button>

            <a href="/" class="text-black ml-4">{{__('msg.back')}}</a>
        </div>
    </form>
</x-card>
</x-layout>