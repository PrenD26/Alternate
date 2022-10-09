<?php if ($this->session->flashdata('dashboard')) : ?>
    <div class="flash-data10" data-flashdata="<?= $this->session->flashdata('dashboard'); ?>"></div>
<?php endif ?>
<section class="section">
	<div class="section-header">
		<h1><?= $title ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><?= $title ?></div>
		</div>
	</div>
	<div class="section-body">
		
		<div class="row">
		<div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="https://source.unsplash.com/1000x600?cat">
                  <div class="hero-inner">
                    <h2>Welcome, <?=$this->session->userdata['nama']?>!</h2>
                    <p class="lead">Saat ini anda sedang login menggunakan akun dengan Level <?=$this->session->userdata['level']?>.</p>
                    <div class="mt-4">
                      <a href="<?=base_url('profile')?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Profile</a>
                    </div>
                  </div>
                </div>
              </div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-cash-register"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Transaksi</h4>
						</div>
						<div class="card-body">
							<?= $jumlah_transaksi ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="far fa-wallet"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pendapatan</h4>
						</div>
						<div class="card-body">
							<?= rupiah($hitung); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="far fa-users"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>User Terdaftar</h4>
						</div>
						<div class="card-body">
							<?= $jumlah_user ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-address-book"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan Terdaftar</h4>
						</div>
						<div class="card-body">
							<?= $jumlah_pelanggan ?>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4>Transaksi</h4>
						<div class="card-header-action">
							<a href="<?= base_url('Transaksi'); ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive table-invoice">

							<table class="table table-striped">
								<tr class="text-center">
									<th>No Transaksi</th>
									<th>Pelanggan</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								<?php $no = 1;
								foreach ($transaksi as $tsk) : ?>
									<tr class="text-center">
										<td><?= $tsk['no_transaksi'] ?></td>
										<td><?= $tsk['nama_pelanggan'] ?></td>
										<td> <?php
												switch ($tsk['status']) {
													case 1;
														echo '<span class="badge badge-me" style="font-size:14px !important;">Permintaan Diterima</span>';
														break;
													case 2;
														echo '<span class="badge badge-ji" style="font-size:14px !important;">Sedang Dicuci</span>';
														break;
													case 3;
														echo '<span class="badge badge-ku" style="font-size:14px !important;">Sedang Dijemur</span>';
														break;
													case 4;
														echo '<span class="badge badge-hi" style="font-size:14px !important;">Sedang Disetrika</span>';
														break;
													case 5;
														echo '<span class="badge badge-bi" style="font-size:14px !important;">Siap Diambil</span>';
														break;
													case 6;
														echo '<span class="badge badge-ni" style="font-size:14px !important;">Sudah Diambil</span>';
														break;
												}
												?>
										</td>
										<td>
											<a href="<?= base_url('transaksi/detail/') . $tsk['id_transaksi'] ?> " class="btn btn-icon btn-primary "><i class="fas fa-eye"></i></a>
										</td>
									</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4>User Sedang Aktif</h4>
						<div class="card-header-action">
							<a href="<?= base_url('User') ?>" class="btn btn-danger">Lihat Data User <i class="fas fa-chevron-right"></i></a>
						</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Nama User</label>
							<input type="text" class="form-control" value="<?= $this->session->userdata['nama'] ?>" readonly>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" value="<?= $this->session->userdata['username'] ?>" readonly>
						</div>
						<div class="form-group">
							<label>Level</label>
							<input type="text" class="form-control" value="<?= $this->session->userdata['level'] ?>" readonly>
						</div>
						<div class="form-group">
							<label>Jam Login</label>
							<input type="text" class="form-control" value="<?= date('H:i:s',$this->session->userdata['jam_login']) ?>" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
