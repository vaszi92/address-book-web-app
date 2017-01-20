@extends('app')

@section('content')
<h1 class='text-center'>Manage Category</h1>
<a href="{{action('CategoriesController@index')}}">Back to Categories</a>
<hr>
<div class="col-md-8 col-md-offset-2 text-center">
    {!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoriesController@update', $category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class'=>'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
    @if($errors->any())
        <ul class="aler alert-danger text-left"
            @foreach($errors->all() as $error)
            <li style="list-style: none;">{{$error}}</li>
            @endforeach
        </ul>    
    @endif
    {!! Form::model($category, ['method'=>'DELETE', 'action'=>['CategoriesController@destroy', $category->id]]) !!}
    
        <div class="form-delete">
            {!! Form::submit('DELETE CATEGORY', ['class'=>'btn btn-danger',  'onClick'=>'return confirm("Are you sure you want to delete this item?")']) !!}
        </div> 
    
    {!! Form::close()!!}
</div>    
@stop

