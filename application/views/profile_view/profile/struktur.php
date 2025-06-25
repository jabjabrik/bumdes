<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('profile_view/_partials/head'); ?>
</head>

<body class="about-page">
    <!-- Header -->
    <?php $this->view('profile_view/_partials/header'); ?>
    <!-- End Header -->

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" style="background-image: url(<?= base_url('assets/profile/img/background/profile.jpg'); ?>);">
            <div class="container position-relative">
                <h1>BUMDes Bantaran</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="<?= base_url(); ?>">Beranda</a></li>
                        <li class="current">Struktur Organiasi</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Team Section -->
        <section class="team section">

            <!-- Section Title -->
            <div class="container section-title pb-3 mb-5" data-aos="fade-up">
                <h2>Struktur Organisasi</h2>
                <p>Struktur Organisasi BUMDes Bantaran, Kecamatan Bantaran, Kabupaten Probolinggo</p>
            </div>
            <div class="container">
                <div class="row gy-5 mb-5 justify-content-center">
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img rounded shadow">
                            <img src="<?= base_url("file/" . $pengurus[0]->foto); ?>" style="background-position: center; background-size: cover;" class="img-fluid" alt="">
                        </div>
                        <div class="member-info text-center">
                            <h4><?= $pengurus[0]->nama ?></h4>
                            <span><?= $pengurus[0]->jabatan ?></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img rounded shadow">
                            <img src="<?= base_url("file/" . $pengurus[1]->foto); ?>" style="background-position: center; background-size: cover;" class="img-fluid" alt="">
                        </div>
                        <div class="member-info text-center">
                            <h4><?= $pengurus[1]->nama ?></h4>
                            <span><?= $pengurus[1]->jabatan ?></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img rounded shadow">
                            <img src="<?= base_url("file/" . $pengurus[2]->foto); ?>" style="background-position: center; background-size: cover;" class="img-fluid" alt="">
                        </div>
                        <div class="member-info text-center">
                            <h4><?= $pengurus[2]->nama ?></h4>
                            <span><?= $pengurus[2]->jabatan ?></span>
                        </div>
                    </div>
                </div>
                <div class="row gy-5 mb-5 justify-content-center">
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img rounded shadow">
                            <img src="<?= base_url("file/" . $pengurus[3]->foto); ?>" style="background-position: center; background-size: cover;" class="img-fluid" alt="">
                        </div>
                        <div class="member-info text-center">
                            <h4><?= $pengurus[3]->nama ?></h4>
                            <span><?= $pengurus[3]->jabatan ?></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img rounded shadow">
                            <img src="<?= base_url("file/" . $pengurus[4]->foto); ?>" style="background-position: center; background-size: cover;" class="img-fluid" alt="">
                        </div>
                        <div class="member-info text-center">
                            <h4><?= $pengurus[4]->nama ?></h4>
                            <span><?= $pengurus[4]->jabatan ?></span>
                        </div>
                    </div>
                </div>
                <div class="row gy-5 justify-content-center">
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img rounded shadow">
                            <img src="<?= base_url("file/" . $pengurus[5]->foto); ?>" style="background-position: center; background-size: cover;" class="img-fluid" alt="">
                        </div>
                        <div class="member-info text-center">
                            <h4><?= $pengurus[5]->nama ?></h4>
                            <span><?= $pengurus[5]->jabatan ?></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img rounded shadow">
                            <img src="<?= base_url("file/" . $pengurus[6]->foto); ?>" style="background-position: center; background-size: cover;" class="img-fluid" alt="">
                        </div>
                        <div class="member-info text-center">
                            <h4><?= $pengurus[6]->nama ?></h4>
                            <span><?= $pengurus[6]->jabatan ?></span>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php $this->view('profile_view/_partials/footer'); ?>
    <!-- End Footer -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Script -->
    <?php $this->view('profile_view/_partials/script'); ?>
    <!-- End Script -->

</body>

</html>