@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
<br>
<a  href="{{ route('resortGroup.index', $resort->id) }}"
    class="btn btn-primary btn-lg active"
    role="button" aria-pressed="true">
        Resort Groups
</a>
<br>
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
                    <th> <a href="{{ route('user.show', $user->user_id ) }}">{{ $user->user->first_name }}</a></th>
                    <th> {{ $user->user->last_name }} </th>
                    <th> {{ $user->user->user_name }} </th>
                    <!-- <th> {{ $user->department_id ? $user->department->name : '---' }} </th> -->
                    <th> {{ $user->user->resort_id ? $user->user->resort->name : '---' }} </th>
                    <th> {{ $user->user->group_id ? $user->user->group->name : '---' }} </th>
                    <th>
                        <ul>
                            <li ><a href="{{ route('user.edit', $user->user_id ) }}">Edit</a></li>
                            <form method="POST" action="{{ route('user.destroy', $user->user->user_name) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                            <li ><button type="submit">
                                Delete</button></li>
                         </form>
                        </ul>
                    </th>
                </tr>
            @endforeach
        </tbody>

        <!--<tfoot>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Resort</th>
                <th>Department</th>
                <th>Manager Name </th>
                <th>Gender </th>
                <th>Start date</th>
                <th>End Date</th>
            </tr>
        </tfoot>-->

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
