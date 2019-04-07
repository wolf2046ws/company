@extends('layouts.default')

@section('content')




  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Name, {{$user->first_name. ' '. $user->last_name}}</h1>
      <p class="lead">User Name : {{$user->user_name}}</p>
    </div>
  </div>

  <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
              <tr>
                  <th>Resort</th>
                  <th>Group</th>
                  <th>Role</th>
              </tr>
          </thead>

          <tbody>
                @foreach($user_data as $user_data_new)
                    <tr>
                      <th> {{$user_data_new->resort->name}}</th>
                      <th>  {{$user_data_new->group->name}}</th>
                      <th>{{$user_data_new->role->name}} </th>
                    </tr>
                @endforeach
          </tbody>

@endsection
