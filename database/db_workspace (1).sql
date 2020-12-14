-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 05:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_workspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_project`
--

CREATE TABLE `data_project` (
  `id_project` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `deadline` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_project`
--

INSERT INTO `data_project` (`id_project`, `title`, `description`, `deadline`, `status`, `file`, `id_user`) VALUES
(1, 'Web UPNVYK', 'Membuat web upnyk yang interaktif menarik dan mudah dibaca untuk keperluan informasi baik pihak dalam maupun luar kampus', '2020-12-24', 'ongoing', 'draf kegiatan.txt', 1),
(20, 'struktur data', 'tugas linked list array', '2020-12-13', 'ongoing', '123190038_GisaniMR_D_TugasPetaKarnaugh.pdf', 3),
(23, 'sistem digital', 'tugas aljabar boolean', '2020-12-13', 'finished', '123190038.pdf', 3),
(24, 'sisdig', 'tugas 1', '2020-12-14', 'ongoing', 'download.png', 5),
(25, 'matdis', 'tugas 2', '2020-12-20', 'ongoing', 'download.png', 5),
(26, 'strukdat', 'tugas 4\r\n', '2020-12-30', 'ongoing', 'download.png', 5),
(30, 'praktikum web', 'membuat program php', '2020-12-02', 'finished', 'bla.jpg', 3),
(31, 'wimaya', 'laporan makalah', '2020-11-14', 'finished', '', 3),
(32, 'Web UPNVYK', 'Membuat web upnyk yang interaktif menarik dan mudah dibaca untuk keperluan informasi baik pihak dalam maupun luar kampus', '2020-12-04', 'finished', 'draf kegiatan.txt', 3),
(33, 'bahasa indonesia', 'laporan membaca kritis artikel jurnal', '2020-12-02', 'finished', 'Tugas 4.pptx', 3),
(36, 'Project ITC', 'membuat website dengan ide work management', '2020-12-10', 'finished', 'db_workspace.sql', 3),
(82, 'matematika diskrit', 'tugas matematika diskrit sebelum ujian', '2020-12-12', 'finished', 'E_123190038_GisaniMR_tugas_linkedlistArray.pdf', 3),
(121, 'kalkulus', 'tugas integral 3', '2021-01-08', 'ongoing', '123190014_AnnasA_TugasP9.pdf', 3),
(127, 'Workspace', 'membuat website', '2021-01-13', 'ongoing', 'Tugas kelas D.pptx', 3),
(128, 'sisem digital', 'tugas peta karnaugh dengan maxterm', '2021-01-01', 'ongoing', '123190014_AnnasA_TugasP9.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `nama_lengkap`, `alamat_email`, `password`) VALUES
(1, 'ilham', 'ilhamhehe@gmail.com', '6590cb8139924b29d689133b86986f72'),
(2, 'muhamad iskhak', 'iskhakmuh@gmail.com', '6590cb8139924b29d689133b86986f72'),
(3, 'gisa', 'gisanimr1010@gmail.com', '20b5228e7c555c54c7f0991828f0752c'),
(5, 'arif pribadi', 'arif@yahoo.com', 'ecab8f3fef93c06582df3049f8937c08'),
(6, 'arif', 'arifpribadi@gmail.com', 'd53d757c0f838ea49fb46e09cbcc3cb1'),
(11, 'bayu', 'bayu@gmail.com', '92360c2c392c85b23f38c188996f8d74'),
(12, 'nabila', 'nabila@gmail.com', '9c8aaad368f10f55699450d759a72501'),
(13, 'feri', 'feri@gmail.com', 'd25ecbc660ab7bdd1a770fdb2db15c9c'),
(14, 'faris', 'faris@gmail.com', 'c73f227db1b523334ea3aef35bf06af8');

-- --------------------------------------------------------

--
-- Table structure for table `db_pivot`
--

CREATE TABLE `db_pivot` (
  `id_pivot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_pivot`
--

INSERT INTO `db_pivot` (`id_pivot`, `id_user`, `id_proyek`) VALUES
(21, 1, 1),
(22, 3, 1),
(24, 11, 20),
(25, 5, 20),
(27, 1, 23),
(28, 6, 23),
(29, 3, 23),
(30, 4, 24),
(31, 2, 24),
(32, 6, 24),
(33, 2, 25),
(34, 5, 25),
(35, 1, 25),
(36, 6, 25),
(37, 12, 26),
(38, 13, 26),
(39, 14, 26),
(45, 11, 30),
(46, 6, 30),
(47, 1, 30),
(48, 12, 31),
(49, 2, 31),
(50, 1, 31),
(51, 13, 32),
(52, 1, 32),
(53, 11, 32),
(54, 13, 33),
(55, 14, 33),
(56, 12, 33),
(57, 5, 36),
(58, 14, 36),
(59, 1, 36),
(60, 11, 82),
(61, 13, 82),
(62, 14, 82),
(63, 2, 121),
(74, 14, 123),
(75, 3, 124),
(76, 2, 124),
(77, 5, 124),
(79, 13, 123),
(80, 12, 123),
(82, 5, 125),
(83, 13, 125),
(84, 12, 125),
(85, 12, 121),
(86, 14, 121),
(89, 12, 126),
(90, 13, 126),
(99, 2, 126),
(103, 13, 127),
(106, 11, 127),
(107, 2, 127),
(108, 12, 127),
(109, 2, 128),
(110, 12, 128),
(111, 13, 128),
(113, 14, 20),
(114, 11, 33),
(115, 5, 129),
(116, 2, 129),
(117, 12, 129),
(119, 13, 130),
(121, 11, 130);

-- --------------------------------------------------------

--
-- Table structure for table `db_proyek`
--

CREATE TABLE `db_proyek` (
  `id_proyek` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `tanggal_deadline` datetime NOT NULL,
  `dokumen` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_proyek`
--

INSERT INTO `db_proyek` (`id_proyek`, `judul`, `deskripsi`, `tanggal_deadline`, `dokumen`, `status`) VALUES
(5, 'matematika_diskrit', 'tugas 2', '2020-10-21 21:12:10', 'yutuh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id_user`, `nama_user`, `email_user`, `password`) VALUES
(1, 'arif pribadi', 'arifarif@gmail.com', 'arifpribadi16'),
(3, 'gisani', 'gisanimr1010@gmail.com', 'gisanimrah');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_project`
--
ALTER TABLE `data_project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_pivot`
--
ALTER TABLE `db_pivot`
  ADD PRIMARY KEY (`id_pivot`);

--
-- Indexes for table `db_proyek`
--
ALTER TABLE `db_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_project`
--
ALTER TABLE `data_project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `db_pivot`
--
ALTER TABLE `db_pivot`
  MODIFY `id_pivot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `db_proyek`
--
ALTER TABLE `db_proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
