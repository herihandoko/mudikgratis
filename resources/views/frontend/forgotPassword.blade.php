@php
$page_title =  'Forgot password';
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
                <div class="container pt-50 pb-50">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="title">{{trans('frontend.Reset Password')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-40">
                            <h4 class="text-gray mt-0 pt-10">{{trans('frontend.Reset Password')}}</h4>
                            <hr>
                            <p>{{trans('frontend.Enter your registered email.')}}</p>
                            <form name="login-form" class="clearfix" method="POST"
                                action="{{route('user.forgot')}}">
                                @csrf


                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_email">{{trans('frontend.Email')}}</label>
                                        <input id="form_username_email" name="email" class="form-control" type="text">
                                    </div>
                                </div>


                                <div class="mb-3 tm-sc-button mt-10">
                                   <button type="submit" class="btn btn-primary">{{trans('frontend.Reset')}}</button>
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
