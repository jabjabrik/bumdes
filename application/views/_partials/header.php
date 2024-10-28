<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="<?= base_url(); ?>" class="logo d-flex align-items-center">
            <img src="<?= base_url('assets/img/logo/logo_pemkab.png'); ?>" alt="logo_pemkab">
            <h1 class="sitename">BUMDes Bantaran</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="<?= base_url(); ?>" class="<?= $title == 'Beranda' ? 'active' : '' ?>">Beranda</a></li>
                <li class="dropdown">
                    <a href="#" class="<?= strstr($title, 'Profil') ? 'active' : '' ?>">
                        <span>Profil Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li><a href="<?= base_url('profil/sejarah'); ?>">Sejarah Desa</a></li>
                        <li><a href="<?= base_url('profil/struktur'); ?>">Struktur Organisasi</a></li>
                        <li><a href="<?= base_url('profil/visi_misi'); ?>">Visi & Misi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="<?= strstr($title, 'Produk') ? 'active' : '' ?>">

                        <span>Produk</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li><a href="<?= base_url('produk/ruko'); ?>">Ruko</a></li>
                        <li><a href="<?= base_url('produk/lapak'); ?>">Lapak</a></li>
                    </ul>
                </li>
                <li><a href="about.html"><i class="bi bi-person-circle fs-5 me-2"></i> <span>Login</span></a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>