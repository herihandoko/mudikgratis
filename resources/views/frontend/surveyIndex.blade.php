@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- end main-content -->
        <!-- Start main-content -->
        <div class="main-content-area">
            <!-- Section: page title -->
            {{-- <section class="page-title tm-page-title page-title-standard layer-overlay overlay-dark-9 bg-img-center">
                <div class="container padding-small" style="padding-top: 30px !important; padding-bottom: 30px !important;">
                    <div class="row text-center title-content">
                        <h2 class="text-white" style="font-weight: 200 !important; font-size: 3rem !important;">
                            Survei Kepuasan Masyarakat
                        </h2>
                    </div>
                </div>
            </section> --}}
            <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center">
                <div class="container pt-25 pb-25">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="title">Survei Kepuasan Masyarakat</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-tm-bg-color="">
                <div class="container pt-30 pb-30">
                    <div class="site-wrapper">
                        <div class="site-wrapper-inner">
                            {!! Form::open(['route' => 'survei-kepuasan-masyarakat.store', 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    <div class="inDiv login-box-body addMarginBottom20">
                                        <div class="row text-center mt-1">
                                            <h5>Formulir Survei Kepuasan Masyarakat (SKM)</h5>
                                            <p style="margin-bottom: 0px;">Sebagai wujud evaluasi dalam memberikan pelayanan
                                                yang terbaik kepada masyarakat, pengisian survei yang anda lakukan sangat
                                                berharga bagi kami.</p>
                                        </div>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {!! session('success') !!} <a href="{{ route('home') }}"><b>Beranda</b></a>
                                            </div>
                                        @endif
                                        <hr>
                                        <div class="mb-0">
                                            <label class="form-label"><b>A. Profil Responden</b></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">1. Nomor Telepon <span class="text-danger">*</span></label>
                                            <div class="row">
                                                <?php $invalid = ''; ?>
                                                @error('phone_number')
                                                    <?php $invalid = 'is-invalid'; ?>
                                                @enderror
                                                <div class="col-md-6 col-6 col-sm-12">
                                                    {{ Form::text('phone_number', old('phone_number',$request->phone_number), ['class' => 'form-control ' . $invalid, 'placeholder' => '0813XXXXXXX']) }}
                                                    <span style="color:red !important;">{{ $errors->first('phone_number') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mb-0">
                                            <label class="form-label"><b>B. Form Survei</b></label>
                                        </div>
                                        @foreach ($questions as $key => $item)
                                            <div class="mb-4">
                                                <label class="form-label">{{ $item->sorting }}. {{ $item->pertanyaan }}
                                                    <span class="text-danger">*</span></label> <span
                                                    style="color:red !important;">{{ $errors->first("jawaban.$item->id") }}</span>
                                                @if ($item->type_jawaban == 'options')
                                                    <div class="row">
                                                        @foreach ($item->answers as $keyA => $option)
                                                            <div class="col-md-2 col-6">
                                                                {!! Form::radio("jawaban[$item->id]", $option->id, old("options.$item->id") === $option->id) !!} {{ $option->jawaban }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif($item->type_jawaban == 'smiley')
                                                    <div class="row">
                                                        @foreach ($item->answers as $keyA => $option)
                                                            <div class="col-md-2 col-2 text-center">
                                                                <label class="radio-smiley">
                                                                    {!! Form::radio("jawaban[$item->id]", $option->id, old("options.$item->id") === $option->id) !!}
                                                                    <i class="{{ $option->icon }}"
                                                                        style="color: #{{ $option->color }};"></i>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif($item->type_jawaban == 'square_range')
                                                    <div class="row">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <div class="col-md-2 col-2 text-center">
                                                                <label class="radio-square">
                                                                    {!! Form::radio("jawaban[$item->id]", $option->id, old("options.$item->id") === $option->id) !!}
                                                                    <span>{{ $i }}</span>
                                                                </label>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                        <div class="mb-0">
                                            <label class="form-label"><b>C. Saran dan Masukan</b></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">1. Apa yang bisa ditingkatkan agar layanan Mudik Gratis ini lebih baik di tahun berikutnya?</label>
                                            <div class="row">
                                                <div class="col-md-12 col-12 col-sm-12">
                                                    {{ Form::textarea('saran', old('saran',$request->saran), ['class' => 'form-control ', 'placeholder' => '', 'rows'=>2]) }}
                                                    <span style="color:red !important;">{{ $errors->first('saran') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">2. Apakah ada fasilitas atau layanan tambahan yang sebaiknya disediakan dalam program Mudik Gratis ini? Jelaskan.</label>
                                            <div class="row">
                                                <div class="col-md-12 col-12 col-sm-12">
                                                    {{ Form::textarea('masukan', old('masukan',$request->masukan), ['class' => 'form-control ', 'placeholder' => '', 'rows'=>2]) }}
                                                    <span style="color:red !important;">{{ $errors->first('masukan') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label text-danger"><i>* Jawaban survei tidak boleh kosong.</i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary" type="submit">Kirim Survei</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
            </section>
        </div>
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
    <style>
        .radio-square {
            display: inline-block;
            cursor: pointer;
            width: 50px;
            height: 50px;
            border: 2px solid #ff0039;
            border-radius: 4px;
            margin: 5px;
            position: relative;
        }

        .radio-square input[type="radio"] {
            display: none;
        }

        .radio-square span {
            display: inline-block;
            width: 100%;
            height: 100%;
            line-height: 45px;
            text-align: center;
            font-weight: bold;
            color: #ff0039;
        }

        .radio-square input[type="radio"]:checked+span {
            background-color: #ff0039;
            color: white;
        }

        .radio-smiley {
            display: inline-block;
            cursor: pointer;
            font-size: 2em;
            margin: 5px;
        }

        .radio-smiley input[type="radio"] {
            display: none;
        }

        .radio-smiley i {
            transition: transform 0.2s;
        }

        .radio-smiley input[type="radio"]:checked+i {
            transform: scale(1.5);
        }
    </style>
@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ url('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
        < script src = "{{ asset('vendor/datatables/buttons.server-side.js') }}" >
    </script>
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
        });
    </script>
@endpush
