CREATE DATABASE IF NOT EXISTS `MUSICOLOGIE` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `MUSICOLOGIE`;

CREATE TABLE `ARTISTE` (
  `artiste_id` int AUTO_INCREMENT,
  `nom` varchar(64),
  PRIMARY KEY (`artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CERTIFICATION` (
  `certification_id` int AUTO_INCREMENT,
  `titre` varchar(64),
  `date_obtention` date,
  `single` varchar(64),
  PRIMARY KEY (`certification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ECRIT` (
  `chanson_id` int,
  `artiste_id` int,
  PRIMARY KEY (`chanson_id`, `artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COMPOSE` (
  `album_id` int,
  `artiste_id` int,
  PRIMARY KEY (`album_id`, `artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `EST_DELIVREE_A` (
  `album_id` int,
  `certification_id` int,
  PRIMARY KEY (`album_id`, `certification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `UTILISATEUR` (
  `user_id` int AUTO_INCREMENT,
  `pseudo` varchar(64),
  `mail` varchar(254),
  `mdp` varchar(254),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `AJOUTE` (
  `user_id` int,
  `chanson_id` int,
  PRIMARY KEY (`user_id`, `chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CHANSON` (
  `chanson_id` int AUTO_INCREMENT,
  `nom` varchar(64),
  `date_de_sortie` date,
  `cover` VARCHAR(42),
  `nombre_ecoutes` VARCHAR(42),
  `genre` varchar(64),
  `pays` varchar(64),
  `album_id` int,
  PRIMARY KEY (`chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ALBUM` (
  `album_id` int AUTO_INCREMENT,
  `nom` varchar(64),
  `date_de_sortie` date,
  `cover` VARCHAR(42),
  `nombre_ecoutes` VARCHAR(42),
  `genre` varchar(64),
  `pays` varchar(64),
  `single` varchar(64),
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CLASSEE_DANS` (
  `classement_id` int,
  `chanson_id` int,
  `date_insertion` date,
  PRIMARY KEY (`classement_id`, `chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CLASSEMENT` (
  `classement_id` int AUTO_INCREMENT,
  `pays` varchar(64),
  `genre` varchar(64),
  PRIMARY KEY (`classement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ECRIT` ADD FOREIGN KEY (`artiste_id`) REFERENCES `ARTISTE` (`artiste_id`);
ALTER TABLE `ECRIT` ADD FOREIGN KEY (`chanson_id`) REFERENCES `CHANSON` (`chanson_id`);
ALTER TABLE `COMPOSE` ADD FOREIGN KEY (`artiste_id`) REFERENCES `ARTISTE` (`artiste_id`);
ALTER TABLE `COMPOSE` ADD FOREIGN KEY (`album_id`) REFERENCES `ALBUM` (`album_id`);
ALTER TABLE `EST_DELIVREE_A` ADD FOREIGN KEY (`certification_id`) REFERENCES `CERTIFICATION` (`certification_id`);
ALTER TABLE `EST_DELIVREE_A` ADD FOREIGN KEY (`album_id`) REFERENCES `ALBUM` (`album_id`);
ALTER TABLE `AJOUTE` ADD FOREIGN KEY (`chanson_id`) REFERENCES `CHANSON` (`chanson_id`);
ALTER TABLE `AJOUTE` ADD FOREIGN KEY (`user_id`) REFERENCES `UTILISATEUR` (`user_id`);
ALTER TABLE `CHANSON` ADD FOREIGN KEY (`album_id`) REFERENCES `ALBUM` (`album_id`);
ALTER TABLE `CLASSEE_DANS` ADD FOREIGN KEY (`chanson_id`) REFERENCES `CHANSON` (`chanson_id`);
ALTER TABLE `CLASSEE_DANS` ADD FOREIGN KEY (`classement_id`) REFERENCES `CLASSEMENT` (`classement_id`);