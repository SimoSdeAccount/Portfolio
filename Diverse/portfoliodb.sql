-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 22. 04 2020 kl. 05:18:46
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfoliodb`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `beskeder`
--

CREATE TABLE `beskeder` (
  `Id` int(11) NOT NULL,
  `Bruger` int(11) NOT NULL,
  `Emne` varchar(50) NOT NULL,
  `Besked` varchar(255) NOT NULL,
  `Tid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `beskeder`
--

INSERT INTO `beskeder` (`Id`, `Bruger`, `Emne`, `Besked`, `Tid`) VALUES
(3, 3, 'Test', '', '2020-04-20 22:01:05'),
(4, 3, 'nytest', '', '2020-04-20 22:08:21'),
(5, 4, 'kontakttest', '', '2020-04-22 00:58:40');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `bruger`
--

CREATE TABLE `bruger` (
  `Id` int(11) NOT NULL,
  `Profil` int(11) NOT NULL,
  `Brugernavn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `bruger`
--

INSERT INTO `bruger` (`Id`, `Profil`, `Brugernavn`) VALUES
(3, 1, 'SimAdmin'),
(4, 2, 'Karlsmart'),
(5, 3, 'MagnusLogin'),
(6, 4, 'bentlogin'),
(7, 5, 'Jarlen'),
(8, 6, 'Jenslogin'),
(9, 7, 'Peterlogin');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `downloads`
--

CREATE TABLE `downloads` (
  `Id` int(11) NOT NULL,
  `Bruger` int(11) NOT NULL,
  `Projekt` varchar(50) NOT NULL,
  `Tid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `login`
--

CREATE TABLE `login` (
  `Brugernavn` varchar(50) NOT NULL,
  `Kodeord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `login`
--

INSERT INTO `login` (`Brugernavn`, `Kodeord`) VALUES
('bentlogin', 'kodeord1234'),
('Jarlen', 'kodeord1234'),
('Jenslogin', 'jens1234'),
('Karlsmart', 'kodeord1234'),
('MagnusLogin', 'kodeord1234'),
('Peterlogin', 'peter1234'),
('SimAdmin', 'admin1234');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `profil`
--

CREATE TABLE `profil` (
  `Id` int(11) NOT NULL,
  `Fornavn` varchar(50) NOT NULL,
  `Efternavn` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Hjemmeside` varchar(50) DEFAULT NULL,
  `profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `profil`
--

INSERT INTO `profil` (`Id`, `Fornavn`, `Efternavn`, `Email`, `Hjemmeside`, `profil`) VALUES
(1, 'Simon', '', 'sim@mail.dk', 'www.portfolio.dk', ''),
(2, 'Karl', 'derp', 'karl@derp.dk', '', 'karlkarl'),
(3, 'Magnus', 'Smit', 'magnus@smit.dk', 'www.magnus.dk', 'magnusmagnus'),
(4, 'bent', 'bentsen', 'bent@email.dk', 'www.bent.dk', 'jeg hedder bent'),
(5, 'Jarl', 'Mikkelsen', 'jarl@mikkelsen.dk', 'www.jarl.dk', 'jarljarl'),
(6, 'Jens', 'Jensen', 'jens@email.dk', 'www.jens.dk', 'hej jeg hedder jens'),
(7, 'peter', '', 'peter@email.dk', '', '');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `projekter`
--

CREATE TABLE `projekter` (
  `Navn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `beskeder`
--
ALTER TABLE `beskeder`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Bruger` (`Bruger`);

--
-- Indeks for tabel `bruger`
--
ALTER TABLE `bruger`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Profil` (`Profil`,`Brugernavn`),
  ADD KEY `Brugernavn` (`Brugernavn`);

--
-- Indeks for tabel `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Bruger` (`Bruger`,`Projekt`),
  ADD KEY `Projekt` (`Projekt`);

--
-- Indeks for tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Brugernavn`);

--
-- Indeks for tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks for tabel `projekter`
--
ALTER TABLE `projekter`
  ADD PRIMARY KEY (`Navn`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `beskeder`
--
ALTER TABLE `beskeder`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `bruger`
--
ALTER TABLE `bruger`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tilføj AUTO_INCREMENT i tabel `downloads`
--
ALTER TABLE `downloads`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `beskeder`
--
ALTER TABLE `beskeder`
  ADD CONSTRAINT `beskeder_ibfk_1` FOREIGN KEY (`Bruger`) REFERENCES `bruger` (`Id`);

--
-- Begrænsninger for tabel `bruger`
--
ALTER TABLE `bruger`
  ADD CONSTRAINT `bruger_ibfk_1` FOREIGN KEY (`Profil`) REFERENCES `profil` (`Id`),
  ADD CONSTRAINT `bruger_ibfk_2` FOREIGN KEY (`Brugernavn`) REFERENCES `login` (`Brugernavn`);

--
-- Begrænsninger for tabel `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `bruger` (`Id`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Projekt`) REFERENCES `projekter` (`Navn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
