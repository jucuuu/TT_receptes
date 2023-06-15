@extends('layout')

@section('content')

<h2>{{$recipe['title']}}</h2>
<p>{{$recipe['description']}}</p>
<p>{{$recipe['steps']}}</p>

@endsection