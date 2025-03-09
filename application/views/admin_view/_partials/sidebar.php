<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="<?= base_url('dashboard'); ?>" class="brand-link">
            <img src="<?= base_url('assets/profile/img/logo/logo_bantaran.png'); ?>" alt="Bantaran Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">BUMDes</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $title == 'Dashboard' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php $user_role = $this->session->userdata('user_role'); ?>
                <?php if ($user_role == 'admin'): ?>
                    <li class="nav-header">Master Data</li>
                    <li class="nav-item">
                        <a href="<?= base_url('user') ?>" class="nav-link <?= $title == 'User' ? 'active' : ''; ?>">
                            <i class="nav-icon bi bi-person-circle"></i>
                            <p>Kelola User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('staff') ?>" class="nav-link <?= $title == 'Staff' ? 'active' : ''; ?>">
                            <i class="nav-icon bi bi-person-lines-fill"></i>
                            <p>Kelola Staff</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('penyewa'); ?>" class="nav-link <?= $title == 'Penyewa' ? 'active' : ''; ?>">
                            <i class="bi bi-person-badge nav-icon"></i>
                            <p>Kelola Penyewa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('properti') ?>" class="nav-link <?= $title == 'Properti' ? 'active' : ''; ?>">
                            <i class="bi bi-building-gear nav-icon"></i>
                            <p>Kelola Properti</p>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-header">Sewa Properti</li>
                <li class="nav-item">
                    <a href="<?= base_url('sewa/utama') ?>" class="nav-link <?= $title == 'Utama' ? 'active' : ''; ?>">
                        <i class="bi bi-house-door nav-icon"></i>
                        <p>Utama</p>
                    </a>
                </li>
                <?php if ($user_role != 'kepala lapak'): ?>
                    <li class="nav-item <?= $title == 'Sewa Ruko' ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?= $title == 'Sewa Ruko' ? 'active' : ''; ?>">
                            <i class="bi bi-buildings nav-icon"></i>
                            <p>Ruko <i class="nav-arrow bi bi-chevron-right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($ruko as $item): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url("sewa/properti/$item->id_properti"); ?>" class="nav-link <?= $item->id_properti == $id_properti ? 'active' : '' ?>">
                                        <p class="text-capitalize"><?= $item->nama_properti ?></p>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($user_role != 'kepala ruko'): ?>
                    <li class="nav-item <?= $title == 'Sewa Lapak' ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?= $title == 'Sewa Lapak' ? 'active' : ''; ?>">
                            <i class="bi bi-buildings nav-icon"></i>
                            <p>Lapak <i class="nav-arrow bi bi-chevron-right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($lapak as $item): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url("sewa/properti/$item->id_properti"); ?>" class="nav-link <?= $item->id_properti == $id_properti ? 'active' : '' ?>">
                                        <p class="text-capitalize"><?= $item->nama_properti ?></p>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($user_role == 'admin' || $user_role == 'bendahara'): ?>
                    <li class="nav-header">Transaksi</li>
                    <li class="nav-item">
                        <a href="<?= base_url('keuangan/laporan') ?>" class="nav-link <?= $title == 'Keuangan' ? 'active' : ''; ?>">
                            <i class="bi bi-cash-stack"></i>
                            <p>Laporan Keuangan</p>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-header">Akun</li>
                <li class="nav-item"> <a href="<?= base_url('auth/logout') ?>" class="nav-link"> <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>