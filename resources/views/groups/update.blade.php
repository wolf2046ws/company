@extends('layouts.default')


@section('content')

<form method="POST" action="{{ route('group.update', $group->id) }}">
    @csrf
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-sm-3">
            <h4>  <label for="resort">Select Resort </label> </h4>
        </div>
        <div class="col-sm-4">
            <select required name="resort_id" class="form-control" id="resort">
                <option value=""> Select Resort</option>
                @foreach($resorts as $resort)
                    <option
                    @if($group->resort_id == $resort->id) selected @endif
                    value="{{ $resort->id }}"> {{ $resort->name }} </option>
                @endforeach
            </select>
        </div>
    </div>

<div class="row">
    <div class="col-sm-3">
        <h4> <label for="exampleInputEmail1">Group Name</label> </h4>
    </div>
    <div class="col-sm-4">
      <input type="text" required name="name" value="{{$group->name}}" class="form-control" id="exampleInputEmail1"  placeholder="Name">
    </div>
    <div class="col-sm-5">

    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <h4> <label for="exampleInputEmail1">Group Description</label></h4>
    </div>
    <div class="col-sm-4">
      <input type="text" required name="description" value="{{$group->description}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
  </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary col-sm-12">Update Group</button>
    </div>
</div>

</form>


@endsection
