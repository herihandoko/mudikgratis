@php
    $page_title = 'Profile';
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
                                        <a href="{{ route('user.profile') }}" class="active">{{ trans('frontend.Profile') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta.reset') }}">Ubah Password</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.peserta.cancel') }}" style="background-color:#9d161690 !important;">Pembatalan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="p-4 mt-4 mb-4 border">
                            @if ($user->status_profile == 0 || $user->status_profile == null)
                                <div class="alert alert-danger" role="alert"> Anda belum memiliki tiket mudik. Silahkan
                                    lengkapi data mudik Anda dan jangan lupa klik button <b>{{ trans('frontend.Save') }}</b>
                                    untuk mendapatkan tiket mudik.<b><span id="demo"></span></b>
                                </div>
                            @endif
                            @if ($user->status_profile == 1 && $user->status_mudik == 'ditolak')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $user->reason }}<br>
                                    Silahkan perbarui data peserta mudik Anda. <a
                                        href="{{ route('user.peserta') }}"><b>Klik!</b></a>
                                </div>
                            @endif
                            <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data"
                                files="true">
                                @csrf
                                <h3>{{ trans('frontend.Information') }}</h3>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">{{ trans('frontend.Avatar') }} <span
                                            class="text-danger"> (Ukuran file max : 2MB, jpg,jpeg,png)</span></label>
                                    <div class="upload-preview">
                                        <img src="{{ @$user->avatar ? asset(@$user->avatar) : asset('assets/frontend/images/user.png') }}"
                                            alt="Avatar" class="avatar-preview">
                                    </div>
                                    <input class="form-control" name="avatar" type="file" id="formFile"
                                        onchange="previewFile(this)" accept="image/*">
                                </div>
                                <h3 class="mt-4">{{ trans('frontend.Data Diri') }}</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="no_kk">{{ trans('frontend.No KK') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="no_kk" required value="{{ @$user->no_kk ?: old('no_kk') }}" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">{{ trans('frontend.Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" required value="{{ @$user->name ?: old('name') }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="tempat_lahir" required value="{{ @$user->tempat_lahir ?: old('tempat_lahir') }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">{{ trans('frontend.Phone') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone" required value="{{ @$user->phone ?: old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="nik">{{ trans('frontend.NIK') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nik" required value="{{ @$user->nik ?: old('nik') }}" readonly>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="profession">Pekerjaan <span class="text-danger">*</span></label>
                                            {{ Form::select('profession',$profession->prepend('Select Pekerjaan',''), @$user->id_profession ?: old('profession'), ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="gender">{{ trans('frontend.Gender') }} <span class="text-danger">*</span></label>
                                            {{ Form::select('gender', ['L' => 'Laki-laki', 'P' => 'Perempuan'], @$user->gender ?: old('gender'), ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="tgl_lahir">{{ trans('frontend.Birthdate') }} <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tgl_lahir" required value="{{ @$user->tgl_lahir ?: old('tgl_lahir') }}">
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mt-4">{{ trans('frontend.Address') }}</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            @php
                                                $provinces = new App\Http\Controllers\Admin\DependentDropdownController();
                                                $provinces = $provinces->provinces();
                                            @endphp
                                            <label for="provinsi">{{ trans('frontend.Provinsi') }} <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control sel-provinsi" name="provinsi" id="provinsi"
                                                required>
                                                <option value="" disabled selected>-- Pilih --</option>
                                                @foreach ($provinces as $item)
                                                    <option @if (@$user->address->provinsi == $item->id) selected @endif value="{{ $item->id }}"> {{ $item->name ?? '' }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="kabupaten">{{ trans('frontend.City') }} <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control sel-kabupaten" name="city" id="kabupaten"
                                                required>
                                                <option value="">Pilih Kabupaten Kota</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="kecamatan">{{ trans('frontend.Kecamatan') }} <span class="text-danger">*</span></label>
                                            <select class="form-control sel-kecamatan" name="kecamatan" id="kecamatan" required>
                                                <option value="">Pilih Kecamatan Kecamatan</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="kelurahan">{{ trans('frontend.Kelurahan') }} <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control sel-kelurahan" name="kelurahan" id="kelurahan"
                                                required>
                                                <option value="">Pilih Kelurahan Kelurahan</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">{{ trans('frontend.Full Address') }}</label>
                                            <textarea type="text" class="form-control" name="address" value="">{!! @filterTag(clean($user->address->address)) !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mt-4">{{ trans('frontend.Data Mudik') }}</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="">Tujuan Mudik</label>
                                            <input type="text" class="form-control" name="post_code"
                                                value="{{ @$user->mudiktujuan->name }}" readonly disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">
                                                @if ($user->mudiktujuan->code == 'keluar-banten')
                                                    Kota Tujuan Mudik
                                                @else
                                                    Kota Asal Mudik
                                                @endif
                                            </label>
                                            <input type="text" class="form-control" name="post_code"
                                                value="{{ @$user->kotatujuan->name }}" readonly disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Jumlah Peserta</label>
                                            <input type="text" class="form-control" name="post_code"
                                                value="{{ @$user->jumlah }}" readonly disabled>
                                        </div>
                                        {{-- <div class="form-group mb-2">
                                            <label for="tgl_berangkat">{{ trans('frontend.Tgl_berangkat') }} <span class="text-danger">*</span></label>
                                            {{ Form::select('tgl_berangkat', ['2024-03-01' => '1 Maret 2024', '2024-03-02' => '2 Maret 2024'], @$user->tgl_berangkat?: old('tgl_berangkat'), ['class' => 'form-control','required' => true]) }}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="kota_berangkat">{{ trans('frontend.Kota_berangkat') }} <span class="text-danger">*</span></label>
                                            {{ Form::select('kota_berangkat', ['Serang' => 'Serang'], @$user->kota_berangkat?: old('kota_berangkat'), ['class' => 'form-control','required' => true]) }}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="kota_tujuan">{{ trans('frontend.Kota_tujuan') }} <span class="text-danger">*</span></label>
                                            {{ Form::select('kota_tujuan', ['Cirebon' => 'Cirebon','Brebes'=>'Brebes','Tegal'=>'Tegal','Pemalang'=>'Pemalang'], @$user->kota_berangkat?: old('kota_tujuan'), ['class' => 'form-control','required' => true]) }}
                                        </div> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="is_peserta">Kota Pemberhentian Penumpang <span class="text-danger">*</span></label>
                                            {{ Form::select('id_rute', @$user->kotatujuan->rutes->pluck('name','id')->prepend('Select Kota Pemberhentian', '') , @$user->id_rute ?: old('id_rute'), ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="is_peserta">Pendaftar termasuk Peserta Mudik <span class="text-danger">*</span></label>
                                            @if ($user->status_profile == 0 || $user->status_profile == null)
                                                {{ Form::select('is_peserta', ['Ya' => 'Ya', 'Tidak' => 'Tidak'], @$user->is_peserta ?: old('is_peserta'), ['class' => 'form-control', 'required' => true]) }}<br>
                                            @else
                                                <input type="text" class="form-control" name="is_peserta" required
                                                    value="{{ @$user->is_peserta ?: old('is_peserta') }}" readonly>
                                            @endif
                                            <div class="alert alert-success mt-2" role="alert">
                                                Pilih <b>Ya</b>, apabila Anda ikut sebagai Peserta Mudik. Pendaftar akan
                                                secara otomatis masuk ke daftar Peserta Mudik, tidak perlu ditambahkan lagi
                                                ke Daftar Peserta Mudik Lainnya!
                                            </div>
                                            {{-- <label for="is_peserta">{{ trans('frontend.Pendaftar ') }} <span class="text-danger">*</span></label> --}}
                                            {{-- {{ Form::checkbox('is_peserta', null, @$user->tgl_berangkat?: old('tgl_berangkat'), ['class' => 'form-control','required' => true]) }} --}}
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mt-4">{{ trans('frontend.Dokumen Registrasi') }}</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="formKK" class="form-label">{{ trans('frontend.KK') }} <span
                                                    class="text-danger">* (Ukuran file max : 2MB,
                                                    jpg,jpeg,png)</span></label>
                                            <div class="upload-preview">
                                                <img src="{{ @$user->foto_kk ? asset(@$user->foto_kk) : asset('assets/frontend/images/familycard.png') }}"
                                                    alt="KK" class="kk-preview">
                                            </div>
                                            <input class="form-control" name="foto_kk" type="file" id="formKK"
                                                onchange="previewFileKK(this)" {{ @!$user->foto_kk ? 'required' : '' }}
                                                accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label for="formKTP" class="form-label">{{ trans('frontend.KTP') }} <span
                                                    class="text-danger">* (Ukuran file max : 2MB,
                                                    jpg,jpeg,png)</span></label>
                                            <div class="upload-preview">
                                                <img src="{{ @$user->foto_ktp ? asset(@$user->foto_ktp) : asset('assets/frontend/images/idcard.png') }}"
                                                    alt="KTP" class="ktp-preview">
                                            </div>
                                            <input class="form-control" name="foto_ktp" type="file" id="formKTP"
                                                onchange="previewFileKTP(this)" {{ @!$user->foto_ktp ? 'required' : '' }}
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="formSelfie" class="form-label">{{ trans('frontend.Selfie') }}
                                                <span class="text-danger">* (Ukuran file max : 2MB,
                                                    jpg,jpeg,png)</span></label>
                                            <div class="upload-preview">
                                                <img src="{{ @$user->foto_selfie ? asset(@$user->foto_selfie) : asset('assets/frontend/images/user.png') }}"
                                                    alt="Selfie" class="selfie-preview">
                                            </div>
                                            <input class="form-control" name="foto_selfie" type="file"
                                                id="formSelfie" onchange="previewFileSelfie(this)"
                                                {{ @!$user->foto_selfie ? 'required' : '' }} accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 box">
                                    <button class="btn btn-theme-colored1 mt-2 w-100"
                                        type="submit">{{ trans('frontend.Save') }}</button>
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
        var _provinsiId = $('.sel-provinsi').val();
        if (_provinsiId !== null) {
            var _cityId = '{{ @$user->address->city ?? 0 }}';
            var _kecId = '{{ @$user->address->kecamatan ?? 0 }}';
            var _kelId = '{{ @$user->address->kelurahan ?? 0 }}';
            onChangeSelect('{{ route('user.cities') }}', $('.sel-provinsi').val(), 'kabupaten');
            onChangeSelect('{{ route('user.districts') }}', _cityId, 'kecamatan');
            onChangeSelect('{{ route('user.villages') }}', _kecId, 'kelurahan');
        }

        $('.sel-provinsi').on('change', function() {
            onChangeSelect('{{ route('user.cities') }}', $(this).val(), 'kabupaten');
        });

        $('.sel-kabupaten').on('change', function() {
            onChangeSelect('{{ route('user.districts') }}', $(this).val(), 'kecamatan');
        });

        $('.sel-kecamatan').on('change', function() {
            onChangeSelect('{{ route('user.villages') }}', $(this).val(), 'kelurahan');
        });

        function onChangeSelect(url, id, name) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>-- Pilih --</option>');
                    $.each(data, function(key, value) {
                        var _valSel = 0;
                        switch (name) {
                            case 'kabupaten':
                                _valSel = _cityId;
                                break;
                            case 'kecamatan':
                                _valSel = _kecId;
                                break;
                            case 'kelurahan':
                                _valSel = _kelId;
                                break;
                        }
                        if (parseInt(_valSel) === parseInt(key)) {
                            $('#' + name).append('<option value="' + key + '" selected>' + value +
                                '</option>');
                        } else {
                            $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                        }
                    });
                }
            });
        }

        function previewFile(input) {
            var file = $("input[type=file]#formFile").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $(".avatar-preview").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        function previewFileKK(input) {
            var file = $("input[type=file]#formKK").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $(".kk-preview").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        function previewFileKTP(input) {
            var file = $("input[type=file]#formKTP").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $(".ktp-preview").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        function previewFileSelfie(input) {
            var file = $("input[type=file]#formSelfie").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $(".selfie-preview").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
