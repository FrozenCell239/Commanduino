CREATE DATABASE IF NOT EXISTS `cabinet` DEFAULT CHARACTER SET UTF8MB4 COLLATE utf8mb4_unicode_ci;
USE `cabinet`;

CREATE TABLE `badges_visiophone`(
    `id_badge` INT(11) NOT NULL PRIMARY KEY,
    `mdp_badge` VARCHAR(42) NOT NULL,
    `actif` BOOLEAN NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `code_visiophone`(
    `id_code` INT(11) NOT NULL PRIMARY KEY,
    `mdp_code` VARCHAR(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `patients`(
    `id_patient` INT(11) NOT NULL PRIMARY KEY,
    `nom_patient` VARCHAR(42) NOT NULL,
    `prenom_patient` VARCHAR(42) NOT NULL,
    `besoin` VARCHAR(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `personnel`(
    `id_personnel` INT(11) NOT NULL PRIMARY KEY,
    `prenom_personnel` VARCHAR(42) NOT NULL,
    `nom_personnel` VARCHAR(42) NOT NULL,
    `profession` VARCHAR(42) NOT NULL,
    `identifiant` VARCHAR(42) NOT NULL,
    `mot_de_passe` VARCHAR(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `reservations`(
    `id_reservation` INT(11) NOT NULL PRIMARY KEY,
    `id_personnel` INT(11) NOT NULL,
    `id_salle` INT(11) NOT NULL,
    `id_patient` INT(11) NOT NULL,
    `date_heure_reservation` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `salles`(
    `id_salle` INT(11) NOT NULL PRIMARY KEY,
    `nom_salle` VARCHAR(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

ALTER TABLE `reservations` ADD FOREIGN KEY (`id_patient`) REFERENCES `patients`(`id_patient`);
ALTER TABLE `reservations` ADD FOREIGN KEY (`id_salle`) REFERENCES `salles`(`id_salle`);
ALTER TABLE `reservations` ADD FOREIGN KEY (`id_personnel`) REFERENCES `personnel`(`id_personnel`);