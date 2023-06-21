@props(['tags_i'])

@php
    $tags_ingr = explode(',', $tags_i)
@endphp

<ul class="flex">
    @foreach($tags_ingr as $ingr)
    <li {{$attributes->merge(['class' => 'flex items-center justify-center bg-sky-300 text-black rounded-xl py-1 px-3 mr-2 text-xs mt-2'])}}
    >
        <a href="/?itag={{$ingr}}">{{$ingr}}</a>
    </li>
    @endforeach
</ul>