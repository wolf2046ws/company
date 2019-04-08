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
                    <option value=""> Select Resort</option>
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
                <input type="text" required name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1"  placeholder="Name">
            </div>

        </div><!-- end row-->
        <br>
        <div class="row">
            <div class="col-sm-2 align-self-center">
                <h5> Role Description </h5>
            </div>
            <div class="col-sm-4">
                <input type="text" required name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
            </div>
        </div><!-- end row-->
        <br>
        <br>

        <div class="col-sm-12 align-self-center">
            <h5>Select Permissions </h5>
        </div>
        <br>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item active">
                <a class="nav-link" data-toggle="tab" href="#web"> Web </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#ad"> Groups AD </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#sdsd"> Files </a>
              </li>
            </ul>


            <!-- Tab panes -->
            <div class="tab-content">

                    <div class="tab-pane container" id="web" >
                        <div class="row">
                        @foreach($p_slug_web as $slug_web)
                        <div class="col-md-4">
                            <div class="tab-pane container active" id="web" >
                                <div class="custom-control custom-checkbox" >
                                    <input class="form-check-input" name="permissions[]"
                                           type="checkbox" id="inlineCheckbox1"
                                           value="{{$slug_web->id}}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{$slug_web->description}}</label>
                                </div>
                            </div>
                        </div><!-- end col -->
                        @endforeach
                        </div><!-- end row-->
                    </div><!-- end web -->

                    <div class="tab-pane container" id="ad">
                        <div class="row">
                        @foreach($p_slug_ad as $slug_ad)
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox ">
                                    <input class="form-check-input" name="permissions[]"
                                           type="checkbox" id="inlineCheckbox1"
                                           value="{{$slug_ad->id}}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{$slug_ad->description}}</label>
                                </div>
                            </div><!-- end col -->
                        @endforeach
                        </div><!-- end row-->
                    </div><!-- end ad-->

                    <div class="tab-pane container" id="sdsd">
                        Test
                    </div>
            </div>



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
