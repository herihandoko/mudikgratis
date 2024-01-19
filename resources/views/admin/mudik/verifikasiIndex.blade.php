@php
$page_title = 'Verifikasi Mudik';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Verifikasi Mudik</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left"></i> {{trans('admin.Back')}}</a>
            <div class="card text-dark">
                <div class="card-body">
                    <form action="{{ route('admin.mudik-verifikasi.index') }}" method="GET">
                        <div class="form-group">
                            <label for="">Tujuan</label>
                            {{ Form::select('tujuan_id', $tujuan, $request->tujuan_id , ['class' => 'form-control','id'=>'sel-tujuan']) }}
                        </div>
                        <div class="form-group">
                            <label for="kota_tujuan_id" id="label-kota_tujuan_id">Kota Tujuan <span class="text-danger">*</span></label>
                            <select class="form-control sel-kota-tujuan" name="kota_tujuan_id" id="kota_tujuan_id">
                                <option value="">Pilih Kota Tujuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_mudik" id="label-status_mudik">Status</label>
                            <select class="form-control" name="status_mudik" id="status_mudik">
                                <option value="dikirim" @if($request->status_mudik == 'dikirim') selected @endif>Menunggu Verifikasi</option>
                                <option value="diterima" @if($request->status_mudik == 'diterima') selected @endif>Diterima</option>
                                <option value="ditolak" @if($request->status_mudik == 'ditolak') selected @endif>Ditolak</option>
                                <option value="dibatalkan" @if($request->status_mudik == 'dibatalkan') selected @endif>Dibatalkan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info"><i class="fa fa-filter"></i> Filter </button>
                    </form>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body wsus_custom_overflow">
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    {{$dataTable->scripts()}}
    <script>
        onChangeSelect('{{ route('admin.mudik-verifikasi.combo') }}', $('#sel-tujuan').val());
        $('#sel-tujuan').on('change', function() {
            onChangeSelect('{{ route('admin.mudik-verifikasi.combo') }}', $(this).val());
        });

        function onChangeSelect(url, id) {
            if(id == 2){
                $('#label-kota_tujuan_id').html('Kota Asal');
            }else{
                $('#label-kota_tujuan_id').html('Kota Tujuan');
            }
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
                    $.each(data, function(key, value) {
                        _selected = '';
                        if('{{ $request->kota_tujuan_id }}' != ''){
                            if(parseInt('{{ $request->kota_tujuan_id }}') === value.id){
                                _selected = 'selected';
                            }
                        }
                        sel_content = '<option value="' + value.id + '" '+_selected+'>' + value.name + '</option>';
                        $('.sel-kota-tujuan').append(sel_content);
                    });
                }
            });
        }

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            Swal.fire({
                title: '{{trans('admin.Are you sure?')}}',
                text: "{{trans('admin.You wont be able to revert this!')}}",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{trans('admin.Yes, delete it!')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function(response) {

                            if (response.status == 'success') {
                                Swal.fire(
                                    '{{trans('admin.Deleted!')}}',
                                    '{{trans('admin.Item has been deleted.')}}',
                                    '{{trans('admin.success')}}'
                                ).then((result) => {
                                    location.reload()
                                })
                            } else if (response.status == 'failed') {
                                toastr.warning(
                                    "{{trans('admin.Sorry, this category contains blogs!')}}"
                                )
                            }

                        }
                    });
                }
            })
        });
    </script>
@endpush
