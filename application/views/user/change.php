<section class="section">
	<form action="<?= base_url('user/change/' . $user['id_user']) ?>" method="POST">
		<div class="section-header">
			<h1><?= $title ?></h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('user') ?>">Data User</a></div>
				<div class="breadcrumb-item"><?= $title ?></div>
			</div>
		</div>

		<div class="section-body">
			<div class="row sortable-card">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card">
						<div class="card-header">
							<h4>Reset</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Username</label>
								<input type="text" readonly id="username" class="form-control" value="<?= $user['username'] ?>">
							</div>
							<div class="form-group">
								<label>New Password</label>
								<input type="password" name="new_password1" id="new_password1" class="form-control <?php if (form_error('new_password1')) {
																														echo ('is-invalid');
																													} ?>" value="" placeholder="Masukkan Password Baru">
								<div class="invalid-feedback">
									<?= form_error('new_password1') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Repeat Password</label>
								<input type="password" name="new_password2" name="new_password2" class="form-control <?php if (form_error('new_password2')) {
																															echo ('is-invalid');
																														} ?>" value="" placeholder="Repeat Password">
								<div class="invalid-feedback">
									<?= form_error('new_password2') ?>
								</div>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-icon btn-success mr-2"><i class="fas fa-save"></i> Update</button>
						<a href="<?= base_url('user') ?>" class="btn btn-icon btn-danger"><i class="fas fa-xmark"></i>
							Cancel</a>
					</div>
				</div>
			</div>

		</div>
	</form>
</section>