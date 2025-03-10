@php
    $page_title = 'Admin | Edit Rute';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Rute & Pemberhentian</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ route('admin.mudik-rute.index') }}" role="button"><i
                    class="fas fa-arrow-alt-circle-left    "></i>{{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.mudik-rute.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" required
                                    value="{{ $category->name }}">
                            </div>
                            <hr>
                            <label>Kategori : </label>
                            <div class="form-group">
                                {{ Form::checkbox('is_rute', 1, $category->is_rute) }} <label for="">Rute</label>
                            </div>
                            <div class="form-group">
                                {{ Form::checkbox('is_stop', 1, $category->is_stop) }} <label for="">Pemberhentian /
                                    Penurunan Penumpang</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> {{ trans('admin.Save') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
