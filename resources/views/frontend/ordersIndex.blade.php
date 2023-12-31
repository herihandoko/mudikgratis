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
                                        <a href="{{ route('user.dashboard') }}"
                                            class="active">{{ trans('frontend.Dashboard') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta') }}">{{ trans('frontend.Peserta') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}">{{ trans('frontend.Profile') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta.cancel') }}" style="background-color:#9d161690 !important;">Pembatalan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mt-5">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <h4><i class="fa fa-users"></i> Data Peserta</h4>
                            </div>
                            <div class="col-md-3 col-sm-12 text-right">
                                @if ($user->status_profile == 1 && $user->status_mudik == 'diterima')
                                    <a target="_blank" href="{{ route('user.peserta.eticket', $user->id) }}" class="btn btn-success btn-xs w-100"><i class="fa fa-download"></i> Download E-Tiket</a>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if ($user->status_profile == 1 && $user->status_mudik == 'diterima')
                                <div class="alert alert-success mt-2" role="alert">
                                    Selamat Data Peserta Mudik Anda Sudah tersimpan dengan Nomor Registrasi <b>{{ $user->nomor_registrasi }}</b>.
                                    Silahkan download E-Tiket Anda dan Perlihatkan kepada petugas kami saat registrasi
                                    ulang.
                                </div>
                            @endif
                            @if ($user->status_profile == 0 || $user->status_profile == null)
                                <div class="alert alert-danger" role="alert"> Anda belum memiliki tiket mudik. Silahkan
                                    lengkapi data mudik Anda dan jangan lupa klik button <b>{{ trans('frontend.Save') }}</b>
                                    untuk mendapatkan tiket mudik. Waktu yang tersisa <b><span id="demo"></span></b><a
                                        href="{{ route('user.profile') }}"> {{ trans('frontend.Profile') }}</a>
                                </div>
                            @endif
                            {{-- <table class="table table-bordered w-100 mt-4 mb-4"> --}}
                            <table cellspacing="0" cellpadding="0" class="table table-condensed table-striped table-statistic">        
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kategori</th>
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
                                                    <span class="badge bg-success"> Dewasa </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" align="center">Data Peserta Mudik Belum Ada</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="mb-4">
                                {{ $pesertas->links() }}
                            </div>
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
    @if (auth()->user()->status_profile == 0)
        <script>
            // Set the date we're counting down to
            var ONE_HOUR = 60 * 60 * 1000;
            var countDownDateX = new Date('{{ auth()->user()->created_at }}').getTime();
            countDownDate = new Date(countDownDateX + ONE_HOUR).getTime()
            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("demo").innerHTML = days + "d : " + hours + "h : " +
                    minutes + "m : " + seconds + "s";

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                    $.ajax({
                        url: '{{ route('user.profile.delete') }}',
                        type: 'GET',
                        success: function(data) {
                            location.reload();
                        }
                    });

                }
            }, 1000);
        </script>
    @endif
@endpush
@push('scripts')
<link rel="stylesheet" href="{{asset('assets/admin/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
@endpush
@push('scripts')
    <script src="{{url('assets/admin/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{url('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}">
    <script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
    <script>
    $(document).ready(function() {
        $('table.table-statistic').DataTable( {
            responsive: true,
            bLengthChange:false,
            bPaginate:false,
            searching:false,
            info:false,
            scrollX:false,
            scrollY:false,
            ordering:false
        });
    });
    </script>
@endpush
