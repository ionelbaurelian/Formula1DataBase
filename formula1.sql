-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 17, 2020 la 12:39 PM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `formula1`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `date_curse`
--

CREATE TABLE `date_curse` (
  `ID_date` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Race_Name` varchar(45) NOT NULL,
  `Race_country` varchar(45) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `date_curse`
--

INSERT INTO `date_curse` (`ID_date`, `Data`, `Race_Name`, `Race_country`, `ID_user`) VALUES
(1, '2020-01-02', 'Harda', 'Italia', 1),
(2, '2019-06-22', 'Transf', 'Romania', 1),
(4, '2019-11-16', 'Rolex', 'Elvetia', 1),
(5, '2019-04-14', 'Golat', 'Italia', 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `driver`
--

CREATE TABLE `driver` (
  `ID_driver` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `Echipa` varchar(50) NOT NULL,
  `Puncte` int(100) NOT NULL,
  `Cursa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `driver`
--

INSERT INTO `driver` (`ID_driver`, `Nume`, `Prenume`, `Echipa`, `Puncte`, `Cursa`) VALUES
(1, 'Hamilton', 'Lewis', 'Mercedes', 3432, 1),
(2, 'Vettel', 'Sebastian', 'Ferrari', 2088, 2),
(6, 'Pashakov', 'Oleg', 'Red Bull', 1722, 4),
(18, 'Hamilton', 'Lewis', 'Mercedes', 4566, 2),
(19, 'Jean', 'Elen', 'Volvo', 568, 2),
(20, 'Gillam', 'Paul', 'Porche', 90, 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `echipa`
--

CREATE TABLE `echipa` (
  `ID_echipa` int(11) NOT NULL,
  `Nume_echipa` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Tara` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `Titluri` int(11) NOT NULL,
  `Anul_aparitiei` int(4) NOT NULL,
  `Nr_piloti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `echipa`
--

INSERT INTO `echipa` (`ID_echipa`, `Nume_echipa`, `Tara`, `Titluri`, `Anul_aparitiei`, `Nr_piloti`) VALUES
(1, 'Mercedes', 'United Kingdom', 6, 1970, 32),
(2, 'Ferrari', 'Italy', 16, 1950, 51),
(3, 'Red Bull', 'United Kingdom', 4, 1997, 26);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `races`
--

CREATE TABLE `races` (
  `ID_race` int(11) NOT NULL,
  `Race_name` varchar(50) NOT NULL,
  `Race_country` varchar(50) NOT NULL,
  `Race_date` date NOT NULL,
  `Cursa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `races`
--

INSERT INTO `races` (`ID_race`, `Race_name`, `Race_country`, `Race_date`, `Cursa`) VALUES
(1, 'Grad', 'Belgia', '2020-01-01', 1),
(10, 'Das', 'Germania', '2021-02-01', 1),
(13, 'Dass', 'Germania', '2020-03-03', 1),
(14, 'Dsasfa', 'Olanda', '2020-04-14', 2),
(15, 'Transf', 'Romania', '2022-12-08', 1),
(17, 'Patule', 'Uganda', '2020-02-26', 1),
(24, 'Calea spre succes', 'Germania', '2020-01-08', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tickets`
--

CREATE TABLE `tickets` (
  `ID_ticket` int(11) NOT NULL,
  `Race_ticket` varchar(50) NOT NULL,
  `Country_ticket` varchar(50) DEFAULT NULL,
  `Data_ticket` date NOT NULL,
  `Price_ticket` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `tickets`
--

INSERT INTO `tickets` (`ID_ticket`, `Race_ticket`, `Country_ticket`, `Data_ticket`, `Price_ticket`) VALUES
(1, 'Grad', 'Belgia', '2020-01-31', 15),
(6, 'Transf', 'Romania', '2020-04-02', 43),
(7, 'Rolex', 'Elvetia', '2020-05-09', 66),
(11, 'Daracia', 'Turcia', '2020-01-20', 32);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_acc`
--

CREATE TABLE `user_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `user_acc`
--

INSERT INTO `user_acc` (`id`, `username`, `password`) VALUES
(33, 'ionelaureliann', '123qwe123'),
(43, 'doizece', '123456'),
(44, 'membrunou', 'parolamea');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_profile1`
--

CREATE TABLE `user_profile1` (
  `ID_user` int(11) NOT NULL,
  `Nume` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Prenume` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Telefon` varchar(15) CHARACTER SET latin1 NOT NULL,
  `Sex` char(1) CHARACTER SET latin1 NOT NULL DEFAULT 'M',
  `Tara` varchar(35) CHARACTER SET latin1 NOT NULL,
  `Oras` varchar(35) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `user_profile1`
--

INSERT INTO `user_profile1` (`ID_user`, `Nume`, `Prenume`, `Email`, `Telefon`, `Sex`, `Tara`, `Oras`) VALUES
(1, 'Bitmalai', 'Ionel-Aurelian', 'kljr.lionel@yahoo.com', '', 'M', 'România', 'Bucharest'),
(2, 'Baze', 'Date', 'bazededate@yahoo.com', '', 'F', 'Romania', ''),
(3, 'Nou', 'Membru', 'mmbrunou@yahoo.com', '', 'F', 'Italia', 'Verona');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `date_curse`
--
ALTER TABLE `date_curse`
  ADD PRIMARY KEY (`ID_date`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Indexuri pentru tabele `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`ID_driver`),
  ADD KEY `ID_date` (`Cursa`),
  ADD KEY `Echipa` (`Echipa`);

--
-- Indexuri pentru tabele `echipa`
--
ALTER TABLE `echipa`
  ADD PRIMARY KEY (`ID_echipa`) USING BTREE,
  ADD KEY `Nume_echipa` (`Nume_echipa`);

--
-- Indexuri pentru tabele `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`ID_race`),
  ADD UNIQUE KEY `Race_date` (`Race_date`),
  ADD KEY `Cursa` (`Cursa`) USING BTREE;

--
-- Indexuri pentru tabele `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID_ticket`),
  ADD UNIQUE KEY `Data_ticket` (`Data_ticket`);

--
-- Indexuri pentru tabele `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user_profile1`
--
ALTER TABLE `user_profile1`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `date_curse`
--
ALTER TABLE `date_curse`
  MODIFY `ID_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `driver`
--
ALTER TABLE `driver`
  MODIFY `ID_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pentru tabele `echipa`
--
ALTER TABLE `echipa`
  MODIFY `ID_echipa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `races`
--
ALTER TABLE `races`
  MODIFY `ID_race` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pentru tabele `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pentru tabele `user_profile1`
--
ALTER TABLE `user_profile1`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `date_curse`
--
ALTER TABLE `date_curse`
  ADD CONSTRAINT `date_curse_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user_profile1` (`ID_user`);

--
-- Constrângeri pentru tabele `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`Cursa`) REFERENCES `date_curse` (`ID_date`);

--
-- Constrângeri pentru tabele `races`
--
ALTER TABLE `races`
  ADD CONSTRAINT `races_ibfk_1` FOREIGN KEY (`Cursa`) REFERENCES `user_profile1` (`ID_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
