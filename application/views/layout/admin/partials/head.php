<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<!-- General CSS Files -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Datatable -->
<link rel="stylesheet" href="<?= base_url('assets/stisla') ?>/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/stisla') ?>/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<!-- Dashboard -->
<!-- Input Mask -->
<link rel="stylesheet" href="<?= base_url('assets/stisla') ?>/node_modules/select2/dist/css/select2.min.css">
<!-- Template CSS -->
<link rel="stylesheet" href="<?= base_url('assets/stisla') ?>/assets/css/custom.css">

<link rel="stylesheet" href="<?= base_url('assets/stisla') ?>/node_modules/summernote/dist/summernote-bs4.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" type="text/css">
<link rel="stylesheet" href="<?= base_url('assets/stisla') ?>/node_modules/fullcalendar/dist/fullcalendar.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/stisla/')?>/assets/css/components.css">

<title>Alternate &raquo; <?= $title ?></title>
<link rel="shortcut icon" href="<?= base_url('assets/image') ?>/laund.png">

<style>
   /* Back To Top by igniel.com */
.ignielToTop {visibility:hidden; width:50px; height:50px; position:fixed; bottom:50px; right: 20px; z-index:99; cursor:pointer; border-radius:100px; opacity:0; -webkit-transform:translateZ(0); transition:all .5s; background:#6777f0 url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z' fill='%23fff'/%3E%3C/svg%3E") no-repeat center center;}
.ignielToTop:hover {opacity: 1; background:#1d2129 url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z' fill='%23fff'/%3E%3C/svg%3E") no-repeat center center;}
.ignielToTop.show {visibility:visible; bottom:20px; opacity:1;} 
    td {
        font-weight: 600 !important;
        font-size: 15px !important;
    }

    th {
        font-weight: 600 !important;
        font-size: 15px !important;
    }

    label {
        font-weight: 600 !important;
        font-size: 15px !important;
        cursor: pointer;
        color: #6c757d !important;
    }
</style>
<?php
date_default_timezone_set('Asia/Jakarta'); //Menyesuaikan waktu dengan tempat kita tinggal
?>