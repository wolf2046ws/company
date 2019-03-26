@extends('layouts.default')


@section('content')
<form method="POST" action="{{ route('department.update', $department->id) }}">
@csrf
 {{ method_field('PUT') }}

<div class="form-inline">
  <label for="firstName"> Department Name </label>
  <input  type="text"
          class="form-control"
          id="firstName"
          name="name"
          value = "{{$department->name}}"
          placeholder="Laptop">
</div>


<button type="submit" class="btn btn-primary mb-12">Update Department</button>
</form>
@endsection
