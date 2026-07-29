<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Edit Biaya
        </h2>

        <p class="text-muted mb-0">
            Perbarui data pengeluaran operasional kebun.
        </p>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <form action="<?= site_url('biaya/update/'.$biaya['id']) ?>"
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


                                <?php foreach ($kebun as $item): ?>

                                    <option value="<?= $item['id'] ?>"
                                        <?= $item['id'] == $biaya['kebun_id'] ? 'selected' : '' ?>>

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


                                <?php foreach ($kategori as $item): ?>

                                    <option value="<?= $item['id'] ?>"
                                        <?= $item['id'] == $biaya['kategori_id'] ? 'selected' : '' ?>>

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
                                   value="<?= $biaya['tanggal'] ?>"
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
                                       value="<?= number_format($biaya['nominal'],0,',','.') ?>"
                                       class="form-control"
                                       autocomplete="off"
                                       required>

                            </div>


                            <input type="hidden"
                                   name="nominal"
                                   id="nominal"
                                   value="<?= $biaya['nominal'] ?>">


                            <small class="text-muted">
                                Sistem akan otomatis memformat nominal.
                            </small>

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-card-text me-2"></i>
                                Keterangan

                            </label>


                            <textarea name="keterangan"
                                      rows="4"
                                      class="form-control"><?= esc($biaya['keterangan']) ?></textarea>

                        </div>


                        <div class="d-flex justify-content-between">

                            <a href="<?= site_url('biaya') ?>"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left me-2"></i>
                                Kembali

                            </a>


                            <button type="submit"
                                    class="btn btn-warning px-4">

                                <i class="bi bi-check-circle me-2"></i>
                                Update

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