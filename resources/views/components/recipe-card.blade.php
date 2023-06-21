@props(['recipe'])

<x-card class="align-middle">
    <div>
        <img
            class="w-48 mt-2 mr-2 md:block"
            src="{{$recipe->cover ? asset('storage/'.$recipe->cover) :
            asset('/images/gnocchi.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="recipes/{{$recipe->id}}" class="font-bold">{{$recipe->title}}</a>
            </h3>
            <div class="text-m mb-4">{{$recipe->description}}</div>
            <div class="text-m mb-4 text-sky-400">{{__('msg.Posted by')}}: <i>{{$recipe->user->username}}</i></div>
            <x-recipe-type-tags :tags_t="$recipe->type_tags"/>
            <x-recipe-ingredient-tags :tags_i="$recipe->ingredient_tags"/>
        </div>
    </div>
</x-card>