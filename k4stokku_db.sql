-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 04:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(1, 'Good Times Cookies dus', 100, 1200, 'Indo Grosir', 'Snack', '31 December 2022', '1 June 2022', 'Merk : Good Times Cookies\r\n1 Box isi 12 pcs @15gr\r\n', 14000, '', '', 'https://cf.shopee.co.id/file/a6ca3cb7c6947cb965b47df717e50844'),
(2, 'Indomie Goreng dus', 100, 118000, 'Indo Grosir', 'Makanan', '31 December 2022', '1 June 2022', 'Merk : Indomie Goreng 1 dus 1 box isi 40 pcs', 125000, '', '', 'https://cf.shopee.co.id/file/159e7d81de24e32f07ede8aa4cb275cd'),
(3, 'Minyak Goreng Sania 2 liter', 100, 45000, 'Indo Grosir', 'Bahan Masak', '31 December 2022', '1 June 2022', 'Merk : Sania\r\nBerat : 2 liter', 50000, '', '', 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2022/3/23/0e3b496c-1b6b-4c4d-aa8f-c34dc48824dc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
