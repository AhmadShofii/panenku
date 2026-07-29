<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>
        <?= esc($title ?? 'PanenKu') ?>
    </title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">


    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
          rel="stylesheet">


    <!-- DataTables -->
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css"
          rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>"
          rel="stylesheet">


</head>


<body>


<div class="d-flex flex-column min-vh-100">


    <!-- Navbar -->

    <?= $this->include('layouts/navbar') ?>



    <!-- Main -->

    <div class="container-fluid flex-grow-1">


        <div class="row">


            <!-- Sidebar -->

            <?= $this->include('layouts/sidebar') ?>



            <!-- Content -->

            <main class="col-lg-10 col-md-9 col-12 py-4 px-lg-4 px-3 page-animation">


                <?= $this->renderSection('content') ?>


            </main>


        </div>


    </div>





    <!-- Footer -->

    <?= $this->include('layouts/footer') ?>


</div>





<!-- Scripts -->

<?= $this->include('layouts/scripts') ?>



<!-- SweetAlert -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- App JS -->

<script src="<?= base_url('assets/js/app.js') ?>"></script>






<!-- SUCCESS ALERT -->

<?php if(session()->getFlashdata('success')): ?>

<script>

Swal.fire({

    icon:'success',

    title:'Berhasil',

    text:'<?= session()->getFlashdata('success') ?>',

    timer:1800,

    showConfirmButton:false

});

</script>

<?php endif; ?>






<!-- ERROR ALERT -->

<?php if(session()->getFlashdata('error')): ?>

<script>

Swal.fire({

    icon:'error',

    title:'Gagal',

    text:'<?= session()->getFlashdata('error') ?>'

});

</script>

<?php endif; ?>




</body>

</html>