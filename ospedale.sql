-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 26, 2024 alle 01:43
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ospedale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `letti`
--

CREATE TABLE `letti` (
  `NumeroLetto` int(11) NOT NULL,
  `Disponibile` bit(1) NOT NULL,
  `NomeReparto` enum('Pronto soccorso','Medicina','Chirurgia','Gastroenterologia','Dietologia','Oculistica','Cardiologia','Oncologia','Neurologia','Pediatria','Ortopedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `letti`
--

INSERT INTO `letti` (`NumeroLetto`, `Disponibile`, `NomeReparto`) VALUES
(1, b'1', 'Pronto soccorso'),
(2, b'1', 'Pronto soccorso'),
(3, b'1', 'Pronto soccorso'),
(4, b'1', 'Pronto soccorso'),
(5, b'1', 'Cardiologia'),
(6, b'1', 'Cardiologia'),
(7, b'1', 'Cardiologia'),
(8, b'1', 'Chirurgia'),
(9, b'1', 'Chirurgia'),
(10, b'1', 'Dietologia'),
(11, b'1', 'Gastroenterologia'),
(12, b'1', 'Gastroenterologia'),
(13, b'1', 'Medicina'),
(14, b'1', 'Medicina'),
(15, b'1', 'Medicina'),
(16, b'1', 'Neurologia'),
(17, b'1', 'Neurologia'),
(18, b'1', 'Oculistica'),
(19, b'1', 'Oncologia'),
(20, b'1', 'Oncologia'),
(21, b'1', 'Oncologia'),
(22, b'1', 'Ortopedia'),
(23, b'1', 'Ortopedia');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `IDPrenotazione` int(11) NOT NULL,
  `DataInizio` date NOT NULL,
  `DataFine` date NOT NULL,
  `IDPersonale` int(11) NOT NULL,
  `IDPaziente` int(11) NOT NULL,
  `NumeroLetto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`IDPrenotazione`, `DataInizio`, `DataFine`, `IDPersonale`, `IDPaziente`, `NumeroLetto`) VALUES
(5, '2024-04-01', '2024-04-06', 7, 6, 8),
(6, '2024-05-01', '2024-05-13', 7, 6, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `reparti`
--

CREATE TABLE `reparti` (
  `NomeReparto` enum('Pronto soccorso','Medicina','Chirurgia','Gastroenterologia','Dietologia','Oculistica','Cardiologia','Oncologia','Neurologia','Pediatria','Ortopedia') NOT NULL,
  `Piano` enum('Piano Terra','Primo','Secondo','Terzo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `reparti`
--

INSERT INTO `reparti` (`NomeReparto`, `Piano`) VALUES
('Pronto soccorso', 'Piano Terra'),
('Medicina', 'Primo'),
('Chirurgia', 'Primo'),
('Gastroenterologia', 'Primo'),
('Dietologia', 'Primo'),
('Oculistica', 'Secondo'),
('Cardiologia', 'Secondo'),
('Oncologia', 'Secondo'),
('Neurologia', 'Secondo'),
('Pediatria', 'Secondo'),
('Ortopedia', 'Terzo');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `IDUtente` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Nome` varchar(20) DEFAULT NULL,
  `Cognome` varchar(20) DEFAULT NULL,
  `CodiceFiscale` char(16) DEFAULT NULL,
  `Indirizzo` varchar(50) DEFAULT NULL,
  `DataNascita` date DEFAULT NULL,
  `LuogoNascita` varchar(20) DEFAULT NULL,
  `Provincia` char(2) DEFAULT NULL,
  `Livello` bit(1) NOT NULL,
  `Cellulare` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`IDUtente`, `Username`, `Password`, `Nome`, `Cognome`, `CodiceFiscale`, `Indirizzo`, `DataNascita`, `LuogoNascita`, `Provincia`, `Livello`, `Cellulare`) VALUES
(6, 'Wr3nch', '827ccb0eea8a706c4c34a16891f84e7b', 'Simone', 'Briganti', 'BRGSMN05C06B936R', 'Via Ischia 23, Taviano', '2005-03-06', 'Casarano', 'LE', b'0', '3518459824'),
(7, 'admin', '6e6bc4e49dd477ebc98ef4046c067b5f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'1', NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `letti`
--
ALTER TABLE `letti`
  ADD PRIMARY KEY (`NumeroLetto`),
  ADD KEY `NomeReparto` (`NomeReparto`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`IDPrenotazione`),
  ADD KEY `IDPersonale` (`IDPersonale`),
  ADD KEY `IDPaziente` (`IDPaziente`),
  ADD KEY `NumeroLetto` (`NumeroLetto`),
  ADD KEY `NomeReparto_2` (`NumeroLetto`);

--
-- Indici per le tabelle `reparti`
--
ALTER TABLE `reparti`
  ADD PRIMARY KEY (`NomeReparto`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`IDUtente`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `CodiceFiscale` (`CodiceFiscale`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `IDPrenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `IDUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `letti`
--
ALTER TABLE `letti`
  ADD CONSTRAINT `letti_ibfk_1` FOREIGN KEY (`NomeReparto`) REFERENCES `reparti` (`NomeReparto`);

--
-- Limiti per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`IDPersonale`) REFERENCES `utenti` (`IDUtente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`IDPaziente`) REFERENCES `utenti` (`IDUtente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `prenotazioni_ibfk_4` FOREIGN KEY (`NumeroLetto`) REFERENCES `letti` (`NumeroLetto`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
