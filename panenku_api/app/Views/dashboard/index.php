<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Dashboard
            </h2>

            <p class="text-muted mb-0">
                Selamat datang kembali,
                <strong><?= esc($user->username) ?></strong> 👋
            </p>

        </div>

    </div>

    <?php if ($stats['totalKebun'] == 0) : ?>

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i class="bi bi-tree-fill display-1 text-success"></i>

                <h3 class="fw-bold mt-3">
                    Selamat Datang di PanenKu
                </h3>

                <p class="text-muted mx-auto" style="max-width:600px">

                    Anda belum memiliki data kebun.

                    Mulailah dengan membuat kebun pertama agar
                    dapat mencatat panen, biaya, dan melihat laporan.

                </p>

                <a href="<?= site_url('kebun/create') ?>"
                    class="btn btn-success btn-lg mt-3">

                    <i class="bi bi-plus-circle me-2"></i>

                    Tambah Kebun

                </a>

            </div>

        </div>

    <?php else : ?>

        <div class="row g-4">

            <!-- Total Kebun -->

            <div class="col-6 col-md-4 col-xl-2">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Kebun
                            </small>

                            <h3 class="fw-bold mb-0">
                                <?= $stats['totalKebun'] ?>
                            </h3>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-tree-fill text-success fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Total Panen -->

            <div class="col-6 col-md-4 col-xl-2">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Panen
                            </small>

                            <h5 class="fw-bold mb-0">
                                <?= number_format($stats['totalPanenKg'],2,',','.') ?>
                                Kg
                            </h5>

                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-basket-fill text-warning fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Pendapatan -->

            <div class="col-6 col-md-4 col-xl-2">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Pendapatan
                            </small>

                            <h5 class="fw-bold text-primary mb-0">

                                Rp <?= number_format($stats['totalPendapatan'],0,',','.') ?>

                            </h5>

                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-cash-stack text-primary fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Biaya -->

            <div class="col-6 col-md-4 col-xl-2">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Biaya
                            </small>

                            <h5 class="fw-bold text-danger mb-0">

                                Rp <?= number_format($stats['totalBiaya'],0,',','.') ?>

                            </h5>

                        </div>

                        <div class="bg-danger bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-wallet2 text-danger fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Laba -->

            <div class="col-6 col-md-4 col-xl-2">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Laba Bersih
                            </small>

                            <h5 class="fw-bold <?= $stats['labaBersih'] >= 0 ? 'text-success' : 'text-danger' ?>">

                                Rp <?= number_format($stats['labaBersih'],0,',','.') ?>

                            </h5>

                            <?php if ($stats['labaBersih'] >= 0) : ?>

                                <span class="badge bg-success">
                                    Profit
                                </span>

                            <?php else : ?>

                                <span class="badge bg-danger">
                                    Rugi
                                </span>

                            <?php endif; ?>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-graph-up-arrow text-success fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Transaksi -->

            <div class="col-6 col-md-4 col-xl-2">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Transaksi
                            </small>

                            <h3 class="fw-bold mb-0">

                                <?= $stats['totalTransaksi'] ?>

                            </h3>

                        </div>

                        <div class="bg-secondary bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-receipt text-secondary fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

                <div class="row mt-4">

            <!-- Grafik -->

            <div class="col-lg-8 mb-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-header bg-white border-0 py-3">

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-bar-chart-line-fill text-success me-2"></i>

                            Grafik Pendapatan vs Biaya

                        </h5>

                    </div>

                    <div class="card-body">

                        <div style="height:350px">

                            <canvas id="dashboardChart"></canvas>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Ringkasan -->

            <div class="col-lg-4 mb-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-header bg-white border-0 py-3">

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-clipboard-data-fill text-primary me-2"></i>

                            Ringkasan Keuangan

                        </h5>

                    </div>

                    <div class="card-body">

                        <h6 class="fw-semibold mb-2">

                            Pendapatan

                        </h6>

                        <div class="progress rounded-pill mb-4" style="height:22px">

                            <div class="progress-bar bg-primary"
                                style="width:100%">

                                Rp <?= number_format($stats['totalPendapatan'],0,',','.') ?>

                            </div>

                        </div>

                        <h6 class="fw-semibold mb-2">

                            Biaya

                        </h6>

                        <?php

                        $persen = 0;

                        if ($stats['totalPendapatan'] > 0) {

                            $persen = ($stats['totalBiaya'] / $stats['totalPendapatan']) * 100;

                        }

                        if ($persen > 100) {

                            $persen = 100;

                        }

                        ?>

                        <div class="progress rounded-pill mb-4"
                            style="height:22px">

                            <div class="progress-bar bg-danger"
                                style="width:<?= $persen ?>%">

                                <?= round($persen) ?>%

                            </div>

                        </div>

                        <hr>

                        <h6 class="fw-bold">

                            Laba Bersih

                        </h6>

                        <h3 class="<?= $stats['labaBersih'] >= 0 ? 'text-success' : 'text-danger' ?> fw-bold">

                            Rp <?= number_format($stats['labaBersih'],0,',','.') ?>

                        </h3>

                        <?php if ($stats['labaBersih'] >= 0): ?>

                            <span class="badge bg-success fs-6">

                                Profit

                            </span>

                        <?php else: ?>

                            <span class="badge bg-danger fs-6">

                                Rugi

                            </span>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('dashboardChart');

if (ctx) {

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: <?= json_encode($chart['labels']) ?>,

            datasets: [
{
    label: 'Pendapatan',

    data: <?= json_encode($chart['pendapatan']) ?>,

    borderRadius: 8,

    backgroundColor: '#198754'
},
{
    label: 'Biaya',

    data: <?= json_encode($chart['biaya']) ?>,

    borderRadius: 8,

    backgroundColor: '#dc3545'
}
]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {
    display: true,
    position: 'top'
},

                tooltip: {

                    callbacks: {

                        label: function(context) {

                            return 'Rp ' + Number(context.raw).toLocaleString('id-ID');

                        }

                    }

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {

                        callback: function(value) {

                            return 'Rp ' + Number(value).toLocaleString('id-ID');

                        }

                    }

                }

            }

        }

    });

}

</script>

<?= $this->endSection() ?>