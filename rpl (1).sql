-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 07:09 AM
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
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_review` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(10) NOT NULL,
  `tinggi` int(10) NOT NULL,
  `lebar` int(10) NOT NULL,
  `panjang` int(10) NOT NULL,
  `kategori` text NOT NULL,
  `promo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_review`, `harga`, `gambar`, `deskripsi`, `stok`, `tinggi`, `lebar`, `panjang`, `kategori`, `promo`) VALUES
(1, 'Jam Tangan Pria', 0, 350000, '1.jpg', 'Jam tangan elegan untuk pria.', 3, 15, 5, 2, 'Fashion Pria', 0),
(2, 'T-Shirt Pria', 0, 50000, '2.jpg', 'T-Shirt monokrom untuk pria', 5, 50, 20, 100, 'Fashion Pria', 0),
(3, 'Gaun Wanita', 0, 90000, '3.jpg', 'Gaun bergaris untuk wanita', 2, 40, 15, 80, 'Fashion Wanita', 0),
(4, 'Kamera DSLR', 0, 5499000, '4.jpg', 'Kamera DSLR beresolusi tinggi. Cocok untuk memotret gambar Ultra HD.', 2, 20, 10, 15, 'Gadget', 0),
(5, 'Bola Sepak Bliter', 0, 40000, '5.jpg', 'Bola sepak bliter untuk permainan futsal atau sepak bola.', 10, 25, 25, 25, 'Olahraga', 0),
(6, 'Kaos Anak', 0, 30000, '6.jpg', 'Baju kaos anak bermotif mobil-mobilan.', 6, 30, 10, 50, 'Fashion Anak', 0),
(7, 'Lipstik', 0, 25000, '7.jpg', 'Lipstik wanita berwarna merah.', 15, 5, 2, 2, 'Fashion Wanita', 0),
(8, 'Brush Makeup', 0, 15000, '8.jpg', 'Brush untuk makeup wanita.', 10, 10, 3, 3, 'Fashion Wanita', 0),
(9, 'iPod Black', 0, 1000000, '9.jpg', 'iPod Apple berwarna hitam', 2, 7, 5, 3, 'Gadget', 0),
(10, 'iPhone 6', 0, 3999999, '10.jpg', 'iPhone 6 berwarna putih.', 4, 8, 3, 2, 'Gadget', 0),
(11, 'Galaxy S8', 0, 5300000, '11.jpg', 'Samsung Galaxy S8 berbasis Android 7.0 berwarna hitam', 1, 14, 6, 1, 'Gadget', 0),
(12, 'MacBook Air', 0, 11500000, '12.jpg', 'MacBook Air dari Apple berwarna putih edisi terbaru', 3, 50, 2, 1, 'Gadget', 0),
(13, 'EarPods Apple', 0, 50000, '13.jpg', 'EarPods terbaru dari Apple berwarna putih.', 6, 50, 2, 1, 'Gadget', 0),
(14, 'Gamis Muslim Pria', 0, 120000, '14.jpg', 'Gamis Muslim Pria cocok digunakan untuk sholat dan kajian.', 5, 40, 30, 150, 'Fashion Pria', 0),
(15, 'DVD Player', 0, 400000, '15.jpg', 'DVD Player yang dapat dibawa kemana-kemana.', 1, 20, 10, 4, 'Gadget', 0),
(16, 'Mouse Wireless', 0, 70000, '16.jpg', 'Mouse Wireless berwarna merah dan elegan.', 8, 5, 3, 3, 'Gadget', 0),
(17, 'Sepatu Pria', 0, 250000, '17.jpg', 'Sepatu Pria berwarna Hitam', 2, 20, 7, 5, 'Fashion Pria', 0),
(18, 'Handuk Mandi', 0, 35000, '18.jpg', 'Handuk untuk mandi tersedia berbagai warna', 9, 199, 49, 1, 'Rumah Tangga', 0),
(19, 'Jas Pria', 0, 200000, '19.jpg', 'Jas pria cocok digunakan dalam acara formal.', 2, 40, 30, 100, 'Fashion Pria', 0),
(20, 'Keyboard Wireless', 0, 150000, '20.jpg', 'Keyboard Wireless berwarna hitam.', 3, 30, 10, 4, 'Gadget', 0),
(21, 'iPad', 0, 5350000, '21.jpg', 'iPad Apple berwarna hitam', 1, 30, 15, 2, 'Gadget', 0),
(22, 'Sabun Cuci Piring', 0, 20000, '22.jpg', 'Sabun Cuci Piring dengan aroma lemon.', 10, 5, 3, 15, 'Rumah Tangga', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `komentar` text NOT NULL,
  `rating` int(5) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_barang`, `komentar`, `rating`, `username`) VALUES
(1, 1, 'wah bagus bangke', 3, 'nurdin');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah_barang` int(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `id_review` int(100) NOT NULL,
  `status` text NOT NULL,
  `bukti_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `photo` varchar(250) NOT NULL,
  `status_pengguna` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `no_hp`, `password`, `nama`, `photo`, `status_pengguna`) VALUES
('root', 'mashabulkahfi8@gmail.com', 2147483647, '', 'Muhammad Ashabul Kahfi', '', 0),
('', '', 0, '', '', '', 0),
('mashabulka', 'mashabulkahfi8@gmail.com', 2147483647, 'k4c4b354r', 'Muhammad Ashabul Kahfi', '', 0),
('kulaku', 'kulaku8@gmail.com', 0, 'kulaku1234', 'kulaku', '', 0),
('nurdin', 'mamam', 11910, 'nurdin1234', 'sasa', '', 0),
('syafi123', 'syafi123', 1010101, 'syafi', 'syafi', '', 0),
('koclak', '', 0, 'koclak123', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
