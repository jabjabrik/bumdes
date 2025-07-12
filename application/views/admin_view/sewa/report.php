<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Sewa</title>
    <style>
        body {
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #002842ff;
        }

        .header h2 {
            color: #2c3e50;
            margin: 0;
            padding: 0;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .report-info {
            text-align: center;
            margin-bottom: 15px;
            font-size: 11px;
            color: #7f8c8d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        table th {
            background-color: #002842ff;
            color: white;
            text-align: center;
            padding: 8px;
            font-weight: 600;
            font-size: .9em;
            font-weight: bold;
        }

        table td {
            border: 1px solid #e0e0e0;
            padding: 8px;
            text-align: left;
            vertical-align: middle;
        }

        table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .no-data {
            text-align: center;
            padding: 15px;
            color: #7f8c8d;
            font-style: italic;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 10px;
            color: #7f8c8d;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Sewa BUMDES</h2>
    </div>

    <div class="report-info">
        Laporan periode: <?= date('d F Y') ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Properti</th>
                <th>Jenis</th>
                <th>Alamat</th>
                <th>Nama Penyewa</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Lama Sewa</th>
                <th>Jenis Usaha</th>
                <th>Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data_result)): ?>
                <?php $no = 1;
                foreach ($data_result as $item): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $item->nama_properti ?></td>
                        <td class="text-center"><?= $item->jenis ?></td>
                        <td><?= $item->alamat ?></td>
                        <td><?= $item->nama_penyewa ?></td>
                        <td class="text-center"><?= date('d-m-Y', strtotime($item->tanggal_mulai)) ?></td>
                        <td class="text-center"><?= date('d-m-Y', strtotime($item->tanggal_selesai)) ?></td>
                        <td class="text-center"><?= hitung_lama_sewa($item->tanggal_mulai, $item->tanggal_selesai, $item->jenis) . ($item->jenis == 'ruko' ? ' tahun' : ' bulan') ?></td>
                        <td><?= $item->jenis_usaha ?></td>
                        <td class="text-center"><?= $item->metode_pembayaran ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="no-data">Tidak ada data tersedia</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: <?= date('d/m/Y H:i:s') ?>
    </div>
</body>

</html>