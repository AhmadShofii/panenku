<?php $image = 'assets/images/farm-3d.png'; ?>

<?= $this->extend('auth/layout') ?>

<?= $this->section('content') ?>

<h1 class="auth-title">
    Masuk ke PanenKu
</h1>

<p class="auth-subtitle">
    Kelola kebun lebih mudah dan modern.
</p>

<?php if(session()->getFlashdata('error')): ?>

<div class="alert alert-danger">
    <?= session()->getFlashdata('error') ?>
</div>

<?php endif; ?>


<form action="<?= url_to('login') ?>" method="post">

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
           autocomplete="current-password"
           required>

</div>


<?php if(setting('Auth.sessionConfig')['allowRemembering']): ?>

<div class="form-check mb-3">

<input type="checkbox"
       class="form-check-input"
       name="remember"
       <?= old('remember') ? 'checked' : '' ?>>

<label class="form-check-label">
    Ingat saya
</label>

</div>

<?php endif; ?>


<button type="submit" class="btn-auth">

<i class="bi bi-box-arrow-in-right me-2"></i>

Masuk

</button>


<p class="auth-link">

<a href="<?= site_url('forgot-password') ?>">
    Lupa password?
</a>

</p>

<?php if(setting('Auth.allowRegistration')): ?>

<p class="auth-link">

Belum punya akun?

<a href="<?= url_to('register') ?>">
    Daftar sekarang
</a>

</p>

<?php endif; ?>


</form>


<?= $this->endSection() ?>