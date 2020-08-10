-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 août 2020 à 13:57
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `studentstwo`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendance_table`
--

CREATE TABLE `attendance_table` (
  `id` int(15) NOT NULL,
  `iduser` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datesign` datetime NOT NULL DEFAULT current_timestamp(),
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attendance_table`
--

INSERT INTO `attendance_table` (`id`, `iduser`, `name`, `datesign`, `time`) VALUES
(67, 54, 'abdul', '2020-08-10 12:27:37', '2020-08-10 12:27:37'),
(68, 55, '', '2020-08-10 12:31:07', '2020-08-10 12:31:07'),
(69, 55, 'assetou', '2020-08-10 12:31:07', '2020-08-10 12:31:07'),
(70, 55, 'assetou', '2020-08-10 12:33:43', '2020-08-10 12:33:43');

-- --------------------------------------------------------

--
-- Structure de la table `student_table`
--

CREATE TABLE `student_table` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` int(15) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `student_table`
--

INSERT INTO `student_table` (`id`, `name`, `email`, `password`, `telephone`, `sexe`, `image`) VALUES
(54, 'abdul', 'abdul@gmail.com', '123', 44444444, 'male', 'uploads/15482res.jpg'),
(55, 'assetou', 'assetou@gmail.com', '123', 55555555, 'male', 'uploads/593378res.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Index pour la table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telephone` (`telephone`);

--
-- Index pour la table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telephone` (`telephone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attendance_table`
--
ALTER TABLE `attendance_table`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
