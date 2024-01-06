@php
$page_title = "Admin | Report Peserta";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Report Peserta</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left"></i> {{trans('admin.Back')}}</a>
            <div class="card text-dark">
                <div class="card-body">
                    <form action="{{ route('admin.mudik-report.index') }}" method="GET">
                        <div class="form-group">
                            <label for="">Periode</label>
                            {{ Form::select('periode_id', $periode, $request->periode_id , ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="">Kota Tujuan</label>
                            {{ Form::select('kota_tujuan_id', $tujuan, $request->kota_tujuan_id , ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="">Bus</label>
                            {{ Form::select('nomor_bus', $bus, $request->nomor_bus , ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="">Type Report</label>
                            {{ Form::select('type', [
                                'preview'=> 'Preview',
                                'export'=>'Export to Excel'
                            ], $request->type , ['class' => 'form-control']) }}
                        </div>
                        <a class="btn btn-warning" href="{{ route('admin.mudik-report.index') }}"><i class="fa fa-undo"></i> Reset Filter </a>
                        <button type="submit" class="btn btn-info"><i class="fa fa-filter"></i> Filter </button>
                    </form>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body wsus_custom_overflow">
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    {{$dataTable->scripts()}}
    <script>
        
    </script>
@endpush
