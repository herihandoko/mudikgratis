@php
$page_title = trans('admin.Admin | About page contents');
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
                <h1>{{trans('admin.About')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.about.update', 1)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Title')}}</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{@$about->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Subtitle')}}</label>
                                <input type="text" class="form-control" name="subtitle"
                                    value="{{@$about->subtitle}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Description')}}</label>
                                <textarea class="form-control h-100" name="description"
                                    rows="3" id="editor">{!! @clean($about->description) !!}</textarea>
                            </div>

                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => trans('admin.Background Image'),
                            'inputName' => 'background',
                            'inputData' => @$about->background,
                            'multiInput' => false,
                            'buttonText' => 'Select',
                            ])

                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => 'Foreground Image',
                            'inputName' => 'foreground',
                            'inputData' => @$about->foreground,
                            'multiInput' => false,
                            'buttonText' => 'Select',
                            ])

                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => 'CEO Avatar',
                            'inputName' => 'avatar',
                            'inputData' => @$about->avatar,
                            'multiInput' => false,
                            'buttonText' => 'Select',
                            ])

                            @include('admin.layouts.mediaInput', [
                            'inputTitle' => 'CEO Signature',
                            'inputName' => 'signature',
                            'inputData' => @$about->signature,
                            'multiInput' => false,
                            'buttonText' => 'Selects',
                            ])


                            <div class="form-group">
                                <label for="">{{trans('admin.Bottom Text')}}</label>
                                <input type="text" class="form-control" name="bottom_text"
                                    value="{{@$about->bottom_text}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" role="button"> {{trans('admin.Save')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('script')
        @include('admin.layouts.mediaJs')
    @endpush
    @include('admin.layouts.mediaModal')
@endsection
