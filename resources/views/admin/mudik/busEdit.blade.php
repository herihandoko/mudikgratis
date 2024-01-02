@php
$page_title = "Admin | Edit Bus";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Bus</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.mudik-bus.index')}}" role="button"><i class="fas fa-arrow-alt-circle-left    "></i>{{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.mudik-bus.update', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nama Bus <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Plat Nomor (optional)</label>
                                <input type="text" class="form-control" name="plat_nomor" value="{{ $category->plat_nomor }}">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Seat <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="jumlah_kursi" required value="{{ $category->jumlah_kursi }}" min="1">
                            </div>
                            <div class="form-group">
                                <label for="">Seat <span class="text-danger">*</span></label>
                                {{ Form::select('seat', ['2-2'=>'2-2','2-3'=>'2-3'], $category->seat , ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea class="form-control h-100" name="description" id="editor" rows="4">{{ $category->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Status')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input" @if($category->status == 'active')checked @endif>
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
