-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 18, 2020 alle 18:50
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
-- Database: `contributi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `domanda`
--

CREATE TABLE `domanda` (
  `email` varchar(255) NOT NULL,
  `dispositivo` varchar(6) NOT NULL,
  `importo` decimal(6,2) NOT NULL,
  `contributo` decimal(6,2) NOT NULL,
  `tipoISEE` int(1) NOT NULL,
  `data` datetime NOT NULL,
  `stato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `domanda`
--

INSERT INTO `domanda` (`email`, `dispositivo`, `importo`, `contributo`, `tipoISEE`, `data`, `stato`) VALUES
('1', 'pc', '20.00', '15.00', 0, '2020-11-13 18:22:42', 1),
('2', 'tablet', '100.00', '0.00', 0, '2020-11-16 10:24:02', 0),
('ale', 'tablet', '10.00', '1.50', 2, '2020-11-13 18:07:24', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `ruolo` varchar(10) NOT NULL,
  `cf` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`email`, `password`, `nome`, `cognome`, `indirizzo`, `tel`, `ruolo`, `cf`) VALUES
('1', '1', '1', '1', '1', '1', 'user', '1'),
('2', '7b5798f8d6', '2', '2', '2', '2', 'user', '2'),
('ale', 'ale', 'Alessio', 'Novel', 'Via Muggia', '354354346', 'user', 'bcibcobce'),
('dipen', 'dipen', 'a', 'a', 'a', 'a', 'dipen', 'a');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `domanda`
--
ALTER TABLE `domanda`
  ADD PRIMARY KEY (`email`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
