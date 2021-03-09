-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 01 mars 2021 à 10:08
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `brief4_conception`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(25) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NOM`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Moussatef', 'otman.moussetaf@gmail.com', 'd025fa80acd4a04221bc9b913c5b7543f64d3f2b');

-- --------------------------------------------------------

--
-- Structure de la table `box_message`
--

DROP TABLE IF EXISTS `box_message`;
CREATE TABLE IF NOT EXISTS `box_message` (
  `id_Msg` int(20) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telephpne` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_Msg`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `box_message`
--

INSERT INTO `box_message` (`id_Msg`, `Nom`, `Email`, `Telephpne`, `Message`, `Date`) VALUES
(1, 'otman', '0637274172', 'otman.moussetaf@gmail.com', 'SALAM ANA OTHMAN ET BGHIT NTESTE HAD TKHARBI9 WACH KHDAM', '2021-02-27 11:34:28'),
(2, 'MOUSSATEF', '0637274172', 'idhem.bissaoui@gmail.com', 'SALAM NJHAT Operation  Lawla donc hadi secand operation for verfecation', '2021-02-27 11:35:58'),
(3, '', '', '', '', '2021-02-28 18:21:57');

-- --------------------------------------------------------

--
-- Structure de la table `classe_etd`
--

DROP TABLE IF EXISTS `classe_etd`;
CREATE TABLE IF NOT EXISTS `classe_etd` (
  `ID_CLASSE_ETD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_FORMATEUR` int(11) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_CLASSE_ETD`,`ID_FORMATEUR`),
  KEY `FK_Formateur_Classe` (`ID_FORMATEUR`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe_etd`
--

INSERT INTO `classe_etd` (`ID_CLASSE_ETD`, `ID_FORMATEUR`, `NOM`) VALUES
(1, 1, 'ADA LOVELACE');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `ID_MODULE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_MODULE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_MODULE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `ID_NOTE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_FORMATEUR` int(11) NOT NULL,
  `ID_ETUDIANT` int(11) NOT NULL,
  `ID_MODULE` int(11) NOT NULL,
  `NOTE` float DEFAULT NULL,
  PRIMARY KEY (`ID_NOTE`),
  KEY `FK_RELATION_7` (`ID_MODULE`),
  KEY `FK_Formateur` (`ID_FORMATEUR`),
  KEY `FK_Etudiant` (`ID_ETUDIANT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `ID_PERSON` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(15) DEFAULT NULL,
  `PRENOM` varchar(20) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `EMAIL` varchar(25) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_PERSON`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`ID_PERSON`, `NOM`, `PRENOM`, `AGE`, `EMAIL`, `PASSWORD`) VALUES
(1, 'CHARKI', 'AHMAD', 20, 'ahmad.charki@gmail.com', '123456'),
(2, 'GARICH', 'SALIM', 20, 'salim.garich@gmail.com', 'garich'),
(3, 'MHSAWI', 'SMIR', 20, 'mmmm.sss@gmail.com', 'garich');

-- --------------------------------------------------------

--
-- Structure de la table `personne_etud`
--

DROP TABLE IF EXISTS `personne_etud`;
CREATE TABLE IF NOT EXISTS `personne_etud` (
  `ID_ETUDIANT` int(11) NOT NULL,
  `ID_PERSON` int(11) NOT NULL,
  `ID_ClasseETD` int(11) NOT NULL,
  PRIMARY KEY (`ID_ETUDIANT`,`ID_PERSON`),
  KEY `FK_PRESSON_ETUD2` (`ID_PERSON`),
  KEY `FK_ClasseETD` (`ID_ClasseETD`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne_etud`
--

INSERT INTO `personne_etud` (`ID_ETUDIANT`, `ID_PERSON`, `ID_ClasseETD`) VALUES
(1, 2, 0),
(2, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personne_formamteur`
--

DROP TABLE IF EXISTS `personne_formamteur`;
CREATE TABLE IF NOT EXISTS `personne_formamteur` (
  `ID_FORMATEUR` int(11) NOT NULL,
  `ID_PERSON` int(11) NOT NULL,
  `ID_ClasseETD` int(11) NOT NULL,
  PRIMARY KEY (`ID_FORMATEUR`,`ID_PERSON`),
  KEY `FK_PERSONNE_FORM2` (`ID_PERSON`),
  KEY `ID_ClasseETD` (`ID_ClasseETD`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne_formamteur`
--

INSERT INTO `personne_formamteur` (`ID_FORMATEUR`, `ID_PERSON`, `ID_ClasseETD`) VALUES
(1, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
