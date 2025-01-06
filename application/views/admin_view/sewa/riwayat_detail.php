<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('admin_view/_partials/head'); ?>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <!-- Header -->
        <?php $this->view('admin_view/_partials/header'); ?>
        <!-- End Header -->

        <!-- Side Bar -->
        <?php $this->view('admin_view/_partials/sidebar'); ?>
        <!-- End Side Bar -->

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-3 text-capitalize">Halaman Detail Riwayat Sewa <?= $data_result->jenis ?></h3>
                        </div>
                    </div>
                    <a href="<?= base_url("sewa/riwayat/$data_result->id_properti"); ?>" class="pt-2 btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body text-capitalize">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="my-1 fw-bolder text-center">INFORMASI PROPERTI</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <img style="max-height: 300px;" class="img-fluid shadow rounded-sm mx-auto" src="<?= base_url("file/$data_result->foto"); ?>" alt="">
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6 mb-0">
                                                    <h6 class="mb-0 fw-bold">Nama Properti</h6>
                                                </div>
                                                <div class="col-6 mb-0">
                                                    <span><?= $data_result->nama_properti ?></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6 mb-0">
                                                    <h6 class="mb-0 fw-bold">Jenis Properti</h6>
                                                </div>
                                                <div class="col-6 mb-0">
                                                    <span><?= $data_result->jenis ?></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6 mb-0">
                                                    <h6 class="mb-0 fw-bold">Harga Sewa Per <?= $data_result->jenis == 'ruko' ? 'Tahun' : 'Bulan' ?></h6>
                                                </div>
                                                <div class="col-6 mb-0">
                                                    <span>Rp<?= number_format($data_result->harga, 0, ',', '.');  ?></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6 mb-0">
                                                    <h6 class="mb-0 fw-bold">Status</h6>
                                                </div>
                                                <div class="col-6 mb-0">
                                                    <span class="badge text-bg-secondary">Selesai Disewa</span>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($data_result->id_penyewa)): ?>
                            <div class="col-12">
                                <div class="card mb-3">
                                    <div class="card-body text-capitalize">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="my-1 fw-bolder text-center">INFORMASI PENYEWA</h6>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Nama Lengkap</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $data_result->nama_penyewa ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">No. Telepon</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $data_result->no_telepon ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Alamat</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $data_result->alamat ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card mb-3">
                                    <div class="card-body text-capitalize">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="my-1 fw-bolder text-center">INFORMASI SEWA</h6>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Tanggal Mulai Sewa</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $data_result->tanggal_mulai ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Tanggal Selesai Sewa</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $data_result->tanggal_selesai ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Lama Sewa</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= "$lama_sewa " . ($data_result->jenis == 'ruko' ? 'Tahun' : 'Bulan') ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Dokumen Perjanjian</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><a href="<?= base_url("file/$data_result->dokumen_perjanjian_sewa"); ?>" target="_blank">Lihat dokumen perjanjian</a></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Metode Pembayaran</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span class="text-capitalize"><?= $data_result->metode_pembayaran ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($data_result->metode_pembayaran == 'kontan'): ?>
                                <div class="col-12">
                                    <div class="card mb-3">
                                        <div class="card-body text-capitalize">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="my-1 fw-bolder text-center">INFORMASI PEMBAYARAN</h6>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Status Pembayaran</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>
                                                                <?php if (is_null($pembayaran_sewa)): ?>
                                                                    <span class="badge text-bg-warning">Pending</span>
                                                                <?php else: ?>
                                                                    <span class="badge text-bg-success">Lunas</span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Total Pembayaran</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>Rp<?= number_format($lama_sewa * $data_result->harga, 0, ',', '.') ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Tanggal Pembayaran</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span><?= is_null($pembayaran_sewa) ? '-' : $pembayaran_sewa->tanggal_pembayaran ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Bukti Pembayaran</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>
                                                                <?php if (is_null($pembayaran_sewa)): ?>
                                                                    <span>-</span>
                                                                <?php else: ?>
                                                                    <a href="<?= base_url("file/$pembayaran_sewa->bukti_pembayaran"); ?>" target="_blank">Lihat Bukti Pembayaran</a>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="card mb-3">
                                        <div class="card-body text-capitalize">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="my-1 fw-bolder text-center">PEMBAYARAN PERIODE BULANAN</h6>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Total pembayaran yang harus di lunasi dalam <?= $lama_sewa ?> tahun</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>Rp <?= number_format($lama_sewa * $data_result->harga, 0, ',', '.') ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Pembayaran yang telah dibayar </h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>Rp <?= number_format(($data_result->harga / count($pembayaran_sewa)) * hitung_jumlah_periode_lunas($pembayaran_sewa), 0, ',', '.') ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Angsuran perbulan</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>Rp <?= number_format(($data_result->harga / count($pembayaran_sewa)), 0, ',', '.') ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <table id="datatables" class="table table-striped text-center table-bordered text-capitalize" style="white-space: nowrap; font-size: 1em;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th class="no-sort">Periode</th>
                                                                <th class="no-sort">Tanggal Pembayaran</th>
                                                                <th class="no-sort">Jumlah Pembayaran</th>
                                                                <th class="no-sort">Bukti Pembayaran</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1 ?>
                                                            <?php foreach ($pembayaran_sewa as $item) : ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td>Bulan ke-<?= sprintf("%02d", $item->periode) ?></td>
                                                                    <td><?= $item->tanggal_pembayaran ?? '-' ?></td>
                                                                    <td><?= $item->nominal_pembayaran ? 'Rp ' . number_format($item->nominal_pembayaran, 0, ',', '.') : '-' ?></td>
                                                                    <td>
                                                                        <?php if (is_null($item->bukti_pembayaran)): ?>
                                                                            <span>-</span>
                                                                        <?php else: ?>
                                                                            <a href="<?= base_url("file/$item->bukti_pembayaran"); ?>" target="_blank">Lihat Bukti</a>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>

        <!-- Script -->
        <?php $this->view('admin_view/_partials/script'); ?>
        <!-- End Script -->
    </div>
</body>

</html>