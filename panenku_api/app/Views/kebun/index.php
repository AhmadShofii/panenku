<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h3 class="fw-bold mb-1"><?= esc($title) ?></h3>
            <p class="text-muted mb-0">
                Kelola data kebun yang Anda miliki.
            </p>
        </div>

        <a href="<?= site_url('kebun/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Kebun
        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <?php if (empty($kebun)) : ?>

                <div class="text-center py-5">

                    <div class="mb-4">
                        <i class="bi bi-tree-fill display-1 text-success opacity-75"></i>
                    </div>

                    <h3 class="fw-bold">
                        Belum Ada Data Kebun
                    </h3>

                    <p class="text-muted mx-auto mb-4" style="max-width:500px;">
                        Tambahkan kebun pertama Anda untuk mulai mencatat
                        hasil panen, biaya operasional, serta melihat laporan
                        dan statistik kebun.
                    </p>

                    <a href="<?= site_url('kebun/create') ?>" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Kebun
                    </a>

                </div>

            <?php else : ?>

                <div class="table-responsive">

                    <table id="tableKebun"
                        class="table table-bordered table-hover table-striped align-middle">

                        <thead class="table-success">

                            <tr>
                                <th width="60">No</th>
                                <th>Nama Kebun</th>
                                <th>Lokasi</th>
                                <th>Luas</th>
                                <th>Jenis Tanaman</th>
                                <th width="150" class="text-center">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($kebun as $item) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>

                                    <td class="fw-semibold">
                                        <?= esc($item['nama_kebun']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['lokasi']) ?>
                                    </td>

                                    <td>
                                        <?= number_format((float)$item['luas'], 2, ',', '.') ?> Ha
                                    </td>

                                    <td>
                                        <?= esc($item['jenis_tanaman']) ?>
                                    </td>

                                    <td class="text-center">

                                        <a href="<?= site_url('kebun/edit/' . $item['id']) ?>"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="<?= site_url('kebun/delete/' . $item['id']) ?>"
                                            class="btn btn-danger btn-sm btn-delete"
                                            title="Hapus">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<script>
$(function () {

    if (!$.fn.DataTable.isDataTable('#tableKebun')) {

        $('#tableKebun').DataTable({

            language: {

                search: "Cari :",

                lengthMenu: "Tampilkan _MENU_ data",

                zeroRecords: "Data tidak ditemukan",

                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",

                infoEmpty: "Belum ada data",

                infoFiltered: "(difilter dari _MAX_ data)",

                paginate: {

                    previous: "Sebelumnya",

                    next: "Berikutnya"

                }

            }

        });

    }

    $('.btn-delete').click(function (e) {

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

<?= $this->endSection() ?>