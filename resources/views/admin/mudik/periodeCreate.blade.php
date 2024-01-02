@php
$page_title = "Admin | Tambah Periode";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Periode</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.mudik-periode.index')}}" role="button"><i class="fas fa-arrow-alt-circle-left    "></i>{{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.mudik-periode.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Mulai Pendaftaran</label>
                                <input type="datetime-local" class="form-control" name="start_date" value="{{ old('start_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Akhir Pendaftaran</label>
                                <input type="datetime-local" class="form-control" name="end_date" value="{{ old('end_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea class="form-control h-100" name="description" id="editor" rows="8"></textarea>
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
