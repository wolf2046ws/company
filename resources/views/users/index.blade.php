@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')

<table id="example" class="table table-striped table-bordered" style="width:100%">

    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

    @foreach($users as $user)
        <tr>
            <th>{{ $user->id }}</th>
            <th><a href="{{ route('user.show', $user->id ) }}"> {{  $user->last_name . ", ". $user->first_name }}</a></th>
            <th> {{ $user->user_name }} </th>
            <th> {{ $user->status}}</th>

            <th>

                @if($user->status == 'Enabled')


                <a style="float:left;margin-right:5px;" href="{{ route('user.edit', $user->id ) }}">
                    <button class="btn-primary" type="submit">
                        Edit
                    </button>
                </a>


                <form method="POST" action="{{ route('user.changeStatus') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->user_id}}">

                    <button style="float:left;" class="btn-danger" type="submit">
                        Disable
                    </button>

                    @else
                    <form method="POST" action="{{ route('user.changeStatus') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->user_id}}">

                        <button style="float:left;" class="btn-primary" type="submit">
                            Enable
                        </button>
                    </form>
                    @endif

                </form>

            </th>
        </tr>
        @endforeach
    </tbody>

</table>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script src="{{ asset('js/jquerydatatable.js') }}" ></script>
<script src="{{ asset('js/bootstrapdatatable.js') }}" ></script>
@endsection
