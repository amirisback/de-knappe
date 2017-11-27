-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 04:06 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deknappe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `alamat_guru` varchar(30) NOT NULL,
  `gender_guru` varchar(30) NOT NULL,
  `telp_guru` varchar(16) NOT NULL,
  `email_guru` varchar(30) NOT NULL,
  `id_mapel` varchar(3) NOT NULL,
  `foto_guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `password`, `nama_guru`, `alamat_guru`, `gender_guru`, `telp_guru`, `email_guru`, `id_mapel`, `foto_guru`) VALUES
(1111, '1111', 'Pika Antias', 'Bandung', 'Perempuan', '812345670981', 'pika@gmail.com', 'MAT', '115411deste.jpg'),
(1212, '1212', 'Jowo', 'Jowo', 'Laki - Laki', '081231241231', 'jowo@gmail.com', 'BJW', 'G1.png\r\n'),
(2222, '2222', 'Dadang, S.Pd.', 'Bandung', 'Laki-Laki', '81234567098', 'dadangs@gmail.com', 'BIN', '20553920.JPG'),
(3333, '3333', 'Udin, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIG', 'G1.png'),
(4444, '4444', 'Doyok, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'FIS', 'G1.png'),
(5555, '5555', 'Torik, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'KIM', 'G1.png'),
(6666, '6666', 'Bimo, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIO', 'G1.png');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(3) NOT NULL,
  `nama_mapel` varchar(15) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `kkm` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `jurusan`, `kkm`) VALUES
('BIG', 'B.Inggris', 'ALL', 70),
('BIN', 'B.Indonesia', 'ALL', 70),
('BIO', 'Biologi', 'MIA', 70),
('BJW', 'Bahasa Jawa', 'ALL', 65),
('EKO', 'Ekonomi', 'IIS', 70),
('FIS', 'Fisika', 'MIA', 70),
('GEO', 'Geografi', 'IIS', 70),
('KIM', 'Kimia', 'MIA', 70),
('MAT', 'Matematika', 'ALL', 70),
('SOS', 'Sosiologi', 'IIS', 70);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(255) NOT NULL,
  `id_siswa` int(15) NOT NULL,
  `id_mapel` varchar(3) NOT NULL,
  `id_remedi` varchar(4) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_mapel`, `id_remedi`, `nilai`) VALUES
(1, 11762, 'BIG', 'UAS', 80),
(3, 11762, 'BIG', 'UTS', 70),
(6, 11762, 'BIO', 'UAS', 80),
(8, 11762, 'BIO', 'UH1', 70),
(9, 11762, 'BIO', 'UTS', 70),
(10, 11762, 'BIO', 'UH2', 50),
(11, 11762, 'BIG', 'UH1', 90),
(13, 11762, 'FIS', 'UAS', 90),
(14, 11762, 'MAT', 'UH1', 90),
(15, 11762, 'MAT', 'UTS', 90),
(16, 11762, 'BIN', 'UAS', 90),
(17, 11762, 'KIM', 'UAS', 90),
(18, 9090, 'MAT', 'UTS', 90),
(19, 11762, 'MAT', 'UAS', 70),
(20, 1112, 'MAT', 'UAS', 33);

-- --------------------------------------------------------

--
-- Table structure for table `remedi`
--

CREATE TABLE `remedi` (
  `id_remedi` varchar(4) NOT NULL,
  `remedi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remedi`
--

INSERT INTO `remedi` (`id_remedi`, `remedi`) VALUES
('UAS', 'Ulangan Akhir Semester'),
('UH1', 'Ulangan Harian 1'),
('UH2', 'Ulangan Harian 2'),
('UH3', 'Ulangan Harian 3'),
('UTS', 'Ulangan Tengah Semester');

-- --------------------------------------------------------

--
-- Table structure for table `set_remedi`
--

CREATE TABLE `set_remedi` (
  `id_set_remedi` int(255) NOT NULL,
  `kode_remedi` varchar(25) NOT NULL,
  `id_mapel` varchar(3) NOT NULL,
  `id_remedi` varchar(4) NOT NULL,
  `kelas` int(3) NOT NULL,
  `jam_mulai` int(4) NOT NULL,
  `menit_mulai` int(4) NOT NULL,
  `durasi` int(4) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_remedi`
--

INSERT INTO `set_remedi` (`id_set_remedi`, `kode_remedi`, `id_mapel`, `id_remedi`, `kelas`, `jam_mulai`, `menit_mulai`, `durasi`, `tanggal`) VALUES
(9, '9999', 'BIG', 'UAS', 10, 20, 0, 45, '2017-04-23'),
(10, 'duste', 'MAT', 'UH1', 10, 21, 15, 45, '2017-03-24'),
(11, 'amir', 'MAT', 'UAS', 10, 15, 15, 120, '2017-04-24'),
(12, 'go', 'BIN', 'UAS', 10, 20, 20, 45, '2017-04-24'),
(13, 'remedibio', 'BIO', 'UH1', 10, 16, 41, 45, '2017-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(15) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `alamat_siswa` varchar(30) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender_siswa` varchar(30) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `foto_siswa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `password`, `nama_siswa`, `jurusan`, `kelas`, `alamat_siswa`, `tempat_lahir`, `tanggal_lahir`, `gender_siswa`, `no_telp`, `foto_siswa`) VALUES
(1112, '1112', 'Aldi Ramdani', 'MIA', '10', 'Bandung', 'Bandung', '2017-04-26', 'Laki-Laki', '09127312412312', '115458316453.jpg'),
(8080, '8080', 'Krisna Setiawan', 'MIA', '10', 'Bandung', 'Bandung', '2017-04-21', 'Laki-Laki', '8123241234', '194053400k RESOLUTIOIN.jpg'),
(9090, '9090', 'Saiful ApriyantoS', 'MIA', '10', 'Sukoharjo', 'Sukoharjo', '2017-04-06', 'Laki-Laki', '81357108568', '211855194952.jpg'),
(11762, '11762', 'Muhammad Faisal Amir', 'MIA', '10', 'Probolinggo', 'Probolinggo', '1997-05-30', 'Laki-Laki', '81357108568', '12105618_Amir-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `no_soal` int(4) NOT NULL,
  `id_mapel` varchar(3) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `id_remedi` varchar(4) NOT NULL,
  `soal` varchar(10000) NOT NULL,
  `pil_a` varchar(500) NOT NULL,
  `pil_b` varchar(500) NOT NULL,
  `pil_c` varchar(500) NOT NULL,
  `pil_d` varchar(500) NOT NULL,
  `jawaban` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`no_soal`, `id_mapel`, `kelas`, `id_remedi`, `soal`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `jawaban`) VALUES
(211, 'BIG', '10', 'UAS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(212, 'BIG', '10', 'UAS', 'Apa kepanjangan b.ing?', 'Pelajaran', 'Ilmu', 'bahasainggris', 'Jajan', 'c'),
(213, 'BIG', '10', 'UAS', 'berapa nilai bahasa inggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'seratus', 'd'),
(214, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(215, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(216, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(217, 'BIG', '10', 'UH2', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(218, 'BIG', '10', 'UH2', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(219, 'BIG', '10', 'UH2', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(220, 'BIG', '10', 'UTS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(221, 'BIG', '10', 'UTS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(222, 'BIG', '10', 'UTS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(223, 'BIG', '10', 'UAS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(224, 'BIG', '10', 'UAS', 'Apa kepanjangan b.ing?', 'Pelajaran', 'Ilmu', 'bahasainggris', 'Jajan', 'c'),
(225, 'BIG', '10', 'UAS', 'berapa nilai bahasa inggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'seratus', 'd'),
(226, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(227, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(228, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(229, 'BIG', '10', 'UH2', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(230, 'BIG', '10', 'UH2', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(231, 'BIG', '10', 'UH2', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(232, 'BIG', '10', 'UTS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(233, 'BIG', '10', 'UTS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(234, 'BIG', '10', 'UTS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(235, 'BIN', '10', 'UAS', 'Duste Duste??', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(236, 'BIN', '10', 'UAS', 'Apa itu bahasaindonesia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(237, 'BIN', '10', 'UAS', 'bahasa indonesia', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(238, 'BIN', '10', 'UH1', 'Apa itu bahasaindonesia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(239, 'BIN', '10', 'UH1', 'Apa itu bah  donesia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(240, 'BIN', '10', 'UH1', 'Apa itu bahasaindonesia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(241, 'BIN', '10', 'UH2', 'Apa itu bahasaindonesia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(242, 'BIN', '10', 'UH2', 'Apa itu bahasaindonesia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(246, 'BIN', '10', 'UTS', 'Apa itu bahasaindonesia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(247, 'BIO', '10', 'UAS', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(248, 'BIO', '10', 'UAS', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(249, 'BIO', '10', 'UAS', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(250, 'BIO', '10', 'UH1', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(251, 'BIO', '10', 'UH1', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(252, 'BIO', '10', 'UH1', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(253, 'BIO', '10', 'UH2', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(254, 'BIO', '10', 'UH2', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(255, 'BIO', '10', 'UH2', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(256, 'BIO', '10', 'UTS', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(257, 'BIO', '10', 'UTS', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(258, 'BIO', '10', 'UTS', 'Apa itu Biologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(259, 'EKO', '10', 'UAS', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(260, 'EKO', '10', 'UAS', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(261, 'EKO', '10', 'UAS', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(262, 'EKO', '10', 'UH1', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(263, 'EKO', '10', 'UH1', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(264, 'EKO', '10', 'UH1', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(265, 'EKO', '10', 'UH2', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(266, 'EKO', '10', 'UH2', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(267, 'EKO', '10', 'UH2', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(268, 'EKO', '10', 'UTS', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(269, 'EKO', '10', 'UTS', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(270, 'EKO', '10', 'UTS', 'Apa itu ekonomi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(271, 'FIS', '10', 'UAS', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(272, 'FIS', '10', 'UAS', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(273, 'FIS', '10', 'UAS', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(274, 'FIS', '10', 'UH1', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(275, 'FIS', '10', 'UH1', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(276, 'FIS', '10', 'UH1', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(277, 'FIS', '10', 'UH2', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(278, 'FIS', '10', 'UH2', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(279, 'FIS', '10', 'UH2', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(280, 'FIS', '10', 'UTS', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(281, 'FIS', '10', 'UTS', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(282, 'FIS', '10', 'UTS', 'Apa itu fisika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(283, 'GEO', '10', 'UAS', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(284, 'GEO', '10', 'UAS', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(285, 'GEO', '10', 'UAS', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(286, 'GEO', '10', 'UH1', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(287, 'GEO', '10', 'UH1', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(288, 'GEO', '10', 'UH1', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(289, 'GEO', '10', 'UH2', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(290, 'GEO', '10', 'UH2', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(291, 'GEO', '10', 'UH2', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(292, 'GEO', '10', 'UTS', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(293, 'GEO', '10', 'UTS', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(294, 'GEO', '10', 'UTS', 'Apa itu geografi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(295, 'KIM', '10', 'UAS', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(296, 'KIM', '10', 'UAS', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(297, 'KIM', '10', 'UAS', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(298, 'KIM', '10', 'UH1', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(299, 'KIM', '10', 'UH1', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(300, 'KIM', '10', 'UH1', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(301, 'KIM', '10', 'UH2', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(302, 'KIM', '10', 'UH2', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(303, 'KIM', '10', 'UH2', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(304, 'KIM', '10', 'UTS', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(305, 'KIM', '10', 'UTS', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(306, 'KIM', '10', 'UTS', 'Apa itu kimia ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(307, 'MAT', '10', 'UAS', 'Duste Duste?.....', 'Pelajaran', 'Ilmu', 'Makananaaa', 'Jajan', 'a'),
(309, 'MAT', '10', 'UAS', 'Apa itu matematika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(312, 'MAT', '10', 'UH1', 'Apa itu matematika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(315, 'MAT', '10', 'UH2', 'Apa itu matematika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(316, 'MAT', '10', 'UTS', 'Apa itu matematika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(318, 'MAT', '10', 'UTS', 'Apa itu matematika ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(319, 'SOS', '10', 'UAS', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(320, 'SOS', '10', 'UAS', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(321, 'SOS', '10', 'UAS', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(322, 'SOS', '10', 'UH1', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(323, 'SOS', '10', 'UH1', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(324, 'SOS', '10', 'UH1', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(325, 'SOS', '10', 'UH2', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(326, 'SOS', '10', 'UH2', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd'),
(327, 'SOS', '10', 'UH2', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(328, 'SOS', '10', 'UTS', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(329, 'SOS', '10', 'UTS', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'c'),
(330, 'SOS', '10', 'UTS', 'Apa itu sosiologi ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(331, '', '10', 'UH1', 'FUCK BIN', 'ole', 'ole', 'ole', 'ole', 'a'),
(332, 'MAT', '10', 'UAS', 'asdadasda', 'asda', 'asdasa', 'asda', 'asdasd', 'a'),
(333, 'MAT', '10', 'UAS', 'asdasd', 'asdasda', 'asdasd', 'asdasd', 'adasdasd', 'a'),
(334, 'MAT', '10', 'UAS', 'asdasd', 'asdasdasd', 'asdasdas', 'asdasd', 'asdasdasd', 'a'),
(335, 'MAT', '10', 'UAS', 'ALDI ITU gimana', 'RAMDANI', 'GANTENG', 'JELEK', 'LUCU', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `kode_remedi` (`id_remedi`);

--
-- Indexes for table `remedi`
--
ALTER TABLE `remedi`
  ADD PRIMARY KEY (`id_remedi`);

--
-- Indexes for table `set_remedi`
--
ALTER TABLE `set_remedi`
  ADD PRIMARY KEY (`id_set_remedi`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_remedi` (`id_remedi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`no_soal`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_remedi` (`id_remedi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `set_remedi`
--
ALTER TABLE `set_remedi`
  MODIFY `id_set_remedi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `no_soal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_remedi`) REFERENCES `remedi` (`id_remedi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `set_remedi`
--
ALTER TABLE `set_remedi`
  ADD CONSTRAINT `set_remedi_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `set_remedi_ibfk_2` FOREIGN KEY (`id_remedi`) REFERENCES `remedi` (`id_remedi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
