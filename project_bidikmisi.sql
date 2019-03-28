-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2019 at 12:30 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `artikel_tanggal`, `artikel_judul`, `artikel_kategori`, `artikel_konten`, `artikel_sampul`) VALUES
(3, '2019-03-23', 'x', '3', '<p>ssdf</p>\r\n', '188575517021-5x8-Stacked-Hardcover-Book-Mockup-COVERVAULT.png'),
(5, '2019-03-23', 'Porro.', '8', 'Ipsam eos beatae excepturi in quo similique. Consequatur cumque rerum sit ullam. In molestiae porro dolores enim rerum aut. Cum sint praesentium provident et illo consectetur.', '188575517021-5x8-Stacked-Hardcover-Book-Mockup-COVERVAULT.png'),
(6, '2019-03-23', 'Eos ducimus.', '2', 'Esse facere amet recusandae voluptatem et cum excepturi. Totam corporis deserunt iusto repellat nihil quasi occaecati. Facilis placeat odit ut et est vel autem.', '188575517021-5x8-Stacked-Hardcover-Book-Mockup-COVERVAULT.png'),
(7, '2019-03-23', 'Eos distinctio.', '6', 'Recusandae enim iure est aut officiis corrupti incidunt. Dolor et in ut maxime nobis et tempore. Nulla culpa sunt atque vel et. Consequatur quo eligendi perferendis autem enim molestias.', '188575517021-5x8-Stacked-Hardcover-Book-Mockup-COVERVAULT.png'),
(8, '2019-03-23', 'Blanditiis.', '7', 'Voluptatum dolorum quisquam fugit est. Molestiae aliquid non provident omnis iste non a. Aut id rerum odio tempora sunt. Repellat nesciunt corrupti corrupti quo sint.', '188575517021-5x8-Stacked-Hardcover-Book-Mockup-COVERVAULT.png'),
(9, '2019-03-23', 'Consequuntur blanditiis.', '2', 'Asperiores et aut et architecto. Voluptas magni veritatis dignissimos consequatur rem sed sunt.', '188575517021-5x8-Stacked-Hardcover-Book-Mockup-COVERVAULT.png'),
(10, '2019-03-23', 'Nulla enim.', '6', 'Voluptatem non expedita molestiae facere non sit a. Repellat facilis nihil autem. Sed est vitae et repellat repudiandae. Architecto eum iste ullam ad.', '1128105000Screen Shot 2019-03-20 at 2.33.21 PM.png'),
(11, '2019-03-23', 'Et occaecati.', '5', 'Quia iure ad fugit temporibus dolores eligendi. Accusamus nam quis nihil ratione dignissimos error. Eos magnam et modi placeat aspernatur necessitatibus inventore. Et rem blanditiis fugit atque amet. Vero est dolorem quaerat numquam et ea.', '1128105000Screen Shot 2019-03-20 at 2.33.21 PM.png'),
(12, '2019-03-23', 'Quisquam numquam.', '3', 'Inventore reiciendis voluptatem fugiat. Fuga aliquid quis sint et. Quia quisquam dolores voluptas consequatur. Non mollitia quo possimus asperiores. Perspiciatis voluptatem ducimus sit delectus deserunt corrupti.', '1128105000Screen Shot 2019-03-20 at 2.33.21 PM.png'),
(13, '2019-03-23', 'Omnis.', '4', 'Unde non at mollitia. Neque eius odit quidem. Sequi dolorum a aperiam aperiam voluptates dolorem optio. Voluptatem aut in est expedita et fugit atque quibusdam. Aut debitis rerum aut vel et dolorem.', '1128105000Screen Shot 2019-03-20 at 2.33.21 PM.png'),
(14, '2019-03-23', 'Tempora qui.', '5', 'Unde explicabo ut dolore voluptatem ut sapiente cum. Repellat maxime vel voluptas dolorum totam aut nam. Omnis cupiditate magni ipsum neque qui nemo.', '1128105000Screen Shot 2019-03-20 at 2.33.21 PM.png');

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

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`halaman_id`, `halaman_judul`, `halaman_sampul`, `halaman_konten`) VALUES
(2, 'Recusandae eum', '444103481car.png', 'Dolorem quos quia beatae sit ad earum enim. Id inventore est veniam sit impedit ad cum. Velit eos laboriosam quasi ut explicabo eum aspernatur.(3 = 3, 1 = true)');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(2, 'Kegiatan'),
(3, 'Peluang Kerja'),
(6, 'Beasiswa'),
(7, 'Bidikmisi');

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
(1, 'pembina', 'pembina', '9be84ba1f28932cb5019ef122f2ce318', ''),
(2, 'pembin', 'pembina', '9be84ba1f28932cb5019ef122f2ce318', NULL);

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

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`pengurus_id`, `pengurus_nama`, `pengurus_username`, `pengurus_password`, `pengurus_foto`) VALUES
(1, 'Jhoni Ahmad', 'pengurus', '0181a4b54d3adfd637ba1cf16e167e1e', NULL);

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
  `qa_jawaban` text,
  `qa_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`qa_id`, `qa_pertanyaan`, `qa_jawaban`, `qa_status`) VALUES
(1, 'consectetur adipisicing elit?', 'consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'publish'),
(2, 'Lorem ipsum dolor sit ame Akuku?', 'cnim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elitonsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit a', 'publish');

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
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `halaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `pembina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `pengurus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `qa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
