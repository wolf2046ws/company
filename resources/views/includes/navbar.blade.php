

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">Regenbogen AG</a>

    @if(Session::get('user')[0]->is_admin == 1 )
    <form method="POST" action="{{ action('userController@syncDatabaseWithAD') }}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary">Sync Database with AD</button>
    </form>
    @endif


        <h6 style="color:white">Your are logged as :
             {{ Session::get('user')[0]->user_name  }}
        </h6>

    <ul class="navbar-nav px-3">

        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Sign out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<br><br>
