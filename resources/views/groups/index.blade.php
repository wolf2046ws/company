@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
<div class="row">
    <div class="col-sm-3">
      <h4>  <label for="resort">Select Resort </label> </h4>
    </div>
    <div class="col-sm-4">
        <select  name="resort_id" class="form-control" id="resort">
            @foreach($resorts as $resort)
                <option
                value="{{ $resort->id }}"> {{ $resort->name }} </option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-5">
        <a  href="{{ route('resort-users.create') }}"
            class="btn btn-primary active"
            role="button" aria-pressed="true">
                Search
        </a>
    </div>

</div>

<form method="POST" action="{{ route('group.store') }}">
    @csrf
<div class="row">
    <div class="col-sm-3">
        <h4> <label for="exampleInputEmail1">Group Name</label> </h4>
    </div>
    <div class="col-sm-4">
      <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1"  placeholder="Name">
    </div>
    <div class="col-sm-5">

    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <h4> <label for="exampleInputEmail1">Group Description</label></h4>
    </div>
    <div class="col-sm-4">
      <input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
  </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary col-sm-12">Add Group</button>
    </div>
</div>

</form>

<br>
<br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Resort</th>
                <th>Group</th>
                <th># Roles</th>
                <th># Users</th>
                <th>Actions</th>
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
                    <th>
                        <form method="POST" action="{{ route('user.destroy', 'Test') }}">
                            @csrf
                            {{ method_field('DELETE') }}
                        <button class="btn-danger" type="submit">
                            Delete </button>
                        </form>
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
