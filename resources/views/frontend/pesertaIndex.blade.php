@php
    $page_title = 'Peserta Mudik';
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
                                        <a href="{{ route('user.peserta') }}"
                                            class="active">{{ trans('frontend.Peserta') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}">{{ trans('frontend.Profile') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta.reset') }}">Ubah Password</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta.cancel') }}"
                                            style="background-color:#9d161690 !important;">Pembatalan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mt-5">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <h4><i class="fa fa-users"></i> Peserta Mudik Lainnya (Maksimal {{ auth()->user()->jumlah }} Orang)</h4>
                            </div>
                            <div class="col-md-3 col-sm-12 text-right">
                                @if ($user->status_mudik !== 'dikirim')
                                    @if ($user->peserta->count() < auth()->user()->jumlah && $user->status_profile == 1 && $user->status_mudik != 'diterima')
                                        <a href="{{ route('user.peserta.create') }}" class="btn btn-success btn-xs w-100"><i class="fa fa-plus"></i> Tambah Peserta</a>
                                    @endif
                                    @if ($user->status_profile == 1 && $user->status_mudik == 'diterima')
                                        {{-- <a target="_blank" href="{{ route('user.peserta.eticket', $user->id) }}" class="btn btn-success btn-xs w-100"><i class="fa fa-download"></i> Download E-Tiket</a> --}}
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if ($user->status_profile == 1 && $user->status_mudik == 'dikirim')
                                <div class="alert alert-info mt-2" role="alert">
                                    Pendaftaran peserta mudik Anda dalam proses verifikasi. Kami akan beritahu Anda (via Whatsapp atau selalu cek dashboard aplikasi Anda)
                                    apabila data Anda memenuhi syarat sebagai Peserta Mudik.
                                </div>
                            @endif
                            @if ($user->status_profile == 1 && $user->status_mudik == 'diterima')
                            <div class="alert alert-success mt-2" role="alert">
                                Selamat Data Peserta Mudik Anda Sudah tersimpan dengan Nomor Registrasi <b>{{ $user->nomor_registrasi }}</b>.<br>
                                Peserta Mudik yang di nyatakan terdaftar wajib hadir pada saat Verifikasi Waktu dan Tempat untuk Verifikasi sebagai
                                berikut :<br>
                                a. Peserta Mudik Gratis dari Provinsi Banten Keluar Provinsi Banten :<br>
                                <ul>
                                    <li>Tanggal : <b>22 - 23 Maret 2024</b></li>
                                    <li>Waktu :  <b>09.00 WIB s/d 17.00 WIB</b></li>
                                    <li>Tempat :  <b>Kantor Dinas Perhubungan Provinsi Banten KP3B - Palima Kota Serang</b></li>
                                </ul>
                                b. Peserta Mudik Gratis dari Luar Provinsi Banten ke Provinsi Banten :<br>
                                <ul>
                                    <li>Tanggal :  <b>22 - 23 Maret 2024</b></li>
                                    <li>Waktu :  <b>09.00 WIB s/d 17.00 WIB</b></li>
                                    <li>Tempat : <b>Akan di Informasikan lebih lanjut</b></li>
                                </ul>
                                Terima Kasih;
                                {{-- Silahkan download E-Tiket Anda dan Perlihatkan kepada petugas kami saat registrasi
                                ulang. --}}
                            </div>
                            @endif
                            @if ($user->status_profile == 1 && $user->status_mudik == 'ditolak')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $user->reason }}<br>
                                    Silahkan perbarui data peserta mudik Anda. <a href="{{ route('user.peserta') }}"><b>Klik!</b></a>
                                </div>
                            @endif
                            @if ($user->status_profile == 1 && $user->status_mudik == 'waiting')
                                <div class="alert alert-warning mt-2" role="alert">
                                    Pastikan Anda klik button <b>Kirim</b> setelah melengkapi data peserta, Data yang sudah
                                    di Submit/Kirim tidak bisa di <b>edit</b> dan akan diperiksa terlebih dahulu oleh Admin
                                    Kami. Kami akan beritahu Anda (via Whatsapp atau selalu cek dashboard aplikasi Anda)
                                    apabila data Anda memenuhi syarat sebagai Peserta Mudik.
                                </div>
                            @endif
                            @if ($user->status_profile == 0 || $user->status_profile == null)
                                <div class="alert alert-danger" role="alert"> Anda belum memiliki tiket mudik. Silahkan
                                    lengkapi data mudik Anda dan jangan lupa klik button
                                    <b>{{ trans('frontend.Save') }}</b> untuk mendapatkan tiket mudik.
                                    <b><span id="demo"></span></b><a href="{{ route('user.profile') }}">
                                        {{ trans('frontend.Profile') }}</a>
                                </div>
                            @endif
                            {{-- <table class="table table-bordered w-100 mt-4 mb-4"> --}}
                            <table cellspacing="0" cellpadding="0"
                                class="table table-condensed table-striped table-statistic">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        @if ($user->status_profile == 1 && ($user->status_mudik !== 'diterima' && $user->status_mudik !== 'dikirim'))
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$pesertas->isEmpty())
                                        @foreach ($pesertas as $peserta)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $peserta->nama_lengkap }}
                                                </td>
                                                <td>
                                                    {{ $peserta->nik }}
                                                </td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($peserta->tgl_lahir)->format('d M Y') }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-success"> {{ $peserta->kategori }} </span>
                                                </td>
                                                <td>
                                                    @if($peserta->status == 'dibatalkan')
                                                        <span class="badge bg-danger"> {{ ucwords($peserta->status) }} </span>
                                                    @elseif($peserta->status == 'belum dikirim')    
                                                        <span class="badge bg-warning"> {{ ucwords($peserta->status) }} </span>
                                                    @elseif($peserta->status == 'dikirim')    
                                                        <span class="badge bg-info"> Menunggu Verifikasi</span>    
                                                    @else
                                                        @if($peserta->status)
                                                            <span class="badge bg-success"> {{ ucwords($peserta->status) }} </span>
                                                        @else
                                                            <span class="badge bg-warning"> Belum Dikirim </span>
                                                        @endif
                                                    @endif
                                                </td>
                                                @if ($user->status_profile == 1 && ($user->status_mudik !== 'diterima' && $user->status_mudik !== 'dikirim'))
                                                    <td>
                                                        <a href="{{ route('user.peserta.edit', $peserta->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="javascript;" class="btn btn-danger btn-xs btn-delete-peserta" data-value="{{ $peserta->id }}"><i class="fa fa-times"></i> Hapus</a> 
                                                        {{-- <a href="{{ route('user.peserta.delete', ['uid' => $peserta->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Hapus</a> --}}
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" align="center">Data Peserta Mudik Belum Ada</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="mb-4">
                                {{ $pesertas->links() }}
                            </div>
                        </div>
                        @if($user->status_mudik !== 'diterima' && $user->status_mudik !== 'dikirim' && $user->status_profile == 1 && !$pesertas->isEmpty())
                            <div class="row">
                                <div class="col-md-10 col-sm-12">
                                </div>
                                <div class="col-md-2 col-sm-12 text-right">
                                    <a href="{{ route('user.peserta.submit') }}" class="btn btn-danger btn-xs w-100"><i class="fa fa-paper-plan"></i> Kirim</a>
                                </div>
                            </div>
                        @endif
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
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ url('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src = "{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('table.table-statistic').DataTable({
                responsive: true,
                bLengthChange: false,
                bPaginate: false,
                searching: false,
                info: false,
                scrollX: false,
                scrollY: false,
                ordering: false
            });

            $('.btn-delete-peserta').click(function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Hapus Peserta",
                    text: "Apakah Anda yakin ingin menghapus data peserta ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('user.peserta.delete') }}',
                            type: 'GET',
                            data:{
                                uid: $(this).data('value')
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
