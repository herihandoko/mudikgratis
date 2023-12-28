@php
$page_title = trans('admin.Admin | Footer info');
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
                <h1>{{trans('admin.Footer Information')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.footer-information.index')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.footer-information.update', 1)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.About')}}</label>
                                <textarea type="text" class="form-control h-100" name="about"
                                     required>{!! @filterTag(clean($info->about)) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Copyright')}}</label>
                                <input type="text" class="form-control" name="copyright"
                                    value="{{@$info->copyright}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Terms of use link')}}</label>
                                <input type="text" class="form-control" name="term_of_use"
                                    value="{{@$info->term_of_use}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Privacy policy link')}}
                                </label>
                                <input type="text" class="form-control" name="privacy_policy"
                                    value="{{@$info->privacy_policy}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" href="#" role="button">
                                {{trans('admin.Save')}} </button>
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
