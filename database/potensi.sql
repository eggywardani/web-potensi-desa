-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 08:22 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `potensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pariwisata`
--

CREATE TABLE `pariwisata` (
  `id` int(10) NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `luas` int(10) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pariwisata`
--

INSERT INTO `pariwisata` (`id`, `lokasi`, `luas`, `jenis`, `status`) VALUES
(1, 'Sungai Jratun', 50000, 'Wisata Perahu', 'Desa'),
(2, 'Temulus', 72, 'Water Boom', 'Pribadi'),
(4, 'Jaja', 101, 'Wisata', 'Desa');

-- --------------------------------------------------------

--
-- Table structure for table `perikanan`
--

CREATE TABLE `perikanan` (
  `id` int(10) NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `luas` int(10) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perikanan`
--

INSERT INTO `perikanan` (`id`, `lokasi`, `luas`, `jenis`, `status`) VALUES
(1, 'Temulus', 1001, 'Kolam pancing', 'Pribadi');

-- --------------------------------------------------------

--
-- Table structure for table `pertanian`
--

CREATE TABLE `pertanian` (
  `id` int(10) NOT NULL,
  `wilayah` varchar(300) NOT NULL,
  `luas` int(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `prospek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanian`
--

INSERT INTO `pertanian` (`id`, `wilayah`, `luas`, `status`, `prospek`) VALUES
(1, 'Selatan', 2800, 'Pribadi', 'Tetap'),
(2, 'Utara', 2800, 'Pribadi', 'Tetap'),
(3, 'Utara', 8400, 'Desa', 'Kandang Ayam'),
(4, 'Utara', 50000, 'Desa', 'Tetap'),
(5, 'Utara', 80000, 'Desa', 'Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `peternakan`
--

CREATE TABLE `peternakan` (
  `id` int(10) NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peternakan`
--

INSERT INTO `peternakan` (`id`, `lokasi`, `jumlah`, `jenis`, `status`) VALUES
(1, 'Gandungan', 5600, 'Kambing', '25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('temulus', 'temulus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perikanan`
--
ALTER TABLE `perikanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanian`
--
ALTER TABLE `pertanian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peternakan`
--
ALTER TABLE `peternakan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pariwisata`
--
ALTER TABLE `pariwisata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perikanan`
--
ALTER TABLE `perikanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertanian`
--
ALTER TABLE `pertanian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peternakan`
--
ALTER TABLE `peternakan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
