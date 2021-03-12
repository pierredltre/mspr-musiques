-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 11 jan. 2021 à 12:42
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `MUSICOLOGIE`
--

-- --------------------------------------------------------

--
-- Structure de la table `AJOUTE`
--

CREATE TABLE `AJOUTE` (
  `user_id` int(11) NOT NULL,
  `chanson_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ALBUM`
--

CREATE TABLE `ALBUM` (
  `album_id` int(11) NOT NULL,
  `nom` varchar(64) DEFAULT NULL,
  `date_de_sortie` date DEFAULT NULL,
  `cover` varchar(42) DEFAULT NULL,
  `nombre_ecoutes` varchar(42) DEFAULT NULL,
  `genre` varchar(64) DEFAULT NULL,
  `pays` varchar(64) DEFAULT NULL,
  `single` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ALBUM`
--

INSERT INTO `ALBUM` (`album_id`, `nom`, `date_de_sortie`, `cover`, `nombre_ecoutes`, `genre`, `pays`, `single`) VALUES
(1, 'Take Care', '2011-06-28', '71tXyEB632L._SL1200_.jpg', '12000000', 'RAPFR', 'FR', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `ARTISTE`
--

CREATE TABLE `ARTISTE` (
  `artiste_id` int(11) NOT NULL,
  `nom` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ARTISTE`
--

INSERT INTO `ARTISTE` (`artiste_id`, `nom`) VALUES
(1, 'drake');

-- --------------------------------------------------------

--
-- Structure de la table `CERTIFICATION`
--

CREATE TABLE `CERTIFICATION` (
  `certification_id` int(11) NOT NULL,
  `titre` varchar(64) DEFAULT NULL,
  `date_obtention` date DEFAULT NULL,
  `single` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CHANSON`
--

CREATE TABLE `CHANSON` (
  `chanson_id` int(11) NOT NULL,
  `nom` varchar(64) DEFAULT NULL,
  `date_de_sortie` date DEFAULT NULL,
  `cover` varchar(42) DEFAULT NULL,
  `nombre_ecoutes` varchar(42) DEFAULT NULL,
  `genre` varchar(64) DEFAULT NULL,
  `pays` varchar(64) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `CHANSON`
--

INSERT INTO `CHANSON` (`chanson_id`, `nom`, `date_de_sortie`, `cover`, `nombre_ecoutes`, `genre`, `pays`, `album_id`) VALUES
(1, 'Marvins Room', '2011-06-28', '71tXyEB632L._SL1200_.jpg', '12000000', 'R&B', 'FR', 1),
(3, 'On My Dead Body', '2011-06-29', '71tXyEB632L._SL1200_.jpg', '12000000', 'RAPFR', 'FR', 1);

-- --------------------------------------------------------

--
-- Structure de la table `CLASSEE_DANS`
--

CREATE TABLE `CLASSEE_DANS` (
  `classement_id` int(11) NOT NULL,
  `chanson_id` int(11) NOT NULL,
  `date_insertion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CLASSEMENT`
--

CREATE TABLE `CLASSEMENT` (
  `classement_id` int(11) NOT NULL,
  `pays` varchar(64) DEFAULT NULL,
  `genre` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `COMPOSE`
--

CREATE TABLE `COMPOSE` (
  `album_id` int(11) NOT NULL,
  `artiste_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `COMPOSE`
--

INSERT INTO `COMPOSE` (`album_id`, `artiste_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ECRIT`
--

CREATE TABLE `ECRIT` (
  `chanson_id` int(11) NOT NULL,
  `artiste_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ECRIT`
--

INSERT INTO `ECRIT` (`chanson_id`, `artiste_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `EST_DELIVREE_A`
--

CREATE TABLE `EST_DELIVREE_A` (
  `album_id` int(11) NOT NULL,
  `certification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `user_id` int(11) NOT NULL,
  `pseudo` varchar(64) DEFAULT NULL,
  `mail` varchar(254) DEFAULT NULL,
  `mdp` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `AJOUTE`
--
ALTER TABLE `AJOUTE`
  ADD PRIMARY KEY (`user_id`,`chanson_id`),
  ADD KEY `chanson_id` (`chanson_id`);

--
-- Index pour la table `ALBUM`
--
ALTER TABLE `ALBUM`
  ADD PRIMARY KEY (`album_id`);

--
-- Index pour la table `ARTISTE`
--
ALTER TABLE `ARTISTE`
  ADD PRIMARY KEY (`artiste_id`);

--
-- Index pour la table `CERTIFICATION`
--
ALTER TABLE `CERTIFICATION`
  ADD PRIMARY KEY (`certification_id`);

--
-- Index pour la table `CHANSON`
--
ALTER TABLE `CHANSON`
  ADD PRIMARY KEY (`chanson_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Index pour la table `CLASSEE_DANS`
--
ALTER TABLE `CLASSEE_DANS`
  ADD PRIMARY KEY (`classement_id`,`chanson_id`),
  ADD KEY `chanson_id` (`chanson_id`);

--
-- Index pour la table `CLASSEMENT`
--
ALTER TABLE `CLASSEMENT`
  ADD PRIMARY KEY (`classement_id`);

--
-- Index pour la table `COMPOSE`
--
ALTER TABLE `COMPOSE`
  ADD PRIMARY KEY (`album_id`,`artiste_id`),
  ADD KEY `artiste_id` (`artiste_id`);

--
-- Index pour la table `ECRIT`
--
ALTER TABLE `ECRIT`
  ADD PRIMARY KEY (`chanson_id`,`artiste_id`),
  ADD KEY `artiste_id` (`artiste_id`);

--
-- Index pour la table `EST_DELIVREE_A`
--
ALTER TABLE `EST_DELIVREE_A`
  ADD PRIMARY KEY (`album_id`,`certification_id`),
  ADD KEY `certification_id` (`certification_id`);

--
-- Index pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ALBUM`
--
ALTER TABLE `ALBUM`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ARTISTE`
--
ALTER TABLE `ARTISTE`
  MODIFY `artiste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `CERTIFICATION`
--
ALTER TABLE `CERTIFICATION`
  MODIFY `certification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `CHANSON`
--
ALTER TABLE `CHANSON`
  MODIFY `chanson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `CLASSEMENT`
--
ALTER TABLE `CLASSEMENT`
  MODIFY `classement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `AJOUTE`
--
ALTER TABLE `AJOUTE`
  ADD CONSTRAINT `ajoute_ibfk_1` FOREIGN KEY (`chanson_id`) REFERENCES `CHANSON` (`chanson_id`),
  ADD CONSTRAINT `ajoute_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `UTILISATEUR` (`user_id`);

--
-- Contraintes pour la table `CHANSON`
--
ALTER TABLE `CHANSON`
  ADD CONSTRAINT `chanson_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `ALBUM` (`album_id`);

--
-- Contraintes pour la table `CLASSEE_DANS`
--
ALTER TABLE `CLASSEE_DANS`
  ADD CONSTRAINT `classee_dans_ibfk_1` FOREIGN KEY (`chanson_id`) REFERENCES `CHANSON` (`chanson_id`),
  ADD CONSTRAINT `classee_dans_ibfk_2` FOREIGN KEY (`classement_id`) REFERENCES `CLASSEMENT` (`classement_id`);

--
-- Contraintes pour la table `COMPOSE`
--
ALTER TABLE `COMPOSE`
  ADD CONSTRAINT `compose_ibfk_1` FOREIGN KEY (`artiste_id`) REFERENCES `ARTISTE` (`artiste_id`),
  ADD CONSTRAINT `compose_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `ALBUM` (`album_id`);

--
-- Contraintes pour la table `ECRIT`
--
ALTER TABLE `ECRIT`
  ADD CONSTRAINT `ecrit_ibfk_1` FOREIGN KEY (`artiste_id`) REFERENCES `ARTISTE` (`artiste_id`),
  ADD CONSTRAINT `ecrit_ibfk_2` FOREIGN KEY (`chanson_id`) REFERENCES `CHANSON` (`chanson_id`);

--
-- Contraintes pour la table `EST_DELIVREE_A`
--
ALTER TABLE `EST_DELIVREE_A`
  ADD CONSTRAINT `est_delivree_a_ibfk_1` FOREIGN KEY (`certification_id`) REFERENCES `CERTIFICATION` (`certification_id`),
  ADD CONSTRAINT `est_delivree_a_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `ALBUM` (`album_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
