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
                                        <a href="{{ route('user.peserta') }}" class="active">{{ trans('frontend.Peserta') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}">{{ trans('frontend.Profile') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="p-4 mt-4 mb-4 border">
                            @if($user->status_profile == 0 || $user->status_profile == null)
                            <div class="alert alert-info border-0 shadow-sm mb-4" role="alert" style="border-left: 4px solid #0dcaf0 !important;">
                                <div class="d-flex align-items-start">
                                    <span class="me-3 fs-4" style="opacity: 0.9;">📋</span>
                                    <div class="flex-grow-1">
                                        <h6 class="alert-heading mb-2 fw-bold text-dark">Lengkapi Profil Mudik Anda sebelum input data anggota peserta mudik</h6>
                                        <p class="mb-2 small">Silakan lengkapi data mudik Anda sebagai <strong>persyaratan administrasi</strong>. Data yang Anda isi akan digunakan untuk <strong>proses verifikasi</strong> dan pendaftaran tiket mudik.</p>
                                        <ul class="mb-2 small ps-3">
                                            <li>Pastikan semua kolom wajib (*) terisi dengan benar.</li>
                                            <li>Setelah data lengkap, tim kami akan melakukan <strong>verifikasi</strong> sebelum Anda dinyatakan lolos.</li>
                                            <li>Jangan lupa klik tombol <strong>{{ trans('frontend.Save') }}</strong> setelah mengisi data untuk mendapatkan tiket mudik.</li>
                                        </ul>
                                        <p class="mb-2 small d-flex align-items-center">
                                            <span class="me-1">🔒</span>
                                            <span><strong>Data Anda aman</strong> — disimpan dan diproses dengan aman serta terenkripsi.</span>
                                        </p>
                                        <a href="{{ route('user.profile') }}" class="btn btn-sm btn-primary mt-2"><i class="fa fa-edit"></i> {{ trans('frontend.Profile') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <form action="{{ route('user.peserta.update') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ @$peserta->id }}">
                                @csrf
                                <h3 class="mt-4">Edit Peserta</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="nik">{{ trans('frontend.NIK') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nik" required value="{{ @$peserta->nik?: old('nik') }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">{{ trans('frontend.Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_lengkap" required value="{{ @$peserta->nama_lengkap?: old('nama_lengkap') }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="tgl_lahir">{{ trans('frontend.Birthdate') }} <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tgl_lahir" required value="{{ @$peserta->tgl_lahir?: old('tgl_lahir') }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="jenis_kelamin">{{ trans('frontend.Gender') }} <span class="text-danger">*</span></label>
                                            {{ Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], @$peserta->jenis_kelamin?: old('jenis_kelamin'), ['class' => 'form-control','required' => true]) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 box">
                                    <button class="btn btn-theme-colored1 mt-2 w-100" type="submit">{{ trans('frontend.Save') }}</button>
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
