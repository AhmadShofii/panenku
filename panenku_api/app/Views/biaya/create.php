<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Tambah Biaya</h5>
        </div>

        <div class="card-body">

            <form action="<?= site_url('biaya/store') ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Kebun</label>

                    <select name="kebun_id" class="form-select" required>

                        <option value="">-- Pilih Kebun --</option>

                        <?php foreach ($kebun as $item) : ?>

                            <option value="<?= $item['id'] ?>">
                                <?= esc($item['nama_kebun']) ?>
                            </option>

                        <?php endforeach ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori Biaya</label>

                    <select name="kategori_id" class="form-select" required>

                        <option value="">-- Pilih Kategori --</option>

                        <?php foreach ($kategori as $item) : ?>

                            <option value="<?= $item['id'] ?>">
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
                        value="<?= date('Y-m-d') ?>"
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
                            placeholder="Contoh: 350.000"
                            autocomplete="off"
                            required>
                    </div>

                    <input
                        type="hidden"
                        name="nominal"
                        id="nominal">

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
                        class="form-control"
                        placeholder="Masukkan keterangan"></textarea>
                </div>

                <div class="d-flex justify-content-end">

                    <a href="<?= site_url('biaya') ?>"
                        class="btn btn-secondary me-2">

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-success">

                        Simpan

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

        // Ambil hanya angka
        let angka = this.value.replace(/\D/g, '');

        // Simpan nilai asli ke input hidden
        hidden.value = angka;

        // Tampilkan format ribuan
        this.value = angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    });

});
</script>

<?= $this->endSection() ?>