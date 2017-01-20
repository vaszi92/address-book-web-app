@if(Session::has('flash_message'))
    <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
        {{ session('flash_message') }}
    </div>
@endif
