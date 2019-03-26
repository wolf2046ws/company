

    @include('includes.head')

    <body>
        @include('includes.navbar')

        <div class="container-fluid">
          <div class="row">

                @include('includes.sidenav')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


                  @include('includes.messages')
                  @yield('content')
                </main>
        </div>
    </div> <!-- end container -->


        @include('includes.footer')
