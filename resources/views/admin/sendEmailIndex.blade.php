@php
$page_title = trans('admin.Admin | Email to subscribers');
@endphp
@push('style')

@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Email to subscribers')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card text-white">
                    <div class="card-body">
                        <form action="{{route('admin.send-email.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{trans('admin.Subject')}}</label>
                                <input type="text" class="form-control" name="subject"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Message')}}</label>
                                <textarea class="form-control h-100" name="message"  rows="3" id="editor"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane    "></i>
                                {{trans('admin.Send to all')}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')

@endpush
