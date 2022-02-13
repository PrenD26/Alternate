<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="<?= base_url('assets/stisla/') ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col text-center">
            <h3 class="h3 text-dark">dasdasd</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($barang as $brg) : ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $brg->jenis_barang ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>