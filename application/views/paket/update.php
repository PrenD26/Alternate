<?php
 if (
	$id_paket == null
) {
	redirect('landing_page/notfound');
}
?>
<section class="section">
	<form action="<?= base_url('paket/update/' . $paket['id_paket']) ?>" method="POST">
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
								<label>Kode Paket</label>
								<input type="text" name="kode_paket" class="form-control" value="<?= $paket['kode_paket'] ?>" maxlength="8" readonly>
							</div> -->
							<div class="form-group">
								<label for="nama_paket">Nama Paket</label>
								<input type="text" name="nama_paket" id="nama_paket" class="form-control" value="<?= $paket['nama_paket'] ?>">
								<small class="form-text text-danger"><?= form_error('nama_paket') ?></small>
							</div>

							<div class="form-group">
								<label for="biaya">Biaya</label>
								<input type="number" name="biaya" id="biaya" class="form-control" value="<?= $paket['biaya'] ?>">
								<small class="form-text text-danger"><?= form_error('biaya') ?></small>
							</div>
							<div class="form-group">
								<label for="waktu">Estimasi Waktu</label>
								<input type="number" name="waktu" id="waktu" class="form-control" value="<?= $paket['waktu'] ?>" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
								<small class="form-text text-danger"><?= form_error('waktu') ?></small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">
							<div class="form-group">
								<label for="jenis">Jenis Paket</label>
								<select required name="jenis" id="jenis" class="form-control select2 ">
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<option <?php if ($paket['jenis'] == "Satuan") echo 'selected'; ?> value="Satuan">Satuan</option>
									<option <?php if ($paket['jenis'] == "Kiloan") echo 'selected'; ?> value="Kiloan">Kiloan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="barang">Include Barang</label>
								<select data-placeholder="Pilih Barang" name="barang[]" id="barang" multiple="multiple" class="form-control select2 " required>
									<?php foreach ($barang as $brg) : ?>
										<option value="<?= $brg['jenis_barang'] ?>"><?= $brg['jenis_barang'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-icon btn-success mr-2 mt-3"><i class="fas fa-save"></i> Update</button>
						<a href="<?= base_url('paket') ?>" class="btn btn-icon btn-danger mt-3"><i class="fas fa-xmark"></i>
							Cancel</a>
					</div>
				</div>
			</div>
		</div>

	</form>
</section>