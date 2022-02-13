<?php if ($this->session->flashdata('transaksi')) : ?>
	<div class="flash-data5" data-flashdata="<?= $this->session->flashdata('transaksi'); ?>"></div>
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
			<div class="breadcrumb-item active"><a href="<?= base_url('transaksi') ?>">Transaksi</a></div>
			<div class="breadcrumb-item"><?= $title ?></div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h4></h4>
						<div class="card-header-action">
						<?php if ($this->session->userdata("level") == 'Admin') : ?>
							<a href="<?= base_url('transaksi/export') ?>" class="btn btn-icon btn-success"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;Export</a>
							 <?php endif ?>
							<a href="<?= base_url('transaksi/tambah') ?> " class="btn btn-icon btn-primary ">Create</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped nowrap" style="width:100%" id="table-2">
								<thead>

									<tr class="text-center">
										<th>No</th>
										<th>No Transaksi</th>
										<th>Tanggal Masuk</th>
										<th>Paket</th>
										<th>Total</th>
										<th>bayar</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($transaksi as $tsk) : ?>
										<tr class="text-center">
											<td><?= $no++ ?></td>
											<td><?= $tsk->no_transaksi ?></td>
											<td><?= date('d M Y / H:i:s',$tsk->date_created) ?></td>
											<td><?= $tsk->nama_paket ?></td>
											<td><?= rupiah($tsk->total); ?></td>
											<td><?= rupiah($tsk->bayar); ?></td>
											<td> <?php
													switch ($tsk->status) {
														case 1;
															echo '<span class="badge badge-me" style="font-size:14px !important;">Permintaan Diterima</span>';
															break;
														case 2;
															echo '<span class="badge badge-ji" style="font-size:14px !important;">Sedang Dicuci</span>';
															break;
														case 3;
															echo '<span class="badge badge-ku" style="font-size:14px !important;">Sedang Dijemur</span>';
															break;
														case 4;
															echo '<span class="badge badge-hi" style="font-size:14px !important;">Sedang Disetrika</span>';
															break;
														case 5;
															echo '<span class="badge badge-bi" style="font-size:14px !important;">Siap Diambil</span>';
															break;
														case 6;
															echo '<span class="badge badge-ni" style="font-size:14px !important;">Sudah Diambil</span>';
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
														<a class="dropdown-item" href="<?= base_url('transaksi/detail/') . $tsk->id; ?>">View</a>
														<a class="dropdown-item" href="<?= base_url('transaksi/update/') . $tsk->id; ?>">Update</a>
														<a class="dropdown-item" href="<?= base_url('transaksi/nota/') . $tsk->id; ?>">Print Nota</a>
													</div>
												</div>
												<a href="<?= base_url('transaksi/hapus/') . $tsk->id; ?> " class="btn btn-icon btn-danger tombol-hapus">
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