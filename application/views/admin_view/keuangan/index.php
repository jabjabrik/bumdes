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
                        <div class="col-12">
                            <h3 class="mb-0"><i class="bi bi-cash-stack me-1"></i> Laporan Keuangan BUMDes Tahun <?= $tahun ?></h3>

                            <!-- <h3 class="mb-0">Data Keuangan BUMDes Tahun 2024</h3> -->
                            <!-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm('insert')">
                                <i class="bi bi-plus-lg"></i> Tambah
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row gy-2">
                        <div class="col-12">
                            <div class="btn-group mb-2" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" disabled class="btn btn-secondary">Menampilkan Data Tahun <?= $tahun ?></button>
                                <!-- <button type="button" disabled class="btn btn-secondary">Tahun 2024</button> -->
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Tahun
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($tahun_pembayaran as $item): ?>
                                            <li>
                                                <a class="dropdown-item" href="<?= base_url("keuangan/laporan/$item"); ?>"><?= $item; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-3">
                                        <div class="card-body text-capitalize">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="my-1 fw-bolder text-center">INFORMASI KEUANGAN</h6>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="fw-bold mt-2">TOTAL SALDO</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="fw-bold mt-2">Rp <?= number_format($total_saldo, 0, ',', '.') ?></h6>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 ">
                                                            <h6 class="fw-bold mt-2">DEBIT</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="fw-bold mt-2">Rp <?= number_format($transaksi_kas->debit, 0, ',', '.') ?></h6>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class=" fw-bold mt-2">KREDIT</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="fw-bold mt-2">Rp <?= number_format($transaksi_kas->kredit, 0, ',', '.') ?></h6>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card mb-3">
                                        <div class="card-body text-capitalize">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="my-1 fw-bolder text-center">LAPORAN KEUANGAN</h6>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="fw-bold mt-2">TAHUN</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <h6 class="fw-bold mt-2"><?= $tahun ?></h6>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <h6 class="fw-bold mt-2">Menampilkan</h6>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <select class="form-select form-select-sm">
                                                                <option value="1" selected>10</option>
                                                                <option value="2">50</option>
                                                                <option value="3">100</option>
                                                                <option value="3">200</option>
                                                                <option value="3">Semua</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6 mb-0">
                                                            <a href="<?= base_url("keuangan/report/$tahun"); ?>" target="_blank" class="pt-2 btn btn-sm btn-success">
                                                                <i class="bi bi-file-text me-1"></i> Buat Laporan
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="mb-3 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form">
                                <i class="bi bi-plus-lg"></i> Input Keuangan
                            </button>
                            <table id="datatables" class="table table-striped table-bordered text-capitalize" style="font-size: .9em;">
                                <thead>
                                    <tr>
                                        <th class="no-sort">No</th>
                                        <th class="no-sort">Tanggal</th>
                                        <th class="no-sort">Deskripsi</th>
                                        <th class="no-sort">Debit</th>
                                        <th class="no-sort">Kredit</th>
                                        <th class="no-sort">Saldo</th>
                                        <th class="no-sort">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($data_result as $item) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td style="white-space: nowrap;"><?= $item->tanggal_transaksi ?></td>
                                            <td><?= $item->deskripsi ?></td>
                                            <td><?= $item->jenis_transaksi == 'debit' ? 'Rp' . number_format($item->jumlah, 0, ',', '.') : '-' ?></td>
                                            <td><?= $item->jenis_transaksi == 'kredit' ? 'Rp' . number_format($item->jumlah, 0, ',', '.') : '-' ?></td>
                                            <td><span>Rp<?= number_format($item->total_saldo, 0, ',', '.');  ?></span></td>
                                            <td style="white-space: nowrap;">
                                                <?php if ($item->id_pembayaran): ?>
                                                    Diproses oleh sistem
                                                <?php else: ?>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <!-- <button type="button" class="btn btn-success me-1">
                                                            <i class="bi bi-pencil-square"></i> Edit
                                                        </button> -->
                                                        <a href="<?= base_url("keuangan/keuangan_delete/$item->id_transaksi_keuangan"); ?>" class="btn btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                            <i class="bi bi-trash-fill"></i> Hapus
                                                        </a>
                                                    </div>
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
        </main>

        <div class="modal fade" id="modal_form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-capitalize" id="title_form">Form Input Keuangan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="modal-form" method="POST" autocomplete="off" action="<?= base_url('keuangan/keuangan_insert'); ?>">
                        <div class="modal-body">
                            <div class="row g-3">
                                <input name="tahun" hidden value="<?= $tahun ?>">
                                <div class="form-group col-md-6">
                                    <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                                    <select name="jenis_transaksi" id="jenis_transaksi" class="form-control" required>
                                        <option value="">-</option>
                                        <option value="debit">Debit</option>
                                        <option value="kredit">Kredit</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
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

        <!-- Script -->
        <?php $this->view('admin_view/_partials/script'); ?>
        <!-- End Script -->
    </div>
</body>

</html>