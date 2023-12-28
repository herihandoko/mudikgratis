@php
$page_title = trans('admin.Admin | Parallax section');
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
                <h1>{{trans('admin.Parallax Section')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.parallax.update', 1)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{@$parallax->title}}" required>
                            </div>
                            <div class="form-group">
                                <div id="icon" name="icon"></div>
                            </div>
                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => 'Image',
                            'inputName' => 'image',
                            'inputData' => @$parallax->image,
                            'multiInput' => false,
                            'buttonText' => 'Select',
                            ])
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
    @include('admin.layouts.mediaJs')
    <script>
        $('#icon').iconpicker({
            align: 'left', // Only in div tag
            arrowClass: 'btn-primary',
            arrowPrevIconClass: 'fas fa-angle-left',
            arrowNextIconClass: 'fas fa-angle-right',
            cols: 5,
            footer: true,
            header: true,
            icon: '{{@$parallax->icon}}',
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
        $('input[name=icon]').val('{{@$parallax->icon}}');
    </script>
@endpush
