-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 20 avr. 2025 à 11:34
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
-- Base de données : `gestion_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(11, 'Food & Drink'),
(12, 'Travel'),
(13, 'Technology'),
(14, 'Health & Wellness'),
(15, 'Entertainment'),
(16, 'Business & Finance'),
(17, 'Education'),
(18, 'Lifestyle'),
(19, 'Science & Nature'),
(20, 'Sports');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom_client` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone_client` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse_client` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `telephone_client`, `adresse_client`) VALUES
(1, 'kaoubai', 'yassine', '06458543', 'yassine@gmail.com'),
(2, 'bodar', 'taha', '0614298199', 'casablanca');

-- --------------------------------------------------------

--
-- Structure de la table `commande_client`
--

DROP TABLE IF EXISTS `commande_client`;
CREATE TABLE IF NOT EXISTS `commande_client` (
  `id_commande_client` int NOT NULL AUTO_INCREMENT,
  `id_produit` int NOT NULL,
  `id_client` int NOT NULL,
  `quantite` int NOT NULL,
  `date_commande` date NOT NULL,
  PRIMARY KEY (`id_commande_client`),
  KEY `fk_commande_client` (`id_client`),
  KEY `fk_commande_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande_fournisseur`
--

DROP TABLE IF EXISTS `commande_fournisseur`;
CREATE TABLE IF NOT EXISTS `commande_fournisseur` (
  `id_commande_fournisseur` int NOT NULL AUTO_INCREMENT,
  `id_produit` int NOT NULL,
  `id_fournisseur` int NOT NULL,
  `quantite` int NOT NULL,
  `date_commande` date NOT NULL,
  PRIMARY KEY (`id_commande_fournisseur`),
  KEY `fk_commande_fournisseur` (`id_fournisseur`),
  KEY `fk_commande_produit_frs` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int NOT NULL AUTO_INCREMENT,
  `nom_fournisseur` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom_fournisseur` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone_fournisseur` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse_fournisseur` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_categorie` int NOT NULL,
  `prix_unitaire` int NOT NULL,
  `date_expiration` date NOT NULL,
  `date_fabrication` date NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `id_categorie`, `prix_unitaire`, `date_expiration`, `date_fabrication`) VALUES
(3, 'headphone', 11, 5000, '2025-04-26', '2025-04-01'),
(4, 'Laptop Dell XPS 15', 14, 1499, '2025-05-08', '2025-03-31'),
(5, 'iPhone 13 Pro', 12, 999, '2025-11-26', '2025-01-07'),
(6, 'Organic Olive Oil', 19, 12, '2025-12-24', '2025-02-12'),
(7, 'Leather Office Chair', 20, 199, '2025-07-24', '2025-02-12'),
(9, 'Stainless Steel Water Bottle', 17, 24, '2025-12-22', '2025-01-11'),
(12, 'lenovo thinkpad', 13, 200, '2025-04-27', '2025-04-13'),
(13, 'itel', 18, 265, '2025-04-26', '2025-04-26'),
(14, 'pc', 12, 236, '2025-04-30', '2025-04-20'),
(15, 'headphone', 15, 6325, '2025-04-27', '2025-04-26'),
(16, 'phone', 12, 2563, '2025-04-27', '2025-04-11');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande_client`
--
ALTER TABLE `commande_client`
  ADD CONSTRAINT `fk_commande_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `fk_commande_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `commande_fournisseur`
--
ALTER TABLE `commande_fournisseur`
  ADD CONSTRAINT `fk_commande_fournisseur` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`),
  ADD CONSTRAINT `fk_commande_produit_frs` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
