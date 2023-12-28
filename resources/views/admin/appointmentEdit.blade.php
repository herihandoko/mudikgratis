@php
$page_title = trans('admin.Admin | Update appointment');
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Edit Appointment')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.appointment.index')}}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> Back</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.appointment.update', $appointment->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{trans('admin.Name')}}</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{$appointment->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Email')}}</label>
                                <input type="text" class="form-control" name="slug"
                                    value="{{$appointment->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Phone')}}</label>
                                <input type="text" class="form-control" name="slug"
                                    value="{{$appointment->phone}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Message')}}</label>
                                <textarea disabled class="form-control h-100"
                                    rows="3">{!! filterTag(clean($appointment->message)) !!}</textarea>
                            </div>
                            <div class="form-group">
                              <label for="">{{trans('admin.Time')}}</label>
                              <input type="datetime-local"
                                class="form-control" name="appointment_date" value="{{ Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i')}}">
                            </div>
                            <div class="form-group">
                                <label for="">{{trans('admin.Status')}}</label>
                                <select name="status" class="form-control h-100" class="w-100">
                                    <option value="0" @if ($appointment->status == 0)
                                        checked
                                        @endif> {{trans('admin.Pending')}} </option>
                                    <option value="1" @if ($appointment->status == 1)
                                        checked
                                        @endif> {{trans('admin.Accepted')}} </option>
                                    <option value="2" @if ($appointment->status == 2)
                                        checked
                                        @endif> {{trans('admin.Complete')}} </option>
                                    <option value="3" @if ($appointment->status == 3)
                                        checked
                                        @endif> {{trans('admin.Cancelled')}} </option>
                                </select>
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
    <script>
        // Custom JS Here
    </script>
@endpush
