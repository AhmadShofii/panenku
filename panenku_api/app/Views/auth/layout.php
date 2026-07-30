<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= esc($title ?? 'PanenKu') ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<link rel="stylesheet"
href="<?= base_url('assets/css/auth-modern.css') ?>">

</head>

<body>

<div class="auth-wrapper">

    <div class="floating-item item-one">
        🌿
    </div>

    <div class="floating-item item-two">
        🍃
    </div>

    <div class="auth-card">

        <div class="auth-form">

            <img src="<?= base_url('assets/images/logo-panenku.png') ?>"
                 class="auth-logo">

            <?= $this->renderSection('content') ?>

        </div>


        <div class="auth-image">

            <img src="<?= base_url($image ?? 'assets/images/farm-3d.png') ?>"
                 class="farm-3d">

        </div>

    </div>

</div>


<script src="<?= base_url('assets/js/auth-modern.js') ?>"></script>

</body>

</html>