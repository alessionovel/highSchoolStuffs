-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 24, 2020 alle 23:48
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tennis`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `campo`
--

CREATE TABLE `campo` (
  `numCampo` varchar(3) NOT NULL,
  `tipoSuolo` varchar(10) NOT NULL,
  `copertura` int(11) NOT NULL,
  `prezzoOra` double NOT NULL,
  `prezzoLuci` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `campo`
--

INSERT INTO `campo` (`numCampo`, `tipoSuolo`, `copertura`, `prezzoOra`, `prezzoLuci`) VALUES
('1', 'Bello', 1, 15, 5),
('2', 'Bello', 1, 15, 5),
('3', 'Bello', 1, 15, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `idPrenot` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` int(11) NOT NULL,
  `luci` int(11) NOT NULL,
  `totPagam` double NOT NULL,
  `pagare` tinyint(1) NOT NULL,
  `numTessera` varchar(5) NOT NULL,
  `userid` varchar(8) NOT NULL,
  `numCampo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `segretaria`
--

CREATE TABLE `segretaria` (
  `matricola` varchar(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `userid` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `segretaria`
--

INSERT INTO `segretaria` (`matricola`, `nome`, `cognome`, `userid`) VALUES
('2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Struttura della tabella `socio`
--

CREATE TABLE `socio` (
  `numTessera` varchar(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `via` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  `cap` int(11) NOT NULL,
  `citta` varchar(20) NOT NULL,
  `dataIscr` date NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `userid` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `socio`
--

INSERT INTO `socio` (`numTessera`, `nome`, `cognome`, `via`, `num`, `cap`, `citta`, `dataIscr`, `telefono`, `userid`) VALUES
('1', '1', '1', '1', 1, 1, '1', '2020-11-23', '1', '1'),
('3', '3', '3', '3', 3, 3, '3', '2020-11-03', '3', '3');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `userid` varchar(8) NOT NULL,
  `psw` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`userid`, `psw`) VALUES
('1', '1'),
('2', '2'),
('3', '3');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `campo`
--
ALTER TABLE `campo`
  ADD PRIMARY KEY (`numCampo`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`idPrenot`),
  ADD KEY `numCampo` (`numCampo`),
  ADD KEY `userid` (`userid`),
  ADD KEY `numTessera` (`numTessera`);

--
-- Indici per le tabelle `segretaria`
--
ALTER TABLE `segretaria`
  ADD PRIMARY KEY (`matricola`),
  ADD UNIQUE KEY `userid_3` (`userid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`);

--
-- Indici per le tabelle `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`numTessera`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `idPrenot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
