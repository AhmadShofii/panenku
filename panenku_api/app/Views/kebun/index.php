<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Kebun</h2>

    <a href="<?= site_url('kebun/create') ?>" class="btn btn-success">
        <i class="bi bi-plus-circle"></i>
        Tambah Kebun
    </a>
</div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">

        <?php if (empty($kebun)) : ?>

            <div class="text-center py-5">

                <i class="bi bi-tree fs-1 text-secondary"></i>

                <h5 class="mt-3">Belum ada data kebun</h5>

                <p class="text-muted">
                    Silakan tambahkan kebun pertama Anda.
                </p>

            </div>

        <?php else : ?>

            <table class="table table-bordered table-hover">

                <thead class="table-success">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Kebun</th>
                        <th>Lokasi</th>
                        <th>Luas (Ha)</th>
                        <th>Jenis Tanaman</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($kebun as $item) : ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($item['nama_kebun']) ?></td>
                            <td><?= esc($item['lokasi']) ?></td>
                            <td><?= esc($item['luas']) ?></td>
                            <td><?= esc($item['jenis_tanaman']) ?></td>
                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>

        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>