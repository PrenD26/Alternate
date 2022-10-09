<?php if ($this->session->flashdata('message')) : ?>
	<div class="flash-data9" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
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
						<img alt="image" src="<?= base_url('assets/avatar/') . $user['image'] ?>" style="width:150px;height:150px;" class="rounded-circle profile-widget-picture file-thumbnail">
						<div class="profile-widget-items">
							<div class="profile-widget-item">
								<div class="profile-widget-item-label">Username</div>
								<div class="profile-widget-item-value"><?= $user['username'] ?></div>
							</div>
							<div class="profile-widget-item">
								<div class="profile-widget-item-label">Terdaftar Sejak</div>
								<div class="profile-widget-item-value"><?= date('d M Y', $user['created']) ?></div>
							</div>
						</div>
					</div>
					<div class="profile-widget-description">
						<div class="profile-widget-name"><?= $user['nama'] ?> <div class="text-muted d-inline font-weight-normal">
								<div class="slash"></div> <?= $user['level'] ?>
							</div>
						</div>
						<?= $user['bio'] ?>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-7">
				<div class="card">
					<?php echo form_open_multipart('profile/change'); ?>
					<div class="card-header">
						<h4>Edit Password</h4>
						<div class="card-header-action">
							<a href="<?= base_url('profile') ?> " class="btn btn-icon btn-primary ">Profile</a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-12">
								<label>Current Password</label>
								<input type="password" name="current_password" id="current_password" class="form-control" value="">
								<small class="form-text text-danger"><?= form_error('current_password') ?></small>
							</div>
							<div class="form-group col-12">
								<label>New Password</label>
								<input type="password" name="new_password1" id="new_password1" class="form-control" value="">
								<small class="form-text text-danger"><?= form_error('new_password1') ?></small>
							</div>
							<div class="form-group col-12">
								<label>Repeat Password</label>
								<input type="password" name="new_password2" id="new_password2" class="form-control" value="">
								<small class="form-text text-danger"><?= form_error('new_password2') ?></small>
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