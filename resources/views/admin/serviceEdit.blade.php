@php
$page_title = trans('admin.Admin | Edit Service');
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
                <h1>{{trans('admin.Edit Service')}}</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.service.update', $service->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{$service->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Slug')}}</label>
                                <input type="text" class="form-control" name="slug"
                                    value="{{$service->slug}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Description')}}</label>
                                <textarea class="form-control h-100" id="editor" name="description"
                                    rows="3">{!! clean($service->description) !!}</textarea>
                            </div>


                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => 'Image',
                            'inputName' => 'image',
                            'inputData' => $service->image,
                            'multiInput' => false,
                            'buttonText' => 'Select',
                            ])

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
            icon: '{{$service->icon}}',
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
        $('input[name=icon]').val('{{$service->icon}}');
    </script>
@endpush
