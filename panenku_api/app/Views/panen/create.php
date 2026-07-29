<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header bg-success text-white">
            <h5 class="mb-0">
                <i class="bi bi-plus-circle"></i>
                Tambah Panen
            </h5>
        </div>

        <div class="card-body">

            <form action="<?= site_url('panen/store') ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Kebun</label>

                    <select name="kebun_id"
                        class="form-select <?= session('errors.kebun_id') ? 'is-invalid' : '' ?>">

                        <option value="">-- Pilih Kebun --</option>

                        <?php foreach ($kebun as $item): ?>

                            <option value="<?= $item['id'] ?>"
                                <?= old('kebun_id') == $item['id'] ? 'selected' : '' ?>>

                                <?= esc($item['nama_kebun']) ?>

                            </option>

                        <?php endforeach ?>

                    </select>

                    <div class="invalid-feedback">
                        <?= session('errors.kebun_id') ?>
                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">Tanggal Panen</label>

                    <input
                        type="date"
                        name="tanggal_panen"
                        value="<?= old('tanggal_panen', date('Y-m-d')) ?>"
                        class="form-control <?= session('errors.tanggal_panen') ? 'is-invalid' : '' ?>">

                    <div class="invalid-feedback">
                        <?= session('errors.tanggal_panen') ?>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">Hasil Panen (Kg)</label>

                            <input
                                type="number"
                                step="0.01"
                                id="hasil_kg"
                                name="hasil_kg"
                                value="<?= old('hasil_kg') ?>"
                                class="form-control <?= session('errors.hasil_kg') ? 'is-invalid' : '' ?>">

                            <div class="invalid-feedback">
                                <?= session('errors.hasil_kg') ?>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">Harga per Kg</label>

                            <input
                                type="number"
                                step="0.01"
                                id="harga_per_kg"
                                name="harga_per_kg"
                                value="<?= old('harga_per_kg') ?>"
                                class="form-control <?= session('errors.harga_per_kg') ? 'is-invalid' : '' ?>">

                            <div class="invalid-feedback">
                                <?= session('errors.harga_per_kg') ?>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">Total Harga</label>

                    <input
                        type="text"
                        id="total_harga"
                        class="form-control"
                        readonly>

                </div>

                <div class="mb-3">

                    <label class="form-label">Catatan</label>

                    <textarea
                        name="catatan"
                        rows="4"
                        class="form-control"><?= old('catatan') ?></textarea>

                </div>

                <div class="d-flex justify-content-between">

                    <a href="<?= site_url('panen') ?>" class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                    <button class="btn btn-success">

                        <i class="bi bi-check-circle"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

function hitungTotal() {

    let hasil = parseFloat(document.getElementById('hasil_kg').value) || 0;

    let harga = parseFloat(document.getElementById('harga_per_kg').value) || 0;

    let total = hasil * harga;

    document.getElementById('total_harga').value =
        'Rp ' + total.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

}

document.getElementById('hasil_kg').addEventListener('input', hitungTotal);

document.getElementById('harga_per_kg').addEventListener('input', hitungTotal);

window.onload = hitungTotal;

</script>

<?= $this->endSection() ?>