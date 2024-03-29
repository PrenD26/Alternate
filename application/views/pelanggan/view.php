<?php if ($this->session->flashdata('pelanggan')) : ?>
	<div class="flash-data4" data-flashdata="<?= $this->session->flashdata('pelanggan'); ?>"></div>
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
			<div class="col-12 ">
				<div class="card card-primary">
					<div class="card-header">
						<h4></h4>
						<div class="card-header-action">
							<?php if ($this->session->userdata("level") == 'Admin') : ?>
								<a href="<?= base_url('export/pelanggan') ?>" class="btn btn-icon btn-success mr-2"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;Export</a>
							<?php endif ?>
							<a href="<?= base_url('pelanggan/create') ?> " class="btn btn-icon btn-primary "><i class="fas fa-plus"></i>&nbsp;&nbsp;Create</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" style="width:100%" id="table-2">
								<thead>

									<tr class="text-center">
										<th>No</th>
										<th>Nama Pelanggan</th>
										<th>Jenis Kelamin</th>
										<th>Nomor Telepon</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($pelanggan as $plg) : ?>
										<tr class="text-center">
											<td><?= $no++ ?></td>
											<td><?= $plg['nama_pelanggan'] ?></td>
											<td><?= $plg['jk'] ?></td>
											<td><?= $plg['no_telp'] ?></td>
											<td>
												<button data-toggle="modal" data-target="#view<?= $plg['id_pelanggan'] ?>" class="btn btn-icon btn-primary mr-1"><i class="fas fa-eye"></i></button>
												<a href="<?= base_url('pelanggan/update/' . $plg['id_pelanggan']) ?> " class="btn btn-icon btn-success mr-1"><i class="fas fa-pencil"></i></a>
												<a href="<?= base_url('pelanggan/delete/' . $plg['id_pelanggan']) ?> " class="btn btn-icon btn-danger tombol-hapus">
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
<?php foreach ($pelanggan as $plg) : ?>
	<div class="modal fade" id="view<?= $plg['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
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
								Nama Pelanggan<br>
								Jenis Kelamin <br>
								Nomor Telepon <br>
								Kabupaten / Kota <br>
								Alamat <br>
								Dibuat Pada <br>
								Diubah Pada <br>
							</div>
							<div class="col-md-auto">
								<?= $plg['nama_pelanggan'] ?> <br>
								<?= $plg['jk'] ?> <br>
								<?= $plg['no_telp'] ?><br>
								<?= $plg['kota'] ?><br>
								<?= $plg['alamat'] ?><br>
								<?= date('d M Y / H:i:s', $plg['created']) ?><br>
								<?= date('d M Y / H:i:s', $plg['updated']) ?><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>