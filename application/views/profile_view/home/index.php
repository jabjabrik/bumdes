<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->view('profile_view/_partials/head'); ?>
</head>

<body class="index-page">
	<!-- Header -->
	<?php $this->view('profile_view/_partials/header'); ?>
	<!-- End Header -->

	<main class="main">
		<!-- Hero Section -->
		<section id="hero" class="hero section dark-background">

			<div class="info d-flex align-items-center">
				<div class="container">
					<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
						<div class="col-lg-8 text-center">
							<!-- <h2>Selamat Datang di Website Resmi BUMDes Bantaran, Kabupaten Probolinggo</h2> -->
							<h3 style="font-size: 3em;">Selamat Datang di Website Resmi <span style="color: #feb900">BUMDes Bantaran</span> Kabupaten Probolinggo</h3>
							<p class="mt-5">Desa Bantaran memiliki potensi yang luar biasa untuk dikembangkan dalam berbagai sektor. Badan Usaha Milik Desa (BUMDes) Bantaran hadir sebagai perwujudan dari semangat kemandirian ekonomi desa, yang berfokus pada pengelolaan dan pengembangan potensi lokal demi kesejahteraan masyarakat.</p>
						</div>
					</div>
				</div>
			</div>

			<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

				<div class="carousel-item">
					<img src="<?= base_url('assets/profile/img/hero-carousel/bumdes-01.jpg'); ?>" alt="">
				</div>

				<div class="carousel-item active">
					<img src="<?= base_url('assets/profile/img/hero-carousel/bumdes-02.jpg'); ?>" alt="">
				</div>

				<div class="carousel-item">
					<img src="<?= base_url('assets/profile/img/hero-carousel/bumdes-03.jpg'); ?>" alt="">
				</div>
				<div class="carousel-item">
					<img src="<?= base_url('assets/profile/img/hero-carousel/bumdes-04.jpg'); ?>" alt="">
				</div>

				<a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
					<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
				</a>

				<a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
					<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
				</a>

			</div>

		</section><!-- /Hero Section -->

	</main>


	<!-- Scroll Top -->
	<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Preloader -->
	<div id="preloader"></div>

	<!-- Script -->
	<?php $this->view('profile_view/_partials/script'); ?>
	<!-- End Script -->

</body>

</html>