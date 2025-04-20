<!DOCTYPE html>
<html lang="id">

@php
    date_default_timezone_set('Asia/Jakarta');
    $path = public_path('assets/admin/images/logo-banten-1.png');
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mudik Ceria 2025</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            background: url('{{ $base64 }}') no-repeat center center;
            background-size: 75%;
            background-position: center;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            margin: 20px auto;
            width: 90%;
            overflow-x: auto;
            color: black;
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
    <div class="background"></div>
    <div class="header">
        <h1>Mudik Ceria Penuh Makna</h1>
        <h3>Pemerintah Provinsi Banten</h3>
        <p>Hari: {{ formatTanggalIndonesia(date('Y-m-d H:i')) }}</p>
    </div>

    <div class="table-container">
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h3 style="text-align: center">Report Indek Kepuasan Masyarakat ( {{ session('name_period') }} )</h3>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Nilai IKM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col" class="text-center">
                                                    <h1 class="{{ $ikmColor }}">{{ $ikm }}</h1>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">
                                                    <h3 class="{{ $ikmColor }}">{{ $ikmText }}</h3>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="2" class="text-center">Responden</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col" class="text-left">
                                                    Jumlah Responden :
                                                </th>
                                                <th scope="col" class="text-center">
                                                    {{ $jumlahCorespondent }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-left">
                                                    Periode Survei:
                                                </th>
                                                <th scope="col" class="text-center">
                                                    {{ session('name_period') }}
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col" class="text-center">Unsur Pelayanan</th>
                                            <th scope="col" class="text-center">Indikator A</th>
                                            <th scope="col" class="text-center">Indikator B</th>
                                            <th scope="col" class="text-center">Indikator C</th>
                                            <th scope="col" class="text-center">Indikator D</th>
                                            <th scope="col" class="text-center">Indikator E</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unsur as $key => $item)
                                            <?php $total = 0; ?>
                                            <tr>
                                                <th scope="row" class="text-right">{{ $item->sorting }}</th>
                                                <th class="text-left">{{ $item->pertanyaan }}</th>
                                                @foreach ($item->answers as $keya => $answer)
                                                    <td class="text-right">{{ $answer->respon->count() }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="footer">
        <p>Diselenggarakan oleh Dinas Perhubungan Provinsi Banten</p>
        <p>Jawara Mudik - Mudik Gratis, Aman, dan Nyaman</p>
    </div>
</body>

</html>
