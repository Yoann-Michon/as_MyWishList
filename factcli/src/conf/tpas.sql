-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 20 Mars 2019 à 09:31
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tpas`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomcli` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `adrcli` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `villecli` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nomcli`, `adrcli`, `villecli`) VALUES
(1, 'Ritchie', 'Impasse des 6 thèmes', 'Verdun'),
(2, 'Pascal', '20, rue des abaques', 'Nancy'),
(3, 'Babbage', '3, avenue des rythmes', 'Bar-le-Duc'),
(4, 'Fleming', '15, rue des tubes', 'Verdun'),
(5, 'Turing', '60, avenue des machines', 'Nancy'),
(6, 'Boole', '4, boulevard Shannon', 'Metz'),
(7, 'Von Neuman', '12, rue des architectes', 'Verdun');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datefact` date NOT NULL,
  `montant` float NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fact` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`id`, `datefact`, `montant`, `client_id`) VALUES
(1, '2018-12-10', 10.4, 6),
(2, '2018-10-18', 10.95, 3),
(3, '2018-08-10', 850, 2),
(4, '2018-04-10', 28.2, 2),
(5, '2018-10-17', 9.95, 1),
(6, '2018-12-09', 54.73, 4),
(7, '2018-10-17', 1709.45, 3),
(8, '2018-02-11', 40.85, 2),
(9, '2018-01-10', 16.99, 6),
(10, '2018-10-27', 6.6, 3),
(11, '2018-07-08', 90.75, 1),
(12, '2018-12-11', 6.8, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fact` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
