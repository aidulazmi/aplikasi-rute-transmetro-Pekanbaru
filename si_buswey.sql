-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 06:01 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `si_buswey`
--
CREATE DATABASE IF NOT EXISTS `si_buswey` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `si_buswey`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `Nm_lengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `Username`, `Email`, `password`, `Nm_lengkap`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id_driver` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `alamat` longtext NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `nama_koridor` varchar(80) NOT NULL,
  `foto` varchar(400) NOT NULL,
  `platn` varchar(15) NOT NULL,
  PRIMARY KEY (`id_driver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `Username`, `email`, `password`, `nm_lengkap`, `alamat`, `no_hp`, `nama_koridor`, `foto`, `platn`) VALUES
(1, 'harry', 'harrykurniawan@gmail.com', 'harry', 'Harry Kurniawan', 'Jl. Umban Sari Atas', '082383859146', 'Koridor 8A', 'IMG-20181014-WA0004.jpg', 'BM 0876 BA'),
(2, 'rahmat', 'Rahmatparlindungan@gmail.', 'rahmat', 'Rahmat Parlindungan', 'Jl. Dr. Soetomo', '085271833945', 'Koridor 1', '8b31244b660d00cc86cb17756d0d2489.jpg', 'BM 0871 HK'),
(3, 'efran', 'EfranP234@gmail.com', 'efran234', 'Efran Palas. H', 'Jl. Nangka', '082367854534', 'Koridor 1A', 'df268b09020737c8664596e5ac57107b.jpg', 'BM 7648 HJ'),
(4, 'adesa', 'adesaput123@gmail.com', 'puri12345', 'Ade Saputra', 'Jl. Simpang 3', '081287563423', 'Koridor 2', 'IMG-20170412-WA0037.jpg', 'BM 3678 NJ'),
(5, 'boby', 'Bobywira98@gmail.com', 'boby98', 'Boby Wiranda', 'Jl. Mustika', '081274566736', 'Koridor 3', 'IMG-20181014-WA00041.jpg', 'BM 8765 NG'),
(6, 'yoga', 'yogase67@gmail.com', 'yogasetiawan', 'Yoga Setiawan', 'Jl. Melur ', '082276488577', 'Koridor 4A', 'yoga.jpg', 'BM 9873 JK'),
(7, 'hadinul', 'insanhadinul32@gmail.com', 'hadi23456', 'Hadinul Insan', 'Jl. ERBA, Rumbai', '082383857456', 'Koridor 4B', 'dinul.jpg', 'BM 6542 GH'),
(8, 'insana', 'ikhsaninsana56@gmail.com', 'ikhsan', 'Ikhsan Insana. S', 'Jl. Perjuangan, Rumbai', '085267455632', 'Koridor 5', 'IMG_20160312_161141.jpg', 'BM 7659 GK'),
(9, 'ahmad', 'ahmadshaleh88@gmail.com', 'saleh345', 'Ahmad Shaleh', 'Jl. Pepaya', '08235466543', 'Koridor 6', 'sayuti.jpg', 'BM 6323 MN'),
(10, 'dayat', 'dayat3456@gmail.com', 'dayat567', 'M. Hidayatullah', 'Jl. Garuda Sakti', '081275434785', 'Koridor 7 A', 'dayat.jpg', 'BM 6738 GH'),
(11, 'andre', 'GunawanAndre@gmail.com', 'gunawanandre23', 'Andre Gunawan', 'Umban Sari Atas', '081254678345', 'Koridor 7B', 'IMG-20180602-WA0021.jpg', 'BM 7234 JH'),
(12, 'wahyu', 'WahyuAnugrah0422@gmail.co', 'wahyuanugrah3456', 'Wahyu Anugrah', 'Jl. Karya gg. Karya 2', '085265344672', 'Koridor 8B', 'c12610abc8507191ff2c65f48e8249a2.jpg', 'BM 6653 NJ');

-- --------------------------------------------------------

--
-- Table structure for table `halte`
--

CREATE TABLE IF NOT EXISTS `halte` (
  `kd_halte` int(11) NOT NULL AUTO_INCREMENT,
  `nama_halte` varchar(60) NOT NULL,
  `alamat_halte` varchar(50) NOT NULL,
  `latitute` double NOT NULL,
  `longtitude` double NOT NULL,
  `nama_koridor` varchar(80) NOT NULL,
  `foto` varchar(400) NOT NULL,
  `keterangan` enum('transit','notransit') NOT NULL,
  PRIMARY KEY (`kd_halte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `halte`
--

INSERT INTO `halte` (`kd_halte`, `nama_halte`, `alamat_halte`, `latitute`, `longtitude`, `nama_koridor`, `foto`, `keterangan`) VALUES
(1, 'Halte Bakti 2 (ICS)', 'Sidomulyo Tim., Kec. Marpoyan', 0.478231, 101.431996, 'Koridor 3', 'Halte_Bakti_2_(ICS).JPG', 'notransit'),
(2, 'Halte Gient', 'JL. HR SUBRANTAS', 0.464424, 101.385153, 'Koridor 3', 'Halte_Gient.JPG', 'notransit'),
(3, 'Halte Helvetia 1', 'Sidomulyo Tim., Kec. Marpoyan Damai', 0.470844, 101.418486, 'Koridor 3', 'Halte_Helvetia_1.JPG', 'notransit'),
(4, 'Halte JPO', 'Tuah Karya, Kec. Tampan', 0.464126, 101.384977, 'Koridor 3', 'Halte_JPO.JPG', 'transit'),
(5, 'Halte Mona Plaza', 'Jl. HR. Soebrantas Panam No.65', 0.464026, 101.380187, 'Koridor 3', 'Halte_Mona_Plaza.JPG', 'notransit'),
(6, 'Halte Paus 1', 'Sidomulyo Tim., Kec. Marpoyan Damai', 0.480995, 101.436322, 'Koridor 3', 'Halte_Paus_1.JPG', 'transit'),
(7, 'Halte Purwodadi 1', 'Jl. HR. Soebrantas Panam No.65', 0.464149, 101.402029, 'Koridor 3', 'Halte_Purwodadi_1_(Jl__HR__Soebrantas_Panam_No_65).JPG', 'notransit'),
(8, 'Halte Ramayana 1', 'JL. HR SUBRANTAS', 0.463987, 101.41075, 'Koridor 3', 'Halte_Ramayana_1.JPG', 'notransit'),
(9, 'Halte Rambutan', 'Sidomulyo Tim., Kec. Marpoyan', 0.476098, 101.427655, 'Koridor 3', 'Halte_Rambutan.JPG', 'notransit'),
(10, 'Halte Showroom Suzuki', 'Sidomulyo Tim., Kec. Marpoyan', 0.473426, 101.418531, 'Koridor 3', 'Halte_Showroom_Suzuki.JPG', 'notransit'),
(11, 'Halte Stadion Kh. Nasution', 'Jl. Yosudarso', 0.573637, 101.428959, 'Koridor 8B', 'Rumbai.JPG', 'notransit'),
(12, 'Halte Walikota', 'Jl. Jendral Sudirman', 0.514099, 101.447343, 'Koridor 8A', 'Kantor_Walikota.JPG', 'transit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rute`
--

CREATE TABLE IF NOT EXISTS `tb_rute` (
  `id_rute` int(11) NOT NULL AUTO_INCREMENT,
  `nama_koridor` varchar(80) NOT NULL,
  `keterangan` enum('aktif','taktif') NOT NULL,
  `Tujuan` varchar(80) NOT NULL,
  PRIMARY KEY (`id_rute`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tb_rute`
--

INSERT INTO `tb_rute` (`id_rute`, `nama_koridor`, `keterangan`, `Tujuan`) VALUES
(9, 'Koridor 1', 'aktif', 'Pandau - Pelita Pantai'),
(10, 'Koridor 1A', 'aktif', 'AWAL BROS SUDIRMAN – BANDARA SSQ'),
(11, 'Koridor 2', 'aktif', 'KULIM – TERM. BRPS'),
(12, 'Koridor 3', 'aktif', 'PANAM - UIN - AKSES SUDIRMAN RS. AWAL BROS'),
(13, 'Koridor 4A', 'aktif', 'PASAR TANGOR – RAMAYANA'),
(14, 'Koridor 4B', 'aktif', 'RAMAYANA - TERM. BRPS'),
(15, 'Koridor 5', 'aktif', 'PELABUHAN SUNGAI DUKU – PATTIMURA'),
(16, 'Koridor 6', 'aktif', 'PANDAU –TERM. BRPS'),
(17, 'Koridor 7 A', 'aktif', 'TRI BAKTI – PUJASERA ARIFIN AHMAD'),
(18, 'Koridor 7B', 'aktif', 'PUJASERA – PUSKESMAS SIMP. TIGA'),
(19, 'Koridor 8A', 'aktif', 'KANTOR WALIKOTA – UNILAK'),
(20, 'Koridor 8B', 'aktif', 'UNILAK - PALAS RAYA\r\n'),
(21, 'Koridor NN', 'aktif', 'Kantor Walikota - Uin Suska Riau');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
