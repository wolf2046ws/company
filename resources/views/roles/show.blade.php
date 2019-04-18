    @extends('layouts.default')

    @section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h1> Role Name : <span style="color:blue;">{{ $role->name }} </span></h1>
            </div>

            <div class="col-sm-3">
                Resort Name :
                <span style="color:red;">{{ $role->resort->name }} </span>
            </div>

            <div class="col-sm-3">
                Group Name :
                <span style="color:red;">{{ $role->group->name }} </span>
            </div>
        </div><!-- end row-->
        <br>

        <div class="row">
            <div class="col-sm-12">
                <h4> Member Of :</h4>
            </div>
            @foreach($role->users as $user)
            <div class="col-sm-1">
            <span style="padding:5px;color:red;font-weight:500;font-size:17px;border: 1px solid black;margin-right:10px;">
                {{ $user->user->user_name }}
            </span>
            </div>
            @endforeach
        </div><!-- end row-->
        <br>

        <div class="row">
            <div class="col-sm-12">
                <h4> Permission :</h4>
            </div>

            @foreach($permissions as $permission)
            <div class="col-sm-4" style="margin:5px;">
                <span style="padding:5px;font-weight:500;font-size:15px;border: 1px solid black;">
                 {{ ($permission[0]->description) }}
                </span>
            </div>
            @endforeach

        </div><!---end row-->

    </div><!-- end container-->


    @endsection
