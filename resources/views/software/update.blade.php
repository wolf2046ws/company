@extends('layouts.default')


@section('content')

<form method="POST" action="{{ route('software.update', $software->id) }}">
    @csrf
    {{ method_field('PUT') }}

<br>
  <div class="form-inline">
    <label for="firstName"> Software Name </label>
    <input  type="text"
            class="form-control"
            id="firstName"
            name="name"
            value = "{{$software->name}}"
            placeholder="Atom">
  </div>
<br>

  <button type="submit" class="btn btn-primary mb-12">Update Software</button>

</form>

@endsection
