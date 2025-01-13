<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mudik Ceria 2024</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            margin: 20px auto;
            width: 90%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Mudik Ceria Penuh Makna</h1>
        <h3>Pemerintah Provinsi Banten</h3>
        <p>Hari: {{ formatTanggalIndonesia(date('Y-m-d')) }}</p>
    </div>

    <div class="table-container">
        <div style="text-align: center;">
            <h3>Data Peserta Mudik Gratis Tahun {{ date('Y') }}</h3>
        </div>
        @foreach ($tujuans as $item => $tujuan)
            <h4>{{ $tujuan->name }}</h4>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Jumlah Bus</th>
                        <th>Jumlah Kuota</th>
                        <th>Jumlah Pendaftar Terverifikasi</th>
                        <th>Sisa Kuota</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($tujuan->provinsis as $key => $provinsi)
                        <?php $nox = 1; ?>
                        @foreach ($provinsi->kota as $keyx => $val)
                            <tr>
                                <td>1</td>
                                @if ($tujuan->code == 'keluar-banten')
                                    <td style="text-align: left;">Provinsi Banten</td>
                                @else
                                    <td style="text-align: left;">{{ $val->name }}</td>
                                @endif
                                @if ($tujuan->code == 'keluar-banten')
                                    <td style="text-align: left;">{{ $val->name }}</td>
                                @else
                                    <td style="text-align: left;">Provinsi Banten</td>
                                @endif
                                <td>{{ $val->bus->count() }} Bus</td>
                                <td>{{ $val->bus->sum('jumlah_kursi') }} Kursi</td>
                                <td>{{ $val->userKota->sum('jumlah') }} Peserta</td>
                                @if ($val->bus->sum('jumlah_kursi') - $val->userKota->sum('jumlah') < 0)
                                    <td>0 Kursi</td>
                                @else
                                    <td>
                                        {{ $val->bus->sum('jumlah_kursi') - $val->userKota->sum('jumlah') }} Kursi
                                    </td>
                                @endif
                                <td>-</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>

    <div class="footer">
        <p>Diselenggarakan oleh Dinas Perhubungan Provinsi Banten</p>
        <p>Jawara Mudik - Mudik Gratis, Aman, dan Nyaman</p>
    </div>
</body>

</html>
