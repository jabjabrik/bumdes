<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('admin_view/_partials/head'); ?>
</head>

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="<?= base_url('auth'); ?>" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"> <b>BUMDes</b> Admin</h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login Untuk Masuk Kedalam Menu Admin</p>
                <form action="<?= base_url('auth'); ?>" method="post" autocomplete="off">
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="username" name="username" type="text" placeholder="" class="form-control" value="<?= set_value('username'); ?>">
                            <label for="username">Username</label>
                            <?= form_error('username', '<small class="text-danger pl-3 mt-1 d-block" style="text-align: left;">', '</small>'); ?>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="password" name="password" type="password" placeholder="" class="form-control" value="<?= set_value('password'); ?>">
                            <label for="password">Password</label>
                            <?= form_error('password', '<small class="text-danger pl-3 mt-1 d-block" style="text-align: left;">', '</small>'); ?>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary mt-2">Login</button>
                        </div>
                        <div class="col-3">
                            <a href="<?= base_url(); ?>" class="btn btn-secondary mt-2">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script -->
    <?php $this->view('admin_view/_partials/script'); ?>
    <!-- End Script -->
</body>

</html>