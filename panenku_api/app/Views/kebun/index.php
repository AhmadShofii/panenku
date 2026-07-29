<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><?= esc($title) ?></h3>

        <a href="<?= site_url('kebun/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Tambah Kebun
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <?php if (empty($kebun)) : ?>

                <div class="text-center py-5">

                    <i class="bi bi-tree display-3 text-success"></i>

                    <h5 class="mt-3">Belum ada data kebun.</h5>

                    <a href="<?= site_url('kebun/create') ?>" class="btn btn-success mt-3">
                        Tambah Kebun
                    </a>

                </div>

            <?php else : ?>

                <div class="table-responsive">

                    <table id="tableKebun" class="table table-bordered table-hover align-middle">

                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>Nama Kebun</th>
                                <th>Lokasi</th>
                                <th>Luas</th>
                                <th>Jenis Tanaman</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($kebun as $item) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>

                                    <td><?= esc($item['nama_kebun']) ?></td>

                                    <td><?= esc($item['lokasi']) ?></td>

                                    <td><?= number_format((float) $item['luas'], 2) ?> Ha</td>

                                    <td><?= esc($item['jenis_tanaman']) ?></td>

                                    <td>

                                        <a href="<?= site_url('kebun/edit/' . $item['id']) ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="<?= site_url('kebun/delete/' . $item['id']) ?>"
                                            class="btn btn-danger btn-sm btn-delete">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach ?>

                        </tbody>

                    </table>

                </div>

            <?php endif ?>

        </div>
    </div>

</div>

<script>
$(document).ready(function() {

    if (!$.fn.DataTable.isDataTable('#tableKebun')) {

        $('#tableKebun').DataTable({

            language: {

                search: "Cari :",

                lengthMenu: "Tampilkan _MENU_ data",

                zeroRecords: "Data tidak ditemukan",

                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",

                infoEmpty: "Belum ada data",

                paginate: {

                    previous: "Sebelumnya",

                    next: "Berikutnya"

                }

            }

        });

    }

    $('.btn-delete').click(function(e) {

        e.preventDefault();

        let url = $(this).attr('href');

        Swal.fire({

            title: 'Hapus data?',

            text: 'Data yang dihapus tidak dapat dikembalikan.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#198754',

            cancelButtonColor: '#dc3545',

            confirmButtonText: 'Ya, Hapus',

            cancelButtonText: 'Batal'

        }).then((result) => {

            if (result.isConfirmed) {

                window.location.href = url;

            }

        });

    });

});
</script>

<?php if (session()->getFlashdata('success')) : ?>

<script>
Swal.fire({

    icon: 'success',

    title: 'Berhasil',

    text: '<?= session()->getFlashdata('success') ?>',

    timer: 2000,

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

<?= $this->endSection() ?>