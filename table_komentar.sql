-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2019 at 08:30 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project_bidikmisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(11) NOT NULL,
  `komentar_tanggal` date DEFAULT NULL,
  `komentar_jenis_pengguna` varchar(255) DEFAULT NULL,
  `komentar_id_pengguna` varchar(255) DEFAULT NULL,
  `komentar_artikel` int(11) DEFAULT NULL,
  `komentar_isi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `komentar_tanggal`, `komentar_jenis_pengguna`, `komentar_id_pengguna`, `komentar_artikel`, `komentar_isi`) VALUES
(2, '2019-03-29', 'mahasiswa', '1', 12, 'tasd'),
(3, '2019-03-29', 'mahasiswa', '1', 12, 'tes balas dong\r\n'),
(4, '2019-03-29', 'pengurus', '1', 12, 'tes'),
(5, '2019-03-29', 'pengurus', '1', 12, 'tes kiw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
