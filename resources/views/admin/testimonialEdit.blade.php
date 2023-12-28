@php
$page_title = trans('admin.Admin | Edit testimonial');
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
                <h1>{{trans('admin.Edit Testimonial')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.testimonial.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.testimonial.update', $testimonial->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('admin.layouts.mediaInput', [
                                'inputTitle' => 'Image',
                                'inputName' => 'image',
                                'inputData' => $testimonial->image,
                                'multiInput' => false,
                                'buttonText' => 'Select',
                            ])
                            <div class="form-group">
                                <label for="">{{trans('admin.Name')}}</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{$testimonial->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Designation')}}</label>
                                <input type="text" class="form-control" name="designation"
                                    value="{{$testimonial->designation}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Comment')}}</label>
                                <textarea class="form-control h-100" name="comment"
                                    rows="3">{!! filterTag(clean($testimonial->comment)) !!}</textarea>
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
@push('scripts')
    @include('admin.layouts.mediaJs')
@endpush
