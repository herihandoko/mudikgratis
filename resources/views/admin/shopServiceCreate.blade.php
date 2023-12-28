@php
$page_title = trans('admin.Admin | Add shop service');
@endphp
@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/mediamanager.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-iconpicker.min.css')}}">

@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Add Shop Service')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.shop-service.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.shop-service.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" name="title"
                                     required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Subtitle')}}</label>
                                <input type="text" class="form-control" name="subtitle"
                                     required>
                            </div>
                            <div class="form-group">
                                <div id="icon" name="icon"></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" href="#" role="button"> {{trans('admin.Save')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.layouts.mediaModal')
@endsection
@push('script')
    <script type="text/javascript" src="{{asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
    <script>
        $('#icon').iconpicker({
            align: 'left', // Only in div tag
            arrowClass: 'btn-primary',
            arrowPrevIconClass: 'fas fa-angle-left',
            arrowNextIconClass: 'fas fa-angle-right',
            cols: 5,
            footer: true,
            header: true,
            iconset: 'fontawesome5',
            labelHeader: '{0} of {1} pages',
            labelFooter: '{0} - {1} of {2} icons',
            placement: 'bottom', // Only in button tag
            rows: 5,
            search: true,
            searchText: 'Search',
            selectedClass: 'btn-primary',
            unselectedClass: 'btn-dark',
        });
    </script>
    @include('admin.layouts.mediaJs')
@endpush
