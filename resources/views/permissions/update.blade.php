@extends('layouts.default')


@section('content')

<form method="POST" action="{{ route('permission.update', $permission->id) }}">
    @csrf
    {{ method_field('PUT') }}
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Permission Description</label>
                <input type="text" name="description" value="{{$permission->description}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary mb-12 col-sm-12">Update Permission</button>
        </div>
        <div class="col-sm-6">
            <a href="{{route('permission.index')}}">
            <button type="button" class="btn btn-danger col-sm-12">
                Cancel</button>
            </a>
        </div>

    </div>


    <!--<div class="form-group col-md-3">
        <label for="Select1">SLUG</label>
        <select name ="slug" class="form-control" id="slug">
                <option > Web </option>
                <option > Folder </option>

        </select>
    </div>-->



</form>

@endsection
