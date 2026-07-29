<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Ubah Password
        </h2>

        <p class="text-muted mb-0">
            Perbarui keamanan akun Anda.
        </p>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-6">


            <div class="card border-0 shadow-sm">


                <div class="card-header bg-warning py-3">

                    <h5 class="mb-0 fw-bold">

                        <i class="bi bi-key-fill me-2"></i>

                        Ganti Password

                    </h5>

                </div>



                <div class="card-body p-4">


                    <form action="<?= site_url('profile/password/update') ?>"
                          method="post">


                        <?= csrf_field() ?>



                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Password Lama

                            </label>


                            <input type="password"
                                   name="password_lama"
                                   class="form-control <?= session('errors.password_lama') ? 'is-invalid':'' ?>"
                                   required>


                            <div class="invalid-feedback">

                                <?= session('errors.password_lama') ?>

                            </div>


                        </div>




                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Password Baru

                            </label>


                            <input type="password"
                                   name="password_baru"
                                   class="form-control <?= session('errors.password_baru') ? 'is-invalid':'' ?>"
                                   required>


                            <div class="invalid-feedback">

                                <?= session('errors.password_baru') ?>

                            </div>


                        </div>




                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Konfirmasi Password Baru

                            </label>


                            <input type="password"
                                   name="konfirmasi_password"
                                   class="form-control <?= session('errors.konfirmasi_password') ? 'is-invalid':'' ?>"
                                   required>


                            <div class="invalid-feedback">

                                <?= session('errors.konfirmasi_password') ?>

                            </div>


                        </div>




                        <div class="d-flex justify-content-between">


                            <a href="<?= site_url('profile') ?>"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left me-2"></i>

                                Kembali

                            </a>




                            <button type="submit"
                                    class="btn btn-warning">

                                <i class="bi bi-check-circle me-2"></i>

                                Simpan Password

                            </button>


                        </div>



                    </form>


                </div>


            </div>


        </div>


    </div>


</div>


<?= $this->endSection() ?>