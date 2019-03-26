@extends('layouts.default')


@section('content')



<form method="POST" action="{{ route('hardware.store') }}">
    @csrf
<br>
  <div class="form-inline">
    <label for="firstName">Hardware Name </label>
    <input  type="text"
            class="form-control"
            id="firstName"
            name="name"
            value = "{{old('name')}}"
            placeholder="Laptop">
  </div>

  <div class="form-inline">
    <label for="firstName">Model </label>
    <input  type="text"
            class="form-control"
            id="firstName"
            name="model"
            value = "{{old('model')}}"
            placeholder="Mac Book Air">
  </div>

  <button type="submit" class="btn btn-primary mb-12">Add Hardware</button>

</form>
@endsection
