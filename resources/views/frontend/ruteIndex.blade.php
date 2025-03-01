@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- end main-content -->
        <!-- Start main-content -->
        <div class="main-content-area">
            <!-- Section: page title -->
            <section class="page-title tm-page-title page-title-standard layer-overlay overlay-dark-9 bg-img-center">
                <div class="container padding-small">
                    <div class="row">
                        <div class="col-md-8 title-content sm-text-center">
                            <h2 class="text-white">Rute Mudik</h2>
                        </div>
                        <div class="col-md-4 title-content text-center">
                            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                                <div class="breadcrumbs">
                                    <span><a href="{{ route('home') }}" rel="home">Home</a></span>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <span>Pages</span>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <span class="active">Rute Mudik</span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: page title -->
            <section data-tm-bg-color="#f5f5f5">
                <div class="container pt-30 pb-30">
                    <div class="site-wrapper">
                        <div class="site-wrapper-inner">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-1">
                                    <div class="inDiv login-box-body addMarginBottom20">
                                        <h4 class="noMargin"><strong><i class="fa fa-bus"></i> Rute Bus</strong></h4>
                                        <hr>
                                        @forelse ($tujuans as $item => $tujuan)
                                            <div class="row text-center mt-5">
                                                <h4>{{ $tujuan->name }}</h4>
                                            </div>
                                            <?php $no = 1; ?>
                                            @foreach ($tujuan->provinsis as $key => $provinsi)
                                                <div class="row text-sm-right text-md-center mt-3">
                                                    <h5>{{ $no++ }} . {{ $provinsi->name }} </h5>
                                                </div>
                                                <div class="table-responsive">
                                                    <table cellspacing="0" cellpadding="0" class="table table-condensed table-striped table-statistic">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">#</th>
                                                                @if($tujuan->code == 'keluar-banten')
                                                                    <th class="text-center">Kota Tujuan</th>
                                                                @else
                                                                    <th class="text-center">Kota Asal</th>
                                                                @endif
                                                                <th class="text-center">Rute</th>
                                                                <th class="text-center">Tanggal Berangkat</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $nox = 1; ?>
                                                            @forelse ($provinsi->kota as $keyx => $val)
                                                                <tr>
                                                                    <td class="text-left">{{ $nox++ }}</td>
                                                                    <td class="text-left">{{ $val->name }}</td>
                                                                    <td class="text-center">
                                                                        @forelse($val->rutes as $keyrute => $itemrute)
                                                                            {{ $itemrute->name }} {!! !$loop->last ? '<i class="fa fa-arrow-right"></i>' : '' !!}
                                                                        @empty
                                                                            -
                                                                        @endforelse
                                                                    </td>
                                                                    <td class="text-right">{{ $val->tgl_keberangkatan ? date('d M Y',strtotime($val->tgl_keberangkatan)) : '-' }}</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td  class="text-center" colspan="4">Tidak ada data tersedia</td>
                                                                </tr>
                                                            @endforelse
                                                            </body>
                                                    </table>
                                                </div>
                                            @endforeach
                                        @empty
                                        <div class="alert alert-info text-center"><b>Maaf!</b> Registrasi peserta mudik sementara ditutup.</div><br>    
                                        @endforelse
                                        <i class="fa fa-arrow-circle-right"></i> Baca <a href="{{ url('syarat-dan-ketentuan') }}">Syarat & Ketentuan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection
