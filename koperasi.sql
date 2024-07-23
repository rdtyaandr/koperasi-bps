-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2024 at 02:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `profile_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama_lengkap`, `username`, `password`, `created_at`, `updated_at`, `role_id`, `is_active`, `profile_picture`) VALUES
(17, 'user.demo', 'user', '$2y$10$579qICEH5qW6y3mbdIBICOz0.nHT/znAwSm.eEHnHPWCpb4cLiEum', '2024-07-22 09:42:30', '2024-07-22 09:42:30', 2, 1, 'uploads/profile_pictures/user.jpg'),
(18, 'admin.demo', 'admin', '$2y$10$l3UOc1a/VoApI7h79gZApeGheeTUps8gDK2g3tShM2eQpV2v2s7M2', '2024-07-22 09:43:51', '2024-07-22 09:43:51', 1, 1, 'uploads/profile_pictures/user.jpg'),
(19, 'a', 'a', '$2y$10$rqbHuPzY4E/2Dx2Q/krrn.XXxnHeUSIuOs7FNfI6YsjAN6fA1YktO', '2024-07-22 09:44:38', '2024-07-22 09:44:38', 1, 1, 'uploads/profile_pictures/user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `detail_barang` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `detail_barang`, `satuan`, `kategori`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'BR001', 'BUSSINESS FILE 12', 'Merek A', 'PCS', 'ATK', 4800, 5760, -2, '2020-12-01 07:29:54', '0000-00-00 00:00:00'),
(2, 'BR002', 'LAKBAN HITAM', 'Merk A', 'PCS', 'ATK', 19200, 23040, 6, '2020-12-01 07:31:03', '0000-00-00 00:00:00'),
(3, 'BR003', 'TINTA EPRINT CAIR ', 'Merk A', 'PCS', 'ATK', 42000, 50400, 0, '2020-12-01 07:31:34', '0000-00-00 00:00:00'),
(4, 'BR004', 'KERTAS F4', 'Merk A', 'RIM', 'ATK', 50000, 60000, -19, '2020-12-01 07:32:13', '0000-00-00 00:00:00'),
(5, 'BR005', 'PULPEN AE7', 'Merk A', 'PCS', 'ATK', 1800, 2160, 0, '2020-12-01 07:34:08', '0000-00-00 00:00:00'),
(6, 'BR006', 'LEM STIK 24', 'Merk A', 'PCS', 'ATK', 4800, 5760, -10, '2020-12-01 07:34:58', '0000-00-00 00:00:00'),
(7, 'BR007', 'KALKULATOR CITIZEN', 'Merk A', 'PCS', 'ATK', 162000, 194400, 0, '2020-12-01 07:36:12', '0000-00-00 00:00:00'),
(8, 'BR008', 'KERTAS 1 PLY', 'Merk A', 'DUS', 'ATK', 295000, 354000, 0, '2020-12-01 07:36:43', '0000-00-00 00:00:00'),
(9, 'BR009', 'ODNERD GEMA', 'Merk A', 'PCS', 'ATK', 24000, 28800, 0, '2020-12-01 07:38:09', '0000-00-00 00:00:00'),
(10, 'BR0010', 'AMPLOP PUTIH KECIL', 'Merk A', 'PCS', 'ATK', 19200, 23040, 0, '2020-12-01 07:39:47', '0000-00-00 00:00:00'),
(11, 'BR0011', 'KWITANSI TELLER', 'Merk B', 'PCS', 'PRC', 11400, 13680, 0, '2020-12-01 07:41:23', '0000-00-00 00:00:00'),
(12, 'BR0012', 'AMPLOP UANG SEDANG', 'Merk B', 'PCS', 'PRC', 1500, 1800, 0, '2020-12-01 07:44:16', '0000-00-00 00:00:00'),
(13, 'BR0013', 'BUKTI KAS 50', 'Merk B', 'PCS', 'PRC', 3600, 4320, 0, '2020-12-01 07:45:10', '2020-12-02 05:42:33'),
(15, 'BR0014', 'Pita Epson 2180', 'Merk A', 'PCS', 'SUP', 100000, 120000, -8, '2020-12-02 13:23:09', '0000-00-00 00:00:00'),
(16, 'BR0015', 'Tisu Basah', 'Merk Mitu', 'PCS', 'AKB', 20000, 24000, 67, '2020-12-02 13:23:36', '0000-00-00 00:00:00'),
(18, 'BR0017', 'Bumbu Penyedap', 'Merek Masako', 'PCS', 'ATK', 2500, 3000, -770, '2024-07-09 15:34:10', '2024-07-12 01:02:52'),
(19, 'BR0018', 'Minuman Bersoda', 'Merek Coca Cola', 'PCS', 'SUP', 5000, 6000, 5, '2024-07-12 15:36:05', '0000-00-00 00:00:00'),
(20, 'KJ817', 'Kopi', 'Merek Abc', 'PCS', 'SUP', 2500, 3000, 30, '2024-07-15 08:40:39', '0000-00-00 00:00:00'),
(21, 'br0019', 'Mie Instan', 'Indomie', 'DUS', 'PRC', 32000, 38400, 10, '2024-07-15 11:41:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailtransaksi`
--

CREATE TABLE `tb_detailtransaksi` (
  `id_detailtransaksi` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah_beli` int NOT NULL,
  `total` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detailtransaksi`
--

INSERT INTO `tb_detailtransaksi` (`id_detailtransaksi`, `id_transaksi`, `id_barang`, `jumlah_beli`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 23040, '2020-12-01 07:59:46', '0000-00-00 00:00:00'),
(2, 1, 2, 5, 115200, '2020-12-01 07:59:48', '0000-00-00 00:00:00'),
(3, 2, 1, 4, 23040, '2020-12-01 07:59:48', '0000-00-00 00:00:00'),
(4, 2, 2, 5, 115200, '2020-12-01 07:59:48', '0000-00-00 00:00:00'),
(5, 3, 2, 4, 92160, '2020-12-01 08:00:54', '0000-00-00 00:00:00'),
(6, 3, 1, 3, 17280, '2020-12-01 08:00:54', '0000-00-00 00:00:00'),
(7, 4, 1, 10, 57600, '2020-12-02 12:04:08', '0000-00-00 00:00:00'),
(8, 4, 2, 15, 345600, '2020-12-02 12:04:09', '0000-00-00 00:00:00'),
(9, 5, 1, 10, 57600, '2020-12-02 13:17:36', '0000-00-00 00:00:00'),
(10, 5, 2, 9, 207360, '2020-12-02 13:17:38', '0000-00-00 00:00:00'),
(11, 6, 1, 3, 17280, '2020-12-02 13:26:29', '0000-00-00 00:00:00'),
(12, 6, 16, 7, 168000, '2020-12-02 13:26:29', '0000-00-00 00:00:00'),
(13, 6, 15, 8, 960000, '2020-12-02 13:26:29', '0000-00-00 00:00:00'),
(14, 7, 6, 5, 28800, '2020-12-02 14:57:32', '0000-00-00 00:00:00'),
(15, 7, 4, 7, 420000, '2020-12-02 14:57:32', '0000-00-00 00:00:00'),
(16, 7, 16, 6, 144000, '2020-12-02 14:57:32', '0000-00-00 00:00:00'),
(17, 7, 1, 6, 34560, '2020-12-02 14:57:32', '0000-00-00 00:00:00'),
(18, 8, 1, 3, 17280, '2021-03-14 19:49:45', '0000-00-00 00:00:00'),
(19, 8, 16, 4, 96000, '2021-03-14 19:49:45', '0000-00-00 00:00:00'),
(20, 8, 6, 2, 11520, '2021-03-14 19:49:45', '0000-00-00 00:00:00'),
(21, 9, 1, 2, 11520, '2021-04-30 05:35:43', '0000-00-00 00:00:00'),
(22, 9, 16, 3, 72000, '2021-04-30 05:35:45', '0000-00-00 00:00:00'),
(23, 9, 4, 6, 360000, '2021-04-30 05:35:46', '0000-00-00 00:00:00'),
(24, 10, 2, 3, 69120, '2021-04-30 05:37:11', '0000-00-00 00:00:00'),
(25, 10, 6, 1, 5760, '2021-04-30 05:37:11', '0000-00-00 00:00:00'),
(26, 10, 1, 2, 11520, '2021-04-30 05:37:11', '0000-00-00 00:00:00'),
(27, 11, 1, 3, 17280, '2021-05-04 18:43:55', '0000-00-00 00:00:00'),
(28, 11, 6, 2, 11520, '2021-05-04 18:43:55', '0000-00-00 00:00:00'),
(29, 11, 16, 3, 72000, '2021-05-04 18:43:55', '0000-00-00 00:00:00'),
(30, 11, 4, 3, 180000, '2021-05-04 18:43:55', '0000-00-00 00:00:00'),
(31, 12, 2, 1, 0, '2024-07-05 11:23:14', '0000-00-00 00:00:00'),
(32, 13, 2, 2, 5000, '2024-07-05 11:25:04', '0000-00-00 00:00:00'),
(33, 14, 4, 3, 3, '2024-07-05 15:27:04', '0000-00-00 00:00:00'),
(34, 15, 1, 32, 64000, '2024-07-09 08:25:57', '0000-00-00 00:00:00'),
(36, 17, 1, 20, 560000, '2024-07-12 15:03:47', '0000-00-00 00:00:00'),
(37, 18, 4, 100, 500000, '2024-07-12 15:20:56', '0000-00-00 00:00:00'),
(38, 19, 4, 10, 20000, '2024-07-15 09:58:14', '0000-00-00 00:00:00'),
(39, 20, 4, 20, 30000, '2024-07-15 09:58:55', '0000-00-00 00:00:00'),
(40, 21, 20, 10, 30000, '2024-07-17 10:09:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventori`
--

CREATE TABLE `tb_inventori` (
  `id_inventori` int NOT NULL,
  `id_barang` int NOT NULL,
  `qty` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_inventori`
--

INSERT INTO `tb_inventori` (`id_inventori`, `id_barang`, `qty`, `created_at`, `updated_at`) VALUES
(1, 2, 50, '2020-12-01 07:45:50', '0000-00-00 00:00:00'),
(2, 1, 100, '2020-12-01 07:52:12', '0000-00-00 00:00:00'),
(3, 4, 130, '2020-12-02 05:52:16', '2020-12-02 06:45:51'),
(6, 16, 90, '2020-12-02 13:25:17', '2024-07-09 03:49:54'),
(9, 18, 20, '2024-07-05 16:11:48', '2024-07-12 01:03:06'),
(11, 0, 21, '2024-07-09 09:37:28', '0000-00-00 00:00:00'),
(12, 0, 100, '2024-07-09 15:17:18', '0000-00-00 00:00:00'),
(13, 0, 10, '2024-07-09 15:25:09', '0000-00-00 00:00:00'),
(14, 0, 20, '2024-07-09 15:34:55', '0000-00-00 00:00:00'),
(15, 0, 20, '2024-07-12 09:57:06', '0000-00-00 00:00:00'),
(16, 0, 10, '2024-07-12 10:40:27', '0000-00-00 00:00:00'),
(17, 0, 20, '2024-07-12 15:37:12', '0000-00-00 00:00:00'),
(18, 19, 20, '2024-07-12 15:40:29', '2024-07-15 07:54:27'),
(19, 20, 20, '2024-07-15 08:41:16', '0000-00-00 00:00:00'),
(20, 0, 20, '2024-07-15 09:53:07', '0000-00-00 00:00:00'),
(21, 0, 10, '2024-07-15 09:54:28', '0000-00-00 00:00:00'),
(22, 0, 10, '2024-07-15 10:10:18', '0000-00-00 00:00:00'),
(23, 0, 10, '2024-07-15 10:40:53', '0000-00-00 00:00:00'),
(24, 0, 10, '2024-07-15 10:55:37', '0000-00-00 00:00:00'),
(25, 0, 10, '2024-07-15 11:12:39', '0000-00-00 00:00:00'),
(26, 0, 10, '2024-07-15 11:44:11', '0000-00-00 00:00:00'),
(27, 0, 10, '2024-07-15 13:06:52', '0000-00-00 00:00:00'),
(28, 0, 10, '2024-07-15 13:48:00', '0000-00-00 00:00:00'),
(29, 0, 10, '2024-07-15 14:32:55', '0000-00-00 00:00:00'),
(30, 0, 10, '2024-07-15 14:38:06', '0000-00-00 00:00:00'),
(31, 0, 10, '2024-07-15 14:44:22', '0000-00-00 00:00:00'),
(32, 18, 10, '2024-07-15 14:46:31', '0000-00-00 00:00:00'),
(34, 19, 5, '2024-07-15 15:08:15', '0000-00-00 00:00:00'),
(35, 20, 10, '2024-07-15 15:48:53', '0000-00-00 00:00:00'),
(36, 20, 30, '2024-07-16 14:24:44', '2024-07-16 02:25:12'),
(37, 21, 10, '2024-07-16 14:32:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `id_unit` int NOT NULL,
  `cara_bayar` int NOT NULL,
  `status_bayar` int NOT NULL,
  `status_pengambilan` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_unit`, `cara_bayar`, `status_bayar`, `status_pengambilan`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 1, '2020-12-01 07:59:48', '0000-00-00 00:00:00'),
(2, 1, 0, 0, 0, '2020-12-01 07:59:48', '0000-00-00 00:00:00'),
(3, 4, 0, 0, 1, '2020-12-01 08:00:54', '0000-00-00 00:00:00'),
(4, 17, 0, 1, 1, '2020-12-02 12:04:09', '0000-00-00 00:00:00'),
(5, 17, 1, 1, 1, '2020-12-02 13:17:38', '0000-00-00 00:00:00'),
(6, 1, 1, 1, 1, '2020-12-02 13:26:29', '0000-00-00 00:00:00'),
(7, 22, 1, 1, 1, '2020-12-02 14:57:33', '0000-00-00 00:00:00'),
(8, 15, 1, 1, 1, '2021-03-14 19:49:45', '0000-00-00 00:00:00'),
(9, 21, 1, 1, 1, '2021-04-30 05:35:46', '0000-00-00 00:00:00'),
(10, 16, 1, 1, 1, '2021-04-30 05:37:12', '0000-00-00 00:00:00'),
(11, 14, 1, 1, 1, '2021-05-04 18:43:55', '0000-00-00 00:00:00'),
(12, 22, 1, 1, 1, '2024-07-05 11:23:14', '0000-00-00 00:00:00'),
(13, 20, 1, 0, 0, '2024-07-05 11:25:04', '0000-00-00 00:00:00'),
(14, 22, 1, 1, 1, '2024-07-05 15:27:04', '0000-00-00 00:00:00'),
(15, 21, 0, 1, 0, '2024-07-09 08:25:57', '0000-00-00 00:00:00'),
(17, 22, 1, 0, 0, '2024-07-12 15:03:47', '0000-00-00 00:00:00'),
(18, 24, 1, 0, 1, '2024-07-12 15:20:56', '0000-00-00 00:00:00'),
(19, 22, 1, 0, 1, '2024-07-15 09:58:14', '0000-00-00 00:00:00'),
(20, 19, 1, 1, 0, '2024-07-15 09:58:55', '0000-00-00 00:00:00'),
(21, 22, 1, 1, 0, '2024-07-17 10:09:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id_unit` int NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `no_telp_pic` varchar(100) NOT NULL,
  `nama_pic` varchar(100) NOT NULL,
  `no_rek` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`, `alamat`, `no_telp`, `no_telp_pic`, `nama_pic`, `no_rek`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CIKAMPEK', 'Karawang', '0123456789', '0123456789', 'Dadang', '11223344', 1, '2020-12-01 07:47:39', '2020-12-02 07:50:48'),
(2, 'Cilamaya', 'Karawang', '0123456789', '0123456789', 'Heru', '11223344', 1, '2020-12-01 07:48:27', '0000-00-00 00:00:00'),
(3, 'Pasirukem', 'Karawang', '0123456789', '0123456789', 'Deni', '11223344', 1, '2020-12-01 07:48:51', '0000-00-00 00:00:00'),
(4, 'TEGALWARU', 'Karawang', '0123456789', '0123456789', 'Susi', '11223344', 1, '2020-12-01 07:49:13', '2020-12-02 12:04:32'),
(5, 'Talagasari', 'Karawang', '0123456789', '0123456789', 'Neni', '11223344', 1, '2020-12-01 07:49:43', '0000-00-00 00:00:00'),
(6, 'La Wadas', 'Karawang', '0123456789', '0123456789', 'Kokom', '11223344', 1, '2020-12-01 07:50:09', '0000-00-00 00:00:00'),
(7, 'Jatisari', 'Karawang', '0123456789', '0123456789', 'Rudi', '11223344', 1, '2020-12-01 07:50:36', '0000-00-00 00:00:00'),
(8, 'Gempol', 'Karawang', '0123456789', '0123456789', 'Ratna', '11223344', 1, '2020-12-01 07:51:06', '0000-00-00 00:00:00'),
(9, 'Mekarmaya', 'Karawang', '0123456789', '0123456789', 'Joko', '11223344', 1, '2020-12-01 07:51:30', '0000-00-00 00:00:00'),
(10, 'PANGULAH', 'Karawang', '08123456789', '08123456789', 'Roni', '11223344', 1, '2020-12-02 07:26:09', '0000-00-00 00:00:00'),
(11, 'STASIUN KOTA', 'Karawang', '08234567890', '08234567890', 'Robi', '11223344', 1, '2020-12-02 07:26:56', '0000-00-00 00:00:00'),
(12, 'DUREN', 'Karawang', '08123456789', '08123456789', 'Kamil', '11223344', 1, '2020-12-02 07:27:35', '0000-00-00 00:00:00'),
(13, 'CURUG', 'Karawang', '08123456789', '08123456789', 'Danang', '11223344', 1, '2020-12-02 07:28:15', '0000-00-00 00:00:00'),
(14, 'BELENDUNG', 'Karawang', '08123456789', '08123456789', 'Roy', '11223344', 1, '2020-12-02 07:29:08', '0000-00-00 00:00:00'),
(15, 'PURWASARI', 'Karawang', '08123456789', '08123456789', 'Bobi', '11223344', 1, '2020-12-02 07:29:54', '0000-00-00 00:00:00'),
(16, 'JUANDA', 'Karawang', '08123456789', '08123456789', 'Danang', '11223344', 1, '2020-12-02 07:30:27', '0000-00-00 00:00:00'),
(17, 'CIKALONGSARI', 'Karawang', '08123456789', '08123456789', 'Kiki', '11223344', 1, '2020-12-02 07:31:02', '0000-00-00 00:00:00'),
(18, 'PARAKAN', 'Karawang', '08123456789', '08123456789', 'Mega', '11223344', 1, '2020-12-02 07:31:31', '0000-00-00 00:00:00'),
(19, 'KIARA', 'Karawang', '08123456789', '08123456789', 'Sari', '11223344', 1, '2020-12-02 07:32:02', '0000-00-00 00:00:00'),
(21, 'JALAN BARU', 'Karawang', '08123456789', '08123456789', 'Jajang', '11223344', 1, '2020-12-02 07:33:53', '0000-00-00 00:00:00'),
(22, 'KOSAMBI', 'Karawang', '08123456789', '08123456789', 'Junaedi', '11223344', 1, '2020-12-02 07:35:55', '0000-00-00 00:00:00'),
(24, 'Wasabi', 'jfsdjdsjoisjf', '198391', '983498', 'fdsif oiaj', '289489', 1, '2024-07-12 09:44:26', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD PRIMARY KEY (`id_detailtransaksi`);

--
-- Indexes for table `tb_inventori`
--
ALTER TABLE `tb_inventori`
  ADD PRIMARY KEY (`id_inventori`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  MODIFY `id_detailtransaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_inventori`
--
ALTER TABLE `tb_inventori`
  MODIFY `id_inventori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id_unit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
