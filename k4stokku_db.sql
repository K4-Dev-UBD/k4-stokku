-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 07:45 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k4stokku_db`
--

DROP TABLE IF EXISTS barang, jenis_barang;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `asal` text NOT NULL,
  `jenis` text NOT NULL,
  `expired` text NOT NULL,
  `tanggal_beli` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_date` text NOT NULL,
  `updated_date` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`product_id`, `product_name`, `stock`, `price`, `asal`, `jenis`, `expired`, `tanggal_beli`, `deskripsi`, `harga_jual`, `created_date`, `updated_date`, `gambar`) VALUES
(1, 'Good Times Cookies dus', 100, 1200, 'Indo Grosir', 'snack', '31 December 2022', '1 June 2022', 'Merk : Good Times Cookies\r\n1 Box isi 12 pcs @15gr\r\n', 14000, '', '', 'https://cf.shopee.co.id/file/a6ca3cb7c6947cb965b47df717e50844'),
(2, 'Indomie Goreng 1 dus', 100, 118000, 'Indo Grosir', 'makanan', '31 December 2022', '1 June 2022', 'Merk : Indomie Goreng 1 dus 1 box isi 40 pcs', 125000, '', '', 'https://cf.shopee.co.id/file/159e7d81de24e32f07ede8aa4cb275cd');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `nama`) VALUES
(1, 'minuman'),
(2, 'makanan'),
(3, 'snack');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
