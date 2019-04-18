@extends('layouts.default')

@section('content')


  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">
          Name :
            <span style="color:blue;">{{$user->last_name . ', ' . $user->first_name }}</span></h1>
      <p class="lead" style="font-size:30px;">
        User Name :
            <span style="font-size:30px;color:blue;">{{$user->user_name}}</span></p>
    </div>
  </div>




  <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
              <tr style="background-color: #6495ED;color:white;">
                  <th style="font-size:18px;">Resort</th>
                  <th style="font-size:18px;">Group</th>
                  <th style="font-size:18px;">Role</th>
              </tr>
          </thead>

          <tbody>
                @foreach($user_data as $user_data_new)
                    <tr>
                      <th> {{$user_data_new->resort->name}}</th>
                      <th>  {{$user_data_new->group->name}}</th>
                      <th>
                            <span style="font-size:14px;color:red;">
                                {{$user_data_new->role->name}}
                            </span>
                      </th>
                    </tr>
                @endforeach
          </tbody>


@endsection
