@extends('layouts.default')


@section('content')

<form method="POST" action="{{ route('user.update', $user->id) }}">
    @csrf
    {{ method_field('PUT') }}

<br>
  <div class="form-inline">
    <label for="firstName"> First Name </label>
    <input  type="text"
            class="form-control"
            id="firstName"
            name="first_name"
            value = "{{$user->first_name}}"
            placeholder="John">
  </div>
<br>
  <div class="form-inline">
    <label for="lastName">Last Name </label>
    <input  type="text"
            class="form-control"
            id="lastName"
            name="last_name"
            value = "{{$user->last_name}}"

            placeholder="Doe">
  </div>


  <div class="form-group">
    <label for="Select1">Select Department</label>
    <select name ="department_id" class="form-control" id="Select1">
        @foreach($departments as $department)
            <option @if($user->department_id == $department->id ) selected @endif
             value="{{ $department->id }}"> {{ $department->name }} </option>
      @endforeach
    </select>
  </div>


    <div class="form-group">
        <label for="Select1">Select Group</label>
        <select name ="group_id" class="form-control" id="Select1">
            @foreach($groups as $group)
                <option @if($user->group_id == $group->id ) selected @endif
                value="{{ $group->id }}"> {{ $group->name }} </option>
            @endforeach
        </select>
    </div>


    <?php
    /*
    <div class="form-group">
    <label for="Select2">Select Company</label>
    <select name="company_id" class="form-control" id="Select2">
        @foreach($companies as $company)
            <option @if($user->company_id == $company->id ) selected @endif
                value="{{$company->id}}"> {{ $company->name }} </option>
      @endforeach
    </select>
</div>
*/?>

    <div class="form-group">
      <label for="Select3">Select Resort</label>
      <select name="resort_id" class="form-control" id="Select3">
          @foreach($resorts as $resort)
              <option @if($user->resort_id == $resort->id ) selected @endif
                value="{{ $resort->id }}"> {{ $resort->name }} </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
        <label for="Select3">Select Software</label>

            @foreach($softwares as $software)
            @if($user->softwares()->where('component_id','=',$software->id)->count() == 1 &&
            $user->softwares()->where('component_id', $software->id)->first()->status == 'pending' )
            <div class="form-check form-check-inline">
              <input class="form-check-input" name="softwares[]"
              type="checkbox" id="inlineCheckbox1"
              value="{{$software->id}}"
              @if($user->softwares()->where('component_id','=',$software->id)->count() == 1) checked @endif>
              <label class="form-check-label" for="inlineCheckbox1">{{$software->name}}</label>
            </div>
            @elseif($user->softwares()->where('component_id','=',$software->id)->count() == 0)
            <div class="form-check form-check-inline">
              <input class="form-check-input" name="softwares[]"
              type="checkbox" id="inlineCheckbox1"
              value="{{$software->id}}">
              <label class="form-check-label" for="inlineCheckbox1">{{$software->name}}</label>
            </div>
            @endif
            @endforeach

    </div>

    <div class="form-group">
        <label for="Select3">Select Hardware</label>
        @foreach($hardwares as $hardware)
        @if(($user->hardwares()->where('component_id','=',$hardware->id)->count() == 1) &&
        ($user->hardwares()->where('component_id', $hardware->id)->first()->status == 'pending') )
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="hardwares[]" type="checkbox"
          id="inlineCheckbox1" value="{{$hardware->id}}"
          @if($user->hardwares()->where('component_id','=', $hardware->id)->count() == 1) checked @endif>
          <label class="form-check-label" for="inlineCheckbox1">{{$hardware->name}}</label>
        </div>
        @elseif($user->hardwares()->where('component_id','=',$hardware->id)->count() == 0)
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="hardwares[]" type="checkbox"
          id="inlineCheckbox1" value="{{$hardware->id}}">
            <label class="form-check-label" for="inlineCheckbox1">{{$hardware->name}}</label>
        </div>
        @endif
        @endforeach
    </div>

    <div class="form-group">
        <label for="Select3">Select File</label>
        @foreach($files as $file)
        @if($user->files()->where('component_id','=',$file->id)->count() == 1 &&
        $user->files()->where('component_id', $file->id)->first()->status == 'pending' )
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="access_files[]" type="checkbox"
          id="inlineCheckbox1" value="{{$file->id}}"
          @if($user->files()->where('component_id','=', $file->id)->count() == 1) checked @endif>
          <label class="form-check-label" for="inlineCheckbox1">{{$file->name}}</label>
        </div>
        @elseif($user->files()->where('component_id','=',$file->id)->count() == 0)
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="access_files[]" type="checkbox"
          id="inlineCheckbox1" value="{{$file->id}}">
            <label class="form-check-label" for="inlineCheckbox1">{{$file->name}}</label>
        </div>
        @endif
        @endforeach
    </div>


    <div class="form-group">
     <label >Contract Start</label>
     <input type="date" name="contract_start" max="3000-12-31"
            value="{{$user->contract_start}}"
            min="1000-01-01" class="form-control">
    </div>
    <div class="form-group">
     <label >Contract End</label>
     <input type="date" name="contract_end" min="1000-01-01"
        value="{{$user->contract_end}}"

            max="3000-12-31" class="form-control">
    </div>

  <button type="submit" class="btn btn-primary mb-2">Update User</button>

</form>

@endsection
