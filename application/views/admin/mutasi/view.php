<?php if ($this->session->flashdata('mutasi')) : ?>
    <div class="flash-data6" data-flashdata="<?= $this->session->flashdata('mutasi'); ?>"></div>
    <!-- <div class="row mt-3">
	<div class="col">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data User <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div> -->
<?php endif ?>
<section class="section">

    <div class="section-header">

        <h1><?= $title ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $title ?></div>
        </div>
    </div>
    <!-- <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <?= $this->session->flashdata('flash'); ?>
                  </div>
                </div> -->
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4></h4>
                        <div class="card-header-action">
                        <?php if ($this->session->userdata("level") == 'Admin') : ?>
                            <a href="<?= base_url('mutasi/export') ?>" class="btn btn-icon btn-success"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;Export</a>
                             <?php endif ?>
                            <a href="<?= base_url('mutasi/create') ?> " class="btn btn-icon btn-primary ">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped nowrap" style="width:100%" id="table-2">
                                <thead>

                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Mutasi </th>
                                        <th>User </th>
                                        <th>Tanggal Mutasi </th>
                                        <th>Nominal </th>


                                        <th>Keterangan </th>
                                        <th>Jenis Mutasi </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($mutasi as $mts) : ?>
                                        <tr class="text-center">
                                            <td><?= $no++ ?></td>
                                            <td><?= $mts->no_mutasi ?></td>
                                            <td><?= $mts->username ?></td>
                                            <td><?= date('d M Y / H:i:s',$mts->date_created)?></td>
                                            
                                            <td><?= rupiah($mts->nominal) ?></td>

                                            <td><?= $mts->keterangan ?></td>
                                            <td> <?php
                                                    switch ($mts->jenis) {
                                                        case 'pemasukan';
                                                            echo '<span class="badge badge-primary" style="font-size:14px !important;">Pemasukan</span>';
                                                            break;
                                                        case 'pengeluaran';
                                                            echo '<span class="badge badge-danger" style="font-size:14px !important;">Pengeluaran</span>';
                                                            break;
                                                    }
                                                    ?>
                                            </td>


                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-success " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" style='cursor:pointer;' data-toggle="modal" data-target="#view<?= $mts->id ?>">View</a>
                                                        <a class="dropdown-item" href="<?= base_url('mutasi/update/'. $mts->id)  ?>">Update</a>
                                                    </div>
                                                </div>
                                                <a href="<?= base_url('mutasi/hapus/' . $mts->id)  ?> " class="btn btn-icon btn-danger tombol-hapus">
                                                    <i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
<?php foreach ($mutasi as $mts) : ?>
    <div class="modal fade" id="view<?= $mts->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="px-5 py-2">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-auto">
                                    No Mutasi <br>
                                    User<br>
                                    Jenis Mutasi <br>
                                    Nominal <br>
                                    Keterangan <br>
                                    Tanggal Mutasi <br>
                                    Diubah Pada <br>
                                </div>
                                <div class="col">

                                </div>
                                <div class="col-md-auto">
                                    <?= $mts->no_mutasi ?> <br>
                                    <?= $mts->username ?> <br>
                                    <?= $mts->jenis ?> <br>
                                    <?= $mts->nominal ?><br>
                                    <?= $mts->keterangan ?><br>
                                    <?= date('d M Y / H:i:s',$mts->date_created)?><br>
                                    <?= date('d M Y / H:i:s',$mts->edited_at)?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>