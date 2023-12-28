@php
$page_title = trans('admin.Admin | Discount section');
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
                <h1>{{trans('admin.Discount Section')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.shop-discount.update', 1)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Main Heading')}}</label>
                                <input type="text" class="form-control" name="main_heading"
                                    value="{{@$discount->main_heading}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Sub Heading')}}</label>
                                <input type="text" class="form-control" name="sub_heading"
                                    value="{{@$discount->sub_heading}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Discount Text')}}</label>
                                <input type="text" class="form-control" name="discount_text"
                                    value="{{@$discount->discount_text}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Button Text')}}</label>
                                <input type="text" class="form-control" name="button_text"
                                    value="{{@$discount->button_text}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Button Link')}}</label>
                                <input type="text" class="form-control" name="button_link"
                                    value="{{@$discount->button_link}}">
                            </div>
                            @include('admin.layouts.mediaInput', [
                                'inputTitle' => 'Image',
                                'inputName' => 'image',
                                'inputData' => @$discount->image,
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
