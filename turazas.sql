-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 01. 14:08
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `turazas`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `nev` varchar(100) NOT NULL,
  `jelszo` varchar(100) NOT NULL,
  `user_kep_nev` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `jelszo`, `user_kep_nev`) VALUES
(1, 'admin', 'admin', ''),
(8, 'asd', 'asd', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megye`
--

CREATE TABLE `megye` (
  `id` int(11) NOT NULL,
  `megye_nev` text NOT NULL,
  `turak_szama` int(100) NOT NULL,
  `megye_felkapottsag` int(100) NOT NULL,
  `megye_kep_nev` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `megye`
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
-- Tábla szerkezet ehhez a táblához `turak`
--

CREATE TABLE `turak` (
  `id` int(11) NOT NULL,
  `tura_nev` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `tura_hossza` float(100,1) NOT NULL,
  `tura_nehezseg` int(100) NOT NULL,
  `tura_felkapottsag` int(100) NOT NULL,
  `megye_id` int(100) NOT NULL,
  `tura_kep_nev` varchar(111) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `turak`
--

INSERT INTO `turak` (`id`, `tura_nev`, `tura_hossza`, `tura_nehezseg`, `tura_felkapottsag`, `megye_id`, `tura_kep_nev`) VALUES
(1, 'János-hegy', 11.0, 2, 89, 1, 'janoshegyTura'),
(2, 'Úrkúti-őskarszt TT', 6.5, 4, 21, 4, 'urkutioskarsztTT_Tura'),
(3, 'Ámos-hegyi Pihenőerdő', 7.7, 3, 24, 4, 'amoshegyipihenoerdoTura'),
(4, 'Vulkán túra', 11.1, 56, 23, 18, 'vulkanTura'),
(5, 'Szent Imre vándorút', 10.0, 36, 13, 18, 'szentimrevandorutTura'),
(6, 'Forrás túra a Kőszegi hegységben', 26.0, 23, 47, 18, 'forrasTura'),
(7, 'Gyógynövény-ismeret Fehér-tónál', 4.0, 20, 70, 9, 'fehertoTura');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `megye`
--
ALTER TABLE `megye`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `turak`
--
ALTER TABLE `turak`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `megye`
--
ALTER TABLE `megye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `turak`
--
ALTER TABLE `turak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
