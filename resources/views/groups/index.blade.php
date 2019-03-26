@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
<br>
<a  href="{{ route('group.create') }}"
    class="btn btn-primary btn-lg active"
    role="button" aria-pressed="true">
        Create New Group
</a>
<br>
<br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th># Roles</th>
                <th># Users</th>
            </tr>
        </thead>

        <tbody>
            @foreach($groups as $group)
                <tr>
                    <th> {{ $group->id }}</th>
                    <th> {{ $group->name }}</th>
                    <th> {{ $group->description }}</th>
                    <th> {{ $group->roles->count() }}</th>
                    <th> {{ $group->users->count() }}</th>
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
