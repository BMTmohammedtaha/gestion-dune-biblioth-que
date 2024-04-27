-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 05:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_bib`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id_auteur`, `nom`, `prenom`) VALUES
(1, 'Robert Cecil ', 'Martin'),
(2, 'Andy', 'Hunt'),
(4, 'Robert C.', 'Martin'),
(5, 'McConnell', 'Steve'),
(6, 'Gamma', 'Erich'),
(7, 'Abelson', 'Harold');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `code_livre` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `annee_edition` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`code_livre`, `titre`, `annee_edition`) VALUES
(1, 'Clean Code', 2008),
(2, 'The Pragmatic Programmer: From Journeyman to Master', 1999),
(3, 'Clean Code: A Handbook of Agile Software Craftsmanship', 2007),
(4, 'Code Complete', 1993),
(5, 'Design Patterns: Elements of Reusable Object-Oriented Software', 1994),
(7, 'Turtle Geometry: The Computer as a Medium for Exploring Mathematics', 1981),
(8, 'Structure and Interpretation of Computer Programs: JavaScript Edition', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `id` int(11) NOT NULL,
  `code_livre` int(11) DEFAULT NULL,
  `id_auteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`id`, `code_livre`, `id_auteur`) VALUES
(1, 1, 1),
(4, 2, 2),
(7, 3, 1),
(8, 4, 5),
(9, 5, 6),
(12, 8, 7),
(13, 7, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`code_livre`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_livre` (`code_livre`),
  ADD KEY `id_auteur` (`id_auteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `code_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_ibfk_1` FOREIGN KEY (`code_livre`) REFERENCES `books` (`code_livre`),
  ADD CONSTRAINT `book_author_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `authors` (`id_auteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
