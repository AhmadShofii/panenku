<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Edit Profile
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi akun Anda.
            </p>

        </div>

        <a href="<?= site_url('profile') ?>"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Kembali

        </a>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-0">

                        Informasi Akun

                    </h5>

                </div>

                <div class="card-body">

                    <form action="<?= site_url('profile/update') ?>"
                        method="post">

                        <?= csrf_field() ?>

                        <div class="mb-3">

                            <label class="form-label">

                                Username

                            </label>

                            <input
                                type="text"
                                name="username"
                                class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>"
                                value="<?= old('username', $user->username) ?>"
                                required>

                            <?php if(session('errors.username')) : ?>

                                <div class="invalid-feedback">

                                    <?= session('errors.username') ?>

                                </div>

                            <?php endif; ?>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Email

                            </label>

                            <input
                                type="email"
                                class="form-control"
                                value="<?= esc($user->getEmail()) ?>"
                                readonly>

                            <small class="text-muted">

                                Email dikelola oleh sistem autentikasi (Shield).

                            </small>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Bergabung Sejak

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="<?= date('d F Y', strtotime($user->created_at)) ?>"
                                readonly>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="<?= site_url('profile') ?>"
                                class="btn btn-secondary">

                                Batal

                            </a>

                            <button
                                type="submit"
                                class="btn btn-success">

                                <i class="bi bi-check-circle me-2"></i>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>