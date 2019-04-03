@extends('layouts.default')

@section('content')




  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Name, {{$user->first_name. ' '. $user->last_name}}</h1>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <p class="lead">User Name : {{$user->user_name}}</p>
    <p class="lead">Resort : {{$user->resort->name}}</p>
    <p class="lead">Group : {{$user->group->name}}</p>
    <p class="lead">Roles </p>
    <ul>
      @foreach($user->group->roles as $role)
        <li>{{$role->name}}</li>
      @endforeach
    </ul>
    <p class="lead">Permissions </p>
    <ul>
      @foreach($user->permissions() as $permission)
        <li>{{$permission->description}}</li>
      @endforeach
    </ul>

  </div> <!-- /container -->


@endsection
