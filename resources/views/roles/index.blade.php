@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
{{--<div class="row">--}}

    {{--<div class="col-sm-6 align-self-center">--}}
        {{--<a  href="{{ route('resort-users.create') }}"--}}
            {{--class="btn btn-primary active col-sm-6"--}}
            {{--role="button" aria-pressed="true">--}}
                {{--Show Roles--}}
        {{--</a>--}}
    {{--</div>--}}
{{--</div><!-- end row-->--}}

<br>
    <div class="row">
        <div class=" col-sm-12 align-self-center">
            <a href="{{route('role.create')}}" class="btn btn-primary active col-sm-12">Create Role
            </a>
        </div>
    </div>
<br>
<br>


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>id</th>
        <th>Role Name</th>
        <th>Role Description</th>
        <th>Resort </th>
        <th>Group </th>
        <th># Permissions</th>
        <th>Actions</th>
    </tr>
    </thead>

    <tbody>
    @foreach($roles as $role)
        <tr>
            <th> {{ $role->id }}</th>
            <th> {{ $role->name }}</th>
            <th> {{ $role->description }}</th>
            <th> {{ $role->resort->name }}</th>
            <th> {{ $role->group['name'] }}</th>
            <th> {{ $role->permissions->count() }}</th>
            <th>
                <form method="POST" action="{{ route('role.destroy', $role->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn-danger" type="submit">
                        Delete </button>
                </form>
            </th>
        </tr>
    @endforeach
    </tbody>

    <!--<tfoot>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Resort</th>
            <th>Department</th>
            <th>Manager Name </th>
            <th>Gender </th>
            <th>Start date</th>
            <th>End Date</th>
        </tr>
    </tfoot>-->

</table>


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
