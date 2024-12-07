@php
    $title = 'Login Page';
    $description = 'Login Page'
@endphp
@extends('layout_full',['title'=>$title, 'description'=>$description])
@section('css')

@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/auth.login.js"></script>
@endsection

@section('content_left')
    <div class="min-h-100 d-flex align-items-center">
        <div class="w-100 w-lg-75 w-xxl-50">
            <div>
                <div class="mb-5">
                    <h1 class="display-3 text-white">@lang('lang.title_login')</h1>
                </div>
                <p class="h6 text-white lh-1-5 mb-5">
                    @lang('lang.description_login')
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content_right')
    <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-50 px-5">

            <div id="kc-header" class="login-pf-page-header">
                <img width="120px" src="https://cdn.podimo.com/images/20f436b3-769c-426f-b0bd-08848f505163_400x400.png" class="logo-pao-class" alt="">
            </div>

            <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">@lang('lang.welcome'),</h2>
                <h2 class="cta-1 text-primary">@lang('lang.get_started')</h2>
            </div>
            <div class="mb-5">
                <p class="h6">@lang('lang.login')</p>
                {{--<p class="h6">
                    @lang('lang.not_member')
                    <a href="/Pages/Authentication/Register">@lang('lang.register')</a>
                    .
                </p>--}}
            </div>
            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control" placeholder="Código Utp" name="email" value="{{ old('email') }}" />
                    </div>
                    @error('email')
                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input class="form-control pe-7" name="password" type="password" placeholder="@lang('lang.password')" />
                        <a class="text-small position-absolute t-3 e-3" href="https://contrasena.utp.edu.pe/Recuperacion/OlvideMiClave.aspx">@lang('lang.forgot')</a>
                    </div>

                    @error('password')
                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br>

                    <button type="submit" class="btn btn-lg btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
