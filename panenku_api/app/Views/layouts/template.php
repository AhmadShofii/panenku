<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= esc($title ?? 'PanenKu') ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

    <style>
        body {
            background: #f8f9fa;
            overflow-x: hidden;
        }

        main {
            min-height: calc(100vh - 120px);
        }

        .card {
            border-radius: 12px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .btn {
            border-radius: 8px;
        }

        @media (max-width: 768px) {

            main {
                padding: 1rem !important;
            }

            h2,
            h3,
            h4 {
                font-size: 1.4rem;
            }

            .card-body {
                padding: 1rem;
            }

            .table {
                font-size: .9rem;
            }

            .btn {
                width: 100%;
                margin-bottom: .5rem;
            }

            .btn-sm {
                width: auto;
                margin-bottom: 0;
            }

        }
    </style>

</head>

<body>

    <?= $this->include('layouts/navbar') ?>

    <div class="container-fluid">

        <div class="row">

            <?= $this->include('layouts/sidebar') ?>

            <main class="col-lg-10 col-md-9 col-12 py-4 px-lg-4 px-3">

                <?= $this->renderSection('content') ?>

            </main>

        </div>

    </div>

    <?= $this->include('layouts/footer') ?>

    <?= $this->include('layouts/scripts') ?>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (session()->getFlashdata('success')) : ?>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= session()->getFlashdata('success') ?>',
                timer: 1800,
                showConfirmButton: false
            });
        </script>

    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>

        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= session()->getFlashdata('error') ?>'
            });
        </script>

    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            document.querySelectorAll('.btn-delete').forEach(button => {

                button.addEventListener('click', function(e) {

                    e.preventDefault();

                    Swal.fire({

                        title: 'Yakin ingin menghapus?',

                        text: 'Data yang dihapus tidak dapat dikembalikan.',

                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonColor: '#198754',

                        cancelButtonColor: '#dc3545',

                        confirmButtonText: 'Ya, Hapus',

                        cancelButtonText: 'Batal'

                    }).then((result) => {

                        if (result.isConfirmed) {

                            window.location.href = this.href;

                        }

                    });

                });

            });

        });
    </script>

</body>

</html>