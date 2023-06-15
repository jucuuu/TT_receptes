@extends('layout')

@section('content')

<h1>{{$heading}}</h1>

@unless(count($recipes) == 0)

@foreach($recipes as $recipe) 
<h2>
    <a href='/recipes/{{$recipe['id']}}' class="font-semibold underline">{{$recipe['title']}}</a>
</h2>
<p>{{$recipe['description']}}</p>
@endforeach

@else
    <p>No recipes posted yet!</p>
@endunless

@endsection