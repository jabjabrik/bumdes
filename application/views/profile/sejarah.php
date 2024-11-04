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
                        <li class="current">Sejarah Desa</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container section-title pb-3" data-aos="fade-up">
                <h2>Sejarah Desa</h2>
                <p>Sejarah BUMDes Bantaran, Kecamatan Bantaran, Kabupaten Probolinggo</p>
            </div>
            <div class="container px-5">
                <p class="mt-4" style="text-align: justify;  letter-spacing: .6px; text-indent: 60px; line-height: 1.5;" data-aos="fade-up" data-aos-delay="100">Desa Bantaran, yang terletak di Kecamatan Bantaran, Kabupaten Probolinggo, memiliki sejarah panjang yang menjadi fondasi kebersamaan dan kekuatan masyarakatnya saat ini. Berdiri sejak era kolonial, Desa Bantaran awalnya merupakan wilayah agraris dengan sebagian besar penduduk bekerja sebagai petani dan peternak. Kondisi geografis yang subur dan akses ke sumber daya alam menjadikan desa ini berkembang pesat sebagai pusat pertanian di kawasan Probolinggo.</p>
                <p class="mt-4" style="text-align: justify;  letter-spacing: .6px; text-indent: 60px; line-height: 1.5;" data-aos="fade-up" data-aos-delay="100">Seiring berjalannya waktu, Desa Bantaran mengalami berbagai perkembangan, baik di bidang infrastruktur maupun perekonomian. Pembangunan jalan, irigasi, dan fasilitas umum telah mempercepat kemajuan desa ini, menjadikannya sebagai wilayah yang mandiri dan berdaya saing. Inisiatif masyarakat dalam mengembangkan usaha-usaha lokal turut membantu meningkatkan ekonomi desa dan menciptakan lapangan pekerjaan bagi warga.</p>
                <p class="mt-4" style="text-align: justify;  letter-spacing: .6px; text-indent: 60px; line-height: 1.5;" data-aos="fade-up" data-aos-delay="100">Pada tahun-tahun terakhir, melalui BUMDes Bantaran, desa kami semakin maju dalam bidang ekonomi dan sosial. BUMDes hadir sebagai upaya desa untuk mengelola sumber daya dan potensi lokal secara profesional dan berkelanjutan. Kami percaya, dengan semangat kebersamaan yang diwariskan dari generasi ke generasi, Desa Bantaran akan terus berkembang menjadi desa yang makmur, mandiri, dan sejahtera.</p>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php $this->view('_partials/footer'); ?>
    <!-- End Footer -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Script -->
    <?php $this->view('_partials/script'); ?>
    <!-- End Script -->

</body>

</html>