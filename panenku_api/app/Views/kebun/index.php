<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>
            <h2 class="fw-bold mb-1">
                <?= esc($title) ?>
            </h2>

            <p class="text-muted mb-0">
                Kelola data kebun yang Anda miliki.
            </p>
        </div>

        <a href="<?= site_url('kebun/create') ?>"
           class="btn btn-success px-4">

            <i class="bi bi-plus-circle me-2"></i>
            Tambah Kebun

        </a>

    </div>


    <?php if (empty($kebun)): ?>

        <div class="card shadow-sm border-0">

            <div class="card-body text-center py-5">

                <i class="bi bi-tree-fill display-1 text-success"></i>

                <h3 class="fw-bold mt-3">
                    Belum Ada Data Kebun
                </h3>

                <p class="text-muted mx-auto" style="max-width:500px;">
                    Tambahkan kebun pertama Anda untuk mulai mencatat
                    hasil panen, biaya operasional, dan laporan.
                </p>

                <a href="<?= site_url('kebun/create') ?>"
                   class="btn btn-success btn-lg mt-3">

                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Kebun

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
                                <th width="70">No</th>
                                <th>Nama Kebun</th>
                                <th>Lokasi</th>
                                <th>Luas</th>
                                <th>Tanaman</th>
                                <th width="150" class="text-center">Aksi</th>
                            </tr>

                        </thead>


                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($kebun as $item): ?>

                            <tr>

                                <td>
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <strong>
                                        <?= esc($item['nama_kebun']) ?>
                                    </strong>
                                </td>

                                <td>
                                    <i class="bi bi-geo-alt text-danger me-1"></i>
                                    <?= esc($item['lokasi']) ?>
                                </td>

                                <td>
                                    <span class="badge bg-success-subtle text-success">
                                        <?= number_format((float)$item['luas'],2,',','.') ?>
                                        Ha
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-warning-subtle text-dark">
                                        <i class="bi bi-tree me-1"></i>
                                        <?= esc($item['jenis_tanaman']) ?>
                                    </span>
                                </td>

                                <td class="text-center">

                                    <div class="btn-group">

                                        <a href="<?= site_url('kebun/edit/'.$item['id']) ?>"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <a href="<?= site_url('kebun/delete/'.$item['id']) ?>"
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