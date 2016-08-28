-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 28 Août 2016 à 21:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  'war2200'
--

-- --------------------------------------------------------

--
-- Structure de la table 'login'
--

CREATE TABLE IF NOT EXISTS login (
  id_joueur int(11) NOT NULL AUTO_INCREMENT,
  pseudo varchar(200) NOT NULL,
  mdp text NOT NULL,
  email text NOT NULL,
  dateins datetime NOT NULL,
  PRIMARY KEY (id_joueur)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Structure de la table 'ressource'
--

CREATE TABLE IF NOT EXISTS ressource (
  id_joueur int(11) NOT NULL,
  ouvriers_joueur int(11) NOT NULL,
  or_joueur int(11) NOT NULL,
  materiaux_joueur int(11) NOT NULL,
  terrain_joueur int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
