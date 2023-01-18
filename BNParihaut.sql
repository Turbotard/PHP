-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 18 jan. 2023 à 13:23
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bnparihaut`
--

-- --------------------------------------------------------

--
-- Structure de la table `bankaccounts`
--

CREATE TABLE `bankaccounts` (
  `id` int(11) NOT NULL,
  `numerocompte` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `solde` float NOT NULL DEFAULT '0',
  `id_currencies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `nomoney` varchar(255) NOT NULL,
  `valeure` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `currencies`
--

INSERT INTO `currencies` (`id`, `nomoney`, `valeure`) VALUES
(1, 'euro', 1),
(2, 'bitcoin', 19538.1),
(3, 'chamo', 10000),
(4, 'dollar', 0.92),
(5, 'eurobelge', 0.5),
(6, 'coding', 5800),
(7, 'dong', 0.000039);

-- --------------------------------------------------------

--
-- Structure de la table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `somme` float NOT NULL,
  `id_currencie` int(11) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `somme` float NOT NULL,
  `id_currencie` int(11) NOT NULL,
  `taux_change` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `naissance` date NOT NULL,
  `grade` int(11) NOT NULL DEFAULT '1',
  `client_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mdp`, `mail`, `tel`, `naissance`, `grade`, `client_number`) VALUES
(3, 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.tes', '0987654322', '2000-10-10', 1, '1644261803'),
(4, 'test2', 'test2', '109f4b3c50d7b0df729d299bc6f8e9ef9066971f', 'test2@gmail.com', '0123456789', '1999-11-11', 1, '2039502072'),
(5, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', '0987654321', '2004-12-12', 1000, '1093792769'),
(6, 'dardillac', 'esteban', 'df9a9e31aa162e462aafd4811053d1d072940ca7', 'est@gmail.com', '0987654321', '2004-09-04', 1, '1285224364');

-- --------------------------------------------------------

--
-- Structure de la table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `somme` float NOT NULL,
  `id_currencie` int(11) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_currencies` (`id_currencies`);

--
-- Index pour la table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_currencie` (`id_currencie`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compte` (`id_account`),
  ADD KEY `id_currencie` (`id_currencie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_currencie` (`id_currencie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD CONSTRAINT `bankaccounts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bankaccounts_ibfk_2` FOREIGN KEY (`id_currencies`) REFERENCES `currencies` (`id`);

--
-- Contraintes pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `deposits_ibfk_2` FOREIGN KEY (`id_currencie`) REFERENCES `currencies` (`id`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_currencie`) REFERENCES `currencies` (`id`);

--
-- Contraintes pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `withdrawals_ibfk_2` FOREIGN KEY (`id_currencie`) REFERENCES `currencies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
