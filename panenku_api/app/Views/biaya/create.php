<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Tambah Biaya
        </h2>

        <p class="text-muted mb-0">
            Catat pengeluaran operasional kebun.
        </p>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <form action="<?= site_url('biaya/store') ?>"
                          method="post">

                        <?= csrf_field() ?>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-tree-fill text-success me-2"></i>
                                Pilih Kebun

                            </label>

                            <select name="kebun_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Kebun --
                                </option>

                                <?php foreach ($kebun as $item): ?>

                                    <option value="<?= $item['id'] ?>">

                                        <?= esc($item['nama_kebun']) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-tags-fill text-warning me-2"></i>
                                Kategori Biaya

                            </label>


                            <select name="kategori_id"
                                    class="form-select"
                                    required>


                                <option value="">
                                    -- Pilih Kategori --
                                </option>


                                <?php foreach ($kategori as $item): ?>

                                    <option value="<?= $item['id'] ?>">

                                        <?= esc($item['nama_kategori']) ?>

                                    </option>

                                <?php endforeach; ?>


                            </select>

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-calendar-event text-primary me-2"></i>
                                Tanggal

                            </label>


                            <input type="date"
                                   name="tanggal"
                                   value="<?= date('Y-m-d') ?>"
                                   class="form-control"
                                   required>

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-cash-stack text-danger me-2"></i>
                                Nominal Biaya

                            </label>


                            <div class="input-group">

                                <span class="input-group-text">
                                    Rp
                                </span>


                                <input type="text"
                                       id="nominal_display"
                                       class="form-control"
                                       placeholder="Contoh: 350.000"
                                       autocomplete="off"
                                       required>

                            </div>


                            <input type="hidden"
                                   name="nominal"
                                   id="nominal">


                            <small class="text-muted">
                                Masukkan angka tanpa titik,
                                sistem akan memformat otomatis.
                            </small>

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-card-text me-2"></i>
                                Keterangan

                            </label>


                            <textarea name="keterangan"
                                      rows="4"
                                      class="form-control"
                                      placeholder="Contoh: Pembelian pupuk"><?= old('keterangan') ?></textarea>

                        </div>


                        <div class="d-flex justify-content-between">

                            <a href="<?= site_url('biaya') ?>"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left me-2"></i>
                                Kembali

                            </a>


                            <button type="submit"
                                    class="btn btn-success px-4">

                                <i class="bi bi-save me-2"></i>
                                Simpan

                            </button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded',()=>{

    const display=document.getElementById('nominal_display');
    const hidden=document.getElementById('nominal');

    display.addEventListener('input',function(){

        let angka=this.value.replace(/\D/g,'');

        hidden.value=angka;

        this.value=angka.replace(
            /\B(?=(\d{3})+(?!\d))/g,
            '.'
        );

    });

});
</script>


<?= $this->endSection() ?>