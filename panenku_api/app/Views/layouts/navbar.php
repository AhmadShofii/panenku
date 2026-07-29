<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">

    <div class="container-fluid">

        <!-- Tombol Sidebar Mobile -->
        <button class="btn btn-success d-lg-none me-2"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu">

            <i class="bi bi-list fs-4"></i>

        </button>

        <a class="navbar-brand fw-bold" href="<?= site_url('dashboard') ?>">
            🌾 PanenKu
        </a>

        <div class="ms-auto d-flex align-items-center">

            <span class="text-white me-3 d-none d-md-inline">

                <i class="bi bi-person-circle me-1"></i>

                <?= esc(auth()->user()->username ?? 'User') ?>

            </span>

            <a href="<?= url_to('logout') ?>"
                class="btn btn-light btn-sm">

                <i class="bi bi-box-arrow-right me-1"></i>

                Logout

            </a>

        </div>

    </div>

</nav>