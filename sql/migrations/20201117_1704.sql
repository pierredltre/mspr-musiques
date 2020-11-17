CREATE DATABASE IF NOT EXISTS `CHANSONS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `CHANSONS`;

CREATE TABLE `ARTISTE` (
  `artiste_id` VARCHAR(42),
  `nom` VARCHAR(42),
  PRIMARY KEY (`artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CERTIFICATION` (
  `certification_id` VARCHAR(42),
  `titre` VARCHAR(42),
  `date_obtention` VARCHAR(42),
  `single` VARCHAR(42),
  PRIMARY KEY (`certification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ECRIT` (
  `chanson_id` VARCHAR(42),
  `artiste_id` VARCHAR(42),
  PRIMARY KEY (`chanson_id`, `artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COMPOSE` (
  `album_id` VARCHAR(42),
  `artiste_id` VARCHAR(42),
  PRIMARY KEY (`album_id`, `artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `EST_DELIVREE_A` (
  `album_id` VARCHAR(42),
  `certification_id` VARCHAR(42),
  PRIMARY KEY (`album_id`, `certification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `UTILISATEUR` (
  `user_id` VARCHAR(42),
  `pseudo` VARCHAR(42),
  `mail` VARCHAR(42),
  `mdp` VARCHAR(42),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `AJOUTE` (
  `user_id` VARCHAR(42),
  `chanson_id` VARCHAR(42),
  PRIMARY KEY (`user_id`, `chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CHANSON` (
  `chanson_id` VARCHAR(42),
  `nom` VARCHAR(42),
  `date_de_sortie` VARCHAR(42),
  `cover` VARCHAR(42),
  `nombre_ecoutes` VARCHAR(42),
  `genre` VARCHAR(42),
  `pays` VARCHAR(42),
  PRIMARY KEY (`chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ALBUM` (
  `album_id` VARCHAR(42),
  `nom` VARCHAR(42),
  `date_de_sortie` VARCHAR(42),
  `cover` VARCHAR(42),
  `nombre_ecoutes` VARCHAR(42),
  `genre` VARCHAR(42),
  `pays` VARCHAR(42),
  `single` VARCHAR(42),
  `chanson_id` VARCHAR(42),
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CLASSEE_DANS` (
  `classement_id` VARCHAR(42),
  `chanson_id` VARCHAR(42),
  `date_insertion` VARCHAR(42),
  PRIMARY KEY (`classement_id`, `chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CLASSEMENT` (
  `classement_id` VARCHAR(42),
  `pays` VARCHAR(42),
  `genre` VARCHAR(42),
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
ALTER TABLE `ALBUM` ADD FOREIGN KEY (`chanson_id`) REFERENCES `CHANSON` (`chanson_id`);
ALTER TABLE `CLASSEE_DANS` ADD FOREIGN KEY (`chanson_id`) REFERENCES `CHANSON` (`chanson_id`);
ALTER TABLE `CLASSEE_DANS` ADD FOREIGN KEY (`classement_id`) REFERENCES `CLASSEMENT` (`classement_id`);