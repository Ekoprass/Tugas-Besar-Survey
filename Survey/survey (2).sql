-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 07:14 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'ekoprass', 'eko@admin.com', '6eea9b7ef19179a06954edd0f6c05ceb');

-- --------------------------------------------------------

--
-- Table structure for table `answer_question`
--

CREATE TABLE `answer_question` (
  `id_answer` int(11) NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_question` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_question`
--

INSERT INTO `answer_question` (`id_answer`, `jawaban`, `id_question`) VALUES
(1, '< 5 Jam', 'S001-0121062018-Q01'),
(2, '5 - 10 Jam', 'S001-0121062018-Q01'),
(3, '> 10 jam', 'S001-0121062018-Q01'),
(4, 'Sosial Meida', 'S001-0121062018-Q02'),
(5, 'Streaming', 'S001-0121062018-Q02'),
(6, 'Browsing', 'S001-0121062018-Q02'),
(7, 'Akreditasi A', 'S002-0230062018-Q01'),
(8, 'Akreditasi B', 'S002-0230062018-Q01'),
(9, 'Jaringan Kompuer', 'S002-0230062018-Q03'),
(10, 'Multimedia', 'S002-0230062018-Q03'),
(11, 'baik', 'S004-0420170717-Q01'),
(12, 'cukup', 'S004-0420170717-Q01'),
(13, 'buruk', 'S004-0420170717-Q01'),
(14, 'toilet', 'S004-0420170717-Q03'),
(15, 'wifi', 'S004-0420170717-Q03'),
(16, 'kantin', 'S004-0420170717-Q03'),
(17, 'samsung', 'S005-0517072018-Q01');

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE `answer_user` (
  `id_answer` int(11) NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_question` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_user`
--

INSERT INTO `answer_user` (`id_answer`, `jawaban`, `id_question`, `id_user`) VALUES
(1, '> 10 jam', 'S001-0121062018-Q01', 3),
(2, 'Streaming', 'S001-0121062018-Q02', 3),
(3, 'sangat membanggakan', 'S002-0230062018-Q02', 3),
(4, 'karena saya suka', 'S002-0230062018-Q04', 3),
(5, 'Akreditasi B', 'S002-0230062018-Q01', 3),
(6, 'Multimedia', 'S002-0230062018-Q03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `akses` int(11) DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`, `level`, `akses`, `icon`, `link`, `parent`) VALUES
(1, 'Dashboard', 0, 2, 'fa-dashboard', 'admin', 0),
(2, 'User', 0, 2, 'fa-users', 'daftaruser', 1),
(3, 'Survey', 0, 2, 'fa-clipboard', 'survey', 1),
(4, 'Report', 0, 2, 'fa-file', 'survey/report', 0),
(5, 'Dashboard', 0, 1, 'fa-dashboard', 'user', 0),
(6, 'Data User', 0, 1, 'fa-user', 'formuser', 0),
(7, 'Survey', 0, 1, 'fa-clipboard', 'survey/userSurvey', 0),
(8, 'History Survey', 0, 1, 'fa-history', 'survey/historySurvey', 0),
(9, 'Tambah User', 2, 2, 'fa-plus', 'newuser', 0),
(10, 'Daftar User', 2, 2, 'fa-table', 'datauser', 0),
(11, 'Tambah Survey', 3, 2, 'fa-plus', 'survey/createSurvey', 0),
(12, 'Daftar Survey', 3, 2, 'fa-table', 'survey', 0),
(13, 'Survey Nonaktif', 3, 2, 'fa-table', 'survey/nonaktif/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `partisipan`
--

CREATE TABLE `partisipan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_survey` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dikerjakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partisipan`
--

INSERT INTO `partisipan` (`id`, `id_user`, `id_survey`, `status`, `dikerjakan`) VALUES
(1, 3, 'S001-0121062018', 'Partisipan', '2018-07-15'),
(2, 3, 'S002-0230062018', 'Partisipan', '2018-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_survey` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `type`, `id_survey`, `required`) VALUES
('S001-0121062018-Q01', 'Berapa jam penggunaan anda dalam menggunakan gadget?', 'Pilihan Ganda', 'S001-0121062018', 'required'),
('S001-0121062018-Q02', 'Untuk kebutuhan apa yang paling sering anda gunakan dalam penggunaan gadget? ', 'Pilihan Ganda', 'S001-0121062018', 'required'),
('S002-0230062018-Q01', 'Apakah akreditasi jurusan anda ?', 'Pilihan Ganda', 'S002-0230062018', 'Required'),
('S002-0230062018-Q02', 'Tuliskan opini anda tentang kampus polinema', 'Esai', 'S002-0230062018', 'Required'),
('S002-0230062018-Q03', 'Matakuliah apa saja yang anda sukai', 'Multiple Check', 'S002-0230062018', 'Required'),
('S002-0230062018-Q04', 'Tuliskan mengapa anda memilih jurusan ini?', 'Esai', 'S002-0230062018', 'Required'),
('S004-0420170717-Q01', 'bagaimana fasilitas wifi kantor', 'Pilihan Ganda', 'S004-0420170717', 'Required'),
('S004-0420170717-Q02', 'saran mengenai fasilitas kantor', 'Esai', 'S004-0420170717', 'Required'),
('S004-0420170717-Q03', 'fasilitas favorit yang ada di kantor', 'Multiple Check', 'S004-0420170717', 'Required'),
('S005-0517072018-Q01', 'merk handphone favorit', 'Multiple Check', 'S005-0517072018', 'Required');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_survey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_survey` date NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_survey`, `nama_survey`, `deskripsi`, `waktu_survey`, `status`) VALUES
('S001-0121062018', 'Survey Penggunaan Gadget', 'Panggunaan gadget bagi mahasiswa', '2018-06-21', 'Aktif-Published'),
('S002-0230062018', 'Survey Penilaian Kampus ', 'Penilaian Kampus Polinema', '2018-06-28', 'Aktif-Published'),
('S003-0321062018', 'Survey Kinerja Karyawan', 'Survey Kinerja Karyawan Poltek', '2018-06-21', 'Nonaktif'),
('S004-0420170717', 'Survey Fasilitas', 'Fasilitas Polinema', '2018-07-17', 'Aktif-Published'),
('S005-0517072018', 'survey handphone', 'pembelian handphone', '2018-07-17', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `NIK` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglLahir` date NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `status_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `NIK`, `nama`, `username`, `password`, `tglLahir`, `alamat`, `jenis_kelamin`, `kota`, `pendidikan_terakhir`, `pekerjaan`, `status`, `umur`, `status_user`, `foto`, `akses`) VALUES
(1, '', 'Eko Prass', 'ekop@mail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '0000-00-00', '', '', '', '', '', 'Not-Verified', 0, 'Aktif', '', 1),
(2, '', 'Tommy', 'tommy@mail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '0000-00-00', '', '', '', '', '', 'Not-Verified', 0, 'Aktif', '', 2),
(3, '1741723002', 'Arief', 'arief@mail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1996-10-31', 'Bojonegoro', 'Laki-laki', 'Bojonegoro', 'SMK', 'Karyawan Swasta', 'Verified', 22, 'Aktif', 'Untitled-3.png', 1),
(4, '17232312003', 'Jack', 'Jack@mail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1996-06-03', 'Jl. Panjaitan 20', 'Laki-laki', 'Malang', 'S1-Pertanian', 'PNS', 'Verified', 22, 'Aktif', '', 1),
(5, '09876543234', 'Joko', 'Joko@mail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1996-11-11', 'Ngawi', 'Laki-laki', 'Ngawi', 'S1-Ekonomi', 'Karyawan Swasta', 'Verified', 22, 'Aktif', 'monkeyboot1.jpg', 1),
(6, '1234567890', 'Momon', 'momon', '897c8fde25c5cc5270cda61425eed3c8', '1996-03-13', 'Jombang', 'Laki-laki', 'Jombang', 'S2-Hukum', 'Tukang', 'Verified', 22, 'Aktif', 'monkeyboot1.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `answer_question`
--
ALTER TABLE `answer_question`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_question` (`id_question`),
  ADD KEY `id_answer` (`id_answer`);

--
-- Indexes for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_answer` (`id_answer`),
  ADD KEY `id_question` (`id_question`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partisipan`
--
ALTER TABLE `partisipan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_survey` (`id_survey`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_question` (`id_question`),
  ADD KEY `id_survey` (`id_survey`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`),
  ADD KEY `id_survey` (`id_survey`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer_question`
--
ALTER TABLE `answer_question`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `answer_user`
--
ALTER TABLE `answer_user`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `partisipan`
--
ALTER TABLE `partisipan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_question`
--
ALTER TABLE `answer_question`
  ADD CONSTRAINT `answer_question_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD CONSTRAINT `answer_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `partisipan` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `answer_user_ibfk_3` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partisipan`
--
ALTER TABLE `partisipan`
  ADD CONSTRAINT `partisipan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partisipan_ibfk_2` FOREIGN KEY (`id_survey`) REFERENCES `survey` (`id_survey`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_survey`) REFERENCES `survey` (`id_survey`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
