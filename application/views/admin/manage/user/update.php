<section class="section">
	<form action="<?= base_url('user/update/' . $user->id) ?>" method="POST">
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
							<h4>Input Text</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Kode User</label>
								<input type="text" name="kode_user" class="form-control" value="<?= $user->kode_user ?>" maxlength="8" readonly>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control <?php if (form_error('username')) {
																							echo ('is-invalid');
																						} ?>" value="<?= $user->username ?>">
								<div class="invalid-feedback">
									<?= form_error('username') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control <?php if (form_error('nama')) {
																						echo ('is-invalid');
																					} ?>" value="<?= $user->nama ?>">
								<div class="invalid-feedback">
									<?= form_error('nama') ?>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card">
						<div class="card-header">
							<h4>Select</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="level">Level</label>
								<select name="level" id="level" required class="form-control select2" style="width: 100%;">
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<option <?php if ($user->level == "Admin") echo 'selected'; ?>>
										Admin</option>
									<option <?php if ($user->level == "Kasir") echo 'selected'; ?>>
										Kasir</option>
								</select>
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" required class="form-control select2" style="width: 100%;">
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<option <?php if ($user->status == "Active") echo 'selected'; ?>>
										Active</option>
									<option <?php if ($user->status == "Inactive") echo 'selected'; ?>>
										Inactive</option>
								</select>
							</div>

						</div>

					</div>
				</div>
			</div>

		</div>
		<button type="submit" class="btn btn-icon btn-success"><i class="fas fa-save"></i> Update</button>
		<a href="<?= base_url('user') ?>" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i>
			Batal</a>
	</form>
</section>