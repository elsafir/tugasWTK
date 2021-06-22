-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3372
-- Generation Time: May 15, 2018 at 05:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bk`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `kode_layanan` char(3) DEFAULT NULL,
  `nama_layanan` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`kode_layanan`, `nama_layanan`) VALUES
('A01', 'Bimbingan Klasikal'),
('A02', 'Layanan Orientasi'),
('A03', 'Layanan Informasi'),
('A04', 'Bimbingan Kelompok'),
('A05', 'Layanan Pengumpulan Data'),
('B01', 'Konseling Individual'),
('B02', 'Konseling Kelompok'),
('B03', 'Konsultasi Guru'),
('B04', 'Konsultasi Orang Tua'),
('B05', 'Konsultasi Siswa'),
('B06', 'Kolaborasi Guru'),
('B07', 'Kolaborasi Orang Tua'),
('B08', 'Kolaborasi Siswa'),
('B09', 'Konferensi Kasus'),
('B10', 'Home Visit'),
('C01', 'Penilaian Individual/Kelompok'),
('C02', 'Layanan Konsultasi Hasil Penilaian Individual/Kelompok'),
('D01', 'Pengembangan Profesional'),
('D02', 'Manajemen Program'),
('D03', 'Layanan Kerjasama');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `idx` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nis` varchar(9) NOT NULL,
  `kode_layanan` char(3) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `uraian` text,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`idx`, `tanggal`, `nis`, `kode_layanan`, `tempat`, `uraian`, `keterangan`) VALUES
(1, '2016-01-15', '150300007', 'C01', 'Kelas 12 TEI 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(1, '2016-01-15', '150300025', 'C01', 'Kelas 12 TEI 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(2, '2016-01-18', '150200004', 'B02', 'Ruangan BK', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(2, '2016-01-18', '150200014', 'B02', 'Ruangan BK', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(3, '2017-01-07', '150200032', 'B01', 'Ruangan BK', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(4, '2017-02-04', '150300034', 'A01', 'Ruangan BK', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ''),
(5, '2017-04-21', '150100021', 'D03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(5, '2017-04-21', '150300045', 'D03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(6, '2017-08-15', '150100038', 'B10', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(6, '2017-08-15', '150300017', 'B10', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(7, '2017-08-21', '150200022', 'B06', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(7, '2017-08-21', '170200041', 'B06', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(8, '2017-09-07', '160300045', 'D01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ''),
(8, '2017-09-07', '160200032', 'D01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ''),
(9, '2017-10-09', '160100001', 'A04', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(9, '2017-10-09', '160100003', 'A04', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(9, '2017-10-09', '160100002', 'A04', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(11, '2017-11-04', '150200004', 'B01', 'Ruangan BK', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(10, '2017-10-14', '150100001', 'A03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(10, '2017-10-14', '150300008', 'A03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(12, '2017-11-15', '160200032', 'D01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(13, '2017-11-29', '150200004', 'B08', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(13, '2017-11-29', '160200032', 'B08', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(13, '2017-11-29', '150200032', 'B08', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(14, '2017-12-09', '160300017', 'C02', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(14, '2017-12-09', '170100001', 'C02', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(15, '2017-12-09', '170100039', 'D03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(15, '2017-12-09', '170100029', 'D03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(16, '2017-12-20', '160100003', 'A02', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(17, '2017-12-22', '160200004', 'C01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(17, '2017-12-22', '160200013', 'C01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(17, '2017-12-22', '160200014', 'C01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(18, '2017-12-26', '150300008', 'D02', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(18, '2017-12-26', '150300018', 'D02', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(18, '2017-12-26', '150300035', 'D02', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(19, '2017-12-28', '160300008', 'A01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(19, '2017-12-28', '160300016', 'A01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(20, '2017-12-29', '170100003', 'A05', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(20, '2017-12-29', '170100010', 'A05', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem'),
(21, '2018-01-02', '150200032', 'C01', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum'),
(22, '2018-01-05', '150300045', 'D03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(22, '2018-01-05', '150100021', 'D03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(22, '2018-01-05', '150300027', 'D03', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(23, '2018-01-15', '150200004', 'A04', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(23, '2018-01-15', '150200032', 'A04', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet,'),
(24, '2018-01-15', '160200032', 'B10', 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet'),
(25, '2018-04-21', '150200004', 'C01', 'Test', 'Test Test Test Test', 'Test Test');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tingkat` int(2) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kk` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `tingkat`, `kelas`, `kk`) VALUES
('150100001', 'Asmuni Gunawan ', 12, '12 TMM 1', 'TMM'),
('150100002', 'Qori Padmasari', 12, '12 TMM 2', 'TMM'),
('150100003', 'Alika Wulandari', 12, '12 TMM 3', 'TMM'),
('150100010', 'Ade Yolanda', 12, '12 TMM 1', 'TMM'),
('150100011', 'Wirda Nuraini', 12, '12 TMM 2', 'TMM'),
('150100012', 'Bagya Pangestu', 12, '12 TMM 3', 'TMM'),
('150100019', 'Devi Yessi Nurdiyanti ', 12, '12 TMM 1', 'TMM'),
('150100020', 'Usyi Handayani', 12, '12 TMM 2', 'TMM'),
('150100021', 'Ragan Paramarta', 12, '12 TMM 3', 'TMM'),
('150100028', 'Cengkal Kusuma Prasasta ', 12, '12 TMM 1', 'TMM'),
('150100029', 'Ratna Yuni Wahyuni', 12, '12 TMM 2', 'TMM'),
('150100030', 'Yani Mulyani', 12, '12 TMM 3', 'TMM'),
('150100037', 'Kezia Laksmiwati ', 12, '12 TMM 1', 'TMM'),
('150100038', 'Sandia Firmansyah', 12, '12 TMM 2', 'TMM'),
('150100039', 'Usyi Sudiati', 12, '12 TMM 3', 'TMM'),
('150200004', 'Budiman Fajar Firdaus', 12, '12 TKJ 1', 'TKJ'),
('150200005', 'Radika Sihombing ', 12, '12 TKJ 2', 'TKJ'),
('150200006', 'Asmuni Sihombing', 12, '12 TKJ 3', 'TKJ'),
('150200013', 'Radit Prayoga', 12, '12 TKJ 1', 'TKJ'),
('150200014', 'Keisha Lestari ', 12, '12 TKJ 2', 'TKJ'),
('150200015', 'Cahyo Pradana', 12, '12 TKJ 3', 'TKJ'),
('150200022', 'Yadi Setiawan', 12, '12 TKJ 1', 'TKJ'),
('150200023', 'Gilda Nadine Hartati', 12, '12 TKJ 2', 'TKJ'),
('150200024', 'Endra Sinaga', 12, '12 TKJ 3', 'TKJ'),
('150200031', 'Almira Lestari', 12, '12 TKJ 1', 'TKJ'),
('150200032', 'Ibnu Syina', 12, '12 TKJ 2', 'TKJ'),
('150200033', 'Tri Iswahyudi', 12, '12 TKJ 3', 'TKJ'),
('150200040', 'Almira Puspasari', 12, '12 TKJ 1', 'TKJ'),
('150200041', 'Erik Zulkarnain', 12, '12 TKJ 2', 'TKJ'),
('150200042', 'Ghaliyati Widiastuti', 12, '12 TKJ 3', 'TKJ'),
('150300007', 'Umam Luqman', 12, '12 TEI 1', 'TEI'),
('150300008', 'Simon Martana Tamba', 12, '12 TEI 2', 'TEI'),
('150300009', 'Nadine Yulianti', 12, '12 TEI 3', 'TEI'),
('150300016', 'Oman Tirta Waluyo ', 12, '12 TEI 1', 'TEI'),
('150300017', 'Hafshah Hassanah ', 12, '12 TEI 2', 'TEI'),
('150300018', 'Ella Lidya Farida ', 12, '12 TEI 3', 'TEI'),
('150300025', 'Elvin Latupono ', 12, '12 TEI 1', 'TEI'),
('150300026', 'Banara Sihombing', 12, '12 TEI 2', 'TEI'),
('150300027', 'Muhammad Hakim', 12, '12 TEI 3', 'TEI'),
('150300034', 'Ibrani Mahesa Prakasa', 12, '12 TEI 1', 'TEI'),
('150300035', 'Asirwanda Halim', 12, '12 TEI 2', 'TEI'),
('150300036', 'Karsana Gading Wijaya', 12, '12 TEI 3', 'TEI'),
('150300043', 'Citra Padmasari', 12, '12 TEI 1', 'TEI'),
('150300044', 'Widya Safitri', 12, '12 TEI 2', 'TEI'),
('150300045', 'Rifki Zulfiqor', 12, '12 TEI 3', 'TEI'),
('160100001', 'Vicky Yolanda', 11, '11 TMM 1', 'TMM'),
('160100002', 'Jamil Lazuardi ', 11, '11 TMM 2', 'TMM'),
('160100003', 'Yance Farida', 11, '11 TMM 3', 'TMM'),
('160100010', 'Mulyanto Virman Tampubolon ', 11, '11 TMM 1', 'TMM'),
('160100011', 'Salwa Hamima Handayani ', 11, '11 TMM 2', 'TMM'),
('160100012', 'Luthfi Dasa Tamba ', 11, '11 TMM 3', 'TMM'),
('160100019', 'Vivi Novitasari', 11, '11 TMM 1', 'TMM'),
('160100020', 'Vera Suryatmi ', 11, '11 TMM 2', 'TMM'),
('160100021', 'Rahayu Agustina', 11, '11 TMM 3', 'TMM'),
('160100028', 'Dimas Wibowo', 11, '11 TMM 1', 'TMM'),
('160100029', 'Bahuwarna Siregar', 11, '11 TMM 2', 'TMM'),
('160100030', 'Galih Sitompul ', 11, '11 TMM 3', 'TMM'),
('160100037', 'Jasmin Halimah', 11, '11 TMM 1', 'TMM'),
('160100038', 'Siti Mulyani', 11, '11 TMM 2', 'TMM'),
('160100039', 'Bajragin Bakianto Siregar ', 11, '11 TMM 3', 'TMM'),
('160200004', 'Daniswara Saputra ', 11, '11 TKJ 1', 'TKJ'),
('160200005', 'Rafi Januar', 11, '11 TKJ 2', 'TKJ'),
('160200006', 'Soleh Artanto Jailani', 11, '11 TKJ 3', 'TKJ'),
('160200013', 'Nilam Anggraini', 11, '11 TKJ 1', 'TKJ'),
('160200014', 'Rahayu Yulianti', 11, '11 TKJ 2', 'TKJ'),
('160200015', 'Chandra Among Budiman', 11, '11 TKJ 3', 'TKJ'),
('160200022', 'Cinthia Aryani ', 11, '11 TKJ 1', 'TKJ'),
('160200023', 'Cahyono Lazuardi', 11, '11 TKJ 2', 'TKJ'),
('160200024', 'Najwa Elvina Nurdiyanti ', 11, '11 TKJ 3', 'TKJ'),
('160200031', 'Anastasia Puspa Prastuti ', 11, '11 TKJ 1', 'TKJ'),
('160200032', 'Santi', 11, '11 TKJ 2', 'TKJ'),
('160200033', 'Talia Karimah Laksmiwati', 11, '11 TKJ 3', 'TKJ'),
('160200040', 'Lili Hamima Yuniar', 11, '11 TKJ 1', 'TKJ'),
('160200041', 'Capa Mansur', 11, '11 TKJ 2', 'TKJ'),
('160200042', 'Erik Martana Sirait', 11, '11 TKJ 3', 'TKJ'),
('160300007', 'Nyana Tasdik Pradana ', 11, '11 TEI 1', 'TEI'),
('160300008', 'Puspa Kusmawati ', 11, '11 TEI 2', 'TEI'),
('160300009', 'Diah Nasyidah', 11, '11 TEI 3', 'TEI'),
('160300016', 'Keisha Palastri', 11, '11 TEI 1', 'TEI'),
('160300017', 'Anita Astuti ', 11, '11 TEI 2', 'TEI'),
('160300018', 'Janet Laksmiwati', 11, '11 TEI 3', 'TEI'),
('160300025', 'Rahmi Farida ', 11, '11 TEI 1', 'TEI'),
('160300026', 'Galih Saptono', 11, '11 TEI 2', 'TEI'),
('160300027', 'Mahdi Iswahyudi', 11, '11 TEI 3', 'TEI'),
('160300034', 'Zaenab Utami ', 11, '11 TEI 1', 'TEI'),
('160300035', 'Violet Fujiati', 11, '11 TEI 2', 'TEI'),
('160300036', 'Anastasia Vivi Rahmawati', 11, '11 TEI 3', 'TEI'),
('160300043', 'Elisa Usada', 11, '11 TEI 1', 'TEI'),
('160300044', 'Maida Diah Purwanti ', 11, '11 TEI 2', 'TEI'),
('160300045', 'Kerin Sri Wahyuni', 11, '11 TEI 3', 'TEI'),
('170100001', 'Maya Calista Halimah', 10, '10 TMM 1', 'TMM'),
('170100002', 'Nalar Pangestu', 10, '10 TMM 2', 'TMM'),
('170100003', 'Ivan Mitra Nugroho', 10, '10 TMM 3', 'TMM'),
('170100010', 'Baktiono Tarihoran', 10, '10 TMM 1', 'TMM'),
('170100011', 'Galar Prasetyo Wijaya', 10, '10 TMM 2', 'TMM'),
('170100012', 'Rika Cornelia Pratiwi ', 10, '10 TMM 3', 'TMM'),
('170100019', 'Faizah Namaga', 10, '10 TMM 1', 'TMM'),
('170100020', 'Ulya Anggraini', 10, '10 TMM 2', 'TMM'),
('170100021', 'Dipa Tampubolon', 10, '10 TMM 3', 'TMM'),
('170100028', 'Manah Digdaya Wacana', 10, '10 TMM 1', 'TMM'),
('170100029', 'Belinda Wastuti', 10, '10 TMM 2', 'TMM'),
('170100030', 'Darijan Saptono ', 10, '10 TMM 3', 'TMM'),
('170100037', 'Bajragin Damanik', 10, '10 TMM 1', 'TMM'),
('170100038', 'Irnanto Maryanto Tarihoran', 10, '10 TMM 2', 'TMM'),
('170100039', 'Tania Nuraini', 10, '10 TMM 3', 'TMM'),
('170200004', 'Cakrawangsa Putra', 10, '10 TKJ 1', 'TKJ'),
('170200005', 'Kalim Irawan ', 10, '10 TKJ 2', 'TKJ'),
('170200006', 'Zelaya Anggraini ', 10, '10 TKJ 3', 'TKJ'),
('170200013', 'Muhammad Rajasa', 10, '10 TKJ 1', 'TKJ'),
('170200014', 'Pardi Pradipta ', 10, '10 TKJ 2', 'TKJ'),
('170200015', 'Danuja Wahyudin', 10, '10 TKJ 3', 'TKJ'),
('170200022', 'Maryanto Firgantoro ', 10, '10 TKJ 1', 'TKJ'),
('170200023', 'Capa Dadap Nainggolan ', 10, '10 TKJ 2', 'TKJ'),
('170200024', 'Gabriella Hastuti', 10, '10 TKJ 3', 'TKJ'),
('170200031', 'Gaiman Lazuardi', 10, '10 TKJ 1', 'TKJ'),
('170200032', 'Wani Hariyah', 10, '10 TKJ 2', 'TKJ'),
('170200033', 'Devi Mandasari', 10, '10 TKJ 3', 'TKJ'),
('170200040', 'Vinsen Haryanto ', 10, '10 TKJ 1', 'TKJ'),
('170200041', 'Cahyadi Baktiono Latupono', 10, '10 TKJ 2', 'TKJ'),
('170200042', 'Eja Dongoran ', 10, '10 TKJ 3', 'TKJ'),
('170300007', 'Lukman Luthfi Narpati ', 10, '10 TEI 1', 'TEI'),
('170300008', 'Saadat Bahuwarna Pangestu ', 10, '10 TEI 2', 'TEI'),
('170300009', 'Martani Sinaga', 10, '10 TEI 3', 'TEI'),
('170300016', 'Empluk Setiawan', 10, '10 TEI 1', 'TEI'),
('170300017', 'Jayeng Hutagalung ', 10, '10 TEI 2', 'TEI'),
('170300018', 'Virman Karta Dongoran ', 10, '10 TEI 3', 'TEI'),
('170300025', 'Makuta Daniswara Thamrin', 10, '10 TEI 1', 'TEI'),
('170300026', 'Johan Prakosa Irawan', 10, '10 TEI 2', 'TEI'),
('170300027', 'Wage Lurhur Firmansyah ', 10, '10 TEI 3', 'TEI'),
('170300034', 'Paramita Rahayu', 10, '10 TEI 1', 'TEI'),
('170300035', 'Cengkir Nashiruddin ', 10, '10 TEI 2', 'TEI'),
('170300036', 'Dartono Saptono', 10, '10 TEI 3', 'TEI'),
('170300043', 'Paramita Puspita', 10, '10 TEI 1', 'TEI'),
('170300044', 'Caraka Winarno ', 10, '10 TEI 2', 'TEI'),
('170300045', 'Cahyo Suryono ', 10, '10 TEI 3', 'TEI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('Administrator', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
