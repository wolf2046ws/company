@extends('layouts.default')


@section('content')



<form method="POST" action="{{ route('group.store') }}">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Group Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1"  placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Group Description</label>
        <input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
    </div>
    <input type="hidden" name="resort_id" value="{{$id}}">



  <button type="submit" class="btn btn-primary mb-12">Add Group</button>

</form>

@endsection
