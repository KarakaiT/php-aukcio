-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 14. 13:14
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `aukcio`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adatok`
--

CREATE TABLE `adatok` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `adatok`
--

INSERT INTO `adatok` (`id`, `user`, `email`, `password`) VALUES
(1, 'HarcosZokni', 'karakaitamas72@gmail.com', '123456789'),
(2, 'Karforgatohekus', 'kardforgato@gmail.com', 'kardforgat'),
(3, 'Teszt', 'teszt@teszt.hu', 'teszt11');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `katnev` int(25) NOT NULL,
  `katsorrend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `vez_nev` varchar(25) NOT NULL,
  `ker_nev` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uzenet` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `message`
--

INSERT INTO `message` (`id`, `vez_nev`, `ker_nev`, `email`, `uzenet`) VALUES
(1, 'Karakai', 'Tamás', 'karakaitamas72@gmail.com', 'Tisztelt Cím!\r\n\r\nPróba Üzenet!');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(11) NOT NULL,
  `termeknev` varchar(30) NOT NULL,
  `ar` decimal(10,0) NOT NULL,
  `kategoria` varchar(20) NOT NULL,
  `rleiras` varchar(200) NOT NULL,
  `hleiras` mediumtext NOT NULL,
  `feltolt_nev` varchar(50) NOT NULL,
  `termekkep` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `termeknev`, `ar`, `kategoria`, `rleiras`, `hleiras`, `feltolt_nev`, `termekkep`) VALUES
(1, 'Addicted for now - Még a beteg', '3500', '2', 'A fiú az alkohol rabja. A lány a szexé. A függésről lejönni csak fél győzelem.', 'Lily Calloway ettől a három szótól retteg a legjobban. De Loren Hale elhatározza, hogy veszélyes függőségei támogatása nélkül lesz együtt vele. Az új felállás szerinti életük, vagyis hogy egy ágyban, valóban együtt alszanak, új kihívásokkal szembesíti Lily-t. Például azzal, hogy ne vesse rá magát minden éjszaka Lorenre. Ne eméssze fel a szex és a fiú teste utáni sóvárgás.\r\n\r\nLoren szeretne józan maradni, helyrehozni, ami rosszat tett. Így amikor valaki azzal fenyegetődzik, hogy elmondja Lily titkát a családjának és a nyilvánosságnak, akkor megesküszik, hogy megvédi a lányt. De a régi ellenségek felbukkanásával Lo számára több forog kockán, mint a józansága.\r\n\r\nÉs a legszörnyűbb félelme nem a visszaesés. Hallja a véget. Látja is. Az egyedüli dolgot, ami mindent megváltoztathat. És ami csak négy szóból áll.', 'Karakai Tamás', 'kep1.jpg'),
(2, 'Addicted for now - Még a beteg', '3500', '2', 'A fiú az alkohol rabja. A lány a szexé. A függésről lejönni csak fél győzelem.', 'Lily Calloway ettől a három szótól retteg a legjobban. De Loren Hale elhatározza, hogy veszélyes függőségei támogatása nélkül lesz együtt vele. Az új felállás szerinti életük, vagyis hogy egy ágyban, valóban együtt alszanak, új kihívásokkal szembesíti Lily-t. Például azzal, hogy ne vesse rá magát minden éjszaka Lorenre. Ne eméssze fel a szex és a fiú teste utáni sóvárgás.\r\n\r\nLoren szeretne józan maradni, helyrehozni, ami rosszat tett. Így amikor valaki azzal fenyegetődzik, hogy elmondja Lily titkát a családjának és a nyilvánosságnak, akkor megesküszik, hogy megvédi a lányt. De a régi ellenségek felbukkanásával Lo számára több forog kockán, mint a józansága.\r\n\r\nÉs a legszörnyűbb félelme nem a visszaesés. Hallja a véget. Látja is. Az egyedüli dolgot, ami mindent megváltoztathat. És ami csak négy szóból áll.', 'Karakai Tamás', 'kep1.jpg'),
(3, 'Még a beteged vagyok', '5000', '2', 'A fiú az alkohol rabja. A lány a szexé. A függésről lejönni csak fél győzelem.', 'gvafvafafasfasf', 'Teszt', 'kep1.jpg'),
(4, 'Adidas focilabda', '1250', '4', 'Foci labda', 'Proba feltőltés!', 'Teszt', 'labda.jpg'),
(5, 'Asztali számitógép', '158250', '1', 'Asztali számitógép 2 db monitorral ', 'Proba sokadik', 'Teszt', 'pc.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adatok`
--
ALTER TABLE `adatok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `adatok`
--
ALTER TABLE `adatok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
