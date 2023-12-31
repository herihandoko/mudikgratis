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
                            <form action="{{ route('user.peserta.store_cancel') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-2">                       
                                    <label class="col-lg-2 col-form-label text-sm-left text-md-right col-sm-12" for="nik">NIK / Nomor KTP</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" id="nik" name="nik" required maxlength="16" class="form-control" placeholder="Masukan NIK / Nomor KTP sebanyak 16 digit" onkeyup="validateNIK()"> 
                                        <div class="error" id="nik-error" style="color:red"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 box mb-2">
                                    <button class="btn btn-theme-colored1 mt-2 w-100" type="submit">Kirim</button>
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
    @if(auth()->user()->status_profile == 0)
        <script>
            // Set the date we're counting down to
            var ONE_HOUR = 60 * 60 * 1000;
            var countDownDateX = new Date('{{ auth()->user()->created_at }}').getTime();
            countDownDate = new Date(countDownDateX + ONE_HOUR).getTime()
            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d : " + hours + "h : "
            + minutes + "m : " + seconds + "s";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
                $.ajax({
                    url: '{{ route('user.profile.delete') }}',
                    type: 'GET',
                    success: function(data) {
                        location.reload();
                    }
                });
            }
            }, 1000);
        </script>
    @endif
@endpush
@push('scripts')
<link rel="stylesheet" href="{{asset('assets/admin/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
@endpush
@push('scripts')
    <script src="{{url('assets/admin/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{url('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}">
    <script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
    <script>
    $(document).ready(function() {
        $('table.table-statistic').DataTable( {
            responsive: true,
            bLengthChange:false,
            bPaginate:false,
            searching:false,
            info:false,
            scrollX:false,
            scrollY:false,
            ordering:false
        });

      // Event handler untuk keyup pada input dengan id "nik"
        $("#nik").keyup(function() {
            var nikValue = $(this).val();
            var nikError = $("#nik-error");

            // Validasi NIK/KTP
            console.log(validateNIK(nikValue));
            if (validateNIK(nikValue)) {
                nikError.text("");
            } else {
                nikError.text("Format NIK/KTP tidak valid");
            }
        });
    });

    function validateNIK(nik) {
        var regex = /^[0-9]{16}$/;
        return regex.test(nik);
    }
    </script>
@endpush