@if(Session::has('success'))
    <div class="alert alert-success">
        Success: {{Session::get('success')}}
    </div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-warning">
        Warning: {{Session::get('warning')}}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
