@php
    $page_title = 'Admin | Tambah Tujuan';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Pertanyaan ( {{ session('name_period') }} )</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ route('admin.survei-pertanyaan.index') }}" role="button"><i
                    class="fas fa-arrow-alt-circle-left    "></i>{{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.survei-pertanyaan.store') }}" method="POST">
                            @csrf
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
                                    old('kategori'),
                                    ['class' => 'form-control'],
                                ) }}
                            </div>
                            <div class="form-group">
                                <label for="">No Pertanyaan</label>
                                <input type="number" class="form-control" name="sorting" required
                                    value="{{ old('sorting', $questionNo + 1) }}" placeholder="1">
                            </div>
                            <div class="form-group">
                                <label for="">Pertanyaan</label>
                                <input type="text" class="form-control" name="pertanyaan" required
                                    value="{{ old('pertanyaan') }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Type Jawaban</label>
                                {{ Form::select(
                                    'type_jawaban',
                                    [
                                        'options' => 'Options',
                                        // 'smiley' => 'Smiley',
                                        // 'square_range' => 'Square Range (1...5)',
                                        // 'circle_range' => 'Circle Range (1...5)',
                                    ],
                                    old('type_jawaban'),
                                    ['class' => 'form-control'],
                                ) }}
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{ trans('admin.Status') }}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Inactive / Active</span>
                                </label>
                            </div>
                            Jawaban
                            <hr>
                            <div class="form-group">
                                <label for="">Jawaban 1</label>
                                {{ Form::text('jawaban_1', old('jawaban_1'), ['class' => 'form-control', 'placeholder' => 'Jawaban 1', 'required' => 'required']) }}
                            </div>
                            <div class="form-group">
                                <label for="">Jawaban 2</label>
                                {{ Form::text('jawaban_2', old('jawaban_2'), ['class' => 'form-control', 'placeholder' => 'Jawaban 2', 'required' => 'required']) }}
                            </div>
                            <div class="form-group">
                                <label for="">Jawaban 3</label>
                                {{ Form::text('jawaban_3', old('jawaban_3'), ['class' => 'form-control', 'placeholder' => 'Jawaban 3', 'required' => 'required']) }}
                            </div>
                            <div class="form-group">
                                <label for="">Jawaban 4</label>
                                {{ Form::text('jawaban_4', old('jawaban_4'), ['class' => 'form-control', 'placeholder' => 'Jawaban 4', 'required' => 'required']) }}
                            </div>
                            <div class="form-group">
                                <label for="">Jawaban 5</label>
                                {{ Form::text('jawaban_5', old('jawaban_5'), ['class' => 'form-control', 'placeholder' => 'Jawaban 5', 'required' => 'required']) }}
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> {{ trans('admin.Save') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
