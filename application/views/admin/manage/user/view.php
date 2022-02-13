<?php if ($this->session->flashdata('flash')) : ?>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
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
		<div class="row sortable-card">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h4>Admin</h4>
						<div class="card-header-action">
							<a href="<?= base_url('user/create') ?> " class="btn btn-icon btn-primary ">Create</a>
						</div>
					</div>
					<div class="collapse show" id="mycard-collapse">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" style="width:100%" id="table-3">
									<thead>
										<tr>
											<th>
												No
											</th>
											<th>Kode user</th>
											<th>Profile</th>
											<th>Username</th>
											<th>Nama</th>
											<th>Last Login</th>
											<th class="text-center">status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;

										foreach ($user as $usr) : ?>
											<?php if ($usr->level == "Admin") { ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $usr->kode_user ?></td>
													<td class="<?php if ($usr->kondisi == '1') {echo ('beep');}else {
														{echo ('boop');}
													} ?>"> <img alt="image" src="<?= base_url('assets/avatar/') .$usr->image ?>"class="rounded-circle" style="width:45px;height:45px;"></td>
													<td><?= $usr->username ?></td>
													<td><?= $usr->nama ?></td>
													<td><?php $post_date=$usr->last_login;$now = time();echo timespan($post_date, $now) . ' ago'; ?></td>
													<td class="text-center"> <?php
															switch ($usr->status) {
																case 'Active';
																	echo '<span class="badge badge-primary" style="font-size:14px !important;">Active</span>';
																	break;
																case 'Inactive';
																	echo '<span class="badge badge-danger" style="font-size:14px !important;">Inactive</span>';
																	break;
															}
															?>
													</td>
													<td class="text-center">
														<button data-toggle="modal" data-target="#view<?= $usr->id ?>" class="btn btn-icon btn-primary"><i class="fas fa-eye"></i></button>
														<a href="<?= base_url('user/update/' . $usr->id) ?> " class="btn btn-icon btn-success "><i class="fas fa-pencil"></i></a>
														<a href="<?= base_url('user/change/' . $usr->id) ?> " class="btn btn-icon btn-warning "><i class="fas fa-key"></i></a>
														<a href="<?= base_url('user/hapus/' . $usr->id) ?> " class="btn btn-icon btn-danger tombol-hapus">
															<i class="fas fa-trash"></i></a>

													</td>
												</tr>
											<?php } ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h4>Kasir</h4>
						<div class="card-header-action">
							<a href="<?= base_url('user/create') ?> " class="btn btn-icon btn-primary ">Create</a>
						</div>
					</div>
					<div class="collapse show" id="mycard-collapse">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" style="width:100%" id="table-2">
									<thead>

										<tr>
											<th>
												No
											</th>
											<th>Kode user</th>
											<th>Profile</th>
											<th>Username</th>
											<th>Nama</th>
											<th>Last Login</th>
											<th class="text-center">status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($user as $usr) : ?>
											<?php if ($usr->level == "Kasir") { ?>
												<tr>
												<td><?= $no++ ?></td>
													<td><?= $usr->kode_user ?></td>
													<td class="<?php if ($usr->kondisi == '1') {echo ('beep');}else {
														{echo ('boop');}
													} ?>"> <img alt="image" src="<?= base_url('assets/avatar/') .$usr->image ?>"class="rounded-circle" style="width:45px;height:45px;"></td>
													<td><?= $usr->username ?></td>
													<td><?= $usr->nama ?></td>
													<td><?php $post_date=$usr->last_login;$now = time();echo timespan($post_date, $now) . ' ago'; ?></td>
													<td class="text-center"> <?php
															switch ($usr->status) {
																case 'Active';
																	echo '<span class="badge badge-primary" style="font-size:14px !important;">Active</span>';
																	break;
																case 'Inactive';
																	echo '<span class="badge badge-danger" style="font-size:14px !important;">Inactive</span>';
																	break;
															}
															?>
													</td>
													<td class="text-center">
														<button data-toggle="modal" data-target="#view<?= $usr->id ?>" class="btn btn-icon btn-primary"><i class="fas fa-eye"></i></button>
														<a href="<?= base_url('user/update/' . $usr->id) ?> " class="btn btn-icon btn-success "><i class="fas fa-pencil"></i></a>
														<a href="<?= base_url('user/change/' . $usr->id) ?> " class="btn btn-icon btn-warning "><i class="fas fa-key"></i></a>
														<a href="<?= base_url('user/hapus/' . $usr->id) ?> " class="btn btn-icon btn-danger tombol-hapus">
															<i class="fas fa-trash"></i></a>

													</td>
												</tr>
											<?php } ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<?php foreach ($user as $usr) : ?>
	<div class="modal fade" id="view<?= $usr->id ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
									Kode User <br>
									Username <br>
									Nama <br>
									Level <br>
									No Telepon <br>
									Last Login <br>
									Dibuat Pada <br>
									Diubah Pada <br>
								</div>

								<div class="col-md-auto">
									<?= $usr->kode_user ?> <br>
									<?= $usr->username ?> <br>
									<?= $usr->nama ?><br>
									<?= $usr->level ?><br>
									<?= $usr->no_telepon ?><br>
									<?php $post_date=$usr->last_login;$now = time();echo timespan($post_date, $now) . ' ago'; ?><br>
									<?= date('d M Y / H:i:s', $usr->date_created) ?><br>
									<?= date('d M Y / H:i:s', $usr->edited_at) ?><br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>