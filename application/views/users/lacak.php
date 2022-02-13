<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alternate &raquo; Cek Status </title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/image/') ?>iconl100.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" type="text/css">
 <link rel="stylesheet" href="<?= base_url('assets/style/lacak.css') ?>">
</head>

<body>

    <div class="container">
        <?php if (count($cari) > 0) : ?>
            <?php foreach ($cari as $data) : ?>
                <article class="card">
                    <header class="card-header">Cek Status</header>
                    <div class="card-body">

                        <article class="card">
                            <div class="card-body row">
                                <div class="col"> <strong>No Transaksi:</strong> <br><?= $data->no_transaksi ?> </div>
                                <div class="col"> <strong>Nama Pelanggan:</strong> <br><?= $data->nama_pelanggan ?> </div>
                                <div class="col"> <strong>Tanggal Transaksi:</strong> <br><?= date('d M Y / H:i:s',$data->date_created) ?></div>
                                <div class="col"> <strong>Tanggal Update:</strong> <br><?= date('d M Y / H:i:s',$data->edited_at) ?> </div>
                            </div>
                        </article>
                        <div class="track">
                            <?php if ($data->status == "1") { ?>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">Permintaan Diterima</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sedang Dicuci</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sedang Dijemur </span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sedang Disetrika</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Siap Diambil</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sudah Diambil</span> </div>
                            <?php } ?>
                            <?php if ($data->status == "2") { ?>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">Permintaan Diterima</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dicuci</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sedang Dijemur </span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sedang Disetrika</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Siap Diambil</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sudah Diambil</span> </div>
                            <?php } ?>
                            <?php if ($data->status == "3") { ?>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">Permintaan Diterima</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dicuci</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dijemur </span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sedang Disetrika</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Siap Diambil</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sudah Diambil</span> </div>
                            <?php } ?>
                            <?php if ($data->status == "4") { ?>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">Permintaan Diterima</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dicuci</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dijemur </span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Disetrika</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Siap Diambil</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sudah Diambil</span> </div>
                            <?php } ?>
                            <?php if ($data->status == "5") { ?>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">Permintaan Diterima</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dicuci</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dijemur </span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Disetrika</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Siap Diambil</span> </div>
                                <div class="step "> <span class="icon"> <i class="fad fa-hourglass-half"></i> </span> <span class="text">
                                        Sudah Diambil</span> </div>
                            <?php } ?>
                            <?php if ($data->status == "6") { ?>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">Permintaan Diterima</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dicuci</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Dijemur </span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sedang Disetrika</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Siap Diambil</span> </div>
                                <div class="step active"> <span class="icon"> <i class="fad fa-check"></i> </span> <span class="text">
                                        Sudah Diambil</span> </div>
                            <?php } ?>
                        </div>
                        <hr>

                        <hr> <a href="<?= base_url('landing_page') ?>" class="btn btn-success" data-abc="true"> <i class="fa fa-chevron-left"></i> Kembali</a>
                    </div>
                </article>
            <?php endforeach ?>
        <?php else : ?>
            <article class="card">
                <header class="card-header"> My Orders / Tracking </header>
                <div class="card-body">
                    <div align="center">
                        <img src="<?= base_url('assets/image/') ?>/notfound.png" width="300px">
                    </div>

                    <hr> <a href="<?= base_url('landing_page') ?>" class="btn btn-success" data-abc="true"> <i class="fa fa-chevron-left"></i> Kembali</a>
                </div>
            </article>
        <?php endif ?>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>