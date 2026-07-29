<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="mb-0">
            <i class="bi bi-file-earmark-text"></i>
            <?= esc($title) ?>
        </h3>

        <div>

            <a href="<?= site_url('laporan/pdf?' . http_build_query(service('request')->getGet())) ?>"
                class="btn btn-danger">

                <i class="bi bi-file-earmark-pdf"></i>

                Export PDF

            </a>

            <a href="<?= site_url('laporan/excel?' . http_build_query(service('request')->getGet())) ?>"
                class="btn btn-success">

                <i class="bi bi-file-earmark-excel"></i>

                Export Excel

            </a>

        </div>

    </div>

    <!-- Filter -->

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-primary text-white">

            <i class="bi bi-funnel-fill"></i>

            Filter Laporan

        </div>

        <div class="card-body">

            <form action="<?= site_url('laporan') ?>" method="get">

                <div class="row g-3">

                    <div class="col-md-3">

                        <label class="form-label">

                            Tanggal Mulai

                        </label>

                        <input
                            type="date"
                            class="form-control"
                            name="mulai"
                            value="<?= esc(service('request')->getGet('mulai')) ?>">

                    </div>

                    <div class="col-md-3">

                        <label class="form-label">

                            Tanggal Selesai

                        </label>

                        <input
                            type="date"
                            class="form-control"
                            name="selesai"
                            value="<?= esc(service('request')->getGet('selesai')) ?>">

                    </div>

                    <div class="col-md-3">

                        <label class="form-label">

                            Kebun

                        </label>

                        <select
                            name="kebun_id"
                            class="form-select">

                            <option value="">

                                Semua Kebun

                            </option>

                            <?php foreach ($kebun as $item) : ?>

                                <option
                                    value="<?= $item['id'] ?>"
                                    <?= service('request')->getGet('kebun_id') == $item['id'] ? 'selected' : '' ?>>

                                    <?= esc($item['nama_kebun']) ?>

                                </option>

                            <?php endforeach ?>

                        </select>

                    </div>

                    <div class="col-md-3 d-flex align-items-end">

                        <button
                            class="btn btn-primary me-2">

                            <i class="bi bi-search"></i>

                            Filter

                        </button>

                        <a
                            href="<?= site_url('laporan') ?>"
                            class="btn btn-secondary">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Ringkasan -->

    <div class="row mb-4">

        <div class="col-lg-4">

            <div class="card border-success shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">

                        Total Pendapatan

                    </h6>

                    <h3 class="text-success">

                        Rp <?= number_format($totalPendapatan, 0, ',', '.') ?>

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-danger shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">

                        Total Biaya

                    </h6>

                    <h3 class="text-danger">

                        Rp <?= number_format($totalBiaya, 0, ',', '.') ?>

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-primary shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">

                        Laba Bersih

                    </h6>

                    <h3 class="<?= $labaBersih >= 0 ? 'text-primary' : 'text-danger' ?>">

                        Rp <?= number_format($labaBersih, 0, ',', '.') ?>

                    </h3>

                </div>

            </div>

        </div>

    </div>

    <!-- Tabel Panen -->

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-success text-white">

            <i class="bi bi-basket"></i>

            Data Panen

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table
                    id="tablePanen"
                    class="table table-bordered table-hover align-middle">

                    <thead class="table-success">

                        <tr>

                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kebun</th>
                            <th>Hasil (Kg)</th>
                            <th>Total Harga</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($panen)) : ?>

                            <?php $no = 1; ?>
                            <?php foreach ($panen as $item) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>

                                    <td>
                                        <?= date('d-m-Y', strtotime($item['tanggal_panen'])) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['nama_kebun']) ?>
                                    </td>

                                    <td class="text-end">
                                        <?= number_format($item['hasil_kg'], 2, ',', '.') ?>
                                    </td>

                                    <td class="text-end">
                                        Rp <?= number_format($item['total_harga'], 0, ',', '.') ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="5" class="text-center">

                                    Tidak ada data panen.

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                    <tfoot>

                        <tr>

                            <th colspan="4" class="text-end">

                                Total Pendapatan

                            </th>

                            <th class="text-end text-success">

                                Rp <?= number_format($totalPendapatan, 0, ',', '.') ?>

                            </th>

                        </tr>

                    </tfoot>

                </table>

            </div>

        </div>

    </div>

    <!-- ========================= -->
    <!-- DATA BIAYA -->
    <!-- ========================= -->

    <div class="card shadow-sm">

        <div class="card-header bg-danger text-white">

            <i class="bi bi-cash-stack"></i>

            Data Biaya

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table
                    id="tableBiaya"
                    class="table table-bordered table-hover align-middle">

                    <thead class="table-danger">

                        <tr>

                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kebun</th>
                            <th>Kategori</th>
                            <th>Nominal</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($biaya)) : ?>

                            <?php $no = 1; ?>

                            <?php foreach ($biaya as $item) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>

                                    <td>

                                        <?= date('d-m-Y', strtotime($item['tanggal'])) ?>

                                    </td>

                                    <td>

                                        <?= esc($item['nama_kebun']) ?>

                                    </td>

                                    <td>

                                        <?= esc($item['nama_kategori']) ?>

                                    </td>

                                    <td class="text-end">

                                        Rp <?= number_format($item['nominal'], 0, ',', '.') ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="5" class="text-center">

                                    Tidak ada data biaya.

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                    <tfoot>

                        <tr>

                            <th colspan="4" class="text-end">

                                Total Biaya

                            </th>

                            <th class="text-end text-danger">

                                Rp <?= number_format($totalBiaya, 0, ',', '.') ?>

                            </th>

                        </tr>

                    </tfoot>

                </table>

            </div>

        </div>

    </div>
    </div>


<?= $this->endSection() ?>