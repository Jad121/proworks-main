<!DOCTYPE html>
<html lang="{{ $lang }}">

<head>
    <meta charset="utf-8" />
    <title>Out Sourcing MS</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- ================== BEGIN core-css ================== -->
    <link rel="stylesheet" href="{{ asset(urlVersion('css/vendor.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(urlVersion('css/app.min.css')) }}">

    <!-- ================== END core-css ================== -->

    <!-- ================== BEGIN page-css ================== -->
    <link rel="stylesheet" href="{{ asset(urlVersion('css/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(urlVersion('css/responsive.bootstrap5.min.css')) }}">

    <!-- ================== END page-css ================== -->

    <link rel="stylesheet" href="{{ asset(urlVersion('css/main.css')) }}">
    <script src="{{ asset(urlVersion('js/jquery.js')) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script src="{{ asset(urlVersion('js/main.js')) }}"></script>

    <script>
        var lang=@js($lang);
        function uri(endPoint) {
            var url = @js(url('/'));
            var separator = "?";
            if (endPoint.includes(separator)) {
                separator = "&";
            }
            return `${url}/${endPoint}${separator}lang=${lang}`;
        }
    </script>
</head>

<body dir="{{ $dirc }}">
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
                <div class="navbar-brand">
                  <img src="{{asset('images/logo.png')}}" alt="">
                </div>
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
                <div class="navbar-item dropdown">

                    <div class="dropdown-menu media-list dropdown-menu-end">

                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <i class="fa fa-bug media-object bg-gray-400"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Server Error Reports <i
                                        class="fa fa-exclamation-circle text-danger"></i></h6>
                                <div class="text-muted fs-12px">3 minutes ago</div>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <img src="../assets/img/user/user-1.jpg" class="media-object" alt="" />
                                <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">John Smith</h6>
                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                <div class="text-muted fs-12px">25 minutes ago</div>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <img src="../assets/img/user/user-2.jpg" class="media-object" alt="" />
                                <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Olivia</h6>
                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                <div class="text-muted fs-12px">35 minutes ago</div>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <i class="fa fa-plus media-object bg-gray-400"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"> New User Registered</h6>
                                <div class="text-muted fs-12px">1 hour ago</div>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <i class="fa fa-envelope media-object bg-gray-400"></i>
                                <i class="fab fa-google text-warning media-object-icon fs-14px"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"> New Email From John</h6>
                                <div class="text-muted fs-12px">2 hour ago</div>
                            </div>
                        </a>
                        <div class="dropdown-footer text-center">
                            <a href="javascript:;" class="text-decoration-none">View more</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-item navbar-user dropdown">
                    <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center"
                        data-bs-toggle="dropdown">

                        <span class="d-none d-md-inline">{{ auth()->user()->ws_user_email }}</span> <b
                            class="caret ms-lg-2"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-1">
                        {{-- <a href="extra_profile.html" class="dropdown-item">Edit Profile</a>
                        <a href="email_inbox.html" class="dropdown-item d-flex align-items-center">
                            Inbox
                            <span class="badge bg-danger rounded-pill ms-auto pt-5px">2</span>
                        </a> --}}
                        {{-- <a href="calendar.html" class="dropdown-item">Calendar</a>
                        <a href="extra_settings_page.html" class="dropdown-item">Settings</a> --}}
                        <div class="dropdown-divider"></div>
                        <a href="{{uri('logout')}}" class="dropdown-item">Log Out</a>
                    </div>
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
                    <div class="menu-profile">
                        <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile"
                            data-target="#appSidebarProfileMenu">
                            <div class="menu-profile-cover with-shadow"></div>
                            <div class="menu-profile-image">
                                <img src="{{asset('images/user-13.jpg')}}" alt="" />
                            </div>
                            <div class="menu-profile-info text-white">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        Sean Ngu
                                    </div>
                                    <div class="menu-caret ms-auto"></div>
                                </div>
                                <small class="text-white">Frontend developer</small>
                            </div>
                        </a>
                    </div>
                    <div id="appSidebarProfileMenu" class="collapse">
                        <div class="menu-item pt-5px">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon"><i class="fa fa-cog"></i></div>
                                <div class="menu-text">Settings</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                                <div class="menu-text"> Send Feedback</div>
                            </a>
                        </div>
                        <div class="menu-item pb-5px">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                                <div class="menu-text"> Helps</div>
                            </a>
                        </div>
                        <div class="menu-divider m-0"></div>
                    </div>



                    <div class="menu-item">
                        <a href="{{ uri('country/list') }}" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <div class="menu-text">Countries </div>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a href="{{ uri('company/list') }}" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <div class="menu-text">Companies </div>
                        </a>
                    </div>

                   
                    <div class="menu-item">
                        <a href="{{ uri('service/list') }}" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <div class="menu-text">Services </div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ uri('status/list') }}" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa-solid fa-signal"></i>
                            </div>
                            <div class="menu-text">Status </div>
                        </a>
                    </div>
                    {{-- <div class="menu-item">
                        <a href="{{ uri('user/list') }}" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="menu-text">Users </div>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a href="{{ uri('employee/list') }}" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <div class="menu-text">Employees </div>
                        </a>
                    </div> --}}

                </div>
                <!-- END menu -->
            </div>
            <!-- END scrollbar -->
        </div>
        <div class="app-sidebar-bg"></div>
        <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile"
                class="stretched-link"></a></div>
        <!-- END #sidebar -->
        @yield('content')


    </div>
    <!-- END #app -->

    <!-- ================== BEGIN core-js ================== -->

    <script src="{{ asset(urlVersion('js/vendor.min.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/app.min.js')) }}"></script>

    <!-- ================== END core-js ================== -->

    <!-- ================== BEGIN page-js ================== -->
    <script src="{{ asset(urlVersion('js/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/responsive.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/table-manage-default.demo.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/highlight.min.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/render.highlight.js')) }}"></script>



    <!-- ================== END page-js ================== -->
</body>

</html>
