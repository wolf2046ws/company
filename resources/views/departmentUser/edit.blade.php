@extends('layouts.default')


@section('content')



    <form method="POST" action="{{ route('department-users.update', $user->user_id) }}">
        @csrf
        {{ method_field('PUT') }}


        <br>
        <div class="form-row">

            <div class="form-group col-md-6">

                <label for="firstName"> First Name </label>
                <input  type="text"
                        class="form-control"
                        id="firstName"
                        name="first_name"
                        value = "{{$user->first_name}}"
                        placeholder="John">
            </div>


            <div class="form-group col-md-6">

                <label for="lastName">Last Name </label>
                <input  type="text"
                        class="form-control"
                        id="lastName"
                        name="last_name"
                        value = "{{$user->last_name}}"
                        placeholder="Doe">
            </div>

            <div class="form-group col-md-12">
                <label for="manager">User Name </label>
                <input  type="text"
                        class="form-control"
                        id="email"
                        disabled
                        value = "{{$user->user_name}}"
                        placeholder="Doe">
            </div>


            <div class="form-group col-md-3">
                <label for="Select1">Select Group</label>
                <select name ="group_id" class="form-control" id="Select1">
                    @foreach($groups as $group)
                        <option @if($user->group_id == $group->id ) selected @endif
                        value="{{ $group->id }}"> {{ $group->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="Select3">Select Resort</label>
                <select name="resort_id" class="form-control" id="Select3">
                    @foreach($resorts as $resort)
                        <option @if($user->resort_id == $resort->id ) selected @endif
                        value="{{ $resort->id }}"> {{ $resort->name }} </option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary mb-2 col-md-12">Update User</button>
        </div>

    </form>

@endsection
