@php
$page_title =  'Login';
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <!-- Section: page title -->
            <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center">
                <div class="container pt-25 pb-25">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="title">{{trans('frontend.Login')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container" style="padding-top: 25px !important;">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-40">
                            <h4 class="text-gray mt-0 pt-10">{{trans('frontend.Login')}}</h4>
                            <hr>
                            <p>{{trans('frontend.Login to your account')}}</p>
                            <form name="login-form" class="clearfix" method="POST"
                                action="{{route('user.login')}}">
                                @csrf
                                @error('error')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>{{trans('frontend.Error!')}}</strong> {{$message}}.
                                    </div>
                                @enderror
                                @error('g-recaptcha-response')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>{{trans('frontend.Error!')}}</strong>
                                        @if ($errors->first('g-recaptcha-response'))
                                            {{trans('frontend.Captcha Required!')}}
                                        @endif.
                                    </div>
                                @enderror

                                @error('email')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>{{trans('frontend.Error!')}}</strong> {{$message}}.
                                    </div>
                                @enderror
                                @error('password')
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>{{trans('frontend.Error!')}}</strong> {{$message}}.
                                    </div>
                                @enderror
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_email">{{trans('frontend.Email')}}</label>
                                        <input id="form_username_email" name="email" class="form-control" type="email"
                                        @if (env('DEMO_MODE'))
                                            value="user@gmail.com"
                                        @endif
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_password">{{trans('frontend.Password')}}</label>
                                        <input id="form_password" name="password" class="form-control" type="password" @if (env('DEMO_MODE')) value="1234" @endif >
                                    </div>
                                </div>

                                @if (ReCaptcha('recaptcha_status') == 1)
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <div
                                                class="form-group{{$errors->has('g-recaptcha-response') ? ' has-error' : ''}}">
                                                <label class="control-label">Captcha</label>
                                                <div class="pull-center">
                                                    {!! app('captcha')->display() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="checkbox mt-15">
                                    <label for="form_checkbox">
                                        <input id="form_checkbox" name="form_checkbox" type="checkbox"> {{trans('frontend.Remember me')}}
                                    </label>
                                </div>
                                <div class="mb-3 tm-sc-button mt-10">
                                    <button type="submit" class="btn btn-dark">{{trans('frontend.Login')}}</button>
                                </div>
                                <div class="clearfix pt-15">
                                    <a class="text-theme-colored1 font-weight-600 font-size-14"
                                        href="{{route('user.forgot')}}">{{trans('frontend.Forgot Your Password?')}}</a>
                                </div>
                                <div class="clearfix tm-sc-button pt-10">
                                    <a href="{{route('user.register')}}" target="_self"
                                        class="btn btn-theme-colored1 w-100 login-btn" data-tm-bg-color="#3b5998"
                                        >{{trans('frontend.Create an account')}}</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
@endsection
