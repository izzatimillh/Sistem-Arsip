-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2019 at 09:33 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project_bidikmisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `pesan_id` int(11) NOT NULL,
  `pesan_waktu` datetime NOT NULL,
  `pesan_jenis_pengirim` varchar(20) NOT NULL,
  `pesan_id_pengirim` int(11) NOT NULL,
  `pesan_jenis_penerima` varchar(20) NOT NULL,
  `pesan_id_penerima` int(11) NOT NULL,
  `pesan_isi` text NOT NULL,
  `pesan_file` varchar(255) DEFAULT NULL,
  `pesan_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pesan_id`, `pesan_waktu`, `pesan_jenis_pengirim`, `pesan_id_pengirim`, `pesan_jenis_penerima`, `pesan_id_penerima`, `pesan_isi`, `pesan_file`, `pesan_read`) VALUES
(2, '2019-03-30 04:49:04', 'pengurus', 1, 'mahasiswa', 1, 'kwkw', '383797155f6585896b59598815886fd985cf4e321a0bee14.png', 0),
(3, '2019-03-30 04:57:57', 'pengurus', 1, 'mahasiswa', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 0),
(4, '2019-03-30 06:19:44', 'mahasiswa', 1, 'pengurus', 1, 'Halo pak. apakah bisa saya daftar lagi? kemarin error kepala saya', '436483780herbarium.sql', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`pesan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `pesan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
