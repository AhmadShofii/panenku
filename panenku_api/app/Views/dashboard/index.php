<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">
            <i class="bi bi-speedometer2 text-success me-2"></i>
            Dashboard
        </h2>

        <p class="text-muted mb-0">
            Selamat datang kembali,
            <strong><?= esc($user->username) ?></strong> 👋
        </p>
    </div>


    <?php if ($stats['totalKebun'] == 0): ?>

        <div class="card shadow-sm border-0">
            <div class="card-body text-center py-5">

                <i class="bi bi-tree-fill display-1 text-success"></i>

                <h3 class="fw-bold mt-3">
                    Selamat Datang di PanenKu
                </h3>

                <p class="text-muted mx-auto" style="max-width:600px;">
                    Anda belum memiliki data kebun.
                    Tambahkan kebun pertama untuk mulai mencatat
                    panen, biaya, dan laporan.
                </p>

                <a href="<?= site_url('kebun/create') ?>"
                   class="btn btn-success btn-lg mt-3">

                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Kebun

                </a>

            </div>
        </div>


    <?php else: ?>


    <div class="row g-4 mb-4">

        <div class="col-xl-4 col-md-6">
            <div class="stat-card stat-green">

                <div>
                    <p>Total Kebun</p>

                    <h2>
                        <?= $stats['totalKebun'] ?>
                    </h2>
                </div>

                <i class="bi bi-tree-fill stat-icon"></i>

            </div>
        </div>


        <div class="col-xl-4 col-md-6">
            <div class="stat-card stat-yellow">

                <div>
                    <p>Total Panen</p>

                    <h3>
                        <?= number_format($stats['totalPanenKg'], 2, ',', '.') ?> Kg
                    </h3>
                </div>

                <i class="bi bi-basket-fill stat-icon"></i>

            </div>
        </div>


        <div class="col-xl-4 col-md-6">
            <div class="stat-card stat-blue">

                <div>
                    <p>Pendapatan</p>

                    <h4>
                        Rp <?= number_format($stats['totalPendapatan'],0,',','.') ?>
                    </h4>
                </div>

                <i class="bi bi-cash-stack stat-icon"></i>

            </div>
        </div>


        <div class="col-xl-4 col-md-6">
            <div class="stat-card stat-red">

                <div>
                    <p>Total Biaya</p>

                    <h4>
                        Rp <?= number_format($stats['totalBiaya'],0,',','.') ?>
                    </h4>
                </div>

                <i class="bi bi-wallet2 stat-icon"></i>

            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="stat-card <?= $stats['labaBersih'] >= 0 ? 'stat-green' : 'stat-red' ?>">

                <div>
                    <p>Laba Bersih</p>

                    <h4>
                        Rp <?= number_format($stats['labaBersih'],0,',','.') ?>
                    </h4>
                </div>

                <i class="bi bi-graph-up-arrow stat-icon"></i>

            </div>
        </div>


        <div class="col-xl-4 col-md-6">
            <div class="stat-card stat-dark">

                <div>
                    <p>Total Transaksi</p>

                    <h2>
                        <?= $stats['totalTransaksi'] ?>
                    </h2>
                </div>

                <i class="bi bi-receipt stat-icon"></i>

            </div>
        </div>

    </div>



    <div class="row g-4">

        <div class="col-lg-8">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-header bg-white border-0">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-bar-chart-line-fill text-success me-2"></i>
                        Pendapatan vs Biaya
                    </h5>
                </div>

                <div class="card-body">

                    <div style="height:350px;">
                        <canvas id="dashboardChart"></canvas>
                    </div>

                </div>

            </div>

        </div>



        <div class="col-lg-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-clipboard-data-fill text-primary me-2"></i>
                        Ringkasan
                    </h5>

                </div>


                <div class="card-body">

                    <p class="fw-semibold mb-2">
                        Pendapatan
                    </p>

                    <div class="progress rounded-pill mb-4" style="height:22px;">

                        <div class="progress-bar bg-primary" style="width:100%;">
                            Rp <?= number_format($stats['totalPendapatan'],0,',','.') ?>
                        </div>

                    </div>


                    <?php

                    $persen = 0;

                    if ($stats['totalPendapatan'] > 0) {
                        $persen = ($stats['totalBiaya'] / $stats['totalPendapatan']) * 100;
                    }

                    $persen = min($persen, 100);

                    ?>


                    <p class="fw-semibold mb-2">
                        Biaya
                    </p>

                    <div class="progress rounded-pill mb-4" style="height:22px;">

                        <div class="progress-bar bg-danger"
                             style="width:<?= $persen ?>%;">
                            <?= round($persen) ?>%
                        </div>

                    </div>


                    <hr>


                    <p class="fw-bold mb-1">
                        Laba Bersih
                    </p>


                    <h3 class="<?= $stats['labaBersih'] >= 0 ? 'text-success' : 'text-danger' ?> fw-bold">

                        Rp <?= number_format($stats['labaBersih'],0,',','.') ?>

                    </h3>


                    <span class="badge <?= $stats['labaBersih'] >= 0 ? 'bg-success' : 'bg-danger' ?>">

                        <?= $stats['labaBersih'] >= 0 ? 'Profit' : 'Rugi' ?>

                    </span>

                </div>

            </div>

        </div>

    </div>


    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const chartElement = document.getElementById('dashboardChart');

if (chartElement) {

    new Chart(chartElement, {

        type: 'bar',

        data: {

            labels: <?= json_encode($chart['labels']) ?>,

            datasets: [

                {
                    label: 'Pendapatan',
                    data: <?= json_encode($chart['pendapatan']) ?>,
                    borderRadius: 10
                },

                {
                    label: 'Biaya',
                    data: <?= json_encode($chart['biaya']) ?>,
                    borderRadius: 10
                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            animation: {
                duration: 1500
            },

            plugins: {

                tooltip: {

                    callbacks: {

                        label: function(context) {

                            return 'Rp ' +
                                Number(context.raw)
                                .toLocaleString('id-ID');

                        }

                    }

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {

                        callback: function(value) {

                            return 'Rp ' +
                                Number(value)
                                .toLocaleString('id-ID');

                        }

                    }

                }

            }

        }

    });

}

</script>


<?= $this->endSection() ?>