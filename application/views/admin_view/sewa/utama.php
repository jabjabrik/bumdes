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
                            <h3 class="mb-0">Daftar Data sewa Ruko / Lapak</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <table id="datatables" class="table table-striped table-bordered text-capitalize" style="white-space: nowrap; font-size: 1em;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Properti</th>
                                <th>Jenis Properti</th>
                                <th>Status</th>
                                <th>Nama Penyewa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($data_result as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item->nama_properti ?></td>
                                    <td><?= $item->jenis ?></td>
                                    <td>
                                        <?php if (is_null($item->id_penyewa)): ?>
                                            <span style="font-weight: 200;" class="badge text-bg-danger">Belum Di Sewa</span>
                                        <?php else: ?>
                                            <span style="font-weight: 200;" class="badge text-bg-success">Telah Di Sewa</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $item->nama_penyewa ? $item->nama_penyewa : '-' ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a class="pb-0 px-2 btn btn-primary me-2" href="<?= base_url("sewa?id_properti=$item->id_properti_"); ?>">
                                                <i class="bi bi-info-circle"></i> Detail
                                            </a>
                                        </div>
                                    </td>
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