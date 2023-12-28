@php
$page_title = trans('admin.Admin | Edit email template');
@endphp
@push('style')

@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Edit Email Template')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.email-template.index')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <label for="">{{trans('admin.Variables')}}</label>
                        <table class="table table-striped table-bordered table-inverse w-100 mb-4">
                            <thead class="thead-inverse border-bottom">
                                <tr>
                                    <th>{{trans('admin.Variabe')}}</th>
                                    <th>{{trans('admin.Meaning')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variables as $variable)
                                    <tr>
                                        <td>{{$variable->variable}}</td>
                                        <td>{{$variable->meaning}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{route('admin.email-template.update', $email_template->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Subject')}}</label>
                                <input type="text" class="form-control" name="subject"
                                    value="{{$email_template->subject}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Description')}}</label>
                                <textarea class="form-control h-100" name="description" id="editor"
                                    rows="3">{!! clean($email_template->description) !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> {{trans('admin.Save')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
@endpush
