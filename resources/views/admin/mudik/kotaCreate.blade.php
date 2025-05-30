@php
    $page_title = 'Admin | Tambah Kota Tujuan';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kota Tujuan ( {{ session('name_period') }} )</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ route('admin.mudik-kota.index') }}" role="button"><i class="fas fa-arrow-alt-circle-left    "></i>{{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.mudik-kota.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="tujuan_id">Tujuan <span class="text-danger">*</span></label>
                                {{ Form::select('tujuan_id', $tujuan, old('tujuan_id') , ['class' => 'form-control sel-tujuan']) }}
                            </div>
                            <div class="form-group">
                                <label for="provinsi_id">Provinsi <span class="text-danger">*</span></label>
                                <select class="form-control sel-provinsi-tujuan" name="provinsi_id" required id="provinsi_id">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Kota <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Spare Kuota</label>
                                <input type="number" class="form-control" name="quota_spare_system" value="{{ old('quota_spare_system') }}">
                            </div>
                            <div class="form-group">
                                <div class="control-label">{{trans('admin.Status')}}</div>
                                <label class="custom-switch pl-0 mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Inactive / Active</span>
                                </label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="bus_id">Bus <span class="text-danger">*</span></label>
                                {{ Form::select('bus_id[]', $bus, old('bus_id') , ['class' => 'form-control','multiple'=>true]) }}
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal & Jam Keberangkatan <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control" name="tgl_keberangkatan" value="{{ old('tgl_keberangkatan') }}">
                            </div>
                            <div class="form-group">
                                <label for="titik_awal">Titik Awal Keberangkatan <span class="text-danger">*</span></label>
                                {{ Form::textarea('titik_awal', old('titik_awal'), ['class' => 'form-control','rows'=>10]) }}
                            </div>
                            <div class="form-group">
                                <label for="titik_akhir">Titik Akhir Tujuan <span class="text-danger">*</span></label>
                                {{ Form::textarea('titik_akhir',  old('titik_akhir') , ['class' => 'form-control','rows'=>10]) }}
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> {{ trans('admin.Save') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
        onChangeSelect('{{ route('admin.mudik-kota.provinsi') }}', $('.sel-tujuan').val());
         $('.sel-tujuan').on('change', function() {
            onChangeSelect('{{ route('admin.mudik-kota.provinsi') }}', $(this).val());
         });
        function onChangeSelect(url, id) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.sel-provinsi-tujuan').empty();
                    $('.sel-provinsi-tujuan').append('<option>Silahkan Pilih Provinsi</option>');
                    var sel_content = '';
                    $.each(data, function(key, value) {
                        sel_content = '<option value="' + value.id + '">' + value.name + '</option>';
                        $('.sel-provinsi-tujuan').append(sel_content);
                    });
                }
            });
        }
    </script>
@endpush
