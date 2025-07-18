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
                            <h3 class="mb-3 text-capitalize">Halaman Kelola Sewa <?= $data_result->jenis ?></h3>
                        </div>
                    </div>
                    <a href="<?= base_url("sewa/riwayat/$id_properti"); ?>" class="pt-2 btn btn-sm btn-secondary">
                        <i class="bi bi-clock-history"></i> Lihat Histori
                    </a>
                    <?php if ($user_role == 'admin'): ?>
                        <?php if (!isset($data_result->id_penyewa)): ?>
                            <button type="button" class="pt-2 btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal_form_penyewa">
                                <i class="bi bi-plus-circle"></i> Sewakan Properti
                            </button>
                        <?php else: ?>
                            <a href="<?= base_url("sewa/sewa_delete/$data_result->id_sewa"); ?>" class="pt-2 btn btn-sm btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                <i class="bi bi-trash"></i> Pembatalan Sewa Properti
                            </a>
                            <a href="<?= base_url("sewa/sewa_selesai/$data_result->id_sewa"); ?>" class="pt-2 btn btn-sm btn-outline-primary" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                <i class="bi bi-check-circle"></i> Selesaikan Sewa Properti
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
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
                                                    <h6 class="mb-0 fw-bold">Ukuran Properti</h6>
                                                </div>
                                                <div class="col-6 mb-0">
                                                    <span><?= $data_result->ukuran ?></span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6 mb-0">
                                                    <h6 class="mb-0 fw-bold">Alamat</h6>
                                                </div>
                                                <div class="col-6 mb-0">
                                                    <span><?= $data_result->alamat_properti ?></span>
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
                                                    <?php if (!isset($data_result->id_penyewa)): ?>
                                                        <span class="badge text-bg-danger">Belum Di Sewa</span>
                                                    <?php else: ?>
                                                        <span class="badge text-bg-success">Telah Di Sewa</span>
                                                    <?php endif; ?>
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
                                                        <h6 class="mb-0 fw-bold">NIK</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $data_result->nik ?></span>
                                                    </div>
                                                </div>
                                                <hr>
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
                                                        <h6 class="mb-0 fw-bold">Jenis Usaha</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $data_result->jenis_usaha ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Tanggal Mulai Sewa</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= date('d-m-Y', strtotime($data_result->tanggal_mulai))  ?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Tanggal Selesai Sewa</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= date('d-m-Y', strtotime($data_result->tanggal_selesai)) ?></span>
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
                                                        <h6 class="mb-0 fw-bold">Sisa Waktu Sewa</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $data_result->tanggal_selesai < date('Y-m-d') ? '-' : $sisa_waktu_sewa  ?></span>
                                                    </div>
                                                </div>
                                                <?php if ($user_role == 'admin'): ?>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Dokumen Perjanjian</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span><a href="<?= base_url("file/$data_result->dokumen_perjanjian_sewa"); ?>" target="_blank">Lihat dokumen perjanjian</a></span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 mb-0">
                                                        <h6 class="mb-0 fw-bold">Metode Pembayaran</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span class="text-capitalize badge text-bg-primary"><?= $data_result->metode_pembayaran ?></span>
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
                                                    <?php if ($user_role == 'kepala ruko' || $user_role == 'kepala lapak'): ?>
                                                        <?php if ($pembayaran_sewa->status_pembayaran == 'lunas'): ?>
                                                            <a href="<?= base_url("sewa/pembayaran_delete/$pembayaran_sewa->id_pembayaran"); ?>" class="pt-2 btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                                <i class="bi bi-trash me-1"></i> Hapus Pembayaran
                                                            </a>
                                                        <?php else: ?>
                                                            <button type="button" class="pt-2 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form_pembayaran" onclick="setFormPembayaran('<?= $pembayaran_sewa->id_pembayaran ?>')">
                                                                <i class="bi bi-plus-circle me-1"></i> Input Pembayaran
                                                            </button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
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
                                                                <?php if ($pembayaran_sewa->status_pembayaran == 'lunas'): ?>
                                                                    <span class="badge text-bg-success">Lunas</span>
                                                                <?php else: ?>
                                                                    <span class="badge text-bg-warning">Pending</span>
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
                                                            <span><?= $pembayaran_sewa->status_pembayaran == 'lunas' ?  $pembayaran_sewa->tanggal_pembayaran : '-'  ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Pembayaran Via</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span><?= $pembayaran_sewa->pembayaran_via ?? '-'  ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Bukti Pembayaran</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>
                                                                <?php if ($pembayaran_sewa->status_pembayaran == 'lunas'): ?>
                                                                    <a href="<?= base_url("file/$pembayaran_sewa->bukti_pembayaran"); ?>" target="_blank">Lihat Bukti Pembayaran</a>
                                                                <?php else: ?>
                                                                    <span>-</span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Kwitansi Pembayaran</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>
                                                                <?php if ($pembayaran_sewa->status_pembayaran == 'lunas'): ?>
                                                                    <a href="<?= base_url("file/$pembayaran_sewa->kwitansi_file"); ?>" target="_blank">Lihat Kwitansi Pembayaran</a>
                                                                <?php else: ?>
                                                                    <span>-</span>
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
                                                            <h6 class="mb-0 fw-bold">Total pembayaran yang harus di lunasi dalam <?= "$lama_sewa " . ($data_result->jenis == 'ruko' ? 'Tahun' : 'Bulan') ?></h6>
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
                                                            <span>Rp <?= number_format(($data_result->harga * $lama_sewa / count($pembayaran_sewa)) * hitung_jumlah_periode_lunas($pembayaran_sewa), 0, ',', '.') ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Angsuran perbulan</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>Rp <?= number_format($angsuran_sebulan, 0, ',', '.') ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Jumlah Angsuran</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span><?= count($pembayaran_sewa) ?> Bulan</span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="mb-0 fw-bold">Status</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <span>
                                                                <?php if (cek_status_lunas($pembayaran_sewa)): ?>
                                                                    <span class="badge text-bg-success">Lunas</span>
                                                                <?php else: ?>
                                                                    <span class="badge text-bg-warning">Berlangsung</span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <table id="datatables" class="table table-striped text-center table-bordered text-capitalize" style="white-space: nowrap; font-size: .9em;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th class="no-sort">Periode</th>
                                                                <th class="no-sort">Jatuh Tempo</th>
                                                                <th class="no-sort">Tanggal Bayar</th>
                                                                <th class="no-sort">Jumlah Bayar</th>
                                                                <th class="no-sort">Denda</th>
                                                                <th class="no-sort">Pembayaran Via</th>
                                                                <th class="no-sort">Bukti</th>
                                                                <th class="no-sort">Kwitansi</th>
                                                                <?php if ($user_role == 'kepala ruko' || $user_role == 'kepala lapak'): ?>
                                                                    <th class="no-sort">Aksi</th>
                                                                <?php endif; ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1 ?>
                                                            <?php foreach ($pembayaran_sewa as $item) : ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td>Bulan ke-<?= sprintf("%02d", $item->periode) ?></td>
                                                                    <td><?= date('d-m-Y', strtotime($item->jatuh_tempo)) ?></td>
                                                                    <td><?= $item->tanggal_pembayaran ? date('d-m-Y', strtotime($item->tanggal_pembayaran)) : '-' ?></td>
                                                                    <td><?= $item->nominal_pembayaran ? 'Rp ' . number_format($item->nominal_pembayaran, 0, ',', '.') : '-' ?></td>
                                                                    <td><?= is_null($item->denda) ? '-' : 'Rp ' . number_format($item->denda, 0, ',', '.') ?></td>
                                                                    <td><?= $item->pembayaran_via ?? '-' ?></td>
                                                                    <td>
                                                                        <?php if (is_null($item->bukti_pembayaran)): ?>
                                                                            <span>-</span>
                                                                        <?php else: ?>
                                                                            <a href="<?= base_url("file/$item->bukti_pembayaran"); ?>" target="_blank">Lihat Bukti</a>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if (is_null($item->kwitansi_file)): ?>
                                                                            <span>-</span>
                                                                        <?php else: ?>
                                                                            <a href="<?= base_url("file/$item->kwitansi_file"); ?>" target="_blank">Unduh</a>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <?php if ($user_role == 'kepala ruko' || $user_role == 'kepala lapak'): ?>
                                                                        <td>
                                                                            <?php $params = "" ?>
                                                                            <div class="btn-group btn-group-sm" role="group">
                                                                                <?php if (is_null($item->tanggal_pembayaran)): ?>
                                                                                    <button type="button" class="pb-0 px-2 btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal_form_pembayaran" onclick="setFormPembayaran('<?= $item->id_pembayaran ?>','<?= $item->jatuh_tempo ?>')">
                                                                                        <i class=" bi bi-plus-circle"></i>
                                                                                    </button>
                                                                                <?php else: ?>
                                                                                    <a href="<?= base_url("sewa/pembayaran_delete/$item->id_pembayaran"); ?>" class="pb-0 px-2 btn btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                                                        <i class="bi bi-trash"></i>
                                                                                    </a>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </td>
                                                                    <?php endif; ?>
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

        <!-- Modal Form Penyewa -->
        <div class="modal fade" id="modal_form_penyewa" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-capitalize" id="title_form">Form Sewa Properti</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="modal-form" method="POST" autocomplete="off" action="<?= base_url('sewa/sewa_insert'); ?>">
                        <div class="modal-body">
                            <div class="row g-3">
                                <input name="id_properti" hidden value="<?= $id_properti ?>">
                                <input name="jenis" hidden value="<?= $data_result->jenis ?>">
                                <div class="form-group col-md-6">
                                    <label for="id_penyewa" class="form-label">Nama Penyewa</label>
                                    <select name="id_penyewa" id="id_penyewa" class="form-control" required>
                                        <option value="">-</option>
                                        <?php foreach ($penyewa as $item): ?>
                                            <option value="<?= $item->id_penyewa ?>"><?= $item->nama_penyewa ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                                        <option value="">-</option>
                                        <option value="periode bulanan">Periode Bulanan</option>
                                        <option value="kontan">Kontan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai Sewa</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lama_sewa" class="form-label">Lama Sewa (<?= $data_result->jenis == 'ruko' ? 'Tahun' : 'Bulan' ?>)</label>
                                    <input type="number" name="lama_sewa" id="lama_sewa" class="form-control" required min="1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                    <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control" required placeholder="Contoh: pedagang sayur">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Form Penyewa -->

        <!-- Modal Form Pembayaran -->
        <?php if (isset($data_result->id_penyewa)): ?>
            <div class="modal fade" id="modal_form_pembayaran" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-capitalize" id="title_form">Form Pembayaran Sewa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="modal-form" method="POST" autocomplete="off" enctype="multipart/form-data" action="<?= base_url('sewa/pembayaran_insert'); ?>">
                            <div class="modal-body">
                                <div class="row g-3">
                                    <input name="id_pembayaran" id="id_pembayaran" hidden>
                                    <input name="id_properti" id="id_properti" hidden value="<?= $data_result->id_properti ?>">
                                    <input name="id_sewa" id="id_sewa" hidden value="<?= $data_result->id_sewa ?>">
                                    <input name="metode_pembayaran" id="metode_pembayaran" hidden value="<?= $data_result->metode_pembayaran ?>">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran</label>
                                        <?php $nominal = $data_result->metode_pembayaran == 'kontan' ? $data_result->harga * $lama_sewa : $angsuran_sebulan ?>
                                        <input name="nominal_pembayaran" hidden value="<?= $nominal; ?>">
                                        <input disabled type="text" id="nominal_pembayaran" class="form-control" value="Rp<?= number_format($nominal, 0, ',', '.') ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                                        <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control" required>
                                    </div>
                                    <?php if ($data_result->metode_pembayaran == 'periode bulanan'): ?>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="denda" class="form-label">Denda</label>
                                            <input name="denda" id="denda" hidden>
                                            <input type="text" id="denda_show" class="form-control" disabled value="-">
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="pembayaran_via" class="form-label">Pembayaran Via</label>
                                        <select name="pembayaran_via" id="pembayaran_via" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="transfer">Transfer</option>
                                            <option value="cash">Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                                        <input class="form-control" type="file" id="bukti_pembayaran" name="bukti_pembayaran" required accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- End Modal Form Pembayaran -->

        <script>
            const tanggal_pembayaran = document.querySelector('#tanggal_pembayaran');

            const setFormPembayaran = (id_pembayaran, jatuh_tempo) => {
                document.querySelector('#id_pembayaran').value = id_pembayaran;
                tanggal_pembayaran.setAttribute('data-jatuh_tempo', jatuh_tempo)

            }
            <?php if (isset($data_result->metode_pembayaran) && $data_result->metode_pembayaran == 'periode bulanan'): ?>
                tanggal_pembayaran.addEventListener('change', (e) => {
                    const jatuh_tempo = new Date(e.target.getAttribute('data-jatuh_tempo'));
                    const tanggal_pembayaran = new Date(e.target.value);

                    const denda = document.querySelector('#denda');
                    const denda_show = document.querySelector('#denda_show');
                    denda.value = tanggal_pembayaran > jatuh_tempo ? '50000' : '0'
                    denda_show.value = tanggal_pembayaran > jatuh_tempo ? 'Rp 50.000' : 'Rp 0'
                })
            <?php endif; ?>
        </script>

        <!-- Script -->
        <?php $this->view('admin_view/_partials/script'); ?>
        <!-- End Script -->
    </div>
</body>

</html>