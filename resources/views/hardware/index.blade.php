@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
<br>
<a  href="{{ route('hardware.create') }}"
    class="btn btn-primary btn-lg active"
    role="button" aria-pressed="true">
        Create New Hardware
</a>
<br>
<br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Requests</th>
                <th>Installed</th>
                <th>Model</th>
            </tr>
        </thead>

        <tbody>
            @foreach($hardwares as $hardware)
                <tr>
                    <th> {{ $hardware->name }}</th>
                    <th> {{ $hardware->users()->where('status','pending')->count() }} </th>
                    <th> {{ $hardware->users()->where('status','delevired')->count() }} </th>
                    <th> {{ $hardware->model }}</th>
                    <th>
                        <ul>
                            <li ><a href="{{ route('hardware.edit', $hardware->id ) }}">Edit</a></li>
                            <form method="POST" action="{{ route('hardware.destroy', $hardware->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                            <li ><button type="submit">
                                Delete</button></li>
                        </form>
                        </ul>
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
<script src="{{ asset('js/jquerydatatable.js') }}" ></script>
<script src="{{ asset('js/bootstrapdatatable.js') }}" ></script>
@endsection
