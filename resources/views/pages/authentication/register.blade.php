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
    <script src="/js/pages/auth.register.js"></script>
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
            <div class="sh-11">
                <a href="/">
                    {{--<div class="logo-default"></div>--}}
                </a>
            </div>
            <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">@lang('lang.welcome'),</h2>
                <h2 class="cta-1 text-primary">@lang('lang.lets_get_started')</h2>
            </div>
            <div class="mb-5">
                <p class="h6">@lang('lang.use_form').</p>
                <p class="h6">
                    @lang('lang.if_member')
                    <a href="/Pages/Authentication/Login">@lang('lang.login')</a>
                    .
                </p>
            </div>
            <div>
                <form id="registerForm" class="tooltip-end-bottom" novalidate>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control" placeholder="@lang('lang.name')" name="registerName" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="email"></i>
                        <input class="form-control" placeholder="@lang('lang.email')" name="registerEmail" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input class="form-control" name="registerPassword" type="password" placeholder="@lang('lang.password')" />
                    </div>
                    {{--<div class="mb-3 position-relative form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="registerCheck" name="registerCheck" />
                            <label class="form-check-label" for="registerCheck">
                                I have read and accept the
                                <a href="/" target="_blank">terms and conditions.</a>
                            </label>
                        </div>
                    </div>--}}
                    <button type="submit" class="btn btn-lg btn-primary">@lang('lang.Signup')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
