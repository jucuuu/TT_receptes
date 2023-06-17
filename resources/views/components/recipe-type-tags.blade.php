@props(['tags_t'])

@php
    $tags_type = explode(',', $tags_t)
@endphp

<ul class="flex">
    @foreach($tags_type as $type)
    <li
    {{$attributes->merge(['class' => 'flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs'])}}
    >
        <a href="/?ttag={{$type}}">{{$type}}</a>
    </li>
    @endforeach
</ul>