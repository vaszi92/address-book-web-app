@extends('app')

@section('content')
<h1 class='text-center'>Create New Contact</h1>
<a href="{{ action('ContactsController@index') }}">
    <h5>Back to Home</h5>
</a>
<hr>
<div class="col-md-8 col-md-offset-2 text-center">
    {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone', 'Phone:') !!}
            {!! Form::text('phone', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            <select class="form-control" name="category_id" type="text">
                @if(isset($categories) && count($categories) !== 0)
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            {!! Form::submit('Add Contact', ['class'=>'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
    @if($errors->any())
        <ul class="aler alert-danger text-left"
            @foreach($errors->all() as $error)
            <li style="list-style: none;">{{$error}}</li>
            @endforeach
        </ul>    
    @endif
</div>    
@stop