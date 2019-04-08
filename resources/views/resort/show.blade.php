@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
<ul class="breadcrumb">

    <li><a href="{{ url()->current() }}"> {{$resort->name}} </a></li>
    <!--<li><a href="{{ url()->previous() }}"> Back </a></li>-->
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
                <!--<th>Actions</th>-->
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

                    <!--<th>
                        <li style="margin-right:15px;">
                            <a href="{{--route('user.edit', $user->user_id ) --}}">
                                <button class="btn-primary" type="submit">
                                Edit</button>
                            </a>
                    </li>
                </th>->
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
