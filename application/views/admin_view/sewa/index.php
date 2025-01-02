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
                    <a href="<?= base_url("sewa/histori/$id_properti"); ?>" class="pt-2 btn btn-sm btn-secondary">
                        <i class="bi bi-clock-history"></i> Lihat Histori
                    </a>
                    <?php if (is_null($data_result->id_penyewa)): ?>
                        <button type="button" class="pt-2 btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal_form_penyewa">
                            <i class="bi bi-plus-circle"></i> Sewakan Properti
                        </button>
                    <?php else: ?>
                        <a href="<?= base_url("sewa/sewa_delete/$data_result->id_sewa"); ?>" class="pt-2 btn btn-sm btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                            <i class="bi bi-trash"></i> Pembatalan Sewa Properti
                        </a>
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
                                                    <?php if (is_null($data_result->id_penyewa)): ?>
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
                        <?php if (!is_null($data_result->id_penyewa)): ?>
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
                                                        <h6 class="mb-0 fw-bold">Sisa Waktu Sewa</h6>
                                                    </div>
                                                    <div class="col-6 mb-0">
                                                        <span><?= $sisa_waktu_sewa ?></span>
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
                                                    <?php if ($user_role != 'kepala ruko' && $user_role != 'kepala lapak'): ?>
                                                        <?php if (is_null($pembayaran_sewa)): ?>
                                                            <button type="button" class="pt-2 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form_pembayaran">
                                                                <i class="bi bi-plus-circle me-1"></i> Input Pembayaran
                                                            </button>
                                                        <?php else: ?>
                                                            <a href="<?= base_url("sewa/pembayaran_delete/$data_result->id_sewa"); ?>" class="pt-2 btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                                <i class="bi bi-trash me-1"></i> Hapus Pembayaran
                                                            </a>
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
                                                                <th class="no-sort">Aksi</th>
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
                                                                    <td>
                                                                        <?php $params = "" ?>
                                                                        <div class="btn-group btn-group-sm" role="group">
                                                                            <?php if (is_null($item->tanggal_pembayaran)): ?>
                                                                                <button type="button" class="pb-0 px-2 btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal_form_pembayaran"">
                                                                                    <i class=" bi bi-plus-circle"></i>
                                                                                </button>
                                                                            <?php else: ?>
                                                                                <button type="button" class="pb-0 px-2 btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm(<?= $params ?>)">
                                                                                    <i class="bi bi-trash"></i>
                                                                                </button>
                                                                                <button type="button" class="pb-0 px-2 btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm(<?= $params ?>)">
                                                                                    <i class="bi bi-pencil-square"></i>
                                                                                </button>
                                                                            <?php endif; ?>
                                                                        </div>
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

        <!-- Modal Form Penyewa -->
        <div class="modal fade" id="modal_form_penyewa" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-capitalize" id="title_form">Form Sewa Properti</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="modal-form" method="POST" autocomplete="off" action="<?= base_url('sewa/sewa_insert'); ?>" enctype="multipart/form-data">
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
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai Sewa</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lama_sewa" class="form-label">Lama Sewa (<?= $data_result->jenis == 'ruko' ? 'Tahun' : 'Bulan' ?>)</label>
                                    <input type="number" name="lama_sewa" id="lama_sewa" class="form-control" required min="1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dokumen_perjanjian_sewa" class="form-label">Dokumen Perjanjian Sewa</label>
                                    <input type="file" name="dokumen_perjanjian_sewa" id="dokumen_perjanjian_sewa" class="form-control" accept="application/pdf" required>
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
                                <input type="text" name="id_sewa" hidden value="<?= $data_result->id_sewa ?>">
                                <input type="text" name="estimasi_harga" hidden value="<?= $lama_sewa * $data_result->harga ?>">
                                <div class="form-group col-md-6 col-12">
                                    <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran</label>
                                    <input disabled type="text" id="nominal_pembayaran" class="form-control" value="<?= number_format($lama_sewa * $data_result->harga, 0, ',', '.') ?>">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                                    <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control" required>
                                </div>
                                <div class="form-group col-12">
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
        <!-- End Modal Form Pembayaran -->

        <script>
            <?php if ($this->session->flashdata('alert')): ?>
                alert('<?= $this->session->flashdata('alert') ?>');
            <?php endif; ?>
        </script>

        <!-- Script -->
        <?php $this->view('admin_view/_partials/script'); ?>
        <!-- End Script -->
    </div>
</body>

</html>