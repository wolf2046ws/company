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

        <hr>

        <button type="button" value="Filter" id="filterButt">Checked </button>
        <input type="button" value="Reset" id="resetButt"/>
        <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>
                    <tr>
                        <th style="width: 10%;">id</th>
                        <th>Description</th>
                        <th>Slug</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($p_slug_web as $slug_web)
                        <tr>
                            <th>
                                 {{$slug_web->id}}
                                <input style="margin-left: 20px !important;" class="form-check-input" name="permissions[]"
                                  type="checkbox" id="inlineCheckbox1"
                                  value="{{$slug_web->id}}">
                            </th>
                            <th> {{$slug_web->description}} </th>
                            <th> {{$slug_web->slug}} </th>

                        </tr>
                    @endforeach
                    @foreach($p_slug_ad as $slug_ad)
                        <tr>
                            <th>
                                <input class="form-check-input" name="permissions[]"
                                type="checkbox" id="inlineCheckbox1"
                                value="{{$slug_ad->id}}">
                                  {{$slug_ad->id}}
                            </th>
                            <th> {{$slug_ad->description}} </th>
                            <th> {{$slug_ad->slug}} </th>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        <br>

        <br>
        <div class="row">
            <div class=" col-sm-12 align-self-center">
                <button type="submit" class="btn btn-primary active col-sm-12">Create Role
                </button>
            </div>
        </div>
    </form>
    <br>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable();
            //var checked = [];
            $('#filterButt').click(function(){
                $('#example tbody').find('tr:not(:has(:checkbox:checked))').hide();
            });
            $('#resetButt').click(function(){
                $('#example').find('tr').show();
                $('#example input:checkbox').removeAttr('checked');
            });


                 // Iterate over all selected checkboxes

                     /*$('input[type="checkbox"]').click(function(){
                         if($(this).prop("checked") == true){
                             $('.permission:checked').val();
                             checked.push($(this).val());
                         }
                         else if($(this).prop("checked") == false){
                             var index = checked.indexOf($(this).val());
                             if (index !== -1) checked.splice(index, 1);
                         }
                         var str = '<div>'
                         checked.forEach(function(slide) {
                           str +=  slide + ' , ';
                         });
                        str += '</div>';
                         document.getElementById("result").innerHTML = str;
                     });*/

                 });


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
