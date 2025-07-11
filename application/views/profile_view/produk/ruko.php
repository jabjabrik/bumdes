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
                        <li class="current">Ruko</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container section-title pb-3" data-aos="fade-up">
                <h2>Daftar Rumah Toko (Ruko)</h2>
                <p>Daftar Ruko BUMDes Bantaran, Kecamatan Bantaran, Kabupaten Probolinggo</p>
                <form action="<?= base_url('produk/ruko') ?>" method="post" class="text-center mt-3 d-flex flex-column align-items-center">
                    <input type="number" name="nik" class="form-control w-50 mx-auto" placeholder="Cek status sewa berdasarkan NIK">
                    <button type="submit" class="btn btn-primary mt-2">Cek Status</button>
                </form>
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
                                            <h4>Harga Sewa : Rp <?= number_format($item->harga, 0, ',', '.') ?>/tahun <br> Satus : <?= $item->nama_penyewa ? 'Telah Disewa' : 'Belum Disewa' ?> <br>Ukuran : <?= $item->ukuran ?></h4>
                                            <a href="<?= base_url("file/$item->foto"); ?>" title="<?= "Nama Ruko : $item->nama_properti | harga Rp." . number_format($item->harga, 0, ',', '.') . " | Ukuran : " . $item->ukuran . " | Alamat : $item->alamat_properti | Nama Penyewa : " . ($item->nama_penyewa ?? '(belum disewa)') . " | KETERANGAN : ($item->keterangan)" ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
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

    <!-- Modal Informasi -->
    <div class="modal fade" id="modal_informasi" tabindex="-1" aria-labelledby="modal_informasi" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusSewaModalLabel">Status Sewa Properti</h5>
                    <button type="button" class="btn-close" data-bs-close="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-capitalize">
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Nama Properti:</div>
                        <div class="col-md-8" id="nama_properti"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Alamat:</div>
                        <div class="col-md-8" id="alamat_properti"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Ukuran:</div>
                        <div class="col-md-8" id="ukuran"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Harga Sewa:</div>
                        <div class="col-md-8" id="harga"></div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Nama Penyewa:</div>
                        <div class="col-md-8" id="nama_penyewa"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">NIK:</div>
                        <div class="col-md-8" id="nik"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">No. Telepon:</div>
                        <div class="col-md-8" id="no_telepon"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Jenis Usaha:</div>
                        <div class="col-md-8" id="jenis_usaha"></div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Periode Sewa:</div>
                        <div class="col-md-8" id="periode_sewa"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Status Sewa:</div>
                        <div class="col-md-8"><span class="badge bg-success">berlangsung</span></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Metode Pembayaran:</div>
                        <div class="col-md-8" id="metode_pembayaran"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        const modal_informasi = new bootstrap.Modal(document.getElementById('modal_informasi'));

        <?php $informasiModal = $this->session->flashdata('informasiModal'); ?>
        <?php if ($informasiModal) : ?>
            const informasi = <?= json_encode($informasiModal) ?>;
            document.querySelector('#nama_properti').textContent = informasi.nama_properti;
            document.querySelector('#alamat_properti').textContent = informasi.alamat_properti;
            document.querySelector('#ukuran').textContent = informasi.ukuran;
            document.querySelector('#harga').textContent = informasi.harga;
            document.querySelector('#nama_penyewa').textContent = informasi.nama_penyewa;
            document.querySelector('#nik').textContent = informasi.nik;
            document.querySelector('#no_telepon').textContent = informasi.no_telepon;
            document.querySelector('#jenis_usaha').textContent = informasi.jenis_usaha;
            document.querySelector('#periode_sewa').textContent = `${informasi.tanggal_mulai} - ${informasi.tanggal_selesai}`;
            document.querySelector('#metode_pembayaran').textContent = informasi.metode_pembayaran;
            modal_informasi.show();
        <?php endif ?>

        <?php $alertModal = $this->session->flashdata('alertModal'); ?>
        <?php if ($alertModal) : ?>
            alert('<?= $alertModal ?>');
        <?php endif; ?>
    </script>
</body>

</html>