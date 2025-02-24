@php
$page_title = "Admin | Rute Mudik";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Setting Rute Bus (Pengaturan untuk rute perjalanan)</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left"></i> {{trans('admin.Back')}}</a>
            <div class="card text-dark">
                <div class="card-body">
                    <form action="{{ route('admin.setting-rute.index') }}" method="GET">
                        <div class="form-group">
                            <label for="">Tujuan</label>
                            {{ Form::select('tujuan_id', $tujuan, $request->tujuan_id , ['class' => 'form-control','id'=>'sel-tujuan','required'=> true]) }}
                        </div>
                        <div class="form-group">
                            <label for="kota_tujuan_id" id="label-kota_tujuan_id">Kota Tujuan <span class="text-danger">*</span></label>
                            <select class="form-control sel-kota-tujuan" name="kota_tujuan_id" id="kota_tujuan_id" required>
                                <option value="">Pilih Kota Tujuan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="search" value="1"><i class="fa fa-save"></i> View </button>
                    </form>
                </div>
            </div>
            <div class="section-body">
                @if(!$request->kota_tujuan_id || !$request->search || !$request->tujuan_id)
                    <div class="alert alert-warning" role="alert">
                        <strong>Silahkan pilih kota tujuan !</strong>
                    </div>
                @else  
                    <div class="card">
                        <div class="card-body wsus_custom_overflow">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
@push('script')
    {{$dataTable->scripts()}}
    <script>
        onChangeSelect('{{ route('admin.setting-rute.combo') }}', $('#sel-tujuan').val());
        $('#sel-tujuan').on('change', function() {
            onChangeSelect('{{ route('admin.setting-rute.combo') }}', $(this).val());
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
                        if('{{ $request->kota_tujuan_id }}' != ''){
                            if(parseInt('{{ $request->kota_tujuan_id }}') === value.id){
                                _selected = 'selected';
                            }
                        }
                        kotaTujuan = value.tujuan.code;
                        sel_content = '<option value="' + value.id + '" '+_selected+'>' + value.name + '</option>';
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
