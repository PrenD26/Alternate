</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2021 - <?php echo date("Y"); ?> | Design By <a href="">Alternate</a>
    </div>
    <div class="footer-right">
        v4.5
    </div>
</footer>
</div>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- BS4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- MomentJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- FullCalendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="<?= base_url('assets/stisla/js/page/modules-calendar.js') ?>"></script>
<!-- NiceScroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<!-- SummerNote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
<!-- Stisla -->
<script src="<?= base_url('assets/stisla/') ?>js/stisla.js"></script>
<!-- Datatable -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<!-- Inputmask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/jquery.inputmask.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Template JS File -->
<script src="<?= base_url('assets/stisla/') ?>/js/scripts.js"></script>
<script src="<?= base_url('assets/stisla/') ?>/js/custom.js"></script>

<script>
    $("body").niceScroll({
        cursorcolor: "#6777f0",
        cursorborder: 'none',
        cursorwidth: 10,
        cursorfixedheight: 115,
        cursoropacitymin: 0.4,
        cursorborderradius: 6,
        autohidemode: 'leave'
    });

    $(document).scroll(function() {
        return $(document).scrollTop() > 300 ? $('.ignielToTop').addClass('show') : $('.ignielToTop').removeClass('show')
    }), $('.ignielToTop').click(function() {
        return $('html,body').animate({
            scrollTop: '0'
        });
    });
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    $("#nama_pelanggan").keypress(function(e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });
    $("#kota").keypress(function(e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });

    function previewImg() {
        const gambar = document.querySelector('#image');
        const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }

    }
    // $(".custom-file-input").on("change", function() {
    //     var fileName = $(this).val().split("\\").pop();
    //     $(this).next(".custom-file-label").addClass("selected").html(fileName);
    // });
    "use strict";
    var serverClock = jQuery("#jamServer");
    if (serverClock.length > 0) {
        showServerTime(serverClock, serverClock.text());
    }

    function showServerTime(obj, time) {
        var parts = time.split(":"),
            newTime = new Date();

        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));

        var timeDifference = new Date().getTime() - newTime.getTime();

        var methods = {
            displayTime: function() {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([
                    methods.leadZeros(now.getHours(), 2),
                    methods.leadZeros(now.getMinutes(), 2),
                    methods.leadZeros(now.getSeconds(), 2)
                ].join(":"));
                setTimeout(methods.displayTime, 500);
            },

            leadZeros: function(time, width) {
                while (String(time).length < width) {
                    time = "0" + time;
                }
                return time;
            }
        }
        methods.displayTime();
    }
    $("#table-2").dataTable({
        "columnDefs": [{
            "sortable": true,
        }]
    });
    $("#table-3").dataTable({
        "columnDefs": [{
            "sortable": true,
        }]
    });
    //Sweetalert Logout
    $('.tombol-logout').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');
        Swal.fire({

            title: 'Logout',

            text: "Apakah anda ingin melakukan logout?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Lanjutkan'

        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Anda sudah berhasil keluar dari akun',
                    showConfirmButton: false,
                    timer: 1200,
                })
                setTimeout(function() {
                    document.location.href = link;
                }, 1200);
            }
        })
    });
    //sweetalert hapus 
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault(); //membatalkan fungsi sebelumnya
        const link = $(this).attr('href');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data ini akan dihapus dari database!",
            icon: 'warning',
            showCancelButton: true,

            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Data ini berhasil dihapus',
                    showConfirmButton: false,
                    timer: 1100,
                })
                setTimeout(function() {
                    document.location.href = link;
                }, 1100);
            }
        })
    });

    //sweetalert toast
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    //toast user
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Toast.fire({
            icon: 'success',
            timer: 1500,
            title: 'Data User berhasil ' + flashData,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast barang
    const flashData2 = $('.flash-data2').data('flashdata');
    if (flashData2) {
        Toast.fire({
            icon: 'success',
            timer: 1500,
            title: 'Data Barang berhasil ' + flashData2,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast paket
    const flashData3 = $('.flash-data3').data('flashdata');
    if (flashData3) {
        Toast.fire({
            icon: 'success',
            timer: 1500,
            title: 'Data Paket berhasil ' + flashData3,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast pelanggan
    const flashData4 = $('.flash-data4').data('flashdata');
    if (flashData4) {
        Toast.fire({
            icon: 'success',
            timer: 1500,
            title: 'Data Pelanggan berhasil ' + flashData4,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast transaksi
    const flashData5 = $('.flash-data5').data('flashdata');
    if (flashData5) {
        Toast.fire({
            icon: 'success',
            timer: 1500,
            title: 'Data Transaksi berhasil ' + flashData5,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast mutasi
    const flashData6 = $('.flash-data6').data('flashdata');
    if (flashData6) {
        Toast.fire({
            icon: 'success',
            timer: 1500,
            title: 'Data Mutasi berhasil ' + flashData6,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast mutasi
    const flashData10 = $('.flash-data10').data('flashdata');
    if (flashData10) {
        Toast.fire({
            icon: 'success',
            timer: 1500,
            title: flashData10 + ' <?= $this->session->userdata['username'] ?>',
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast profile success
    const flashData7 = $('.flash-data7').data('flashdata');
    if (flashData7) {
        Toast.fire({
            icon: 'success',
            timer: 1500,
            title: flashData7,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast profile gagal
    const flashData8 = $('.flash-data8').data('flashdata');
    if (flashData8) {
        Toast.fire({
            icon: 'error',
            timer: 1500,
            title: flashData8,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }
    //toast profile gagal
    const flashData9 = $('.flash-data9').data('flashdata');
    if (flashData9) {
        Toast.fire({
            icon: 'error',
            timer: 1500,
            title: flashData9,
            customClass: {
                popup: 'colored-toast'
            },
        })
    }

    //Inputmask
    $('[data-mask]').inputmask()
    "use strict";
</script>