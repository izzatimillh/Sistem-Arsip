-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 09:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_bidikmisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_kegiatan`
--

CREATE TABLE `absen_kegiatan` (
  `absen_id` int(11) NOT NULL,
  `absen_tanggal` date DEFAULT NULL,
  `absen_mahasiswa` varchar(255) DEFAULT NULL,
  `absen_kegiatan` varchar(255) DEFAULT NULL,
  `absen_keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(11) NOT NULL,
  `artikel_tanggal` date DEFAULT NULL,
  `artikel_judul` varchar(255) DEFAULT NULL,
  `artikel_kategori` varchar(255) DEFAULT NULL,
  `artikel_konten` text,
  `artikel_sampul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `halaman_id` int(11) NOT NULL,
  `halaman_judul` varchar(255) DEFAULT NULL,
  `halaman_sampul` varchar(255) DEFAULT NULL,
  `halaman_konten` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kegiatan_id` int(11) NOT NULL,
  `kegiatan_judul` varchar(255) DEFAULT NULL,
  `kegiatan_tanggal` date DEFAULT NULL,
  `kegiatan_keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(11) NOT NULL,
  `komentar_tanggal` date DEFAULT NULL,
  `komentar_jenis_pengguna` varchar(255) DEFAULT NULL,
  `komentar_id_pengguna` varchar(255) DEFAULT NULL,
  `komentar_artikel` varchar(255) DEFAULT NULL,
  `komentar__isi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `mahasiswa_nim` int(15) NOT NULL,
  `mahasiswa_nama` varchar(255) DEFAULT NULL,
  `mahasiswa_fakultas` varchar(255) DEFAULT NULL,
  `mahasiswa_jurusan` varchar(255) DEFAULT NULL,
  `mahasiswa_alamat` varchar(255) DEFAULT NULL,
  `mahasiswa_alamat_sekarang` varchar(255) DEFAULT NULL,
  `mahasiswa_no_telpon` varchar(255) DEFAULT NULL,
  `mahasiswa_no_wa` varchar(255) DEFAULT NULL,
  `mahasiswa_no_ortu` varchar(255) DEFAULT NULL,
  `mahasiswa_agama` varchar(255) DEFAULT NULL,
  `mahasiswa_foto` varchar(255) DEFAULT NULL,
  `mahasiswa_username` varchar(255) DEFAULT NULL,
  `mahasiswa_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembina`
--

CREATE TABLE `pembina` (
  `pembina_id` int(11) NOT NULL,
  `pembina_nama` varchar(255) DEFAULT NULL,
  `pembina_username` varchar(255) DEFAULT NULL,
  `pembina_password` varchar(255) DEFAULT NULL,
  `pembina_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembina`
--

INSERT INTO `pembina` (`pembina_id`, `pembina_nama`, `pembina_username`, `pembina_password`, `pembina_foto`) VALUES
(1, 'pembina', 'pembina', '9be84ba1f28932cb5019ef122f2ce318', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `pengurus_id` int(11) NOT NULL,
  `pengurus_nama` varchar(255) DEFAULT NULL,
  `pengurus_username` varchar(255) DEFAULT NULL,
  `pengurus_password` varchar(255) DEFAULT NULL,
  `pengurus_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_isi`
--

CREATE TABLE `pesan_isi` (
  `pesan_id` int(11) NOT NULL,
  `pesan_percakapan` varchar(255) DEFAULT NULL,
  `pesan_tanggal` date DEFAULT NULL,
  `pesan_dari_tipe` int(11) DEFAULT NULL,
  `pesan_tujuan_tipe` int(11) DEFAULT NULL,
  `pesan_dari_id` int(11) DEFAULT NULL,
  `pesan_tujuan_id` varchar(255) DEFAULT NULL,
  `pesan_isi` date DEFAULT NULL,
  `pesan_dokumen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_percakapan`
--

CREATE TABLE `pesan_percakapan` (
  `percakapan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE `qa` (
  `qa_id` int(11) NOT NULL,
  `qa_pertanyaan` varchar(255) DEFAULT NULL,
  `qa_jawaban` varchar(255) DEFAULT NULL,
  `qa_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_kegiatan`
--
ALTER TABLE `absen_kegiatan`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`halaman_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kegiatan_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`pembina_id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`pengurus_id`);

--
-- Indexes for table `pesan_isi`
--
ALTER TABLE `pesan_isi`
  ADD PRIMARY KEY (`pesan_id`);

--
-- Indexes for table `pesan_percakapan`
--
ALTER TABLE `pesan_percakapan`
  ADD PRIMARY KEY (`percakapan_id`);

--
-- Indexes for table `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`qa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_kegiatan`
--
ALTER TABLE `absen_kegiatan`
  MODIFY `absen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `halaman_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kegiatan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembina`
--
ALTER TABLE `pembina`
  MODIFY `pembina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `pengurus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan_isi`
--
ALTER TABLE `pesan_isi`
  MODIFY `pesan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan_percakapan`
--
ALTER TABLE `pesan_percakapan`
  MODIFY `percakapan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa`
--
ALTER TABLE `qa`
  MODIFY `qa_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
