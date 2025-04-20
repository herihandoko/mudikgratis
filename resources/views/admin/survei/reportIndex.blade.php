@php
    $page_title = 'Admin | Tambah Tujuan';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Report Indek Kepuasan Masyarakat ( {{ session('name_period') }} )</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ route('admin.dashboard') }}" role="button"><i class="fas fa-arrow-alt-circle-left    "></i>{{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-2"><a target="_blank" href="{{ route('admin.ikm.export') }}" class="btn btn-danger">Cetak PDF</a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Nilai IKM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="col" class="text-center">
                                                <h1 class="{{ $ikmColor }}">{{ $ikm }}</h1>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">
                                                <h3 class="{{ $ikmColor }}">{{ $ikmText }}</h3>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2" class="text-center">Responden</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="col" class="text-left">
                                                Jumlah Responden :
                                            </th>
                                            <th scope="col" class="text-center">
                                                {{ $jumlahCorespondent }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-left">
                                                Periode Survei:
                                            </th>
                                            <th scope="col" class="text-center">
                                                {{ session('name_period') }}
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Unsur Pelayanan</th>
                                        <th scope="col" class="text-center">Indikator A</th>
                                        <th scope="col" class="text-center">Indikator B</th>
                                        <th scope="col" class="text-center">Indikator C</th>
                                        <th scope="col" class="text-center">Indikator D</th>
                                        <th scope="col" class="text-center">Indikator E</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unsur as $key => $item)
                                        <?php $total = 0; ?>
                                        <tr>
                                            <th scope="row" class="text-right">{{ $item->sorting }}</th>
                                            <th class="text-left">{{ $item->pertanyaan }}</th>
                                            @foreach ($item->answers as $keya => $answer)
                                                <td class="text-right">{{ $answer->respon->count() }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
