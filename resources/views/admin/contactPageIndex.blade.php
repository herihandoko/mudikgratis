@php
$page_title = trans('admin.Admin | Contact Page');
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
                <h1>{{trans('admin.Contact Page')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.contact-page.update', 1)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">{{trans('admin.Form Title')}}</label>
                                <input type="text" class="form-control" name="form_title"
                                    value="{{@$contact->form_title}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">{{trans('admin.Form Subtitle')}}</label>
                                <input type="text" class="form-control" name="form_subtitle"
                                    value="{{@$contact->form_subtitle}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">{{trans('admin.Contact Title')}}</label>
                                <input type="text" class="form-control" name="contact_title"
                                    value="{{@$contact->contact_title}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">{{trans('admin.Contact Subtitle')}}</label>
                                <input type="text" class="form-control" name="contact_subtitle"
                                    value="{{@$contact->contact_subtitle}}" required>
                            </div>


                            <div class="form-group">
                                <label for="">{{trans('admin.Phone')}}</label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{@$contact->phone}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Email')}}</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{@$contact->email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Address')}}</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{@$contact->address}}" required>
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
