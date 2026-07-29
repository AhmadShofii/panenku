<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= esc($title ?? 'PanenKu') ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <!-- DataTables CSS -->
    <link rel="stylesheet" 
        href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

    </head>

<body class="bg-light">

    <?= $this->include('layouts/navbar') ?>

    <div class="container-fluid">

        <div class="row">

            <?= $this->include('layouts/sidebar') ?>

            <main class="col-md-10 py-4">

                <?= $this->renderSection('content') ?>

            </main>

        </div>

    </div>

    <?= $this->include('layouts/footer') ?>

    <?= $this->include('layouts/scripts') ?>

</body>

</html>