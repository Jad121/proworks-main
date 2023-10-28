<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/google/app.min.css') }}" rel="stylesheet">
    <!-- ================== END core-css ================== -->

    <!-- ================== BEGIN page-css ================== -->
    <link href="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet"> --}}
    <!-- ================== END page-css ================== -->
  
      {{-- <link href="{{asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" /> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>







    <script>
           function csrfHeader() {
    

    return {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
}
    </script>
    
</head>
<body>
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

    <!-- BEGIN #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed app-with-wide-sidebar">
        <!-- BEGIN #header -->
        <div id="header" class="app-header">
            <!-- BEGIN navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-desktop-toggler" data-toggle="app-sidebar-minify">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- END navbar-header -->
            <!-- BEGIN header-nav -->
            <div class="navbar-nav">
                <div class="navbar-item navbar-form">
                    <form action="" method="POST" name="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder='Try searching "Users Today"' />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END header-nav -->
        </div>
        <!-- END #header -->

        <!-- BEGIN #sidebar -->
        <div id="sidebar" class="app-sidebar">
            <!-- BEGIN scrollbar -->
            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
                <!-- BEGIN menu -->
                <div class="menu">
                    <div class="menu-item has-sub mt-5">
                     
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon">
                                <i class="material-icons">grid_on</i>
                            </div>
                            <div class="menu-text">Tables</div>
                            <div class="menu-caret"></div>
                        </a>
                        <div class="menu-submenu">
                            @php
                            $t=App\Http\Controllers\AdminController::getAllTables();
                            $p=0;
                            foreach ($t as $value) {
                                if ($value == 'users' || $value =='migrations' || $value =='personal_access_tokens' ||$value =='password_reset_tokens') {
                                    $p++;
                                }
                                else{

                                   echo' <div class="menu-item">
                                        <a href="/dashboard/tables/'.$value.'" class="menu-link">
                                            <div class="menu-text">'.$value.'</div>
                                        </a>
                                    </div>';

                                   
                                }
                                
                            }
                            @endphp


                        
                        </div>
                    </div>
                </div>
                <!-- END menu -->
            </div>
            <!-- END scrollbar -->
        </div>
        <div class="app-sidebar-bg"></div>
        <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
        <!-- END #sidebar -->

        <!-- BEGIN #content -->
        <div id="content" class="app-content">
            <div class="row">
                 @yield('content')

            </div>
           
            
        </div>
             
        <!-- END #content -->

        <!-- BEGIN scroll-top-btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
        <!-- END scroll-top-btn -->
    </div>
    <!-- END #app -->

    <!-- ================== BEGIN core-js ================== -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- ================== END core-js ================== -->

    <!-- ================== BEGIN page-js ================== -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src=" https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    {{-- <script src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/flot/source/jquery.canvaswrapper.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.colorhelpers.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.saturated.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.browser.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.drawSeries.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.uiConstants.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.navigate.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.touchNavigate.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.hover.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.touch.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.legend.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/demo/dashboard.js') }}"></script>
    <!-- ================== END page-js ================== -->
</body>
</html>
