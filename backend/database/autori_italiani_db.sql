-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 26, 2025 alle 10:25
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autori_italiani`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `autori`
--

CREATE TABLE `autori` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `data_nascita` date DEFAULT NULL,
  `luogo_nascita` varchar(100) DEFAULT NULL,
  `biografia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `autori`
--

INSERT INTO `autori` (`id`, `nome`, `cognome`, `data_nascita`, `luogo_nascita`, `biografia`) VALUES
(1, 'Alessandro', 'Manzoni', '1785-03-07', 'Milano', 'Scrittore italiano, autore de \"I Promessi Sposi\", romanzo storico che esplora temi di fede e giustizia.'),
(2, 'Giovanni', 'Verga', '1840-09-02', 'Catania', 'Scrittore verista, noto per \"I Malavoglia\", che descrive la vita dei pescatori siciliani.'),
(3, 'Charles', 'Baudelaire', '1821-04-09', 'Parigi', 'Poeta francese, autore de \"Les Fleurs du Mal\", opera fondamentale della poesia moderna.'),
(4, 'Gabriele', 'D\'Annunzio', '1863-03-12', 'Pescara', 'Scrittore e poeta decadente, autore di \"Il Piacere\" e \"Alcyone\".'),
(5, 'Giovanni', 'Pascoli', '1855-12-31', 'San Mauro Pascoli', 'Poeta italiano, autore di \"Myricae\", con temi legati alla natura e al \"nido\" familiare.'),
(6, 'Filippo Tommaso', 'Marinetti', '1876-12-22', 'Alessandria d\'Egitto', 'Fondatore del Futurismo, autore del \"Manifesto del Futurismo\".'),
(7, 'Giuseppe', 'Ungaretti', '1888-02-08', 'Alessandria d\'Egitto', 'Poeta ermetico, autore de \"Il Porto Sepolto\", con versi brevi e intensi.'),
(8, 'Franz', 'Kafka', '1883-07-03', 'Praga', 'Scrittore boemo, autore de \"La Metamorfosi\", che esplora l’alienazione.');

-- --------------------------------------------------------

--
-- Struttura della tabella `opere`
--

CREATE TABLE `opere` (
  `id` int(11) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `anno_pubblicazione` int(11) DEFAULT NULL,
  `genere` varchar(50) DEFAULT NULL,
  `autore_id` int(11) DEFAULT NULL,
  `descrizione` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `opere`
--

INSERT INTO `opere` (`id`, `titolo`, `anno_pubblicazione`, `genere`, `autore_id`, `descrizione`) VALUES
(1, 'I Promessi Sposi', 1840, 'Romanzo storico', 1, 'Romanzo ambientato nella Lombardia del XVII secolo, narra le vicende di Renzo e Lucia, esplorando temi di oppressione, fede e giustizia sociale.'),
(2, 'I Malavoglia', 1881, 'Romanzo verista', 2, 'Primo romanzo del ciclo dei Vinti, descrive la lotta per la sopravvivenza di una famiglia di pescatori siciliani, segnata da difficoltà economiche e tragedie.'),
(3, 'Les Fleurs du Mal', 1857, 'Poesia', 3, 'Raccolta di poesie che esplora temi di bellezza, decadenza, amore e spleen, rivoluzionando la poesia moderna con il suo stile evocativo.'),
(4, 'Il Piacere', 1889, 'Romanzo decadente', 4, 'Romanzo che segue la vita mondana di Andrea Sperelli, un esteta in cerca di piaceri, immerso nell’alta società romana.'),
(5, 'Myricae', 1891, 'Poesia', 5, 'Raccolta poetica che celebra la semplicità della vita rurale e il legame con la natura, con uno stile intimo e simbolico.'),
(6, 'Manifesto del Futurismo', 1909, 'Manifesto', 6, 'Testo programmatico che esalta la modernità, la velocità e la rottura con la tradizione, dando inizio al movimento futurista.'),
(7, 'Il Porto Sepolto', 1916, 'Poesia', 7, 'Raccolta di poesie scritte durante la Prima Guerra Mondiale, caratterizzata da versi essenziali che esprimono il dolore e la memoria.'),
(8, 'La Metamorfosi', 1915, 'Racconto', 8, 'Racconto surreale che narra la trasformazione di Gregor Samsa in un insetto, esplorando temi di alienazione e incomunicabilità.');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `opere`
--
ALTER TABLE `opere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autore_id` (`autore_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `autori`
--
ALTER TABLE `autori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `opere`
--
ALTER TABLE `opere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `opere`
--
ALTER TABLE `opere`
  ADD CONSTRAINT `opere_ibfk_1` FOREIGN KEY (`autore_id`) REFERENCES `autori` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
