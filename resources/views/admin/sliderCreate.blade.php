@php
$page_title = trans('admin.Admin | Add slider');
@endphp
@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/css/mediamanager.css')}}">

@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Add Slider')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.slider.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.slider.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" name="title"
                                     required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Subtitle')}}</label>
                                <input type="text" class="form-control" name="subtitle"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Button Text')}}</label>
                                <input type="text" class="form-control" name="button"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Button Link')}}</label>
                                <input type="text" class="form-control" name="button_link"
                                    >
                            </div>
                            @include('admin.layouts.mediaInput', [
                                'inputTitle' => 'Image',
                                'inputName' => 'image',
                                'inputData' => null,
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
    @include('admin.layouts.mediaJs')
@endpush
