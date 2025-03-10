<html>
<?php
use Illuminate\Support\Carbon;
$nomor = 1;
?>

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
                <td style="text-align: center;">
                    DAFTAR PESERTA MUDIK GRATIS BERSAMA PEMERINTAH PROVINSI BANTEN TAHUN 2025/1446H
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    {{ isset($kotaTujuan->name) ? strtoupper($kotaTujuan->name . ', ' . $kotaTujuan->provinsi->name) : '' }}
                </td>
            </tr>
        </table>
        <br>
        <table width="50%">
            <tr>
                <td style="text-align: left;">
                    Hari/Tanggal
                </td>
                <td style="text-align: left;">
                    <?php $created_at = isset($kotaTujuan->tgl_keberangkatan) ? Carbon::parse($kotaTujuan->tgl_keberangkatan) : '-'; ?>
                    : {{ isset($kotaTujuan->tgl_keberangkatan) ? $created_at->translatedFormat('l, d F Y H:i') : '-' }}
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    Bus
                </td>
                <td style="text-align: left;">
                    : {{ isset($bus->name) ? $bus->name : '-' }}
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    Pendamping
                </td>
                <td style="text-align: left;">
                    : {{ isset($bus->pendamping) ? $bus->pendamping : '-' }}
                </td>
            </tr>
        </table>
        <br>
        <table width="100%" border="0" cellspacing="0">
            <tr>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    NO
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    NOMOR KARTU KELUARGA
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    NOMOR INDUK KEPENDUDUKAN (NIK)
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    NAMA LENGKAP (SESUAI KTP/KK)
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    ALAMAT (SESUAI KTP/KK)
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    JENIS KELAMIN
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    NOMOR TELEPON/HP (WA AKTIF)
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                   KOTA/KAB
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    KOTA TUJUAN
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                   NOMOR KURSI
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    STATUS
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; background-color:#bebdbd;">
                    TITIK TURUN
                </td>
                <td
                    style="text-align: center; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-top:solid black 1px; border-right:solid black 1px; background-color:#bebdbd;">
                    KET.
                </td>
            </tr>
            @foreach ($pesertas as $row)
                <tr>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$nomor++ }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->profile->no_kk }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->nik }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->nama_lengkap }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->profile->address->address }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        <?php
                        $jnsKelamin = '';
                        if ($row->jenis_kelamin == 'L') {
                            $jnsKelamin = 'Laki-Laki';
                        } else {
                            $jnsKelamin = 'Perempuan';
                        }
                        ?>
                        {{ $jnsKelamin }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->profile->phone }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->profile->userCity->name; }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->KotaTujuan->name }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->nomor_kursi }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->status }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px;">
                        {{ @$row->profile->pointstop->name ?? '-' }}
                    </td>
                    <td
                        style="text-align: left; border-left:solid black 1px; border-bottom:solid black 1px; padding:5px; border-right:solid black 1px; padding:5px;">
                        {{ @$row->reason }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
