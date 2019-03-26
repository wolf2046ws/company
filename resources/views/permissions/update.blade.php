@extends('layouts.default')


@section('content')

<form method="POST" action="{{ route('permission.update', $permission->id) }}">
    @csrf
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="exampleInputEmail1">Permission Description</label>
        <input type="text" name="description" value="{{$permission->description}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
    </div>

    <div class="form-group col-md-3">
        <label for="Select1">SLUG</label>
        <select name ="slug" class="form-control" id="slug">
                <option > User </option>
                <option > Group </option>
                <option > Role </option>
                <option > Permission </option>
                <option > Department </option>
                <option > Resort </option>
                <option > Resort Users </option>
                <option > Department Users </option>
        </select>
    </div>

  <button type="submit" class="btn btn-primary mb-12">Update Permission</button>

</form>

@endsection
