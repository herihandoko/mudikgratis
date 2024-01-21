@php
$page_title = "Admin | Report Peserta";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Report Peserta</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left"></i> {{trans('admin.Back')}}</a>
            <div id="accordion">
            <div class="card text-dark">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Filter Report Peserta
                      </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <form action="{{ route('admin.mudik-report.index') }}" method="GET">
                        <div class="form-group">
                            <label for="">Periode</label>
                            {{ Form::select('periode_id', $periode, $request->periode_id , ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="">Tujuan</label>
                            {{ Form::select('tujuan_id', $tujuan, $request->tujuan_id , ['class' => 'form-control','id'=>'sel-tujuan']) }}
                        </div>
                        <div class="form-group">
                            <label for="kota_tujuan_id" id="label-kota_tujuan_id">Kota Tujuan <span class="text-danger">*</span></label>
                            <select class="form-control sel-kota-tujuan" name="kota_tujuan_id" id="kota_tujuan_id">
                                <option value="" disabled selected>Pilih Kota Tujuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nomor_bus">Bus</label>
                            <select class="form-control sel-nomor_bus" name="nomor_bus" id="nomor_bus">
                                <option value="" disabled selected>Pilih Bus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Type Report</label>
                            {{ Form::select('type', [
                                'preview'=> 'Preview',
                                'export'=>'Export to Excel',
                                'pdf'=>'Cetak to PDF'
                            ], $request->type , ['class' => 'form-control']) }}
                        </div>
                        <a class="btn btn-warning" href="{{ route('admin.mudik-report.index') }}"><i class="fa fa-undo"></i> Reset Filter </a>
                        <button type="submit" class="btn btn-info"><i class="fa fa-filter"></i> Filter </button>
                    </form>
                </div>
                </div>
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
        onChangeSelect('{{ route('admin.mudik-report.combo') }}', $('#sel-tujuan').val());
        $('#sel-tujuan').on('change', function() {
            onChangeSelect('{{ route('admin.mudik-report.combo') }}', $(this).val());
        });
        
        $('#kota_tujuan_id').on('change', function() {
            onChangeSelectKota('{{ route('admin.mudik-report.combobus') }}', $(this).val());
        });

        function onChangeSelect(url, id) {
            if(id == 1){
                $('#label-kota_tujuan_id').html('Kota Tujuan');
            }else{
                $('#label-kota_tujuan_id').html('Kota Asal');
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
                                onChangeSelectKota('{{ route('admin.mudik-report.combobus') }}', value.id);
                            }
                        }
                        sel_content = '<option value="' + value.id + '" '+_selected+'>' + value.name + '</option>';
                        $('.sel-kota-tujuan').append(sel_content);
                    });
                }
            });
        }

        function onChangeSelectKota(url, id) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.sel-nomor_bus').empty();
                    $('.sel-nomor_bus').append('<option disabled selected>Silahkan Pilih Bus</option>');
                    var sel_content = '';
                    $.each(data, function(key, value) {
                        _selected = '';
                        if('{{ $request->nomor_bus }}' != ''){
                            if(parseInt('{{ $request->nomor_bus }}') === value.id){
                                _selected = 'selected';
                            }
                        }
                        sel_content = '<option value="' + value.id + '" '+_selected+'>' + value.name + '</option>';
                        $('.sel-nomor_bus').append(sel_content);
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
