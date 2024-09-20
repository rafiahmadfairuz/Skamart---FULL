-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2024 at 04:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbskamart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `kode_user` int NOT NULL,
  `kode_barang` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `kode_barang` int NOT NULL,
  `kode_kategori` int DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `keterangan_detail` text,
  `satuan` varchar(50) DEFAULT NULL,
  `diskon` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_gambar`
--

CREATE TABLE `master_gambar` (
  `kode_gambar` int NOT NULL,
  `kode_barang` int DEFAULT NULL,
  `varian` varchar(255) DEFAULT NULL,
  `url_gambar` varchar(255) NOT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `jumlah_stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_kategori`
--

CREATE TABLE `master_kategori` (
  `kode_kategori` int NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `url_gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_rating`
--

CREATE TABLE `master_rating` (
  `kode_rating` int NOT NULL,
  `kode_barang` int DEFAULT NULL,
  `nilai` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `kode_user` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`kode_user`, `username`, `email`, `password`, `create_add`) VALUES
(1, 'admin', 'admin@gmail.com', '12345678', '2024-09-16 05:27:40'),
(2, 'rafi', 'rafi@gmail.com', '139c4e89cdbedaf144d05ca54a12a57b', '2024-09-16 05:32:02'),
(3, 'rodri', 'rodri@gmail.com', '$2y$10$CgMw1csXBN20VctqyMiS4ureVwr0hl3y/GtDe/vxGA5KRjCTFnBCq', '2024-09-16 14:07:27'),
(4, 'rodri', 'rr@gmail.com', '$2y$10$ihe9clG2ApM0j0dj5nUKhedhEplAtCS.gAcoN7xdBYDtmVpPfQ3VK', '2024-09-18 11:00:10'),
(5, 'joko', 'joko@gmail.com', '$2y$10$kVAE04W0V3nCu5ZSOOKzZeABSntc01fNPA7ud.bVJ9vMvFFAuV1g2', '2024-09-18 11:01:00'),
(6, 'raf', 'ter@gmail.com', '$2y$10$g.FoSQ2IdeYXt/YuMKf70eg52JNe1cXGLJwLbWPLs5IhnmVFAwxaa', '2024-09-19 12:08:02'),
(7, 'Rafi\' Ahmad Fairuz', 'dd@gmail.com', '$2y$10$IxjvpoSbwXv5ADZL8zf2FOG.5oHYCaDBGK99pLZIhFKwQjciIKa6m', '2024-09-19 12:12:27'),
(8, 'Rafi\' Ahmad Fairuz', 'dd@gmail.com', '$2y$10$UyxFaj1l55VaB.p7t/zB6O5h5pDD8OMeth.nfOenowKq9Vcl6I7Hq', '2024-09-19 12:14:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_user` (`kode_user`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `master_gambar`
--
ALTER TABLE `master_gambar`
  ADD PRIMARY KEY (`url_gambar`),
  ADD UNIQUE KEY `kode_gambar` (`kode_gambar`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `master_kategori`
--
ALTER TABLE `master_kategori`
  ADD PRIMARY KEY (`kode_kategori`),
  ADD KEY `url_gambar` (`url_gambar`);

--
-- Indexes for table `master_rating`
--
ALTER TABLE `master_rating`
  ADD PRIMARY KEY (`kode_rating`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `master_gambar`
--
ALTER TABLE `master_gambar`
  MODIFY `kode_gambar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `master_kategori`
--
ALTER TABLE `master_kategori`
  MODIFY `kode_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_rating`
--
ALTER TABLE `master_rating`
  MODIFY `kode_rating` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `kode_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `master_barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`kode_user`) REFERENCES `master_user` (`kode_user`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD CONSTRAINT `master_barang_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `master_kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_gambar`
--
ALTER TABLE `master_gambar`
  ADD CONSTRAINT `fk_kode_barang` FOREIGN KEY (`kode_barang`) REFERENCES `master_barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_kategori`
--
ALTER TABLE `master_kategori`
  ADD CONSTRAINT `master_kategori_ibfk_2` FOREIGN KEY (`url_gambar`) REFERENCES `master_gambar` (`url_gambar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_rating`
--
ALTER TABLE `master_rating`
  ADD CONSTRAINT `fk_kode_barangg` FOREIGN KEY (`kode_barang`) REFERENCES `master_barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
