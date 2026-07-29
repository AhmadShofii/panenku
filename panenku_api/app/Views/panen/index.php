<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <?= esc($title) ?>
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh data hasil panen kebun Anda.
            </p>
        </div>

        <a href="<?= site_url('panen/create') ?>"
           class="btn btn-success px-4">

            <i class="bi bi-plus-circle me-2"></i>
            Tambah Panen

        </a>

    </div>


    <?php if (empty($panen)): ?>

        <div class="card shadow-sm border-0">

            <div class="card-body text-center py-5">

                <i class="bi bi-basket-fill display-1 text-success"></i>

                <h3 class="fw-bold mt-3">
                    Belum Ada Data Panen
                </h3>

                <p class="text-muted mx-auto" style="max-width:520px;">
                    Tambahkan data panen pertama untuk menghitung
                    pendapatan, laba, dan laporan kebun.
                </p>

                <a href="<?= site_url('panen/create') ?>"
                   class="btn btn-success btn-lg mt-3">

                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Panen

                </a>

            </div>

        </div>


    <?php else: ?>


        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <div class="table-responsive">

                    <table class="table align-middle datatable">

                        <thead>

                            <tr>
                                <th width="60">No</th>
                                <th>Tanggal</th>
                                <th>Kebun</th>
                                <th>Hasil</th>
                                <th>Harga/Kg</th>
                                <th>Pendapatan</th>
                                <th width="150" class="text-center">
                                    Aksi
                                </th>
                            </tr>

                        </thead>


                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($panen as $item): ?>

                            <tr>

                                <td>
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <i class="bi bi-calendar3 text-success me-1"></i>

                                    <?= date(
                                        'd-m-Y',
                                        strtotime($item['tanggal_panen'])
                                    ) ?>

                                </td>

                                <td class="fw-semibold">
                                    <?= esc($item['nama_kebun']) ?>
                                </td>

                                <td>

                                    <span class="badge bg-success-subtle text-success">

                                        <?= number_format(
                                            (float)$item['hasil_kg'],
                                            2,
                                            ',',
                                            '.'
                                        ) ?>

                                        Kg

                                    </span>

                                </td>

                                <td>
                                    Rp <?= number_format(
                                        $item['harga_per_kg'],
                                        0,
                                        ',',
                                        '.'
                                    ) ?>
                                </td>

                                <td>

                                    <span class="fw-bold text-success">

                                        Rp <?= number_format(
                                            $item['total_harga'],
                                            0,
                                            ',',
                                            '.'
                                        ) ?>

                                    </span>

                                </td>

                                <td class="text-center">

                                    <div class="btn-group">

                                        <a href="<?= site_url('panen/edit/'.$item['id']) ?>"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <a href="<?= site_url('panen/delete/'.$item['id']) ?>"
                                           class="btn btn-danger btn-sm btn-delete">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </div>

                                </td>

                            </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


    <?php endif; ?>

</div>

<?= $this->endSection() ?>