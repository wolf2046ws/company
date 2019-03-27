@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')

<ul class="breadcrumb">
  <li><a href="#">{{$resort->name}}</a></li>
  <li><a href="#">{{$group->name}}</a></li>
  <li>Roles</li>
</ul>
<br>
<a  href="{{ route('groupRoles.create', $group->id) }}"
    class="btn btn-primary btn-lg active"
    role="button" aria-pressed="true">
    Create New Role
</a>
<br>
<br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th># Permissions</th>
                <th>Actions</th>

            </tr>
        </thead>

        <tbody>
            @foreach($roles as $role)
                <tr>
                    <th> {{ $role->id }}</th>
                    <th> {{ $role->name }}</th>
                    <th> {{ $role->description }}</th>
                    <th> {{ $role->permissions->count() }}</th>
                    <th>
                        <ul>
                            <li ><a href="{{ route('role.edit', $role->id ) }}">Edit</a></li>
                            <form method="POST" action="{{ route('role.destroy', $role->id) }}">
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
