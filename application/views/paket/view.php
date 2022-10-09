<?php if ($this->session->flashdata('paket')) : ?>
	<div class="flash-data3" data-flashdata="<?= $this->session->flashdata('paket'); ?>"></div>
<?php endif ?>
<section class="section">
	<div class="section-header">
		<h1><?= $title ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
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
								<a href="<?= base_url('export/paket') ?>" class="btn btn-icon btn-success mr-2"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;Export</a>
							<?php endif ?>
							<a href="<?= base_url('paket/create') ?> " class="btn btn-icon btn-primary "> <i class="fas fa-plus"></i>&nbsp;&nbsp;Create</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" style="width:100%" id="table-2">
								<thead>

									<tr class="text-center">
										<th>No</th>
										<th>Nama Paket</th>
										<th>Estimasi Waktu</th>
										<th>Biaya</th>
										<th>Jenis</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($paket as $pkt) : ?>
										<tr class="text-center">
											<td><?= $no++ ?></td>
											<td><?= $pkt['nama_paket'] ?></td>
											<td><?= $pkt['waktu'] ?> Hari</td>
											<td><?= rupiah($pkt['biaya']); ?></td>
											<td><?= $pkt['jenis'] ?></td>
											<td>
												<button data-toggle="modal" data-target="#view<?= $pkt['id_paket'] ?>" class="btn btn-icon btn-primary mr-1"><i class="fas fa-eye"></i></button>
												<a href="<?= base_url('paket/update/' . $pkt['id_paket']) ?> " class="btn btn-icon btn-success mr-1"><i class="fas fa-pencil"></i></a>
												<a href="<?= base_url('paket/delete/' . $pkt['id_paket']) ?> " class="btn btn-icon btn-danger tombol-hapus">
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
<?php foreach ($paket as $pkt) : ?>
	<div class="modal fade" id="view<?= $pkt['id_paket'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
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
							<div class="col-md-auto">
								Nama Paket <br>
								Jenis barang<br>
								Estimasi <br>
								Biaya <br>
								Jenis <br>
								Dibuat Pada<br>
								Diubah Pada<br>
							</div>
							<div class="col-md-auto">
								<?= $pkt['nama_paket'] ?> <br>
								<?= $pkt['barang'] ?> <br>
								<?= $pkt['waktu'] ?> <br>
								<?= $pkt['biaya'] ?><br>
								<?= $pkt['jenis'] ?><br>
								<?php $dibuat = strtotime($pkt['dibuat']);echo date('d M Y / H:i:s' ,$dibuat); ?><br>
								<?php $diubah = strtotime($pkt['diubah']);echo date('d M Y / H:i:s' ,$diubah); ?><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>