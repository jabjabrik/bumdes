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
                <li class="nav-header">Master</li>
                <li class="nav-item"> <a href="<?= base_url('user') ?>" class="nav-link <?= $title == 'User' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-person-circle"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item"> <a href="<?= base_url('ruko') ?>" class="nav-link <?= $title == 'Ruko' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-buildings"></i>
                        <p>Ruko</p>
                    </a>
                </li>
                <li class="nav-item"> <a href="<?= base_url('lapak') ?>" class="nav-link <?= $title == 'Lapak' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-building"></i>
                        <p>Lapak</p>
                    </a>
                </li>
                <li class="nav-header">Akun</li>
                <li class="nav-item"> <a href="<?= base_url('auth/logout') ?>" class="nav-link"> <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>