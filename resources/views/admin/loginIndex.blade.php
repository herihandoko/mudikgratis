@php
$page_title = trans('admin.Admin | Login');
@endphp
@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ url(GetSetting('site_logo')) }}" alt="logo" width="150">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ trans('admin.Login') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.login') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">{{ trans('admin.Email') }}</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                                         @if (env('DEMO_MODE')) value="admin@gmail.com" @else autofocus @endif>
                                    <div class="invalid-feedback">
                                        {{ trans('admin.please fill your email') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">{{ trans('admin.Password') }}</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                        required @if (env('DEMO_MODE')) value="1234" @endif>
                                    <div class="invalid-feedback">
                                        {{ trans('admin.please fill your password') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                            id="remember-me">
                                        <label class="custom-control-label"
                                            for="remember-me">{{ trans('admin.Remember Me') }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        {{ trans('admin.Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="simple-footer">
                        {{ trans('admin.Copyright © Consilt 2022') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
