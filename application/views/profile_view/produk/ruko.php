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
            </div>
            <!-- Projects Section -->
            <section id="projects" class="projects section">

                <div class="container">

                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                        <!-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-remodeling">Remodeling</li>
                            <li data-filter=".filter-construction">Construction</li>
                            <li data-filter=".filter-repairs">Repairs</li>
                            <li data-filter=".filter-design">Design</li>
                        </ul> -->

                        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                                <div class="portfolio-content h-100 bg-secondary">
                                    <img src="<?= base_url('assets/profile/img/ruko/ruko1.jpg'); ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>Ruko 1</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                                        <a href="assets/profile/img/projects/remodeling-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-construction">
                                <div class="portfolio-content h-100 bg-secondary">
                                    <img src="<?= base_url('assets/profile/img/ruko/ruko2.jpg'); ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>Ruko 2</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                                        <a href="assets/profile/img/projects/construction-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-repairs">
                                <div class="portfolio-content h-100 bg-secondary">
                                    <img src="<?= base_url('assets/profile/img/ruko/ruko3.jpg'); ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>Ruko 3</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                                        <a href="assets/profile/img/projects/repairs-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                                <div class="portfolio-content h-100 bg-secondary">
                                    <img src="<?= base_url('assets/profile/img/ruko/ruko1.jpg'); ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>Ruko 4</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                                        <a href="assets/profile/img/projects/design-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                                <div class="portfolio-content h-100 bg-secondary">
                                    <img src="<?= base_url('assets/profile/img/ruko/ruko2.jpg'); ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>Ruko 5</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                                        <a href="assets/profile/img/projects/remodeling-2.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->

                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-construction">
                                <div class="portfolio-content h-100 bg-secondary">
                                    <img src="<?= base_url('assets/profile/img/ruko/ruko3.jpg'); ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>Ruko 6</h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                                        <a href="assets/profile/img/projects/construction-2.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->

                        </div><!-- End Portfolio Container -->

                    </div>

                </div>

            </section><!-- /Projects Section -->
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