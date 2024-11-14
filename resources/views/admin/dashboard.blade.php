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
                                    <a href="">
                                        <h4>Pengguna</h4>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a
                                        href="{{ route('admin.mudik-pengguna.index') }}">{{ App\Models\User::where('periode_id', session('id_period'))->count() }}</a>
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
                                    <a
                                        href="{{ route('admin.mudik-report.index') }}">{{ App\Models\Peserta::where('periode_id', session('id_period'))->count() }}</a>
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
                                    <a
                                        href="{{ route('admin.mudik-bus.index') }}">{{ App\Models\Bus::where('id_period', session('id_period'))->count() }}</a>
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
                                    <a href="{{ route('admin.mudik-kota.index') }}">
                                        {{ App\Models\MudikTujuanKota::where('id_period', session('id_period'))->count() }}</a>
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
                                    <a href="{{ route('admin.mudik-verifikasi.index', ['status_mudik' => 'diterima']) }}">
                                        {{ App\Models\User::where('status_mudik', 'diterima')->where('periode_id', session('id_period'))->count() }}</a>
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
                                    <a href="{{ route('admin.mudik-verifikasi.index', ['status_mudik' => 'dikirim']) }}">
                                        {{ App\Models\User::where('status_mudik', 'dikirim')->where('periode_id', session('id_period'))->count() }}
                                    </a>
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
                                    <a
                                        href="{{ route('admin.mudik-bus.index') }}">{{ App\Models\Bus::where('id_period', session('id_period'))->sum('jumlah_kursi') }}</a>
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
                                    <a
                                        href="{{ route('admin.mudik-bus.index', ['status' => 'terisi']) }}">{{ App\Models\Peserta::where('periode_id', session('id_period'))->where('nomor_kursi', '!=', '')->count() }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Statistik Ketersedian Bus</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($tujuans as $item => $tujuan)
                                    <div class="row text-center mt-5">
                                        <div class="col-md-12">
                                            <h6>{{ $tujuan->name }}</h6>
                                        </div>
                                    </div>
                                    <?php $no = 1; ?>
                                    @foreach ($tujuan->provinsis as $key => $provinsi)
                                        <div class="row text-md-center mt-3">
                                            <div class="col-md-12  text-sm-left">
                                                {{ $no++ }} . {{ $provinsi->name }}
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table cellspacing="0" cellpadding="0"
                                                class="table table-condensed table-striped table-statistic">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        @if ($tujuan->code == 'keluar-banten')
                                                            <th class="text-center">Kota Tujuan</th>
                                                        @else
                                                            <th class="text-center">Kota Asal</th>
                                                        @endif
                                                        <th class="text-center">Total Bus</th>
                                                        <th class="text-center">Total Kuota</th>
                                                        <th class="text-center">Total Pendaftar</th>
                                                        <th class="text-center">Sisa Kuota</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $nox = 1; ?>
                                                    @foreach ($provinsi->kota as $keyx => $val)
                                                        <tr>
                                                            <td class="text-left">{{ $nox++ }}</td>
                                                            <td class="text-left">{{ $val->name }}</td>
                                                            <td class="text-right">{{ $val->bus->count() }} Bus</td>
                                                            <td class="text-right">
                                                                {{ $val->bus->sum('jumlah_kursi') }} Kursi
                                                            </td>
                                                            <td class="text-right">
                                                                {{ $val->userKota->sum('jumlah') }} Peserta
                                                            </td>
                                                            @if ($val->bus->sum('jumlah_kursi') - $val->userKota->sum('jumlah') < 0)
                                                                <td class="text-right">0 Kursi</td>
                                                            @else
                                                                <td class="text-right">
                                                                    {{ $val->bus->sum('jumlah_kursi') - $val->userKota->sum('jumlah') }}
                                                                    Kursi</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </body>
                                            </table>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
