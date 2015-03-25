-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 17 Mars 2015 à 18:16
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `nom_quizz`
--

CREATE TABLE IF NOT EXISTS `nom_quizz` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `nom_quizz`
--

INSERT INTO `nom_quizz` (`id`, `nom`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'Javascript'),
(4, 'C++');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_quizz` int(5) NOT NULL,
  `nom_question` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `id_quizz`, `nom_question`) VALUES
(9, 3, 'Comment ajouter la variable pi en javascript ?\r'),
(10, 3, 'La méthode push() ajoute un élément :\r'),
(11, 3, 'Var x  = 16 + "Volvo"  Affiche :\r'),
(12, 3, 'Comment afficher une boite d''alerte d''un message ?\r'),
(13, 3, 'Quel est la balise qui permet d''insérer du javascript dans du html ?\r'),
(14, 3, 'Quel est l''emplacement correct pour insérer javascript ?\r'),
(15, 3, 'Quel est la syntaxe qui permet de faire appelle à un fichier javascript appelé xxx ?\r'),
(16, 3, 'Comment ajouter des commentaires en javascript ?\r');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_quizz` int(5) NOT NULL,
  `id_question` int(5) NOT NULL,
  `nom_reponse` varchar(255) NOT NULL,
  `vrai` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `id_quizz`, `id_question`, `nom_reponse`, `vrai`) VALUES
(1, 3, 9, 'var  pi  = 3.14\r', 1),
(2, 3, 9, 'int pi = 3.14\r', 0),
(3, 3, 9, 'float pi = 3.14\r', 0),
(4, 3, 9, 'double pi  = 3.14\r', 0),
(5, 3, 10, 'à la fin du tableau \r', 1),
(6, 3, 10, 'au debut du tableau\r', 0),
(7, 3, 10, 'Au milieu du table\r', 0),
(8, 3, 10, 'Par-dessus la première valeur du tableau\r', 0),
(9, 3, 11, '16Volvo\r', 1),
(10, 3, 11, '16 Volvo\r', 0),
(11, 3, 11, 'Une erreur\r', 0),
(12, 3, 11, '16 + Volvo\r', 0),
(13, 3, 12, 'Alert("HelloWorld")\r', 1),
(14, 3, 12, 'AlertBox("HelloWorld")\r', 0),
(15, 3, 12, 'msg("HelloWorld")\r', 0),
(16, 3, 12, 'msgbox ("HelloWorld")\r', 0),
(17, 3, 13, '<script> \r', 1),
(18, 3, 13, '<js>\r', 0),
(19, 3, 13, '<javascript>\r', 0),
(20, 3, 13, '<scripting>\r', 0),
(21, 3, 14, 'Les trois réponse sont correctes\r', 1),
(22, 3, 14, '<head>\r', 0),
(23, 3, 14, '<body>\r', 0),
(24, 3, 14, '<html>\r', 0),
(25, 3, 15, '<script src ="xxx.js">\r', 1),
(26, 3, 15, '<script id ="xxx.js">\r', 0),
(27, 3, 15, '<script href ="xxx.js">\r', 0),
(28, 3, 15, '<script jsfile ="xxx.js">\r', 0),
(29, 3, 16, '// et /*      */\r', 1),
(30, 3, 16, ' <!- -  et   !/     / !\r', 0),
(31, 3, 16, ' Comment() ;\r', 0),
(32, 3, 16, ' <! - -', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
