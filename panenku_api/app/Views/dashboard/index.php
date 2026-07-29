<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Dashboard</h2>

<div class="row g-4">

    <div class="col-md-4 col-lg-2">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">🌳 Total Kebun</h6>
                <h2><?= $stats['totalKebun'] ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">🌾 Total Panen</h6>
                <h2><?= number_format($stats['totalPanenKg'], 2, ',', '.') ?> Kg</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">💰 Pendapatan</h6>
                <h2 class="fs-5">
                    Rp <?= number_format($stats['totalPendapatan'], 0, ',', '.') ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">💸 Total Biaya</h6>
                <h2 class="fs-5 text-danger">
                    Rp <?= number_format($stats['totalBiaya'], 0, ',', '.') ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">📈 Laba Bersih</h6>

                <h2 class="fs-5 <?= $stats['labaBersih'] >= 0 ? 'text-success' : 'text-danger' ?>">
                    Rp <?= number_format($stats['labaBersih'], 0, ',', '.') ?>
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">📦 Transaksi</h6>
                <h2><?= $stats['totalTransaksi'] ?></h2>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4 shadow-sm border-0">

    <div class="card-body">

        <h4>Selamat Datang 👋</h4>

        <p class="mb-0">

            Halo,

            <strong><?= esc($user->username) ?></strong>.

            Selamat datang di aplikasi <strong>PanenKu</strong>.

        </p>

    </div>

</div>

<?= $this->endSection() ?>