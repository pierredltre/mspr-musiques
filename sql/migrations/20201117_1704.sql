USE `mspr`;

CREATE TABLE `artiste` (
  `artiste_id` VARCHAR(42),
  `nom` VARCHAR(42),
  PRIMARY KEY (`artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `certification` (
  `certification_id` VARCHAR(42),
  `titre` VARCHAR(42),
  `date_obtention` VARCHAR(42),
  `single` VARCHAR(42),
  PRIMARY KEY (`certification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ecrit` (
  `chanson_id` VARCHAR(42),
  `artiste_id` VARCHAR(42),
  PRIMARY KEY (`chanson_id`, `artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `compose` (
  `album_id` VARCHAR(42),
  `artiste_id` VARCHAR(42),
  PRIMARY KEY (`album_id`, `artiste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `est_delivree_a` (
  `album_id` VARCHAR(42),
  `certification_id` VARCHAR(42),
  PRIMARY KEY (`album_id`, `certification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `utilisateur` (
  `user_id` VARCHAR(42),
  `pseudo` VARCHAR(42),
  `mail` VARCHAR(42),
  `mdp` VARCHAR(42),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ajoute` (
  `user_id` VARCHAR(42),
  `chanson_id` VARCHAR(42),
  PRIMARY KEY (`user_id`, `chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `chanson` (
  `chanson_id` VARCHAR(42),
  `nom` VARCHAR(42),
  `date_de_sortie` VARCHAR(42),
  `cover` VARCHAR(42),
  `nombre_ecoutes` VARCHAR(42),
  `genre` VARCHAR(42),
  `pays` VARCHAR(42),
  PRIMARY KEY (`chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `album` (
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

CREATE TABLE `classee_dans` (
  `classement_id` VARCHAR(42),
  `chanson_id` VARCHAR(42),
  `date_insertion` VARCHAR(42),
  PRIMARY KEY (`classement_id`, `chanson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `classement` (
  `classement_id` VARCHAR(42),
  `pays` VARCHAR(42),
  `genre` VARCHAR(42),
  PRIMARY KEY (`classement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ecrit` ADD FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`artiste_id`);
ALTER TABLE `ecrit` ADD FOREIGN KEY (`chanson_id`) REFERENCES `chanson` (`chanson_id`);
ALTER TABLE `compose` ADD FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`artiste_id`);
ALTER TABLE `compose` ADD FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`);
ALTER TABLE `est_delivree_a` ADD FOREIGN KEY (`certification_id`) REFERENCES `certification` (`certification_id`);
ALTER TABLE `est_delivree_a` ADD FOREIGN KEY (`album_id`) REFERENCES `ALBUM` (`album_id`);
ALTER TABLE `ajoute` ADD FOREIGN KEY (`chanson_id`) REFERENCES `chanson` (`chanson_id`);
ALTER TABLE `ajoute` ADD FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`);
ALTER TABLE `album` ADD FOREIGN KEY (`chanson_id`) REFERENCES `chanson` (`chanson_id`);
ALTER TABLE `classee_dans` ADD FOREIGN KEY (`chanson_id`) REFERENCES `chanson` (`chanson_id`);
ALTER TABLE `classee_dans` ADD FOREIGN KEY (`classement_id`) REFERENCES `classement` (`classement_id`);