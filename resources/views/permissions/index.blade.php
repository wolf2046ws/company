@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >
@endsection

@section('content')
<form method="POST" action="{{ route('permission.store') }}">
    @csrf

<div class="row">
    <div class="col-sm-3 align-self-center">
      <h5> Permission Description </h5>
    </div>
    <div class="col-sm-9 align-self-center">
      <input type="text" name="description" value="" class="form-control" id="exampleInputEmail1" placeholder="Description">
    </div>
</div><!-- end row-->
<br>
<div class="row">
    <div class="col-sm-3 align-self-center">
      <h5> Slug </h5>
    </div>
    <div class="col-sm-9 align-self-center">
        <select name ="slug" class="form-control" id="slug">
                <option > Web </option>
                <option > Active Directory Groups </option>
        </select>
    </div>
</div><!-- end row-->
<br>
<div class="row">
    <div class="col-sm-12 align-self-center">
    <input type="hidden" name="status" value="false">
    <button  type="submit"
        class="btn btn-primary active col-sm-12"
        aria-pressed="true">
            Add Permission
    </a>
</div>
</div><!-- end row -->

</form>

<br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>description</th>
                <th>Slug</th>
                <th>Actions</th>

            </tr>
        </thead>

        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <th> {{ $permission->id }}</th>
                    <th> {{ $permission->description }}</th>
                    <th> Actions </th>
                    <th>
                        @if($permission->status == 'false')
                            <form method="POST" action="{{ route('permission.destroy', $permission->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('permission.edit', $permission->id ) }}">
                                <button class="btn-primary" type="submit">
                                Edit</button>
                            </a>
                        @else
                            Un Editable
                        @endif
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
