<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Alternate &raquo; Cetak Nota <?=$transaksi->id?></title>
<link rel="shortcut icon" href="<?= base_url('assets/image') ?>/laund.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<style>
		body {
			font-size: 16px;
			width: 8cm;
			font-family: Arial, sans-serif;
		}

		.table-produk {
			font-size: 14px;
		}

		.table-produk tbody::after {
			content: '';
			display: block;
			height: 20px;
		}

		@media print {
			body {
				font-size: 14px;
				width: 8cm;
				font-family: Arial, sans-serif;
			}

			.table-produk {
				font-size: 14px;
			}

			.table-produk tbody::after {
				content: '';
				display: block;
				height: 20px;
			}
		}
	</style>
</head>

<body>
	<h4 class="text-center">ALTERNATE</h4>
	<h6 class="text-center">Jl.Raya Ngantru 99,Tulungagung<br />
		Nomor Telepon: 0895710518585<h6>

			<table width="100%">
				<tbody>
					<tr>
						<td><?= date('d M Y',$transaksi->date_created) ?></td>
						<td class="text-right"><?= $transaksi->nama ?></td>
					</tr>
					<tr>
						<td><?= $transaksi->no_transaksi ?></td>
						<td class="text-right"><?= $transaksi->nama_pelanggan ?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<table class="table-produk">
				<tdead>
					<tr style="border-top: 1px solid; border-bottom: 1px solid;">
						<td width="50">No</td>
						<td colspan="2">Nama</td>
						
						<td width="125" class="text-right">Harga</td>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td colspan="3"><?= $transaksi->nama_paket ?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td width="200"><?= $transaksi->qty ?></td>
							<td width="200"><?= $transaksi->biaya ?></td>
							<td class="text-right"><?= $transaksi->total ?></td>
						</tr>
					</tbody>
					<tfoot>
						<tr style="border-top: 1px solid;">
							<td colspan="3" class="text-right" style="margin-top: 10cm;">Total Bayar</td>
							<td class="text-right"><?= rupiah($transaksi->total); ?></td>
						</tr>
						<tr>
							<td colspan="3" class="text-right">Bayar</td>
							<td class="text-right"><?= rupiah($transaksi->total); ?></td>
						</tr>
						<tr>
							<td colspan="3" class="text-right">Kembali</td>
							<td class="text-right"><?= rupiah($transaksi->kembalian); ?></td>
						</tr>
					</tfoot>
			</table>
			<br>
			<p class="text-center">** Selalu Patuhi Protokol Kesehatan **<br />
				Stay safe dan maen epep tiap hari</p>
			<script type="text/javascript">
				window.onload = function() {
					window.print();
				}
			</script>
</body>

</html>