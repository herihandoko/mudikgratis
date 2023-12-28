<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div id="element-to-print">
        <table width="100%">
            <tr>
                <td>
                    <img src="{{ url('assets/uploads/images/media_1701588795.png') }}" height="50px">
                </td>
                <td>
                    <img src="{{ url('assets/frontend/images/qrcode.png') }}" height="70px" align="right">
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
    </div>
</body>

</html>
