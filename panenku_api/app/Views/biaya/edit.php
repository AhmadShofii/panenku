<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Biaya</h5>
        </div>

        <div class="card-body">

            <form action="<?= site_url('biaya/update/' . $biaya['id']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">

                    <label class="form-label">Kebun</label>

                    <select name="kebun_id" class="form-select" required>

                        <?php foreach ($kebun as $item) : ?>

                            <option
                                value="<?= $item['id'] ?>"
                                <?= $item['id'] == $biaya['kebun_id'] ? 'selected' : '' ?>>

                                <?= esc($item['nama_kebun']) ?>

                            </option>

                        <?php endforeach ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Kategori Biaya</label>

                    <select name="kategori_id" class="form-select" required>

                        <?php foreach ($kategori as $item) : ?>

                            <option
                                value="<?= $item['id'] ?>"
                                <?= $item['id'] == $biaya['kategori_id'] ? 'selected' : '' ?>>

                                <?= esc($item['nama_kategori']) ?>

                            </option>

                        <?php endforeach ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Tanggal</label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="<?= $biaya['tanggal'] ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Nominal (Rp)</label>

                    <div class="input-group">

                        <span class="input-group-text">Rp</span>

                        <input
                            type="text"
                            id="nominal_display"
                            class="form-control"
                            value="<?= number_format($biaya['nominal'], 0, ',', '.') ?>"
                            autocomplete="off"
                            required>

                    </div>

                    <input
                        type="hidden"
                        name="nominal"
                        id="nominal"
                        value="<?= $biaya['nominal'] ?>">

                    <small class="text-muted">
                        Contoh: ketik <strong>350000</strong>, otomatis menjadi
                        <strong>350.000</strong>.
                    </small>

                </div>

                <div class="mb-3">

                    <label class="form-label">Keterangan</label>

                    <textarea
                        name="keterangan"
                        rows="4"
                        class="form-control"><?= esc($biaya['keterangan']) ?></textarea>

                </div>

                <div class="d-flex justify-content-end">

                    <a href="<?= site_url('biaya') ?>"
                        class="btn btn-secondary me-2">

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-warning">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const display = document.getElementById('nominal_display');
    const hidden = document.getElementById('nominal');

    display.addEventListener('input', function () {

        let angka = this.value.replace(/\D/g, '');

        hidden.value = angka;

        this.value = angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    });

});
</script>

<?= $this->endSection() ?>