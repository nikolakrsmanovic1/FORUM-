-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 06:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `idKom` int(11) NOT NULL,
  `opis` varchar(30) DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imeKreatora` varchar(30) DEFAULT NULL,
  `tema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`idKom`, `opis`, `datum`, `imeKreatora`, `tema_id`) VALUES
(1, 'neki komentar', '2022-12-10 17:11:08', 'nikolakrsmanovic342@gmail.com', 6),
(2, 'neki komentar', '2022-12-10 17:11:10', 'nikolakrsmanovic342@gmail.com', 6),
(3, 'aeaefaefaefaefea', '2022-12-10 17:11:21', 'nikolakrsmanovic342@gmail.com', 1),
(4, '', '2022-12-10 17:16:56', '', 1),
(5, '', '2022-12-10 17:18:13', '', 1),
(6, '', '2022-12-10 17:18:22', '', 1),
(7, '', '2022-12-10 17:19:32', '', 1),
(8, '', '2022-12-10 17:28:29', '', 1),
(9, 'adsdasdsa', '2022-12-10 17:28:37', 'ana04@gmail.com', 1),
(10, 'neki komentar', '2022-12-10 17:41:25', '', 1),
(11, '', '2022-12-10 17:43:26', '', 1),
(12, '', '2022-12-10 17:43:28', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ime`, `prezime`, `email`, `lozinka`) VALUES
('Ana', 'Lukovic', 'ana04@gmail.com', 'ana'),
('Milica', 'Krsmanovic', 'milica@gmail.com', 'mica'),
('Milosav', 'Zivkovic', 'milosavkzivkovic04@gmail.com', 'miso123'),
('Nikola', 'Krsmanovic', 'nikolakrsmanovic342@gmail.com', 'nikola'),
('Nikola', 'Obradovic', 'obrad@gmail.com', 'obi'),
('Nikola', 'Vujovic', 'vujovic@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `id` int(6) UNSIGNED NOT NULL,
  `NazivTeme` varchar(30) NOT NULL,
  `opisTeme` varchar(30) NOT NULL,
  `DatumKreiranja` varchar(100) NOT NULL,
  `ime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id`, `NazivTeme`, `opisTeme`, `DatumKreiranja`, `ime`) VALUES
(1, 'Tema4', 'adsdsa', '01.12.2022 14:54', 'ana04@gmail.com'),
(6, 'TemaMilica', 'Milica', '10.12.2022 17:47', 'milica@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`idKom`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `idKom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
