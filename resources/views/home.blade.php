@extends('app')

@section('content')
<h1 class="text-center">Address Book</h1>
<hr>
<div class="categories text-center">
    <div class="form-group">
        <select onchange="filter(this.value);" class="form-control" name="category_id" type="text">
            <option value='all'>All Categories</option>
            @if(isset($categories) && count($categories) !== 0)
            @foreach($categories as $category)
            <option value="{{$category->id}}" @if(isset($selected_category) && ($selected_category->id ==$category->id)) selected @endif>{{$category->name}}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
<div class="contacts text-center col-md-8 col-md-offset-2">
    <h3>Contacts</h3>
    <hr>
    @if(isset($contacts) && count($contacts) !== 0)
        <table>
            <tr>
                <td>Name</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Category</td>
                <td>Created At</td>
                <td></td>
            </tr>
            @foreach ($contacts as $contact)
            <tr>
                <td><a href="{{ action('ContactsController@show', [$contact->id]) }}"{{$contact->name}}>{{$contact->name}}</a></td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->category->name}}</td>
                <td>{{$contact->created_at}}</td>
                <td><a style="color:orange;" href="{{ action('ContactsController@edit', [$contact->id])}}">Edit Contact</a></td>
            </tr>
            @endforeach
        </table>
    @else
        <h5 style="font-weight:bold;">No contacts found in the database.</h5>
    @endif
    <div class='add-links col-md-6 col-md-offset-3'>
        <hr>
        <a href="{{ action('ContactsController@create') }}">
            <h5>+ Add Contact</h5>
        </a>
        <a href="{{ action('CategoriesController@index') }}">
            <h5>Manage Categories</h5>
        </a>
    </div>
</div>
<script>
    
    var url = "{{url('/category')}}";

    function filter(id){

    window.location = url + '/' + id;
}

</script>
@stop
