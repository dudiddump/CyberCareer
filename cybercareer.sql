-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 05:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybercareer`
--

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` varchar(20) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` text NOT NULL,
  `bukti_foto` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Disetujui','Perlu Revisi') NOT NULL DEFAULT 'Pending',
  `feedback_dosen` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `mahasiswa_id`, `perusahaan_id`, `tanggal`, `kegiatan`, `bukti_foto`, `status`, `feedback_dosen`, `created_at`) VALUES
(1, '11220002', 13, '2025-12-15', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(2, '11220004', 6, '2025-12-13', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(3, '11220006', 2, '2025-12-10', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(4, '11220008', 13, '2025-12-12', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(5, '11220010', 1, '2025-12-01', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(6, '11220012', 2, '2025-12-10', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(7, '11220014', 15, '2025-12-12', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(8, '11220016', 3, '2025-12-06', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(9, '11220018', 1, '2025-12-04', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(10, '11220020', 15, '2025-12-01', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(11, '12220004', 13, '2025-12-03', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(12, '12220008', 7, '2025-12-11', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(13, '12220010', 6, '2025-12-04', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(14, '12220012', 3, '2025-12-09', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(15, '12220014', 3, '2025-12-14', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(16, '12220020', 15, '2025-12-12', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(17, '12220024', 14, '2025-12-15', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(18, '13220004', 13, '2025-12-15', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(19, '13220006', 14, '2025-12-09', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(20, '13220008', 1, '2025-12-12', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(21, '13220010', 6, '2025-12-07', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(22, '13220014', 7, '2025-12-05', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(23, '11220001', 14, '2025-12-12', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(24, '11220003', 13, '2025-12-04', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(25, '11220005', 2, '2025-12-07', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(26, '11220007', 10, '2025-12-09', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(27, '11220011', 13, '2025-12-10', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(28, '11220013', 14, '2025-12-15', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(29, '11220015', 13, '2025-12-05', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(30, '11220019', 14, '2025-12-04', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(31, '12220001', 2, '2025-12-12', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(32, '12220003', 1, '2025-12-11', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(33, '12220009', 10, '2025-12-14', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(34, '12220011', 14, '2025-12-08', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(35, '12220013', 1, '2025-12-02', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(36, '12220015', 13, '2025-12-04', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(37, '12220021', 14, '2025-12-07', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(38, '12220023', 1, '2025-12-07', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(39, '12220025', 2, '2025-12-05', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(40, '13220001', 1, '2025-12-06', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(41, '13220003', 2, '2025-12-04', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(42, '13220005', 14, '2025-12-15', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(43, '13220009', 1, '2025-12-13', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(44, '13220011', 1, '2025-12-05', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(45, '202108001', 1, '2025-12-11', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(46, '202108024', 1, '2025-12-10', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(47, '202108028', 11, '2025-12-02', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(48, '202108029', 15, '2025-12-10', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(49, '202409017', 1, '2025-12-10', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(50, '21220001', 15, '2025-12-02', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(51, '21220002', 1, '2025-12-08', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(52, '21220003', 1, '2025-12-14', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(53, '21220004', 15, '2025-12-15', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(54, '21220005', 6, '2025-12-02', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(55, '21220006', 8, '2025-12-07', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(56, '21220007', 15, '2025-12-15', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(57, '21220008', 11, '2025-12-02', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(58, '21220011', 11, '2025-12-09', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(59, '21220012', 6, '2025-12-02', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(60, '21220013', 6, '2025-12-13', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(61, '21220014', 15, '2025-12-08', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(62, '21220015', 8, '2025-12-04', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(63, '21220016', 1, '2025-12-10', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(64, '21220017', 15, '2025-12-01', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(65, '21220018', 6, '2025-12-02', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(66, '21220019', 8, '2025-12-12', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(67, '21220020', 8, '2025-12-04', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(68, '21220021', 6, '2025-12-10', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(69, '21220022', 1, '2025-12-09', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(70, '21240001', 1, '2025-12-03', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(71, '21240002', 15, '2025-12-08', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(72, '21240003', 11, '2025-12-09', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(73, '21240004', 15, '2025-12-02', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(74, '21240005', 6, '2025-12-02', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(75, '21240006', 8, '2025-12-06', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(76, '21240007', 6, '2025-12-01', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(77, '21240008', 6, '2025-12-05', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(78, '21240009', 15, '2025-12-11', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(79, '21240010', 8, '2025-12-11', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(80, '21240011', 15, '2025-12-01', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(81, '21240012', 11, '2025-12-09', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(82, '21240013', 6, '2025-12-01', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(83, '21240014', 15, '2025-12-12', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(84, '21240015', 15, '2025-12-14', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(85, '21240016', 15, '2025-12-13', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(86, '21250001', 6, '2025-12-01', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(87, '21250002', 1, '2025-12-10', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(88, '21250003', 6, '2025-12-09', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(89, '21250004', 8, '2025-12-05', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(90, '21250005', 8, '2025-12-07', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(91, '21250006', 1, '2025-12-10', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(92, '21250007', 6, '2025-12-01', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(93, '21250008', 1, '2025-12-06', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(94, '21250009', 8, '2025-12-12', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(95, '21250010', 8, '2025-12-10', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(96, '21250011', 1, '2025-12-09', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(97, '21250012', 1, '2025-12-14', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(98, '21250013', 15, '2025-12-03', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(99, '21250014', 11, '2025-12-13', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(100, '21250015', 6, '2025-12-06', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(101, '21250016', 6, '2025-12-14', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(102, '22220001', 1, '2025-12-02', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(103, '22220005', 11, '2025-12-12', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(104, '22220006', 8, '2025-12-01', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(105, '22220009', 1, '2025-12-03', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(106, '22220010', 6, '2025-12-10', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(107, '22220011', 8, '2025-12-09', 'Melakukan testing fitur baru pada aplikasi staging.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(108, '22220012', 15, '2025-12-03', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(109, '22220013', 11, '2025-12-14', 'Koordinasi dengan tim desain untuk revisi UI/UX.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(110, '22220015', 8, '2025-12-08', 'Membantu menyusun laporan analisis data user.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(111, '22220016', 11, '2025-12-09', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(112, '22220017', 1, '2025-12-02', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(113, '22220019', 1, '2025-12-12', 'Melakukan daily meeting dan update progress mingguan.', 'bukti_kegiatan.jpg', 'Pending', NULL, '2025-12-16 16:22:59'),
(114, '22220021', 1, '2025-12-11', 'Membuat konten sosial media untuk promosi produk.', 'bukti_kegiatan.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(128, '11220002', 13, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(129, '11220004', 6, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(130, '11220006', 2, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(131, '11220008', 13, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(132, '11220010', 1, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(133, '11220012', 2, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(134, '11220014', 15, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(135, '11220016', 3, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(136, '11220018', 1, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(137, '11220020', 15, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(138, '12220004', 13, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(139, '12220008', 7, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(140, '12220010', 6, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(141, '12220012', 3, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(142, '12220014', 3, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(143, '12220020', 15, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(144, '12220024', 14, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(145, '13220004', 13, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(146, '13220006', 14, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(147, '13220008', 1, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(148, '13220010', 6, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(149, '13220014', 7, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(150, '11220001', 14, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(151, '11220003', 13, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(152, '11220005', 2, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(153, '11220007', 10, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(154, '11220011', 13, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(155, '11220013', 14, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(156, '11220015', 13, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(157, '11220019', 14, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(158, '12220001', 2, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(159, '12220003', 1, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(160, '12220009', 10, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(161, '12220011', 14, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(162, '12220013', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(163, '12220015', 13, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(164, '12220021', 14, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(165, '12220023', 1, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(166, '12220025', 2, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(167, '13220001', 1, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(168, '13220003', 2, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(169, '13220005', 14, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(170, '13220009', 1, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(171, '13220011', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(172, '202108001', 1, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(173, '202108024', 1, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(174, '202108028', 11, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(175, '202108029', 15, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(176, '202409017', 1, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(177, '21220001', 15, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(178, '21220002', 1, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(179, '21220003', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(180, '21220004', 15, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(181, '21220005', 6, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(182, '21220006', 8, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(183, '21220007', 15, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(184, '21220008', 11, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(185, '21220011', 11, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(186, '21220012', 6, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(187, '21220013', 6, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(188, '21220014', 15, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(189, '21220015', 8, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(190, '21220016', 1, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(191, '21220017', 15, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(192, '21220018', 6, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(193, '21220019', 8, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(194, '21220020', 8, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(195, '21220021', 6, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(196, '21220022', 1, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(197, '21240001', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(198, '21240002', 15, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(199, '21240003', 11, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(200, '21240004', 15, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(201, '21240005', 6, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(202, '21240006', 8, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(203, '21240007', 6, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(204, '21240008', 6, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(205, '21240009', 15, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(206, '21240010', 8, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(207, '21240011', 15, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(208, '21240012', 11, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(209, '21240013', 6, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(210, '21240014', 15, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(211, '21240015', 15, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(212, '21240016', 15, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(213, '21250001', 6, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(214, '21250002', 1, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(215, '21250003', 6, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(216, '21250004', 8, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(217, '21250005', 8, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(218, '21250006', 1, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(219, '21250007', 6, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(220, '21250008', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(221, '21250009', 8, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(222, '21250010', 8, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(223, '21250011', 1, '2025-12-14', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(224, '21250012', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(225, '21250013', 15, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(226, '21250014', 11, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(227, '21250015', 6, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(228, '21250016', 6, '2025-12-12', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(229, '22220001', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(230, '22220005', 11, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(231, '22220006', 8, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(232, '22220009', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(233, '22220010', 6, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(234, '22220011', 8, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(235, '22220012', 15, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(236, '22220013', 11, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(237, '22220015', 8, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(238, '22220016', 11, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(239, '22220017', 1, '2025-12-16', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(240, '22220019', 1, '2025-12-15', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59'),
(241, '22220021', 1, '2025-12-13', 'Melakukan rekap data dan dokumentasi kegiatan.', 'dokumentasi.jpg', 'Disetujui', NULL, '2025-12-16 16:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(11) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `tipe` enum('Magang','Full Time','Part Time') NOT NULL DEFAULT 'Magang',
  `deskripsi` text NOT NULL,
  `kualifikasi` text NOT NULL,
  `kuota` int(11) NOT NULL DEFAULT 1,
  `tgl_posting` date NOT NULL DEFAULT current_timestamp(),
  `tenggat_pengajuan` date DEFAULT NULL,
  `link_pendaftaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id`, `perusahaan_id`, `posisi`, `tipe`, `deskripsi`, `kualifikasi`, `kuota`, `tgl_posting`, `tenggat_pengajuan`, `link_pendaftaran`) VALUES
(55, 1, 'Cyber Security Analyst Intern', 'Magang', 'Menganalisis dan memitigasi risiko keamanan siber perbankan.', 'Menguasai konsep jaringan dan keamanan siber.', 4, '2025-12-16', '2025-02-15', NULL),
(56, 2, 'Cloud Security Intern', 'Magang', 'Fokus pada keamanan arsitektur cloud (Hybrid Cloud) IBM.', 'Memahami konsep keamanan Cloud (AWS/Azure/GCP).', 3, '2025-12-16', '2025-02-15', NULL),
(57, 3, 'IT Audit & Compliance Intern', 'Magang', 'Membantu proses sertifikasi ISO 27001 dan audit IT.', 'Memahami COBIT/ISO 27001.', 3, '2025-12-16', '2025-02-15', NULL),
(58, 4, 'Fintech Security Intern', 'Magang', 'Mengidentifikasi risiko keamanan platform Fintech.', 'Paham regulasi OJK terkait keamanan data.', 2, '2025-12-16', '2025-02-15', NULL),
(59, 6, 'Digital Security & Fraud Analyst Intern', 'Magang', 'Fokus pada keamanan aplikasi Allo Bank dan pencegahan fraud.', 'Memiliki pengalaman dalam pengujian keamanan aplikasi.', 3, '2025-12-16', '2025-02-15', NULL),
(60, 7, 'Threat Intelligence Analyst Intern', 'Magang', 'Membantu analisis ancaman siber nasional (BSSN).', 'Menguasai OSINT dan threat modeling.', 5, '2025-12-16', '2025-02-15', NULL),
(61, 8, 'IT Support & Asset Security Intern', 'Magang', 'Mengamankan aset IT dan membantu operasional F&B.', 'Memahami dasar keamanan jaringan dan endpoint.', 2, '2025-12-16', '2025-02-15', NULL),
(62, 9, 'Digital Forensics & Incident Response Intern', 'Magang', 'Menangani insiden siber dan mengumpulkan bukti digital.', 'Paham konsep forensik digital.', 2, '2025-12-16', '2025-02-15', NULL),
(63, 10, 'Platform Security Analyst Intern', 'Magang', 'Mengamankan platform Traveloka dan API.', 'Menguasai OWASP Top 10 dan AppSec.', 4, '2025-12-16', '2025-02-15', NULL),
(64, 11, 'ERP Security Analyst Intern', 'Magang', 'Mengelola keamanan sistem ERP dan data produksi Nutrifood.', 'Paham konsep otorisasi dan kontrol akses.', 2, '2025-12-16', '2025-02-15', NULL),
(65, 12, 'Web Security Analyst Intern', 'Magang', 'Mengamankan aset web dan konten digital Kompas Gramedia.', 'Menguasai Web Application Firewall (WAF).', 3, '2025-12-16', '2025-02-15', NULL),
(66, 13, 'Network Security Engineer Intern', 'Magang', 'Mengelola dan memonitor keamanan infrastruktur jaringan Telkom.', 'Menguasai Cisco/Juniper dan keamanan jaringan.', 5, '2025-12-16', '2025-02-15', NULL),
(67, 14, 'AppSec & Vulnerability Intern', 'Magang', 'Fokus pada keamanan aplikasi Gojek dan manajemen kerentanan.', 'Berpengalaman dalam SAST/DAST.', 4, '2025-12-16', '2025-02-15', NULL),
(68, 15, 'IT Risk Management Intern', 'Magang', 'Mengidentifikasi dan mengukur risiko teknologi di Bank Mandiri.', 'Memahami kerangka kerja GRC.', 3, '2025-12-16', '2025-02-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `industri` varchar(100) DEFAULT 'Lainnya',
  `deskripsi` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `industri`, `deskripsi`, `alamat`, `telepon`, `email`, `website`, `logo`) VALUES
(1, 'PT Bank Rakyat Indonesia (Persero) Tbk (BRI)', 'Keuangan, BUMN', 'Bank BUMN terbesar.', 'Gedung BRI 1, Jl. Jend. Sudirman Kav. 44-46, Jakarta', '(021) 2510244', 'callbri@bri.co.id', 'e-recruitment.bri.co.id', 'BRI.svg'),
(2, 'IBM Indonesia', 'Teknologi', 'Solusi Hybrid Cloud.', 'The Plaza Office Tower Lt. 16, Jl. M.H. Thamrin Kav. 28-30, Jakarta Pusat 10350', '(021) 29965000', 'vacancies@id.ibm.com', 'ibm.com/careers/id-id', 'IBM.webp'),
(3, 'DQS Indonesia', 'Teknologi & IT', 'Sertifikasi ISO.', 'Jakarta Pusat', '021-53663678', 'info@dqsindonesia.com', 'dqs-indonesia.com/karir', 'DQS.png'),
(4, 'Asosiasi Fintech Indonesia', 'Teknologi, Keuangan', 'Organisasi fintech.', 'Jakarta Selatan', '021-50918000', 'hr@fintech.id', 'fintech.id/careers', 'Fintech_Indonesia.webp'),
(6, 'Allo Bank', 'Teknologi, Keuangan', 'Bank digital.', 'Menara Bank Mega, Jl. Kapten Tendean No. 12-14A, Jakarta Selatan 12790', '(021) 79175000', 'career@allobank.com', 'allobank.com/career', 'Allobank.png'),
(7, 'Badan Siber dan Sandi Negara (BSSN)', 'Pemerintahan, Teknologi', 'Lembaga siber negara.', 'Jl. Harsono RM No. 70, Ragunan, Pasar Minggu, Jakarta Selatan 12550', '(021) 7805814', 'bantuan70@bssn.go.id', 'rekrutmen.bssn.go.id', 'BSSN.png'),
(8, 'The Harvest Cakes', 'Kreatif, Lainnya', 'F&B Premium.', 'Jakarta Selatan', '021-7202370', 'hrd@harvestcakes.com', 'harvestcakes.com/career', 'TheHarvest.jpg'),
(9, 'CNN Indonesia', 'Kreatif', 'Media berita.', 'Jakarta Selatan', '021-79177000', 'redaksi@cnnindonesia.com', 'cnnindonesia.com/karir', 'CNN.png'),
(10, 'Traveloka', 'Teknologi, Lainnya', 'Unicorn travel.', 'Traveloka Campus, BSD Green Office Park, GOP 1, Jl. Grand Boulevard, Tangerang 15345', '(021) 29775800', 'careers@traveloka.com', 'traveloka.com/careers', 'Traveloka.webp'),
(11, 'Nutrifood Indonesia', 'Kesehatan, Lainnya', 'Makanan kesehatan.', 'Jl. Rawa Bali II No.3, Kawasan Industri Pulogadung, Jakarta Timur 13920', '(021) 4605780', 'recruitment@nutrifood.co.id', 'nutrifood.co.id/join', 'Nutrifood.png'),
(12, 'Kompas Gramedia', 'Kreatif', 'Media & Publishing.', 'Gedung Kompas Gramedia, Jl. Palmerah Selatan No. 22-28, Jakarta Pusat 10270', '(021) 5309011', 'recruitment@kompasgramedia.com', 'career.kompasgramedia.com', 'Kompas.png'),
(13, 'Telkom Indonesia', 'Teknologi, BUMN', 'Telco BUMN.', 'Telkom Landmark Tower, Jl. Jend. Gatot Subroto Kav. 52, Jakarta Selatan 12710', '(021) 5215109', 'recruitment@telkom.co.id', 'careers.telkom.co.id', 'Telkom.jpg'),
(14, 'Gojek (GoTo)', 'Teknologi', 'Super-app.', 'Pasaraya Blok M, Gedung B Lt. 6, Jl. Iskandarsyah II No. 2, Melawai, Jakarta Selatan 12160', '(021) 29182988', 'recruitment@gojek.com', 'career.gojek.com', 'Gojek.png'),
(15, 'Bank Mandiri', 'Keuangan, BUMN', 'Bank BUMN.', 'Plaza Mandiri, Jl. Jend. Gatot Subroto Kav. 36-38, Jakarta Selatan 12190', '14000', 'hc.recruitment@bankmandiri.co.id', 'mandiricareer.net', 'Mandiri.png');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_magang`
--

CREATE TABLE `riwayat_magang` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` varchar(20) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `durasi_bulan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL DEFAULT 2024,
  `status` enum('Aktif','Selesai') NOT NULL DEFAULT 'Selesai',
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_magang`
--

INSERT INTO `riwayat_magang` (`id`, `mahasiswa_id`, `perusahaan_id`, `posisi`, `durasi_bulan`, `tahun`, `status`, `tgl_mulai`, `tgl_selesai`) VALUES
(1, '11220002', 13, 'Web Developer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(2, '11220004', 6, 'Network Engineer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(3, '11220006', 2, 'IT Support Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(4, '11220008', 13, 'Web Developer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(5, '11220010', 1, 'Web Developer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(6, '11220012', 2, 'Cyber Security Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(7, '11220014', 15, 'Cyber Security Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(8, '11220016', 3, 'Web Developer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(9, '11220018', 1, 'Cyber Security Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(10, '11220020', 15, 'Data Analyst', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(11, '12220004', 13, 'Web Developer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(12, '12220008', 7, 'Network Engineer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(13, '12220010', 6, 'IT Support Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(14, '12220012', 3, 'Web Developer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(15, '12220014', 3, 'Network Engineer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(16, '12220020', 15, 'Web Developer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(17, '12220024', 14, 'Network Engineer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(18, '13220004', 13, 'Network Engineer', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(19, '13220006', 14, 'Data Analyst', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(20, '13220008', 1, 'IT Support Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(21, '13220010', 6, 'IT Support Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(22, '13220014', 7, 'Data Analyst', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(32, '11220001', 4, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(33, '11220003', 11, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(34, '11220005', 9, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(35, '11220007', 11, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(36, '11220011', 4, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(37, '11220013', 8, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(38, '11220015', 9, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(39, '11220019', 12, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(40, '12220001', 12, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(41, '12220003', 9, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(42, '12220009', 12, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(43, '12220011', 4, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(44, '12220013', 8, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(45, '12220015', 9, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(46, '12220021', 9, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(47, '12220023', 9, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(48, '12220025', 8, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(49, '13220001', 12, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(50, '13220003', 12, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(51, '13220005', 11, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(52, '13220009', 11, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(53, '13220011', 9, 'IT Staff Magang', 6, 2025, 'Selesai', '2025-03-01', '2025-08-31'),
(63, '11220001', 14, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(64, '11220003', 13, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(65, '11220005', 2, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(66, '11220007', 10, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(67, '11220011', 13, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(68, '11220013', 14, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(69, '11220015', 13, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(70, '11220019', 14, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(71, '12220001', 2, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(72, '12220003', 1, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(73, '12220009', 10, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(74, '12220011', 14, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(75, '12220013', 1, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(76, '12220015', 13, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(77, '12220021', 14, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(78, '12220023', 1, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(79, '12220025', 2, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(80, '13220001', 1, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(81, '13220003', 2, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(82, '13220005', 14, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(83, '13220009', 1, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(84, '13220011', 1, 'Junior Programmer', 6, 2025, 'Aktif', '2025-09-01', '2026-02-28'),
(94, '202108001', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(95, '202108024', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(96, '202108028', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(97, '202108029', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(98, '202409017', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(99, '21220001', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(100, '21220002', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(101, '21220003', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(102, '21220004', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(103, '21220005', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(104, '21220006', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(105, '21220007', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(106, '21220008', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(107, '21220011', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(108, '21220012', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(109, '21220013', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(110, '21220014', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(111, '21220015', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(112, '21220016', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(113, '21220017', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(114, '21220018', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(115, '21220019', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(116, '21220020', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(117, '21220021', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(118, '21220022', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(119, '21240001', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(120, '21240002', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(121, '21240003', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(122, '21240004', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(123, '21240005', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(124, '21240006', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(125, '21240007', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(126, '21240008', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(127, '21240009', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(128, '21240010', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(129, '21240011', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(130, '21240012', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(131, '21240013', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(132, '21240014', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(133, '21240015', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(134, '21240016', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(135, '21250001', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(136, '21250002', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(137, '21250003', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(138, '21250004', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(139, '21250005', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(140, '21250006', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(141, '21250007', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(142, '21250008', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(143, '21250009', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(144, '21250010', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(145, '21250011', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(146, '21250012', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(147, '21250013', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(148, '21250014', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(149, '21250015', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(150, '21250016', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(151, '22220001', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(152, '22220005', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(153, '22220006', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(154, '22220009', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(155, '22220010', 6, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(156, '22220011', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(157, '22220012', 15, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(158, '22220013', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(159, '22220015', 8, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(160, '22220016', 11, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(161, '22220017', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(162, '22220019', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28'),
(163, '22220021', 1, 'Digital Marketing Intern', 12, 2025, 'Aktif', '2025-03-01', '2026-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mhs','dsn','adm') NOT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tahun_masuk` int(4) DEFAULT NULL,
  `dosen_pembimbing_id` varchar(20) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `file_cv` varchar(255) DEFAULT NULL,
  `tentang_saya` text DEFAULT NULL,
  `ipk_terakhir` decimal(3,2) DEFAULT NULL,
  `default_password_changed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `password`, `role`, `prodi`, `angkatan`, `telepon`, `alamat`, `foto`, `tahun_masuk`, `dosen_pembimbing_id`, `linkedin`, `github`, `website`, `file_cv`, `tentang_saya`, `ipk_terakhir`, `default_password_changed`) VALUES
('11220001', 'Assya Fitri Anggraini', '11220001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220002', 'Kevin Hotasitua Simanjuntak', '11220002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220003', 'Alvasya Diva Syafira', '11220003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220004', 'Desvika Elsa Rahmadhani', '11220004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220005', 'Inggrid Anggrita Prameswari', '11220005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220006', 'Sabrina Marva Febriyanti', '11220006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220007', 'Silvanya Assyfa Frizli', '11220007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220008', 'Maura Defania Indra', '11220008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220010', 'David Fadillah Murti', '11220010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220011', 'Ernawasyatul Masrifah', '11220011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220012', 'Putri Niandari', '11220012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220013', 'Sarah Nur Istiqomah', '11220013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220014', 'Maya Sopa', '11220014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220015', 'Zilzikri Jaka Ringga', '11220015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220016', 'Dwi Rizky Nurjanah', '11220016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220018', 'Selvia Putri Permata Sari', '11220018@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220019', 'Dimas Wahab', '11220019@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11220020', 'Tri Nurcahyanti', '11220020@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2022', NULL, NULL, NULL, 2022, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240001', 'Karina Widiya Ranti', '11240001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240002', 'Artika Tri Wulandari', '11240002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240003', 'Nazwa Putri Rossitania', '11240003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240004', 'Serenade Theodora Dwica', '11240004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240005', 'Alvino Zein Saputra', '11240005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240006', 'Indyra Ardhya Kirana', '11240006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240007', 'Reynata Azzahra', '11240007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240008', 'Fadhel Kadafi Al Mathrud', '11240008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240009', 'Felicia Bunga Clarence', '11240009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240010', 'Ikhwan Nusafa', '11240010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240011', 'Muhammad Akbar Shirazy', '11240011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240012', 'Enrico Lazuardi', '11240012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240013', 'Muhammad Ilham Bintang', '11240013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11240014', 'Jose Mourinho Siagian', '11240014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2024', NULL, NULL, NULL, 2024, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250001', 'Ananda Mahesa Putra', '11250001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250002', 'Muhammad Aditya', '11250002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250003', 'Rasiana Tarika', '11250003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250004', 'Radityawan Putra Hidayat', '11250004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250005', 'Muhamad Agis Pratama', '11250005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250006', 'Diaz Surya Perdana', '11250006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250007', 'Raden Thoriq Nirwana Yudho', '11250007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250008', 'Rafli Arief Riyadi', '11250008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250009', 'Muhammad Ali Abubakar Bashir Utsmar', '11250009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250010', 'Daniswara Adi Wijaya', '11250010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250011', 'Farrel Fata Rabbani Gading', '11250011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108027', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250012', 'Raihan Dwi Putra', '11250012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('11250013', 'Zahra Shalsyabilla', '11250013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem Informasi', '2025', NULL, NULL, NULL, 2025, '202108010', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220001', 'Sheilta Salsabila Saharani', '12220001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220003', 'Erick Ade Hending Firmansyah', '12220003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108011', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220004', 'Ria Tribanowati', '12220004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220008', 'Cintami Dewi Mulyati', '12220008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220009', 'Eklesia Wiastri Zagoto', '12220009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220010', 'Lukman Hidayat', '12220010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220011', 'Helmyna', '12220011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220012', 'Riza Marsela', '12220012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220013', 'Finka Hirdiswara', '12220013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220014', 'Martina Ayu Candra', '12220014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220015', 'Syahreina Maulidya Jasmine', '12220015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220020', 'Surya Erlamba', '12220020@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', '+6289614028027', NULL, NULL, 2022, '201203346', '', '', 'sryaerlmba.my.id', NULL, 'Aku Adlah mahasiswa', '3.85', 0),
('12220021', 'Aryasatya Handaru Muhammad', '12220021@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220023', 'Akbar Rizky Subekti', '12220023@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220024', 'Dhika Ramdhana', '12220024@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12220025', 'Jendri Yohanes', '12220025@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12230001', 'Ignatius Lucky', '12230001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', NULL, NULL, NULL, 2023, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12230002', 'Michiko Tamilla Nathania R', '12230002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', NULL, NULL, NULL, 2023, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12230003', 'Aryo Panji Wicaksono', '12230003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', NULL, NULL, NULL, 2023, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12230004', 'Talitha Khansa Fahira', '12230004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', '', '', NULL, 2023, '202108022', '', '', '', NULL, '', '3.95', 0),
('12230005', 'Dzaky Rofyan Saputra', '12230005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', NULL, NULL, NULL, 2023, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12230006', 'Defani Maheswari', '12230006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', NULL, NULL, NULL, 2023, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12230009', 'Yasser Arafat', '12230009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', NULL, NULL, NULL, 2023, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12230010', 'Artiyail Aziz Laksono', '12230010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', NULL, NULL, NULL, 2023, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12230013', 'Syanie Nur\'aini Azis', '12230013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2023', NULL, NULL, NULL, 2023, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240001', 'Aqila Cindy Ananti', '12240001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240002', 'Fakhri Rasyid', '12240002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240003', 'Syaikhah Aditya Ramadhani', '12240003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240005', 'Rayssa Ameyliananda', '12240005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240006', 'Muhammad Nabil Nurfadillah', '12240006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240007', 'Ahmad Zarkasi Seban', '12240007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240008', 'Dimas Abimoza', '12240008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240009', 'Adnan Syukur', '12240009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240010', 'Dimas Satria Widiyanto', '12240010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240012', 'Radithya Akmalino Setiawan', '12240012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240013', 'Muhamad jayana', '12240013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240014', 'Reynald Ardhan Hidayat', '12240014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240015', 'Ableir Benny Purba', '12240015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240016', 'Putri Ramadhani', '12240016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12240017', 'Widhy Fadhil Aldino', '12240017@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250001', 'Dean Naufal Falah', '12250001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108011', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250002', 'Raihan Firdaus Haryono', '12250002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250003', 'Wira Bintang Alvarya Wibisono', '12250003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250004', 'Dioni Raditya', '12250004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250005', 'Aditya Fajar Setiawan', '12250005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108011', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250006', 'Dhianda Zahrotunnisa', '12250006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250007', 'Ibna Clevardo Syarif', '12250007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250008', 'Yayan Wahyu Ardiansyah', '12250008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108011', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250009', 'Muhamad Aldizar Ilham', '12250009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250010', 'Muhammad Naufal Nurfikri', '12250010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250011', 'Miftahul Fauzi', '12250011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108011', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250012', 'Naufal Rafif Ananda Masai', '12250012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108022', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250013', 'Twedy Safaraz', '12250013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250014', 'Caesar Yusuf Alvito Bahri', '12250014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250015', 'Sherina Dinda Cahya Mulyana Sugianto', '12250015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108007', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250016', 'Andizha Fauzan Muslimin', '12250016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108011', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250017', 'Novum Rizki Farros Sitorus', '12250017@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250018', 'Thoriq Ghaihab Abbad', '12250018@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250019', 'Reza Hadi Prabowo', '12250019@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250020', 'Hafitd Al Djibran', '12250020@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250021', 'Melsi Kristiani Tafonao', '12250021@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201009308', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250022', 'Zahria Anwar Gresdo', '12250022@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '201203346', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('12250023', 'Arya Cahya Mulyana Sugianto', '12250023@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Sistem dan Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108011', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220001', 'Raden Mochamad Issa Wirakusumah', '13220001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220003', 'Achmad Faiz', '13220003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220004', 'Haqqi Anugrah', '13220004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220005', 'Mohammad Fauzan Zidny', '13220005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220006', 'Luffi Idris Setiawan', '13220006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220008', 'Ayasy Izzul Haq', '13220008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220009', 'Diah Dwi Noviati', '13220009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220010', 'Mila Kurniati', '13220010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220011', 'Inawati Cahyany', '13220011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13220014', 'Rahmi Rahmawati', '13220014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2022', NULL, NULL, NULL, 2022, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240001', 'Bangkit Suryo Nugroho', '13240001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240002', 'Muhamad Rafi Fernanda', '13240002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240003', 'Debora Septrikamus', '13240003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240004', 'Muhammad Ilyasa', '13240004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240005', 'Annisa Rachmanti', '13240005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240006', 'Dhimas Bagus Utomo', '13240006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240007', 'Yehezkiel Sitorus', '13240007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240008', 'Muhammad Fathi Farhat', '13240008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240009', 'Ikhlas Qolbun Bastian Cu', '13240009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240010', 'Malahin Wahyu Zayyan Putra', '13240010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240011', 'Anaya Bintang Prawidya', '13240011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240012', 'Muhammad Hafidz Syahrul Ramdhan', '13240012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240013', 'Mirakel Blessia Rooroh Rasyid', '13240013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240014', 'Muhammad Farid Farhan', '13240014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240015', 'Rendy Aditya Rahmat', '13240015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240016', 'Muhammad Zidan', '13240016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240017', 'Diandra Paramitha', '13240017@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240018', 'Muhammad Adnan Azwan', '13240018@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240019', 'Mohammad Panji Satrio', '13240019@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240020', 'Gidion', '13240020@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240021', 'Cecilia Putri Winarno', '13240021@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240022', 'Rahmawati', '13240022@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240023', 'Andhi Ramadhanny', '13240023@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240024', 'Muhammad Rendy Syahputra', '13240024@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240025', 'Muhammad Alif Syach', '13240025@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13240026', 'Muhammad Ferdiansyah', '13240026@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2024', NULL, NULL, NULL, 2024, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250001', 'Naufal Rica Qayszaka', '13250001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250002', 'Ahmad Muchsin', '13250002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250003', 'Rifky Fadillah', '13250003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250004', 'Al Rizky Syawalany', '13250004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250005', 'Raffi Nurdiansyah', '13250005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250006', 'Devan Mahesa Wardany', '13250006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250007', 'Dimas Syarif Hidayatullah', '13250007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202403006', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250008', 'Gabriel Diandra Martua Lumban Tobing', '13250008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250009', 'Athfal Naufal Birrul Waalidaen', '13250009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250010', 'Tengku Muhammad Dasya Fadhil Alfayadh', '13250010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('13250011', 'Arvest Hammam Azafir', '13250011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Teknologi Informasi', '2025', NULL, NULL, NULL, 2025, '202108019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('201009308', 'Elin Panca Saputra, S.Kom., M.Kom', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Sistem dan Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('201203346', 'Priyono', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Sistem dan Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108001', 'Gunawan Witjaksono, B.S.E.E., M.S.E.E., P.hD., CISA., IPU., ASEAN Eng.', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Digital Entrepreneur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108002', 'Prof. Ir. Dana Saroso, MEngSc., PhD', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Bisnis Digital', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108007', 'Dr. Ing. Agus Trihandoyo, DEA', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Sistem dan Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108008', 'Vivi Afifah, S.Kom., MMSI', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Bisnis Digital', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108010', 'Diky Wardhani, S.Si.,M.Kom', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Sistem Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108011', 'Fitria, S.Kom., MT', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Sistem dan Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108017', 'Rika Astuti.,S.Kom.,M.Kom', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108019', 'Rizki Hesananda, S.Kom., M.Kom', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108020', 'Anang Martoyo, SP, MM', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Bisnis Digital', NULL, '085721390333', '', 'f285161ebc60875369889f3bf88627d6.png', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0),
('202108021', 'Michael Sitorus, S.Kom., M.Kom', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Sistem Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108022', 'Neneng Rachmalia Feta, S.Kom., M.Kom', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Sistem dan Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108024', 'Zaenal Arief, ST.,', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Digital Entrepreneur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108026', 'Drs. Ayi Wahid, MM.,CPM', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Bisnis Digital', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108027', 'Satya Arisena Hendrawan, ST., M.Kom', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Sistem Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108028', 'Siti Nuryati, SE., MM', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Digital Entrepreneur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202108029', 'Dwipo Setyantoro, S.Kom., MMSI', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Digital Entrepreneur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202403006', 'Dicky Harianyo, S.Kom., M.Kom', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('202409017', 'Rini Martiwi, SS, MM', NULL, '$2a$12$TKQyruzrhRGS.E/X8Xj.deyfg5/4GQb8fFrb1mudHwEGt1anVZu2W', 'dsn', 'Digital Entrepreneur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220001', 'Maula Amanda', '21220001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220002', 'Djibril Al Gibrani', '21220002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220003', 'Nazwa Naura Shafitri', '21220003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220004', 'Natrah Meizha Alany', '21220004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220005', 'Rayyan Kautsar', '21220005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220006', 'Mutiaraningtyas', '21220006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220007', 'Nuraida Hoiriyah', '21220007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220008', 'Dias Widi Utami', '21220008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220011', 'Vidia Oktaviani Fortuna', '21220011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220012', 'Maya Dwijayanti', '21220012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220013', 'Kandi Inten Giwang Gusti', '21220013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220014', 'Lia Dewi Yanti', '21220014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220015', 'Arum Johan Purnamasari', '21220015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220016', 'Aji Sukma Siswa Atmaja', '21220016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220017', 'Ramdhoni Wijaya', '21220017@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220018', 'Dwi Praja Agustian', '21220018@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220019', 'Gita Saputri', '21220019@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220020', 'Bobi Anggara', '21220020@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220021', 'Nadia Viola Queensy', '21220021@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21220022', 'Rival Ambiya Almanda', '21220022@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2022', NULL, NULL, NULL, 2022, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240001', 'Ratna Mourine Shakaylla', '21240001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240002', 'Randu Bintang Dharmawan', '21240002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240003', 'Davia Mega Gunanti', '21240003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240004', 'Fathia Rizky Satiya', '21240004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240005', 'Mukhammad Zainul Aditya', '21240005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240006', 'Bimo Yunda Permana Putra', '21240006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240007', 'Muhammad Faiq Zamzami', '21240007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240008', 'Nilam Tetania Chevira', '21240008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240009', 'Ahmad Muzaki Ismail', '21240009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `password`, `role`, `prodi`, `angkatan`, `telepon`, `alamat`, `foto`, `tahun_masuk`, `dosen_pembimbing_id`, `linkedin`, `github`, `website`, `file_cv`, `tentang_saya`, `ipk_terakhir`, `default_password_changed`) VALUES
('21240010', 'Herlin Angela Safa Abriel Fatilasyah', '21240010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240011', 'Moammar Naufal', '21240011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240012', 'Alghadia Maurithania Sandheka', '21240012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240013', 'Mira Anggraeni', '21240013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240014', 'Patimah Az-Zahra Agustina Lubis', '21240014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240015', 'Az Zahra Putri Salsabila', '21240015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21240016', 'Muhammad Najwan Putra', '21240016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2024', NULL, NULL, NULL, 2024, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250001', 'Alya Naura Maharani', '21250001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250002', 'Muhammad Fawwaz Zawahir', '21250002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250003', 'Nurmaila Zahra', '21250003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250004', 'Rama Agviryan Nathan', '21250004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250005', 'Nur Fitri Ramadhani', '21250005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250006', 'Sayyid Najib', '21250006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250007', 'Muhammad Daud Irwansyah', '21250007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202108029', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250008', 'Muhammad Razan Abi Aqilah', '21250008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250009', 'Kesya Fatimah Manik', '21250009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250010', 'Alika Milka Arrumaisha', '21250010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250011', 'Ikhwal Jeni', '21250011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250012', 'Akram Amanullah', '21250012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202108024', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250013', 'Arnol Sidabutar', '21250013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250014', 'Karim', '21250014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250015', 'Mushollin Rosmiyyatul Islam', '21250015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202409017', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('21250016', 'Andika Martin', '21250016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Digital Entrepreneur', '2025', NULL, NULL, NULL, 2025, '202108028', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220001', 'Sena Dwi Nova', '22220001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220005', 'Anita Nur Faigah', '22220005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220006', 'Putri Taslimah', '22220006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220009', 'Nurfitri Apriani', '22220009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220010', 'Yohana Romaulita Nababan', '22220010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220011', 'Desi Tri Utami', '22220011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220012', 'Diana Wulan Sari', '22220012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220013', 'Aris Dwi Putri', '22220013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220015', 'Nanda Hestu Dzias', '22220015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220016', 'Bagas Indra Safrilla', '22220016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220017', 'Matius Last Christ Zagoto', '22220017@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220019', 'Mohammad Farhan', '22220019@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22220021', 'Selly Putriyana Wartoseno', '22220021@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2022', NULL, NULL, NULL, 2022, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230002', 'Winda Farida', '22230002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230003', 'Zefanya Williams', '22230003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230004', 'Valda Dhea Samona', '22230004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230005', 'Rafif Putra Divantio', '22230005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230006', 'Kimi Nuno Marcello Balukh', '22230006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230007', 'Farrah Alisha Hanum', '22230007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230008', 'Hutama Andyva Putra', '22230008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230009', 'Putri Ashifa Azahra', '22230009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230010', 'Rendi Borichy Balulu', '22230010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230011', 'Aditya Putra Anamta', '22230011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230014', 'Mohammad Fakhrial Al Gani', '22230014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230015', 'Naufal Aribah', '22230015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230016', 'M. Ikhsan Faishal Fadhilah', '22230016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230017', 'Nisva Maulidia', '22230017@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230018', 'Nararya Pratama Wibowo', '22230018@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230019', 'Paundra Farhan Frizli', '22230019@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22230021', 'Siska', '22230021@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2023', NULL, NULL, NULL, 2023, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240001', 'Nova Lina Anggraeny', '22240001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240002', 'Nasywa Mahdiyyah', '22240002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240003', 'Fathma Aulia Puteri', '22240003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240004', 'Davina Fairuz', '22240004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240005', 'Muhammad Kayyis Abdullah', '22240005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240006', 'Alfian', '22240006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240007', 'Kinari Ramadhanti', '22240007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240008', 'Shafira Putri Salsabila', '22240008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240009', 'Maria Goreti Godelivacang', '22240009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240010', 'Jovinta Putri Hapsari', '22240010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240011', 'Syeren Peimeng', '22240011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240012', 'Friensa Derman Zagoto', '22240012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240013', 'Munfiqoh Wa A\'fiatul Khoiriah', '22240013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240015', 'Sopian Shahuri', '22240015@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240016', 'Muhamad Raafi', '22240016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240017', 'Navisa Lailatin Avifah', '22240017@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240018', 'Zalfa Ridzky Rinaomi Putri', '22240018@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240019', 'Qaisharu Anand Alfarisi', '22240019@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240020', 'Archangela Chiriani Uge', '22240020@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240021', 'Liya Ameliya Agustin', '22240021@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240022', 'Nabil Syamsudin', '22240022@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240023', 'Revalina Yunita Putri', '22240023@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240024', 'Nurul Aprilianti', '22240024@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240025', 'Khoerul Amin', '22240025@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240026', 'Ratu Elli Rachmiyati Rm', '22240026@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240027', 'Fatmawati Enna', '22240027@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240028', 'Bella Tri Handayani', '22240028@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240029', 'Mochamad Rizqi Jiro', '22240029@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240030', 'Muhammad Hadi', '22240030@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240031', 'Fadia Sadilah', '22240031@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240032', 'Yudi Eko Susanto', '22240032@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22240033', 'Mohamad Kharismatullah Kodratullah Rahmatullah', '22240033@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2024', NULL, NULL, NULL, 2024, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250001', 'Nafidatul Azizah', '22250001@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250002', 'Abel Evan Putra Ajit S', '22250002@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250003', 'Najwa Amalia Safira', '22250003@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250004', 'Muhammad Rizki Setiawan', '22250004@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250005', 'Raisya Novinda Dewi', '22250005@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250006', 'Manda Syakirah Aurellia', '22250006@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250007', 'Muhammad Daffasya', '22250007@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250008', 'Alwansyah Alam', '22250008@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250009', 'Naysila Irmanika', '22250009@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108026', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250010', 'Christopher Baso Daeng Marewa', '22250010@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250011', 'Difa Keanurizqi', '22250011@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108002', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250012', 'Azmi Ali', '22250012@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250013', 'Sherlynda Nabila Fajrah', '22250013@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250014', 'Naila Ramadhani Wibowo', '22250014@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250016', 'Naghmah Faadiyah Kamalia', '22250016@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108020', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('22250017', 'Fina Anggriani Azzahrah', '22250017@cyber-univ.ac.id', '$2y$10$f/viIgFn7N/Ev1jDnE74KOviS.nWxFhzB/MTWUWl6fvThYnzmRbRq', 'mhs', 'Bisnis Digital', '2025', NULL, NULL, NULL, 2025, '202108008', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('admin', 'Admin CyberCareer', NULL, '$2a$10$ax3l.3umGsR/7mILdA8Z6u9aWAzlbh73EdL93ONa8RnHxi3azwCFG', 'adm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_magang`
--
ALTER TABLE `riwayat_magang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`mahasiswa_id`),
  ADD KEY `fk_magang_perusahaan` (`perusahaan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `riwayat_magang`
--
ALTER TABLE `riwayat_magang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `logbook_mhs_fk` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_magang`
--
ALTER TABLE `riwayat_magang`
  ADD CONSTRAINT `fk_magang_perusahaan` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_magang` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
