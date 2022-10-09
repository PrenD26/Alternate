-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Okt 2022 pada 04.34
-- Versi server: 5.7.37
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newalternate`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `v_mutasidetail` (IN `id_mutasi` INT(11))   BEGIN
SELECT A.id_mutasi, A.id_user,A.updated, A.created, A.no_mutasi, A.nominal, A.keterangan, A.jenis, B.username
FROM `mutasi` A 
JOIN `user` B ON 
A.id_user = B.id_user
WHERE A.id_mutasi = id_mutasi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `v_transdetail` (IN `id_transaksi` INT(11))   BEGIN
SELECT A.id_transaksi, A.note, A.no_transaksi, A.status, A.created, A.updated, A.qty, A.harga, A.bayar, A.total, A.kembalian,  B.alamat,  B.kota, B.no_telp,B.nama_pelanggan, C.barang, C.nama_paket,C.jenis,D.username, D.nama
FROM `transaksi` A 
JOIN `pelanggan` B ON 
A.id_pelanggan = B.id_pelanggan
JOIN `paket` C ON 
A.id_paket = C.id_paket 
JOIN `user` D ON 
A.id_user = D.id_user
WHERE A.id_transaksi = id_transaksi;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `jenis_barang`) VALUES
(1, 'Amogus'),
(3, 'Amoguslo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_mutasi` varchar(255) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `nominal` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_user`, `no_mutasi`, `jenis`, `nominal`, `keterangan`, `created`, `updated`) VALUES
(4, 1, 'MTS-0910221028', 'pemasukan', '8.999', 'topup', 1665277836, 0),
(5, 1, 'MTS-0910221123', 'pemasukan', 'pemasukan', 'topup', 1665277889, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `biaya` varchar(50) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `dibuat` datetime NOT NULL,
  `diubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jk`, `alamat`, `no_telp`, `kota`, `created`, `updated`) VALUES
(8, 'Menggokil', 'Perempuan', 'Jalan Raya Ngantru No 99,Desa Ngantru,Kec Ngantru,Kab Tulungagung', '(+62) 895-7105-18585', 'TULUNGAGUNG', 1647693174, 1647693542);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `id_paket` varchar(25) NOT NULL,
  `no_transaksi` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(25) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `note` varchar(250) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `id_paket`, `no_transaksi`, `nama_pelanggan`, `harga`, `qty`, `total`, `bayar`, `kembalian`, `status`, `note`, `created`, `updated`) VALUES
(5, '9', '8', '2', 'TRS- 193225958', '', 4000, 4, '16000', 20000, 4000, '3', '', 1647694809, 1647695077);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `bio` text NOT NULL,
  `kondisi` tinyint(4) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `last_login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`, `status`, `image`, `no_telepon`, `bio`, `kondisi`, `created`, `updated`, `last_login`) VALUES
(1, 'admin', '$2y$10$XAIZ52LTd688ZA0cr4BlKee8m6DIpbgv7lqrTczeLn.MysesPK9Ri', 'Frendy', 'Admin', 'Active', 'f.png', '', '<p>amogus is red yahaha</p>', 1, 1644409840, 1665276358, '1665278782'),
(8, 'temon', '$2y$10$6vxbdPKaz48mxUgQfNGdcu8S6tt5C8Y1TvJ0Jt5roP.zeiE2/Fn0e', 'adous', 'Admin', 'Inactive', 'layla2.png', '(+62) 895-7105-18585', '', 2, 1647591613, 1665276613, '1665276242'),
(9, 'temakux', '$2y$10$/mMcVMV13N3xBoeHxMQwEOOoVeCvDX/9cta4/14RW.41yKZ92vV1u', 'loeaszxx', 'Admin', 'Active', 'layla2.png', '(+62) 895-7105-18585', '', 1, 1647693950, 1647695513, '1647696380');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_mutasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_mutasi` (
`id_mutasi` int(11)
,`updated` int(11)
,`id_user` int(11)
,`created` int(11)
,`no_mutasi` varchar(255)
,`nominal` varchar(25)
,`keterangan` text
,`jenis` varchar(25)
,`username` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi` (
`id_transaksi` int(11)
,`note` varchar(250)
,`no_transaksi` varchar(25)
,`status` varchar(25)
,`created` int(11)
,`updated` int(11)
,`qty` int(11)
,`harga` int(11)
,`bayar` int(11)
,`total` varchar(25)
,`kembalian` int(11)
,`alamat` varchar(255)
,`kota` varchar(255)
,`no_telp` varchar(50)
,`nama_pelanggan` varchar(50)
,`barang` varchar(50)
,`nama_paket` varchar(50)
,`username` varchar(50)
,`nama` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_mutasi`
--
DROP TABLE IF EXISTS `view_mutasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mutasi`  AS SELECT `mutasi`.`id_mutasi` AS `id_mutasi`, `mutasi`.`updated` AS `updated`, `mutasi`.`id_user` AS `id_user`, `mutasi`.`created` AS `created`, `mutasi`.`no_mutasi` AS `no_mutasi`, `mutasi`.`nominal` AS `nominal`, `mutasi`.`keterangan` AS `keterangan`, `mutasi`.`jenis` AS `jenis`, `user`.`username` AS `username` FROM (`mutasi` join `user` on((`mutasi`.`id_user` = `user`.`id_user`))) ORDER BY `mutasi`.`id_mutasi` ASC  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `transaksi`.`id_transaksi` AS `id_transaksi`, `transaksi`.`note` AS `note`, `transaksi`.`no_transaksi` AS `no_transaksi`, `transaksi`.`status` AS `status`, `transaksi`.`created` AS `created`, `transaksi`.`updated` AS `updated`, `transaksi`.`qty` AS `qty`, `transaksi`.`harga` AS `harga`, `transaksi`.`bayar` AS `bayar`, `transaksi`.`total` AS `total`, `transaksi`.`kembalian` AS `kembalian`, `pelanggan`.`alamat` AS `alamat`, `pelanggan`.`kota` AS `kota`, `pelanggan`.`no_telp` AS `no_telp`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `paket`.`barang` AS `barang`, `paket`.`nama_paket` AS `nama_paket`, `user`.`username` AS `username`, `user`.`nama` AS `nama` FROM (((`transaksi` join `pelanggan` on((`transaksi`.`id_pelanggan` = `pelanggan`.`id_pelanggan`))) join `paket` on((`transaksi`.`id_paket` = `paket`.`id_paket`))) join `user` on((`transaksi`.`id_user` = `user`.`id_user`))) ORDER BY `transaksi`.`id_transaksi` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_idx` (`no_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
