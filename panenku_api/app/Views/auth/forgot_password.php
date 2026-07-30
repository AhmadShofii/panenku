<?= $this->extend('auth/layout') ?>

<?= $this->section('content') ?>

<h1 class="auth-title">
    Lupa Password?
</h1>

<p class="auth-subtitle">
    Masukkan email kamu untuk mendapatkan link pemulihan akun.
</p>

<form action="<?= site_url('forgot-password/send') ?>" method="post">

<?= csrf_field() ?>

<div class="input-group-modern">
    <i class="bi bi-envelope-fill"></i>

    <input type="email"
           name="email"
           placeholder="Email"
           required>
</div>

<button type="submit" class="btn-auth">
    <i class="bi bi-send-fill me-2"></i>
    Kirim Link Reset
</button>

<p class="auth-link">
    <a href="<?= site_url('login') ?>">
        Kembali ke Login
    </a>
</p>

</form>

<?= $this->endSection() ?>