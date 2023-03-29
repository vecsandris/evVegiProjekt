-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 27. 14:57
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
  `user_kep_id` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `jelszo`, `user_kep_id`) VALUES
(1, 'admin', 'admin', '1'),
(8, 'asd', 'ísyadSADASD', '1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok_tura`
--

CREATE TABLE `felhasznalok_tura` (
  `id` int(11) NOT NULL,
  `felhasznalo_id` int(254) NOT NULL,
  `tura_id` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- A tábla adatainak kiíratása `megye_leiras`
--

INSERT INTO `megye_leiras` (`id`, `megye_szoveg`, `megye_id`) VALUES
(1, 'A térség a magyarországi turisztikai régiók közül a Budapest–Közép-Duna-vidék régiókba tartozik, fő vonzerejét a számtalan műemlék, a természetvédelmi területek és azok kirándulóövezetei, a hangulatos macskaköves utcás Szentendre műemlékei, a Dunakanyar és települései, a Börzsöny, az erdővel borított hegyek és a már az Alföld részét képező síkságok és annak városai jelentik.', 1),
(2, 'A Tolna vármegye Magyarország déli részén helyezkedik el, és számos gyönyörű túraútvonalat kínál a természet szerelmeseinek. Az alábbiakban néhány érdekes túralehetőséget mutatok be', 2),
(3, 'Heves vármegye Magyarország északkeleti részén található, és a Mátra- és a Bükk-hegység között helyezkedik el. A terület gazdag természeti kincsekben, gyönyörű tájakban, erdőkben, völgyekben és hegyekben.', 3),
(4, 'Veszprém vármegye Magyarország nyugati részén, a Bakony-hegység és a Balaton-felvidék között található. A terület gazdag természeti kincsekben, gyönyörű tájakban, erdőkben, tavakban és völgyekben.', 4),
(5, 'Bács-Kiskun vármegye Magyarország déli részén található, és gazdag természeti kincsekben, változatos tájban, sík vidékeken és dombokban gazdag terület.', 5),
(6, 'Baranya vármegye Magyarország dél-délnyugati részén található, a Dél-Dunántúli régióban. A terület gazdag természeti kincsekben, változatos tájban, hegyekben, völgyekben, erdőkben és folyókban.', 6),
(7, 'Békés vármegye Magyarország délkeleti részén található, a Dél-Alföldön. A területen számos érdekes természeti látnivaló található', 7),
(8, 'Borsod-Abaúj-Zemplén vármegye Magyarország északkeleti részén található, és számos különböző természeti jelenséget kínál.', 8),
(9, 'Csongrád-Csanád vármegye Magyarország délkeleti részén található, a Dél-Alföldön. A terület változatos természeti kincseket rejt.', 9),
(10, 'Fejér vármegye Magyarország középső részén található, és sokféle természeti kincset rejt magában.', 10),
(11, 'Győr-Moson-Sopron vármegye Magyarország nyugati részén található, és rengeteg természeti értékkel rendelkezik. A vármegye területén találhatók hegyvidékek, völgyek, folyók, erdők, tavak és termálvizek.', 11),
(12, 'Hajdú-Bihar vármegye Magyarország keleti részén található, és rengeteg természeti látnivalót kínál. A vármegye területén találhatók síkságok, folyók, erdők és termálvizek.', 12),
(13, 'Jász-Nagykun-Szolnok vármegye Közép-Magyarország keleti részén található, és rengeteg természeti értékkel rendelkezik. A vármegye területén találhatók síkságok, folyók, erdők, tavak és termálvizek.', 13),
(14, 'Komárom-Esztergom megye a Dunakanyarban, a Duna magyarországi szakaszának északi részén található. A megye gazdag természeti látnivalókkal rendelkezik. A területen találhatóak hegyek, folyók, szurdokok, barlangok és vizek.', 14),
(15, 'Nógrád megye északi Magyarországon található, ahol a természet szépségei minden évszakban megcsodálhatóak. A megye területén találhatók hegyek, barlangok, folyók és tavak, melyek minden korosztály számára érdekes és szórakoztató kikapcsolódási lehetőséget kínálnak.', 15),
(16, 'Somogy megye a Dél-Dunántúlon található, és a Balaton-felvidék és a Duna-Dráva Nemzeti Park között helyezkedik el. A megye területén rengeteg természeti szépség található, melyeket érdemes felfedezni.', 16),
(17, 'Szabolcs-Szatmár-Bereg megye a Kelet-Magyarországi régióban található. A megye területe nagyrészt síkvidék, de a megye északi részén találhatók az Északi-középhegység keleti szélén fekvő hegyvidéki tájegységek is. Az alábbiakban részletesen bemutatjuk a megye természeti jellegzetességeit.', 17),
(18, 'Vas vármegye az ország nyugati részén található, az Alpokalján fekszik, és gazdag természeti kincseket rejt. A vidék hegyvidéki és dombvidéki területekkel rendelkezik, számos erdővel, patakkal, folyóval és tavakkal.', 18),
(19, 'Zala vármegye Nyugat-Magyarországon található, és számos természeti kincset rejt magában. A vidék főként dombvidéki területekből áll, amelyek között nagy számban találhatóak erdők, tavak, folyók és termálvizek.', 19);

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
(42, 'Tisza-parti Tanösvény', 6.0, 34, 32, 13, 'tiszapartitanosvenyTura'),
(43, 'Rákóczifalu és kőrnyéke', 8.2, 23, 11, 13, 'rakoczifalueskornyekeTura'),
(44, 'Szelim-barlang', 15.6, 78, 56, 14, 'szelimbarlangTura'),
(45, 'Bokodi tó', 6.7, 10, 45, 14, 'bokoditoTura'),
(46, 'Őr-hegy és festői sziklaszirt', 6.7, 10, 45, 14, 'orhegyesfestoisziklaszirtTura'),
(47, 'Gyadai tanösvény', 12.8, 25, 76, 15, 'gyadaitanosvenyTura'),
(48, 'Páris-patak', 15.8, 45, 54, 15, 'parispatakTura'),
(49, 'Ipolytarnóci bemutatóhely', 5.8, 13, 88, 15, 'ipolytarnocibemutatohelyTura'),
(50, 'Balatonszárszó', 2.8, 5, 26, 16, 'balatonszarszoTura'),
(51, 'Zalavár', 14.3, 36, 39, 16, 'zalavarTura'),
(52, 'Deseda-tó', 7.8, 39, 69, 16, 'desedatoTura'),
(53, 'Kaszonyi-hegy és bányató', 21.3, 67, 43, 17, 'kaszonyihegyesbanyatoTura'),
(54, 'Tarpai Nagy-hegy', 12.5, 45, 16, 17, 'tarpainagyhegyTura'),
(55, 'Túristvándi falu', 5.3, 28, 71, 17, 'turistvandiTura'),
(56, 'Horhosok-útja', 6.9, 42, 19, 19, 'horhosokutjaTura'),
(57, 'Csácsbozsoki Arborétum', 17.1, 76, 89, 19, 'csacsbozsokiarboretumTura'),
(58, 'Aranyoslapi forrás', 3.7, 6, 18, 19, 'aranyoslapiforrasTura');

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
-- A tábla adatainak kiíratása `tura_leiras`
--

INSERT INTO `tura_leiras` (`id`, `tura_szoveg`, `tura_id`) VALUES
(1, 'Közepesen nehéz gyalogtúra, a János-hegyre felvezető szerpentinút egy részén meredek lépcsőkön kell felkapaszkodni, a Nagy-Hárs-hegyen pedig egy közepes, de rövid kaptató vár ránk. Az út végig kitűnően jelzett turistautakon halad. Vízvételi lehetőség a János-hegy nyergében álló nyomós kútból van, ugyanitt és a Szépjuhászné vasútállomás épületében büfét is találunk.\n\nA túraútvonal Budapest területén vezet, de szinte végig turistautakon, ösvényeken megyünk, a megfelelő lábbeliről, egy csúszásmentes profilú talppal ellátott túracipő nélkülözhetetlen a kiránduláshoz. A meredek szakaszokon pedig igencsak jól jöhet egy pár profi túrabot. Komfort érzetünk megőrzése érdekében ajánlott egy jól szellőző, gyorsan száradó technikai pólót viselnünk.', 1),
(2, 'Széles, kényelmes, jól jelzett turistautak, a Tarnai pihenőhöz rövid, közepes emelkedő. Vízvételi lehetőség útközben nincs, vigyünk magunkkal kellő mennyiségű folyadékot. Egy közepes méretű hátizsákba könnyedén bele tudjuk pakolni az inni- és ennivalót, hűvösebb napokon pedig még egy meleg polár felső is jól jöhet. Egy mozgást nem akadályozó, strapabíró, kényelmes, funcionális túranadrágban pedig igazán jól érezhetjük magunkat a kiránduláson. ', 8),
(3, 'A Dunántúli-középhegység, és ezen belül a Bakony területén a bauxitbányászat számos kréta időszak végi óriás méretű őskarsztos formát tárt fel, mivel az érc ezekben található. Néhány kivételtől eltekintve (Darvas-tó, Iharkút, Gánt) ezeket meddővel visszatemették és felszínüket többé-kevésbé tájrendezték, csak térképek, fotók és szöveges kutatási jelentések formájában őrződtek meg róluk dokumentumok. A fent említett látogatható – és részben természeti területként védett – karsztbauxitos külfejtések formakincse más jellegű, mint az úrkúti. Ehhez még leginkább a hajdani Iharkút falu alatt talált mélytöbrös, óriás víznyelős karsztformák hasonlítottak, de hosszabb távon – bemutatási céllal – ezeket sem lehetett megőrizni, mert a fekükőzetet képező, töredezett triász fődolomit érzékeny a fagyaprózódásra, így néhány év alatt a töbrök közel függőleges falai leomlottak, mélyedései fokozatosan feltöltődtek.', 2),
(4, 'Eplényt a 2003-ban átadott Ámos-hegyi Pihenőerdő teszi egész évben vonzóvá.\r\nA tanösvény teljes hossza 7700 m, két egymástól függetlenül is végigjárható 3590 m illetve 4180 m hosszúságú körutat tartalmaz. A sétaút mellett elhelyezett padok pihenést, a sípálya parkolójában és a sportpályánál kialakított pihenőhely kultúrált szabadidő eltöltést tesznek lehetővé (szalonnasütés, stb.). A környező táj panorámájában 8 m magas kilátóból gyönyörködhetnek a látogatók.', 3),
(5, 'Igen csak erőt próbáló, hagyományos téli túránkra invitálunk Benneteket immár 18. alkalommal egyik kedvenc hazai hegységünkbe, a Börzsönybe. A túra célja, hogy a résztvevőket végig kalauzolja a miocén kori vulkán kalderáján, és egyben tisztelegjen a nagyszerű ember és geológus Breuer László, alias SUMI emléke előtt.', 4),
(6, 'Az útvonal által bejárt terület eléggé kiesik a turizmus látószögéből. Dövényi Zoltán tájbeosztása szerint, ez a Rába-völgyétől Észak felé eső alacsony dombság, a Felső-Őrség. Érdekes, hogy ugyanezen lehatárolásban az Őrség, mint földrajzi táj nem létezik. Az Őrség nem földrajzi, hanem néprajzi táj, melyhez a Felső-Őrség látszólag nem igazán hasonlít, a lehatárolás is kissé kényszeres, ugyanis a dombok északi oldalai néhol már Osztrák területre esnek. Bár a legmagasabb pont eléri a 350 méteres magasságot, a Rába viszont itt 200 méter felett folyik, így a relatív magasság nem túl nagy. Ez Kelet felé pedig még jobban csökken. Az útvonal érint egy országos jelentőségű védett természeti területet is (Nemesmedves történelmi emlékhely TT), karbantartója és a túramozgalom kiírója a Hegyek Vándorai Turista Egyesület.', 5),
(7, 'A Kőszegi-hegység Kőszeg felőli környékének legszebb turistacélpontjait fűzi össze egy könnyű gyalogtúrába kirándulásunk. A város felett magasodó bájos Kálvária után bizarr sziklaalakzatokat érintve mászunk fel a Kőszeg első várának otthont adó, csodálatos kilátást nyújtó Óház-tetőre, ahonnan leereszkedünk a hegység egyik legnépszerűbb kirándulóhelyére, a Hétforráshoz, majd az egykori Vasfüggönyt szorosan követve térünk vissza a városba.', 6),
(8, 'Magyarország legnagyobb kiterjedésű, 14 km2 nagyságú szikes tava, amelyet a 20. század első harmadában halastórendszerré alakítottak. Növényzete, de különösen rendkívül gazdag, 280 fajt számláló madárvilága miatt fokozottan védett terület, a Kiskunsági Nemzeti Park része. A táj változásait és a tó élővilágát bemutató Tisza-völgyi bemutatóház Szatymazon, az E75-ös út mellett található. A kiállítás megtekintése mellett érdemes végigsétálni a Sirály tanösvényen, melynek egyik állomása a Beretzk kilátó. Innen a Fehér-tó madárvilágát, kiemelten a Korom-sziget sirálytelepét lehet jól megfigyelni. A mintegy két kilométeres túraútvonal csak vezetővel látogatható. Szintén a bemutatóháztól indulnak a darvak esti húzásának megfigyelésére induló szervezett túrák az őszi vonulási időszakban.', 7),
(9, 'Dobogókő elsősorban kitűnő megközelíthetősége, és nagyszerű panorámát nyújtó kilátóhelyei miatt népszerű célpont, télen, megfelelő hóviszonyok esetén lesiklópályáját is sokan látogatják. A hegy, monumentális sziklákkal teletűzdelt északi oldalában vezető látványos Thirring-körút a hegység egyik legizgalmasabb túraútvonala.', 9),
(10, 'Változatos körtúra a Bakony turisztikai központjából, Bakonybélből a hangulatos Gerence-völgyön keresztül a hegység legmagasabb, kilátótoronnyal koronázott csúcsára, a Kőris-hegyre (709 m). Romantikus völgyek, fenséges bükkösök, káprázatos kilátás vár minket a Bakony egyik legszebb vidékén.', 10),
(11, 'Gemenc, Szekszárdhoz legközelebb eső része, a Holt-Sió partja menti Keselyűsi erdő, melyet a 2014-ben kialakított Fekete Gólya tanösvényen kényelmesen fedezhetünk fel. A rövid, látványos útvonal a Keselyűsi Fogadóépülettől indul, az ártéri keményfás ligeterdő tekintélyes példányai közt kanyarogva, a Holt-Sió partján tér vissza. Ráadásként elsétálhatunk még a Sárosi madármegfigyelő toronyhoz is.', 11),
(12, 'Szekszárd közkedvelt kirándulóhelyéről, a Sötét-völgyből induló körtúránkon végigjárjuk a várostól nyugatra emelkedő Szekszárdi-dombság legszebb helyeit. Erdők, rétek, szőlők közt, utunk legérdekesebb szakaszán,  az impozáns löszmélyúton, a Szarvas-szurdikban kapaszkodunk fel a vidék legmagasabb pontjára, a mesés kilátást nyújtó Bati-kereszt-kilátótoronyba.  A bővizű Haramia-forrás érintésével ereszkedünk vissza, a Dél-Dunántúli Kéktúra útvonalán, a szubmontán bükkössel borított, hangulatos Sötét-völgybe.', 12),
(13, 'Kisszékely, az ország egyik legszebb fekvésű faluja, a Tolnai-Hegyhát északi részén, a Nagyszékelyi- és a Kisszékelyi-erdő között a Kisszékelyi-patak völgyében fekszik. Az idilli, dimbes-dombos, bukolikus táj szépségeinek felfedezését nagyban megkönnyíti a helyi kezdeményezéssel kialakított, példaértékű tanösvény, mely Lázár Ervin híres meséjéről, a Négyszögletű Kerek Erdőről kapta nevét. A négy, külön is bejárható részből álló, kitűnően jelzett, 22 állomásos tanösvény a falu nevezetességeit és a környék legszebb helyeit fűzi láncra, összekötve a település feletti kilátóhelyeket.', 13),
(14, 'Egerszalók igazi nevezetessége a község déli részén a föld mélyéből feltörő hévízforrás, mely 65-68 °C-os. A domboldalon lefolyó víz 1200 négyzetméteres látványos mészkőlerakódást épített, ami Európában egyedülálló. A sódomb helyi védelem alatt áll, kiépített sétaúton lehet megközelíteni, sötétedés után a szivárvány színeiben pompázik. Látogatható bármikor, önállóan, belépőjegy nélkül.', 14),
(15, 'Népszerűségét elsősorban egyedülállóan szép természeti környezetének, jó megközelíthetőségének, kitűnő infrastruktúrájának, megbízható kisvasútjának, igazi gyerek- és családbarát aktivitásainak és számtalan étkezési és vásárlási lehetőségeinek köszönheti.', 15),
(16, 'Ezt a túrát azok számára ajánljuk, akik egyénileg szeretnének hosszabb, rövidebb túrákat tenni a Kékes környékén. A Sombokor kör elnevezésű túra alkalmával a túrázók egy viszonylag könnyű, néhány óra alatt teljesíthető körsétán vehetnek részt Kékestető északi oldalában.', 16),
(17, 'A festői szépségű szikrai Holt-Tisza és Tőserdő ugyan a nemzeti park legkisebb területe, de bámulatos környezetével, ártéri mocsaraival, gazdag állatvilágával a lehető legnagyobb élményt nyújtja látogatói számára. Az árvízjárta Alpári-rét élővilága igen gazdag. A hullámtereken szokásos nyár- és fűzligeteket találunk. Erre épül a híres kosár- és vesszőfonó hagyomány. A festői szépségű szikrai Holt-Tisza és Tőserdő ugyan a nemzeti park legkisebb területe, de bámulatos környezetével, ártéri mocsaraival, gazdag állatvilágával a lehető legnagyobb élményt nyújtja látogatói számára. Az árvízjárta Alpári-rét élővilága igen gazdag. A hullámtereken szokásos nyár- és fűzligeteket találunk. Erre épül a híres kosár- és vesszőfonó hagyomány.', 17),
(18, 'Az üdülőparadicsommá vált Petőfi-szigetet a Sugovica holtágon átívelő híd köti össze a belvárossal. Szálloda, panziók, kemping, vendéglők, ifjúsági tábor, teniszpálya, sportuszoda várja a turistákat szép környezetben. A szigeten kajak- és kenubérlésre, strandolásra és horgászásra is van lehetőség.', 18),
(19, 'A város a hajdani Ős-Duna törmelékkúpján települt, határában ligetes, erdős táj volt. A homok területi megnövekedése csak későbbi természeti események következménye.Lajosmizse területén már a bronzkorban éltek emberek. Honfoglalás kori leletek kerültek elő Bene területéről. Az első településeket a tatárjárás után a kunok létesítették. A kunok szervezetileg hét ún. széket alkottak, ezek egyike volt Mizseszék, amely egyben székkapitánysági székhely is lett.', 19),
(20, 'Az Abaligeti-barlang ismert és népszerű látnivalója, természeti értéke a Mecseknek, 1982 óta áll fokozott védelem alatt. A járat teljes szakaszán patak folyik. Bár az emberi szem számára nem látható, de a víz eróziós hatására a cseppkőbarlang folyamatosan változik. A barlang melletti épületben egy érdekes denevérmúzeumot is találunk, a romantikus Abaligeti-tavon csónakot is bérelhetünk, és kellemes sétautakon kerülhetjük meg a fűzfákkal határolt tavacskát.', 20),
(21, 'A Mecsek egyik legszebb túraútvonala a vízben gazdag hegység leghangulatosabb völgyeiben, a mésztufalépcsőkkel tűzdelt Meleg-mányi-völgyben, és a vadregényes Nagy-Mély-völgyben vezet keresztül, érintve a Mecsek legnagyobb vízesését, az Ágnes-vízesést. A könnyen megközelíthető Dömörkaputól induló változatos körtúra minden évszakban csodás, a kora tavaszi medvehagyma mezők még különlegessebbé teszik az élményt.', 21),
(22, 'Túránk az öreg bányász múlttal rendelkező Váraljáról indul. Ajelzésen haladunk kifelé a faluból, mielőtt kiérnénk a Bánya-múzeum előtt gyalogolunk el. A falut magunk mögött hagyva egy nagyon szép, kiszélesedő tisztáson találjuk magunkat, amelynek határában patak csordogál. A patakon az oda látogatók szórakoztatására duzzasztottak fel két kellemes tavat, horgászni is lehet bennük. Az erdőszélen pihenő van padokkal, asztalokkal.', 22),
(23, 'Békés megye legnagyobb összefüggő erdejének és annak északi\r\nhatárát jelentő Fekete-Körös vadregényes, szabályozatlan kanyarulatainak felfedezése nem csupán a természet szerelmeseinek jelenthet örömteli túraélményeket. Sokan állítják: a folyó bal parti gátkoronája közel 20 kilométeren keresztül a megye legszebb, nyíltterepi\r\ntúraútvonalát adja, melyről a táj páholyi távlatokban szemlélhető.', 23),
(24, 'A hársfákat a gyomai I. világháborús hősi halottak emlékére ültette Kner Izidor nyomdaalapító (Hősök emlékútja). Az elmúlt évtizedek viharait egyetlen utca fasora élte túl. Ez a mintegy 70 éve, az I. világháborúban elesett gyomai hősök emlékére ültetett hársfasor, amely a Hősök emlékútját díszíti. Felemelő és pompás látvány tavasszal a virágzó, zöldbe boruló mintegy két kilóméternyi hosszú fasor, amely az emlékút mindkét oldalát végig díszítette. Egy írásos anyag szerint a gyomai képviselő testület úgy döntött, hogy a Deák Ferenc utcát nevezzék el a Hősök Emlékútjának, s azt tisztán mézelő hársfával ültessék be a hősök emlékének tiszteletére. Annyi fa ültetéséről volt szó, ahány gyomai katona veszett el a világháborúban. Virágzás idején rendkívül kellemes illatú, jó mézelő.', 24),
(25, 'A holtág 1871-1890 között jött létre, a Hármas-Körös bal parti ármentesített területen helyezkedik el, közigazgatásilag a Békés megyei Gyomaendrőd városhoz, a gyomai belterülethez tartozik. Helyi elnevezései még: Falualji, Révlaposi holtág, Dög-Körös. Medrének feliszapoltsága előrehaladott, növényzettel való benőttsége közepes mértékű, vizének minősége közepes. Feltöltése a felső végén lévő szivornyán keresztül történik, belvizek befogadója is, leürítése az alsó végén lévő szivattyúval lehetséges. Funkciói: belvíztározás, helyi igények kielégítésére öntözővíz-tározás, horgászat. Egyidejűleg különféle használt vizek befogadójául is szolgál. Mint belterületi holtág, jelentős városképformáló tényező. A holtágat érő antropogén hatások miatt vízi élővilága elszegényedett.', 25),
(26, 'A Káli-medence leglátványosabb természeti nevezetessége, a bájos Szentbékkálla község melletti Kőtenger. A hatalmas kőtömbökkel borított, ligetes erdőben fekvő terület a Balaton-felvidék egyik legfontosabb geológiai kincse. Igazi élmény a látványos sziklaalakzatok közti séta, fel is lehet mászni az impozáns homokkő formációkra, sőt a híres Ingókövet még inogtatni is tudjuk.', 26),
(27, 'A Balaton-felvidék talán leglenyűgözőbb geológiai természeti csodája, a Zánkától nem messze magasló, a tó felé szelíd, tipikus szőlőhegy arcát mutató Hegyestű, melynek túloldalát kettévágta a hajdani kőbánya. A bányaudvar fölé magasodó, kétszintes, függőleges bazaltoszlopokból álló, irdatlan sziklafal lenyűgöző látványt nyújt, és még a páratlan kilátást nyújtó hegytetőre is fel tudunk mászni.', 27),
(28, 'A Smaragdvölgy Pihenőpark a Zemplén egyik legszebb völgyében található, Sátoraljaújhely-Rudabányácskán. 14 hektáros Pihenőparkunk ideális hely kiránduló osztályok, turistacsoportok, családok részére, akik szeretnek kirándulni vagy azok számára is, akik pár napos kikapcsolódásra vágynak, távol a világ zajától.', 28),
(29, 'Ez a területegység a hortobágyi tájra hasonlít. A hajdani Duna-ártéren a folyószabályozás után fel-fel gyorsult a szikesedés, a növényzetét elsősorban olyan sótűrő, sókedvelő fajok alkotják, mint a veresnadrág csenkesz, a magyar sóvirág, a kamilla és a sziki üröm. Állatvilágának értékes képviselője a túzok, a kék vércse, az ugartyúk és a pusztai gyalogcincér. A végrehajtott élőhely-rekonstrukció nyomán olyan vizes élőhelyek alakultak ki, amelyek vonzzák a vízimadarakat.', 29),
(30, 'A Duna-Tisza közén fellelhető értékes szikes jellegű élőhelyek egyike a mórahalmi Nagyszéksós-tó. Ezek a tavak összegyűjtik a semlyékes vonulatok vizét, és élőhelyül, táplálkozóhelyül szolgálnak a térség fészkelő és vonuló madarai számára. A tanösvény bemutatja a Nagyszéksós-tó és környéke sokszínű, mozaikos élőhelyeit, a nádas-gyékényes vízparti társulásokat, sásréteket.\r\nTúravezető', 31),
(31, ' A Tapolcai-medence közepén magasodó Szent György-hegy a vidék jellegzetes tanúhegye. Kiváló borai, érdekes földtani múltja és sajátos, semmivel össze nem téveszthető atmoszférája miatt rendkívül közkedvelt. Ez a körtúra a kiemelkedés legfontosabb látnivalóit veszi sorra Kisapátiból indulva. A 13. századi Szent Kereszt-, a Lengyel-, az Ify- és az Örömhírvétel-kápolna, a Tarányi-présház, valamint a Balaton-felvidék első állandó üzemű menedékháza, a Kaán Károly kulcsosház emblematikus épületeit érintve körbejárjuk a hegy bazaltsapkáját, miközben szebbnél szebb kilátópontokat is útba ejtünk.', 32),
(32, 'Az erdőgazdaság Ökoturisztikai Központja olyan komplex szolgáltatást nyújt, amely a bakancsos, a kerékpáros, valamint a vízi turistáknak és az erdei vasút szerelmeseinek egyaránt izgalmas élményeket ígér. Egy ökoturisztikai kalandozás a Gemenci erdőben nem is kezdődhet másképp, mint a Pörböly település határában található Ökoturisztikai Központban.\r\n', 33),
(33, 'Gabóca már 21 éve vezet Tisza-tavi túrát.\r\nA csónaktúra, a kishajós túra és a vízi túra a tiszafüredi Albatrosz kikötőből indul a tapasztalt túravezetővel. A különleges csónakázás történhet egyénileg, családosan, baráti társaságok részvételével, vagy a cégeknél oly divatos csapatépítő tréningek keretében. A Tisza-tavi túrán 20 fős kishajók, csónakok, kajak, kenu és bicikli áll az érdeklődők rendelkezésére vezetővel vagy anélkül.', 34),
(34, 'A Cuha-völgy szurdoka méltán foglal el kitüntetett helyet a magyar természetjárásban. Látványos sziklák között bukdácsoló patak, gyönyörű erdő, az ország legszebb vasútvonala és ma már vasalt utak tömkelege – ráadásul mindez közvetlenül is elérhető. Innen azonban csak pár lépés a talán még látványosabb, ám kevésbé ismert Alsó-Cuha-szurdok! Az a szurdok látványában talán még vadregényesebb, igaz, nagyobb testvérénél jóval rövidebb. Bakonyszentlászlóról a szelíd hegyalja vad patakáttörésébe, az Alsó-Cuha-szurdokba látogatunk, és egy jégkorszak utáni maradványerdő, a Fenyőfői-ősfenyves rengetegébe is benézünk.', 35),
(37, 'A terület nyugati részén található a 309 négyzetkilométer felületű Fertő tó, Európa legnyugatibb sztyepptava. A magas sótartalmú tavat szőlővel borított mediterrán jellegű dombsorok, szubalpin hegyek és hófödte magashegységek övezik. A magyar oldalt a hatalmas összefüggő nádasok, az osztrák részt pedig a nyílt vízfelületek jellemzik. A Fertő gazdag vegetációnak és állatvilágnak biztosít kedvező életfeltételeket. A tó elnádasodása elsősorban a magyar partszakaszon tapasztalható. Itt a nádasokban 240 km hosszú csatornahálózatot vágtak, hogy a nyílt vízfelület és a náderdővel elzárt belső tavak is megközelíthetők legyenek.', 36),
(38, 'A tanösvény a Szigetközben található Dunaszegen, a község Önkormányzata alakította ki a település határában található Morotva-tó körül. A patkó alakú tó egykor a Mosoni-Duna kanyarulata volt. Az egykori folyó meder nyílása feltöltődött, fokozatosan elzárult és holtággá változott, majd szép lassan kialakult a mostani csendes vizű tó, melyben folyamatosan rakódik le a por, az iszap. Az elhalt növények maradványai felhalmozódnak és a nádas egyre nagyobb felületet ural a nyílt víztükörből. A tó környezetét rekettyefűz bokrok, fehér füzek és virágok színesítik. Itt található az egyik legritkább növényfaj a kúszó zeller is.', 37),
(39, 'A turistaút 5,3 km hosszú, a Nyíradony és Nyíracsád közötti út mellett, a Gúti templommal szemben indul, és kényelmes tempóban 2-2,5 óra alatt bejárható. Az útvonalon az Alföld legnagyobb erdőtömbje, a Gúthi-erdő különlegességeit lehet megismerni a NYÍRERDŐ Zrt. Gúthi Erdészetének köszönhetően.', 38),
(40, 'A Debrecent keletről körbeölelő Erdőspuszták hatalmas erdőségének északi részén található a Hármas-hegy kirándulóközpontja. Nevét a környezetéhez képest magasabb homokbuckákról kapta, amelyek alföldi szemmel nézve szinte hegynek látszódhattak. A három halom legmagasabb pontján, a 151 méter magas csúcson áll a 25 méteres Hármas-hegyi kilátó. A korábban itt lévő, 1980-as évek elején épült tornyot idővel túlnőtték a fák, így 2014-ben került a helyére a mostani építmény a Nyírerdő jóvoltából. Hét szintjét ívelt tartóoszlopok fogják közre a sarkokon, a legfelső szint kilátóteraszát sátortető fedi.', 39),
(41, 'A túraútvonal a Mikepércsi Vándor-ló - Mikepércs-Hajdúbagos; Mikepércs-Vekeri-tó turisztikai útvonal fantázianevet kapta.Kizárólag a természetjáró ötletességére és teherbírására van bízva, hogy milyen indulási és célállomást tervez el mikepércsi túrázása alkalmával. Az elmúlt 10 év tapasztalata alapján a legkedveltebb túrázási célnak a (Bánk –) Vekeri-tó – Mikepércs útvonal bizonyult. A zöld és a sárga jelzés találkozása a település főtere, ahol a templom, illetve a kályhamúzeum is található (mindkét hely látogatásához előzetes bejelentkezés szükséges).', 40),
(42, 'A kunhalom a Kárpát-medence alföldi területein található mesterségesen létrehozott jellegzetes földhalmok elnevezése, amelyek igen régről, többségükben a Kárpát-medencei honfoglalás előtti térből és időkből származnak. A kunhalom „olyan 5-10 m magas, 20-50 m átmérőjű kúp, vagy félgömb alakú képződmény, amely legtöbbször víz mellett, de vízmentes helyen terült el, s nagy százalékban temetkezőhely, sírdomb, őr- vagy határhalom volt.', 41),
(43, 'Ez a tanösvény a Tisza árterének élővilágát mutatja be. Rákóczifalva közigazgatási területén, a Tisza bal partján 6 km hosszan húzódik. Gyalogosan és kerékpárral is be lehet járni.', 42),
(44, 'A turistaúton érkezve először a barlang lefelé tátongó, mennyezeti felszakadásai előtt megyünk el, ahonnan már sejthető az alattuk lévő üreg nagysága. A továbbvezető turistaút lépcsői a barlang észak felé néző, kicsi, keskeny bejáratához vezetnek, ahol az alig ajtónyi méretű bejáraton bebújva letaglóz a belső csarnok gigantikus mérete. Az egyetlen teremből álló, 45 méter hosszú és 18 méter magas csarnok két hatalmas kerek nyílással szakad a felszínre. E mellett a padlószinten is nyílik még három különálló bejárata, ahonnan az egész Tatai-medencére remek kilátás nyílik.', 44),
(45, 'A természetes környezetben, nyáron a magas fák árnyékában stégen és partszakaszon horgászhatnak a vendégek. Májustól októberig éjszakai horgászás is engedélyezett. A természetes környezetben, nyáron a magas fák árnyékában stégen és partszakaszon horgászhatnak a vendégek. Májustól októberig éjszakai horgászás is engedélyezett.', 43),
(46, 'Hazánk egyik rejtett kincse, a Vértes lábainál fekvő, Oroszlányhoz közeli Bokodi-tó, melynek partján az utóbbi évtizedekben kiépített ún. úszó falu csodájára jár a fél világ. A Vértesi Erőmű mesterséges hűtőtavának partját szinte teljesen elfoglalják a különleges, cölöpökre épült horgász házikók, melyekhez hosszú fapallókból álló stég vezet.', 45),
(47, 'Epöl település Bajna felőli végéből egy zöld háromszög jelzés vezet fel az Őr-hegyre, amely egy legendákkal teli hely. A mindössze másfél kilométeres túraút 166 méter szintet emelkedve kapta fel a hegytetőre. Útközben, még viszonylag a séta elején egy barlang jelzés is feltűnik. Itt fel lehet kapaszkodni egy meredek kaptatón az Öreg-lyukhoz, sőt, be is lehet az üregbe sétálni. A barlang denevérek alvóhelye, úgyhogy csak óvatosan. De nemcsak állatok, hanem emberek is laktak itt: menedékül szolgált mind a török időkben, mind pedig az 1956-os szabadságharcot követően.', 46),
(48, 'A Dunakanyar magányos őrzője, a mészkőbányákkal megsebzett Naszály jellegzetes tömbje északi oldalában, a varázslatos Gyadai-réten alakították ki hazánk talán leginkább gyerek- ill. családbarát tanösvényét. A szokásos tájékoztató táblák mellett számos élményelem is gazdagítja a minden évszakban gyönyörű táj mellett a tanösvény végigjárását. A hintahíd, óriási függőhíd, mocsáron átvezető fapallók, a kirándulóközpont hatalmas, kulturált, jól felszerelt játszótere, élménydús interaktív kiállítása méltán volt az Év Ökoturisztikai létesítménye.', 47),
(49, 'Paris patak szurdokvölgye (Nógrádszakáli Palóc Grand Canyon) természetvédelmi területet Nógrádszakál községtől északra találjuk ott, ahol az Ipoly, a közút és a vasút a legközelebb szorulnak egymáshoz. A nógrádi (Grand Canyon) az év nagy részében teljesen száraz. Csapadékos időben és hóolvadáskor viszont szép vízesések képződnek a 15-20 m mély, szinte függőleges falú szurdok-völgyben.', 48),
(50, 'A terület az ökoturizmus fellegvára, a határon átnyúló Novohrad-Nógrád UNESCO Globális Geopark beléptető kapuja. Honlapját érdemes felkeresni, geoturisztikai kínálatának és tanösvényeinek széles választéka nemzetközi színvonalú. A naprakész információk mellett tudományos leírások, forrásmunkák is megtalálhatók rajta.', 49),
(51, 'Aki Balatongyörökre látogat, annak mindenképpen látnia kell a Szépkilátóból elénk táruló panorámát. Az épített kilátókkal ellentétben meg sem kell másznunk ahhoz, hogy a Balaton, a Tapolcai medence tanúhegyeinek és a Szigligeti öbölnek a festői szépségében gyönyörködhessünk.A Szépkilátó a nevét Eötvös Károly írótól kapta 1855-ben, akit annyira megihletett a dombról elé táruló szép kilátás, hogy az Utazás a Balaton körül című művében is megemlíti a balatongyöröki táj szépségét.', 50),
(52, 'A kiállító terem elején, a kis fahídnál régészeti feltárással megnyitott sírhelyek, majd Karoling-kori gazdasági épület belső szerkezete látható. Zalavár és környezetének történelméről a középkori várak hangulatát idéző helyben de a mai kornak megfelelő technikai eszközök felhasználásával tájékozódhat a látogató. A víz alatti állatvilágot egy „akváriumba” lépve, vetített filmmel tettük láthatóvá. Tovább haladva az érdeklődők a nádi élet sajátos eszközeivel, tárgyaival ismerkedhetnek meg. Szkok Iván festőművész képei pedig a természetet varázsolják elénk. Természetesen a kiállításban helyet kapott Fekete István és az elmaradhatatlan Tüskevár is. Továbbsétálva a sötétség leple alatt ismerkedhet meg a látogató a mocsárvilág fényeivel, hangjaival, illatával.', 51),
(53, 'A tavat körbejáró útvonal kiváló lehetőség egy hosszabb családi kirándulásra. A remek infrastruktúrájú, kényelmes pihenőkkel tarkított túra során ártéri erdőket érintve kerüljük meg az elnyújtózó vízfelületet, miközben a Fekete István Látogatóközpontot és a Deseda-kilátót is útba ejtjük. A kényelemért cserébe viszont az út több mint fele aszfalton megy.', 52),
(54, 'Az Kaszonyi-hegy más néven Tipet-hegy a Szabolcs-Szatmár-Bereg megye beregi részén, Barabás község határában található, távol a civilizáció zajától.A hely különlegessége, hogy maga a hegy hajdani szigetvulkán maradványa, amelyet szépen mutatnak a kőzetrétegek.Az azúrkék tengerszem ideális életfeltételeket teremt a madárvilág számára. Nem véletlen, hogy a terület természetvédelmi oltalom alatt áll.', 53),
(55, 'A Szőlőhegynek is nevezett magaslat, bár nem túl magas, mégis kiemelkedik a Beregi-síkságból. Az egykori vulkán 15 millió éve jött létre, a belső-kárpáti vulkáni vonulat része, így közeli rokonságban áll például a barabási Kaszonyi-heggyel. A vulkanikus kőzetet 2-3 méteres löszréteg borítja, ami egyrészt kiváló élőhelyet biztosít például a gyurgyalagoknak, másrészt pedig tökéletesen alkalmassá teszi a hegyet a szőlőművelésre – igaz, a filoxéra itt is megtette hatását, és szőlő helyett többségében gyümölcsösöket ültettek ide. Találunk azonban egy-két kis pincét, ahol ma is meg lehet kóstolni és vásárolni a hegy nedűjét - és érdemes is, hiszen adottságai a tokaji Kopasz-hegyéhez hasonlóak.', 54),
(56, 'A település fő természeti értéke Túr folyó, mely kanyarogva öleli át Túristvándit, és partjának erdeje természeti értékekben rendkívül gazdag. A folyóban még ma is megtalálható sok halfajta: a csuka, a harcsa, a ponty, a márna, a kecsege, a dévérkeszeg stb. Az itt élő ritka növényfajok közül említést érdemel például a réti füzény, a sárga nőszirom, a vízitök, a tavirózsa stb. A Túr partjai mentén él még például a keresztes vipera is.', 55),
(57, 'Kalandra hív egy látnivalókban gazdag tematikus útvonal a zalai dombvidék gerincein és völgyeiben. Vadban gazdag erdők, változatos panorámák, források, kápolnák között, horhosok mélyén kanyargunk. A 14 km-es, kék jelzésű, közepes hosszúságú túra a terület legszebb látnivalói mellett a környező dombokat is bekalandozza az egyik leghosszabb horhos, valamint a László pince és dámszarvasfarm érintésével.', 56),
(58, 'A Csácsbozsoki Arborétum Zalaegerszeg keleti határában, Csácsbozsok városrészben, a városközponttól körülbelül 4 kilométerre található 83 hektáros védett terület, melyen Zala megye erdősült vidékének valamennyi jellemző fa- és cserjefaja megtalálható. Domborzata változatos, minden kitettség fellelhető. Tengerszint feletti magassága 196-302 méter között változik. A laposabb részeken mocsártölgyek, mocsárciprusok találhatók, míg a domboldalakban és tetőkön tölgyesekbe, bükkösökbe érkezünk.\r\nEgykor a zalavári apátság birtoka volt, melyet már a második világháború előtt az egerszegiek kedvelt kirándulóhelyeként tartottak számon. Később, 1945-ben állami tulajdonba került, a zalaegerszegi erdészet kezelésébe. A második világháború alatt a lucfenyves nagy részét hadicélra kitermelték, helyére lucfenyőt, továbbá 30-40 féle örökzöldet, illetve lombos fát ültettek.', 57),
(59, 'A vízfolyást Aranyoskút néven egy 1381-es oklevél említi először. A török kort idéző húsvéti határjárás alkalmával a város polgárai itt szusszantak egyet. 1972-ben merült fel, hogy hivatalosan is védett természeti értékké nyilvánítják a területet. Az Aranyoslapi forrás lett Zalaegerszeg legelső helyi jelentőségű természetvédelmi területe 1974-ben, később országos védettségűvé vált.', 58);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `felhasznalok_tura`
--
ALTER TABLE `felhasznalok_tura`
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
-- AUTO_INCREMENT a táblához `felhasznalok_tura`
--
ALTER TABLE `felhasznalok_tura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `megye`
--
ALTER TABLE `megye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `megye_leiras`
--
ALTER TABLE `megye_leiras`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `turak`
--
ALTER TABLE `turak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT a táblához `tura_leiras`
--
ALTER TABLE `tura_leiras`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
