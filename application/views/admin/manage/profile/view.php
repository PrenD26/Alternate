<?php if ($this->session->flashdata('flash')) : ?>
	<div class="flash-data8" data-flashdata="	<?= $this->session->flashdata('flash'); ?>"></div>
<?php endif ?>
<?php if ($this->session->flashdata('success')) : ?>
	<div class="flash-data7" data-flashdata="	<?= $this->session->flashdata('success'); ?>"></div>
<?php endif ?>
<section class="section">
	<div class="section-header">
		<h1>Profile</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item">Profile</div>
		</div>
	</div>
	<div class="section-body">
		<h2 class="section-title">Hi, <?= $user['nama'] ?></h2>
		<p class="section-lead">
			Ubah informasi tentang dirimu dalam menu ini.
		</p>

		<div class="row mt-sm-4">
			<div class="col-12 col-md-12 col-lg-5">
				<div class="card profile-widget">
					<div class="profile-widget-header">
						<img alt="image" src="<?= base_url('assets/avatar/') . $user['image'] ?>" style="width:150px;height:150px;" class="rounded-circle profile-widget-picture file-thumbnail img-preview">
						<div class="profile-widget-items">
							<div class="profile-widget-item">
								<div class="profile-widget-item-label">Username</div>
								<div class="profile-widget-item-value"><?= $user['username'] ?></div>
							</div>
							<div class="profile-widget-item">
								<div class="profile-widget-item-label">Terdaftar Sejak</div>
								<div class="profile-widget-item-value"><?= date('d M Y', $user['date_created']) ?></div>
							</div>
						</div>
					</div>
					<div class="profile-widget-description">
						<div class="profile-widget-name"><?= $user['nama'] ?> <div class="text-muted d-inline font-weight-normal">
								<div class="slash"></div> <?= $user['level'] ?>
							</div>
						</div>
						<?= htmlspecialchars($user['bio']) ?>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-7">
				<div class="card">
					<?php echo form_open_multipart('profile'); ?>
					<div class="card-header">
						<h4>Edit Profile</h4>
						<div class="card-header-action">
							<a href="<?= base_url('profile/change') ?> " class="btn btn-icon btn-primary ">Change Password</a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Username</label>
								<input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" readonly>
							</div>
							<div class="form-group col-md-6 col-12">
								<label>Nama</label>
								<input type="text" name="nama" value="<?= $user['nama'] ?>" class="form-control <?php if (form_error('nama')) {
																													echo ('is-invalid');
																												} ?>">
								<div class="invalid-feedback">
									<?= form_error('nama') ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Phone</label>
								<input type="text" name="no_telepon" class="form-control" value="<?= $user['no_telepon']?>"data-inputmask='"mask": "(+99) 999-9999-99999"' data-mask>

							</div>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="image" name="image" onchange="previewImg()">
								<label class="custom-file-label" for="image">Choose file</label>
							
							</div>
							<small>Max size is 2MB | Max dimension is 1000x1000PX</small>
						</div>
						<div class="row">
							<div class="form-group col">
								<label>Bio</label>
								<textarea name="bio" class="form-control summernote-simple"><?= $user['bio'] ?></textarea>
							</div>
						</div>
					</div>
					<div class="card-footer text-right">
						<button type="submit" class="btn btn-primary">Save Changes</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>