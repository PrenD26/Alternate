<section class="section">
	<form action="<?= base_url('user/create') ?>" method="POST" enctype="multipart/form-data">
		<div class="section-header">
			<h1><?= $title ?></h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('user') ?>">Data User</a></div>
				<div class="breadcrumb-item"><?= $title ?></div>
			</div>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">
							<!-- <div class="form-group">
								<label>Kode user</label>
								<input type="text" name="kode_user" class="form-control" value="PGN - <?= mt_rand(10, 99) ?>" maxlength="8" readonly>
							</div> -->
							<div class="form-group">
								<label>Username</label>
								<input type="text" placeholder="Masukkan Username" value=" <?= set_value('username') ?>" name="username" class="form-control <?php if (form_error('username')) {
																																									echo ('is-invalid');
																																								} ?>">
								<div class="invalid-feedback">
									<?= form_error('username') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" value=" <?= set_value('nama')  ?>" class="form-control <?php if (form_error('nama')) {
																															echo ('is-invalid');
																														} ?>" placeholder="Masukkan Nama Lengkap">
								<div class="invalid-feedback">
									<?= form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="level">Level</label>
								<select name="level" id="level" required class="form-control select2 " style="width: 100%;">
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<option <?= set_select('level', 'Admin'); ?>>Admin</option>
									<option <?= set_select('level', 'Kasir'); ?>>Kasir</option>
								</select>
							</div>
							<div class="form-group">
								<label for="no_telepon">Nomor Telepon</label>
								<input placeholder="Masukkan Nomor Telepon" id="no_telepon" type="text" name="no_telepon" class="form-control <?php if (form_error('no_telepon')) {
																																						echo ('is-invalid');
																																					} ?>" value="<?= set_value('no_telepon') ?>" data-inputmask='"mask": "(+99) 999-9999-99999"' data-mask>
								<div class="invalid-feedback">
									<?= form_error('no_telepon') ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control <?php if (form_error('password')) {
																								echo ('is-invalid');
																							} ?>" placeholder="Masukkan Password">
								<div class="invalid-feedback">
									<?= form_error('password') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Repeat Password</label>
								<input type="password" name="passcon" class="form-control <?php if (form_error('passcon')) {
																								echo ('is-invalid');
																							} ?>" placeholder="Repeat Password">
								<div class="invalid-feedback">
									<?= form_error('passcon') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" required class="form-control select2 " style="width: 100%;">
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<option <?= set_select('status', 'Active'); ?>>Active</option>
									<option <?= set_select('status', 'Inactive'); ?>>Inactive</option>
								</select>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-icon btn-primary mr-2 mt-3"><i class="fas fa-save"></i> Save</button>
						<a href="<?= base_url('user') ?>" class="btn btn-icon btn-danger mt-3"><i class="fas fa-xmark"></i>
							Cancel</a>
					</div>
				</div>

			</div>
		</div>

	</form>
</section>