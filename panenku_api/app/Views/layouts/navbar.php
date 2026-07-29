<nav class="navbar navbar-expand-lg navbar-dark bg-success">

    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="<?= site_url('dashboard') ?>">
            🌾 PanenKu
        </a>

        <div class="ms-auto">

            <span class="text-white me-3">

                <i class="bi bi-person-circle"></i>

                <?= auth()->user()->username ?? 'User'; ?>

            </span>

            <a href="<?= url_to('logout') ?>" class="btn btn-light btn-sm">

                Logout

            </a>

        </div>

    </div>

</nav>