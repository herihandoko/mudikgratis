@php
    $page_title = 'Peserta Mudik';
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mt-4 mb-4">
                            <div class="user-profile mb-4">
                                <img src="{{ @$user->avatar ? asset(@$user->avatar) : asset('assets/frontend/images/user.png') }}"
                                    alt="user">
                                <h1 class="user-name"> {{ Auth::user()->name }} </h1>
                            </div>
                            <div class="side-nav">
                                <ul>
                                    <li>
                                        <a href="{{ route('user.dashboard') }}">{{ trans('frontend.Dashboard') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta') }}">{{ trans('frontend.Peserta') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}">{{ trans('frontend.Profile') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}" style="background-color:#9d1616 !important;" class="active">Pembatalan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="p-4 mt-4 mb-4 border">
                            <div class="row">
                                <div class="col-md-9 col-sm-12">
                                    <h4><i class="fa fa-users"></i> Pembatalan dan Penghapusan Peserta</h4>
                                </div>
                            </div>
                            <div class="alert alert-info" role="alert">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *) Fasilitas ini untuk melakukan pembatalan dan penghapusan data peserta mudik yang telah terdaftar.
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *) Peserta yang bisa melakukan pembatalan dan penghapusan ini dengan <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kondisi belum di verifikasi manifest dan belum di terbitkannya manifest peserta.
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *) Apabila telah dilakukan proses pengapusan,maka peserta jika ingin mendaftar bisa melakukannya kembali.
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *) Peserta bisa mendaftar kembali dengan ketersediaan kendaraan yang ada saat ini pada penyelenggara mudik gratis.
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *) Apabila kendaraan sudah tidak tersedia, maka peserta sudah tidak bisa melakukan pendaftaran lagi.
                            </div> 
                            <form action="{{ route('user.peserta.store_cancel') }}" method="post" enctype="multipart/form-data" id="form-pembatalan">
                                @csrf
                                <div class="form-group row mb-2">                       
                                    <label class="col-lg-3 col-form-label text-sm-left text-md-right col-sm-12" for="reason">Peserta yang dibatalkan <span class="text-danger">*</span></label>
                                    <div class="col-lg-9 col-sm-12">
                                        @foreach ($peserta as $key => $item)
                                            <input type="checkbox" name="peserta_id[]" value="{{ $item->id }}"> {{ $item->nama_lengkap }} <br>
                                        @endforeach
                                        <div class="error" id="nik-error" style="color:red"></div>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">                       
                                    <label class="col-lg-3 col-form-label text-sm-left text-md-right col-sm-12" for="reason">Alasan Pembatalan <span class="text-danger">*</span></label>
                                    <div class="col-lg-9 col-sm-12">
                                        <textarea class="form-control" name="reason" rows="4"></textarea>
                                        <div class="error" id="nik-error" style="color:red"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-sm-12">
                                    </div>
                                    <div class="col-md-2 col-sm-12 text-right">
                                        <button class="btn btn-danger btn-xs mt-2 w-100 btn-cancel-mudik" type="button">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection
@push('scripts')
    <script>
    $(document).ready(function() {
        $('button.btn-cancel-mudik').click(function(e){
            e.preventDefault();
                Swal.fire({
                    title: "Konfirmasi",
                    text: "Apakah Anda yakin ingin melakukan pembatalan dan penghapusan data nudik?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('form#form-pembatalan').submit();
                    }
                });
        });
    });
    </script>
@endpush