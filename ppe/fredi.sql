-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 25 Octobre 2012 à 16:43
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `fredi`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `numero-licence` int(50) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `num-ligue` int(11) DEFAULT NULL,
  `date_Naissance` date DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`numero-licence`),
  KEY `num-ligue` (`num-ligue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adherents`
--

INSERT INTO `adherents` (`numero-licence`, `Nom`, `Prenom`, `num-ligue`, `date_Naissance`, `sexe`) VALUES
(10443, 'BANDILELLA', 'CLEMENT', NULL, '1998-07-26', 'M'),
(10444, 'BERBIER', 'LUCILLE', NULL, '1998-03-24', 'F'),
(10445, 'BERBIER', 'THEO', NULL, '1998-03-24', 'M'),
(10446, 'BECKER', 'ROMAIN', NULL, '1998-03-28', 'M'),
(10447, 'BIACQUEL', 'VERONIQUE', NULL, '1962-12-09', 'F'),
(10448, 'BIDELOT', 'BRIGITTE', NULL, '1958-09-20', 'F'),
(10449, 'BIDELOT', 'JULIE', NULL, '1991-11-30', 'F'),
(10450, 'BILLOT', 'DIDIER', NULL, '1962-09-24', 'M'),
(10451, 'BILLOT', 'CLAIRE', NULL, '1963-06-07', 'F'),
(10452, 'BILLOT', 'MARIANNE', NULL, '1986-09-28', 'F'),
(10453, 'BINNET', 'MARIUS', NULL, '1997-08-21', 'M'),
(10454, 'CALDI', 'THOMAS', NULL, '1998-09-22', 'M'),
(10455, 'CASTEL', 'TIMOTHE', NULL, '1998-06-10', 'M'),
(10456, 'CHEOLLE', 'NICOLAS', NULL, '1983-04-19', 'M'),
(10457, 'CHERPION', 'UGO', NULL, '1999-09-24', 'M'),
(10458, 'CHEVOITINE', 'LOUIS', NULL, '1998-03-29', 'M'),
(10459, 'CHOUARNO', 'TOM', NULL, '1999-08-02', 'M'),
(10460, 'COTIN', 'FLORIAN', NULL, '1995-04-15', 'M'),
(10461, 'DEPERRIN', 'ARNAUD', NULL, '1982-12-31', 'M'),
(10462, 'DEPRETRE', 'BEATRICE', NULL, '1998-01-27', 'F'),
(10463, 'DUCRICK', 'AUGUSTIN', NULL, '1996-12-03', 'M'),
(10464, 'GARBILLON', 'GILLES', NULL, '1963-07-08', 'M'),
(10465, 'GARBILLON', 'YANN', NULL, '1994-03-21', 'M'),
(10466, 'HAGENBACH', 'CLEMENTINE', NULL, '1997-11-26', 'F'),
(10467, 'HASFELD', 'AUXANE', NULL, '1999-03-08', 'F'),
(10468, 'HUMERT', 'ISABELLE', NULL, '1976-06-04', 'F'),
(10469, 'LAFIEGLON', 'CLEMENT', NULL, '2002-11-16', 'M'),
(10470, 'LAMOINE', 'GREGOIRE', NULL, '1993-07-23', 'M'),
(10471, 'LANIELLE', 'NICOLAS', NULL, '1998-09-02', 'M'),
(10472, 'LIEVIN', 'NATHAN', NULL, '1997-01-24', 'M'),
(10473, 'LOTANG', 'CYPRIEN', NULL, '1999-09-30', 'M'),
(10474, 'LUQUE', 'ETIENNE', NULL, '1951-12-26', 'M'),
(10475, 'PERNOT', 'PAUL', NULL, '1996-04-26', 'M'),
(10476, 'REMILLON', 'ELIOT', NULL, '2001-11-13', 'M'),
(10477, 'SILBERT', 'GILLES', NULL, '1957-01-03', 'M'),
(10478, 'SILBERT', 'LEA', NULL, '2000-04-14', 'F'),
(10479, 'TORTEMANN', 'PIERRE', NULL, '1997-10-13', 'M'),
(10480, 'ZOECKEL', 'MATHIEU', NULL, '2000-06-02', 'M'),
(10481, 'ZUEL', 'STEPHANIE', NULL, '1970-09-25', 'F'),
(10482, 'ZUERO', 'THOMAS', NULL, '2000-08-14', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `demandeurs`
--

CREATE TABLE IF NOT EXISTS `demandeurs` (
  `adresse-mail` varchar(50) NOT NULL DEFAULT '',
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `num-recu` int(11) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`adresse-mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demandeurs`
--

INSERT INTO `demandeurs` (`adresse-mail`, `nom`, `prenom`, `rue`, `cp`, `ville`, `num-recu`, `mdp`, `sexe`) VALUES
('bandilella.clement@hotmail.fr', 'BANDILELLA', 'CLEMENT', '30, rue Widric 1er', '54600', 'Villers l?s Nancy', 0, '', 'M'),
('becker.romain@hotmail.fr', 'BECKER', 'ROMAIN', '1, rue des M?sanges', '54600', 'Villers l?s Nancy', 0, '', 'M'),
('berbier.lucille@hotmail.fr', 'BERBIER', 'LUCILLE', '12, rue de Marron', '54600', 'Villers l?s Nancy', 0, '', 'F'),
('berbier.theo@hotmail.fr', 'BERBIER', 'THEO', '12, rue de Marron', '54600', 'Villers l?s Nancy', 0, '', 'M'),
('biacquel.veronique@hotmail.fr', 'BIACQUEL', 'VERONIQUE', '27, rue de Santifontaine', '54000', 'Nancy', 0, '', 'F'),
('bidelot.brigitte@hotmail.fr', 'BIDELOT', 'BRIGITTE', '5, rue des trois ?pis', '54600', 'Villers l?s Nancy', 0, '', 'F'),
('bidelot.claire@hotmail.fr', 'BILLOT', 'CLAIRE', '6, rue de la Sapini?re', '54600', 'Villers l?s Nancy', 0, '', 'F'),
('bidelot.didier@hotmail.fr', 'BILLOT', 'DIDIER', '6, rue de la Sapini?re', '54600', 'Villers l?s Nancy', 0, '', 'M'),
('bidelot.julie@hotmail.fr', 'BIDELOT', 'JULIE', '5, rue des trois ?pis', '54600', 'Villers l?s Nancy', 0, '', 'F');

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE IF NOT EXISTS `lien` (
  `num-licence` int(11) NOT NULL,
  `adresse-mail` varchar(50) NOT NULL,
  PRIMARY KEY (`num-licence`,`adresse-mail`),
  KEY `adresse-mail` (`adresse-mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignes-frais`
--

CREATE TABLE IF NOT EXISTS `lignes-frais` (
  `adresse-mail` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `motif` varchar(50) DEFAULT NULL,
  `trajet` varchar(50) DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `cout-peage` int(11) DEFAULT NULL,
  `cout-repas` int(11) DEFAULT NULL,
  `cout-hebergement` int(11) DEFAULT NULL,
  `km-validé` int(11) DEFAULT NULL,
  `peage-validé` int(11) DEFAULT NULL,
  `repas-validé` int(11) DEFAULT NULL,
  `hebergement-validé` int(11) DEFAULT NULL,
  PRIMARY KEY (`adresse-mail`,`date`),
  KEY `motif` (`motif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE IF NOT EXISTS `ligues` (
  `n°` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `sigle` varchar(50) DEFAULT NULL,
  `président` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`n°`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

CREATE TABLE IF NOT EXISTS `motifs` (
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD CONSTRAINT `adherents_ibfk_1` FOREIGN KEY (`num-ligue`) REFERENCES `ligues` (`n°`);

--
-- Contraintes pour la table `lien`
--
ALTER TABLE `lien`
  ADD CONSTRAINT `lien_ibfk_2` FOREIGN KEY (`adresse-mail`) REFERENCES `demandeurs` (`adresse-mail`),
  ADD CONSTRAINT `lien_ibfk_1` FOREIGN KEY (`num-licence`) REFERENCES `adherents` (`numero-licence`);

--
-- Contraintes pour la table `lignes-frais`
--
ALTER TABLE `lignes-frais`
  ADD CONSTRAINT `lignes@002dfrais_ibfk_2` FOREIGN KEY (`motif`) REFERENCES `motifs` (`libelle`),
  ADD CONSTRAINT `lignes@002dfrais_ibfk_1` FOREIGN KEY (`adresse-mail`) REFERENCES `demandeurs` (`adresse-mail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
