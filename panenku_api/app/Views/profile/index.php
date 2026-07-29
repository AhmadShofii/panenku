<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Profile
            </h2>

            <p class="text-muted mb-0">
                Informasi akun Anda
            </p>

        </div>

        <a href="<?= site_url('profile/edit') ?>"
            class="btn btn-success">

            <i class="bi bi-pencil-square me-2"></i>

            Edit Profile

        </a>

        <a href="<?= site_url('auth/forgot') ?>"
    class="btn btn-outline-warning mt-2">

    <i class="bi bi-key-fill me-2"></i>

    Ganti Password

</a>

    </div>

    <div class="row g-4">

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center py-5">

                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                        style="width:120px;height:120px;">

                        <i class="bi bi-person-fill text-success"
                            style="font-size:60px;"></i>

                    </div>

                    <h3 class="fw-bold mt-4">

                        <?= esc($user->username) ?>

                    </h3>

                    <p class="text-muted">

                        <?= esc($user->getEmail()) ?>

                    </p>

                    <span class="badge bg-success">

                        User

                    </span>

                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-0">

                        Detail Akun

                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-borderless align-middle">

                        <tr>

                            <th width="200">
                                User ID
                            </th>

                            <td>

                                <?= $user->id ?>

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Username
                            </th>

                            <td>

                                <?= esc($user->username) ?>

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Email
                            </th>

                            <td>

                                <?= esc($user->getEmail()) ?>

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Bergabung
                            </th>

                            <td>

                                <?= date('d F Y', strtotime($user->created_at)) ?>

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-4 g-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center">

                    <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">

                        <i class="bi bi-tree-fill text-success fs-2"></i>

                    </div>

                    <h2 class="fw-bold">

                        <?= $stats['totalKebun'] ?>

                    </h2>

                    <p class="text-muted mb-0">

                        Total Kebun

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center">

                    <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">

                        <i class="bi bi-basket-fill text-warning fs-2"></i>

                    </div>

                    <h2 class="fw-bold">

                        <?= number_format($stats['totalPanenKg'],2,',','.') ?>

                    </h2>

                    <p class="text-muted mb-0">

                        Total Panen (Kg)

                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center">

                    <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">

                        <i class="bi bi-cash-stack text-primary fs-2"></i>

                    </div>

                    <h5 class="fw-bold">

                        Rp <?= number_format($stats['totalPendapatan'],0,',','.') ?>

                    </h5>

                    <p class="text-muted mb-0">

                        Total Pendapatan

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>