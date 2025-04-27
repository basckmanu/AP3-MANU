-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 nov. 2024 à 11:43
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `publicom`
--

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `IDCOMMUNE` int NOT NULL AUTO_INCREMENT,
  `NOM` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DEPARTEMENT` int NOT NULL,
  PRIMARY KEY (`IDCOMMUNE`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`IDCOMMUNE`, `NOM`, `DEPARTEMENT`) VALUES
(1, 'Montauban', 82),
(2, 'Paris', 75),
(3, 'Toulouse', 31),
(4, 'Lyon', 69),
(5, 'Bordeaux', 33),
(6, 'Rennes', 35),
(7, 'Marseille', 13),
(8, 'Béziers', 34),
(9, 'Metz', 57),
(10, 'Perpignan', 66);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `IDMESSAGE` int NOT NULL AUTO_INCREMENT,
  `IDCOMMUNE` int NOT NULL,
  `ETAT` tinyint(1) NOT NULL,
  `TEXTE` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COULEUR` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TAILLE` decimal(65,2) NOT NULL,
  PRIMARY KEY (`IDMESSAGE`),
  KEY `I_FK_MESSAGE_COMMUNE` (`IDCOMMUNE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panneau`
--

DROP TABLE IF EXISTS `panneau`;
CREATE TABLE IF NOT EXISTS `panneau` (
  `IDPANNEAU` int NOT NULL AUTO_INCREMENT,
  `IDCOMMUNE` int NOT NULL,
  `REFERENCE` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LATITUDE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LONGITUDE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`IDPANNEAU`),
  KEY `I_FK_PANNEAU_COMMUNE` (`IDCOMMUNE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDUTILISATEUR` int NOT NULL AUTO_INCREMENT,
  `IDCOMMUNE` int NOT NULL,
  `IDENTIFIANT` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MOTDEPASSE` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAIL` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ROLE` tinyint(1) NOT NULL,
  PRIMARY KEY (`IDUTILISATEUR`),
  KEY `I_FK_UTILISATEUR_COMMUNE` (`IDCOMMUNE`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDUTILISATEUR`, `IDCOMMUNE`, `IDENTIFIANT`, `MOTDEPASSE`, `MAIL`, `ROLE`) VALUES
(1, 10, 'montauban', 'kfozejfoze', 'perpignagn@fopezjfo.com', 0),
(2, 2, 'paris75000', 'efjigoerjgoierjgioer', 'oui@oui.com', 0),
(3, 7, 'zfzefze', 'efzefzef', 'admn@admin.com', 1),
(4, 1, 'qsdqsdqsd', 'qsdqsdqsd', 'dqsdqsdqs', 0),
(5, 5, 'zfzefezf', 'zefzefsefsef', 'edazzdefvse', 1),
(6, 6, 'mateo.sage', 'lemecquiaungroszizietquiveuxqu\'onlesuce', 'oui@oui.com', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`IDCOMMUNE`) REFERENCES `commune` (`IDCOMMUNE`);

--
-- Contraintes pour la table `panneau`
--
ALTER TABLE `panneau`
  ADD CONSTRAINT `panneau_ibfk_1` FOREIGN KEY (`IDCOMMUNE`) REFERENCES `commune` (`IDCOMMUNE`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`IDCOMMUNE`) REFERENCES `commune` (`IDCOMMUNE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
