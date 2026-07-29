<!-- Desktop Sidebar -->

<div class="col-lg-2 col-md-3 d-none d-lg-block sidebar-wrapper">

    <div class="sidebar-menu">

        <div class="sidebar-title">
            <i class="bi bi-grid-fill me-2"></i>
            Menu Utama
        </div>

        <a href="<?= site_url('dashboard') ?>" class="sidebar-link">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <a href="<?= site_url('kebun') ?>" class="sidebar-link">
            <i class="bi bi-tree-fill icon-green"></i>
            <span>Kebun</span>
        </a>

        <a href="<?= site_url('panen') ?>" class="sidebar-link">
            <i class="bi bi-basket-fill icon-yellow"></i>
            <span>Panen</span>
        </a>

        <a href="<?= site_url('biaya') ?>" class="sidebar-link">
            <i class="bi bi-wallet2 icon-red"></i>
            <span>Biaya</span>
        </a>

        <a href="<?= site_url('laporan') ?>" class="sidebar-link">
            <i class="bi bi-bar-chart-fill icon-blue"></i>
            <span>Laporan</span>
        </a>

        <a href="<?= site_url('profile') ?>" class="sidebar-link">
            <i class="bi bi-person-fill"></i>
            <span>Profile</span>
        </a>

    </div>

</div>




<!-- Mobile Sidebar -->

<div class="offcanvas offcanvas-start"
     tabindex="-1"
     id="sidebarMenu">

    <div class="offcanvas-header sidebar-mobile-header">

        <h5 class="offcanvas-title mb-0">
            🌾 PanenKu
        </h5>

        <button type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas">
        </button>

    </div>


    <div class="offcanvas-body p-2">

        <div class="sidebar-menu">

            <a href="<?= site_url('dashboard') ?>" class="sidebar-link">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <a href="<?= site_url('kebun') ?>" class="sidebar-link">
                <i class="bi bi-tree-fill icon-green"></i>
                <span>Kebun</span>
            </a>

            <a href="<?= site_url('panen') ?>" class="sidebar-link">
                <i class="bi bi-basket-fill icon-yellow"></i>
                <span>Panen</span>
            </a>

            <a href="<?= site_url('biaya') ?>" class="sidebar-link">
                <i class="bi bi-wallet2 icon-red"></i>
                <span>Biaya</span>
            </a>

            <a href="<?= site_url('laporan') ?>" class="sidebar-link">
                <i class="bi bi-bar-chart-fill icon-blue"></i>
                <span>Laporan</span>
            </a>

            <a href="<?= site_url('profile') ?>" class="sidebar-link">
                <i class="bi bi-person-fill"></i>
                <span>Profile</span>
            </a>

        </div>

    </div>

</div>