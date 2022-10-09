<section class="section">
	<form action="<?= base_url('pelanggan/update/' . $pelanggan['id_pelanggan']) ?>" method="POST">
		<div class="section-header">
			<h1><?= $title ?></h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('pelanggan') ?>">Data Pelanggan</a></div>
				<div class="breadcrumb-item"><?= $title ?></div>
			</div>
		</div>

		<div class="section-body">
			<div class="row sortable-card">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body ">
							<!-- <div class="form-group ">
								<label>Kode Pelanggan</label>
								<input type="text" name="kode_pelanggan" class="form-control" value="<?= $pelanggan['kode_pelanggan'] ?>" maxlength="8" readonly>
							</div> -->
							<div class="form-group">
								<label for="nama_pelanggan">Nama Pelanggan</label>
								<input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?= $pelanggan['nama_pelanggan'] ?>" class="form-control <?php if (form_error('nama_pelanggan')) {
																																								echo ('is-invalid');
																																							} ?>" maxlength="25">
								<div class="invalid-feedback">
									<?= form_error('nama_pelanggan') ?>
								</div>
							</div>
							<div class="form-group mb-3">
								<label for="jenis_kelamin">Jenis Kelamin</label>
								<select id="jenis_kelamin" name="jenis_kelamin" class="form-control select2" style="width: 100%;" required>
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<option <?php if ($pelanggan['jk'] == "Laki-Laki") echo 'selected'; ?> value="Laki-Laki">Laki-Laki</option>
									<option <?php if ($pelanggan['jk'] == "Perempuan") echo 'selected'; ?> value="Perempuan">Perempuan</option>
								</select>

							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">
							<div class="form-group mb-3">
								<div class="row ">
									<div class="col">
										<label for="nomor_telepon">Nomor Telepon</label>
										<input type="text" id="nomor_telepon" name="nomor_telepon" value="<?= $pelanggan['no_telp'] ?>" class="form-control <?php if (form_error('nomor_telepon')) {
																																									echo ('is-invalid');
																																								} ?>" data-inputmask='"mask": "(+99) 999-9999-99999"' data-mask>
										<div class="invalid-feedback">
											<?= form_error('nomor_telepon') ?>
										</div>
									</div>
									<div class="col">
										<label for="kota">Kota</label>
										<input type="text" id="kota" name="kota" class="form-control <?php if (form_error('kota')) {
																											echo ('is-invalid');
																										} ?>" value="<?= $pelanggan['kota'] ?>" maxlength="25">
										<div class="invalid-feedback">
											<?= form_error('kota') ?>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group mb-3">
								<label for="alamat">Alamat Lengkap</label>
								<textarea id="alamat" style="resize:none;height:145px;" name="alamat" class="form-control <?php if (form_error('alamat')) {
																																echo ('is-invalid');
																															} ?>"><?= $pelanggan['alamat'] ?></textarea>
								<div class="invalid-feedback">
									<?= form_error('alamat') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-right">
			<button type="submit" class="btn btn-icon btn-success mr-2"><i class="fas fa-save"></i> Update</button>
			<a href="<?= base_url('pelanggan') ?>" class="btn btn-icon btn-danger"><i class="fas fa-xmark"></i> Cancel</a>
		</div>
	</form>
</section>