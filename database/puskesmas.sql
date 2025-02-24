-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 05:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `hari_kerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `spesialis`, `hari_kerja`) VALUES
(9, 'Dr. Tubagus Ismail, Sp.A.', 'Anak', 'Wednesday'),
(10, 'Dr. Dipati Ukur, Sp.B.', 'Bedah', 'Saturday'),
(11, 'Dr. Juanda, Sp.M', 'Mata', 'Monday'),
(12, 'Dr. Rezki Mulia, Sp.Rad.', 'Radiologi', 'Tuesday'),
(13, 'Dr. Joni Marjoni, Sp.Jp.', 'Jantung', 'Friday'),
(18, 'Dr. Aman, Sp.KK.', 'Kulit dan Kelamin', 'Thursday'),
(19, 'Dr. Abdul', '-', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `harga`) VALUES
(1, 'Paracetamol', '5000'),
(2, 'Rhinos', '10000'),
(3, 'Oralit', '1000'),
(4, 'Fantagol', '25000'),
(5, 'Alcohol Swab', '13000'),
(6, 'Phenylephrine', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `order_pemeriksaan`
--

CREATE TABLE `order_pemeriksaan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `nama_dokter` varchar(255) DEFAULT NULL,
  `tanggal_pemeriksaan` datetime DEFAULT NULL,
  `riwayat_penyakit` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `golongan_darah` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `no_bpjs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `golongan_darah`, `nomor_telepon`, `no_bpjs`) VALUES
(3, 'Yasin', '13711123456780', 'laki-laki', '2018-02-07', 'Bandung', 'A-', '08321000001', '989856561212'),
(4, 'Dzaky', '1378885643210', 'laki-laki', '2000-12-05', 'Bandung', 'A+', '082121213434', '052345678921'),
(5, 'Andre', '137111345678', 'laki-laki', '2010-02-09', 'Jakarta', 'B-', '082345678901', '000011112345'),
(6, 'Amanda', '1371111010000014', 'perempuan', '2000-10-10', 'Dago', 'O', '085212349852', '1596587430269');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `jumlah_tagihan` varchar(255) DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `waktu_pembayaran` datetime DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_pasien`, `jumlah_tagihan`, `status_pembayaran`, `metode_pembayaran`, `waktu_pembayaran`, `signature`) VALUES
(18, 'Amanda', '70000', '1', 'Cash', '2022-12-13 05:21:15', '1670948452-1898718622');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis_header`
--

CREATE TABLE `rekam_medis_header` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tanggal_pemeriksaan` datetime NOT NULL,
  `keluhan` varchar(45) NOT NULL,
  `diagnosa` text NOT NULL,
  `resep` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis_header`
--

INSERT INTO `rekam_medis_header` (`id`, `id_pemeriksaan`, `nama_dokter`, `nama_pasien`, `tanggal_pemeriksaan`, `keluhan`, `diagnosa`, `resep`, `status`) VALUES
(14, 18, 'Dr. Dipati Ukur, Sp.B.', 'Amanda', '2022-12-17 00:00:00', 'Sesak nafas', 'Asma kambuh', 'Rhinos 3x1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `dosis` varchar(45) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_dokter`
--

CREATE TABLE `user_dokter` (
  `id_dokter` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_dokter`
--

INSERT INTO `user_dokter` (`id_dokter`, `username`, `password`) VALUES
(9, 'tubagus', '123'),
(10, 'dipatiukur', '123'),
(11, 'juanda', '123'),
(12, 'rezki', '123'),
(13, 'joni', '123'),
(18, 'aman', '123'),
(19, 'abdul', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_farmasi`
--

CREATE TABLE `user_farmasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_farmasi`
--

INSERT INTO `user_farmasi` (`id`, `nama`, `username`, `password`) VALUES
(3, 'Monica', 'monica', '123'),
(4, 'Teddy', 'teddy', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_pasien`
--

CREATE TABLE `user_pasien` (
  `id_pasien` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_pasien`
--

INSERT INTO `user_pasien` (`id_pasien`, `username`, `password`) VALUES
(3, 'yasin', '123'),
(4, 'dzaky', '123'),
(5, 'andre', '123'),
(6, 'amanda', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_pemeriksaan`
--
ALTER TABLE `order_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis_header`
--
ALTER TABLE `rekam_medis_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_dokter`
--
ALTER TABLE `user_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `user_farmasi`
--
ALTER TABLE `user_farmasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_pemeriksaan`
--
ALTER TABLE `order_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rekam_medis_header`
--
ALTER TABLE `rekam_medis_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_dokter`
--
ALTER TABLE `user_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_farmasi`
--
ALTER TABLE `user_farmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
