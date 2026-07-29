<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Laporan Kebun
            </h2>

            <p class="text-muted mb-0">
                Ringkasan pendapatan, biaya, dan laba kebun.
            </p>
        </div>


        <a href="<?= site_url('laporan/pdf') ?>"
           class="btn btn-danger px-4">

            <i class="bi bi-file-earmark-pdf me-2"></i>
            Export PDF

        </a>

    </div>



    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">


            <form action="<?= site_url('laporan') ?>"
                  method="get">


                <div class="row g-3 align-items-end">


                    <div class="col-md-5">

                        <label class="form-label fw-semibold">
                            Dari Tanggal
                        </label>


                        <input type="date"
                               name="mulai"
                               value="<?= esc($mulai ?? '') ?>"
                               class="form-control">

                    </div>



                    <div class="col-md-5">

                        <label class="form-label fw-semibold">
                            Sampai Tanggal
                        </label>


                        <input type="date"
                               name="selesai"
                               value="<?= esc($selesai ?? '') ?>"
                               class="form-control">

                    </div>



                    <div class="col-md-2">

                        <button class="btn btn-success w-100">

                            <i class="bi bi-search me-2"></i>
                            Tampilkan

                        </button>

                    </div>


                </div>


            </form>


        </div>

    </div>




    <div class="row g-4 mb-4">


        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-cash-stack text-success fs-3"></i>

                        </div>


                        <div>

                            <p class="text-muted mb-1">
                                Total Pendapatan
                            </p>


                            <h4 class="fw-bold mb-0">

                                Rp <?= number_format(
                                    $totalPendapatan,
                                    0,
                                    ',',
                                    '.'
                                ) ?>

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>




        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-danger bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-wallet2 text-danger fs-3"></i>

                        </div>


                        <div>

                            <p class="text-muted mb-1">
                                Total Biaya
                            </p>


                            <h4 class="fw-bold mb-0">

                                Rp <?= number_format(
                                    $totalBiaya,
                                    0,
                                    ',',
                                    '.'
                                ) ?>

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>




        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-graph-up-arrow text-primary fs-3"></i>

                        </div>


                        <div>

                            <p class="text-muted mb-1">
                                Laba Bersih
                            </p>


                            <h4 class="fw-bold mb-0">

                                Rp <?= number_format(
                                    $labaBersih,
                                    0,
                                    ',',
                                    '.'
                                ) ?>

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>




    <div class="card border-0 shadow-sm">


        <div class="card-body p-4">


            <h5 class="fw-bold mb-3">

                <i class="bi bi-bar-chart-fill text-success me-2"></i>

                Data Panen

            </h5>


            <div class="table-responsive">


                <table class="table align-middle datatable">


                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kebun</th>
                            <th>Kg</th>
                            <th>Total</th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php $no=1; ?>

                    <?php foreach($panen as $item): ?>


                        <tr>

                            <td>
                                <?= $no++ ?>
                            </td>


                            <td>
                                <?= date(
                                    'd-m-Y',
                                    strtotime($item['tanggal_panen'])
                                ) ?>
                            </td>


                            <td>
                                <?= esc($item['nama_kebun']) ?>
                            </td>


                            <td>
                                <?= number_format(
                                    $item['hasil_kg'],
                                    2,
                                    ',',
                                    '.'
                                ) ?> Kg
                            </td>


                            <td class="fw-bold text-success">

                                Rp <?= number_format(
                                    $item['total_harga'],
                                    0,
                                    ',',
                                    '.'
                                ) ?>

                            </td>


                        </tr>


                    <?php endforeach; ?>


                    </tbody>


                </table>


            </div>


        </div>


    </div>


</div>

<?= $this->endSection() ?>