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
                            <div class="alert alert-danger" role="alert"> Anda belum memiliki tiket mudik. Silahkan lengkapi data mudik Anda dan jangan lupa klik button <b>{{ trans('frontend.Save') }}</b> untuk mendapatkan tiket mudik.
                                <a href="{{ route('user.profile') }}"> {{ trans('frontend.Profile') }}</a>
                            </div>
                            @endif
                            <form action="{{ route('user.peserta.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h3 class="mt-4">Tambah Peserta</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger mt-2" role="alert"> 
                                            Sebelum Submit data Anda akan diperiksa terlebih dahulu oleh Admin Kami. Kami akan beritahu Anda (via Email atau selalu cek dashboard aplikasi Anda) apabila data Anda memenuhi syarat sebagai Peserta Mudik.
                                        </div>
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
                                <button class="btn btn-theme-colored1 mt-2" type="submit">{{ trans('frontend.Save') }}</button>
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
