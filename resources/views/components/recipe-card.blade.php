@props(['recipe'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$recipe->cover ? asset('storage/'.$recipe->cover) :
            asset('/images/default/gnocchi.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="recipes/{{$recipe->id}}">{{$recipe->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$recipe->description}}</div>
            <x-recipe-type-tags :tags_t="$recipe->type_tags"/>
            <x-recipe-ingredient-tags :tags_i="$recipe->ingredient_tags"/>
        </div>
    </div>
</x-card>