
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 23 Décembre 2015 à 11:03
-- Version du serveur: 10.0.20-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u298100800_gcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `civilite` varchar(3) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `civilite`) VALUES
(1, 'Grey', 'Meredith', 'M'),
(2, 'Derek', 'Mamour', 'M'),
(3, 'House', 'Docteur', 'M'),
(4, 'Courreau', 'Salomé', 'Mme'),
(5, 'Crusty', 'Victor', 'M'),
(6, 'Gramme', 'Anna', 'Mme'),
(7, 'Lunel', 'Jordan', 'M'),
(8, 'Lunel', 'Alex', 'M'),
(9, 'Dupont', 'Cécile', 'Mme');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(3) COLLATE utf8_bin NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(50) COLLATE utf8_bin NOT NULL,
  `num_secu` char(21) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(50) COLLATE utf8_bin NOT NULL,
  `cp` char(5) COLLATE utf8_bin NOT NULL,
  `ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_med` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_med` (`id_med`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`id`, `civilite`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `num_secu`, `adresse`, `cp`, `ville`, `id_med`) VALUES
(1, 'Mme', 'Canelo', 'Sophie', '1996-06-13', 'Rochefort', '1 94 05 05 323 780 34', '48 rue du Cagire', '13000', 'Marseilles', NULL),
(4, 'M', 'Montosac', 'Jules', '1999-10-25', 'Paris', '1 90 56 49 984 234 91', '58 rue du colonel Moutarde', '31100', 'Toulouse', 1),
(5, 'Mme', 'Prigent', 'Anne-Marie', '2017-01-30', 'Toulouse', '1 84 95 87 072 056 76', 'Toulouse', '31000', 'Toulouse', 2),
(3, 'Mme', 'Sterlin', 'Germaine', '1955-06-18', 'Nantes', '1 33 88 12 932 929 93', '56 Avenue les moulineaux', '44780', 'Nantes', 7),
(2, 'M', 'Malau', 'Théo', '1980-01-28', 'Toulouse', '1 98 38 65 389 032 77', '23 bis Rue des faucons', '31978', 'Toulouse', 0),
(6, 'M', 'Piau', 'Lionel', '1973-11-10', 'Paris', '1 92 49 87 830 273 67', '3 Chemin de la noisette', '31857', 'Toulouse', 1),
(7, 'Mme', 'Grand', 'Lisa', '1996-05-12', 'Toulouse', '1 98 38 27 882 743 92', '22 Rue des policiers', '31600', 'Toulouse', 4),
(8, 'M', 'Darmon', 'Serge', '1961-12-31', 'Perpignan', '1 92 49 86 276 876 29', 'Les fromagères', '66780', 'Perpignan', NULL),
(9, 'Mme', 'Chabère', 'Loana', '2003-09-16', 'Toulouse', '1 93 72 59 278 782 93', 'Les Bojolais', '31300', 'Toulouse', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `heure_debut` time NOT NULL,
  `duree` int(11) NOT NULL DEFAULT '30',
  PRIMARY KEY (`id`),
  KEY `id_patient` (`id_patient`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `secretariat`
--

CREATE TABLE IF NOT EXISTS `secretariat` (
  `login` varchar(20) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `secretariat`
--

INSERT INTO `secretariat` (`login`, `mdp`) VALUES
('user1', 'pass'),
('user2', 'pass');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
