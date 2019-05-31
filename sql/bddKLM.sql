-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 31 mai 2019 à 00:20
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `id` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `membre` int(11) NOT NULL,
  `media` int(11) NOT NULL,
  `note` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `message`, `membre`, `media`, `note`) VALUES
(1, 'Cet album est génial !', 4, 2, 5),
(2, 'Meilleur dessin animé de mon enfance', 4, 3, 5),
(5, 'Alors on danse', 4, 4, 5),
(6, 'test', 4, 4, 3),
(7, 'test', 4, 4, 3),
(8, 'test', 4, 4, 3),
(9, 'test', 4, 4, 3),
(10, 'La maman de Bambi meurt et c\'est trop triste', 4, 5, 3),
(11, 'Chanteurs trÃ¨s compÃ©tents', 4, 6, 5),
(12, 'Il en faut peu pour Ãªtre heureux', 4, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `membre` int(11) NOT NULL,
  `objet` text NOT NULL,
  `message` text NOT NULL,
  `traite` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `membre`, `objet`, `message`, `traite`) VALUES
(1, 4, 'Ajout de manga', 'Pourriez-vous ajouter des mangas Ã  la mÃ©diathÃ¨que ?', 0),
(2, 4, 'contact', 'message', 0);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `auteur` varchar(20) NOT NULL,
  `prix` int(11) NOT NULL,
  `type` enum('Livre','CD','DVD','Revue') NOT NULL DEFAULT 'Livre',
  `nbExemplaire` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `auteur`, `prix`, `type`, `nbExemplaire`, `titre`, `photo`) VALUES
(1, 'Rudyard Kipling', 5, 'Livre', 4, 'Le Livre de la jungle', 'LivreJungle.jpg'),
(2, 'Les casseurs flowter', 15, 'DVD', 4, 'Comment c\'est loin', 'Caeurs-Flowters.jpg'),
(3, 'Esteban', 5, 'DVD', 0, 'Les mystÃ©rieuses citÃ©s d\'or', 'mysterieusecitedor.jpg'),
(4, 'Stromae', 11, 'CD', 0, 'Racine CarrÃ©e', 'racine_carre.jpg'),
(5, 'Disney', 5, 'DVD', 0, 'Bambi', 'bambi.jpg'),
(6, 'Imagine dragons', 12, 'CD', 20, 'Evolve', 'Evolve.jpg'),
(7, 'Avengers', 20, 'DVD', 54, 'Infinity War', 'InfinityWar.jpg'),
(13, 'Marc Levy', 10, 'Livre', 10, 'La premiÃ¨re nuit', 'LaPremiereNuit.jpg'),
(15, 'Charles Aznavour', 12, 'CD', 2, 'Hier encore', 'aznavour.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `dateNaissance` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `adresseComplement` varchar(100) DEFAULT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `type` enum('client','gestMedia','gestClient','administrateur') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `dateNaissance`, `mail`, `mdp`, `telephone`, `adresse`, `adresseComplement`, `ville`, `codePostal`, `type`) VALUES
(1, 'Knowles', 'Beyonce', '1992-11-28', 'beyonce.knowles@gmail.com', '', '0785563524', '18 rue de los angeles', NULL, '', 0, 'client'),
(2, 'Vincent', 'Manon', '1997-04-19', 'manon.vincent@gmail.com', '', '0781236596', '7 rue des coquelicots', NULL, '', 0, 'client'),
(3, 'Germanotta', 'Stephanie', '1986-03-28', 'stephanie.germanotta@gmail.com', '', '0652324152', '6 rue de New York', NULL, '', 0, 'client'),
(4, 'Goulley', 'AurÃ©lien', '1997-05-26', 'aurelien.goulley@gmail.com', 'test', '0699938106', '6 rue George Sand', 'a', 'a', 91220, 'administrateur'),
(5, 'Youssef', 'Housni', '1998-04-01', 'youssef.housni@gmail.com', 'yh', '0612457896', '5 rue des coquelicots', NULL, '', 0, 'gestClient'),
(6, 'Apavou', 'Florian', '1997-01-01', 'florian.apavou@gmail.com', 'af', '0636255148', '6 rue des coquelicots', NULL, '', 0, 'administrateur'),
(7, 'Vassout', 'Emilie', '0000-00-00', 'emilie.vassout@gmail.com', 'baeislove', '0666666666', 'Chez bae', NULL, 'Brétigny sur orge', 91220, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `membre` int(11) NOT NULL,
  `media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `membre`, `media`) VALUES
(11, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateRetour` date NOT NULL,
  `emprunte` tinyint(1) NOT NULL DEFAULT '0',
  `retour` tinyint(1) NOT NULL DEFAULT '0',
  `membre` int(11) NOT NULL,
  `media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `dateDebut`, `dateRetour`, `emprunte`, `retour`, `membre`, `media`) VALUES
(1, '2019-05-30', '2019-06-14', 0, 1, 4, 15),
(21, '2019-05-30', '2019-06-14', 0, 1, 4, 15),
(22, '2019-05-30', '2019-05-30', 0, 1, 4, 15),
(23, '2019-05-30', '2019-06-14', 0, 1, 4, 13),
(24, '2019-05-30', '2019-06-14', 1, 0, 4, 7),
(25, '2019-05-30', '2019-05-30', 0, 1, 4, 6),
(26, '2019-05-30', '2019-06-14', 0, 0, 4, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonnement_ibfk_1` (`membre`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK_client` (`membre`) USING BTREE,
  ADD KEY `FK_media` (`media`) USING BTREE;

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membre` (`membre`) USING BTREE;

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_media` (`media`) USING BTREE,
  ADD KEY `FK_client` (`membre`) USING BTREE;

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numClient` (`membre`),
  ADD KEY `numMedia` (`media`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `abonnement_ibfk_1` FOREIGN KEY (`membre`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`membre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`media`) REFERENCES `media` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_membre` FOREIGN KEY (`membre`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`media`) REFERENCES `media` (`id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`membre`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`membre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`media`) REFERENCES `media` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
