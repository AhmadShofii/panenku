/* =====================================
   PANENKU GLOBAL JAVASCRIPT
===================================== */


document.addEventListener('DOMContentLoaded', function () {


    // PAGE LOAD ANIMATION
    document.body.classList.add('page-loaded');



    // DELETE CONFIRMATION GLOBAL

    document.addEventListener('click', function (e) {

        const button = e.target.closest('.btn-delete');


        if (!button) {
            return;
        }


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


        }).then((result)=>{


            if(result.isConfirmed){

                window.location.href =
                button.href;

            }


        });


    });





    // DATATABLE GLOBAL

    if(typeof $ !== 'undefined'){


        $('.datatable').each(function(){


            if(!$.fn.DataTable.isDataTable(this)){


                $(this).DataTable({

                    language:{


                        search:'Cari:',


                        lengthMenu:
                        'Tampilkan _MENU_ data',


                        zeroRecords:
                        'Data tidak ditemukan',


                        info:
                        'Menampilkan _START_ - _END_ dari _TOTAL_ data',


                        infoEmpty:
                        'Belum ada data',


                        paginate:{


                            previous:'Sebelumnya',


                            next:'Berikutnya'


                        }


                    }


                });


            }


        });


    }





    // AUTO CLOSE MOBILE SIDEBAR

    document.querySelectorAll('.offcanvas a')
    .forEach(link=>{


        link.addEventListener('click',()=>{


            const sidebar =
            document.querySelector('.offcanvas');


            if(sidebar){


                const instance =
                bootstrap.Offcanvas.getInstance(sidebar);


                if(instance){

                    instance.hide();

                }


            }


        });


    });



});






/* =====================================
   FORMAT RUPIAH
===================================== */


function formatRupiah(input){


    if(!input){
        return;
    }


    input.addEventListener('input',function(){


        let angka =
        this.value.replace(/\D/g,'');



        this.value =
        angka.replace(
            /\B(?=(\d{3})+(?!\d))/g,
            '.'
        );


    });


}