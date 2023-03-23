-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 17. 14:00
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
(1, 'Pest Vármegye', 3, 64, 'pestvarmegye'),
(2, 'Tolna Vármegye', 3, 32, 'tolnavarmegye'),
(3, 'Heves Vármegye', 3, 24, 'hevesvarmegye'),
(4, 'Veszprém Vármegye\n', 3, 84, 'veszpremvarmegye'),
(5, 'Bács-Kiskun Vármegye', 3, 43, 'bacskiskunvarmegye'),
(6, 'Baranya Vármegye', 3, 19, 'baranyavarmegye'),
(7, 'Békés Vármegye', 3, 34, 'bekesvarmegye'),
(8, 'Borsod-Abaúj-Zemplén Vármegye', 3, 70, 'borsodabaujzemplenvarmegye'),
(9, 'Csongrád-Csanád Vármegye', 3, 30, 'csongradcsanadvarmegye'),
(10, 'Fejér Vármegye', 3, 69, 'fejervarmegye'),
(11, 'Győr-Moson-Sopron Vármegye', 3, 40, 'gyormosonsopronvarmegye'),
(12, 'Hajdú-Bihar Vármegye', 3, 10, 'hajdubiharvarmegye'),
(13, 'Jász-Nagykun-Szolnok Vármegye', 3, 34, 'jasznagykunszolnokvarmegye'),
(14, 'Komárom-Esztergom Vármegye', 3, 76, 'komaromesztergomvarmegye'),
(15, 'Nógrád Vármegye', 3, 23, 'nogradvarmegye'),
(16, 'Somogy Vármegye', 3, 34, 'somogyvarmegye'),
(17, 'Szabolcs-Szatmár-Bereg Vármegye', 3, 21, 'szabolcsszatmarberegvarmegye'),
(18, 'Vas Vármegye', 3, 24, 'vasvarmegye'),
(19, 'Zala Vármegye', 3, 65, 'zalavarmegye');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megye_leiras`
--

CREATE TABLE `megye_leiras` (
  `id` int(20) NOT NULL,
  `megye_szoveg` varchar(1000) NOT NULL,
  `megye_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'Gyógynövény-ismeret Fehér-tónál', 4.0, 20, 70, 9, 'fehertoTura'),
(8, 'Nagy-Kopasz hegy', 10.5, 45, 88, 1, 'nagykopaszhegyTura'),
(9, 'Dobogókő', 7.5, 76, 68, 1, 'dobogokoTura'),
(10, 'Kőris-hegy', 5.0, 35, 22, 4, 'korishegyTura'),
(11, 'Gemenci erdő', 1.6, 20, 40, 2, 'gemencierdoTura'),
(12, 'Sötétvölgyi körtúra', 11.1, 50, 33, 2, 'sotetvolgyTura'),
(13, 'Négyszögletű Kerek Erdő tanösvény', 10.9, 26, 10, 2, 'negyszogletukerekerdotanosvenyTura'),
(14, 'Egerszalóki sódomb', 5.2, 25, 27, 3, 'egerszalokisodombTura'),
(15, 'Fátyol-vízesés', 6.3, 54, 34, 3, 'fatyolvizesesTura'),
(16, 'Sombokor-kör Kékes hegy', 4.6, 67, 90, 3, 'sombokorkorTura'),
(17, 'Alpári-rét', 6.2, 20, 11, 5, 'alpariretTura'),
(18, 'Petőfi-sziget', 2.2, 5, 35, 5, 'petofiszigetTura'),
(19, 'Pusztatemplom romjai', 12.7, 34, 26, 5, 'pusztatemplomromjaiTura'),
(20, 'Abaligeti barlang', 1.8, 70, 54, 6, 'abaligetibarlangTura'),
(21, 'Meleg-mányi-völgy', 15.0, 60, 78, 6, 'melegmanyivolgyTura'),
(22, 'Váraljai-völgy', 18.4, 78, 23, 6, 'varaljaivolgyTura'),
(23, 'Mályvádi barangolás', 20.7, 80, 35, 7, 'malyvadibarangolasTura'),
(24, 'Hársfasor', 3.2, 3, 12, 7, 'harsfasorTura'),
(25, 'Hantoskerti-holtág', 2.3, 23, 17, 7, 'hantoskertiholtagTura'),
(26, 'Kőtenger', 10.7, 30, 15, 8, 'kotengerTura'),
(27, 'Hegyestű Geológiai Bemutatóhely', 5.2, 20, 78, 8, 'hegyestugeologiaibemutatohelyTura'),
(28, 'Smaragdvölgyy', 13.7, 45, 23, 8, 'smaragdvolgyTura'),
(29, 'Kiskunsági Nemzeti Park', 20.7, 24, 56, 9, 'kiskunsaginemzetiparkTura'),
(31, 'Bölömbika tanösvény', 3.0, 35, 23, 9, 'bolombikatanosvenyTura'),
(32, 'Sárkány-tó', 5.7, 20, 10, 10, 'sarkanytoTura'),
(33, 'Ökoturisztikai Központ', 3.3, 15, 46, 10, 'okoturisztikaikozpontTura'),
(34, 'Csónakázó-tó', 6.0, 5, 70, 10, 'csonakazotoTura'),
(35, 'Bakonyszentlászló', 32.0, 87, 45, 11, 'bakonyszentlaszloTura'),
(36, 'Fertő-Hanság Nemzeti Park', 5.0, 25, 30, 11, 'fertohansagnemzetiparkTura'),
(37, 'Morotva-tavi tanösvény', 1.5, 15, 10, 11, 'morotvatavitanosvenyTura'),
(38, 'Gúti erdő', 6.1, 17, 16, 12, 'gutierdoTura'),
(39, 'Hármashegyi-kilátó', 12.6, 43, 30, 12, 'harmashegyikilatoTura'),
(40, 'Vekeri-tó', 6.8, 25, 32, 12, 'vekeritoTura'),
(41, 'Kunhalmok', 10.5, 45, 23, 13, 'kunhalmokTura'),
(42, 'Tisza-parti Tanösvény', 6.0, 34, 32, 13, 'tiszapartitanosvenyTura');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tura_leiras`
--

CREATE TABLE `tura_leiras` (
  `id` int(100) NOT NULL,
  `tura_szoveg` varchar(1000) NOT NULL,
  `tura_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- A tábla indexei `megye_leiras`
--
ALTER TABLE `megye_leiras`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `turak`
--
ALTER TABLE `turak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tura_leiras`
--
ALTER TABLE `tura_leiras`
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
-- AUTO_INCREMENT a táblához `megye_leiras`
--
ALTER TABLE `megye_leiras`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `turak`
--
ALTER TABLE `turak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT a táblához `tura_leiras`
--
ALTER TABLE `tura_leiras`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
