@php
$page_title = "Admin | Provinsi Tujuan";
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Provinsi Tujuan ( {{ session('name_period') }} )</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left"></i> {{trans('admin.Back')}}</a>
            <div class="card text-dark">
                <div class="card-body">
                    <form action="{{ route('admin.mudik-provinsi.index') }}" method="GET">
                        {{ Form::hidden('id_period', session('id_period', null), ['id'=>'hidden-id-period']) }}
                        <div class="form-group">
                            <label for="">Tujuan</label>
                            {{ Form::select('tujuan_id', [], $request->tujuan_id , ['class' => 'form-control', 'id' => 'sel-tujuan']) }}
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
            });
        });

        onChangeSelect('{{ route('admin.mudik-provinsi.combo') }}', $('#hidden-id-period').val());
        function onChangeSelect(url, id) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#sel-tujuan').empty();
                    $('#sel-tujuan').append('<option disabled selected>Silahkan Pilih Tujuan</option>');
                    var sel_content = '';
                    $.each(data, function(key, value) {
                        _selected = '';
                        if('{{ $request->tujuan_id }}' != ''){
                            if(parseInt('{{ $request->tujuan_id }}') === value.id){
                                _selected = 'selected';
                            }
                        }
                        sel_content = '<option value="' + value.id + '" '+_selected+'>' + value.name + '</option>';
                        $('#sel-tujuan').append(sel_content);
                    });
                }
            });
        }
    </script>
@endpush
