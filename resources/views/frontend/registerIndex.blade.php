@php
    $page_title = 'Register';
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <!-- Section: page title -->
            <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center">
                <div class="container pt-25 pb-25">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="title">{{ trans('frontend.Register') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container" style="padding-top: 25px !important;">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 mb-40">
                            @if($statusMudik)
                            <h4 class="text-gray mt-0 pt-10"> {{ trans('frontend.Register') }} </h4>
                            <hr>
                            <p>Daftar Akun Mudik Gratis 2024</p>
                            <form name="login-form" class="clearfix" method="POST" action="{{ route('user.register') }}">
                                @csrf
                                @error('error')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('no_kk')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('nik')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('name')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('tujuan')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('kota_tujuan')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('jumlah')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('tempat_lahir')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('tgl_lahir')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('g-recaptcha-response')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong>
                                        @if ($errors->first('g-recaptcha-response'))
                                            {{ trans('frontend.Captcha Required!') }}
                                        @endif.
                                    </div>
                                @enderror

                                @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                @error('password')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ trans('frontend.Error!') }}</strong> {{ $message }}.
                                    </div>
                                @enderror

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_tujuan">Tujuan Mudik <span style="margin-left:5px; color:red;">*</span></label>
                                        {{ Form::select('tujuan', $tujuan, old('tujuan'), ['class' => 'form-control sel-tujuan', 'required'=>true,'id'=>'form_username_tujuan']) }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_kota_tujuan" id="label-kota-tujuan">Kota Tujuan <span style="margin-left:5px; color:red;">*</span></label>
                                        <select class="form-control sel-kota-tujuan" name="kota_tujuan" required id="form_username_kota_tujuan">
                                            <option value="">Pilih Kota</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_jumlah">Jumlah Anggota<span style="margin-left:5px; color:red;">*</span></label>
                                        <select class="form-control" name="jumlah" required id="form_username_jumlah">
                                            <option value="" selected disabled>Pilih Jumlah Anggota Mudik</option>
                                            <option value="1" @if(old('jumlah') == 1) selected @endif>1 Orang</option>
                                            <option value="2" @if(old('jumlah') == 2) selected @endif>2 Orang</option>
                                            <option value="3" @if(old('jumlah') == 3) selected @endif>3 Orang</option>
                                            <option value="4" @if(old('jumlah') == 4) selected @endif>4 Orang</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_no_kk">Nomor Kartu Keluarga (KK) <span  style="margin-left:5px; color:red;">*</span></label>
                                        <input id="form_username_no_kk" name="no_kk" class="form-control" type="text" required value="{{ old('no_kk') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_nik">Nomor Induk Kependudukan (NIK) <span style="margin-left:5px; color:red;">*</span></label>
                                        <input id="form_username_nik" name="nik" class="form-control" type="text" required value="{{ old('nik') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_name">{{ trans('frontend.Name') }} <span style="margin-left:5px; color:red;">*</span></label>
                                        <input id="form_username_name" name="name" class="form-control" type="text" required value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="row row-tempat-lahir hide">
                                    <label for="form_tempat_lahir">Tempat Lahir (Sesuai KTP)<span style="margin-left:5px; color:red;">*</span></label>
                                    <div class="mb-3 col-md-12">
                                        {{ Form::select('tempat_lahir', $tempatLahir, old('tempat_lahir'), ['class' => 'form-control sel-tempat_lahir w-100','id'=>'form_tempat_lahir', 'style'=>'width:100% !important;']) }}
                                        <span style="color:red; font-size:10px;">Maaf untuk sementara, mudik bersama dengan tujuan ke dalam Propinsi Banten hanya tersedia yang tempat lahir di wilayah Propinsi Banten</span>
                                    </div>
                                </div>

                                <div class="row row-tgl-lahir hide">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_tgl_lahir">Tanggal Lahir (Sesuai KTP)<span style="margin-left:5px; color:red;">*</span></label>
                                        <input id="form_tgl_lahir" name="tgl_lahir" class="form-control" type="date" value="{{ old('tgl_lahir') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_email">{{ trans('frontend.Email') }} <span style="margin-left:5px; color:red;">*</span></label>
                                        <input id="form_username_email" name="email" class="form-control" type="text" required value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="form_username_phone">{{ trans('frontend.Phone (Optional)') }} <span style="margin-left:5px; color:red;">*</span></label>
                                        <input id="form_username_phone" name="phone" class="form-control" type="text" required value="{{ old('phone') }}">
                                        <span style="margin-left:5px; color:red; font-size:10px;">** Pastikan Nomor Telepon Anda aktif dan dapat dihubungi.</span>
                                    </div>
                                </div>
                                <hr>
                                
                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <label for="form_password">{{ trans('frontend.Password') }}</label>
                                        <input id="form_password" name="password" class="form-control" type="password">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="form_password_confirmation">{{ trans('frontend.Confirm Password') }}</label>
                                        <input id="form_password_confirmation" name="password_confirmation" class="form-control" type="password">
                                    </div>

                                </div>
                                @if (ReCaptcha('recaptcha_status') == 1)
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <div
                                                class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                                <label class="control-label">Captcha</label>
                                                <div class="pull-center">
                                                    {!! app('captcha')->display() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="checkbox mt-15">
                                    <label for="form_checkbox"><input id="form_checkbox" name="form_checkbox" type="checkbox">{{ trans('frontend.Remember me') }}</label>
                                </div>
                                <div class="mb-3 tm-sc-button mt-10">
                                    <button type="submit" class="btn btn-dark w-100">{{ trans('frontend.Register') }}</button>
                                </div>

                                <div class="clearfix tm-sc-button pt-10">
                                    <a href="{{ route('user.login') }}" target="_self" class="btn btn-theme-colored1 w-100 reg-btn" data-tm-bg-color="#3b5998">{{ trans('frontend.Have an account? Login') }}
                                    </a>
                                </div>
                            </form>
                            @else
                            <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                                <strong>Maaf :</strong> Registrasi peserta mudik sementara ditutup.
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
@endsection
@push('scripts')
    <script>
        var _kotaTujuan = '{!! old('kota_tujuan') !!}';
        var _tujuan = $('.sel-tujuan').val();
        if((_tujuan.length > 0) && (_tujuan == 2)){
            $('.row-tempat-lahir').show();
            $('.row-tgl-lahir').show();
            $('label#label-kota-tujuan').html('Kota Asal <span style="margin-left:5px; color:red;">*</span>');
        }else{
            $('.row-tempat-lahir').hide();
            $('.row-tgl-lahir').hide();
            $('label#label-kota-tujuan').html('Kota Tujuan <span style="margin-left:5px; color:red;">*</span>');
        }
        onChangeSelect('{{ route('user.register.cities') }}', $('.sel-tujuan').val());
        $('.sel-tujuan').on('change', function() {
            onChangeSelect('{{ route('user.register.cities') }}', $(this).val());
            if(parseInt($(this).val()) === 1){
                $('.row-tempat-lahir').hide();
                $('.row-tgl-lahir').hide();
                $('label#label-kota-tujuan').html('Kota Tujuan <span style="margin-left:5px; color:red;">*</span>');
            }else{
                $('.row-tempat-lahir').show();
                $('.row-tgl-lahir').show();
                $('label#label-kota-tujuan').html('Kota Asal <span style="margin-left:5px; color:red;">*</span>');
            }
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
                    $('.sel-kota-tujuan').append('<option>Silahkan Pilih Kota</option>');
                    var sel_content = '';
                    $.each(data, function(key, value) {
                        sel_content = '<optgroup label="' + value.name + '">';
                        $.each(value.kota, function(keyx, val) {
                            if(val.id == _kotaTujuan){
                                sel_content += '<option value="' + val.id + '" selected>' + val.name + '</option>';
                            }else{
                                sel_content += '<option value="' + val.id + '" >' + val.name + '</option>';
                            }
                        })
                        sel_content += '</optgroup>';
                        $('.sel-kota-tujuan').append(sel_content);
                    });
                }
            });
        }
    </script>
@endpush
