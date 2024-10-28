<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('_partials/head'); ?>
</head>

<body class="about-page">
    <!-- Header -->
    <?php $this->view('_partials/header'); ?>
    <!-- End Header -->

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" style="background-image: url(<?= base_url('assets/img/sejarah.jpg'); ?>);">
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

        <section class="section">
            <div class="container section-title pb-3" data-aos="fade-up">
                <h2>Struktur Organisasi</h2>
                <p>Struktur Organisasi BUMDes Bantaran, Kecamatan Bantaran, Kabupaten Probolinggo</p>
            </div>
            <div class="container p-4" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= base_url('assets/img/struktur.jpg') ?>" alt="" class="img-fluid">
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php $this->view('_partials/footer'); ?>
    <!-- End Footer -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <!-- <div id="preloader"></div> -->

    <!-- Script -->
    <?php $this->view('_partials/script'); ?>
    <!-- End Script -->

</body>

</html>