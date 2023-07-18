-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 04:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `idanggota` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id`, `idanggota`, `nim`, `namalengkap`, `kelas`, `alamat`) VALUES
(1, 'AG-001', '1234567890123', 'Ahmad Syari', 'Informatics Computer 13', 'Balikpapan'),
(2, 'AG-002', '0987654321451', 'Bejo', 'Computerized Accounting 13', 'Penajam Paser Utara'),
(7, 'AG-003', '1919192202378', 'Angga', 'Business Administration 26', 'Samarinda'),
(8, 'AG-004', '2395857630213', 'Sandra Putri', 'Business Administration 25', 'Kutai Barat'),
(10, 'AG-005', '1375644867535', 'Ari Wijaya', 'Informatics Computer 13', 'Balikpapan'),
(11, 'AG-006', '128472847282', 'Juan Qyawali', 'Informatics Computer 13', 'Balikpapan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `kodebuku` varchar(20) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `judulbuku` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahunterbit` varchar(15) NOT NULL,
  `kategoribuku` varchar(50) NOT NULL,
  `jumlahbuku` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `kodebuku`, `isbn`, `judulbuku`, `pengarang`, `penerbit`, `tahunterbit`, `kategoribuku`, `jumlahbuku`) VALUES
(1, 'EP-001', '132-123-234-231', 'Dasar Framework CodeIgniter', 'British Columbia', 'Gramedia Pustaka Utama', '2016', 'Pemograman', '19'),
(2, 'EP-002', '123-111-111-111', 'Rantai Makanan', 'Sandra Wilian', 'Erlangga', '2013', 'Sains', '0'),
(8, 'EP-003', '970-45-757-86', 'Bahasa Indonesia', 'Alex', 'Erlangga', '2011', 'Bahasa', '12'),
(10, 'EP-004', '123-958-294-132', 'Sejarah Dunia Yang Disembunyikan', 'Jonathan Black', 'Gramedia Pustaka Utama', '2007', 'Sejarah', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id`, `harga`) VALUES
(1, '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kodekategori` varchar(50) NOT NULL,
  `kategoribuku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kodekategori`, `kategoribuku`) VALUES
(7, 'KT-001', 'Pemograman'),
(8, 'KT-002', 'Sains'),
(9, 'KT-003', 'Sejarah'),
(10, 'KT-004', 'Bahasa'),
(11, 'KT-005', 'Agama'),
(12, 'KT-006', 'Seni'),
(13, 'KT-007', 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id` int(11) NOT NULL,
  `kodepinjam` varchar(20) NOT NULL,
  `idanggota` varchar(20) NOT NULL,
  `kodebuku` varchar(20) NOT NULL,
  `tglpinjam` varchar(20) NOT NULL,
  `tglkembali` varchar(20) NOT NULL,
  `tglkembalikan` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id`, `kodepinjam`, `idanggota`, `kodebuku`, `tglpinjam`, `tglkembali`, `tglkembalikan`, `status`) VALUES
(13, 'PJ-002', 'AG-002', 'EP-001', '2022-07-16', '2022-07-17', '2022-07-27', 'Dikembalikan'),
(16, 'PJ-014', 'AG-005', 'EP-003', '2022-08-07', '2022-08-09', '2022-08-17', 'Dikembalikan'),
(17, 'PJ-015', 'AG-005', 'EP-001', '2022-08-17', '2022-08-19', '2022-08-17', 'Dikembalikan');

--
-- Triggers `tb_kembali`
--
DELIMITER $$
CREATE TRIGGER `jml_after_kembali` AFTER INSERT ON `tb_kembali` FOR EACH ROW UPDATE tb_buku SET tb_buku.jumlahbuku = tb_buku.jumlahbuku +1 WHERE tb_buku.kodebuku = new.kodebuku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id` int(11) NOT NULL,
  `kodepinjam` varchar(20) NOT NULL,
  `idanggota` varchar(20) NOT NULL,
  `kodebuku` varchar(20) NOT NULL,
  `tglpinjam` varchar(20) NOT NULL,
  `tglkembali` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id`, `kodepinjam`, `idanggota`, `kodebuku`, `tglpinjam`, `tglkembali`) VALUES
(17, 'PJ-001', 'AG-006', 'EP-001', '2022-08-17', '2022-08-18'),
(18, 'PJ-018', 'AG-001', 'EP-002', '2022-08-17', '2022-08-19');

--
-- Triggers `tb_pinjam`
--
DELIMITER $$
CREATE TRIGGER `jml_after_pinjam` AFTER INSERT ON `tb_pinjam` FOR EACH ROW UPDATE tb_buku SET tb_buku.jumlahbuku = tb_buku.jumlahbuku -1 WHERE tb_buku.kodebuku = new.kodebuku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipeuser` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `foto`, `namalengkap`, `username`, `password`, `tipeuser`) VALUES
(1, 'Alind_Perdana.jpg', 'Alind Perdana', 'sadm', '123', 'Superadmin'),
(26, 'Sherly.jpg', 'Sherly Hanifah', 'adm', '123', 'Admin'),
(27, 'santo.jpg', 'santo', 'sntto', '123', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
