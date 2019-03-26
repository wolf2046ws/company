@extends('layouts.default')


@section('content')



<form method="POST" action="{{ route('software.store') }}">
    @csrf
<br>
  <div class="form-inline">
    <label for="firstName">Software Name </label>
    <input  type="text"
            class="form-control"
            id="firstName"
            name="name"
            value = "{{old('name')}}"
            placeholder="Atom">
  </div>

  <button type="submit" class="btn btn-primary mb-12">Add Software</button>

</form>

@endsection
