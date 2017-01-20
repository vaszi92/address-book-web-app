@extends('app')

@section('content')
<h1 class="text-center">Category Details</h1>
<hr>
<a href="{{ action('ContactsController@index') }}">
    <h5>Back to Home</h5>
</a>
<div id="contact-details" class="text-center">
    <h3>Name:</h3>
    <h5>{{$category->name}}</h5>
    <h3>Created at:</h3>
    <h5>{{$category->created_at}}</h5>
</div>
@stop