<section class="section">
  <div class="section-header">
    <h1><?= $title ?></h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url('transaksi') ?>">Transaksi</a></div>
      <div class="breadcrumb-item"><?= $title ?></div>
    </div>
  </div>
  <div class="section-body">
    <div class="invoice">
      <div class="invoice-print">
        <div class="row">
          <div class="col-12">
            <h4>
              <img src="<?= base_url('assets/image') ?>/iconl25.png">
              <strong>Alternate</strong>
              <small class="float-right">Tanggal Sekarang: <?= date('d/m/Y') ?></small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <br>
            Dari
            <address>
              <strong>MY Laundry</strong><br>
              JL RAYA NGANTRU NO 99<br>
              TULUNGAGUNG<br>
              Telepon: (+62) 895-7105-18585<br>
              Email: frendyrahma26@gmail.com
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <br>
            Untuk
            <address>
              <strong><?= $transaksi['nama_pelanggan'] ?></strong><br>
              <?= $transaksi['alamat'] ?>,<?= $transaksi['kota'] ?>, <br>
              No Telepon: <?= $transaksi['no_telp'] ?><br>
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <br>
            <b>Invoice <?= $transaksi['no_transaksi'] ?><br>
              <br>
              <b>Tgl Transaksi:</b> <?= date('d M Y / H:i:s',$transaksi['created']) ?><br>
              <b>Nama Kasir:</b> <?= $transaksi['nama'] ?>
          </div>
          <!-- /.col -->
        </div>

        <div class="row mt-4">
          <div class="col-md-12">
            <div class="section-title">Order Summary</div>
            <p class="section-lead">Data yang ada disini tidak dapat dihapus.</p>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-md">
                <tr>
                  <th data-width="40">#</th>
                  <th>Paket</th>
                  <th>Include</th>
                  <th>Harga</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-right">Total</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td><?= $transaksi['nama_paket'] ?></td>
                  <td><?= $transaksi['barang'] ?></td>
                  <td><?= rupiah($transaksi['harga']) ?></td>
                  <td class="text-center"><?= $transaksi['qty'] ?></td>
                  <td class="text-right"><?= rupiah($transaksi['total']) ?></td>
                </tr>
              </table>
            </div>
            <div class="row mt-4">
              <div class="col-lg-8">

                <div class="d-flex">

                </div>
              </div>
              <div class="col-lg-4 text-right">
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Total</div>
                  <div class="invoice-detail-value"><?= rupiah($transaksi['total']); ?></div>
                </div>
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Bayar</div>
                  <div class="invoice-detail-value"><?= rupiah($transaksi['bayar']); ?></div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Kembalian</div>
                  <div class="invoice-detail-value invoice-detail-value-lg"><?= rupiah($transaksi['kembalian']); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="text-md-right">
        <a href="<?= base_url('transaksi/nota/') . $transaksi['id_transaksi']; ?>" rel="noopener" target="_blank" class="btn btn-primary btn-icon icon-left">
          <i class="fas fa-print"></i> Print Nota
        </a>


      </div>
    </div>
  </div>
</section>