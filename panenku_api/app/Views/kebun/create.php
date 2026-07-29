<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Tambah Kebun</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <form action="<?= site_url('kebun/store') ?>" method="post">

            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Nama Kebun</label>
                <input
                    type="text"
                    class="form-control"
                    name="nama_kebun"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input
                    type="text"
                    class="form-control"
                    name="lokasi">
            </div>

            <div class="mb-3">
                <label class="form-label">Luas (Ha)</label>
                <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="luas">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Tanaman</label>
                <input
                    type="text"
                    class="form-control"
                    name="jenis_tanaman">
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="<?= site_url('kebun') ?>" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

<?= $this->endSection() ?>