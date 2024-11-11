@php
    $page_title = 'Admin | Edit Periode';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Tujuan ( {{ session('name_period') }} )</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ route('admin.mudik-tujuan.index') }}" role="button"><i
                    class="fas fa-arrow-alt-circle-left    "></i>{{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.mudik-tujuan.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            {{ Form::hidden('id_period', session('id_period', null)) }}
                            <div class="form-group">
                                <label for="">Kategori</label>
                                {{ Form::select(
                                    'code',
                                    [
                                        'keluar-banten' => 'keluar-banten',
                                        'kedalam-banten' => 'kedalam-banten',
                                    ],
                                    old('code', $category->code),
                                    ['class' => 'form-control'],
                                ) }}
                            </div>
                            <div class="form-group">
                                <label for="">Tujuan</label>
                                <input type="text" class="form-control" name="name" required
                                    value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{ trans('admin.Status') }}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input"
                                        @if ($category->status == 'active') checked @endif>
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
