<section class="section">
	<form action="<?= base_url('transaksi/update/' . $transaksi['id_transaksi']) ?>" method="POST">
		<div class="section-header">
			<h1><?= $title ?></h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('transaksi') ?>">Transaksi</a></div>
				<div class="breadcrumb-item"><?= $title ?></div>
			</div>
		</div>

		<div class="section-body">
			<div class="row sortable-card">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-body">
							<!-- <div class="form-group">
								<label>Kode Pelanggan</label>
								<input type="text" name="kode_pelanggan" value="<?= $transaksi->kode_pelanggan ?>" readonly class="form-control">
							</div> -->
							<div class="form-group">
								<label>Nama Pelanggan</label>
								<input type="text" id="nama" name="nama" value="<?= $transaksi['nama'] ?>" readonly class="form-control" maxlength="20">
							</div>
							<div class="form-group">
								<label for="nomo_telepom">Nomor Telepon</label>
								<input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="<?= $transaksi['no_telp'] ?>" readonly>

							</div>
							<div class="form-group mt-4">
								<label for="note">Catatan</label>
								<textarea placeholder="Masukkan Catatan" style="resize:none;height:148px;" name="note" id="note" class="form-control"><?= $transaksi['note'] ?></textarea>
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
										<input type="text" name="no_transaksi" value="<?= $transaksi['no_transaksi'] ?>" readonly class="form-control">
									</div>
									<div class="col">
										<label>Tanggal Masuk</label>
										<input type="datetime" name="tanggal" value="<?= date('d M Y / H:i:s',$transaksi['created']) ?>" readonly class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>ID Paket</label>
								<input type="text" name="id_paket" value="<?= $transaksi['nama_paket'] ?>" readonly class="form-control">
							</div>
							<div class="form-group">
								<div class="row ">
									<div class="col">
										<label>Harga</label>
										<input type="text" name="harga" id="harga"  value="<?= $transaksi['harga'] ?>" readonly class="form-control">
									</div>
									<div class="col">
										<label>Quantity</label>
										<input type="text" name="qty" id="qty"  class="form-control" value="<?= $transaksi['qty'] ?>" readonly>
										<small class="form-text text-danger"><?= form_error('qty') ?></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row ">
									<div class="col">
										<label>Total</label>
										<input type="text" name="total" id="total" value="<?= $transaksi['total'] ?>" readonly class="form-control">
									</div>
									<div class="col">
										<label id="rupiah">Bayar</label>
										<input type="text" name="bayar" id="bayar" value="<?= $transaksi['bayar'] ?>" readonly class="form-control">
										<small class="form-text text-danger"><?= form_error('bayar') ?></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row ">
									<div class="col">
										<label for="status">Status</label>
										<select name="status" id="status" class="form-control select2 " required style="width: 100%;">
											<option selected disabled value="">-- Silahkan Pilih --</option>
											<option <?php if ($transaksi['status'] == "1") echo 'selected'; ?> value="1">
												Permintaan Diterima</option>
											<option <?php if ($transaksi['status'] == "2") echo 'selected'; ?> value="2">
												Sedang Dicuci</option>
											<option <?php if ($transaksi['status'] == "3") echo 'selected'; ?> value="3">
												Sedang Dijemur</option>
											<option <?php if ($transaksi['status'] == "4") echo 'selected'; ?> value="4">
												Sedang Disetrika</option>
											<option <?php if ($transaksi['status'] == "5") echo 'selected'; ?> value="5">
												Siap Diambil</option>
											<option <?php if ($transaksi['status'] == "6") echo 'selected'; ?> value="6">
												Sudah Diambil</option>
										</select>
									</div>
									<div class="col">
										<label>Kembalian</label>
										<input type="text" name="kembalian" id="kembalian" value="<?= $transaksi['kembalian'] ?>" readonly class="form-control">
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-right">

			<button type="submit" class="btn btn-icon btn-success mr-2"><i class="fas fa-save"></i> Update</button>
			<a href="<?= base_url('transaksi') ?>" class="btn btn-icon btn-danger"><i class="fas fa-xmark"></i>
			Cancel</a>
		</div>
	</form>
</section>