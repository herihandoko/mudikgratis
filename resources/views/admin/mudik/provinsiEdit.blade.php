@php
    $page_title = 'Admin | Edit Provinsi Tujuan';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Provinsi Tujuan</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ route('admin.mudik-provinsi.index') }}" role="button"><i class="fas fa-arrow-alt-circle-left    "></i>{{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.mudik-provinsi.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Tujuan</label>
                                {{ Form::select('tujuan_id', $tujuan, $category->tujuan_id , ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <input type="text" class="form-control" name="name" required value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Status')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input" @if($category->status == 'active')checked @endif>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Inactive / Active</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> {{ trans('admin.Save') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
