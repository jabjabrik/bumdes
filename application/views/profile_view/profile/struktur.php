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
                <div class="row gy-5">
                    <?php foreach ($perangkat_desa as $item): ?>
                        <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img rounded shadow">
                                <img src="<?= base_url("assets/profile/img/perangkat_desa/$item->foto"); ?>" style="background-position: center; background-size: cover;" class="img-fluid" alt="">
                            </div>
                            <div class="member-info text-center">
                                <h4><?= $item->nama ?></h4>
                                <span><?= $item->jabatan ?></span>
                            </div>
                        </div>
                    <?php endforeach ?>
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