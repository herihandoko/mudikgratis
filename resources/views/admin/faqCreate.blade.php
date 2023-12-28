@php
$page_title = trans('admin.Admin | Add FAQ');
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
                <h1>{{trans('admin.Create FAQ')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.faq.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.faq.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{trans('admin.Question')}}</label>
                                <input type="text" class="form-control" name="question"
                                     required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Answer')}}</label>
                                <textarea type="text" rows="5" class="form-control h-100" name="answer" required></textarea>
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
