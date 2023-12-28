@php
$page_title = trans('admin.Admin | Product categories');
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{trans('admin.Product Categories')}}</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left    "></i> {{trans('admin.Back')}}</a>
            <div class="section-body">
                <div class="card">
                    <div class="card-body  wsus_custom_overflow">
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
                                    "{{trans('admin.Sorry, this category contains products!')}}"
                                )
                            }

                        }
                    });
                }
            })
        });
    </script>
@endpush
