<section class="section">
	<form action="<?= base_url('Pcreate') ?>" method="POST">
		<div class="section-header">
			<h1><?= $title ?></h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('paket') ?>">Data Paket</a></div>
				<div class="breadcrumb-item"><?= $title ?></div>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">
							<!-- <div class="form-group">
								<label for="k_paket">Kode Paket</label>
								<input type="text" name="kode_paket" id="k_paket" class="form-control" value="PKT - <?= mt_rand(10, 99) ?>" maxlength="8" readonly>
							</div> -->
							<div class="form-group">
								<label for="nama_paket">Nama Paket</label>
								<input type="text" id="nama_paket" placeholder="Nama Paket" name="nama_paket" class="form-control <?php if (form_error('nama_paket')) {
																																		echo ('is-invalid');
																																	} ?>" value="<?= set_value('nama_paket') ?>">
								<div class="invalid-feedback">
									<?= form_error('nama_paket') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="biaya">Biaya</label>
								<input type="number" name="biaya" id="biaya" placeholder="Harga" class="form-control <?php if (form_error('biaya')) {
																															echo ('is-invalid');
																														} ?>" value="<?= set_value('biaya') ?>">
								<div class="invalid-feedback">
									<?= form_error('biaya') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="waktu">Estimasi Waktu</label>
								<input type="number" id="waktu" name="waktu" placeholder="Estimasi Waktu Pekerjaan (Dalam Hari)" class="form-control <?php if (form_error('waktu')) {
																																							echo ('is-invalid');
																																						} ?>" value="<?= set_value('waktu') ?>" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
								<div class="invalid-feedback">
									<?= form_error('waktu') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">

							<div class="form-group">
								<label for="jenis">Jenis Paket</label>
								<select name="jenis" id="jenis" required class="form-control select2 " style="width: 100%;">
									<option selected disabled value="">-- Pilih Jenis Paket --</option>
									<option <?= set_select('jenis', 'Satuan'); ?>>Satuan</option>
									<option <?= set_select('jenis', 'Kiloan'); ?>>Kiloan</option>
								</select>
							</div>
							<div class="form-group ">
								<label for="barang">Include Barang</label>
								<select placeholder="Pilih Barang" required name="barang[]" id="barang" multiple="multiple" class="form-control select2" data-placeholder="Pilih Barang">
									<?php foreach ($barang as $brg) : ?>
										<option value="<?= $brg['jenis_barang'] ?>"><?= $brg['jenis_barang'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-icon btn-primary mr-2 mt-3"><i class="fas fa-save"></i> Save</button>
						<a href="<?= base_url('paket') ?>" class="btn btn-icon btn-danger mt-3"><i class="fas fa-xmark"></i>
							Cancel</a>
					</div>
				</div>
			</div>
		</div>

	</form>
</section>