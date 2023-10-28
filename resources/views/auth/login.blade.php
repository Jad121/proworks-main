@extends('layouts.website')
@section('body')
<div id="app" class="app">
    <!-- BEGIN login -->
    <div class="login login-v1">
        <!-- BEGIN login-container -->
        <div class="login-container">
            <!-- BEGIN login-header -->
            <div class="login-header">
                <div class="brand">
                    <div class="center">
                      <img src="{{asset('images/logo.png')}}"  class="col-12 mx-auto">
                    </div>
                </div>
               
            </div>
            <!-- END login-header -->

            <!-- BEGIN login-body -->
            <div class="login-body">
                <!-- BEGIN login-content -->
                <div class="login-content fs-13px">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-20px">
                            <input type="email" class="form-control fs-13px h-45px" name="ws_user_email" placeholder="Email Address" required />
                            <label for="ws_user_email" class="d-flex align-items-center">Email Address</label>
                        </div>
                        <div class="form-floating mb-20px">
                            <input type="password" class="form-control fs-13px h-45px" name="ws_user_password" placeholder="Password" required />
                            <label for="ws_user_password" class="d-flex align-items-center">Password</label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-theme h-45px d-block w-100 btn-lg">Sign me in</button>
                        </div>
                    </form>
                    @error('ws_user_email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <!-- END login-content -->
            </div>
            <!-- END login-body -->
        </div>
        <!-- END login-container -->
    </div>
    <!-- END login -->

    <!-- BEGIN scroll-top-btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- END scroll-top-btn -->
</div>
@endsection