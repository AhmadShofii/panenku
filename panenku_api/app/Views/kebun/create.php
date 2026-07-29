<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="container-fluid">


    <!-- HEADER -->

    <div class="mb-4">

        <h2 class="fw-bold mb-1">

            Tambah Kebun

        </h2>


        <p class="text-muted mb-0">

            Tambahkan informasi kebun baru Anda.

        </p>


    </div>





    <div class="row justify-content-center">


        <div class="col-lg-8">



            <div class="card shadow-sm border-0">


                <div class="card-body p-4">



                    <form action="<?= site_url('kebun/store') ?>"
                          method="post">


                        <?= csrf_field() ?>




                        <!-- Nama -->

                        <div class="mb-4">


                            <label class="form-label fw-semibold">

                                <i class="bi bi-tree-fill text-success me-2"></i>

                                Nama Kebun

                            </label>



                            <input
                                type="text"
                                name="nama_kebun"
                                value="<?= old('nama_kebun') ?>"
                                placeholder="Contoh: Kebun Sawit A"
                                class="form-control <?= $validation->hasError('nama_kebun') ? 'is-invalid' : '' ?>">



                            <div class="invalid-feedback">

                                <?= $validation->getError('nama_kebun') ?>

                            </div>


                        </div>






                        <!-- Lokasi -->


                        <div class="mb-4">


                            <label class="form-label fw-semibold">


                                <i class="bi bi-geo-alt-fill text-danger me-2"></i>

                                Lokasi


                            </label>



                            <textarea
                                name="lokasi"
                                rows="3"
                                placeholder="Masukkan lokasi kebun"
                                class="form-control"><?= old('lokasi') ?></textarea>



                        </div>







                        <!-- Luas -->


                        <div class="mb-4">


                            <label class="form-label fw-semibold">


                                <i class="bi bi-rulers text-primary me-2"></i>

                                Luas Kebun (Ha)


                            </label>



                            <input
                                type="number"
                                step="0.01"
                                name="luas"
                                value="<?= old('luas') ?>"
                                placeholder="Contoh: 2.50"
                                class="form-control <?= $validation->hasError('luas') ? 'is-invalid' : '' ?>">



                            <div class="invalid-feedback">

                                <?= $validation->getError('luas') ?>

                            </div>


                        </div>







                        <!-- Tanaman -->


                        <div class="mb-4">


                            <label class="form-label fw-semibold">


                                <i class="bi bi-flower1 text-warning me-2"></i>

                                Jenis Tanaman


                            </label>



                            <input
                                type="text"
                                name="jenis_tanaman"
                                value="<?= old('jenis_tanaman') ?>"
                                placeholder="Contoh: Kelapa Sawit"
                                class="form-control">


                        </div>







                        <div class="d-flex gap-2">


                            <button class="btn btn-success px-4">


                                <i class="bi bi-save me-2"></i>

                                Simpan


                            </button>




                            <a href="<?= site_url('kebun') ?>"
                               class="btn btn-secondary px-4">


                                <i class="bi bi-arrow-left me-2"></i>

                                Kembali


                            </a>


                        </div>




                    </form>


                </div>


            </div>



        </div>


    </div>


</div>



<?= $this->endSection() ?>