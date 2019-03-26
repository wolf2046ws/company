@extends('layouts.default')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/bootstrapdatatable.css')}}" >

@endsection

@section('content')
<br>
<a  href="{{ route('resort.create') }}"
    class="btn btn-primary btn-lg active"
    role="button" aria-pressed="true">
        Create New Resort
</a>
<br>
<br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Users</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($resorts as $resort)
                <tr>
                    <th> {{ $resort->name }}</th>
                    <th> {{ $resort->users()->count() }} </th>
                    <th>
                        <ul>
                            <li ><a href="{{ route('resort.edit', $resort->id ) }}">Edit</a></li>
                            <form method="POST" action="{{ route('resort.destroy', $resort->id) }}">
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
                <th>resort</th>
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
