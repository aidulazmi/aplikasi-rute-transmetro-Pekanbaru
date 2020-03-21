-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 11:42 AM
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
  PRIMARY KEY (`id_driver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `Username`, `email`, `password`, `nm_lengkap`, `alamat`, `no_hp`) VALUES
(6, 'aan', 'aanmar@gmail.com', 'aanmardanu', 'Andika Mardanu', 'jl. Ampera', '082384532456'),
(7, 'joe', 'jordieko21@gmail.com', 'jordi123', 'Jordi Eko Putra', 'jl.muara fajar', '081387887766'),
(8, 'ekow', 'ekoweldi8834@gmail.com', 'ekoweldi123', 'Eko Weldi Simanjuntak', 'jl.Paus Rumbai', '085277844534'),
(9, 'indra', 'yondrai334@gmail.com', 'indrayondra', 'Indra Yondra', 'jl.tanjung datuk', '082383859143'),
(10, 'mas', 'yoga123@gmail.com', 'yoga', 'Yoga Putra', 'Jl.Riau', '082387869287'),
(11, 'rahmad', 'rahmadfairul@gmail.com', 'rahmad123', 'RahmadFairud', 'jl.bukitbarisan', '082371833594'),
(12, 'andro', 'haryandi@gmail.com', 'andro', 'Andro Simanjuntak', 'jl. Kulim', '081376844532'),
(13, 'fahri', 'nurfahri@gmail.com', 'fahri', 'Nur Fahri', 'jl.Smamin', '085676886543'),
(14, 'harry', 'belharry@gmail.com', 'harrymes', 'Harry Kurniawan', 'jl.Garuda Sakti', '082388845239'),
(15, 'yulva', 'yulva334@gmail.com', 'yulva145', 'Yulva Andone Saragi', 'jl.Riau Ujung', '081277668865');

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
  `nm_lengkap` varchar(50) NOT NULL,
  `foto` varchar(400) NOT NULL,
  `keterangan` enum('transit','notransit') NOT NULL,
  PRIMARY KEY (`kd_halte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `halte`
--

INSERT INTO `halte` (`kd_halte`, `nama_halte`, `alamat_halte`, `latitute`, `longtitude`, `nama_koridor`, `nm_lengkap`, `foto`, `keterangan`) VALUES
(1, 'Halte Stadion Kh. Nasution', 'Jl. Yosudarso', 0.573637, 101.428959, 'Koridor 1', 'Harry Kurniawan', 'Rumbai.JPG', 'notransit'),
(2, 'Halte Walikota', 'Jl. Jendral Sudirman', 0.514099, 101.447343, 'Koridor 1', 'Harry Kurniawan', 'Kantor_Walikota.JPG', 'transit'),
(3, 'Halte Rambutan', 'Sidomulyo Tim., Kec. Marpoyan', 0.476098, 101.427655, 'Koridor 1', 'Harry Kurniawan', 'Halte_Rambutan.JPG', 'notransit'),
(4, 'Halte Bakti 2 (ICS)', 'Sidomulyo Tim., Kec. Marpoyan', 0.478231, 101.431996, 'Koridor 3', 'Harry Kurniawan', 'Halte_Bakti_2_(ICS).JPG', 'notransit'),
(5, 'Halte Paus 1', 'Sidomulyo Tim., Kec. Marpoyan Damai', 0.480995, 101.436322, 'Koridor 3', 'Harry Kurniawan', 'Halte_Paus_1.JPG', 'notransit'),
(6, 'Halte Showroom Suzuki', 'Sidomulyo Tim., Kec. Marpoyan Damai', 0.473426, 101.418531, 'Koridor 3', 'Harry Kurniawan', 'Halte_Showroom_Suzuki.JPG', 'notransit'),
(7, 'Halte Helvetia 1', 'Sidomulyo Tim., Kec. Marpoyan Damai', 0.470844, 101.418486, 'Koridor 4B', 'Harry Kurniawan', 'Halte_Helvetia_1.JPG', 'notransit'),
(8, 'Halte Ramayana 1', 'Sidomulyo Bar., Kec. Tampan', 0.463987, 101.41075, 'Koridor 4B', 'Harry Kurniawan', 'Halte_Ramayana_1.JPG', 'notransit'),
(9, 'Halte Purwodadi 1', 'Jl. HR. Soebrantas Panam No.65', 0.464149, 101.402029, 'Koridor 4B', 'Eko Weldi Simanjuntak', 'Halte_Purwodadi_1_(Jl__HR__Soebrantas_Panam_No_65).JPG', 'notransit'),
(10, 'Halte JPO', 'Tuah Karya, Kec. Tampan', 0.464126, 101.384977, 'Koridor 4B', 'Harry Kurniawan', 'Halte_JPO.JPG', 'notransit'),
(11, 'Halte Gient', 'JL. HR SUBRANTAS', 0.464424, 101.385153, 'Koridor 3', 'Andro Simanjuntak', 'Halte_Gient.JPG', 'notransit'),
(12, 'Halte Mona Plaza', 'Jl. HR. Soebrantas Panam No.65', 0.464026, 101.380187, 'Koridor 3', 'Harry Kurniawan', 'Halte_Mona_Plaza.JPG', 'notransit'),
(13, 'Halte Uin Suska Riau', 'Jl. HR. Soebrantas Km.18', 0.466317, 101.357603, 'Koridor 3', 'Andro Simanjuntak', 'Halte_Ramayana_11.JPG', 'notransit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rute`
--

CREATE TABLE IF NOT EXISTS `tb_rute` (
  `id_rute` int(11) NOT NULL AUTO_INCREMENT,
  `nama_koridor` varchar(80) NOT NULL,
  `keterangan` enum('aktif','taktif') NOT NULL,
  PRIMARY KEY (`id_rute`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tb_rute`
--

INSERT INTO `tb_rute` (`id_rute`, `nama_koridor`, `keterangan`) VALUES
(9, 'Koridor 1', 'aktif'),
(10, 'Koridor 1A', 'aktif'),
(11, 'Koridor 2', 'aktif'),
(12, 'Koridor 3', 'aktif'),
(13, 'Koridor 4A', 'aktif'),
(14, 'Koridor 4B', 'aktif'),
(15, 'Koridor 5', 'aktif'),
(16, 'Koridor 6', 'aktif'),
(17, 'Koridor 7 A', 'aktif'),
(18, 'Koridor 7B', 'aktif'),
(19, 'Koridor 8A', 'aktif'),
(20, 'Koridor 8B', 'aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
