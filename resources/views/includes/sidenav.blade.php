<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">


@if(in_array('user.create', $allowed_url))
<li class="nav-item">
  <a class="nav-link active" href="{{route("user.create")}}">
    <span data-feather="home"></span>
    Create New User <span class="sr-only">(current)</span>
  </a>
</li>
@endif

@if(in_array('user.index', $allowed_url))
<li class="nav-item">
<a class="nav-link active" href="{{route("user.index")}}">
  <span data-feather="home"></span>
  Enabled Users <span class="sr-only">(current)</span>
</a>
</li>
@endif

@if(in_array('user.disabled', $allowed_url))
<li class="nav-item">
<a class="nav-link" href="{{route("user.disabled")}}">
  <span data-feather="home"></span>
  Disabled Users <span class="sr-only"></span>
</a>
</li>
@endif

@foreach($resorts as $resort)
    <li class="nav-item">
        <a class="nav-link" href="{{route('resort.show',$resort->id)}}">
        <span data-feather="home"></span>
        {{ $resort->name }} <span class="sr-only"></span>
        </a>
    </li>
@endforeach


@if(in_array('group.index', $allowed_url))
<li class="nav-item">
<a class="nav-link" href="{{route("group.index")}}">
  <span data-feather="home"></span>
  Create Groups <span class="sr-only"></span>
</a>
</li>
@endif

@if(in_array('role.index', $allowed_url))
<li class="nav-item">
<a class="nav-link" href="{{route("role.index")}}">
  <span data-feather="home"></span>
  Create Roles <span class="sr-only"></span>
</a>
</li>
@endif



@if(in_array('permission.index', $allowed_url))
<li class="nav-item">
  <a class="nav-link" href="{{route('permission.index')}}">
    <span data-feather="home"></span>
    Create Permissions <span class="sr-only">(current)</span>
  </a>
</li>
@endif
    </ul>


  </div>
</nav>
