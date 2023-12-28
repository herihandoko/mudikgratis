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
                            <h2 class="text-white">Rute &amp; Mudik</h2>
                        </div>
                        <div class="col-md-4 title-content text-center">
                            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                                <div class="breadcrumbs">
                                    <span><a href="https://mudik.test" rel="home">Home</a></span>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <span>Pages</span>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <span class="a ctive">Rute &amp; Mudik</span>
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
                                    {{-- <h2 class="addMarginTop50 text-center text-blackGrey animated slideInDown">
                                        <strong>RUTE MUDIK</strong>
                                    </h2>
                                    <p class="text-center">Mudik Dinanti, Mudik Di Hati<br>Bersama Dinas Perhubungan Provinsi Banten 2024</p> --}}
                                    <div class="inDiv login-box-body addMarginBottom20">
                                        <h4 class="noMargin"><strong><i class="fa fa-bus"></i> Rute Bus</strong></h4>
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-condensed table-striped noMargin">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Asal</th>
                                                        <th class="text-center">Tujuan</th>
                                                        <th class="text-center">Rute</th>
                                                        <th class="text-center">Tanggal Berangkat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center"><b>1</b></td>
                                                        <td class="text-center">Serang</td>
                                                        <td class="text-center">Surabaya (Rute Utara)</td>
                                                        <td class="text-center">Serang -&gt; Cirebon -&gt; Brebes -&gt;
                                                            Tegal -&gt;
                                                            Pemalang -&gt; Pekalongan -&gt; Semarang -&gt; Boyolali -&gt;
                                                            Surakarta
                                                            -&gt; Solo -&gt; Sragen -&gt; Ngawi -&gt; Madiun -&gt; Mojokerto
                                                            -&gt;
                                                            Surabaya</td>
                                                        <td class="text-center">01 Apr 2024</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center"><b>2</b></td>
                                                        <td class="text-center">Serang</td>
                                                        <td class="text-center">Malang (Rute Selatan)</td>
                                                        <td class="text-center">Serang -&gt; Bandung(Cileunyi ) -&gt;
                                                            Tasikmalaya -&gt;
                                                            Ciamis -&gt; Majenang -&gt; Karang Pucung -&gt; Purwokerto -&gt;
                                                            Sumpyuh
                                                            -&gt; Karanganyar -&gt; Kebumen -&gt; Purworejo -&gt; Borobudur
                                                            -&gt;
                                                            Muntilan -&gt; Sleman -&gt; Yogyakarta ( terminal Giwangan )
                                                            -&gt; Wonosari
                                                            -&gt; Pracimantoro -&gt; Pacitan -&gt; Ponorogo -&gt; Trenggalek
                                                            -&gt;
                                                            Tulungagung -&gt; Blitar -&gt; Malang</td>
                                                        <td class="text-center">01 Apr 2024</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="inDiv login-box-body addMarginBottom100 hide">
                                        <h4 class="noMargin"><strong><i class="fa fa-ship"></i> Rute Kapal Laut</strong>
                                        </h4>
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-condensed table-striped noMargin">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Asal</th>
                                                        <th class="text-center">Tujuan</th>
                                                        <th class="text-center">Rute</th>
                                                        <th class="text-center">Tanggal Berangkat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
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
