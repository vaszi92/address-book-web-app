@extends('app')

@section('content')
<h1 class='text-center'>Add Category</h1>
<hr>
<a href="{{ action('ContactsController@index') }}">
    <h5>Back to Home</h5>
</a>
<div class="col-md-8 col-md-offset-2 text-center">
    {!! Form::open(['url'=>'/categories/create']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Category', ['class'=>'btn btn-primary form-control']) !!}
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

