@extends('layouts.default')


@section('content')
<form method="POST" action="{{ route('resort.update', $resort->id) }}">
@csrf
 {{ method_field('PUT') }}

<div class="form-inline">
  <label for="firstName"> Resort Name </label>
  <input  type="text"
          class="form-control"
          id="firstName"
          name="name"
          value = "{{$resort->name}}"
          placeholder="Laptop">
</div>


<button type="submit" class="btn btn-primary mb-12">Update Resort</button>
</form>
@endsection
