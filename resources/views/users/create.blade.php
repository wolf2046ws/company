@extends('layouts.default')
@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')

    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="row">
            <div class="col-sm-2 align-self-center">
              <h5> First Name </h5>
            </div>
            <div class="col-sm-4 align-self-center">
                <input required  type="text"
                        class="form-control"
                        id="firstName"
                        name="first_name"
                        value = ""
                        placeholder="John">
            </div>

            <div class="col-sm-2 align-self-center">
              <h5> Last Name</h5>
            </div>
            <div class="col-sm-4 align-self-center">
                <input required type="text"
                        class="form-control"
                        id="lastName"
                        name="last_name"
                        value = "{{old('last_name')}}"
                        placeholder="Doe">
            </div>
        </div><!-- end row-->
        <br>

        <br>
            <div class="row">
                <div class="col-sm-1 align-self-center">
                <h5> Resort </h5>
                </div>
                <div class="col-sm-2 align-self-center">
                    <select required  name="resort_id" class="form-control" id="resort">
                        <option value=""> Select Resort</option>
                        @foreach($resorts as $resort)
                            <option value="{{ $resort->id }}"> {{$resort->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-1 align-self-center">
                  <h5> Group </h5>
                </div>
                <div class="col-sm-3">
                    <select required name="group_id" class="form-control" id="group">
                        <option value="">Select Group</option>

                    </select>
                </div>

                <div class="col-sm-1 align-self-center">
                  <h5> Role </h5>
                </div>
                <div class="col-sm-3">
                    <select required name="role_id" class="form-control" id="role">
                        <option value="">Select Role</option>

                    </select>
                </div>


        </div><!-- end row-->
        <br>
        @if($authUserID->is_admin == 1)

        <div class="row">
            <div class="col-sm-2">
                <h5>Admin : </h5>
            </div>
            <div class="col-sm-1">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="1"
                        name="is_admin">Ja
                    </label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="0"
                        name="is_admin">Nein
                    </label>
                </div>
            </div>
        </div>
        @endif
        <br>
        <div class="row">
            <div class="col-sm-2">
                <h5>Easycamp : </h5>
            </div>
            <div class="col-sm-1">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="ja"
                        name="easycamp">Ja
                    </label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="nein"
                        name="easycamp">Nein
                    </label>
                </div>

            </div>
        </div><!--end row-->

        <br>
        <div class="row">
            <div class="col-sm-2">
                <h5>Cat : </h5>
            </div>
            <div class="col-sm-1">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input"
                        value="ja" name="cat">Ja
                    </label>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="nein"
                        name="cat">Nein
                    </label>
                </div>

            </div>
        </div><!--end row-->

        <br>
        <div class="row">
            <div class="col-sm-2 align-self-center">
              <h5> Hardware : </h5>
            </div>
            <div class="col-sm-10 align-self-center">
                <input required  type="text"
                        class="form-control"
                        id="hardware"
                        name="hardware"
                        value = ""
                        placeholder="Handy">
            </div>
        </div><!--end row-->
        <br>
        <div class="row">
            <div class="col-sm-2 align-self-center">
              <h5> Software : </h5>
            </div>
            <div class="col-sm-10 align-self-center">
                <input required  type="text"
                        class="form-control"
                        id="software"
                        name="software"
                        value = ""
                        placeholder="Zimbra">
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-sm-12 align-self-center">
                <h5>Comment:</h5>
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-sm-6 align-self-center">
                <button type="submit" class="btn btn-primary mb-2 col-md-12">Create User</button>
            </div>

            <div class="col-sm-6">
                    <a href="{{ route('user.create') }}">
                    <button type="button" class="btn btn-danger col-sm-12">
                        Cancel</button>
                    </a>
            </div>

        </div><!--end row-->
        </form>


@endsection

@section('js')



    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    </script>
    <script type="text/javascript">

        $('#resort').change(function(){
            var resort_id = $("#resort").val();

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


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script src="{{ asset('js/jquerydatatable.js') }}" ></script>
<script src="{{ asset('js/bootstrapdatatable.js') }}" ></script>
@endsection
