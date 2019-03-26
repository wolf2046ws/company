@extends('layouts.default')


@section('content')



<form method="POST" action="{{ route('resort.store') }}">
    @csrf
<br>
  <div class="form-inline">
    <label for="firstName">Resort Name </label>
    <input  type="text"
            class="form-control"
            id="firstName"
            name="name"
            value = "{{old('name')}}"
            placeholder="Call Center">
  </div>


  <button type="submit" class="btn btn-primary mb-12">Add Resort</button>

</form>
@endsection
