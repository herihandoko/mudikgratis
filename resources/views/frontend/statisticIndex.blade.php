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
                            <h2 class="text-white">Statistik &amp; Peserta</h2>
                        </div>
                        <div class="col-md-4 title-content text-center">
                            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                                <div class="breadcrumbs">
                                    <span><a href="https://mudik.test" rel="home">Home</a></span>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <span>Pages</span>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <span class="a ctive">Statistik &amp; Peserta</span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <section data-tm-bg-color="">
                <div class="container pt-30 pb-30">
                    <div class="site-wrapper">
                        <div class="site-wrapper-inner">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    <div class="inDiv login-box-body addMarginBottom20">
                                        <h4 class="noMargin"><strong><i class="fa fa-bus"></i> Rute Bus</strong></h4>
                                        <hr>
                                        @foreach ($tujuans as $item => $tujuan)
                                        <div class="row text-center mt-5">
                                            <h4>{{ $tujuan->name }}</h4>
                                        </div>
                                        <?php $no = 1; ?>
                                        @foreach ($tujuan->provinsis as $key => $provinsi)
                                            <div class="row text-sm-right text-md-center mt-3">
                                                <h5>{{ $no++ }} . {{ $provinsi->name }}</h5>
                                            </div>
                                            <div class="table-responsive">
                                                <table cellspacing="0" cellpadding="0" class="table table-condensed table-striped table-statistic">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            @if($tujuan->id == 1)
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
                                                                <td class="text-right">{{ $val->bus->sum('jumlah_kursi')-$val->userKota->sum('jumlah') }} Kursi</td>
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
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection
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
