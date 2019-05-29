-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 29 mai 2019 à 15:50
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediathèquekm`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `numAbonnement` int(11) NOT NULL,
  `date_debut_ab` date NOT NULL,
  `date_fin_ab` date NOT NULL,
  `numClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `adresseCompl` varchar(100) DEFAULT NULL,
  `ville` varchar(50) NOT NULL,
  `CodePost` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `date_naissance`, `mail`, `mdp`, `telephone`, `adresse`, `adresseCompl`, `ville`, `CodePost`) VALUES
(1, 'Knowles', 'Beyonce', '1992-11-28', 'beyonce.knowles@gmail.com', '', '0785563524', '18 rue de los angeles', NULL, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `numEmploye` int(11) NOT NULL,
  `nomEmploye` varchar(10) NOT NULL,
  `prenomEmploye` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employegestclient`
--

CREATE TABLE `employegestclient` (
  `numEmployeC` int(11) NOT NULL,
  `numClient` int(11) NOT NULL,
  `numEmploye` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enployegestmedia`
--

CREATE TABLE `enployegestmedia` (
  `numEmployeM` int(11) NOT NULL,
  `numEmploye` int(11) NOT NULL,
  `numMedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `numMedia` int(11) NOT NULL,
  `auteur` varchar(20) NOT NULL,
  `prix` int(11) NOT NULL,
  `type_Media` enum('Livre','CD','DVD','Revue') NOT NULL DEFAULT 'Livre',
  `nb_exemplaire` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `numNotif` int(11) NOT NULL,
  `mailNotif` varchar(100) NOT NULL,
  `numClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `numReservation` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_retour` date NOT NULL,
  `emprunte` tinyint(1) NOT NULL,
  `retour` tinyint(1) NOT NULL,
  `numClient` int(11) NOT NULL,
  `numMedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`numAbonnement`),
  ADD KEY `numClient` (`numClient`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`numEmploye`);

--
-- Index pour la table `employegestclient`
--
ALTER TABLE `employegestclient`
  ADD PRIMARY KEY (`numEmployeC`),
  ADD KEY `numClient` (`numClient`),
  ADD KEY `numEmploye` (`numEmploye`);

--
-- Index pour la table `enployegestmedia`
--
ALTER TABLE `enployegestmedia`
  ADD PRIMARY KEY (`numEmployeM`),
  ADD KEY `numEmploye` (`numEmploye`),
  ADD KEY `numMedia` (`numMedia`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`numMedia`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`numNotif`),
  ADD UNIQUE KEY `numClient` (`numClient`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`numReservation`),
  ADD KEY `numClient` (`numClient`),
  ADD KEY `numMedia` (`numMedia`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `numAbonnement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `numEmploye` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employegestclient`
--
ALTER TABLE `employegestclient`
  MODIFY `numEmployeC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enployegestmedia`
--
ALTER TABLE `enployegestmedia`
  MODIFY `numEmployeM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `numMedia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `numNotif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numReservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `abonnement_ibfk_1` FOREIGN KEY (`numClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `employegestclient`
--
ALTER TABLE `employegestclient`
  ADD CONSTRAINT `employegestclient_ibfk_1` FOREIGN KEY (`numClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `employegestclient_ibfk_2` FOREIGN KEY (`numEmploye`) REFERENCES `employe` (`numEmploye`);

--
-- Contraintes pour la table `enployegestmedia`
--
ALTER TABLE `enployegestmedia`
  ADD CONSTRAINT `enployegestmedia_ibfk_1` FOREIGN KEY (`numEmploye`) REFERENCES `employe` (`numEmploye`),
  ADD CONSTRAINT `enployegestmedia_ibfk_2` FOREIGN KEY (`numMedia`) REFERENCES `media` (`numMedia`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`numClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`numMedia`) REFERENCES `media` (`numMedia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;