<!-- Desktop Sidebar -->

<div class="col-lg-2 col-md-3 d-none d-lg-block bg-white border-end min-vh-100 p-0">

    <div class="list-group list-group-flush py-3">

        <a href="<?= site_url('dashboard') ?>" class="list-group-item list-group-item-action">
            <i class="bi bi-speedometer2 me-2"></i>
            Dashboard
        </a>

        <a href="<?= site_url('kebun') ?>" class="list-group-item list-group-item-action">
            <i class="bi bi-tree-fill me-2 text-success"></i>
            Kebun
        </a>

        <a href="<?= site_url('panen') ?>" class="list-group-item list-group-item-action">
            <i class="bi bi-basket-fill me-2 text-warning"></i>
            Panen
        </a>

        <a href="<?= site_url('biaya') ?>" class="list-group-item list-group-item-action">
            <i class="bi bi-wallet2 me-2 text-danger"></i>
            Biaya
        </a>

        <a href="<?= site_url('laporan') ?>" class="list-group-item list-group-item-action">
            <i class="bi bi-bar-chart-fill me-2 text-primary"></i>
            Laporan
        </a>

        <a href="<?= site_url('profile') ?>" class="list-group-item list-group-item-action">
            <i class="bi bi-person-fill me-2"></i>
            Profil
        </a>

    </div>

</div>

<!-- Mobile Sidebar -->

<div class="offcanvas offcanvas-start"
    tabindex="-1"
    id="sidebarMenu">

    <div class="offcanvas-header bg-success text-white">

        <h5 class="offcanvas-title">
            🌾 PanenKu
        </h5>

        <button type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="offcanvas">
        </button>

    </div>

    <div class="offcanvas-body p-0">

        <div class="list-group list-group-flush">

            <a href="<?= site_url('dashboard') ?>" class="list-group-item list-group-item-action">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>

            <a href="<?= site_url('kebun') ?>" class="list-group-item list-group-item-action">
                <i class="bi bi-tree-fill me-2 text-success"></i>
                Kebun
            </a>

            <a href="<?= site_url('panen') ?>" class="list-group-item list-group-item-action">
                <i class="bi bi-basket-fill me-2 text-warning"></i>
                Panen
            </a>

            <a href="<?= site_url('biaya') ?>" class="list-group-item list-group-item-action">
                <i class="bi bi-wallet2 me-2 text-danger"></i>
                Biaya
            </a>

            <a href="<?= site_url('laporan') ?>" class="list-group-item list-group-item-action">
                <i class="bi bi-bar-chart-fill me-2 text-primary"></i>
                Laporan
            </a>

            <a href="<?= site_url('profile') ?>" class="list-group-item list-group-item-action">
                <i class="bi bi-person-fill me-2"></i>
                Profil
            </a>

        </div>

    </div>

</div>