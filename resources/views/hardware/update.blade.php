@extends('layouts.default')


@section('content')
<form method="POST" action="{{ route('hardware.update', $hardware->id) }}">
@csrf
 {{ method_field('PUT') }}

<div class="form-inline">
  <label for="firstName"> Hardware Name </label>
  <input  type="text"
          class="form-control"
          id="firstName"
          name="name"
          value = "{{$hardware->name}}"
          placeholder="Laptop">
</div>

<div class="form-inline">
  <label for="firstName">Model </label>
  <input  type="text"
          class="form-control"
          id="firstName"
          name="model"
          value = "{{$hardware->model}}"
          placeholder="Mac Book Air">
</div>

<button type="submit" class="btn btn-primary mb-12">Update Hardware</button>
</form>
@endsection
