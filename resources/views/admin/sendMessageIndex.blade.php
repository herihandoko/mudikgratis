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
                            <div class="form-group" id="status-mudik">
                                <label for="">Status Peserta</label>
                                {{ Form::select('status_mudik', [
                                    ''=> 'Semua',
                                    'diterima'=> 'Diterima',
                                    'dikirm'=>'Dikirim',
                                    'waiting'=>'Menunggu User'
                                ], old('status_mudik') , ['class' => 'form-control']) }}
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
    </script>
@endpush
