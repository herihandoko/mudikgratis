@php
$page_title = trans('admin.Admin | Social links');
@endphp
@push('style')
    <script>
        // Custom CSS Here
    </script>
@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Social Links')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
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
    @include('admin.layouts.sweetalertDelete')
@endpush
