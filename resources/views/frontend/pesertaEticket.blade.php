<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
        }

        .header,
        .footer {
            width: 100%;
            text-align: left;
            position: fixed;
        }

        .header {
            top: 0px;
        }

        .footer {
            bottom: 0px;
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>

<body>
    <div id="element-to-print">
        <table width="100%">
            <tr>
                <td>
                    <img src="{{ public_path(GetSetting('site_logo')) }}" height="50px">
                </td>
                <td>
                    <img src="data:image/png;base64, {!! $qrcode !!}" height="70px" align="right">
                    {{-- <img src="{{ public_path('assets/frontend/images/qrcode.png') }}" height="70px" align="right"> --}}
                </td>
            </tr>
        </table>
        <h4>Info Tiket</h4>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th align="left" style="border-bottom:solid black 1px; padding:5px;">Nomor Registrasi</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: {{ $user->nomor_registrasi }}</td>
                <th align="left" style="border-bottom:solid black 1px; padding:5px;">Nama Pendaftar</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: {{ $user->name }}</td>
            </tr>
            <tr>
                <th align="left" style="border-bottom:solid black 1px; padding:5px;">Email</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: {{ $user->email }}</td>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">Nomor Handphone</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: {{ $user->phone }}</td>
            </tr>
            <tr>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">Kategori Pendaftar</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: Umum</td>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">No KK</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: {{ $user->no_kk }}</td>
            </tr>
            <tr>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">Moda</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: Bus</td>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">NIK</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: {{ $user->nik }}</td>
            </tr>
            <tr>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">Lokasi Pemberangkatan</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: Terminal Serang</td>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">Tanggal Berangkat</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: 02 Mei 2024 07:00</td>
            </tr>
            <tr>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">Kota Tujuan</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: {{ $user->kotatujuan->name }}</td>
                <th style="border-bottom:solid black 1px; padding:5px;" align="left">Nomor Bus</th>
                <td style="border-bottom:solid black 1px; padding:5px;">: Bus 2</td>
            </tr>
        </table>
        <h4>Peserta Mudik</h4>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th
                    style="border-left:solid black 1px; border-bottom:solid black 1px; border-top:solid black 1px; padding:5px;">
                    #</th>
                <th
                    style="border-left:solid black 1px; border-bottom:solid black 1px; border-top:solid black 1px; padding:5px;">
                    Nama Lengkap</th>
                <th
                    style="border-left:solid black 1px; border-bottom:solid black 1px; border-top:solid black 1px; padding:5px;">
                    NIK</th>
                <th
                    style="border-left:solid black 1px; border-bottom:solid black 1px; border-top:solid black 1px; padding:5px;">
                    Tanggal Lahir</th>
                <th
                    style="border-left:solid black 1px; border-bottom:solid black 1px; border-top:solid black 1px; padding:5px;">
                    Kategori</th>
                <th
                    style="border-left:solid black 1px; border-bottom:solid black 1px; border-top:solid black 1px; padding:5px; border-right:solid black 1px;">
                    Nomor Kursi</th>
            </tr>
            @foreach ($pesertas as $peserta)
                <tr>
                    <td style="border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ $loop->iteration }}</td>
                    <td style="border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ $peserta->nama_lengkap }}</td>
                    <td style="border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ $peserta->nik }}
                    </td>
                    <td style="border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ $peserta->tgl_lahir }}</td>
                    <td style="border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ $peserta->kategori }}</td>
                    <td
                        style="border-left:solid black 1px; border-bottom:solid black 1px; border-right:solid black 1px; padding:5px;">
                        {{ $peserta->nomor_kursi }}</td>
                </tr>
            @endforeach
        </table>
        <p style="margin:10px;">{!! clean(html_entity_decode(@App\Models\PrivacyPolicy::first()->content)) !!}</p>
        <div class="footer">
            <p style="line-height: 1.5;">Tiket ini dapat dicetak dan dibawa untuk ditunjukan kepada petugas pada saat
                check-in.<br>
                Sertakan identitas diri para penumpang pada saat check-in agar petugas dapat melakukan verifikasi
            </p>
            <div style="background-color: #facd2f !important; padding:10px;">
                <p style="line-height: 1.5;">Apabila memerlukan bantuan, silakan hubungi <b>Customer Service Jawara Mudik Bersama</b><br>
                    <b>Telp.</b> 0812-9880-8903, <b>Wa.</b> 0812-9880-8903, <b>E-mail:</b> jawaramudik@bantenprov.go.id
                </p>
            </div>
        </div>
    </div>
</body>

</html>
