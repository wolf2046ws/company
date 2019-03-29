@extends('layouts.default')
@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="row">
            <div class="col-sm-2 align-self-center">
              <h5> First Name </h5>
            </div>
            <div class="col-sm-4 align-self-center">
                <input  type="text"
                        class="form-control"
                        id="firstName"
                        name="first_name"
                        value = ""
                        placeholder="John">
            </div>

            <div class="col-sm-2 align-self-center">
              <h5> Last Name</h5>
            </div>
            <div class="col-sm-4 align-self-center">
                <input  type="text"
                        class="form-control"
                        id="lastName"
                        name="last_name"
                        value = "{{old('last_name')}}"
                        placeholder="Doe">
            </div>
        </div><!-- end row-->
        <br>
        <div class="row">
            <div class="col-sm-12 align-self-center">
                <button type="submit" class="btn btn-primary mb-2 col-md-12">Create User</button>
            </div>
        </div><!--end row-->
        <br>
            <div class="row">
                <div class="col-sm-1 align-self-center">
                  <h5> Resort </h5>
                </div>
                <div class="col-sm-2 align-self-center">
                    <select  name="resort_id" class="form-control" id="resort">
                        @foreach($resorts as $resort)
                            <option
                            value="{{ $resort->id }}"> {{ $resort->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-1 align-self-center">
                  <h5> Group </h5>
                </div>
                <div class="col-sm-2">
                    <select  name="resort_id" class="form-control" id="resort">
                        @foreach($resorts as $resort)
                            <option
                            value="{{ $resort->id }}"> {{ $resort->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-1 align-self-center">
                  <h5> Role </h5>
                </div>
                <div class="col-sm-2">
                    <select  name="resort_id" class="form-control" id="resort">
                        @foreach($resorts as $resort)
                            <option
                            value="{{ $resort->id }}"> {{ $resort->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2 align-self-center">
                    <a  href="{{ route('resort-users.create') }}"
                        class="btn btn-primary active"
                        role="button" aria-pressed="true">
                            Add Role
                    </a>
                </div>

        </div><!-- end row-->
        </form>
        <br>
        <div class="row">
            <div class="col-md-12 align-self-center">
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
                        @foreach($groups as $user)
                            <tr>
                                <th> <a href="{{ route('resort-users.show', 'sds' ) }}">{{ $user->name }}</a></th>
                                <th> {{ $user->name }} </th>
                                <th> {{ $user->name }} </th>
                                <th>{{ $user->name}}</th>
                                <th>{{ $user->name}}</th>

                                <th>
                                    <form method="POST" action="{{ route('user.destroy', 'sds') }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    <button class="btn-danger" type="submit">
                                        Delete </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div><!-- end row-->

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
