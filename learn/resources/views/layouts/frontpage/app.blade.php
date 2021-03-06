<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>BookBS | @yield('title')</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <link rel="shortcut icon" href="{{ asset('codebase/src/assets/img/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('codebase/src/assets/img/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('codebase/src/assets/img/favicons/apple-touch-icon-180x180.png')}}">
        <link rel="stylesheet" id="css-main" href="{{ asset('codebase/src/assets/css/codebase.min.css')}}">
        <link rel="stylesheet" href="{{ asset('codebase/src/assets/js/plugins/slick/slick.min.css')}}">
        <link rel="stylesheet" href="{{ asset('codebase/src/assets/js/plugins/slick/slick-theme.min.css')}}">
        <link rel="stylesheet" href="{{ asset('codebase/src/assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    </head>
    <body>
        <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">
            
            @yield('sidebar')

            @yield('header')

            {{--  <!-- Main Container -->  --}}
            <main id="main-container">
                {{--  <!-- Page Content -->  --}}
                <div class="content content-full">
                    @yield('content')
                </div>
                {{--  <!-- END Page Content -->  --}}
            </main>
            {{--  <!-- END Main Container -->  --}}

            @include('layouts.frontpage.footer')
        </div>
        {{--  <!-- END Page Container -->  --}}

        {{--  <!-- Codebase Core JS -->  --}}
        <script src="{{ asset('codebase/src/assets/js/core/jquery.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/core/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/core/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/core/jquery.scrollLock.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/core/jquery.appear.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/core/jquery.countTo.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/core/js.cookie.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/codebase.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/pages/be_pages_dashboard.js')}}"></script>
        {{--  <!-- Page JS Plugins -->  --}}
        <script src="{{ asset('codebase/src/assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        {{--  <!-- Page JS Code -->  --}}
        <script src="{{ asset('codebase/src/assets/js/pages/be_forms_wizard.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/plugins/slick/slick.min.js')}}"></script>
        <script src="{{ asset('codebase/src/assets/js/pages/op_auth_signup.js') }}"></script>
        <script src="{{ asset('codebase/src/assets/js/pages/be_tables_datatables.js')}}"></script>

        <!-- Page JS Code -->
        <script>
            jQuery(function () {
                // Init page helpers (Slick Slider plugin)
                Codebase.helpers('slick');
            });
        </script>
    </body>
</html>