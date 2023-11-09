-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 17, 2020 alle 19:52
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pub`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bevande`
--

CREATE TABLE `bevande` (
  `numOrd` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `stuz` tinyint(1) NOT NULL,
  `prezzo` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `bevande`
--

INSERT INTO `bevande` (`numOrd`, `nome`, `stuz`, `prezzo`) VALUES
(1, 'Aranciata grande', 0, '2.50'),
(1, 'Cuba Libre', 1, '4.50');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `numOrd` int(11) NOT NULL,
  `nTav` int(11) NOT NULL,
  `conto` decimal(5,2) NOT NULL,
  `prep` tinyint(1) NOT NULL,
  `cons` tinyint(1) NOT NULL,
  `pag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`numOrd`, `nTav`, `conto`, `prep`, `cons`, `pag`) VALUES
(1, 2, '11.00', 1, 1, 1),
(2, 2, '2.00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `snack`
--

CREATE TABLE `snack` (
  `numOrd` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `prezzo` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `snack`
--

INSERT INTO `snack` (`numOrd`, `nome`, `prezzo`) VALUES
(1, 'Olive ascolane', '2.00'),
(1, 'Tramezzino', '2.00'),
(2, 'Pizzetta', '2.00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`numOrd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
