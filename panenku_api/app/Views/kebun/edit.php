<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container">

    <h3 class="mb-4">Edit Kebun</h3>

    <div class="card">
        <div class="card-body">

            <form action="<?= site_url('kebun/update/' . $kebun['id']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label>Nama Kebun</label>

                    <input
                        type="text"
                        name="nama_kebun"
                        value="<?= old('nama_kebun', $kebun['nama_kebun']) ?>"
                        class="form-control <?= $validation->hasError('nama_kebun') ? 'is-invalid' : '' ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_kebun') ?>
                    </div>

                </div>

                <div class="mb-3">

                    <label>Lokasi</label>

                    <textarea
                        name="lokasi"
                        class="form-control"><?= old('lokasi', $kebun['lokasi']) ?></textarea>

                </div>

                <div class="mb-3">

                    <label>Luas (Ha)</label>

                    <input
                        type="number"
                        step="0.01"
                        name="luas"
                        value="<?= old('luas', $kebun['luas']) ?>"
                        class="form-control <?= $validation->hasError('luas') ? 'is-invalid' : '' ?>">

                    <div class="invalid-feedback">
                        <?= $validation->getError('luas') ?>
                    </div>

                </div>

                <div class="mb-3">

                    <label>Jenis Tanaman</label>

                    <input
                        type="text"
                        name="jenis_tanaman"
                        value="<?= old('jenis_tanaman', $kebun['jenis_tanaman']) ?>"
                        class="form-control">

                </div>

                <button class="btn btn-success">
                    Update
                </button>

                <a href="<?= site_url('kebun') ?>" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>