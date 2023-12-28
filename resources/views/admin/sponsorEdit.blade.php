@php
$page_title = trans('admin.Admin | Edit sponsor');
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
                <h1>{{trans('admin.Edit Sponsor')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.sponsor.index')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.sponsor.update' , $sponsor->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Name')}}</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{$sponsor->name}}" required>
                            </div>
                            @include('admin.layouts.mediaInput', [
                                'inputTitle' => 'Image',
                                'inputName' => 'image',
                                'inputData' => $sponsor->image,
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
