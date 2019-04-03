@extends('layouts.default')


@section('content')



    <form method="POST" action="{{ route('user.update', $user->user_id) }}">
        @csrf
        {{ method_field('PUT') }}


        <br>
        <div class="form-row">

            <div class="form-group col-md-6">

                <label for="firstName"> First Name </label>
                <input required type="text"
                        class="form-control"
                        id="firstName"
                        name="first_name"
                        value = "{{$user->first_name}}"
                        placeholder="John">
            </div>


            <div class="form-group col-md-6">

                <label for="lastName">Last Name </label>
                <input required  type="text"
                        class="form-control"
                        id="lastName"
                        name="last_name"
                        value = "{{$user->last_name}}"
                        placeholder="Doe">
            </div>

            <div class="form-group col-md-12">
                <label for="manager">User Name </label>
                <input required type="text"
                        class="form-control"
                        id="email"
                        disabled
                        value = "{{$user->user_name}}"
                        placeholder="Doe">
            </div>


            <div class="form-group col-md-3">
                <label for="resort">Select Resort</label>
                <select required name="resort_id" class="form-control" id="resort">
                    @foreach($resorts as $resort)
                        <option
                        value="{{ $resort->id }}"> {{ $resort->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label  for="Select1">Select Group</label>
                <select required name ="group_id" class="form-control" id="group">
                    <option value="">Select Group</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="Select1">Select Role</label>
                <select required name ="role_id" class="form-control" id="role">
                    <option value="">Select Group</option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary mb-2 col-md-12">Update User</button>
        </div>

    </form>

    <br>
    <div class="row">
         <div class="col-md-12 align-self-center">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Resort </th>
                <th>Group </th>
                <th>Role </th>
                @if($authUserID[0]->is_admin == 1)
                <th>Pending</th>
                @endif
                <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($user_data as $user)
                    <tr>
                        <th> {{ $user->user->first_name }} </th>
                        <th> {{ $user->user->last_name }} </th>
                        <th> {{ $user->user->user_name }} </th>
                        <th> {{ $user->resort->name }} </th>
                        <th> {{ $user->group->name }} </th>
                        <th> {{ $user->role->name }} </th>

                        @if($authUserID[0]->is_admin == 1)

                        <th>
                            <ul style="list-style:none;">
                                    @if($user->is_approved == 1)

                                    <form method="POST" action="{{ route('user.changeStatusApproved', $user->user_id) }}">

                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                        <li class="float-left"><button class="btn-danger" type="submit">
                                            Reject </button></li>

                                            @else
                                            <form method="POST" action="{{ route('user.changeStatusApproved', $user->user_id) }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                            <li class="float-left"><button class="btn-primary" type="submit">
                                                Approved </button></li>
                                            </form>
                                    @endif
                                </form>
                            </ul>
                        </th>
                        @endif

                        <th>
                            <form method="POST" action="{{ route('userData.destroy', $user->id) }}">
                            @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn-danger" type="submit">
                                Delete </button>
                            </form>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div><!-- end row-->

@endsection

<!--url:"{{url('/resort-groups')}}/"+resort_id,-->
@section('js')
 <script src="https://code.jquery.com/jquery-3.1.1.min.js">
</script>
    <script type="text/javascript">

    $('#resort').change(function(){
        var resort_id = $(this).val();
        if(resort_id){
        $.ajax({
            type:"GET",
            //url:"{{url('get-group-list')}}/"+resort_id,
            url:"{{ url('get-group-list')}}/"+resort_id,
            success:function(res){
             if(res){
                 $("#group").empty();
                 $("#role").empty();
                 $("#group").append('<option>Select</option>');

                 $.each(res,function(key,value){
                     $("#group").append('<option value="'+key+'">'+value+'</option>');
                 });

             }else{
                $("#group").empty();
             }
            }
         });
     }else{
         $("#resort").empty();
         $("#group").empty();
     }
    });

    $('#group').change(function(){
    var group_id = $(this).val();
    if(group_id){
    $.ajax({
        type:"GET",
        url:"{{url('get-role-list')}}/"+group_id,
        success:function(res){
         if(res){
             $("#role").empty();
             $("#role").append('<option>Select</option>');

             $.each(res,function(key,value){
                 $("#role").append('<option value="'+key+'">'+value+'</option>');
             });

         }else{
            $("#group").empty();
         }
        }
     });
 }else{
     $("#group").empty();
     $("#role").empty();
 }
});

    </script>
@endsection
