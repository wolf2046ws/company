        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        @yield('js')

            <script>
                window.jQuery || document.write("<script src='{{ asset('js/jquery.min.js') }}'><\/script>'")
            </script>

                <script src="{{ asset('js/popper.min.js') }}" ></script>
                <script src="{{ asset('js/bootstrap.min.js')}}" ></script>
                <script src="{{ asset('js/feather.min.js') }}"></script>
        <script>
          feather.replace()
        </script>
      </body>
    </html>
