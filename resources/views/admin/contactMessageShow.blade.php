@php
$page_title = trans('admin.Admin | Contact Message');
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Contact Message')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.contact-messages.index')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card bg-white">
                    <div class="card-header">
                        {{trans('admin.Contact Message')}}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>{{trans('admin.Name')}}</td>
                                    <td colspan="2">{{$message->name}}</td>
                                </tr>
                                <tr>
                                    <td>{{trans('admin.Phone')}}</td>
                                    <td colspan="2">{{$message->phone}}</td>
                                </tr>
                                <tr>
                                    <td>{{trans('admin.Email')}}</td>
                                    <td colspan="2">{{$message->email}}</td>
                                </tr>
                                <tr>
                                    <td>{{trans('admin.Subject')}}</td>
                                    <td colspan="2">{{$message->subject}}</td>
                                </tr>
                                <tr>
                                    <td>{{trans('admin.Message')}}</td>
                                    <td colspan="2" rowspan="3">
                                        {{$message->message}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
