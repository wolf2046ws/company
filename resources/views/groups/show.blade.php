@extends('layouts.default')

@section('content')

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">

         <h1 class="display-3"> Group Name : {{ $group->name }} </h1>

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
                @foreach($user_data as $group_new)
                    <tr>
                      <th> {{ $group_new->resort->name }} </th>
                      <th>  {{ $group->name }} </th>
                      <th> {{ $group_new->role->name }} </th>
                    </tr>
                @endforeach
          </tbody>

@endsection
