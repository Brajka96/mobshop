-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2019 at 10:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brendovi`
--

CREATE TABLE `brendovi` (
  `id` int(100) NOT NULL,
  `naziv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brendovi`
--

INSERT INTO `brendovi` (`id`, `naziv`) VALUES
(1, 'HTC'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'ZTE'),
(7, 'Huawei');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `ID` int(20) NOT NULL,
  `IME` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `PREZIME` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `KORISNICKO_IME` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `SIFRA` varchar(50) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ID`, `IME`, `PREZIME`, `EMAIL`, `KORISNICKO_IME`, `SIFRA`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'Josip', 'Brajkovic', 'brajka55@gmail.com', 'brajka', 'brajka'),
(3, 'Ante', 'Bule', 'bule@gmail.com', 'bule', 'bule'),
(4, 'Josip', 'Pasalic', 'josip@gmail.com', 'josip', 'josip'),
(5, 'Petar', 'Grubisic', 'petar@gmail.com', 'petar', 'petar');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id` int(50) NOT NULL,
  `slika` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `ime` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `cijena` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uredaji`
--

CREATE TABLE `uredaji` (
  `uredaj_id` int(20) NOT NULL,
  `uredaj_ime` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `uredaj_brend` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `uredaj_cijena` decimal(8,2) NOT NULL,
  `uredaj_ram` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `uredaj_kapacitet` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `uredaj_kamera` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `uredaj_slika` varchar(100) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `uredaji`
--

INSERT INTO `uredaji` (`uredaj_id`, `uredaj_ime`, `uredaj_brend`, `uredaj_cijena`, `uredaj_ram`, `uredaj_kapacitet`, `uredaj_kamera`, `uredaj_slika`) VALUES
(1, 'Samsung S9', 'samsung', '1250.00', '8GB', '128GB', '16MP', 'samsung-s9.png'),
(2, 'Honor 9 Lite', 'honor', '599.00', '8GB', '64GB', '16MP', 'honor.png'),
(3, 'Iphone 6', 'apple', '550.00', '4GB', '32GB', '14MP', 'iphone6.png'),
(6, 'Zte blade axon 7', 'ZTE', '499.99', '4GB', '8GB', '12MP', 'zte-blade-axon-7.jpg'),
(8, 'Huawei P20', 'huawei', '1199.99', '8GB', '128GB', '19MP', 'huawei-p20.png'),
(9, 'Iphone X', 'apple', '1399.99', '8GB', '128GB', '16MP', 'iphone-x.png'),
(10, 'Samsung S8', 'samsung', '799.00', '8GB', '64GB', '16MP', 'samsung-s8.png'),
(11, 'Iphone 7', 'apple', '899.99', '8GB', '64GB', '16MP', 'iphone-7.png'),
(12, 'Sony Xperia XZ1 Compact LTE 32GB', 'sony', '549.99', '4GB', '32GB', '19MP', 'xperia-xz1.png'),
(33, 'Xiaomi Mi 8 Black', 'xiaomi', '799.99', '8GB', '64GB', '12MP', 'xiaomi-mi-8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brendovi`
--
ALTER TABLE `brendovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uredaji`
--
ALTER TABLE `uredaji`
  ADD PRIMARY KEY (`uredaj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brendovi`
--
ALTER TABLE `brendovi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `uredaji`
--
ALTER TABLE `uredaji`
  MODIFY `uredaj_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
