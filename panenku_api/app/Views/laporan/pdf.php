<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan PanenKu</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        h2,
        h3 {
            text-align: center;
            margin: 0;
        }

        p {
            margin: 4px 0;
        }

        .summary {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary td {
            border: 1px solid #000;
            padding: 8px;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        table.data th,
        table.data td {
            border: 1px solid #000;
            padding: 6px;
        }

        table.data th {
            background: #e9ecef;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>

</head>

<body>

    <h2>PANENKU</h2>

    <h3>Laporan Pendapatan Kebun</h3>

    <hr>

    <p>

        <strong>Periode :</strong>

        <?= $mulai ?: '-' ?>

        s/d

        <?= $selesai ?: '-' ?>

    </p>

    <div class="summary">

        <table>

            <tr>

                <td width="50%">

                    <strong>Total Pendapatan</strong>

                </td>

                <td class="text-right">

                    Rp <?= number_format($totalPendapatan, 0, ',', '.') ?>

                </td>

            </tr>

            <tr>

                <td>

                    <strong>Total Biaya</strong>

                </td>

                <td class="text-right">

                    Rp <?= number_format($totalBiaya, 0, ',', '.') ?>

                </td>

            </tr>

            <tr>

                <td>

                    <strong>Laba Bersih</strong>

                </td>

                <td class="text-right">

                    Rp <?= number_format($labaBersih, 0, ',', '.') ?>

                </td>

            </tr>

        </table>

    </div>

    <h3>Data Panen</h3>

    <table class="data">

        <thead>

            <tr>

                <th width="5%">No</th>
                <th width="20%">Tanggal</th>
                <th>Kebun</th>
                <th width="15%">Kg</th>
                <th width="25%">Total</th>

            </tr>

        </thead>

        <tbody>

            <?php if (!empty($panen)) : ?>

                <?php $no = 1; ?>

                <?php foreach ($panen as $item) : ?>

                    <tr>

                        <td class="text-center">

                            <?= $no++ ?>

                        </td>

                        <td>

                            <?= date('d-m-Y', strtotime($item['tanggal_panen'])) ?>

                        </td>

                        <td>

                            <?= esc($item['nama_kebun']) ?>

                        </td>

                        <td class="text-right">

                            <?= number_format($item['hasil_kg'], 2, ',', '.') ?>

                        </td>

                        <td class="text-right">

                            Rp <?= number_format($item['total_harga'], 0, ',', '.') ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else : ?>

                <tr>

                    <td colspan="5" class="text-center">

                        Tidak ada data panen.

                    </td>

                </tr>

            <?php endif; ?>

        </tbody>

    </table>

    <h3>Data Biaya</h3>

    <table class="data">

        <thead>

            <tr>

                <th width="5%">No</th>
                <th width="20%">Tanggal</th>
                <th>Kebun</th>
                <th>Kategori</th>
                <th width="25%">Nominal</th>

            </tr>

        </thead>

        <tbody>

            <?php if (!empty($biaya)) : ?>

                <?php $no = 1; ?>

                <?php foreach ($biaya as $item) : ?>

                    <tr>

                        <td class="text-center">

                            <?= $no++ ?>

                        </td>

                        <td>

                            <?= date('d-m-Y', strtotime($item['tanggal'])) ?>

                        </td>

                        <td>

                            <?= esc($item['nama_kebun']) ?>

                        </td>

                        <td>

                            <?= esc($item['nama_kategori']) ?>

                        </td>

                        <td class="text-right">

                            Rp <?= number_format($item['nominal'], 0, ',', '.') ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else : ?>

                <tr>

                    <td colspan="5" class="text-center">

                        Tidak ada data biaya.

                    </td>

                </tr>

            <?php endif; ?>

        </tbody>

    </table>

</body>

</html>