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
                            <h3 class="mb-3">Daftar Data Histori sewa Properti</h3>
                        </div>
                    </div>
                    <a href="<?= base_url("sewa?id_properti=$id_properti"); ?>" class="pt-2 btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <table id="datatables" class="table table-striped table-bordered text-capitalize" style="white-space: nowrap; font-size: 1em;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status Sewa</th>
                                <th>Nama Properti</th>
                                <th>Jenis Properti</th>
                                <th>Nama Penyewa</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Tanggal Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($data_result as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>

                                    <td>
                                        <?php if ($item->status_sewa == 'selesai'): ?>
                                            <span style="font-weight: 200;" class="badge text-bg-secondary"><?= $item->status_sewa ?></span>
                                        <?php else: ?>
                                            <span style="font-weight: 200;" class="badge text-bg-success"><?= $item->status_sewa ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $item->nama_properti ?></td>
                                    <td><?= $item->jenis ?></td>
                                    <td><?= $item->nama_penyewa ?></td>
                                    <td><?= $item->tanggal_mulai ?></td>
                                    <td><?= $item->tanggal_selesai ?></td>
                                    <td><?= $item->tanggal_pembayaran ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <!-- Script -->
        <?php $this->view('admin_view/_partials/script'); ?>
        <!-- End Script -->
    </div>
</body>

</html>