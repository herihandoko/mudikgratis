@php
    $page_title = 'Form Peserta Mudik';
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mt-4 mb-4">
                            <div class="user-profile mb-4">
                                <img src="{{ @$user->avatar ? asset(@$user->avatar) : asset('assets/frontend/images/user.png') }}"
                                    alt="user">
                                <h1 class="user-name"> {{ Auth::user()->name }} </h1>
                            </div>
                            <div class="side-nav">
                                <ul>
                                    <li>
                                        <a href="{{ route('user.dashboard') }}">{{ trans('frontend.Dashboard') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta') }}">{{ trans('frontend.Peserta') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}">{{ trans('frontend.Profile') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta.reset') }}" class="active">Ubah Password</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta.cancel') }}" style="background-color:#9d161690 !important;">Pembatalan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="p-4 mt-4 mb-4 border">
                            <form action="{{ route('user.peserta.reset-store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h3 class="mt-4">Ubah Password</h3>
                                <hr>
                                <div class="col-md-12">
                                    <p> Ubah Password dapat digunakan untuk merubah password lama menjadi password baru.</p>
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label for="form_old_password">Password Lama</label>
                                            <input id="form_old_password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" type="password" value="{{ old('old_password') }}">
                                            @error('old_password') <div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label for="form_password">Password Baru</label>
                                            <input id="form_password" name="password" class="form-control @error('password') is-invalid @enderror" type="password" value="{{ old('password') }}">
                                            @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label for="form_password_confirmation">Konfirmasi Password Baru</label>
                                            <input id="form_password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" value="{{ old('password_confirmation') }}">
                                            @error('password_confirmation') <div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="checkbox mt-1">
                                        <label for="form_checkbox">
                                            <input id="showPassword" type="checkbox"> Show Password
                                        </label>
                                    </div>
                                    <div class="mb-3 tm-sc-button mt-10">
                                        <button type="submit" class="btn btn-theme-colored1 mt-2 w-100">{{trans('frontend.Change Password')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
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
