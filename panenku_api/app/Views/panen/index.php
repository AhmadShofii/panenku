<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3><?= esc($title) ?></h3>

        <a href="<?= site_url('panen/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Tambah Panen
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <?php if (empty($panen)) : ?>

                <div class="text-center py-5">

                    <i class="bi bi-basket display-3 text-success"></i>

                    <h5 class="mt-3">Belum ada data panen.</h5>

                    <a href="<?= site_url('panen/create') ?>" class="btn btn-success mt-3">
                        Tambah Panen
                    </a>

                </div>

            <?php else : ?>

                <div class="table-responsive">

                    <table id="tablePanen" class="table table-bordered table-striped align-middle">

                        <thead class="table-success">

                            <tr>

                                <th width="60">No</th>
                                <th>Tanggal</th>
                                <th>Kebun</th>
                                <th>Hasil</th>
                                <th>Harga/Kg</th>
                                <th>Total</th>
                                <th width="150">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 1; ?>

                            <?php foreach ($panen as $item) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>

                                    <td><?= date('d-m-Y', strtotime($item['tanggal_panen'])) ?></td>

                                    <td><?= esc($item['nama_kebun']) ?></td>

                                    <td><?= number_format($item['hasil_kg'],2) ?> Kg</td>

                                    <td>
                                        Rp <?= number_format($item['harga_per_kg'],0,',','.') ?>
                                    </td>

                                    <td>
                                        Rp <?= number_format($item['total_harga'],0,',','.') ?>
                                    </td>

                                    <td>

                                        <a href="<?= site_url('panen/edit/'.$item['id']) ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="<?= site_url('panen/delete/'.$item['id']) ?>"
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

$(document).ready(function(){

    if(!$.fn.DataTable.isDataTable('#tablePanen')){

        $('#tablePanen').DataTable({

            language:{

                search:"Cari :",

                lengthMenu:"Tampilkan _MENU_ data",

                zeroRecords:"Data tidak ditemukan",

                info:"Menampilkan _START_ - _END_ dari _TOTAL_ data",

                paginate:{
                    previous:"Sebelumnya",
                    next:"Berikutnya"
                }

            }

        });

    }

    $('.btn-delete').click(function(e){

        e.preventDefault();

        let url=$(this).attr('href');

        Swal.fire({

            title:'Hapus Panen?',

            text:'Data yang dihapus tidak dapat dikembalikan.',

            icon:'warning',

            showCancelButton:true,

            confirmButtonColor:'#198754',

            cancelButtonColor:'#dc3545',

            confirmButtonText:'Ya, Hapus',

            cancelButtonText:'Batal'

        }).then((result)=>{

            if(result.isConfirmed){

                window.location.href=url;

            }

        });

    });

});
</script>

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

<?php if(session()->getFlashdata('error')): ?>

<script>

Swal.fire({

    icon:'error',

    title:'Gagal',

    text:'<?= session()->getFlashdata('error') ?>'

});

</script>

<?php endif; ?>

<?= $this->endSection() ?>