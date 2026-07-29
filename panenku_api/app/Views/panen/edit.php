<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">
            Edit Panen
        </h2>

        <p class="text-muted mb-0">
            Perbarui data hasil panen dan pendapatan kebun.
        </p>
    </div>


    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <form action="<?= site_url('panen/update/'.$panen['id']) ?>"
                          method="post">

                        <?= csrf_field() ?>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-tree-fill text-success me-2"></i>
                                Pilih Kebun

                            </label>


                            <select name="kebun_id"
                                class="form-select <?= session('errors.kebun_id') ? 'is-invalid':'' ?>">


                                <?php foreach ($kebun as $item): ?>

                                    <option value="<?= $item['id'] ?>"
                                        <?= old('kebun_id',$panen['kebun_id']) == $item['id'] ? 'selected':'' ?>>

                                        <?= esc($item['nama_kebun']) ?>

                                    </option>

                                <?php endforeach; ?>


                            </select>


                            <div class="invalid-feedback">
                                <?= session('errors.kebun_id') ?>
                            </div>

                        </div>



                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-calendar-event text-primary me-2"></i>
                                Tanggal Panen

                            </label>


                            <input type="date"
                                name="tanggal_panen"
                                value="<?= old('tanggal_panen',$panen['tanggal_panen']) ?>"
                                class="form-control <?= session('errors.tanggal_panen') ? 'is-invalid':'' ?>">


                            <div class="invalid-feedback">
                                <?= session('errors.tanggal_panen') ?>
                            </div>

                        </div>



                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-4">

                                    <label class="form-label fw-semibold">

                                        <i class="bi bi-basket text-success me-2"></i>
                                        Hasil Panen (Kg)

                                    </label>


                                    <input type="number"
                                        step="0.01"
                                        id="hasil_kg"
                                        name="hasil_kg"
                                        value="<?= old('hasil_kg',$panen['hasil_kg']) ?>"
                                        class="form-control <?= session('errors.hasil_kg') ? 'is-invalid':'' ?>">


                                    <div class="invalid-feedback">
                                        <?= session('errors.hasil_kg') ?>
                                    </div>

                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="mb-4">

                                    <label class="form-label fw-semibold">

                                        <i class="bi bi-cash text-warning me-2"></i>
                                        Harga / Kg

                                    </label>


                                    <div class="input-group">

                                        <span class="input-group-text">
                                            Rp
                                        </span>


                                        <input type="text"
                                            id="harga_per_kg_display"
                                            value="<?= number_format(old('harga_per_kg',$panen['harga_per_kg']),0,',','.') ?>"
                                            class="form-control"
                                            autocomplete="off">

                                    </div>


                                    <input type="hidden"
                                        id="harga_per_kg"
                                        name="harga_per_kg"
                                        value="<?= old('harga_per_kg',$panen['harga_per_kg']) ?>">


                                    <div class="invalid-feedback">
                                        <?= session('errors.harga_per_kg') ?>
                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Total Pendapatan
                            </label>


                            <input type="text"
                                id="total_harga"
                                class="form-control fw-bold"
                                readonly>

                        </div>



                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-card-text me-2"></i>
                                Catatan

                            </label>


                            <textarea name="catatan"
                                rows="4"
                                class="form-control"><?= old('catatan',$panen['catatan']) ?></textarea>

                        </div>



                        <div class="d-flex justify-content-between">


                            <a href="<?= site_url('panen') ?>"
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

    const hasil=document.getElementById('hasil_kg');
    const hargaDisplay=document.getElementById('harga_per_kg_display');
    const harga=document.getElementById('harga_per_kg');
    const total=document.getElementById('total_harga');

    function formatRupiah(value){
        return value.replace(/\B(?=(\d{3})+(?!\d))/g,'.');
    }


    function hitung(){

        let hasilValue=parseFloat(hasil.value)||0;
        let hargaValue=parseFloat(harga.value)||0;

        total.value='Rp '+(hasilValue*hargaValue)
            .toLocaleString('id-ID');

    }


    hargaDisplay.addEventListener('input',function(){

        let angka=this.value.replace(/\D/g,'');

        harga.value=angka;

        this.value=formatRupiah(angka);

        hitung();

    });


    hasil.addEventListener('input',hitung);


    hitung();

});
</script>


<?= $this->endSection() ?>