-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 05:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_aktifitas`
--

CREATE TABLE `log_aktifitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `log_aktifitas`
--

INSERT INTO `log_aktifitas` (`id_log`, `id_user`, `login`, `logout`) VALUES
(155, 40, '2024-11-22 19:18:25', '2024-11-22 19:36:57'),
(156, 40, '2024-11-22 19:39:37', '2024-11-22 19:39:48'),
(157, 41, '2024-11-22 19:40:19', '2024-11-22 19:41:14'),
(158, 39, '2024-11-22 19:41:17', '2024-11-22 19:43:23'),
(159, 39, '2024-11-22 21:08:02', '2024-11-22 21:29:06'),
(160, 40, '2024-11-22 21:30:33', '2024-11-22 21:32:29'),
(161, 41, '2024-11-22 21:32:33', '2024-11-22 21:33:10'),
(162, 39, '2024-11-22 21:33:15', '2024-11-22 21:38:14'),
(163, 40, '2024-11-22 21:43:30', '2024-11-22 22:06:13'),
(164, 40, '2024-11-22 22:06:22', '2024-11-22 22:06:47'),
(165, 41, '2024-11-22 22:06:54', '2024-11-22 22:07:47'),
(166, 39, '2024-11-22 22:07:56', '2024-11-22 22:08:41'),
(167, 40, '2024-11-22 22:09:01', '2024-11-22 22:09:38'),
(168, 41, '2024-11-22 22:09:48', '2024-11-22 22:10:10'),
(169, 39, '2024-11-22 22:10:19', '2024-11-22 22:10:28'),
(170, 40, '2024-11-25 13:16:57', '2024-11-25 13:26:07'),
(171, 41, '2024-11-25 13:26:11', '2024-11-25 13:27:38'),
(172, 40, '2024-11-25 13:27:41', '2024-11-25 13:27:58'),
(173, 39, '2024-11-25 13:28:02', '2024-11-25 13:29:17'),
(174, 40, '2024-11-25 13:59:40', '2024-11-25 14:02:44'),
(175, 41, '2024-11-25 14:02:49', '2024-11-25 14:03:07'),
(176, 39, '2024-11-25 14:03:10', '2024-11-25 14:49:35'),
(177, 40, '2024-11-25 14:49:38', '2024-11-25 14:49:59'),
(178, 41, '2024-11-25 14:50:03', '2024-11-25 14:50:26'),
(179, 39, '2024-11-25 14:50:30', '2024-11-25 14:58:05'),
(180, 40, '2024-11-25 14:58:12', '2024-11-25 14:59:10'),
(181, 41, '2024-11-25 14:59:15', '2024-11-25 14:59:45'),
(182, 41, '2024-11-25 15:00:11', '2024-11-25 15:01:55'),
(183, 41, '2024-11-25 15:02:19', '2024-11-25 15:05:15'),
(184, 40, '2024-11-25 15:05:19', '2024-11-25 15:05:24'),
(185, 41, '2024-11-25 15:05:27', '2024-11-25 15:05:34'),
(186, 40, '2024-11-25 15:05:38', '2024-11-25 15:09:09'),
(187, 41, '2024-11-25 15:09:15', '2024-11-25 15:11:41'),
(188, 39, '2024-11-25 15:11:45', '2024-11-25 15:31:04'),
(189, 39, '2024-11-25 17:32:08', '2024-11-25 17:34:09'),
(190, 40, '2024-11-25 17:34:14', '2024-11-25 17:36:22'),
(191, 41, '2024-11-25 17:36:26', NULL),
(192, 40, '2024-11-25 18:21:42', '2024-11-25 18:25:23'),
(193, 41, '2024-11-25 18:25:26', NULL),
(194, 40, '2024-11-25 19:44:12', NULL),
(195, 40, '2024-11-25 20:05:26', '2024-11-25 20:06:51'),
(196, 40, '2024-11-25 20:06:56', '2024-11-25 20:07:58'),
(197, 41, '2024-11-25 20:08:02', '2024-11-25 20:08:10'),
(198, 39, '2024-11-25 20:08:12', '2024-11-25 20:11:39'),
(199, 40, '2024-11-25 20:11:42', '2024-11-25 20:12:54'),
(200, 41, '2024-11-25 20:12:57', '2024-11-25 20:13:39'),
(201, 40, '2024-11-26 06:49:16', NULL),
(202, 40, '2025-02-26 15:14:59', '2025-02-26 15:15:56'),
(203, 40, '2025-02-27 11:09:09', '2025-02-27 11:15:49'),
(204, 39, '2025-02-27 11:15:54', '2025-02-27 11:17:11'),
(205, 40, '2025-02-27 11:17:19', '2025-02-27 11:17:58'),
(206, 39, '2025-02-27 11:18:01', '2025-02-27 11:19:16'),
(207, 40, '2025-02-27 11:19:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_transaksi`
--

CREATE TABLE `td_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `td_transaksi`
--

INSERT INTO `td_transaksi` (`id`, `id_transaksi`, `id_menu`, `jumlah`, `harga`, `subtotal`) VALUES
(112, 'TRX001', 42, 1, 15000, 15000),
(113, 'TRX001', 46, 1, 25000, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `th_transaksi`
--

CREATE TABLE `th_transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `jenis_pesanan` enum('Dine In','Take Away','','') NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `th_transaksi`
--

INSERT INTO `th_transaksi` (`id_transaksi`, `id_meja`, `id_user`, `total_bayar`, `jumlah_bayar`, `jenis_pesanan`, `tgl_transaksi`) VALUES
('TRX001', 20, 40, 40000, 50000, 'Take Away', '2025-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `tkategori`
--

CREATE TABLE `tkategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tkategori`
--

INSERT INTO `tkategori` (`id`, `kode_kategori`, `nama_kategori`) VALUES
(24, 'KTG001', 'Makanan'),
(25, 'KTG002', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tkeranjang`
--

CREATE TABLE `tkeranjang` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `kode_menu` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tkeranjang`
--

INSERT INTO `tkeranjang` (`id`, `id_transaksi`, `kode_menu`, `qty`, `total`) VALUES
(101, 'TRX005', 'MNU002', 2, 10000),
(126, 'TRX002', 'MNU001', 1, 15000),
(127, 'TRX002', 'MNU003', 1, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `hak` enum('Super Admin','Manajer','Kasir','') NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `username`, `password`, `nama_user`, `hak`, `telepon`, `alamat`) VALUES
(38, 'super admin', '21232f297a57a5a743894a0e4a801fc3', 'Super Admin', 'Super Admin', '088229374948', 'Bandung'),
(39, 'executive', '3250d1e21c4281d3cd9479f5685770b6', 'executive', 'Manajer', '01212131232123', 'Jakarta'),
(40, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir', 'Kasir', '08889128121231', 'Cimahi'),
(41, 'kasir1', '29c748d4d8f4bd5cbc0f3f60cb7ed3d0', 'Kasir1', 'Kasir', '012121312322', 'Cimindi'),
(43, 'kontol', '793d7f9f0fa0885759677d2b69b4db5f', 'asdasad', 'Super Admin', '013212312', 'asdasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `t_meja`
--

CREATE TABLE `t_meja` (
  `id_meja` int(11) NOT NULL,
  `nomor_meja` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_meja`
--

INSERT INTO `t_meja` (`id_meja`, `nomor_meja`, `keterangan`, `status`) VALUES
(20, 'MJA001', 'Take Away', 'Tersedia'),
(21, 'MJA002', '5', 'Tersedia'),
(22, 'MJA003', '10', 'Tersedia'),
(23, 'MJA004', '15', 'Tersedia'),
(24, 'MJA005', '30', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `id_menu` int(11) NOT NULL,
  `kode_menu` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`id_menu`, `kode_menu`, `gambar`, `nama_menu`, `id_kategori`, `deskripsi`, `stock`, `harga`) VALUES
(42, 'MNU001', '2118870695_lemon tea.jpg', 'Lemon Tea Ice', 25, 'Segar', 15, 15000),
(45, 'MNU002', '1504309718_americano ice.jpg', 'Ice Americano', 25, 'Halal', 30, 27000),
(46, 'MNU003', '600351211_nasi goreng.jpg', 'Nasi Goreng', 24, 'Bikin Kenyang', 15, 25000),
(47, 'MNU004', '249737716_burger.jpg', 'Chicken Burger', 24, 'Halal', 30, 30000),
(48, 'MNU005', '563843739_kentang.jpg', 'French Fries', 24, 'Cemilan', 50, 15000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_aktifitas`
--
ALTER TABLE `log_aktifitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_log_aktifitas_user` (`id_user`);

--
-- Indexes for table `td_transaksi`
--
ALTER TABLE `td_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_td_transaksi_header` (`id_transaksi`),
  ADD KEY `fk_td_transaksi_menu` (`id_menu`);

--
-- Indexes for table `th_transaksi`
--
ALTER TABLE `th_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_th_transaksi_meja` (`id_meja`),
  ADD KEY `fk_th_transaksi_user` (`id_user`);

--
-- Indexes for table `tkategori`
--
ALTER TABLE `tkategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tkeranjang`
--
ALTER TABLE `tkeranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_meja`
--
ALTER TABLE `t_meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_aktifitas`
--
ALTER TABLE `log_aktifitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `td_transaksi`
--
ALTER TABLE `td_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tkategori`
--
ALTER TABLE `tkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tkeranjang`
--
ALTER TABLE `tkeranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `t_meja`
--
ALTER TABLE `t_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_aktifitas`
--
ALTER TABLE `log_aktifitas`
  ADD CONSTRAINT `fk_log_aktifitas_user` FOREIGN KEY (`id_user`) REFERENCES `tuser` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `td_transaksi`
--
ALTER TABLE `td_transaksi`
  ADD CONSTRAINT `fk_td_transaksi_header` FOREIGN KEY (`id_transaksi`) REFERENCES `th_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_td_transaksi_menu` FOREIGN KEY (`id_menu`) REFERENCES `t_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `th_transaksi`
--
ALTER TABLE `th_transaksi`
  ADD CONSTRAINT `fk_th_transaksi_meja` FOREIGN KEY (`id_meja`) REFERENCES `t_meja` (`id_meja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_th_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `tuser` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD CONSTRAINT `t_menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tkategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
