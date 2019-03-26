@extends('layouts.default')


@section('content')



<form method="POST" action="{{ route('department.store') }}">
    @csrf
<br>
  <div class="form-inline">
    <label for="firstName">Department Name </label>
    <input  type="text"
            class="form-control"
            id="firstName"
            name="name"
            value = "{{old('name')}}"
            placeholder="Call Center">
  </div>


  <button type="submit" class="btn btn-primary mb-12">Add Department</button>

</form>
@endsection
