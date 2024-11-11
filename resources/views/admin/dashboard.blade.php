@php
    $page_title = trans('admin.Admin | Dashboard');
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ trans('admin.Dashboard') }} ( {{ session('name_period') }} )</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fa fa-user text-white fa-2x"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <a href=""><h4>Pengguna</h4></a>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.mudik-pengguna.index') }}">{{ App\Models\User::count() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                              <i class="fa fa-users text-white fa-2x"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Peserta</h4>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.mudik-report.index') }}">{{ App\Models\Peserta::count() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                              <i class="fa fa-bus text-white fa-2x"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Bus</h4>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.mudik-bus.index') }}">{{ App\Models\Bus::count() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                              <i class="fa fa-building text-white fa-2x"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Kota Tujuan</h4>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.mudik-kota.index') }}"> {{ App\Models\MudikTujuanKota::count() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fa fa-check text-white fa-2x"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>User Terverifikasi</h4>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.mudik-verifikasi.index',['status_mudik'=>'diterima']) }}"> {{ App\Models\User::where('status_mudik', 'diterima')->count() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                              <i class="fa fa-hourglass text-white fa-2x"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Menunggu Verifikasi</h4>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.mudik-verifikasi.index',['status_mudik'=>'dikirim']) }}"> {{ App\Models\User::where('status_mudik', 'dikirim')->count() }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                              <i class="fa fa-chair text-white fa-2x"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Kursi</h4>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.mudik-bus.index') }}">{{ App\Models\Bus::sum('jumlah_kursi') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                              <i class="fa fa-chair text-white fa-2x"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Kursi Terisi</h4>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.mudik-bus.index',['status'=>'terisi']) }}">{{ App\Models\Peserta::where('nomor_kursi', '!=', '')->count() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
