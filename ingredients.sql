-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 jan. 2025 à 09:56
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mamma mia`
--

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `nom`) VALUES
(1, 'lait de vache'),
(2, 'crème fraiche'),
(3, 'citron'),
(4, 'sel'),
(5, 'huile d\'olive'),
(6, 'basilic'),
(7, 'poivre noir'),
(8, 'tomates'),
(9, 'filet de bœuf'),
(10, 'parmesan'),
(11, 'roquette'),
(12, 'câpres'),
(13, 'truffe'),
(14, 'vinaigre balsamique'),
(15, 'farine'),
(16, 'eau tiède\r\n\r\n'),
(17, 'levure boulangère'),
(18, 'sucre'),
(19, 'sauce tomate'),
(20, 'mozzarella'),
(21, 'fromage de chèvre'),
(22, 'gorgonzola'),
(23, 'gruyère'),
(24, 'spaghetti '),
(25, 'guanciale'),
(26, 'oeufs'),
(27, 'pecorino romano\r\n\r\n'),
(28, 'mascarpone\r\n\r\n'),
(29, 'speculoos'),
(30, 'café fort\r\n\r\n'),
(31, 'cacao en poudre'),
(32, 'crème liquide entière'),
(33, 'gélatine en feuilles\r\n'),
(34, 'vanille'),
(35, 'coulis de fruits rouges'),
(36, 'caramel'),
(37, 'chocolat noir\r\n'),
(38, 'chocolat blanc\r\n\r\n'),
(39, 'chocolat lait');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
