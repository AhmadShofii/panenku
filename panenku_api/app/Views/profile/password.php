<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-6">


<div class="card shadow-sm border-0">


<div class="card-header bg-warning">

<h5 class="mb-0">

<i class="bi bi-key-fill"></i>
Ubah Password

</h5>

</div>



<div class="card-body">


<form action="<?= site_url('profile/password/update') ?>"
method="post">


<?= csrf_field() ?>



<div class="mb-3">

<label class="form-label">
Password Lama
</label>


<input
type="password"
name="password_lama"
class="form-control <?= session('errors.password_lama') ? 'is-invalid':'' ?>"
required>


<div class="invalid-feedback">

<?= session('errors.password_lama') ?>

</div>


</div>




<div class="mb-3">

<label class="form-label">
Password Baru
</label>


<input
type="password"
name="password_baru"
class="form-control <?= session('errors.password_baru') ? 'is-invalid':'' ?>"
required>


<div class="invalid-feedback">

<?= session('errors.password_baru') ?>

</div>


</div>




<div class="mb-3">

<label class="form-label">
Konfirmasi Password Baru
</label>


<input
type="password"
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

Kembali

</a>



<button class="btn btn-warning">

<i class="bi bi-check-circle"></i>

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