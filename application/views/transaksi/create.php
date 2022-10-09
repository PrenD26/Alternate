<section class="section">
	<form action="<?= base_url('transaksi/input') ?>" method="POST">
		<div class="section-header">
			<h1><?= $title ?></h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('transaksi') ?>">Transaksi</a></div>
				<div class="breadcrumb-item"><?= $title ?></div>
			</div>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">
							<div class="form-group">
								<label for="id_pelanggan">ID Pelanggan</label>
								<select name="id_pelanggan" id="id_pelanggan" class="form-control select2" onchange="return autofill();">
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<?php foreach ($pelanggan as $plg) : ?>
										<option value="<?= $plg['id_pelanggan'] ?>"><?= $plg['nama_pelanggan'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nama Pelanggan</label>
								<input type="text" placeholder="Auto" id="nama_pelanggan" name="nama_pelanggan" class="form-control" readonly maxlength="20">
							</div>
							<div class="form-group">
								<label for="nomor_telepon">Nomor Telepon</label>
								<input type="text" placeholder="Auto" name="nomor_telepon" id="nomor_telepon" readonly class="form-control">
							</div>
							<div class="form-group mt-4">
								<label for="note">Catatan</label>
								<textarea placeholder="Masukkan Catatan" style="resize:none;height:148px;" name="note" id="note" class="form-control"></textarea>
							</div>
						</div>
					</div>

				</div>

				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">
							<div class="form-group">
								<div class="row ">
									<div class="col">
										<label>No Transaksi</label>
										<input type="text" name="no_transaksi" value="TRS- <?= date('dnyis', time()) ?>" readonly class="form-control">
									</div>
									<div class="col">
										<label>Tanggal Penjualan</label>
										<input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" readonly class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="id_paket">ID Paket</label>
								<select name="id_paket" id="id_paket" class="form-control select2" onchange="return autofill();">
									<option selected disabled value="">-- Silahkan Pilih --</option>
									<?php foreach ($paket as $pkt) : ?>
										<option value="<?= $pkt['id_paket'] ?>"><?= $pkt['nama_paket'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<div class="row ">
									<div class="col">
										<label>Harga</label>
										<input type="text" placeholder="Auto" name="harga" id="harga" onkeyup="jumlahBiaya();" value="" readonly class="form-control">
									</div>
									<div class="col">
										<label for="qty">Quantity</label>
										<input type="number" placeholder="Masukan Qty / satuan" name="qty" id="qty" onkeyup="jumlahBiaya();" class="form-control" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
										<small class="form-text text-danger"><?= form_error('qty') ?></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row ">
									<div class="col">
										<label>Total</label>
										<input type="text" placeholder="Auto" name="total" id="total" onkeyup="jumlahKembalian();" value="" readonly class="form-control">
									</div>
									<div class="col">
										<label for="bayar">Bayar</label>
										<input type="number" placeholder="Masukkan Jumlah Bayar" name="bayar" id="bayar" onkeyup="jumlahKembalian();" min="1000" value="" class="form-control" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
										<small class="form-text text-danger"><?= form_error('bayar') ?></small>
									</div>
								</div>

							</div>
							<div class="form-group">
								<div class="row ">
									<div class="col">
										<label>Kembalian</label>
										<input type="text" placeholder="Auto" name="kembalian" id="kembalian" value="" readonly class="form-control">
										<small class="form-text text-danger"><?= form_error('kembalian') ?></small>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-right">
			<button type="submit" class="btn btn-icon btn-primary mr-2"><i class="fas fa-save"></i> Save</button>
			<a href="<?= base_url('Transaksi') ?>" class="btn btn-icon btn-danger"><i class="fas fa-xmark"></i>
			Cancel</a>
		</div>
	</form>
</section>
<script>
	function autofill() {
		var id_paket = document.getElementById('id_paket').value;
		var id_pelanggan = document.getElementById('id_pelanggan').value;
		$.ajax({
			url: "<?= base_url('transaksi/cari') ?>",
			data: '&id_paket=' + id_paket,

			success: function(data) {
				var hasil = JSON.parse(data);

				$.each(hasil, function(key, val) {

					document.getElementById('id_paket').value = val.id_paket;
					document.getElementById('harga').value = val.biaya;
				});
			}
		});
		$.ajax({
			url: "<?= base_url('transaksi/cari_pelanggan') ?>",
			data: '&id_pelanggan=' + id_pelanggan,

			success: function(data) {
				var hasil = JSON.parse(data);

				$.each(hasil, function(key, val) {

					document.getElementById('id_pelanggan').value = val.id_pelanggan;
					document.getElementById('nama_pelanggan').value = val.nama_pelanggan;
					document.getElementById('nomor_telepon').value = val.no_telp;
					document.getElementById('alamat').value = val.alamat;
				});
			}
		});
	}

	function jumlahBiaya() {
		var harga = document.getElementById('harga').value;
		var qty = document.getElementById('qty').value;
		var result = parseInt(harga) * parseInt(qty);
		if (!isNaN(result)) {
			document.getElementById('total').value = result;
		}
	}

	function jumlahKembalian() {
		var bayar = document.getElementById('bayar').value;
		var total = document.getElementById('total').value;
		var result = parseInt(bayar) - parseInt(total);
		if (!isNaN(result)) {
			document.getElementById('kembalian').value = result;
		}
	}
</script>
<style>
	h6.hidden {
		visibility: hidden;
	}
</style>