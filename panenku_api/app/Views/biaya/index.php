<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <?= esc($title) ?>
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh biaya operasional kebun Anda.
            </p>
        </div>

        <a href="<?= site_url('biaya/create') ?>"
           class="btn btn-success px-4">

            <i class="bi bi-plus-circle me-2"></i>
            Tambah Biaya

        </a>

    </div>


    <?php if (empty($biaya)): ?>

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i class="bi bi-wallet2 display-1 text-success"></i>

                <h3 class="fw-bold mt-3">
                    Belum Ada Data Biaya
                </h3>

                <p class="text-muted mx-auto" style="max-width:520px;">
                    Catat biaya operasional seperti pupuk,
                    bibit, pestisida, tenaga kerja, dan kebutuhan lainnya.
                </p>

                <a href="<?= site_url('biaya/create') ?>"
                   class="btn btn-success btn-lg mt-3">

                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Biaya

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
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th width="150" class="text-center">
                                    Aksi
                                </th>
                            </tr>

                        </thead>


                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($biaya as $item): ?>

                            <tr>

                                <td>
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <i class="bi bi-calendar3 text-success me-1"></i>

                                    <?= date(
                                        'd-m-Y',
                                        strtotime($item['tanggal'])
                                    ) ?>

                                </td>

                                <td class="fw-semibold">
                                    <?= esc($item['nama_kebun']) ?>
                                </td>

                                <td>

                                    <span class="badge bg-secondary">

                                        <i class="bi bi-tag me-1"></i>

                                        <?= esc($item['nama_kategori']) ?>

                                    </span>

                                </td>

                                <td>

                                    <span class="fw-bold text-danger">

                                        Rp <?= number_format(
                                            $item['nominal'],
                                            0,
                                            ',',
                                            '.'
                                        ) ?>

                                    </span>

                                </td>

                                <td>
                                    <?= esc($item['keterangan']) ?>
                                </td>

                                <td class="text-center">

                                    <div class="btn-group">

                                        <a href="<?= site_url('biaya/edit/'.$item['id']) ?>"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <a href="<?= site_url('biaya/delete/'.$item['id']) ?>"
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