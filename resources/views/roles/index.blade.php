@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
<div class="row">

    <div class="col-sm-6 align-self-center">
        <a  href="{{ route('resort-users.create') }}"
            class="btn btn-primary active col-sm-6"
            role="button" aria-pressed="true">
                Show Roles
        </a>
    </div>
</div><!-- end row-->

<br>

<div class="row">
    <div class="col-sm-2 align-self-center">
      <h5> Select Resort </h5>
    </div>
    <div class="col-sm-2 align-self-center">
        <select  name="resort_id" class="form-control" id="resort">
            @foreach($resorts as $resort)
                <option
                value="{{ $resort->id }}"> {{ $resort->name }} </option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-2 align-self-center">
      <h5> Select Group </h5>
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
                Search
        </a>
    </div>

</div> <!-- end row-->
<br>
<form method="POST" action="{{ route('group.store') }}">
    @csrf
<div class="row">
    <div class="col-sm-2 align-self-center">
        <h5> Role Name </h5>
    </div>
    <div class="col-sm-4">
      <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1"  placeholder="Name">
    </div>

</div><!-- end row-->
<br>
<div class="row">
    <div class="col-sm-2 align-self-center">
        <h5> Role Description </h5>
    </div>
    <div class="col-sm-4">
      <input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
  </div>
</div><!-- end row-->
<br>
<div class="row border">
    <div class="col-sm-12 align-self-center">
        <h5>Select Permissions </h5>
    </div>
        @foreach($roles as $permission)
        <div style="width: 20rem;">
         <div class="custom-control custom-checkbox">
                    <input class="form-check-input" name="permissions[]"
                           type="checkbox" id="inlineCheckbox1"
                           value="{{$permission->id}}">
                    <label class="form-check-label" for="inlineCheckbox1">{{$permission->description}}</label>
                </div>
        </div>
        @endforeach

</div><!--end row-->
<br>
<div class="row">
    <div class=" col-sm-12 align-self-center">
        <a  href="{{ route('resort-users.create') }}"
            class="btn btn-primary active col-sm-12"
            role="button" aria-pressed="true">
                Create Role
        </a>
    </div>
</div>

<br>
<br>

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
