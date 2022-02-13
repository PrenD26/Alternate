<section class="section">
	<form action="<?= base_url('Paket/create') ?>" method="POST">
		<div class="section-header">
			<h1><?= $title ?></h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('paket') ?>">Data Paket</a></div>
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
								<label>Kode Paket</label>
								<input type="text" name="kode_paket" class="form-control" value="PKT - <?= mt_rand(10, 99) ?>" maxlength="8" readonly>
							</div>
							<div class="form-group">
								<label for="nama_paket">Nama Paket</label>
								<input type="text" id="nama_paket" placeholder="Nama Paket" name="nama_paket" class="form-control <?php if (form_error('nama_paket')) {
																																		echo ('is-invalid');
																																	} ?>" value="<?=set_value('nama_paket')?>">
								<div class="invalid-feedback">
									<?= form_error('nama_paket') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="biaya">Biaya</label>
								<input type="number" name="biaya" id="biaya" placeholder="Harga" class="form-control <?php if (form_error('biaya')) {
																																		echo ('is-invalid');
																																	} ?>" value="<?=set_value('biaya')?>">
								<div class="invalid-feedback">
									<?= form_error('biaya') ?>
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
								<label for="waktu">Estimasi Waktu</label>
								<input type="number" id="waktu" name="waktu" placeholder="Estimasi Waktu Pekerjaan" class="form-control <?php if (form_error('waktu')) {
																																		echo ('is-invalid');
																																	} ?>"value="<?=set_value('waktu')?>" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
									<div class="invalid-feedback">
									<?= form_error('waktu') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="jenis">Jenis Paket</label>
								<select name="jenis" id="jenis" required class="form-control select2 " style="width: 100%;">
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<option <?= set_select('jenis','Satuan'); ?>>Satuan</option>
									<option <?= set_select('jenis','Kiloan'); ?>>Kiloan</option>
								</select>
							</div>
							<div class="form-group ">
								<label for="barang">Include Barang</label>
								<select placeholder="Pilih Barang" required name="barang[]" id="barang" multiple="multiple" class="form-control select2" data-placeholder="Pilih Include Barang">
									<option disabled value="">-- Silahkan Pilih --</option>
									<?php foreach ($barang as $brg) : ?>
										<option value="<?= $brg->jenis_barang ?>"><?= $brg->jenis_barang ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<button type="submit" class="btn btn-icon btn-primary"><i class="fas fa-save"></i> Simpan</button>
		<a href="<?= base_url('paket') ?>" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i>
			Batal</a>
	</form>
</section>