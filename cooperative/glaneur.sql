-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 25 oct. 2018 à 18:12
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `glaneur`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pictureUrl` varchar(128) NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `firstname`, `title`, `pictureUrl`, `contents`) VALUES
(1, 'William', 'Developpeur du site', '1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'Amaury', 'Fondateur', '2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Histoire'),
(2, 'Post'),
(3, 'Music');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` double UNSIGNED NOT NULL DEFAULT '1',
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `addressLine1` varchar(128) DEFAULT NULL,
  `addressLine2` varchar(128) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `zipCode` char(5) DEFAULT NULL,
  `phoneNumber` char(10) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `registerDate` datetime NOT NULL,
  `lastLoginDate` datetime DEFAULT NULL,
  `birthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `title`, `firstName`, `lastName`, `addressLine1`, `addressLine2`, `city`, `zipCode`, `phoneNumber`, `email`, `password`, `registerDate`, `lastLoginDate`, `birthDate`) VALUES
(1, 1, 'erfavfc', 'vfevfed', NULL, NULL, NULL, NULL, NULL, 'william.vqvqsf', 'qsvsd', '2018-07-17 15:29:42', NULL, '2020-03-30'),
(2, 1, 'BRUEL', 'William', '5 Rue de Sain-Etienne', '', 'Saint-Héand', '42570', '664411678', 'william.brl', '$2y$11$4eb36a6cd46e1a349a495ulC6RBOVEGiQyOeu8LPpXf7g4pRvDR1.', '2018-07-18 09:27:33', '2018-07-23 14:11:45', '1994-10-04'),
(3, 1, 'sqsq', 'qqs', NULL, NULL, NULL, NULL, NULL, 'william.brlsqqs', '$2y$11$71c4359338d7c5aa938eaucqa7TtR05g.YaoHpw/VWPRAJQ0Ouh4u', '2018-07-23 14:15:10', '2018-07-23 14:15:10', '2018-01-01'),
(4, 1, 'QSQSQS', 'QSQSQS', NULL, NULL, NULL, NULL, NULL, 'william.brl@gmail.com', '$2y$11$7a9482aa6e0a38c63517cOxTc7.Eb1Q944BoG5QmU3RsPWJYrKG/u', '2018-08-23 17:36:54', '2018-08-23 17:36:54', '2018-01-01'),
(5, 1, 'William', 'BRUEL', NULL, NULL, NULL, NULL, NULL, 'william.bruel@gmail.com', '$2y$11$9f34921fe1da4df23676bOxu1dGm4yfae7o5a.IQKVxXzxtI6Gsd2', '2018-09-10 14:19:13', '2018-09-10 14:19:14', '2018-01-01'),
(6, 1, 'William', 'Bruel', NULL, NULL, NULL, NULL, NULL, 'localhost', '$2y$11$ae93113a932535977974fOx37PsI0MMgjkJ/YGouotnFYOyYGnpGW', '2018-10-18 10:29:40', '2018-10-18 11:07:50', '2018-01-01'),
(7, 1, 'William', 'Bruel', NULL, NULL, NULL, NULL, NULL, '3w@2018', '$2y$11$1ada9ff1caf722372b35euCyNj6yQLBBy9C6GMAc1H24ORauIC6ci', '2018-10-18 11:09:10', '2018-10-24 17:34:20', '2018-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED DEFAULT NULL,
  `meals_id` int(10) UNSIGNED DEFAULT NULL,
  `quantityOrdered` int(4) UNSIGNED DEFAULT NULL,
  `priceEach` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `totalPrice` double DEFAULT NULL,
  `status` varchar(16) DEFAULT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `contents` text NOT NULL,
  `author_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `category_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `pictureUrl` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `contents`, `author_id`, `category_id`, `title`, `pictureUrl`) VALUES
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 'Notre Histoire', NULL),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 1, 'Notre Concept', NULL),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, 2, 'Lorem ipsum', '1.png');

-- --------------------------------------------------------

--
-- Structure de la table `productcategory`
--

CREATE TABLE `productcategory` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `contents` text NOT NULL,
  `pictureUrl` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `productcategory`
--

INSERT INTO `productcategory` (`id`, `name`, `contents`, `pictureUrl`) VALUES
(1, 'Mobilier', 'Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela securitas poterat in solido locari cunctorum.', ''),
(2, 'Electroménager', 'Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela securitas poterat in solido locari cunctorum.\r\n\r\n', ''),
(3, 'Lampes', 'Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela securitas poterat in solido locari cunctorum.\r\n\r\n', ''),
(4, 'Autres', 'Le thé blanc est une spécialité de la province chinoise du Fujian. De toutes les familles de thé, c\'est celle dont la feuille est la moins transformée par rapport à son état naturel. Non oxydé, le thé blanc ne subit que deux opérations : un flétrissage et une dessiccation. Il existe deux grands types de thés blancs : les Aiguilles d\'Argent et les Bai Mu Dan.', '');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref` varchar(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `buyPrice` double NOT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(512) NOT NULL,
  `promo_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `promodetails` varchar(64) NOT NULL,
  `category_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `quantityInStock` int(4) UNSIGNED DEFAULT NULL,
  `pictureUrl` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `ref`, `title`, `buyPrice`, `price`, `description`, `promo_id`, `promodetails`, `category_id`, `quantityInStock`, `pictureUrl`) VALUES
(1, '133742', 'Produit 1', 0.6, 3.75, 'Notre bagel est constitué d\'un pain moelleux avec des grains de sésame et du thon albacore, accompagné de feuilles de salade fraîche du jour et d\'une sauce renversante :-)', 1, 'Best-seller', NULL, 72, '1.jpg'),
(2, '133743', 'Produit 2', 2.75, 5.5, 'Notre bagel est constitué d\'un pain moelleux avec des grains de sésame et du thon albacore, accompagné de feuilles de salade fraîche du jour  et d\'une sauce renversante :-)', 1, 'Best-seller', NULL, 18, '2.jpg'),
(3, '133744', 'Produit 3', 6, 12.5, 'Ce délicieux cheeseburger contient un steak haché viande française de 150g ainsi que d\'un buns grillé juste comme il faut, le tout accompagné de frites fraîches maison !', 1, 'Nouveau', NULL, 14, '3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

CREATE TABLE `promo` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `promo`
--

INSERT INTO `promo` (`id`, `title`) VALUES
(1, 'Mettre en Avant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetails_meals_id_fk` (`meals_id`),
  ADD KEY `orderdetails_orders_id_fk` (`orders_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customers_id_fk` (`customer_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `promo_id` (`promo_id`),
  ADD KEY `promodetails_id` (`promodetails`);

--
-- Index pour la table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_meals_id_fk` FOREIGN KEY (`meals_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_orders_id_fk` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customers_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `productcategory` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
