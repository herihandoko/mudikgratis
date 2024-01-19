@php
    $page_title = 'Verifikasi Mudik';
@endphp
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Verifikasi Peserta Mudik</h1>
            </div>
            <a class="btn btn-primary mb-4" href="{{ URL::previous() }}" role="button"><i class="fas fa-arrow-circle-left"></i>
                {{ trans('admin.Back') }}</a>
            <div class="section-body">
                <div class="card bg-white">
                    <div class="card-header">Informasi Peserta</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>No KK</td>
                                    <td colspan="2">{{ $user->no_kk }}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td colspan="2">{{ $user->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td colspan="2">{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td colspan="2">{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td colspan="2">{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Tujuan</td>
                                    <td colspan="2">{{ $user->mudiktujuan->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Kota Tujuan</td>
                                    <td colspan="2">{{ $user->kotatujuan->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="2" rowspan="3">
                                        {{ $user->address->address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card bg-white">
                    <div class="card-header">Dokumen Pendukung</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Foto KK</td>
                                    <td colspan="2"><a href="{{ url($user->foto_kk) }}" target="_blank"><img src="{{ url($user->foto_kk) }}" height="200" style="padding: 5px"><br>Lihat/Download</a></td>
                                </tr>
                                <tr>
                                    <td>Foto KTP</td>
                                    <td colspan="2"><a href="{{ url($user->foto_ktp) }}" target="_blank"><img src="{{ url($user->foto_ktp) }}" height="200" style="padding: 5px"><br>Lihat/Download</a></td>
                                </tr>
                                <tr>
                                    <td>Foto Selfie</td>
                                    <td colspan="2"><a href="{{ url($user->foto_selfie) }}" target="_blank"><img src="{{ url($user->foto_selfie) }}" height="200" style="padding: 5px"><br>Lihat/Download</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Peserta Mudik</div>
                    <div class="card-body">
                        <form action="{{ route('admin.mudik-verifikasi.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Status Permohonan Mudik Gratis<span class="text-danger">*</span></label>
                                <select class="form-control" name="status_mudik" id="status_mudik">
                                    <option disabled selected>Pilih Status Permohonan Mudik</option>
                                    <option value="ditolak" @if((old('status_mudik') == 'ditolak') or ($user->status_mudik == 'ditolak')) selected @endif>Di Tolak</option>
                                    <option value="diterima" @if((old('status_mudik') == 'diterima') or ($user->status_mudik == 'diterima') or $user->nomor_bus) selected @endif>Di Terima</option>
                                </select>
                            </div>
                            <div id="container-ditolak" style="display: none;">
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea class="form-control h-100" name="reason" rows="4">{{ $user->reason }}</textarea>
                                </div>
                            </div>
                            <div id="container-diterima">
                                <div class="form-group">
                                    <label for="">Bus Peserta <span class="text-danger">*</span></label>
                                    <select class="form-control" name="bus_mudik" id="bus-peserta">
                                        <option disabled selected>Pilih Bus</option>
                                        @if (isset($kotatujuan->bus))
                                            @foreach ($kotatujuan->bus as $bus)
                                                <option value="{{ $bus->id }}" @if((old('bus_mudik') == $bus->id) || ($user->nomor_bus == $bus->id)) selected @endif>{{ $bus->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kategori</th>
                                            <th>Kursi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($user->peserta as $peserta)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $peserta->nik }}</td>
                                                <td>{{ $peserta->nama_lengkap }}</td>
                                                <td>{{ date('d M Y', strtotime($peserta->tgl_lahir)) }}</td>
                                                <td>{{ $peserta->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                                <td>{{ $peserta->kategori }}</td>
                                                <td>
                                                    @if($peserta->nomor_kursi)
                                                        <button type="button" class="btn btn-sm btn-link seat-peserta" onclick="pilihSeat({{ $peserta->id }})">{{ $peserta->nomor_kursi }}</button>
                                                        <input type="hidden" name="kursi_peserta[{{ $peserta->id }}]" value="{{ $peserta->nomor_kursi }}">
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-success seat-peserta" onclick="pilihSeat({{ $peserta->id }})">Pilih Kursi Kursi</button>
                                                        <input type="hidden" name="kursi_peserta[{{ $peserta->id }}]" value="">
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" role="button"> {{ trans('admin.Save') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        var _stsOld = $('#status_mudik').val();
        if(_stsOld == 'diterima'){
            $('#container-ditolak').hide();
            // $('#container-diterima').show();
        }else if(_stsOld == 'ditolak'){
            $('#container-ditolak').show();
            // $('#container-diterima').hide();
        }else{
            $('#container-ditolak').hide();
            // $('#container-diterima').hide();
        }
        $('#status_mudik').on('change', function() {
            var _sts = $(this).val();
            if(_sts == 'diterima'){
                $('#container-ditolak').hide();
                // $('#container-diterima').show();
            }else{
                $('#container-ditolak').show();
                // $('#container-diterima').hide();
            }
         });

        $('#bus-peserta').on('change', function() {
            $.ajax({
                type: 'POST',
                url: "<?= route('admin.mudik-verifikasi.bus.store') ?>",
                data: {
                    idbus:$(this).val(),
                    iduser:'<?= $user->id ?>'
                },
                success: function(data) {
                    if (data.status == 'success') {
                        location.reload();
                    }
                }
            });
        });

        function pilihSeat(id){
            var busId = $('#bus-peserta').val();
            if(busId == null){
                toastr.error('Silahkan pilih bus terlebih dahulu.');
            }else{
                var url =  "<?= route('admin.mudik-verifikasi.seat') ?>?idbus="+busId+'&idpeserta='+id;
                window.location.href = url;
            }
        }
    </script>
@endpush
