-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 18, 2020 alle 13:06
-- Versione del server: 10.4.10-MariaDB
-- Versione PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garaagility`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cani`
--

CREATE TABLE `cani` (
  `progrGara` int(11) NOT NULL,
  `nomeCane` varchar(15) NOT NULL,
  `taglia` varchar(1) NOT NULL,
  `nomePadrone` varchar(20) NOT NULL,
  `annoNascCane` int(11) NOT NULL,
  `tempo` int(11) NOT NULL,
  `penalita` int(11) NOT NULL,
  `puntiFinali` decimal(8,2) NOT NULL,
  `razza` varchar(30) NOT NULL,
  `peso` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cani`
--

INSERT INTO `cani` (`progrGara`, `nomeCane`, `taglia`, `nomePadrone`, `annoNascCane`, `tempo`, `penalita`, `puntiFinali`, `razza`, `peso`) VALUES
(1, 'Nicholas', 'S', 'Alessio', 2002, 1, 1, '2.00', 'Bastardo', '180.00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cani`
--
ALTER TABLE `cani`
  ADD PRIMARY KEY (`progrGara`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
