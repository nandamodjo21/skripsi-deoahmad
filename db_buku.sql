-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Oct 24, 2023 at 06:35 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_agama`
--

CREATE TABLE `t_agama` (
  `id_agama` int NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_agama`
--

INSERT INTO `t_agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen(Protestan)'),
(3, 'Katholik'),
(4, 'Budha'),
(6, 'Hindu'),
(7, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `t_biodata`
--

CREATE TABLE `t_biodata` (
  `id_biodata` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jk` int DEFAULT NULL,
  `id_agama` int DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban`
--

CREATE TABLE `t_jawaban` (
  `id_jawaban` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_soal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_nilai` int DEFAULT NULL,
  `createt_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jawaban`
--

INSERT INTO `t_jawaban` (`id_jawaban`, `id_user`, `id_soal`, `jawaban`, `id_nilai`, `createt_at`) VALUES
('14432f71-728d-11ee-8fc6-0242ac120002', '3bcf1eec-e993-47cb-99ad-30e7d3e247b4', 'e0765b02-7286-11ee-8fc6-0242ac120002', 'tuhan pencipta.,tuhan mengatur.,Allah SWT.,Islam.,Muhammad SAW.', 2, '2023-10-24 16:47:55'),
('4452a5c4-7298-11ee-8fc6-0242ac120002', '3a58aebc-48d4-4ccf-8551-6528fc97647c', 'e0765b02-7286-11ee-8fc6-0242ac120002', 'tuhan,Allah SWT,Allah SWT,Islam,Muhammad SAW.', 1, '2023-10-24 18:08:00'),
('5e4e7e97-7298-11ee-8fc6-0242ac120002', 'ea22d224-a68b-4977-b9b0-dc432b8a8453', 'e0765b02-7286-11ee-8fc6-0242ac120002', 'tuhan.,harus.,Allah SWT.,Islam.,Muhammad SAW.', 2, '2023-10-24 18:08:43'),
('6a51a396-729b-11ee-8fc6-0242ac120002', '364b3309-aa6f-486a-991d-cc6d2c38e2ec', 'e0765b02-7286-11ee-8fc6-0242ac120002', 'tuhan ada 1,tuhan yg terbaik,Allah SWT.,Islam.,Muhammad SAW.', 3, '2023-10-24 18:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_kelamin`
--

CREATE TABLE `t_jenis_kelamin` (
  `id_jk` int NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jenis_kelamin`
--

INSERT INTO `t_jenis_kelamin` (`id_jk`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `t_login`
--

CREATE TABLE `t_login` (
  `id_login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` int NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` int DEFAULT NULL,
  `agama` int DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` int DEFAULT NULL,
  `status_mhs` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_login`
--

INSERT INTO `t_login` (`id_login`, `id_role`, `nim`, `nama_lengkap`, `jk`, `agama`, `username`, `password`, `is_active`, `status_mhs`) VALUES
('364b3309-aa6f-486a-991d-cc6d2c38e2ec', 2, '20501001', 'Rasyid rauf', 1, 1, 'acit', '202cb962ac59075b964b07152d234b70', 1, 1),
('3a58aebc-48d4-4ccf-8551-6528fc97647c', 2, '20501018', 'nanda', 1, 1, 'modjo', '202cb962ac59075b964b07152d234b70', 1, 1),
('3bcf1eec-e993-47cb-99ad-30e7d3e247b4', 2, '20501043', 'Deo ahmad', 1, 7, 'deoahmad', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1),
('ea22d224-a68b-4977-b9b0-dc432b8a8453', 2, '20501037', 'serlin', 2, 1, 'elin', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa`
--

CREATE TABLE `t_mahasiswa` (
  `id_biodata` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_mhs` int NOT NULL DEFAULT '1',
  `id_prodi` int DEFAULT NULL,
  `idmhs` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa_seq`
--

CREATE TABLE `t_mahasiswa_seq` (
  `next_val` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_mahasiswa_seq`
--

INSERT INTO `t_mahasiswa_seq` (`next_val`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `t_materi`
--

CREATE TABLE `t_materi` (
  `id_materi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `materi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_materi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_materi`
--

INSERT INTO `t_materi` (`id_materi`, `materi`, `file_materi`) VALUES
('cacacbdd-f327-4249-8785-2123af5672e0', 'Fetch client', 'fetch-client-file1.pdf'),
('eb51b84a-f5db-4093-91c0-3f8e8b464963', 'konsep ketun\nhanan,pdf', 'MODUL_1_KONSEP_KETUHANAN_YANG_MAHA_ESA-1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai`
--

CREATE TABLE `t_nilai` (
  `id_nilai` int NOT NULL,
  `nilai` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_nilai`
--

INSERT INTO `t_nilai` (`id_nilai`, `nilai`) VALUES
(1, '100'),
(2, '85'),
(3, '75'),
(4, '50'),
(5, '30');

-- --------------------------------------------------------

--
-- Table structure for table `t_periode`
--

CREATE TABLE `t_periode` (
  `id_periode` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_prodi` int NOT NULL,
  `mulai_periode` date NOT NULL,
  `selesai_periode` date NOT NULL,
  `status_periode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_periode`
--

INSERT INTO `t_periode` (`id_periode`, `id_prodi`, `mulai_periode`, `selesai_periode`, `status_periode`) VALUES
('433c5f76-3aba-11ee-824b-0242ac120002', 1, '2023-09-11', '2023-12-31', 1),
('608f7124-3aba-11ee-824b-0242ac120002', 3, '2023-09-11', '2024-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_prodi`
--

CREATE TABLE `t_prodi` (
  `id_prodi` int NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_prodi`
--

INSERT INTO `t_prodi` (`id_prodi`, `prodi`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknologi Hasil Pertanian'),
(3, 'Mesin dan Peralatan Pertanian'),
(4, 'Teknologi Rekayasa Pangan');

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id_role`, `role`) VALUES
(1, 'dosen'),
(2, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `t_soal`
--

CREATE TABLE `t_soal` (
  `id_soal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_materi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `soal` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_soal`
--

INSERT INTO `t_soal` (`id_soal`, `id_materi`, `status`, `created_at`, `soal`) VALUES
('8c9c64ed-7284-11ee-8fc6-0242ac120002', 'cacacbdd-f327-4249-8785-2123af5672e0', 1, '2023-10-24 23:46:51.000000', 'apa itu client?\r\nkenapa?\r\ndimana?\r\napa?\r\nmengapa?'),
('d726b962-6916-11ee-89c4-c9e00a8ea9a4', 'eb51b84a-f5db-4093-91c0-3f8e8b464963', 1, '2023-10-12 23:48:52.000000', 'apa itu tuhan\r\ntuhan\r\napa tuhan itu ada\r\nbagaimana bentuk tuhan\r\nkenapa ada tuhan'),
('e0765b02-7286-11ee-8fc6-0242ac120002', 'eb51b84a-f5db-4093-91c0-3f8e8b464963', 1, '2023-10-25 00:03:31.000000', 'apa itu tuhan?\r\nkenapa ada tuhan?\r\nsiapa tuhanmu?\r\napa agamamu?\r\nsiapa nabimu?');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_useradmin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_useradmin`, `id_role`, `username`, `password`, `created_at`, `status`) VALUES
('5b461a02-481f-11ee-baf5-0242ac120002', 1, 'admin', '202cb962ac59075b964b07152d234b70', '2023-08-31 16:56:40', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_agama`
--
ALTER TABLE `t_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `t_biodata`
--
ALTER TABLE `t_biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `agama` (`id_agama`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `jk` (`jk`);

--
-- Indexes for table `t_jawaban`
--
ALTER TABLE `t_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_nilai` (`id_nilai`);

--
-- Indexes for table `t_jenis_kelamin`
--
ALTER TABLE `t_jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `t_login`
--
ALTER TABLE `t_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `jk` (`jk`),
  ADD KEY `agama` (`agama`);

--
-- Indexes for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  ADD PRIMARY KEY (`idmhs`),
  ADD KEY `nik` (`id_biodata`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `t_materi`
--
ALTER TABLE `t_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `t_nilai`
--
ALTER TABLE `t_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `t_periode`
--
ALTER TABLE `t_periode`
  ADD PRIMARY KEY (`id_periode`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `t_prodi`
--
ALTER TABLE `t_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `t_soal`
--
ALTER TABLE `t_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_useradmin`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_agama`
--
ALTER TABLE `t_agama`
  MODIFY `id_agama` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_jenis_kelamin`
--
ALTER TABLE `t_jenis_kelamin`
  MODIFY `id_jk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_nilai`
--
ALTER TABLE `t_nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_prodi`
--
ALTER TABLE `t_prodi`
  MODIFY `id_prodi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_biodata`
--
ALTER TABLE `t_biodata`
  ADD CONSTRAINT `t_biodata_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `t_agama` (`id_agama`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_biodata_ibfk_2` FOREIGN KEY (`jk`) REFERENCES `t_jenis_kelamin` (`id_jk`) ON UPDATE CASCADE;

--
-- Constraints for table `t_jawaban`
--
ALTER TABLE `t_jawaban`
  ADD CONSTRAINT `t_jawaban_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `t_nilai` (`id_nilai`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `t_soal` (`id_soal`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jawaban_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `t_login` (`id_login`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `t_login`
--
ALTER TABLE `t_login`
  ADD CONSTRAINT `t_login_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `t_role` (`id_role`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_login_ibfk_3` FOREIGN KEY (`agama`) REFERENCES `t_agama` (`id_agama`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_login_ibfk_4` FOREIGN KEY (`jk`) REFERENCES `t_jenis_kelamin` (`id_jk`) ON UPDATE CASCADE;

--
-- Constraints for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  ADD CONSTRAINT `FKe8pmr3qjl4pte38injkpqft5y` FOREIGN KEY (`id_prodi`) REFERENCES `t_prodi` (`id_prodi`),
  ADD CONSTRAINT `FKsyybadqlu0c5od45fy6044pp4` FOREIGN KEY (`id_biodata`) REFERENCES `t_biodata` (`id_biodata`);

--
-- Constraints for table `t_soal`
--
ALTER TABLE `t_soal`
  ADD CONSTRAINT `FK2eu3y0ofyj93ccme5hxjuv109` FOREIGN KEY (`id_materi`) REFERENCES `t_materi` (`id_materi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
