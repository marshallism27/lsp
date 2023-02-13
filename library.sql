-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 12:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` int(20) NOT NULL,
  `jbb` int(5) NOT NULL,
  `jbr` int(5) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `kategori`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jbb`, `jbr`, `deleted_at`) VALUES
(1, 'Cara masak beruang', 'Umum', 'Juan', 'BSE', 2010, 175894, 26, 1, NULL),
(2, 'Decade', 'Sejarah', 'BeWhy', 'BSE', 2015, 12345678, 22, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` int(20) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode`, `nama`, `deleted_at`) VALUES
(1, 'umum', 'Umum', NULL),
(2, 'sejarah', 'Sejarah', NULL),
(3, 'sains', 'Sains', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `level_user` enum('user','admin') NOT NULL,
  `status` enum('nonaktif','aktif') NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `isi`, `level_user`, `status`, `deleted_at`) VALUES
(1, 'pERPUS kebakaran', 'user', 'aktif', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `t_pinjam` datetime NOT NULL,
  `t_kembali` datetime DEFAULT NULL,
  `k_buku_p` enum('BAIK','RUSAK') NOT NULL,
  `k_buku_k` enum('BAIK','RUSAK') NOT NULL,
  `denda` decimal(10,0) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_user`, `id_buku`, `t_pinjam`, `t_kembali`, `k_buku_p`, `k_buku_k`, `denda`, `deleted_at`) VALUES
(2, 2, 1, '2023-02-08 13:31:34', NULL, 'BAIK', '', '0', NULL),
(3, 2, 2, '2023-02-08 13:33:44', '2023-02-23 19:33:44', 'BAIK', 'RUSAK', '1', NULL),
(4, 6, 2, '2023-02-09 02:20:54', '2023-02-22 08:20:54', 'BAIK', 'RUSAK', '1', NULL),
(5, 7, 2, '2023-02-10 04:55:29', NULL, 'BAIK', '', '0', NULL),
(6, 7, 1, '0000-00-00 00:00:00', NULL, 'BAIK', 'BAIK', '1', NULL),
(7, 7, 2, '2023-02-15 00:00:00', NULL, 'BAIK', 'BAIK', '1', NULL),
(8, 7, 2, '2023-02-21 00:00:00', NULL, 'RUSAK', 'BAIK', '1', NULL),
(9, 7, 1, '2023-02-20 00:00:00', NULL, 'BAIK', 'BAIK', '1', NULL),
(10, 7, 2, '2023-02-21 00:00:00', NULL, 'BAIK', 'BAIK', '1', NULL),
(11, 7, 1, '2023-02-10 00:00:00', NULL, 'BAIK', 'BAIK', '1', NULL),
(12, 7, 1, '2023-02-10 00:00:00', NULL, 'BAIK', 'BAIK', '1', NULL),
(13, 7, 2, '2023-02-10 00:00:00', NULL, 'BAIK', 'BAIK', '1', NULL),
(14, 7, 2, '2023-02-10 00:00:00', NULL, 'BAIK', 'BAIK', '1', NULL),
(15, 14, 2, '2023-02-12 00:00:00', NULL, 'BAIK', 'BAIK', '0', NULL),
(16, 15, 2, '0000-00-00 00:00:00', NULL, 'BAIK', 'BAIK', '0', NULL),
(17, 15, 1, '2023-02-13 14:59:57', '2023-02-14 00:30:58', 'BAIK', 'BAIK', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `verif` enum('VERIFIED','UNVERIFIED') NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `kode`, `nama`, `verif`, `deleted_at`) VALUES
(1, 'erlangga', 'Erlangga', 'VERIFIED', NULL),
(2, 'bse', 'BSE', 'UNVERIFIED', NULL),
(3, 'gramedia', 'Gramedia', 'VERIFIED', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `penerima` int(11) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `status` enum('terkirim','dibaca') NOT NULL,
  `tanggal_kirim` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nis` int(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `verif` enum('VERIFIED','UNVERIFIED') NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `join_date` datetime NOT NULL,
  `terakhir_login` datetime DEFAULT NULL,
  `foto` text NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `kode`, `nis`, `fullname`, `username`, `password`, `kelas`, `alamat`, `verif`, `role`, `join_date`, `terakhir_login`, `foto`, `deleted_at`) VALUES
(1, '', 0, 'jbvugv', 'kunaon', '$2y$10$y98eMFOWObxmL3ZGiKdRneGGSpHVx2Kmf/zLpCdnZykVtEedBitOS', '', '', 'VERIFIED', 'admin', '0000-00-00 00:00:00', NULL, '../images20230211123123IMG-20201009-WA0090.jpg', NULL),
(2, 'a1', 0, 'gyu', 'gyu', '123', '', '', 'VERIFIED', 'user', '2023-02-07 05:06:33', NULL, '', NULL),
(3, 'adm1', 0, 'hui', 'hui', '$2y$10$HPm4r3vX39XPtqHrsRPyW.5ko7j3sasVlkqsmQ/JY7qVScuSZJeei', '', 'HIVE', 'VERIFIED', 'admin', '0000-00-00 00:00:00', NULL, '../images202302110922361.png', NULL),
(4, '', 0, 'nf', 'f', '$2y$10$LSxRsAzgN1Xe6oHzlGjPiemhGzeBXGWzcYdWwtusX9dJyPX6gG0HG', '', '', 'UNVERIFIED', 'user', '0000-00-00 00:00:00', NULL, '', '2023-02-12 12:13:29'),
(5, '', 0, 'nada', 'nk', '123', '', '', 'VERIFIED', 'user', '2023-02-07 08:27:07', NULL, '', NULL),
(6, 'U009', 0, '', '', '$2y$10$EM0eyqGptOt4DRfp/axqNeWdEJdPh4bg0ZybATh7ERFVYBPnZNMBK', '', '', 'VERIFIED', 'user', '2023-02-22 00:27:39', '0000-00-00 00:00:00', '../images/2023020906083720220519_065648.jpg', NULL),
(7, '123', 89, 'zik', 'zikrannn', '', '12-RPL', 'jakarta', 'VERIFIED', 'admin', '0000-00-00 00:00:00', NULL, '../images/20230209074634IMG-20201009-WA0090.jpg', NULL),
(8, 'A4', 0, 'nada', 'kure', '$2y$10$sCaJRXu2mg85rfxl9L25quTYX7SR2mzjlhbWRcXTbhnhY23j0GhAe', '', 'Dukuh', 'VERIFIED', 'user', '0000-00-00 00:00:00', NULL, '', NULL),
(9, 'ADM9', 0, 'LOL', 'LOL', '$2y$10$sNfgwtKZU1p7yUoZZFEyq.ihIXursYfUGWA5P49khslUeX5WCP6pu', '', 'Raccon City', 'VERIFIED', 'admin', '0000-00-00 00:00:00', NULL, '', NULL),
(10, 'GUVBJNK', 0, 'KP', 'KP', '$2y$10$I9L/GITiiot4bjjRRC04BuPPxUId4X8Ansv4cAENORf8404zo8g8m', '', 'Racc', 'VERIFIED', 'admin', '0000-00-00 00:00:00', NULL, '', NULL),
(11, '', 0, 'akmal', 'kimal', '$2y$10$wtDHJ8kU11rH4hmwfA706eJZxlat8qmTbEui6iV.jm/OzRzhyon96', '', '', 'UNVERIFIED', 'user', '0000-00-00 00:00:00', NULL, '', '2023-02-12 03:42:29'),
(12, '12323423', 0, 'ehbjdwn', 'juju', '$2y$10$kwMqzyKP5NyF1y3PGRaphusbGp9ArvxHGjedOYJRD6OxQVHxPGTRe', '', 'Racc', 'VERIFIED', 'admin', '0000-00-00 00:00:00', NULL, '', NULL),
(13, 'A5', 0, 'ser', 'admin', '$2y$10$85Km3uggdLcnDnapR46l6OD8HQPEwJHFJUpF8iMivRKLRPWBSDjda', '', 'Dukuh636k3', 'VERIFIED', 'admin', '2023-02-12 03:19:36', NULL, '', NULL),
(14, '', 12312, 'dum', 'dummy', '$2y$10$G907BWzC84Ox6Dm7uFMfMeKSPmaJwwAE7l1TQKF0d1Pv7TmAZm.rm', 'XII-AKBP', 'Dukuh', '', 'user', '2023-02-12 05:19:19', NULL, '../images20230212120912ymir titan.jpg', NULL),
(15, '', 0, 'mon', 'mon', '$2y$10$2cM/Ypf7V0P1itsQteT0MuSUe4VMvkA7bjixAGCeIvvRmZtR0k2VS', '', '', 'VERIFIED', 'user', '2023-02-15 20:07:07', NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `penerbit` (`penerbit`),
  ADD KEY `judul` (`judul`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judul` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penerima` (`penerima`),
  ADD KEY `pengirim` (`pengirim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`nama`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`penerbit`) REFERENCES `penerbit` (`nama`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`penerima`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`pengirim`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
