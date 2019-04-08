@extends('layouts.default')

@section('content')

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">

         <h1 class="display-3"> Role Name :  {{ $role->name }} </h1>

    </div>
  </div>

  <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
              <tr>
                  <th>Role</th>
                  <th>Permission</th>
              </tr>
          </thead>

          <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <th>  {{ $role->name }} </th>    
                        <th> {{ ($permission[0]->description) }} </th>
                    </tr>
                @endforeach
          </tbody>

@endsection
