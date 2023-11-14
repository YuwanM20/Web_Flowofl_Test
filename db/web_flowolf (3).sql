-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2023 at 02:05 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_flowolf`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `email`, `password`, `tanggal`) VALUES
(1, 'yuwan', 'yuwan@gmail.com', '$2y$10$Yh1uZBKOFIdGgvOkUB8NRes3s2CuxNo4/txBQwVBITVdKQdWLnM3y', '2023-06-11'),
(2, 'reyhan', 'reyhan@gmail.com', '$2y$10$8GPRNt5rdzqzABctAVJhgOhhz9TcY7lCdOTWxSHJ/SSY.P57/5d4i', '2023-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `kode_produk` varchar(200) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `pesan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `tanggal`, `pesan`) VALUES
(1, 'Gamuzo', '2023-06-11', 'Tempat keren untuk ngopi dan bersantai..'),
(2, 'yuan', '2023-06-12', 'tempatnya enak banget');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `kode_produk` char(20) NOT NULL,
  `nama_produk` char(20) NOT NULL,
  `jenis_produk` char(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`kode_produk`, `nama_produk`, `jenis_produk`, `harga`, `gambar`) VALUES
('MKN001', 'tahu balado', 'MAKANAN', 10000, 'Tahu Balado.png'),
('MKN003', 'roti maryam', 'MAKANAN', 10000, 'roti maryam.jpg'),
('MKN004', 'nasi pecel', 'MAKANAN', 8000, 'nasi pecel.webp'),
('MKN005', 'sayur bayam', 'MAKANAN', 12000, 'sayur bayam.jpg'),
('MKN006', 'bayam special', 'MAKANAN', 20000, 'bayam special.jpg'),
('MNM001', 'Teh Kotak', 'MAKANAN', 5000, 'Teh Kotak.jpg'),
('MNM002', 'Teh Poci', 'MINUMAN', 4000, 'Teh Poci.jpg'),
('MNM003', 'joshua', 'MINUMAN', 6000, 'joshua.jpg'),
('MNM004', 'kopi hitam', 'MINUMAN', 3000, 'kopi hitam.jpg'),
('MNM005', 'teh susu', 'MINUMAN', 5000, 'teh susu.webp'),
('MNM006', 'teh macha', 'MINUMAN', 9000, 'teh macha.jpg'),
('MNM007', 'Es Kopi Susu', 'MINUMAN', 10000, 'Es Kopi Susu.webp'),
('MNM008', 'kubisu', 'MINUMAN', 6000, 'kubisu.jpg'),
('SNK001', 'kripik kentang', 'SNACK', 2000, 'kripik kentang.jpg'),
('SNK003', 'krupuk tahu', 'SNACK', 1000, 'krupuk tahu.jpg'),
('SNK004', 'kripik bayam', 'SNACK', 2000, 'kripik bayam.png'),
('SNK005', 'kripik tales', 'SNACK', 1000, 'kripik tales.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`kode_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
