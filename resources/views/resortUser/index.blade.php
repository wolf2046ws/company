@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
<br>

<div class="row">
    <div class="col-sm-2">
      <h3>  <label for="resort">Select Resort </label> </h3>
    </div>
    <div class="col-sm">
        <select  name="resort_id" class="form-control" id="resort">
            @foreach($resorts as $resort)
                <option
                value="{{ $resort->id }}"> {{ $resort->name }} </option>
            @endforeach
        </select>
    </div>
    <div class="col-sm">
        <a  href="{{ route('resort-users.create') }}"
            class="btn btn-primary active"
            role="button" aria-pressed="true">
                Search
        </a>
    </div>
</div>

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

            @foreach($userData as $user)
                <tr>
                    <th> <a href="{{ route('resort-users.show', $user->user_id ) }}">{{ $user->first_name }}</a></th>
                    <th> {{ $user->last_name }} </th>
                    <th> {{ $user->user_name }} </th>
                    <th>

                        @for($i = 0; $i < count($users_resort); $i++)
                        {{ $users_resort[$i]->resort->name .= " , " }}
                        @endfor
                    

                    </th>
                    <th>
                    @for($i = 0; $i < count($users_group); $i++)
                        {{ $users_group[$i]->group->name .= " , " }}
                    @endfor
                    </th>

                    <th>
                        <ul style="list-style:none;">

                            <form class="float-left" action="{{ route('user.update', $user->user_id ) }}" method="post">
                                @csrf
                                <li style="margin-right:15px;"><button class="btn-primary" type="submit">
                                    Edit</button></li>

                            </form>

                            <form method="POST" action="{{ route('user.destroy', $user->user_name) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                            <li class="float-left"><button class="btn-danger" type="submit">
                                Disable </button></li>
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
