@php
    $page_title = trans('Admin | Kirim Pesan');
@endphp
@push('style')
@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kirim Notifikasi</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ route('admin.dashboard') }}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card text-white">
                    <div class="card-body">
                        <form action="{{ route('admin.broadcast-pengguna.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <?php $invalid = ''; ?>
                                @error('target')
                                    <?php $invalid = 'is-invalid'; ?>
                                @enderror
                                <label for="">Select Target <span class="text-danger">*</span> </label>
                                {{ Form::select('target', $periode, old('target'), ['class' => 'form-control ' . $invalid, 'id' => 'sel-taget']) }}
                                <span style="color:red !important;">{{ $errors->first('target') }}</span>
                            </div>
                            <div class="form-group" id="group-target">
                                <label for="">Input Target <span class="text-danger">*</span></label>
                                <?php $invalid2 = ''; ?>
                                @error('phone_number')
                                    <?php $invalid2 = 'is-invalid'; ?>
                                @enderror
                                {{ Form::text('phone_number', old('phone_number'), ['class' => 'form-control ' . $invalid2, 'placeholder' => '0813XXXXXXX']) }}
                                <span style="color:red !important;">{{ $errors->first('phone_number') }}</span>
                            </div>
                            <div id="status-mudik">
                                <div class="form-group">
                                    <label for="">Tujuan</label>
                                    {{ Form::select('tujuan_id', $tujuan, old('tujuan_id',@$request->tujuan_id) , ['class' => 'form-control','id'=>'sel-tujuan']) }}
                                </div>
                                <div class="form-group">
                                    <label for="kota_tujuan_id" id="label-kota_tujuan_id">Kota Tujuan <span class="text-danger">*</span></label>
                                    <select class="form-control sel-kota-tujuan" name="kota_tujuan_id" id="kota_tujuan_id">
                                        <option value="">Pilih Kota Tujuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status Peserta</label>
                                    {{ Form::select('status_mudik', [
                                        ''=> 'Semua',
                                        'diterima'=> 'Diterima',
                                        'dikirm'=>'Dikirim',
                                        'waiting'=>'Menunggu User'
                                    ], old('status_mudik') , ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pesan</label>
                                <?php $invalid3 = ''; ?>
                                @error('message')
                                    <?php $invalid3 = 'is-invalid'; ?>
                                @enderror
                                <textarea class="form-control h-100 {{ $invalid3 }}" name="message" rows="5">{{ old('message') }}</textarea>
                                <span style="color:red !important;">{{ $errors->first('message') }}</span>
                            </div>
                            <div class="form-group">
                                {{ Form::checkbox('skm', null, false) }} <label for="">Dengan Survey Kepuasan
                                    Masyarakat (SKM)</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane"></i>
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        _selTarget = $('#sel-taget').val();
        if (_selTarget == 'input') {
            $('#group-target').show();
            $('#status-mudik').hide();
        } else {
            $('#group-target').hide();
            $('#status-mudik').show();
        }
        $('#sel-taget').on('change', function(e) {
            _val = $(this).val();
            if (_val == 'input') {
                $('#group-target').show();
                $('#status-mudik').hide();
            } else {
                $('#group-target').hide();
                $('#status-mudik').show();
            }
        });

        onChangeSelect('{{ route('admin.broadcast-pengguna.combo') }}', $('#sel-tujuan').val());
        $('#sel-tujuan').on('change', function() {
            onChangeSelect('{{ route('admin.broadcast-pengguna.combo') }}', $(this).val());
        });

        function onChangeSelect(url, id) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.sel-kota-tujuan').empty();
                    $('.sel-kota-tujuan').append('<option disabled selected>Silahkan Pilih Kota Tujuan</option>');
                    var sel_content = '';
                    var kotaTujuan = '';
                    $.each(data, function(key, value) {
                        _selected = '';
                        sel_content = '<option value="' + value.id + '" '+_selected+'>' + value.name + '</option>';
                        kotaTujuan = value.tujuan.code;
                        $('.sel-kota-tujuan').append(sel_content);
                    });
                    if( kotaTujuan == 'kedalam-banten'){
                        $('#label-kota_tujuan_id').html('Kota Asal');
                    }else{
                        $('#label-kota_tujuan_id').html('Kota Tujuan');
                    }
                }
            });
        }
    </script>
@endpush
