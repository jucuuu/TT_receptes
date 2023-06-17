@props(['tags_i'])

@php
    $tags_ingr = explode(',', $tags_i)
@endphp

<ul class="flex">
    @foreach($tags_ingr as $ingr)
    <li {{$attributes->merge(['class' => 'flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs'])}}
    >
        <a href="/?itag={{$ingr}}">{{$ingr}}</a>
    </li>
    @endforeach
</ul>