-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 31 jan. 2025 à 10:18
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
-- Base de données : `mamma_mia`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégories`
--

DROP TABLE IF EXISTS `catégories`;
CREATE TABLE IF NOT EXISTS `catégories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_catégories` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `catégories`
--

INSERT INTO `catégories` (`id`, `nom_catégories`) VALUES
(1, 'entrée'),
(2, 'plat'),
(3, 'dessert');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `nom`) VALUES
(1, 'lait vache'),
(2, 'crème fraiche '),
(3, 'citron'),
(4, 'sel'),
(5, 'huile d\'olive '),
(6, 'basilic'),
(7, 'poivre noir'),
(8, 'tomates'),
(9, 'filet de boeuf'),
(10, 'parmesan'),
(11, 'roquette'),
(12, 'câpres'),
(13, 'truffe'),
(14, 'vinaigre balsamique '),
(15, 'farine'),
(16, 'eau tiède'),
(17, 'levure boulangère '),
(18, 'sucre'),
(19, 'sauce tomate'),
(20, 'mozzarella'),
(21, 'fromage de chèvre'),
(22, 'gorgonzola'),
(23, 'gruyère'),
(24, 'spaghettis'),
(25, 'guanciale'),
(26, 'oeufs'),
(27, 'pecorino romano\r\n\r\n'),
(28, 'mascarpone'),
(29, 'speculoos'),
(30, 'café fort\r\n\r\n'),
(31, 'cacao en poudre\r\n\r\n'),
(32, 'crème liquide entière\r\n\r\n'),
(33, 'gélatine en feuilles\r\n\r\n'),
(34, 'vanille'),
(35, 'coulis de fruits rouges\r\n\r\n'),
(36, 'caramel');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `catégories` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `nom`, `catégories`) VALUES
(1, 'burrata à la provençal ', 'entrée'),
(2, 'carpaccio de boeuf', 'entrée'),
(3, 'pizza fromage', 'plat'),
(4, 'linguine carbonara', 'plat'),
(5, 'tiramisu café', 'dessert'),
(6, 'panna cotta aux fruits rouges', 'dessert');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mot de passe` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `mot de passe`, `mail`) VALUES
(1, 'Emilie', 'Ponce', '1712', 'emilie.ponce@laplateforme.io'),
(2, 'Raoul', 'Padovani', '0203', 'raoul.padovani@laplateforme.io'),
(3, 'Ennys', 'Hammoud', '1990', 'ennys.hammoud@laplateforme.io'),
(4, 'Theo', 'Ferrete', '0407', 'theo.ferrete@laplateforme.io');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
