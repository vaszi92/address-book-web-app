@extends('app')

@section('content')
<h1 class="text-center">Contact Details</h1>
<hr>
<a href="{{ action('ContactsController@index') }}">
    <h5>Back to Home</h5>
</a>
<div id="contact-details" class="text-center">
    <h3>Name:</h3>
    <h5>{{$contact->name}}</h5>
    <h3>Phone:</h3>
    <h5>{{$contact->phone}}</h5>
    <h3>Email:</h3>
    <h5>{{$contact->email}}</h5>
    <h3>Category:</h3>
    <h5>{{$contact->category->name}}</h5>
    <h3>Created at:</h3>
    <h5>{{$contact->created_at}}</h5>
</div>
@stop

