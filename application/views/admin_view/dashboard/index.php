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
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <?php if ($user_role != 'kepala lapak'): ?>
                            <div class="col-lg-3 col-6">
                                <div class="small-box text-bg-primary">
                                    <div class="inner">
                                        <h3><?= $total_properti_ruko ?></h3>
                                        <p>Total Ruko</p>
                                    </div>
                                    <i class="bi bi-buildings small-box-icon"></i>
                                    <!-- <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                        More info <i class="bi bi-link-45deg"></i>
                                    </a> -->
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($user_role != 'kepala ruko'): ?>
                            <div class="col-lg-3 col-6">
                                <div class="small-box text-bg-success">
                                    <div class="inner">
                                        <h3><?= $total_properti_lapak ?></h3>
                                        <p>Total Lapak</p>
                                    </div>
                                    <i class="bi bi-building small-box-icon"></i>
                                    <!-- <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    More info <i class="bi bi-link-45deg"></i>
                                </a> -->
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($user_role != 'kepala lapak'): ?>
                            <div class="col-lg-3 col-6">
                                <div class="small-box text-bg-warning">
                                    <div class="inner">
                                        <h3><?= $total_penyewa_ruko ?></h3>
                                        <p>Total Penyewa Ruko</p>
                                    </div>
                                    <i class="bi bi-buildings small-box-icon"></i>
                                    <!-- <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    More info <i class="bi bi-link-45deg"></i>
                                </a> -->
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($user_role != 'kepala ruko'): ?>
                            <div class="col-lg-3 col-6">
                                <div class="small-box text-bg-danger">
                                    <div class="inner">
                                        <h3><?= $total_penyewa_lapak ?></h3>
                                        <p>Total Penyewa Lapak</p>
                                    </div>
                                    <i class="bi bi-building small-box-icon"></i>
                                    <!-- <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    More info <i class="bi bi-link-45deg"></i>
                                </a> -->
                                </div>
                            </div>
                        <?php endif; ?>
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