<?php if ($this->session->flashdata('flash')) : ?>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
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
		<div class="card card-primary">
			<div class="card-header">
				<h4></h4>
				<div class="card-header-action">
				<?php if ($this->session->userdata("level") == 'Admin') : ?>
								<a href="<?= base_url('export/user') ?>" class="btn btn-icon btn-success mr-2"><i class="fas fa-file-excel"></i>&nbsp;&nbsp;Export</a>
							<?php endif ?>
					<a href="<?= base_url('user/create') ?>" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i>&nbsp;&nbsp;Create</a>
				</div>
			</div>
		</div>
		<div class="row">

			<?php $no = 1;
			foreach ($user as $usr) : ?>
				<div class="col-12 col-sm-12 col-lg-6">
					<div class="card profile-widget">
						<div class="profile-widget-header">
							<img alt="image" src="<?= base_url('assets/avatar/') . $usr['image'] ?>" class="rounded-circle profile-widget-picture ">
							<div class="profile-widget-items">
								<div class="profile-widget-item">
									<div class="profile-widget-item-label <?php if ($usr['kondisi'] == '1') {
																				echo ('beep');
																			} else { {
																					echo ('boop');
																				}
																			} ?>">Username</div>
									<div class="profile-widget-item-value "><?= $usr['username'] ?></div>
								</div>
								<div class="profile-widget-item">
									<div class="profile-widget-item-label ">Status</div>
									<div class="profile-widget-item-value"><?= $usr['status'] ?></div>
								</div>
								<div class="profile-widget-item">
									<div class="profile-widget-item-label">Created At</div>
									<div class="profile-widget-item-value"><?= date('d M Y', $usr['created']) ?></div>
								</div>
							</div>
						</div>
						<div class="profile-widget-description pb-0">
							<div class="profile-widget-name">
								<?= $usr['nama'] ?>
								<div class="text-muted d-inline font-weight-normal">
									<div class="slash"></div>
									<?= $usr['level'] ?>
								</div>
							</div>
							<div class="profile-widget-name">No Telepon : <?= $usr['no_telepon'] ?></div>
							<div class="profile-widget-name">Last Login : <?php $post_date = $usr['last_login'];
																			$now = time();
																			echo timespan($post_date, $now) . ' ago'; ?></div>
							<p><?= $usr['bio'] ?></p>
						</div>
						<div class="card-footer text-center pt-0">
							<div class="font-weight-bold mb-2 text-small">Action</div>
							<button data-toggle="modal" data-target="#view<?= $usr['id_user'] ?>" class="btn btn-icon btn-primary mr-1"><i class="fas fa-eye"></i></button>
							<a href="<?= base_url('user/update/' . $usr['id_user']) ?>" class="btn btn-success mr-1">
								<i class="fas fa-pencil"></i>
							</a>
							<a href="<?= base_url('user/change/' . $usr['id_user']) ?>" class="btn btn-warning mr-1">
								<i class="fas fa-key"></i>
							</a>
							<a href="<?= base_url('user/delete/' . $usr['id_user']) ?>" class="btn btn-danger tombol-hapus mr-1">
								<i class="fas fa-trash"></i>
							</a>
						</div>
					</div>

				</div>
			<?php endforeach ?>
			
		</div>
	</div>

</section>
<?php foreach ($user as $usr) : ?>
	<div class="modal fade" id="view<?= $usr['id_user'] ?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
									Username <br>
									Nama <br>
									Level <br>
									No Telepon <br>
									Last Login <br>
									Dibuat Pada <br>
									Diubah Pada <br>
								</div>

								<div class="col-md-auto">
									
									<?= $usr['username'] ?> <br>
									<?= $usr['nama'] ?><br>
									<?= $usr['level'] ?><br>
									<?= $usr['no_telepon'] ?><br>
									<?php $post_date = $usr['last_login'];
									$now = time();
									echo timespan($post_date, $now) . ' ago'; ?><br>
									<?= date('d M Y / H:i:s', $usr['date_created']) ?><br>
									<?= date('d M Y / H:i:s', $usr['edited_at']) ?><br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>