-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 08:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kemiskinan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama_nama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Hindu'),
(4, 'Katolik'),
(5, 'Buddha'),
(6, 'Kong Hu Cu');

-- --------------------------------------------------------

--
-- Table structure for table `atap`
--

CREATE TABLE `atap` (
  `id_atap` int(11) NOT NULL,
  `atap_nama` varchar(45) DEFAULT NULL,
  `atap_bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atap`
--

INSERT INTO `atap` (`id_atap`, `atap_nama`, `atap_bobot`) VALUES
(1, 'Beton', 1),
(2, 'Keramik', 0.9),
(3, 'Kaca', 0.9),
(4, 'Metal', 0.8),
(5, 'Seng', 0.8),
(6, 'Sirap', 0.7),
(7, 'Aspal', 0.6),
(8, 'Conopy', 0.7),
(9, 'Kayu', 0.5),
(10, 'Rumbia', 0.3),
(11, 'Ijuk', 0.2),
(12, 'Tidak Ada', 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `dinding`
--

CREATE TABLE `dinding` (
  `id_dinding` int(11) NOT NULL,
  `dinding_nama` varchar(45) DEFAULT NULL,
  `dinding_bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dinding`
--

INSERT INTO `dinding` (`id_dinding`, `dinding_nama`, `dinding_bobot`) VALUES
(1, 'Tidak Ada', 0),
(2, 'Kayu Biasa', 0.3),
(3, 'Kayu Istimewa', 0.5),
(4, 'Beton', 0.7),
(5, 'Semen Biasa', 0.8),
(6, 'Semen Fiber', 0.9);

-- --------------------------------------------------------

--
-- Table structure for table `jamban`
--

CREATE TABLE `jamban` (
  `id_jamban` int(11) NOT NULL,
  `jamban_nama` varchar(45) DEFAULT NULL,
  `jamban_bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jamban`
--

INSERT INTO `jamban` (`id_jamban`, `jamban_nama`, `jamban_bobot`) VALUES
(1, 'Tidak Ada', 0),
(2, 'Umum', 0.5),
(3, 'Milik Sendiri', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `no_kk` varchar(20) NOT NULL,
  `nik_kepala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`no_kk`, `nik_kepala`) VALUES
('123', '0003'),
('1233', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_anggota`
--

CREATE TABLE `keluarga_anggota` (
  `no_kk` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jabatan` tinyint(4) DEFAULT NULL,
  `aktif` tinyint(4) NOT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga_anggota`
--

INSERT INTO `keluarga_anggota` (`no_kk`, `nik`, `jabatan`, `aktif`, `tgl_input`, `tgl_update`) VALUES
('1233', '0002', 1, 1, NULL, NULL),
('123', '0003', 1, 1, NULL, NULL),
('1233', '123123', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_indikator`
--

CREATE TABLE `keluarga_indikator` (
  `no_kk` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `pendapatan_utama` double DEFAULT NULL,
  `pendapatan_sampingan` double DEFAULT NULL,
  `pengeluaran_total` double DEFAULT NULL,
  `jenis_aset` text,
  `rumah_ukuran` double DEFAULT NULL,
  `id_rumah_kepemilikan` int(11) NOT NULL,
  `id_dinding` int(11) NOT NULL,
  `id_atap` int(11) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `id_penerangan` int(11) NOT NULL,
  `id_jamban` int(11) NOT NULL,
  `id_sumber_air_minum` int(11) NOT NULL,
  `id_kesejahteraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga_indikator`
--

INSERT INTO `keluarga_indikator` (`no_kk`, `tahun`, `pendapatan_utama`, `pendapatan_sampingan`, `pengeluaran_total`, `jenis_aset`, `rumah_ukuran`, `id_rumah_kepemilikan`, `id_dinding`, `id_atap`, `id_lantai`, `id_penerangan`, `id_jamban`, `id_sumber_air_minum`, `id_kesejahteraan`) VALUES
('123', 2019, 15000000, 5000000, 20000000, 'sdf', 234, 2, 4, 4, 3, 3, 3, 4, 2),
('1233', 2018, 15000000, 5000000, 20000000, 'sdf', 23323, 1, 3, 3, 3, 2, 2, 2, 2),
('1233', 2019, 15000000, 5000000, 20000000, 'sdf', 23323, 1, 3, 3, 3, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_program`
--

CREATE TABLE `keluarga_program` (
  `id_keluarga_program` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `kegiatan_nama` varchar(100) DEFAULT NULL,
  `kegiatan_tahun` int(11) DEFAULT NULL,
  `kegiatan_sumber_dana` int(11) NOT NULL,
  `program_jenis` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga_program`
--

INSERT INTO `keluarga_program` (`id_keluarga_program`, `no_kk`, `kegiatan_nama`, `kegiatan_tahun`, `kegiatan_sumber_dana`, `program_jenis`) VALUES
(1, '1233', '22222', 2019, 2, 1),
(2, '1233', '2222244', 2019, 2, 1),
(3, '1233', '1111', 2019, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_program_akan_terima`
--

CREATE TABLE `keluarga_program_akan_terima` (
  `id_keluarga_program` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `kegiatan_nama` varchar(100) DEFAULT NULL,
  `kegiatan_tahun` int(11) DEFAULT NULL,
  `kegiatan_sumber_dana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_program_harapan`
--

CREATE TABLE `keluarga_program_harapan` (
  `id_keluarga_program` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `kegiatan_nama` varchar(100) DEFAULT NULL,
  `kegiatan_tahun` int(11) DEFAULT NULL,
  `kegiatan_sumber_dana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_program_terima`
--

CREATE TABLE `keluarga_program_terima` (
  `id_keluarga_program` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `kegiatan_nama` varchar(100) DEFAULT NULL,
  `kegiatan_tahun` int(11) DEFAULT NULL,
  `kegiatan_sumber_dana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kesejahteraan`
--

CREATE TABLE `kesejahteraan` (
  `id_kesejahteraan` int(11) NOT NULL,
  `kesejahteraan_nama` varchar(45) DEFAULT NULL,
  `kesejahteraan_bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kesejahteraan`
--

INSERT INTO `kesejahteraan` (`id_kesejahteraan`, `kesejahteraan_nama`, `kesejahteraan_bobot`) VALUES
(1, 'Sangat Miskin', NULL),
(2, 'Miskin', NULL),
(3, 'Hampir Miskin', NULL),
(4, 'Sejahtera', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id_lantai` int(11) NOT NULL,
  `lantai_nama` varchar(45) DEFAULT NULL,
  `lantai_bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id_lantai`, `lantai_nama`, `lantai_bobot`) VALUES
(1, 'Tidak Ada', 0),
(2, 'Tanah', 0.2),
(3, 'karpet', 0.4),
(4, 'Semen', 0.6),
(5, 'Keramik', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan_nama`) VALUES
(1, 'Petani'),
(2, 'Nelayan');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(20) NOT NULL,
  `penduduk_nama` varchar(45) DEFAULT NULL,
  `jenis_kelamin` tinyint(4) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` datetime DEFAULT NULL,
  `alamat` text,
  `kondisi_fisik` varchar(100) DEFAULT NULL,
  `jenis_keterampilan` varchar(45) DEFAULT NULL,
  `hidup` tinyint(4) DEFAULT NULL,
  `id_status_pendidikan` int(11) DEFAULT NULL,
  `id_status_perkawinan` int(11) DEFAULT NULL,
  `id_pekerjaan` int(11) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `penduduk_nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `kondisi_fisik`, `jenis_keterampilan`, `hidup`, `id_status_pendidikan`, `id_status_perkawinan`, `id_pekerjaan`, `id_agama`, `tgl_input`, `tgl_update`) VALUES
('0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
('0002', 'samsu', 1, 'Kendari', '2005-07-14 00:00:00', 'sdf', 'sdf', 'sdf', 1, 4, 2, 2, 1, '2019-07-20 22:02:16', NULL),
('0003', 'Sumardin2', 1, 'Sidoarjo', '2019-07-23 00:00:00', 'sadf', 'sdf', 'sdf', 1, 4, 3, 2, 1, '2019-07-21 06:02:57', NULL),
('123123', 'Sumardin', 1, 'Kendari', '1997-07-24 00:00:00', 'sdf', 'sfd', 'sdf', 1, 3, 4, 2, 2, '2019-07-20 18:27:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penerangan`
--

CREATE TABLE `penerangan` (
  `id_penerangan` int(11) NOT NULL,
  `penerangan_nama` varchar(45) DEFAULT NULL,
  `penerangan_bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerangan`
--

INSERT INTO `penerangan` (`id_penerangan`, `penerangan_nama`, `penerangan_bobot`) VALUES
(1, 'Tidak Ada', 0),
(2, 'Lilin', 0.2),
(3, 'Obor', 0.2),
(4, 'LED', 0.5),
(6, 'Lampu', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `rumah_kepemilikan`
--

CREATE TABLE `rumah_kepemilikan` (
  `id_rumah_kepemilikan` int(11) NOT NULL,
  `rumah_kepemilikan_nama` varchar(45) DEFAULT NULL,
  `rumah_kepemilikan_bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumah_kepemilikan`
--

INSERT INTO `rumah_kepemilikan` (`id_rumah_kepemilikan`, `rumah_kepemilikan_nama`, `rumah_kepemilikan_bobot`) VALUES
(1, 'Milik Sendiri', 0.8),
(2, 'Sewa', 0.5),
(3, 'Bebas Sewa', 0.6),
(4, 'Lainnya', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `status_pendidikan`
--

CREATE TABLE `status_pendidikan` (
  `id_status_pendidikan` int(11) NOT NULL,
  `status_pendidikan_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pendidikan`
--

INSERT INTO `status_pendidikan` (`id_status_pendidikan`, `status_pendidikan_nama`) VALUES
(1, 'Tidak Sekolah'),
(2, 'TK'),
(3, 'SD'),
(4, 'SMP'),
(5, 'SMA'),
(6, 'S1'),
(7, 'S2'),
(8, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `status_perkawinan`
--

CREATE TABLE `status_perkawinan` (
  `id_status_perkawinan` int(11) NOT NULL,
  `status_perkawinan_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_perkawinan`
--

INSERT INTO `status_perkawinan` (`id_status_perkawinan`, `status_perkawinan_nama`) VALUES
(1, 'Belum Menikah'),
(2, 'Menikah'),
(3, 'Cerai'),
(4, 'Duda'),
(5, 'Janda');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_air_minum`
--

CREATE TABLE `sumber_air_minum` (
  `id_sumber_air_minum` int(11) NOT NULL,
  `sumber_air_minum_nama` varchar(45) DEFAULT NULL,
  `sumber_air_minum_bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber_air_minum`
--

INSERT INTO `sumber_air_minum` (`id_sumber_air_minum`, `sumber_air_minum_nama`, `sumber_air_minum_bobot`) VALUES
(1, 'Air Kemasan', 1),
(2, 'Air Ledeng', 0.8),
(3, 'Sumber Terlindungi', 0.6),
(4, 'Sumber Tidak Terlindungi', 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `id_sumber_dana` int(11) NOT NULL,
  `sumber_dana_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber_dana`
--

INSERT INTO `sumber_dana` (`id_sumber_dana`, `sumber_dana_nama`) VALUES
(1, 'APBDes'),
(2, 'APBD'),
(3, 'APBN'),
(4, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` text,
  `level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$13$ZtzUVhoI/bLqKmpetdHWW.ozUXArLlGrHbX7uCa68du.WSGZX8SQS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `atap`
--
ALTER TABLE `atap`
  ADD PRIMARY KEY (`id_atap`);

--
-- Indexes for table `dinding`
--
ALTER TABLE `dinding`
  ADD PRIMARY KEY (`id_dinding`);

--
-- Indexes for table `jamban`
--
ALTER TABLE `jamban`
  ADD PRIMARY KEY (`id_jamban`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`no_kk`),
  ADD KEY `fk_keluarga_penduduk1_idx` (`nik_kepala`);

--
-- Indexes for table `keluarga_anggota`
--
ALTER TABLE `keluarga_anggota`
  ADD PRIMARY KEY (`nik`,`aktif`),
  ADD KEY `fk_keluarga_anggota_keluarga1_idx` (`no_kk`),
  ADD KEY `fk_keluarga_anggota_penduduk1_idx` (`nik`);

--
-- Indexes for table `keluarga_indikator`
--
ALTER TABLE `keluarga_indikator`
  ADD PRIMARY KEY (`no_kk`,`tahun`),
  ADD KEY `fk_keluarga_indikator_keluarga_idx` (`no_kk`),
  ADD KEY `fk_keluarga_indikator_rumah_kepemilikan1_idx` (`id_rumah_kepemilikan`),
  ADD KEY `fk_keluarga_indikator_dinding1_idx` (`id_dinding`),
  ADD KEY `fk_keluarga_indikator_atap1_idx` (`id_atap`),
  ADD KEY `fk_keluarga_indikator_lantai1_idx` (`id_lantai`),
  ADD KEY `fk_keluarga_indikator_penerangan1_idx` (`id_penerangan`),
  ADD KEY `fk_keluarga_indikator_jamban1_idx` (`id_jamban`),
  ADD KEY `fk_keluarga_indikator_sumber_air_minum1_idx` (`id_sumber_air_minum`),
  ADD KEY `fk_keluarga_indikator_kesejahteraan1_idx` (`id_kesejahteraan`);

--
-- Indexes for table `keluarga_program`
--
ALTER TABLE `keluarga_program`
  ADD PRIMARY KEY (`id_keluarga_program`),
  ADD KEY `fk_keluarga_program_keluarga1_idx` (`no_kk`),
  ADD KEY `fk_keluarga_program_sumber_dana1_idx` (`kegiatan_sumber_dana`);

--
-- Indexes for table `keluarga_program_akan_terima`
--
ALTER TABLE `keluarga_program_akan_terima`
  ADD PRIMARY KEY (`id_keluarga_program`,`no_kk`,`kegiatan_sumber_dana`),
  ADD KEY `fk_keluarga_program_akan_terima_keluarga1_idx` (`no_kk`),
  ADD KEY `fk_keluarga_program_akan_terima_sumber_dana1_idx` (`kegiatan_sumber_dana`);

--
-- Indexes for table `keluarga_program_harapan`
--
ALTER TABLE `keluarga_program_harapan`
  ADD PRIMARY KEY (`id_keluarga_program`,`no_kk`,`kegiatan_sumber_dana`),
  ADD KEY `fk_keluarga_program_harapan_keluarga1_idx` (`no_kk`),
  ADD KEY `fk_keluarga_program_harapan_sumber_dana1_idx` (`kegiatan_sumber_dana`);

--
-- Indexes for table `keluarga_program_terima`
--
ALTER TABLE `keluarga_program_terima`
  ADD PRIMARY KEY (`id_keluarga_program`,`no_kk`,`kegiatan_sumber_dana`),
  ADD KEY `fk_keluarga_program_terima_keluarga1_idx` (`no_kk`),
  ADD KEY `fk_keluarga_program_terima_sumber_dana1_idx` (`kegiatan_sumber_dana`);

--
-- Indexes for table `kesejahteraan`
--
ALTER TABLE `kesejahteraan`
  ADD PRIMARY KEY (`id_kesejahteraan`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id_lantai`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `fk_penduduk_pekerjaan1_idx` (`id_pekerjaan`),
  ADD KEY `fk_penduduk_status_pendidikan1_idx` (`id_status_pendidikan`),
  ADD KEY `fk_penduduk_status_perkawinan1_idx` (`id_status_perkawinan`),
  ADD KEY `fk_penduduk_agama1_idx` (`id_agama`);

--
-- Indexes for table `penerangan`
--
ALTER TABLE `penerangan`
  ADD PRIMARY KEY (`id_penerangan`);

--
-- Indexes for table `rumah_kepemilikan`
--
ALTER TABLE `rumah_kepemilikan`
  ADD PRIMARY KEY (`id_rumah_kepemilikan`);

--
-- Indexes for table `status_pendidikan`
--
ALTER TABLE `status_pendidikan`
  ADD PRIMARY KEY (`id_status_pendidikan`);

--
-- Indexes for table `status_perkawinan`
--
ALTER TABLE `status_perkawinan`
  ADD PRIMARY KEY (`id_status_perkawinan`);

--
-- Indexes for table `sumber_air_minum`
--
ALTER TABLE `sumber_air_minum`
  ADD PRIMARY KEY (`id_sumber_air_minum`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`id_sumber_dana`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `atap`
--
ALTER TABLE `atap`
  MODIFY `id_atap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dinding`
--
ALTER TABLE `dinding`
  MODIFY `id_dinding` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jamban`
--
ALTER TABLE `jamban`
  MODIFY `id_jamban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluarga_program`
--
ALTER TABLE `keluarga_program`
  MODIFY `id_keluarga_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluarga_program_akan_terima`
--
ALTER TABLE `keluarga_program_akan_terima`
  MODIFY `id_keluarga_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluarga_program_harapan`
--
ALTER TABLE `keluarga_program_harapan`
  MODIFY `id_keluarga_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluarga_program_terima`
--
ALTER TABLE `keluarga_program_terima`
  MODIFY `id_keluarga_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kesejahteraan`
--
ALTER TABLE `kesejahteraan`
  MODIFY `id_kesejahteraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id_lantai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penerangan`
--
ALTER TABLE `penerangan`
  MODIFY `id_penerangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rumah_kepemilikan`
--
ALTER TABLE `rumah_kepemilikan`
  MODIFY `id_rumah_kepemilikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_pendidikan`
--
ALTER TABLE `status_pendidikan`
  MODIFY `id_status_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_perkawinan`
--
ALTER TABLE `status_perkawinan`
  MODIFY `id_status_perkawinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sumber_air_minum`
--
ALTER TABLE `sumber_air_minum`
  MODIFY `id_sumber_air_minum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `id_sumber_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `fk_keluarga_penduduk1` FOREIGN KEY (`nik_kepala`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga_anggota`
--
ALTER TABLE `keluarga_anggota`
  ADD CONSTRAINT `fk_keluarga_anggota_keluarga1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_anggota_penduduk1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga_indikator`
--
ALTER TABLE `keluarga_indikator`
  ADD CONSTRAINT `fk_keluarga_indikator_atap1` FOREIGN KEY (`id_atap`) REFERENCES `atap` (`id_atap`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_indikator_dinding1` FOREIGN KEY (`id_dinding`) REFERENCES `dinding` (`id_dinding`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_indikator_jamban1` FOREIGN KEY (`id_jamban`) REFERENCES `jamban` (`id_jamban`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_indikator_keluarga` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_indikator_kesejahteraan1` FOREIGN KEY (`id_kesejahteraan`) REFERENCES `kesejahteraan` (`id_kesejahteraan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_indikator_lantai1` FOREIGN KEY (`id_lantai`) REFERENCES `lantai` (`id_lantai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_indikator_penerangan1` FOREIGN KEY (`id_penerangan`) REFERENCES `penerangan` (`id_penerangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_indikator_rumah_kepemilikan1` FOREIGN KEY (`id_rumah_kepemilikan`) REFERENCES `rumah_kepemilikan` (`id_rumah_kepemilikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_indikator_sumber_air_minum1` FOREIGN KEY (`id_sumber_air_minum`) REFERENCES `sumber_air_minum` (`id_sumber_air_minum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga_program`
--
ALTER TABLE `keluarga_program`
  ADD CONSTRAINT `fk_keluarga_program_keluarga1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_program_sumber_dana1` FOREIGN KEY (`kegiatan_sumber_dana`) REFERENCES `sumber_dana` (`id_sumber_dana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga_program_akan_terima`
--
ALTER TABLE `keluarga_program_akan_terima`
  ADD CONSTRAINT `fk_keluarga_program_akan_terima_keluarga1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_program_akan_terima_sumber_dana1` FOREIGN KEY (`kegiatan_sumber_dana`) REFERENCES `sumber_dana` (`id_sumber_dana`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keluarga_program_harapan`
--
ALTER TABLE `keluarga_program_harapan`
  ADD CONSTRAINT `fk_keluarga_program_harapan_keluarga1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_program_harapan_sumber_dana1` FOREIGN KEY (`kegiatan_sumber_dana`) REFERENCES `sumber_dana` (`id_sumber_dana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga_program_terima`
--
ALTER TABLE `keluarga_program_terima`
  ADD CONSTRAINT `fk_keluarga_program_terima_keluarga1` FOREIGN KEY (`no_kk`) REFERENCES `keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keluarga_program_terima_sumber_dana1` FOREIGN KEY (`kegiatan_sumber_dana`) REFERENCES `sumber_dana` (`id_sumber_dana`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `fk_penduduk_agama1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penduduk_pekerjaan1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penduduk_status_pendidikan1` FOREIGN KEY (`id_status_pendidikan`) REFERENCES `status_pendidikan` (`id_status_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penduduk_status_perkawinan1` FOREIGN KEY (`id_status_perkawinan`) REFERENCES `status_perkawinan` (`id_status_perkawinan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
