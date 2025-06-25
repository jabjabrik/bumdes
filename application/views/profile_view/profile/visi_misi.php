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
                        <li class="current">Visi & Misi</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container section-title pb-3" data-aos="fade-up">
                <h2>Visi & Misi</h2>
                <p>Visi & Misi BUMDes Bantaran, Kecamatan Bantaran, Kabupaten Probolinggo</p>
            </div>
            <div class="container px-5">
                <div class="mt-4" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="">Visi</h4>
                    <p style="letter-spacing: .6px; line-height: 2;">Menjadi motor penggerak ekonomi desa yang profesional, inovatif, dan berkelanjutan untuk menciptakan desa yang mandiri, sejahtera, dan berdaya saing.</p>
                </div>
                <div class="mt-4" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="">Misi</h4>
                    <ol>
                        <li class="mt-2"><span class="fw-semibold" style="letter-spacing: .6px; line-height: 2;">Mengoptimalkan potensi desa : </span>melalui pengembangan usaha berbasis sumber daya lokal secara inovatif dan berkelanjutan.</li>
                        <li class="mt-2"><span class="fw-semibold" style="letter-spacing: .6px; line-height: 2;">Meningkatkan kesejahteraan masyarakat : </span>dengan membuka lapangan kerja, mendukung UMKM desa, dan menciptakan nilai tambah ekonomi.</li>
                        <li class="mt-2"><span class="fw-semibold" style="letter-spacing: .6px; line-height: 2;">Membangun tata kelola usaha : </span>yang transparan, profesional, dan akuntabel untuk mendorong kepercayaan masyarakat.</li>
                        <li class="mt-2"><span class="fw-semibold" style="letter-spacing: .6px; line-height: 2;">Mendorong partisipasi aktif masyarakat desa: </span>dalam perencanaan, pelaksanaan, dan pengawasan kegiatan BUMDesa.</li>
                        <li class="mt-2"><span class="fw-semibold" style="letter-spacing: .6px; line-height: 2;">Membina kemitraan strategis : </span>dengan pemerintah, swasta, dan lembaga lain untuk memperkuat posisi BUMDesa dalam perekonomian lokal dan regional.</li>
                        <li class="mt-2"><span class="fw-semibold" style="letter-spacing: .6px; line-height: 2;">Meningkatkan kapasitas SDM Desa  : </span>melalui pelatihan, pendampingan, dan inovasi berkelanjutan.</li>
                        <li class="mt-2"><span class="fw-semibold" style="letter-spacing: .6px; line-height: 2;">Menjaga nilai budaya dan kearifan lokal  : </span>sebagai dasar pengembangan usaha desa yang berkarakter.</li>
                    </ol>
                    <!-- <p style="letter-spacing: .6px;">Menjadi Badan Usaha Milik Desa yang berdaya saing tinggi, mandiri, dan inovatif dalam mengelola potensi lokal untuk mewujudkan kesejahteraan masyarakat Desa Bantaran yang berkelanjutan.</p> -->
                </div>
                <!-- <p class="mt-4" style="text-align: justify;  letter-spacing: .6px; text-indent: 60px;" data-aos="fade-up" data-aos-delay="100">Desa Bantaran, yang terletak di Kecamatan Bantaran, Kabupaten Probolinggo, memiliki sejarah panjang yang menjadi fondasi kebersamaan dan kekuatan masyarakatnya saat ini. Berdiri sejak era kolonial, Desa Bantaran awalnya merupakan wilayah agraris dengan sebagian besar penduduk bekerja sebagai petani dan peternak. Kondisi geografis yang subur dan akses ke sumber daya alam menjadikan desa ini berkembang pesat sebagai pusat pertanian di kawasan Probolinggo.</p>
                <p class="mt-4" style="text-align: justify;  letter-spacing: .6px; text-indent: 60px;" data-aos="fade-up" data-aos-delay="100">Seiring berjalannya waktu, Desa Bantaran mengalami berbagai perkembangan, baik di bidang infrastruktur maupun perekonomian. Pembangunan jalan, irigasi, dan fasilitas umum telah mempercepat kemajuan desa ini, menjadikannya sebagai wilayah yang mandiri dan berdaya saing. Inisiatif masyarakat dalam mengembangkan usaha-usaha lokal turut membantu meningkatkan ekonomi desa dan menciptakan lapangan pekerjaan bagi warga.</p>
                <p class="mt-4" style="text-align: justify;  letter-spacing: .6px; text-indent: 60px;" data-aos="fade-up" data-aos-delay="100">Pada tahun-tahun terakhir, melalui BUMDes Bantaran, desa kami semakin maju dalam bidang ekonomi dan sosial. BUMDes hadir sebagai upaya desa untuk mengelola sumber daya dan potensi lokal secara profesional dan berkelanjutan. Kami percaya, dengan semangat kebersamaan yang diwariskan dari generasi ke generasi, Desa Bantaran akan terus berkembang menjadi desa yang makmur, mandiri, dan sejahtera.</p> -->
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