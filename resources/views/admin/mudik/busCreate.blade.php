@php
$page_title = "Admin | Tambah Bus";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Bus</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.mudik-bus.index')}}" role="button"><i class="fas fa-arrow-alt-circle-left    "></i>{{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.mudik-bus.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Bus <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Plat Nomor (optional)</label>
                                <input type="text" class="form-control" name="plat_nomor" value="{{ old('plat_nomor') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Seat <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="jumlah_kursi" required value="{{ old('jumlah_kursi') }}" min="1">
                            </div>
                            <div class="form-group">
                                <label for="">Seat <span class="text-danger">*</span></label>
                                {{ Form::select('seat', ['2-2'=>'2-2','2-3'=>'2-3'], old('seat') , ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label for="">Nama Pendamping <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pendamping" value="{{ old('pendamping') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea class="form-control h-100" name="description" id="editor" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Status')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Inactive / Active</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> {{trans('admin.Save')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
