-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 05:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

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
