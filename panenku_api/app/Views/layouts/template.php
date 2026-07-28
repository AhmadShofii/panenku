<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'PanenKu') ?></title>
</head>

<body>

    <?= $this->include('layouts/navbar') ?>

    <?= $this->include('layouts/sidebar') ?>

    <main>

        <?= $this->renderSection('content') ?>

    </main>

    <?= $this->include('layouts/footer') ?>

    <?= $this->include('layouts/scripts') ?>

</body>

</html>