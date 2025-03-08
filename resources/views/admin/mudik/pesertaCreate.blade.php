@php
$page_title = 'Input Peserta Mudik';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Input Peserta Mudik ( {{ session('name_period') }} )</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{route('admin.dashboard')}}" role="button"><i class="fas fa-arrow-circle-left"></i> {{trans('admin.Back')}}</a>
            <div class="card text-dark">
                <div class="card-body">
                    {!! Form::open(array('route' => 'admin.mudik-peserta.store','method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
                        <h3>Data Profil</h3>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="form_username_no_kk">Nomor Kartu Keluarga (KK) <span  style="margin-left:5px; color:red;">*</span></label>
                                <input id="form_username_no_kk" name="no_kk" class="form-control" type="text"  value="{{ old('no_kk') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="form_username_nik">Nomor Induk Kependudukan (NIK) <span style="margin-left:5px; color:red;">*</span></label>
                                <input id="pemesan_nik" name="nik" class="form-control" type="text"  value="{{ old('nik') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="form_username_name">{{ trans('frontend.Name') }} <span style="margin-left:5px; color:red;">*</span></label>
                                <input id="pemesan_nama" name="name" class="form-control" type="text"  value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="row row-tempat-lahir">
                            <div class="mb-3 col-md-12">
                                <label for="form_tempat_lahir">Tempat Lahir (Sesuai KTP)<span style="margin-left:5px; color:red;">*</span></label>
                                <input id="form_tempat_lahir" name="tempat_lahir" class="form-control" type="text" value="{{ old('tempat_lahir') }}" required>
                            </div>
                        </div>

                        <div class="row row-tgl-lahir">
                            <div class="mb-3 col-md-12">
                                <label for="form_tgl_lahir">Tanggal Lahir (Sesuai KTP)<span style="margin-left:5px; color:red;">*</span></label>
                                <input id="pemesan_tanggal_lahir" name="tgl_lahir" class="form-control" type="date" value="{{ old('tgl_lahir') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin <span class="text-danger">*</span></label>
                            {{ Form::select('gender', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], old('gender') , ['class' => 'form-control','id'=>'pemesan_gender']) }}
                        </div>
                        <div class="form-group mb-2">
                            <label for="profession">Pekerjaan <span class="text-danger">*</span></label>
                            {{ Form::select('id_profession',$profession->prepend('Select Pekerjaan',''), old('profession'), ['class' => 'form-control','required' => 'required']) }}
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="form_username_email">{{ trans('frontend.Email') }} <span style="margin-left:5px; color:red;">*</span></label>
                                <input id="form_username_email" name="email" class="form-control" type="email"  value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="form_username_phone">{{ trans('frontend.Phone (Optional)') }} <span style="margin-left:5px; color:red;">*</span></label>
                                <input id="form_username_phone" name="phone" class="form-control" type="text"  value="{{ old('phone') }}" placeholder="08138XXXXXX" required>
                                <span style="margin-left:5px; color:red; font-size:10px;">** Pastikan Nomor Telepon Anda aktif dan dapat terhubung dengan whatsapp.</span>
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
                                            <option @if (old('provinsi') == $item->id) selected @endif value="{{ $item->id }}"> {{ $item->name ?? '' }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="kabupaten">{{ trans('frontend.City') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control sel-kabupaten" name="city" id="kabupaten" required>
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
                                    <label for="">{{ trans('frontend.Full Address') }} <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="address" value="">{!! @filterTag(clean($user->address->address)) !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-4">{{ trans('frontend.Data Mudik') }}</h3>
                        <hr>

                        <div class="form-group">
                            <label for="">Tujuan <span class="text-danger">*</span></label>
                            {{ Form::select('tujuan_id', $tujuan, old('tujuan_id') , ['class' => 'form-control','id'=>'sel-tujuan', 'required'=>'required']) }}
                            <span style="color:red !important;">{{ $errors->first('tujuan_id') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kota_tujuan_id" id="label-kota_tujuan_id">Kota Tujuan <span class="text-danger">*</span></label>
                            <select class="form-control sel-kota-tujuan" name="kota_tujuan_id" id="kota_tujuan_id" required>
                                <option value="">Pilih Kota Tujuan</option>
                                @if(old('kota_tujuan_id'))
                                    @foreach($kotaTujuan as $key => $kota)
                                        <option value="" @if($kota->id == old('kota_tujuan_id')) selected @endif>Pilih Kota Tujuan</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="is_peserta">Kota Pemberhentian Penumpang <span class="text-danger">*</span></label>
                            <select class="form-control sel-point-stop" name="id_rute" id="point-stop" required>
                                <option value="">Pilih Kota Tujuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Peserta <span class="text-danger">*</span> <span class="text-danger" id="text-info-jumlah-kuota"></span></label>
                            {{ Form::select('jumlah', [1=>'1 Orang',2=>'2 Orang',3=>'3 Orang',4=>'4 Orang'], old('jumlah') , ['class' => 'form-control','id'=>'jumlah_peserta']) }}
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="include_passenger" name="include_passenger"> Termasuk Data Penumpang
                        </div>
                        <h3 class="mt-4">Data Anggota</h3>
                        <hr>
                        <div id="anggota_container"></div>
                        <hr>
                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Submit </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        onChangeSelect('{{ route('admin.mudik-peserta.combo') }}', $('#sel-tujuan').val());
        $('#sel-tujuan').on('change', function() {
            onChangeSelect('{{ route('admin.mudik-peserta.combo') }}', $(this).val());
        });

        let pesertaDropdown = $("#jumlah_peserta");
        let anggotaContainer = $("#anggota_container");
        let includePassengerCheckbox = $("#include_passenger");

        pesertaDropdown.on("change", function () {
            generateAnggotaRows(parseInt($(this).val()));
        });

        generateAnggotaRows(pesertaDropdown.val());
        function generateAnggotaRows(jumlah) {
            includePassengerCheckbox.prop("checked", false);
            anggotaContainer.empty(); // Hapus semua anggota sebelumnya
            for (let i = 1; i <= jumlah; i++) {
                let anggotaRow = `
                    <div class="row anggota-row mt-2">
                        <div class="col-md-3 col-xs-12">
                            <input type="text" name="anggota[${i}][nik]" placeholder="NIK/No KTP" class="form-control nik" required>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <input type="text" name="anggota[${i}][nama]" placeholder="Nama Lengkap" class="form-control nama" required>
                        </div>     
                        <div class="col-md-3 col-xs-12">
                            <input type="date" name="anggota[${i}][tanggal_lahir]" class="form-control tanggal_lahir" required> 
                        </div>    
                        <div class="col-md-3 col-xs-12">
                            <select name="anggota[${i}][gender]" class="form-control gender" required>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>    
                    </div>
                `;
                anggotaContainer.append(anggotaRow);
            }
        };

        includePassengerCheckbox.on("change", function () {
            if ($(this).is(":checked")) {
                let pemesanNik = $("#pemesan_nik").val();
                let pemesanNama = $("#pemesan_nama").val();
                let pemesanTanggalLahir = $("#pemesan_tanggal_lahir").val();
                let pemesanGender = $("#pemesan_gender").val();

                let firstAnggota = $("#anggota_container .anggota-row").first();
                firstAnggota.find(".nik").val(pemesanNik);
                firstAnggota.find(".nama").val(pemesanNama);
                firstAnggota.find(".tanggal_lahir").val(pemesanTanggalLahir);
                firstAnggota.find(".gender").val(pemesanGender).trigger("change");;
            } else {
                let firstAnggota = $("#anggota_container .anggota-row").first();
                firstAnggota.find(".nik").val("");
                firstAnggota.find(".nama").val("");
                firstAnggota.find(".tanggal_lahir").val("");
                firstAnggota.find(".gender").val("L").trigger("change");;
            }
        });
        
        
        $('#kota_tujuan_id').on('change', function() {
            $.ajax({
                url: '{{ route('admin.mudik-peserta.pickstop') }}',
                type: 'GET',
                data: {
                    id: $(this).val()
                },
                success: function(data) {
                    $('.sel-point-stop').empty();
                    $('.sel-point-stop').append('<option disabled selected>Silahkan Pilih Pemberhentian</option>');
                    var sel_content = '';
                    $('#text-info-jumlah-kuota').html('( Jumlah kuota tersedia = '+ data.kuota.jumlah + ' )');
                    $.each(data.stoppoint, function(key, value) {
                        _selected = '';
                        if('{{ old('id_rute') }}' != ''){
                            if(parseInt('{{ old('id_rute') }}') === value.id){
                                _selected = 'selected';
                            }
                        }
                        sel_content = '<option value="' + value.id + '" '+_selected+'>' + value.name + '</option>';
                        $('.sel-point-stop').append(sel_content);
                    });
                }
            });
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
                    $('.sel-point-stop').empty();
                    $('.sel-kota-tujuan').append('<option disabled selected>Silahkan Pilih Kota Tujuan</option>');
                    $('.sel-point-stop').append('<option disabled selected>Silahkan Pilih Pemberhentian</option>');
                    var sel_content = '';
                    var kotaTujuan = '';
                    $.each(data, function(key, value) {
                        _selected = '';
                        if('{{ old('kota_tujuan_id') }}' != ''){
                            if(parseInt('{{ old('kota_tujuan_id') }}') === value.id){
                                _selected = 'selected';
                            }
                        }
                        kotaTujuan = value.tujuan.code;
                        sel_content = '<option value="' + value.id + '" '+_selected+'>' + value.name + '</option>';
                        $('.sel-kota-tujuan').append(sel_content);
                    });
                    if( kotaTujuan == 'kedalam-banten'){
                        $('#label-kota_tujuan_id').html('Kota Asal <span class="text-danger">*</span>');
                    }else{
                        $('#label-kota_tujuan_id').html('Kota Tujuan <span class="text-danger">*</span>');
                    }
                }
            });
        }

        var _provinsiId = $('.sel-provinsi').val();
        if (_provinsiId !== null) {
            var _cityId = '{{ @$user->address->city ?? 0 }}';
            var _kecId = '{{ @$user->address->kecamatan ?? 0 }}';
            var _kelId = '{{ @$user->address->kelurahan ?? 0 }}';
            onChangeSelectx('{{ route('admin.mudik-peserta.cities') }}', $('.sel-provinsi').val(), 'kabupaten');
            onChangeSelectx('{{ route('admin.mudik-peserta.districts') }}', _cityId, 'kecamatan');
            onChangeSelectx('{{ route('admin.mudik-peserta.villages') }}', _kecId, 'kelurahan');
        }

        $('.sel-provinsi').on('change', function() {
            onChangeSelectx('{{ route('admin.mudik-peserta.cities') }}', $(this).val(), 'kabupaten');
        });

        $('.sel-kabupaten').on('change', function() {
            onChangeSelectx('{{ route('admin.mudik-peserta.districts') }}', $(this).val(), 'kecamatan');
        });

        $('.sel-kecamatan').on('change', function() {
            onChangeSelectx('{{ route('admin.mudik-peserta.villages') }}', $(this).val(), 'kelurahan');
        });

        function onChangeSelectx(url, id, name) {
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
                            $('#' + name).append('<option value="' + key + '" selected>' + value + '</option>');
                        } else {
                            $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                        }
                    });
                }
            });
        }
    </script>
@endpush