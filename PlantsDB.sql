-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dic 02, 2015 alle 19:47
-- Versione del server: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `PlantsDB`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Acquisti`
--

CREATE TABLE IF NOT EXISTS `Acquisti` (
`id` int(6) unsigned NOT NULL,
  `quantitÃ` int(3) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pianta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `Commenti`
--

CREATE TABLE IF NOT EXISTS `Commenti` (
`id` int(6) unsigned NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `messaggio` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `Piante`
--

CREATE TABLE IF NOT EXISTS `Piante` (
`id` int(6) unsigned NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descrizione` varchar(300) NOT NULL,
  `immagine` varchar(50) NOT NULL,
  `costo` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Piante`
--

INSERT INTO `Piante` (`id`, `nome`, `descrizione`, `immagine`, `costo`) VALUES
(4, 'Crassula', 'Crassula è un genere di piante succulente sempreverde che appartiene alla famiglia delle Crassulaceae.', '/progetto/images/crassula.jpg', 10),
(5, 'Rosmarinus officinalis ', 'Pianta di rosmarino', '/prog/images/rosmarino.jpg', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acquisti`
--
ALTER TABLE `Acquisti`
 ADD PRIMARY KEY (`id`), ADD KEY `pianta` (`pianta`);

--
-- Indexes for table `Commenti`
--
ALTER TABLE `Commenti`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Piante`
--
ALTER TABLE `Piante`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Acquisti`
--
ALTER TABLE `Acquisti`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Commenti`
--
ALTER TABLE `Commenti`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Piante`
--
ALTER TABLE `Piante`
MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
