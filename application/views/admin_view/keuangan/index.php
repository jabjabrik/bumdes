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
                            <h3 class="mb-0"><i class="bi bi-cash-stack me-1"></i> Laporan Keuangan BUMDes Tahun 2023 - 2025</h3>

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
                                <button type="button" disabled class="btn btn-secondary">Menampilkan Data Tahun 2023 - 2025</button>
                                <!-- <button type="button" disabled class="btn btn-secondary">Tahun 2024</button> -->
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Tahun
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li> <a class="dropdown-item" href="#">2023</a> </li>
                                        <li> <a class="dropdown-item" href="#">2024</a> </li>
                                        <li> <a class="dropdown-item" href="#">2025</a> </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li> <a class="dropdown-item" href="#">Tahun 2023 - 2025</a> </li>
                                        <!-- <li> <a class="dropdown-item" href="#">Semua Data</a> </li> -->
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
                                                            <h6 class="fw-bold mt-2">2023 - 2025</h6>
                                                            <!-- <input type="text" class="form-control" value="tahun 2023 - 2025"> -->
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
                                                            <a href="<?= base_url("sewa/histori/$id_properti"); ?>" class="pt-2 btn btn-sm btn-success">
                                                                <i class="bi bi-file-text me-1"></i> Generate Laporan
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
                                                <?php if ($item->id_sewa): ?>
                                                    Diproses oleh sistem
                                                <?php else: ?>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm('edit')">
                                                            <i class="bi bi-pencil-square"></i> Edit
                                                        </button>
                                                        <a href="<?= base_url("penyewa/nonactive/"); ?>" class="btn btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
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

        <!-- Script -->
        <?php $this->view('admin_view/_partials/script'); ?>
        <!-- End Script -->
    </div>
</body>

</html>