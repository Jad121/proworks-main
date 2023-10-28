<!DOCTYPE html>
<html lang="{{$lang}}">

<head>
    <meta charset="utf-8" />
    <title>Out Sourcing MS</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- ================== BEGIN core-css ================== -->
    <link rel="stylesheet" href="{{ asset(urlVersion('css/vendor.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(urlVersion('css/app.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(urlVersion('css/main.css')) }}">
    <script src="{{ asset(urlVersion('js/jquery.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/main.js')) }}"></script>

</head>

<body dir="{{$dirc}}">
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

    @yield('body')

    <!-- ================== BEGIN core-js ================== -->

    <script src="{{ asset(urlVersion('js/vendor.min.js')) }}"></script>
    <script src="{{ asset(urlVersion('js/app.min.js')) }}"></script>

    <!-- ================== END core-js ================== -->

</body>

</html>
