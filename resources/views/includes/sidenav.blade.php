<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{route("user.index")}}">
          <span data-feather="home"></span>
          Users <span class="sr-only">(current)</span>
        </a>
      </li>

      @foreach($resorts as $resort)
      <li class="nav-item">
        <a class="nav-link" href="{{route('resort.show',$resort->id)}}">
          <span data-feather="home"></span>
          {{$resort->name}} <span class="sr-only">(current)</span>
        </a>
      </li>
      @endforeach


        <li class="nav-item">
          <a class="nav-link" href="{{route('department.index')}}">
            <span data-feather="home"></span>
            Department <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('resort.index')}}">
            <span data-feather="home"></span>
            Resort <span class="sr-only">(current)</span>
          </a>
        </li>

    </ul>


  </div>
</nav>
