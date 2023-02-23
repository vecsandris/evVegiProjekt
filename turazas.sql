-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 08:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `turazas`
--

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `nev` varchar(100) NOT NULL,
  `jelszo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `jelszo`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `megye`
--

CREATE TABLE `megye` (
  `id` int(11) NOT NULL,
  `megye_nev` text NOT NULL,
  `turak_szama` int(100) NOT NULL,
  `megye_felkapottsag` int(100) NOT NULL,
  `megye_kep_nev` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `megye`
--

INSERT INTO `megye` (`id`, `megye_nev`, `turak_szama`, `megye_felkapottsag`, `megye_kep_nev`) VALUES
(1, 'Pest Vármegye', 8, 64, 'pestvarmegye'),
(2, 'Tolna Vármegye', 19, 32, 'tolnavarmegye'),
(3, 'Heves Vármegye', 6, 24, 'hevesvarmegye'),
(4, 'Veszprém Vármegye\n', 13, 84, 'veszpremvarmegye'),
(5, 'Bács-Kiskun Vármegye', 7, 43, 'bacskiskunvarmegye'),
(6, 'Baranya Vármegye', 8, 19, 'baranyavarmegye'),
(7, 'Békés Vármegye', 12, 34, 'bekesvarmegye'),
(8, 'Borsod-Abaúj-Zemplén Vármegye', 17, 70, 'borsodabaujzemplenvarmegye'),
(9, 'Csongrád-Csanád Vármegye', 6, 30, 'csongradcsanadvarmegye'),
(10, 'Fejér Vármegye', 10, 69, 'fejervarmegye'),
(11, 'Győr-Moson-Sopron Vármegye', 15, 40, 'gyormosonsopronvarmegye'),
(12, 'Hajdú-Bihar Vármegye', 3, 10, 'hajdubiharvarmegye'),
(13, 'Jász-Nagykun-Szolnok Vármegye', 7, 34, 'jasznagykunszolnokvarmegye'),
(14, 'Komárom-Esztergom Vármegye', 17, 76, 'komaromesztergomvarmegye'),
(15, 'Nógrád Vármegye', 4, 23, 'nogradvarmegye'),
(16, 'Somogy Vármegye', 6, 34, 'somogyvarmegye'),
(17, 'Szabolcs-Szatmár-Bereg Vármegye', 4, 21, 'szabolcsszatmarberegvarmegye'),
(18, 'Vas Vármegye', 5, 24, 'vasvarmegye'),
(19, 'Zala Vármegye', 10, 65, 'zalavarmegye');

-- --------------------------------------------------------

--
-- Table structure for table `turak`
--

CREATE TABLE `turak` (
  `id` int(11) NOT NULL,
  `tura_nev` text NOT NULL,
  `tura_hossza` float(100,3) NOT NULL,
  `tura_nehezseg` int(100) NOT NULL,
  `tura_felkapottsag` int(100) NOT NULL,
  `megye_id` int(100) NOT NULL,
  `tura_kep_nev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turak`
--

INSERT INTO `turak` (`id`, `tura_nev`, `tura_hossza`, `tura_nehezseg`, `tura_felkapottsag`, `megye_id`, `tura_kep_nev`) VALUES
(1, 'János-hegy', 11.000, 2, 89, 1, 0),
(2, 'Úrkúti-őskarszt TT', 6.500, 4, 21, 4, 0),
(3, 'Ámos-hegyi Pihenőerdő', 7.700, 3, 24, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `megye`
--
ALTER TABLE `megye`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turak`
--
ALTER TABLE `turak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `megye`
--
ALTER TABLE `megye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `turak`
--
ALTER TABLE `turak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
