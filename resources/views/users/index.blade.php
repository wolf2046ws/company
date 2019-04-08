@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')

<table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>User Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($users as $user)
                <tr>
                    <th><a href="{{ route('user.show', $user->id ) }}"> {{ $user->first_name }}</a></th>
                    <th> {{ $user->last_name }} </th>
                    <th> {{ $user->status}}</th>
                    <th> {{ $user->user_name }} </th>

                    <th>
                        <ul style="list-style:none;">

                            @if($user->status == 'Enabled')

                            <li style="margin-right:15px;">
                                    <a href="{{ route('user.edit', $user->id ) }}">
                                        <button class="btn-primary" type="submit">
                                        Edit</button>
                                    </a>
                            </li>


                            <form method="POST" action="{{ route('user.changeStatus') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->user_id}}">
                            <li class="float-left"><button class="btn-danger" type="submit">
                                Disable </button></li>
                                @else
                                <form method="POST" action="{{ route('user.changeStatus') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->user_id}}">
                                <li class="float-left"><button class="btn-primary" type="submit">
                                    Enable </button></li>
                                @endif
                                </form>
                            </form>
                        </ul>
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
