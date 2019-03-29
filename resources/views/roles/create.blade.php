@extends('layouts.default')


@section('content')


    <form method="POST" action="{{ route('role.store') }}">
        @csrf
        <div class="row">
            <div class="col-sm-2 align-self-center">
                <h5> Select Resort </h5>
            </div>
            <div class="col-sm-2 align-self-center">
                <select required name="resort_id" class="form-control" id="resort">
                    <option value="">Resort</option>
                @foreach($resorts as $resort)
                        <option value="{{ $resort->id }}"> {{ $resort->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-2 align-self-center">
                <h5> Select Group </h5>
            </div>
            <div class="col-sm-2">
                <select required name="group_id" class="form-control" id="group">
                    <option> </option>
                </select>
            </div>


        </div> <!-- end row-->
        <br>
        <div class="row">
            <div class="col-sm-2 align-self-center">
                <h5> Role Name </h5>
            </div>
            <div class="col-sm-4">
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1"  placeholder="Name">
            </div>

        </div><!-- end row-->
        <br>
        <div class="row">
            <div class="col-sm-2 align-self-center">
                <h5> Role Description </h5>
            </div>
            <div class="col-sm-4">
                <input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
            </div>
        </div><!-- end row-->
        <br>
        <div class="row border">
            <div class="col-sm-12 align-self-center">
                <h5>Select Permissions </h5>
            </div>
            @foreach($permissions as $permission)
                <div style="width: 20rem;">
                    <div class="custom-control custom-checkbox">
                        <input class="form-check-input" name="permissions[]"
                               type="checkbox" id="inlineCheckbox1"
                               value="{{$permission->id}}">
                        <label class="form-check-label" for="inlineCheckbox1">{{$permission->description}}</label>
                    </div>
                </div>
            @endforeach

        </div><!--end row-->
        <br>
        <div class="row">
            <div class=" col-sm-12 align-self-center">
                <button type="submit" class="btn btn-primary active col-sm-12">Create Role
                </button>
            </div>
        </div>
    </form>
    <br>
    <br>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

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




    </script>


    <script src="{{ asset('js/jquerydatatable.js') }}" ></script>
    <script src="{{ asset('js/bootstrapdatatable.js') }}" ></script>
@endsection
