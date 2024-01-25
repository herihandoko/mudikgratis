@php
$page_title =  'Reset password';
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
                                <h2 class="title">Ubah Password</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-40">
                            <h4 class="text-gray mt-0 pt-10">Form Ubah Password</h4>
                            <hr>
                            <p>Ubah Password dapat digunakan untuk merubah password lama menjadi password baru. Jika anda lupa password anda, silahkan klik link lupa password yang ada di form login atau klik link berikut <a href="{{route('user.forgot')}}">(Lupa Password)</a>.</p>
                            <form name="login-form" class="clearfix" method="POST" action="{{route('user.reset')}}">
                                @csrf
                                @error('password')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{trans('frontend.Error!')}}</strong> {{$message}}.
                                    </div>
                                @enderror
                                @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{trans('frontend.Error!')}}</strong> {{$message}}.
                                    </div>
                                @enderror
                                <input type="hidden" name="token" value="{{request()->route('token')}}">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_email">{{trans('frontend.Email')}}</label>
                                        <input id="form_username_email" name="email" value="{{ old('email') }}" class="form-control" type="text">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="form_old_password">Password Lama</label>
                                        <input id="form_old_password" name="old_password" class="form-control" type="password">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="form_password">Password Baru</label>
                                        <input id="form_password" name="password" class="form-control" type="password">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="form_password_confirmation">Konfirmasi Password Baru</label>
                                        <input id="form_password_confirmation" name="password_confirmation" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="checkbox mt-1">
                                    <label for="form_checkbox">
                                        <input id="showPassword" type="checkbox"> Show Password
                                    </label>
                                </div>
                                <div class="mb-3 tm-sc-button mt-10">
                                    <button type="submit" class="btn btn-dark">{{trans('frontend.Change Password')}}</button>
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
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#showPassword').change(function () {
                var passwordField = $('#form_old_password');
                var fieldType = passwordField.attr('type');

                var passwordFieldPass = $('#form_password');
                var fieldTypePass = passwordFieldPass.attr('type');

                var passwordFieldConfirm = $('#form_password_confirmation');
                var fieldTypeConfirm = passwordFieldConfirm.attr('type');

                if ($('#showPassword').is(':checked')) {
                    passwordField.attr('type', 'text');
                    passwordFieldPass.attr('type', 'text');
                    passwordFieldConfirm.attr('type', 'text');
                } else {
                    passwordField.attr('type', 'password');
                    passwordFieldPass.attr('type', 'password');
                    passwordFieldConfirm.attr('type', 'password');
                }
            });
        });
    </script>
@endpush    
