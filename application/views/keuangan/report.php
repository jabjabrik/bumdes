<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        body {
            font-size: .8em;
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            text-align: center;
        }

        table td {
            border: 1px solid #ddd;
            padding: 7px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            padding: 5px;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            text-transform: capitalize;
            color: #333;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi Keuangan Tahun <?= $tahun ?></h2>
    <h5>Total Saldo Rp <?= number_format(end($data_result)->total_saldo, '0', ',', '.') ?></h5>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
                <th>Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data_result)): ?>
                <?php $no = 1;
                foreach ($data_result as $item): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td style="white-space: nowrap;"><?= $item->tanggal_transaksi ?></td>
                        <td><?= $item->deskripsi ?></td>
                        <td><?= $item->jenis_transaksi == 'debit' ? 'Rp' . number_format($item->jumlah, 0, ',', '.') : '-' ?></td>
                        <td><?= $item->jenis_transaksi == 'kredit' ? 'Rp' . number_format($item->jumlah, 0, ',', '.') : '-' ?></td>
                        <td><span>Rp<?= number_format($item->total_saldo, 0, ',', '.');  ?></span></td>
                        <td style="white-space: nowrap;">
                            <?php if ($item->id_pembayaran): ?>
                                Oleh Sistem
                            <?php else: ?>
                                Oleh Bendahara
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada data tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>