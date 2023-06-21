<x-layout>
@include('partials._hero')
@include('partials._search')

<div
    class="grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-2 mx-4 md:grid-cols-2"
>

@unless(count($recipes) == 0)

@foreach($recipes as $recipe) 
 <x-recipe-card :recipe="$recipe"/>
@endforeach

@else
    <p>{{__('msg.no recipes posted yet')}}!</p>
@endunless

</div>

<div class="mt-6 p-4">
    {{$recipes->links()}}
</div>
</x-layout>
