-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2024 pada 15.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_teknisi`
--

CREATE TABLE `tbl_teknisi` (
  `IdTeknisi` char(10) NOT NULL DEFAULT '',
  `NamaTeknisi` varchar(40) DEFAULT NULL,
  `AlamatTeknisi` varchar(100) DEFAULT NULL,
  `NoTelepon` varchar(15) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_teknisi`
--

INSERT INTO `tbl_teknisi` (`IdTeknisi`, `NamaTeknisi`, `AlamatTeknisi`, `NoTelepon`, `Email`) VALUES
('TNS00001', 'Adam Kholis Nurhidayat', 'Grand Tigaraksa, Kec. Solear. Kab. Tangerang, Banten', '089856241234', 'adamkholis123@gmail.com'),
('TNS00003', 'Dani Hidayatullah', 'Jl. Pasar Senen Blok II, Jakarta Pusat', '089856241234', 'dani89@gmail.com'),
('TNS00004', 'Gugun Gunawan', 'Perum. Puri Indah Permai, Kec. Tigaraksa, Kab. Tangerang, Banten', '089856241234', 'gugun54@gmail.com'),
('TNS00002', 'Susi Similikity', 'Jl.  Pasar Minggu, Jakarta Selatan', '089856241234', 'susisimi782@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `KodeTiket` char(10) NOT NULL DEFAULT '',
  `Tanggal` date DEFAULT NULL,
  `IdTeknisi` char(10) DEFAULT NULL,
  `StatusTiket` enum('Rejected','Progress','Done') NOT NULL,
  `Keterangan` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`KodeTiket`, `Tanggal`, `IdTeknisi`, `StatusTiket`, `Keterangan`) VALUES
('HLP00001', '2024-04-27', 'TNS00001', 'Done', 'printer rusak di lantai 1'),
('HLP00002', '2024-06-06', 'TNS00003', 'Done', 'Monitor mati di lantai 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `IdUser` char(25) NOT NULL DEFAULT '',
  `PasswordUser` varchar(64) DEFAULT NULL,
  `NamaUser` varchar(40) DEFAULT NULL,
  `HakAkses` char(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`IdUser`, `PasswordUser`, `NamaUser`, `HakAkses`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', 'ADMINISTRATOR', 'admin'),
('idris', '202cb962ac59075b964b07152d234b70', 'Maulana Idris', 'pegawai'),
('meyrina', 'd9b1d7db4cd6e70935368a1efb10e377', 'Meyrina Lestari', 'pegawai'),
('joko', '202cb962ac59075b964b07152d234b70', 'Joko Wiranto', 'pegawai'),
('dafa', '202cb962ac59075b964b07152d234b70', 'Dafa Adi Raharjo', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_teknisi`
--
ALTER TABLE `tbl_teknisi`
  ADD PRIMARY KEY (`IdTeknisi`);

--
-- Indeks untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`KodeTiket`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`IdUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
