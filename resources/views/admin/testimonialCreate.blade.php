@php
$page_title = trans('admin.Admin | Add Testimonial');
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
                <h1>{{trans('admin.Add Testimonial')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.testimonial.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.testimonial.store')}}" method="POST">
                            @csrf
                            @include('admin.layouts.mediaInput', [
                                'inputTitle' => 'Image',
                                'inputName' => 'image',
                                'inputData' => null,
                                'multiInput' => false,
                                'buttonText' => 'Select',
                            ])
                            <div class="form-group">
                                <label for="">{{trans('admin.Name')}}</label>
                                <input type="text" class="form-control" name="name"
                                     required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Designation')}}</label>
                                <input type="text" class="form-control" name="designation"
                                    >
                            </div>
                            <div class="form-group">
                              <label for="">{{trans('admin.Comment')}}</label>
                              <textarea class="form-control h-100" name="comment"  rows="3"></textarea>
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
    @include('admin.layouts.mediaJs')
@endpush
