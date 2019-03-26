@extends('layouts.default')


@section('content')



<form method="POST" action="{{ route('role.store') }}">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Role Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1"  placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Role Description</label>
        <input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
    </div>
    <input type="hidden" name="group_id" value="{{$id}}">



    <label for="Select3">Select Role Permissions</label>
    @foreach($permissions as $permission)
    <div class="card" style="width: 18rem;">
	 <div class="custom-control custom-checkbox">
                <input class="form-check-input" name="permissions[]"
                       type="checkbox" id="inlineCheckbox1"
                       value="{{$permission->id}}">
                <label class="form-check-label" for="inlineCheckbox1">{{$permission->description}}</label>
            </div>
	</div>
    @endforeach

  <button type="submit" class="btn btn-primary mb-12">Add Role</button>

</form>

@endsection
