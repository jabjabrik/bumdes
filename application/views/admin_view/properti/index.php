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
                            <h3 class="mb-0">Kelola Data Properti</h3>
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
                                <th>Jenis</th>
                                <th>Foto</th>
                                <th>Harga</th>
                                <th class="no-sort">Aksi</th>
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
                                        <a href="<?= base_url("file/$item->foto"); ?>" target="_blank">
                                            <img src="<?= base_url("file/$item->foto"); ?>" alt="foto_staff" class="img-fluid" width="100">
                                        </a>
                                    </td>
                                    <td>Rp.<?= number_format($item->harga, 0, ',', '.')  ?></td>
                                    <td>
                                        <?php $params = "[`$item->id_properti`, `$item->nama_properti`, `$item->jenis`, `$item->harga`]" ?>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm('edit', <?= $params ?>)">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
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
                        <h1 class="modal-title fs-5 text-capitalize" id="title_form">Form Data Properti</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="modal-form" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row g-3">
                                <input type="text" name="id_properti" id="id_properti" hidden>
                                <div class="form-group col-md-6 col-12">
                                    <label for="nama_properti" class="form-label">Nama Properti</label>
                                    <input type="text" name="nama_properti" id="nama_properti" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="jenis" class="form-label">Jenis Properti</label>
                                    <select name="jenis" id="jenis" class="form-control" required>
                                        <option value="">-</option>
                                        <option value="ruko">Ruko</option>
                                        <option value="lapak">lapak</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="harga" class="form-label">Harga Sewa</label>
                                    <input type="number" name="harga" id="harga" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="foto" class="form-label">Unggah Foto</label>
                                    <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
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
                modal_form.querySelector('form').setAttribute('action', `<?= base_url('properti/') ?>${title}`)
                const fields = ['id_properti', 'nama_properti', 'jenis', 'harga'];
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