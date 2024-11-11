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
            <a class="btn btn-primary mb-4" href="{{ route('admin.survei-pertanyaan.index') }}" role="button"><i
                    class="fas fa-arrow-alt-circle-left    "></i>{{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.survei-pertanyaan.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            {{ Form::hidden('id_period', session('id_period')) }}
                            <div class="form-group">
                                <label for="">Kategori</label>
                                {{ Form::select(
                                    'kategori',
                                    [
                                        'pendaftaran' => 'Pendaftaran',
                                        'verifikasi' => 'Verifikasi',
                                        'pemberangkatan' => 'Pemberangkatan',
                                    ],
                                    $category->kategori,
                                    ['class' => 'form-control'],
                                ) }}
                            </div>
                            <div class="form-group">
                                <label for="">No Pertanyaan</label>
                                <input type="number" class="form-control" name="sorting" required
                                    value="{{ $category->sorting }}" placeholder="1">
                            </div>
                            <div class="form-group">
                                <label for="">Pertanyaan</label>
                                <input type="text" class="form-control" name="pertanyaan" required
                                    value="{{ $category->pertanyaan }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Type Jawaban</label>
                                {{ Form::select(
                                    'type_jawaban',
                                    [
                                        'options' => 'Options',
                                    ],
                                    $category->type_jawaban,
                                    ['class' => 'form-control'],
                                ) }}
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{ trans('admin.Status') }}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input"
                                        @if ($category->status == 1) checked @endif>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Inactive / Active</span>
                                </label>
                            </div>
                            Jawaban
                            <hr>
                            @foreach ($category->answers as $key => $item)
                                <div class="form-group">
                                    <label for="">Jawaban {{ $item->sorting }}</label>
                                    {{ Form::text('jawaban_' . $item->sorting, $item->jawaban, ['class' => 'form-control', 'placeholder' => 'Jawaban ' . $item->sorting, 'required' => 'required']) }}
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary btn-block"> {{ trans('admin.Save') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
