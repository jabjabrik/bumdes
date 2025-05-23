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
                                        <?php $params = "[`$item->id_user`,`$item->nama_user`,`$item->username`,`$item->role`]" ?>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="pb-0 px-2 btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm('edit',<?= $params ?>)">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
                                            <a href="<?= base_url("user/delete/$item->id_user"); ?>" class="btn btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                <i class="bi bi-trash-fill"></i> Hapus
                                            </a>
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
                        <h1 class="modal-title fs-5 text-capitalize" id="title_form">Form Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="modal-form" method="POST" autocomplete="off">
                        <div class="modal-body">
                            <div class="row g-3">
                                <input type="text" name="id_user" id="id_user" hidden>
                                <div class="form-group col-md-6 col-12">
                                    <label for="nama_user" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_user" id="nama_user" class="form-control" required placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required placeholder="Masukan Username">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="role" class="form-label">Role User</label>
                                    <select name="role" id="role" class="form-control text-capitalize" required>
                                        <option selected value="">-</option>
                                        <option value="admin">admin</option>
                                        <option value="bendahara">bendahara</option>
                                        <option value="kepala lapak">kepala lapak</option>
                                        <option value="kepala ruko">kepala ruko</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="password" class="form-label">Masukan Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    <div style="position: relative;">
                                        <i id="eye" hidden class="bi bi-eye" style="position: absolute; right: 10px; top: -30px; cursor: pointer;"></i>
                                        <i id="eye" class="bi bi-eye-slash" style="position: absolute; right: 10px; top: -30px; cursor: pointer;"></i>
                                    </div>
                                    <div id="text_helper" class="form-text">Biarkan Input Password Kosong, Bila Tidak Ingin Merubah Password</div>
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
            const form = modal_form.querySelector('form');
            const password = modal_form.querySelector('#password');
            const text_helper = modal_form.querySelector('#text_helper');

            const setForm = (title, data) => {
                const fields = ['id_user', 'nama_user', 'username', 'role'];
                fields.forEach((e, i) => {
                    const element = modal_form.querySelector(`#${e}`);
                    element.value = title == 'insert' ? '' : data[i];
                })

                form.setAttribute('action', `<?= base_url('user') ?>/${title}`)
                password.value = '';
                password.required = title == 'insert'
                text_helper.hidden = title == 'insert'
            }
        </script>
        <!-- End Script Modal Form -->

        <script>
            const password_eye = document.querySelector('#password')
            const [show, hidden] = document.querySelectorAll('#eye');

            hidden.addEventListener('click', () => {
                hidden.setAttribute('hidden', '')
                show.removeAttribute('hidden');
                password_eye.setAttribute('type', 'text')
            })

            show.addEventListener('click', () => {
                show.setAttribute('hidden', '')
                hidden.removeAttribute('hidden');
                password_eye.setAttribute('type', 'password')
            })
        </script>

        <!-- Script -->
        <?php $this->view('admin_view/_partials/script'); ?>
        <!-- End Script -->
    </div>
</body>

</html>