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
                            <h3 class="mb-0">Kelola Data Penyewa</h3>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm('insert')">
                                <i class="bi bi-plus-lg"></i> Tambah
                            </button>
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
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th class="no-sort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($data_result as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item->nama_penyewa ?></td>
                                    <td><?= $item->no_telepon ?></td>
                                    <td><?= $item->alamat ?></td>
                                    <td>
                                        <?php $params = "[`$item->id_penyewa`, `$item->nama_penyewa`, `$item->no_telepon`, `$item->alamat`]" ?>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm('edit', <?= $params ?>)">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
                                            <a href="<?= base_url("penyewa/nonactive/$item->id_penyewa"); ?>" class="btn btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                <i class="bi bi-trash-fill"></i> Hapus
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

        <!-- Modal Form -->
        <div class="modal fade" id="modal_form" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-capitalize" id="title_form">Form Data Penyewa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="modal-form" method="POST" autocomplete="off">
                        <div class="modal-body">
                            <div class="row g-3">
                                <input type="text" name="id_penyewa" id="id_penyewa" hidden>
                                <div class="form-group col-md-6 col-12">
                                    <label for="nama_penyewa" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_penyewa" id="nama_penyewa" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="no_telepon" class="form-label">No Telepon</label>
                                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" required>
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
        <!-- End Modal Form -->

        <!-- Script Modal Form -->
        <script>
            const modal_form = document.querySelector('#modal_form');
            const setForm = (title, data) => {
                modal_form.querySelector('form').setAttribute('action', `<?= base_url('penyewa/') ?>${title}`)
                const fields = ['id_penyewa', 'nama_penyewa', 'no_telepon', 'alamat'];
                fields.forEach((e, i) => {
                    const element = modal_form.querySelector(`#${e}`);
                    element.value = title == 'insert' ? '' : data[i];
                })
            }
        </script>
        <!-- End Script Modal Form -->

        <!-- Script -->
        <?php $this->view('admin_view/_partials/script'); ?>
        <!-- End Script -->
    </div>
</body>

</html>