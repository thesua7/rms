@extends('layouts.app')
@section('css')
    @yield('auth-css')
@endsection
@section('body')
    <div class="home-btn d-none d-sm-block">
        <a href="/" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to FSREL.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="/">
                                    <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{asset('images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                    </span>
                                    </div>
                                </a>
                            </div>
                            @yield('content')

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div>
                            {{--                        <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Signup now </a> </p>--}}
                            <p>© 2020 FSREL. Crafted with <i class="mdi mdi-heart text-danger"></i> by maroon.lab</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @yield('auth-js')
@endsection
