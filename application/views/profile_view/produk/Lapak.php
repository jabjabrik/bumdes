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
        <div class="page-title dark-background" style="background-image: url(<?= base_url('assets/profile/img/background/produk.jpg'); ?>); ">
            <div class="container position-relative">
                <h1>BUMDes Bantaran</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="<?= base_url(); ?>">Beranda</a></li>
                        <li class="current">Lapak</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container section-title pb-3" data-aos="fade-up">
                <h2>Daftar Lapak</h2>
                <p>Daftar Lapak BUMDes Bantaran, Kecamatan Bantaran, Kabupaten Probolinggo</p>
            </div>
            <!-- Projects Section -->
            <section id="projects" class="projects section">
                <div class="container">
                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                            <?php foreach ($data_result as $item): ?>
                                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                                    <div class="portfolio-content h-100 bg-secondary">
                                        <img src="<?= base_url("file/$item->foto"); ?>" class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                            <h4>Harga Sewa : Rp <?= number_format($item->harga, 0, ',', '.') ?>/bulan <br> Satus : <?= $item->nama_penyewa ? 'Telah Disewa' : 'Belum Disewa' ?> <br>Ukuran : <?= $item->ukuran ?></h4>
                                            <a href="<?= base_url("file/$item->foto"); ?>" title="<?= "Nama Ruko : $item->nama_properti | harga Rp." . number_format($item->harga, 0, ',', '.') . " | Ukuran : " . $item->ukuran . " | Alamat : $item->alamat_properti | Nama Penyewa : " . ($item->nama_penyewa ?? '(belum disewa)') ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
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