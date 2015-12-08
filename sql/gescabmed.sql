-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Décembre 2015 à 08:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gescabmed`
--

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE IF NOT EXISTS `authentification` (
  `login` varchar(20) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `authentification`
--

INSERT INTO `authentification` (`login`, `mdp`) VALUES
('root', 'root');
-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `heure_debut` time NOT NULL,
  `duree` int(11) NOT NULL DEFAULT '30',
  PRIMARY KEY (`id`),
  KEY `id_patient` (`id_patient`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`) VALUES
(1, 'Grey', 'Meredith'),
(2, 'Derek', 'Mamour'),
(3, 'House', 'Docteur'),
(4, 'Anne', 'Hatol'),
(5, 'Serge', 'Lama');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(3) COLLATE utf8_bin NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(50) COLLATE utf8_bin NOT NULL,
  `num_secu` char(21) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(50) COLLATE utf8_bin NOT NULL,
  `code_postal` char(5) COLLATE utf8_bin NOT NULL,
  `ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_med` (`id_medecin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`id`, `civilite`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `num_secu`, `adresse`, `code_postal`, `ville`, `id_medecin`) VALUES
(1, 'M', 'Jean', 'Kévin', '1973-05-22', 'Rochefort (17)', '1 23 45 66 666 999 99', '48 rue de Lautan', '31120', 'Toulouse', NULL),
(2, 'Mme', 'Salomé', 'Moralès', '1999', 'Marseille (13)', '1 98 36 92 763 376 90', 'Les crémaillères', '13000', 'Marseille', NULL );

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `fk_rdv_id_medecin` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id`),
  ADD CONSTRAINT `fk_rdv_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_pateint_id_medecin` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
