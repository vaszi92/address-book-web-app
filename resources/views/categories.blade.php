@extends('app')

@section('content')
@include('flash::message')
<h1 class="text-center">Manage Categories</h1>
<hr>
<div class="categories text-center col-md-8 col-md-offset-2">
    <h3>Manage Categories</h3>
    <hr>
    <a href="{{action('ContactsController@index')}}">Back to Contacts</a>
    @if(isset($categories) && count($categories) !== 0)
        <table>
            <tr>
                <td>Name</td>
                <td>Created At</td>
                <td></td>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td><a href="{{ action('CategoriesController@show', [$category->id]) }}"{{$category->name}}>{{$category->name}}</a></td>
                <td>{{$category->created_at}}</td>
                <td><a style="color:orange;" href="{{ action('CategoriesController@edit', [$category->id])}}">Edit Category</a></td>
            </tr>
            @endforeach
        </table>
    @else
    <div>
        <h5 style="font-weight:bold;">No custom categories found in the database.</h5>
    </div>
    @endif
    <a href="{{ action('CategoriesController@create') }}">
            <h5>+ Add Category</h5>
    </a>
</div>
@stop