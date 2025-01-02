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
                            <h3 class="mb-0">Kelola Data User</h3>
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
                                <th>Username</th>
                                <th>Role</th>
                                <th class="no-sort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($data_result as $item) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $item->nama_user ?></td>
                                    <td class="text-lowercase"><?= $item->username ?></td>
                                    <td><?= $item->role ?></td>
                                    <td>
                                        <?php $params = "[`$item->id_user`, `$item->nama_user`, `$item->username`]" ?>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="pb-0 px-2 btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm(<?= $params ?>)">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++ ?>
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
                        <h1 class="modal-title fs-5 text-capitalize" id="title_form">Edit Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="modal-form" method="POST" autocomplete="off" action="<?= base_url('user/edit') ?>">
                        <div class="modal-body">
                            <div class="row g-3">
                                <input type="text" name="id_user" id="id_user" hidden>
                                <div class="form-group col-md-6 col-12">
                                    <label for="nama_user" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_user" id="nama_user" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                    <div class="form-text">Panjang Username Minimal 8 Karakter</div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="password" class="form-label">Masukan Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    <div style="position: relative;">
                                        <i id="eye" hidden class="bi bi-eye" style="position: absolute; right: 10px; top: -30px; cursor: pointer;"></i>
                                        <i id="eye" class="bi bi-eye-slash" style="position: absolute; right: 10px; top: -30px; cursor: pointer;"></i>
                                    </div>
                                    <div class="form-text">Biarkan Input Password Kosong, Bila Tidak Ingin Merubah Password</div>
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
            const setForm = (data) => {
                const fields = ['id_user', 'nama_user', 'username'];
                fields.forEach((e, i) => {
                    const element = modal_form.querySelector(`#${e}`);
                    element.value = data[i];
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