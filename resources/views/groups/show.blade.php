@extends('layouts.default')

@section('content')

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">

         <h1 class="display-3"> Group Name :
             <span style="color:blue;">{{ $group->name }} </span></h1>

    </div>
  </div>


        <h4> Member Of :</h4>
      @foreach($group->users as $user)

          <span style="padding:5px;color:red;font-weight:700;font-size:20px;border: 1px solid black;margin-right:10px;">
              {{ $user->user->user_name}}
          </span>

      @endforeach


      <br><br>
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
            </table>


@endsection
