-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 06:28 AM
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
  `team` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_project`
--

INSERT INTO `data_project` (`id_project`, `title`, `description`, `deadline`, `status`, `file`, `team`, `id_user`) VALUES
(0, 'pemrograman web', 'membuat website php', '2020-12-03', 'finished', '', '2,6', 3),
(1, 'Web UPNVYK', 'Membuat web upnyk yang interaktif menarik dan mudah dibaca untuk keperluan informasi baik pihak dalam maupun luar kampus', '2020-12-24', 'ongoing', 'draf kegiatan.txt', '1,2', 1),
(20, 'struktur data', 'tugas linked list melingkar', '2020-12-16', 'ongoing', '', '1,2', 3),
(23, 'sistem digital', 'tugas aljabar boolean', '2020-12-17', 'ongoing', '', '1,2', 3),
(24, 'sisdig', 'tugas 1', '2020-12-14', 'ongoing', 'download.png', '1,2', 5),
(25, 'matdis', 'tugas 2', '2020-12-20', 'ongoing', 'download.png', '1,2', 5),
(26, 'strukdat', 'tugas 4\r\n', '2020-12-30', 'ongoing', 'download.png', '1,2', 5),
(30, 'praktikum web', 'membuat program php', '2020-12-02', 'finished', 'bla.jpg', '2,3', 3),
(31, 'wimaya', 'laporan makalah', '2020-11-14', 'finished', '', '1,2', 3),
(32, 'Web UPNVYK', 'Membuat web upnyk yang interaktif menarik dan mudah dibaca untuk keperluan informasi baik pihak dalam maupun luar kampus', '2020-12-04', 'finished', 'draf kegiatan.txt', '1,2', 3),
(33, 'bahasa indonesia', 'laporan membaca kritis', '2020-11-30', 'finished', 'Tugas 4.pptx', '1,2', 3),
(35, 'kalkulus', 'tugas integral', '2020-12-15', 'ongoing', 'Tugas 4.pptx', '1,2', 3),
(36, 'Project ITC', 'membuat website dengan ide work management', '2020-12-10', 'ongoing', 'db_workspace.sql', '1,2', 3);

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
(4, 'gisagisa', 'gisanimr10@gmail.com', 'blabla'),
(5, 'arif', 'arif@yahoo.com', 'ecab8f3fef93c06582df3049f8937c08'),
(6, 'arif', 'arifpribadi@gmail.com', 'd53d757c0f838ea49fb46e09cbcc3cb1');

-- --------------------------------------------------------

--
-- Table structure for table `db_pivot`
--

CREATE TABLE `db_pivot` (
  `id_pivot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id_pivot`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_proyek` (`id_proyek`);

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
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_pivot`
--
ALTER TABLE `db_pivot`
  MODIFY `id_pivot` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_pivot`
--
ALTER TABLE `db_pivot`
  ADD CONSTRAINT `db_pivot_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_pivot_ibfk_2` FOREIGN KEY (`id_proyek`) REFERENCES `db_proyek` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
