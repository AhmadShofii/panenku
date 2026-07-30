<?php $image = 'assets/images/plant-3d.png'; ?>

<?= $this->extend('auth/layout') ?>

<?= $this->section('content') ?>

<h1 class="auth-title">
    Buat Akun PanenKu
</h1>

<p class="auth-subtitle">
    Mulai kelola kebun lebih mudah.
</p>


<?php if(session()->getFlashdata('error')): ?>

<div class="alert alert-danger">

<?= session()->getFlashdata('error') ?>

</div>

<?php endif; ?>


<form action="<?= url_to('register') ?>" method="post">

<?= csrf_field() ?>


<div class="input-group-modern">

<i class="bi bi-envelope-fill"></i>

<input type="email"
       name="email"
       placeholder="Email"
       value="<?= old('email') ?>"
       autocomplete="email"
       required>

</div>


<div class="input-group-modern">

<i class="bi bi-lock-fill"></i>

<input type="password"
       name="password"
       placeholder="Password"
       autocomplete="new-password"
       required>

</div>


<div class="input-group-modern">

<i class="bi bi-shield-lock-fill"></i>

<input type="password"
       name="password_confirm"
       placeholder="Konfirmasi Password"
       autocomplete="new-password"
       required>

</div>


<button type="submit" class="btn-auth">

<i class="bi bi-person-plus-fill me-2"></i>

Daftar

</button>


<p class="auth-link">

Sudah punya akun?

<a href="<?= url_to('login') ?>">
    Login
</a>

</p>


</form>


<?= $this->endSection() ?>