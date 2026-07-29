<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h3 class="fw-bold mb-1"><?= esc($title) ?></h3>
            <p class="text-muted mb-0">
                Kelola seluruh data biaya operasional kebun Anda.
            </p>
        </div>

        <a href="<?= site_url('biaya/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Biaya
        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <?php if (empty($biaya)) : ?>

                <div class="text-center py-5">

                    <div class="mb-4">
                        <i class="bi bi-wallet2 display-1 text-success opacity-75"></i>
                    </div>

                    <h3 class="fw-bold">
                        Belum Ada Data Biaya
                    </h3>

                    <p class="text-muted mx-auto mb-4" style="max-width:520px;">
                        Catat seluruh biaya operasional kebun seperti pupuk,
                        bibit, pestisida, tenaga kerja, dan pengeluaran lainnya
                        agar laporan keuangan menjadi lebih akurat.
                    </p>

                    <a href="<?= site_url('biaya/create') ?>" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Biaya
                    </a>

                </div>

            <?php else : ?>

                <div class="table-responsive">

                    <table id="tableBiaya"
                        class="table table-bordered table-hover table-striped align-middle">

                        <thead class="table-success">

                            <tr>
                                <th width="60">No</th>
                                <th>Tanggal</th>
                                <th>Kebun</th>
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th width="150" class="text-center">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($biaya as $item) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>

                                    <td>
                                        <?= date('d-m-Y', strtotime($item['tanggal'])) ?>
                                    </td>

                                    <td class="fw-semibold">
                                        <?= esc($item['nama_kebun']) ?>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">
                                            <?= esc($item['nama_kategori']) ?>
                                        </span>
                                    </td>

                                    <td class="fw-bold text-danger">
                                        Rp <?= number_format($item['nominal'], 0, ',', '.') ?>
                                    </td>

                                    <td>
                                        <?= esc($item['keterangan']) ?>
                                    </td>

                                    <td class="text-center">

                                        <a href="<?= site_url('biaya/edit/' . $item['id']) ?>"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="<?= site_url('biaya/delete/' . $item['id']) ?>"
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

    if (!$.fn.DataTable.isDataTable('#tableBiaya')) {

        $('#tableBiaya').DataTable({

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

            title: 'Hapus Data Biaya?',

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