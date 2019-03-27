@extends('layouts.default')


@section('content')



    <form method="POST" action="{{ route('user.store') }}">
        @csrf


        <br>
        <div class="form-row">

            <div class="form-group col-md-6">

                <label for="firstName"> First Name </label>
                <input  type="text"
                        class="form-control"
                        id="firstName"
                        name="first_name"
                        value = "{{old('first_name')}}"
                        placeholder="John">
            </div>


            <div class="form-group col-md-6">

                <label for="lastName">Last Name </label>
                <input  type="text"
                        class="form-control"
                        id="lastName"
                        name="last_name"
                        value = "{{old('last_name')}}"
                        placeholder="Doe">
            </div>





            <button type="submit" class="btn btn-primary mb-2 col-md-12">Add User</button>
        </div>

    </form>

@endsection
