<nav class="navbar navbar-expand-lg navbar-dark navbar-modern shadow-sm">
    <div class="container-fluid">

        <button 
            class="btn btn-menu d-lg-none me-2"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu">
            <i class="bi bi-list fs-3"></i>
        </button>

        <a class="navbar-brand fw-bold brand-panenku"
           href="<?= site_url('dashboard') ?>">

            <span class="brand-icon">🌾</span>
            <span>PanenKu</span>

        </a>

        <div class="ms-auto d-flex align-items-center gap-3">

            <div class="user-profile d-none d-md-flex align-items-center">
                <i class="bi bi-person-circle me-2"></i>

                <span>
                    <?= esc(auth()->user()->username ?? 'User') ?>
                </span>
            </div>

            <a href="<?= url_to('logout') ?>"
               class="btn btn-logout">

                <i class="bi bi-box-arrow-right me-1"></i>

                <span class="d-none d-sm-inline">
                    Logout
                </span>

            </a>

        </div>

    </div>
</nav>