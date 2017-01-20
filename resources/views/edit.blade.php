@extends('app')

@section('content')
<h1 class='text-center'>Edit Contact</h1>
<a href="{{ action('ContactsController@index') }}">
    <h5>Back to Home</h5>
</a>
<hr>
<div class="col-md-8 col-md-offset-2 text-center">
    {!! Form::model($contact, ['method'=>'PATCH', 'action'=>['ContactsController@update', $contact->id]]) !!}
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
                        @if($category->id == $contact->category_id)
                        <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                @endif
            </select>
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
    {!! Form::model($contact, ['method'=>'DELETE', 'action'=>['ContactsController@destroy', $contact->id]]) !!}
    
        <div class="form-delete">
            {!! Form::submit('DELETE CONTACT', ['class'=>'btn btn-danger',  'onClick'=>'return confirm("Are you sure you want to delete this item?")']) !!}
        </div> 
    
    {!! Form::close()!!}
</div>    
@stop