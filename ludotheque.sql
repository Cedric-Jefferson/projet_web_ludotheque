-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 avr. 2020 à 12:34
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ludotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `id_jeu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_jeu` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `note` int(11) NOT NULL,
  `date_de_sortie` date NOT NULL,
  `concepteur` varchar(100) NOT NULL,
  `age_public` int(11) NOT NULL,
  `caractere` int(50) NOT NULL,
  `mode` enum('Moi et les autres','Mondes fantastiques et imaginaires','Art','Nature et animaux') NOT NULL,
  `type` enum('Action','Aventure','Adresse','Strategie','Roleplay','Logique','Calcul mental','Géométrie','Langage','Lettre','Construction') NOT NULL,
  `nbre_jeux_total` int(11) NOT NULL,
  `nbre_jeux_dispo` int(11) NOT NULL,
  `categorie` enum('Jeu de societe','Jeu professionnel','Jeu de cartes','Accessoires','Jeu de des','Jeu tactile','Jeu de construction','Jeu de manipulation') NOT NULL,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_jeu`),
  KEY `nom_jeu` (`nom_jeu`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id_jeu`, `nom_jeu`, `reference`, `description`, `note`, `date_de_sortie`, `concepteur`, `age_public`, `caractere`, `mode`, `type`, `nbre_jeux_total`, `nbre_jeux_dispo`, `categorie`, `image`) VALUES
(4, 'Mikado Geant', 'EN-340726', 'Jeu d\'adresse surdimensionné pour les animations, les fêtes du jeu, etc.', 8, '2019-06-03', 'Longfield Games', 5, 4, 'Moi et les autres', 'Adresse', 45, 27, 'Jeu de societe', 'assets/mikado-geant.jpg'),
(6, 'Dar', 'ART-DAR', 'DAR (Divide and Rule) est un jeu de stratégie abstrait à  la mécanique originale et innovante.', 7, '2019-06-14', 'Art of Games', 9, 4, 'Moi et les autres', 'Strategie', 30, 30, 'Jeu de societe', 'assets/dar.jpg'),
(7, 'L\'Empereur', 'PAI-EMP', 'Beau jeu de dÃ©placement et de mÃ©moire, adaptÃ© librement du film L\'Empereur.', 9, '2019-06-04', 'Jeux Opla', 12, 4, 'Moi et les autres', 'Strategie', 35, 35, 'Jeu de societe', 'assets/l-empereur.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `jeuxfav`
--

DROP TABLE IF EXISTS `jeuxfav`;
CREATE TABLE IF NOT EXISTS `jeuxfav` (
  `id_jeu` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  PRIMARY KEY (`id_jeu`),
  KEY `reference` (`id_usr`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeuxfav`
--

INSERT INTO `jeuxfav` (`id_jeu`, `id_usr`) VALUES
(1, 7),
(2, 7),
(4, 7),
(6, 7);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `nbre_jeu` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reservation`),
  UNIQUE KEY `num_reservation` (`nbre_jeu`),
  KEY `id_jeu` (`id_jeu`),
  KEY `id_usr` (`id_usr`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `nbre_jeu`, `id_jeu`, `id_usr`, `date_reservation`) VALUES
(4, 6, 4, 7, '2019-06-14 00:00:00'),
(3, 2, 4, 7, '2019-06-14 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `souhaits`
--

DROP TABLE IF EXISTS `souhaits`;
CREATE TABLE IF NOT EXISTS `souhaits` (
  `id_souhait` int(11) NOT NULL AUTO_INCREMENT,
  `nom_souhait` varchar(50) NOT NULL,
  `id_usr` int(11) NOT NULL,
  PRIMARY KEY (`id_souhait`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `souhaits`
--

INSERT INTO `souhaits` (`id_souhait`, `nom_souhait`, `id_usr`) VALUES
(1, 'Monopoli', 7),
(4, 'Uno', 7),
(3, 'Scrabble', 7),
(5, 'L\'empereur', 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usr` varchar(50) NOT NULL,
  `prenom_usr` varchar(50) NOT NULL,
  `num_adherent` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_usr_forum` int(11) NOT NULL,
  `id_session` int(11) NOT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_usr`, `nom_usr`, `prenom_usr`, `num_adherent`, `password`, `date_de_naissance`, `email`, `id_usr_forum`, `id_session`) VALUES
(17, 'Lagrange', 'FrÃ©deric', 678171, '', '2019-06-18', 'fred@gmail.com', 183091, 561984),
(7, 'testeur', 'azer', 456789, 'azer', '2019-06-28', 'testeur@azer.com', 456789, 456789),
(12, 'eric', 'chris', 114336, 'chris', '2019-06-07', 'eric@chris.fr', 158984, 33329);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
