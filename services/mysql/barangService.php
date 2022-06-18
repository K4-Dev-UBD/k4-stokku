-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 03:09 PM
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
  `product_id` varchar(16) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `nama` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`nama`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*create table barang
(
product_id char(16) NOT NULL,
product_name text,
stock int NULL,
price int NULL,
asal text NULL,
jenis text NULL,
expired char(10) NULL,
tanggal_beli char(10) NULL,
deskripsi text NULL,
harga_jual int NULL,
created_date char(10) NULL,
updated_date char(10) NULL,
gambar text NULL
PRIMARY KEY (product_id)
)

create table jenis_barang (
nama text (16) NOT NULL
PRIMARY KEY (nama)
)*/