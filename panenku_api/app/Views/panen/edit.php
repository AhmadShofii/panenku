<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header bg-warning">
            <h5 class="mb-0">
                <i class="bi bi-pencil-square"></i>
                Edit Panen
            </h5>
        </div>

        <div class="card-body">

            <form action="<?= site_url('panen/update/' . $panen['id']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">

                    <label class="form-label">Kebun</label>

                    <select
                        name="kebun_id"
                        class="form-select <?= session('errors.kebun_id') ? 'is-invalid' : '' ?>">

                        <?php foreach ($kebun as $item): ?>

                            <option
                                value="<?= $item['id'] ?>"
                                <?= old('kebun_id', $panen['kebun_id']) == $item['id'] ? 'selected' : '' ?>>

                                <?= esc($item['nama_kebun']) ?>

                            </option>

                        <?php endforeach; ?>

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
                        value="<?= old('tanggal_panen', $panen['tanggal_panen']) ?>"
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
                                value="<?= old('hasil_kg', $panen['hasil_kg']) ?>"
                                class="form-control <?= session('errors.hasil_kg') ? 'is-invalid' : '' ?>">

                            <div class="invalid-feedback">
                                <?= session('errors.hasil_kg') ?>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">Harga per Kg</label>

                            <div class="input-group">

                                <span class="input-group-text">Rp</span>

                                <input
                                    type="text"
                                    id="harga_per_kg_display"
                                    value="<?= number_format(old('harga_per_kg', $panen['harga_per_kg']), 0, ',', '.') ?>"
                                    class="form-control <?= session('errors.harga_per_kg') ? 'is-invalid' : '' ?>"
                                    autocomplete="off">

                            </div>

                            <input
                                type="hidden"
                                id="harga_per_kg"
                                name="harga_per_kg"
                                value="<?= old('harga_per_kg', $panen['harga_per_kg']) ?>">

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
                        class="form-control"><?= old('catatan', $panen['catatan']) ?></textarea>

                </div>

                <div class="d-flex justify-content-between">

                    <a href="<?= site_url('panen') ?>" class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                    <button type="submit" class="btn btn-warning">

                        <i class="bi bi-check-circle"></i>
                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const hasilInput = document.getElementById('hasil_kg');
    const hargaDisplay = document.getElementById('harga_per_kg_display');
    const hargaHidden = document.getElementById('harga_per_kg');
    const totalInput = document.getElementById('total_harga');

    function formatRupiah(angka) {
        return angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    function hitungTotal() {

        const hasil = parseFloat(hasilInput.value) || 0;
        const harga = parseFloat(hargaHidden.value) || 0;

        const total = hasil * harga;

        totalInput.value = 'Rp ' + total.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

    }

    hargaDisplay.addEventListener('input', function () {

        let angka = this.value.replace(/\D/g, '');

        hargaHidden.value = angka;

        this.value = formatRupiah(angka);

        hitungTotal();

    });

    hasilInput.addEventListener('input', hitungTotal);

    hitungTotal();

});
</script>

<?= $this->endSection() ?>