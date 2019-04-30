@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >
@endsection

@section('content')
    <ul class="breadcrumb">

        <li> {{$resort->name}} </li>
        
    </ul>

<br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Resort </th>
                <th>Group </th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($users as $user)
                <tr>

                    <th><a href="{{ route('user.show', $user->user_id ) }}"> {{ $user->user->first_name }} </a></th>
                    <th> {{ $user->user->last_name }} </th>
                    <th> {{ $user->user->user_name }} </th>
                    <th> {{ $user->resort->name }} </th>
                    <th> {{ $user->group->name }} </th>
                    <th>
                        <ul style="list-style:none;">
                            <li style="margin-right:15px;margin-bottom:10px;">
                                    <a href="{{ route('user.edit', $user->user_id ) }}">
                                        <button class="btn-primary" type="submit">
                                        Edit
                                        </button>
                                    </a>
                            </li>

                            @if($user->user->status == 'Enabled')
                            <li>
                                <form method="POST" action="{{ route('user.changeStatus', $user->user->user_id) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->user->user_id}}">

                                    <button style="float:left;" class="btn-danger" type="submit">
                                        Disable
                                    </button>

                                    @else
                                    <form method="POST" action="{{ route('user.changeStatus', $user->user->user_id) }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->user->user_id}}">

                                        <button style="float:left;" class="btn-primary" type="submit">
                                            Enable
                                        </button>
                                    </form>
                                    @endif
                            </li>
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
