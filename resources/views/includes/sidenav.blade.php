<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


<nav class="col-md-2 d-none d-md-block bg-light sidebar" >
  <div class="sidebar-sticky" >
      @if ((isset($_SERVER['HTTP_USER_AGENT'])) && (strlen(strstr($_SERVER['HTTP_USER_AGENT'], 'Firefox')) > 0))
          <ul class="nav flex-column" style="margin-top:50px;">
        @else
        <ul class="nav flex-column" style="margin-top:20px;">
        @endif



<!--text-primary as class for changing color-->
@if(in_array('user.create', $allowed_url))
<li class="nav-item">
  <a class="nav-link" href="{{route("user.create")}}">
    <i class="fas fa-user-plus fa-lg" >
        Create User
    </i>
  </a>
</li>
@endif

@if(in_array('group.index', $allowed_url))
<li class="nav-item">
<a class="nav-link" href="{{route("group.index")}}">
  <i class="fas fa-users-cog fa-lg" >
  Create Groups </i>
</a>
</li>
@endif

@if(in_array('role.index', $allowed_url))
<li class="nav-item">
<a class="nav-link" href="{{route("role.index")}}">
 <i class="fas fa-users-cog fa-lg" >
  Create Roles </i>
</a>
</li>
@endif


@if(in_array('permission.index', $allowed_url))
<li class="nav-item">
  <a class="nav-link" href="{{route('permission.index')}}">
    <i class="fas fa-users-cog fa-lg" >
    Create Permissions </i>
  </a>
</li>
<div class="dropdown-divider"></div>

@endif




@if(in_array('user.index', $allowed_url))
<li class="nav-item">
<a class="nav-link" href="{{route("user.index")}}">
  <i class="fas fa-user-check fa-lg">
       Enabled Users
  </i>
</a>
</li>
@endif

@if(in_array('user.disabled', $allowed_url))
<li class="nav-item">
<a class="nav-link" href="{{route("user.disabled")}}">
  <i class="fas fa-user-lock fa-lg">
  Disabled Users </i>
</a>
</li>
<div class="dropdown-divider"></div>

@endif


    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fas fa-hotel fa-lg">
        Resorts
    </i>
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
        @foreach($resorts as $resort)
        <li class="nav-item">
            <a class="dropdown-item nav-link" href="{{route('resort.show',$resort->id)}}">
                <i class="fas fa-hotel">
                    {{ $resort->name }}
                </i>
            </a>
        </li>
        @endforeach
    </ul>

    <div class="dropdown-divider"></div>


    @if(in_array('logs', $allowed_url))
    <li class="nav-item">
        <a class="nav-link" href="{{route("logs")}}">
            <i class="fas fa-file-alt fa-lg"> &nbsp;Logs </i>
        </a>
    </li>
    @endif
</ul>


  </div>
</nav>
