<?php if ($this->session->flashdata('paket')) : ?>
	<div class="flash-data3" data-flashdata="<?= $this->session->flashdata('paket'); ?>"></div>
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
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h4></h4>
						<div class="card-header-action">
							<?php if ($this->session->userdata("level") == 'Admin') : ?>
								<a href="<?= base_url('paket/export') ?>" class="btn btn-icon btn-success"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;Export</a>
							<?php endif ?>
							<a href="<?= base_url('paket/create') ?> " class="btn btn-icon btn-primary ">Create</a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" style="width:100%" id="table-2">
								<thead>

									<tr class="text-center">
										<th>No</th>
										<th>Kode Paket</th>
										<th>Paket</th>
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
											<td><?= $pkt->kode_paket ?></td>
											<td><?= $pkt->nama_paket ?></td>
											<td><?= $pkt->waktu ?> Hari</td>
											<td><?= rupiah($pkt->biaya); ?></td>
											<td><?= $pkt->jenis ?></td>
											<td>
												<button data-toggle="modal" data-target="#view<?= $pkt->id ?>" class="btn btn-icon btn-primary"><i class="fas fa-eye"></i></button>
												<a href="<?= base_url('paket/update/' . $pkt->id) ?> " class="btn btn-icon btn-success "><i class="fas fa-pencil"></i></a>
												<a href="<?= base_url('paket/hapus/' . $pkt->id) ?> " class="btn btn-icon btn-danger tombol-hapus">
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
	<div class="modal fade" id="view<?= $pkt->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							<div class="row">
								<div class="col-md-auto">
									Kode Paket <br>
									Nama Paket <br>
									Jenis barang<br>
									Estimasi <br>
									Biaya <br>
									Jenis <br>
									Dibuat Pada<br>
									Diubah Pada<br>
								</div>
								<div class="col">

								</div>
								<div class="col-md-auto">
									<?= $pkt->kode_paket ?> <br>
									<?= $pkt->nama_paket ?> <br>
									<?= $pkt->barang ?> <br>
									<?= $pkt->waktu ?> <br>
									<?= $pkt->biaya ?><br>
									<?= $pkt->jenis ?><br>
									<?= date('d M Y / H:i:s',$pkt->date_created) ?><br>
									<?= date('d M Y / H:i:s',$pkt->edited_at) ?><br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>