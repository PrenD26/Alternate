<?php if ($this->session->flashdata('barang')) : ?>
	<div class="flash-data2" data-flashdata="<?= $this->session->flashdata('barang'); ?>"></div>
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
								<a href="<?= base_url('export/barang') ?>" class="btn btn-icon btn-success mr-2"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;Export</a>
							<?php endif ?>
							<button data-toggle="modal" data-target="#create" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i>
								Create</button>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" style="width:100%" id="table-2">
								<thead>

									<tr class="text-center">
										<th>No</th>
										<th>Jenis Barang</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($barang as $brg) : ?>
										<tr class="text-center">
											<td><?= $no++ ?></td>
											<td><?= $brg['jenis_barang'] ?></td>
											<td>
												<button data-toggle="modal" data-target="#update<?= $brg['id_barang'] ?>" class="btn btn-icon btn-success mr-2"><i class="fas fa-pencil"></i></button>
												<a href="<?= base_url('barang/delete/' . $brg['id_barang']) ?>" class="btn btn-icon btn-danger tombol-hapus"><i class="fas fa-trash"></i></a>
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
<!-- Modal Create-->
<div class="modal fade" id="create" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('barang/create') ?>" method="POST">

					<div class="form-group">
						<label for="jenis_barang">Jenis barang</label>
						<input placeholder="Masukkan Nama Barang" type="text" class="form-control" required name="jenis_barang" id="jenis_barang">

					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-icon btn-primary tombol-tambah mr-2"><i class="fas fa-save"></i>
							Save</button>
						<button type="reset" class="btn btn-icon btn-danger "><i class="fas fa-trash"></i>
							Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal  Update-->
<?php foreach ($barang as $brg) : ?>
	<div class="modal fade" id="update<?= $brg['id_barang'] ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('barang/update/' . $brg['id_barang']) ?>" method="POST">

						<div class="form-group">
							<label for="jenis_barang">Jenis barang</label>
							<input type="text" class="form-control" required name="jenis_barang" id="jenis_barang" value="<?= $brg['jenis_barang'] ?>">

						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-icon btn-success mr-2"><i class="fas fa-save"></i>
							Update</button>
							<button type="button" class="btn btn-icon btn-danger" data-dismiss="modal"><i class="fas fa-xmark"></i>
							Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
<?php endforeach ?>