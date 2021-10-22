-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 22 oct. 2021 à 07:26
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdtk`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `NUMERO_ALBUM` int(11) NOT NULL,
  `TITRE_ALBUM` varchar(40) NOT NULL,
  `NUMERO_SAGA` varchar(3) NOT NULL,
  `PRIX_ALBUM` float NOT NULL,
  `IDENTIFIANT_AUTEUR` int(11) NOT NULL,
  `IDENTIFIANT_SERIE` int(11) NOT NULL,
  `IDENTIFIANT_UTILISATEUR` int(11) NOT NULL,
  `IDENTIFIANT_UTILISATEUR_MODIFIER` int(11) DEFAULT NULL,
  `IDENTIFIANT_UTILISATEUR_RETIRE` int(11) DEFAULT NULL,
  `LIB_POCH_ALB` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NUMERO_ALBUM`),
  KEY `idauteur` (`IDENTIFIANT_AUTEUR`),
  KEY `idserie` (`IDENTIFIANT_SERIE`),
  KEY `IDUSERCREATE` (`IDENTIFIANT_UTILISATEUR`),
  KEY `IDUSERDELETE` (`IDENTIFIANT_UTILISATEUR_RETIRE`),
  KEY `IDUSERUPDATE` (`IDENTIFIANT_UTILISATEUR_MODIFIER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `album`
--

INSERT INTO `album` (`NUMERO_ALBUM`, `TITRE_ALBUM`, `NUMERO_SAGA`, `PRIX_ALBUM`, `IDENTIFIANT_AUTEUR`, `IDENTIFIANT_SERIE`, `IDENTIFIANT_UTILISATEUR`, `IDENTIFIANT_UTILISATEUR_MODIFIER`, `IDENTIFIANT_UTILISATEUR_RETIRE`, `LIB_POCH_ALB`) VALUES
(2, 'Machine qui rêve', '46', 23.5, 14, 2, 4, NULL, NULL, 'Spirou et Fantasio-46-Machine qui rêve.jpg'),
(61, 'Chez les castors', '03', 9.8, 33, 30, 4, NULL, NULL, 'Yakari-03-Chez les castors.jpg'),
(182, 'L\'affaire le chat', '11', 12.8, 66, 46, 4, NULL, NULL, 'Le chat-11-Laffaire le chat.jpg'),
(183, 'Perceval et le dragon d\'airain', '04', 12.9, 67, 47, 4, NULL, NULL, 'Kaamelott-04-Perceval et le dragon dAirain.jpg'),
(184, 'L\'armée du nécromant', '01', 10.9, 67, 47, 4, NULL, NULL, 'Kaamelott-01-Larmée du Nécromant.jpg'),
(263, 'Des os pilants', '04', 9.58, 79, 53, 4, NULL, NULL, 'Pierre tombal-04-Des os pilants.jpg'),
(312, 'La saga des gaffes', '14', 10.67, 23, 67, 4, NULL, NULL, 'Gaston-14-La saga des gaffes.jpg'),
(313, 'Gaffe à Lagaffe', '15', 10.67, 23, 67, 4, NULL, NULL, 'Gaston-15-Gaffe à Lagaffe.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `amende`
--

DROP TABLE IF EXISTS `amende`;
CREATE TABLE IF NOT EXISTS `amende` (
  `MIN_RETD` int(11) NOT NULL,
  `MAX_RETD` int(11) NOT NULL,
  `AMENDE_JOUR` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `amende`
--

INSERT INTO `amende` (`MIN_RETD`, `MAX_RETD`, `AMENDE_JOUR`) VALUES
(1, 3, 10),
(4, 7, 12),
(8, 14, 15),
(15, 1000, 20);

-- --------------------------------------------------------

--
-- Structure de la table `amende_perte`
--

DROP TABLE IF EXISTS `amende_perte`;
CREATE TABLE IF NOT EXISTS `amende_perte` (
  `PRIX_ALB_MIN` float NOT NULL,
  `PRIX_ALB_MAX` float NOT NULL,
  `AMENDE_PERTE` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `amende_perte`
--

INSERT INTO `amende_perte` (`PRIX_ALB_MIN`, `PRIX_ALB_MAX`, `AMENDE_PERTE`) VALUES
(0, 9, 15),
(10, 15, 20),
(16, 1e16, 1e23);

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `IDENTIFIANT_AUTEUR` int(11) NOT NULL,
  `LIBELLE_AUTEUR` varchar(40) NOT NULL,
  PRIMARY KEY (`IDENTIFIANT_AUTEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`IDENTIFIANT_AUTEUR`, `LIBELLE_AUTEUR`) VALUES
(14, 'Tome, Janry'),
(23, 'Franquin'),
(33, 'Derib, Job'),
(66, 'Geluck'),
(67, 'Astier, Dupré'),
(79, 'Cauvin, Hardy');

-- --------------------------------------------------------

--
-- Structure de la table `avatar_utilisateur`
--

DROP TABLE IF EXISTS `avatar_utilisateur`;
CREATE TABLE IF NOT EXISTS `avatar_utilisateur` (
  `IDENTIFIANT_AVATAR_UTILISATEUR` int(11) NOT NULL,
  `LIBELLE_AVATEUR_UTILISATEUR` varchar(40) NOT NULL,
  PRIMARY KEY (`IDENTIFIANT_AVATAR_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avatar_utilisateur`
--

INSERT INTO `avatar_utilisateur` (`IDENTIFIANT_AVATAR_UTILISATEUR`, `LIBELLE_AVATEUR_UTILISATEUR`) VALUES
(1, 'Arthur.jpg'),
(2, 'Blaise.jpg'),
(3, 'Bohort.jpg'),
(4, 'Guenievre.jpg'),
(5, 'Guethenoc.jpg'),
(6, 'Kadoc.jpg'),
(7, 'Karadoc.jpg'),
(8, 'Lancelot.jpg'),
(9, 'Leodagan.jpg'),
(10, 'Merlin.jpg'),
(11, 'Perceval.jpg'),
(12, 'Roparzh.jpg'),
(13, 'Seli.jpg'),
(14, 'Ygerne.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `bdtk`
--

DROP TABLE IF EXISTS `bdtk`;
CREATE TABLE IF NOT EXISTS `bdtk` (
  `CODE_BDTK` int(4) NOT NULL,
  `NOM_BDTK` varchar(50) NOT NULL,
  `ADRESSE_BDTK` varchar(50) NOT NULL,
  `CP_BDTK` int(11) NOT NULL,
  `VILLE_BDTK` varchar(25) NOT NULL,
  PRIMARY KEY (`CODE_BDTK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bdtk`
--

INSERT INTO `bdtk` (`CODE_BDTK`, `NOM_BDTK`, `ADRESSE_BDTK`, `CP_BDTK`, `VILLE_BDTK`) VALUES
(1, 'CENTRE CULTUREL DES MARMUSOTS', '74 RUE DES MARMUSOTS', 21000, 'DIJON'),
(2, 'CENTRE CULTUREL DES CHOUPISSON', '12 RUE TROP MIMS', 21850, 'SAINT-APOLLINAIRE'),
(3, 'BEDETHEQUE DE TALANT', '42 CHEMIN DES AIGES ', 21240, 'TALANT');

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

DROP TABLE IF EXISTS `emplacement`;
CREATE TABLE IF NOT EXISTS `emplacement` (
  `CODE_EMPLACEMENT` varchar(15) NOT NULL,
  `NUMERO_RAYON` int(11) NOT NULL,
  `NUMERO_ETAGERE` int(11) NOT NULL,
  PRIMARY KEY (`CODE_EMPLACEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emplacement`
--

INSERT INTO `emplacement` (`CODE_EMPLACEMENT`, `NUMERO_RAYON`, `NUMERO_ETAGERE`) VALUES
('E1R1', 1, 1),
('E2R6', 6, 2),
('E3R25', 25, 3),
('E3R5', 5, 3),
('E4R19', 19, 4),
('E4R8', 8, 4);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `NUMERO_EMPRUNT` int(11) NOT NULL AUTO_INCREMENT,
  `DATE_D_EMPRUNT` date NOT NULL,
  `DATE_RETOUR` date DEFAULT NULL,
  `NBR_JOUR_RETARD` int(3) DEFAULT NULL,
  `PERTE` tinyint(1) DEFAULT NULL,
  `IDENTIFIANT_UTILISATEUR` int(11) NOT NULL,
  `CODE_EXEMPLAIRE` int(6) NOT NULL,
  PRIMARY KEY (`NUMERO_EMPRUNT`),
  KEY `CODE_EXEMPLAIRE` (`CODE_EXEMPLAIRE`),
  KEY `IDENTIFIANT_UTILISATEUR` (`IDENTIFIANT_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`NUMERO_EMPRUNT`, `DATE_D_EMPRUNT`, `DATE_RETOUR`, `NBR_JOUR_RETARD`, `PERTE`, `IDENTIFIANT_UTILISATEUR`, `CODE_EXEMPLAIRE`) VALUES
(1, '2021-09-15', NULL, NULL, NULL, 7, 18302),
(2, '2021-09-17', NULL, NULL, NULL, 11, 18401),
(3, '2021-09-09', NULL, NULL, NULL, 14, 31201),
(4, '2021-06-14', NULL, NULL, NULL, 10, 201),
(5, '2021-08-25', NULL, NULL, NULL, 8, 6101),
(6, '2021-08-12', NULL, NULL, NULL, 23, 18205);

-- --------------------------------------------------------

--
-- Structure de la table `etat_exemplaire`
--

DROP TABLE IF EXISTS `etat_exemplaire`;
CREATE TABLE IF NOT EXISTS `etat_exemplaire` (
  `CODE_ETAT` varchar(2) NOT NULL,
  `LIBELLE_ETAT` varchar(25) NOT NULL,
  PRIMARY KEY (`CODE_ETAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat_exemplaire`
--

INSERT INTO `etat_exemplaire` (`CODE_ETAT`, `LIBELLE_ETAT`) VALUES
('AE', 'Assez bon état'),
('BE', 'Bon état'),
('ED', 'Etat détruit'),
('ME', 'Mauvais état');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `CODE_EXEMPLAIRE` int(6) NOT NULL,
  `DISPONIBILITE_EXEMPLAIRE` varchar(3) NOT NULL DEFAULT 'OUI' COMMENT 'OUI/NON',
  `NUMERO_ALBUM` int(11) NOT NULL,
  `CODE_ETAT` varchar(2) NOT NULL,
  `IDENTIFIANT_UTILISATEUR` int(11) NOT NULL,
  `IDENTIFIANT_UTILISATEUR_SUPPRIME` int(11) DEFAULT NULL,
  `IDENTIFIANT_UTILISATEUR__MODIFIE` int(11) DEFAULT NULL,
  `CODE BDTK` int(4) DEFAULT NULL,
  PRIMARY KEY (`CODE_EXEMPLAIRE`),
  KEY `NUMAL` (`NUMERO_ALBUM`),
  KEY `IDUSERSUPR` (`IDENTIFIANT_UTILISATEUR_SUPPRIME`),
  KEY `CODEBDTK` (`CODE BDTK`),
  KEY `codeetat` (`CODE_ETAT`),
  KEY `IDENTIFIANT_UTILISATEUR` (`IDENTIFIANT_UTILISATEUR`),
  KEY `IDENTIFIANT_UTILISATEUR__MODIFIE` (`IDENTIFIANT_UTILISATEUR__MODIFIE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`CODE_EXEMPLAIRE`, `DISPONIBILITE_EXEMPLAIRE`, `NUMERO_ALBUM`, `CODE_ETAT`, `IDENTIFIANT_UTILISATEUR`, `IDENTIFIANT_UTILISATEUR_SUPPRIME`, `IDENTIFIANT_UTILISATEUR__MODIFIE`, `CODE BDTK`) VALUES
(201, 'OUI', 2, 'BE', 4, NULL, NULL, 1),
(202, 'NON', 2, 'AE', 4, NULL, 4, 2),
(6101, 'OUI', 61, 'BE', 4, NULL, NULL, 1),
(6102, 'OUI', 61, 'AE', 4, NULL, 4, 1),
(6103, 'NON', 61, 'AE', 4, NULL, NULL, 1),
(18205, 'OUI', 182, 'AE', 4, NULL, NULL, 1),
(18302, 'OUI', 183, 'BE', 4, NULL, NULL, 1),
(18401, 'OUI', 184, 'AE', 4, NULL, NULL, 1),
(26302, 'NON', 263, 'ED', 4, NULL, NULL, NULL),
(31201, 'OUI', 312, 'BE', 4, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lettre de rappel`
--

DROP TABLE IF EXISTS `lettre de rappel`;
CREATE TABLE IF NOT EXISTS `lettre de rappel` (
  `NUMERO RECOMMANDE` varchar(13) NOT NULL,
  `DATE ENVOI` date NOT NULL,
  `TYPE DE RAPPEL` varchar(6) NOT NULL,
  `IDENTIFIANT UTILISATEUR` int(6) NOT NULL,
  `IDENTIFIANT UTILISATEUR ENVOI` int(6) NOT NULL,
  PRIMARY KEY (`NUMERO RECOMMANDE`),
  KEY `UTILISATEUR` (`IDENTIFIANT UTILISATEUR`),
  KEY `UTIENVOI` (`IDENTIFIANT UTILISATEUR ENVOI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pochette_album`
--

DROP TABLE IF EXISTS `pochette_album`;
CREATE TABLE IF NOT EXISTS `pochette_album` (
  `IDENTIFIANT_POCHETTE_ALBUM` int(11) NOT NULL,
  `LIBELLE_POCHETTE_ALBUM` varchar(50) NOT NULL,
  `NUMERO_ALBUM` int(11) NOT NULL,
  PRIMARY KEY (`IDENTIFIANT_POCHETTE_ALBUM`),
  KEY `numalb` (`NUMERO_ALBUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pochette_album`
--

INSERT INTO `pochette_album` (`IDENTIFIANT_POCHETTE_ALBUM`, `LIBELLE_POCHETTE_ALBUM`, `NUMERO_ALBUM`) VALUES
(246, 'machine_qui_reve.jpg', 2),
(3003, 'chez_les_castors.jpg', 61),
(4611, 'l_affaire_le_chat.jpg', 182),
(4701, 'l_armee_du_necromant.jpg', 184),
(4704, 'perceval_et_le_dragon_d_airain.jpg', 183),
(5304, 'des_os_pilants.jpg', 263),
(6714, 'la_saga_des_gaffes.jpg', 312),
(6715, 'gaffe_a_lagaffe.jpg', 313);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `IDENTIFIANT_ROLE` int(11) NOT NULL,
  `LIBELLE_ROLE` varchar(25) NOT NULL,
  PRIMARY KEY (`IDENTIFIANT_ROLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`IDENTIFIANT_ROLE`, `LIBELLE_ROLE`) VALUES
(1, 'Adhérent'),
(2, 'Bibliothécaire'),
(3, 'Gestionnaire de fond'),
(4, 'Responsable'),
(5, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `IDENTIFIANT_SERIE` int(11) NOT NULL,
  `LIBELLE_SERIE` varchar(40) NOT NULL,
  `CODE_EMPLACEMENT` varchar(15) NOT NULL,
  PRIMARY KEY (`IDENTIFIANT_SERIE`),
  UNIQUE KEY `LIBELLE_SERIE` (`LIBELLE_SERIE`),
  KEY `EMPLA` (`CODE_EMPLACEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`IDENTIFIANT_SERIE`, `LIBELLE_SERIE`, `CODE_EMPLACEMENT`) VALUES
(2, 'Spirou et Fantasio', 'E1R1'),
(12, 'Mexico', 'E3R5'),
(15, 'OuiFrançois', 'E1R1'),
(18, 'Tintin et son chien', 'E2R6'),
(25, 'Titeuf', 'E1R1'),
(30, 'Yakari', 'E2R6'),
(45, 'Lucky Luke', 'E3R5'),
(46, 'Le chat', 'E4R19'),
(47, 'Kaamelot', 'E3R5'),
(53, 'Pierre Tombal', 'E3R5'),
(67, ' Gaston', 'E4R8'),
(93, 'Tintin et ses potes', 'E2R6'),
(94, 'Tintin Coquin', 'E3R5'),
(95, 'Tintin Malin', 'E2R6'),
(97, 'Philippe2356', 'E3R5'),
(98, 'Star Wars', 'E1R1'),
(789, 'Jenjen', 'E3R5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_USE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_USE` varchar(25) NOT NULL,
  `PRENOM_USE` varchar(25) NOT NULL,
  `MDP_USE` varchar(20) NOT NULL,
  `EMAIL_USE` varchar(30) NOT NULL,
  `ID_ROLE` int(11) NOT NULL,
  `LIB_AVATAR` varchar(50) DEFAULT NULL,
  `DATENAISS_USE` date NOT NULL,
  `ADR_USE` varchar(50) DEFAULT NULL,
  `CP_USE` int(11) DEFAULT NULL,
  `VILLE_USE` varchar(25) DEFAULT NULL,
  `ID_USE_CREATE` int(11) DEFAULT NULL,
  `ID_USE_UPD` int(11) DEFAULT NULL,
  `DATE_VAL_COTIS` date DEFAULT NULL,
  `ID_USE_DEL` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USE`),
  KEY `ROLE` (`ID_ROLE`),
  KEY `IDUTSUPPRIM` (`ID_USE_DEL`),
  KEY `IDUSERUP` (`ID_USE_UPD`),
  KEY `idusCreate` (`ID_USE_CREATE`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_USE`, `NOM_USE`, `PRENOM_USE`, `MDP_USE`, `EMAIL_USE`, `ID_ROLE`, `LIB_AVATAR`, `DATENAISS_USE`, `ADR_USE`, `CP_USE`, `VILLE_USE`, `ID_USE_CREATE`, `ID_USE_UPD`, `DATE_VAL_COTIS`, `ID_USE_DEL`) VALUES
(1, 'CONGUAIN', 'Clérélie', 'Bestbinome@', 'clerelie.conguain@mail.fr', 5, NULL, '1989-12-09', '13 rue du Cimetière ', 13000, 'PierreTombale', NULL, NULL, NULL, NULL),
(2, 'DASTRUB', 'Amoondine', 'Deskamassvp12@', 'amoondine.dastrub@mail.fr', 4, NULL, '1966-06-06', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(3, 'GRANGER', 'Hermione', 'Leviosaaa100@', 'hermione.granger@mail.fr', 2, NULL, '1964-08-05', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(4, 'SPLINTER', 'Maîre', 'Ilovepizza18@', 'maitre.splinter@mail.fr', 3, NULL, '0940-03-04', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(5, 'LEBARBARE', 'Conan', 'Lebarbare50@', 'lebarbare.conan@mail.fr', 1, 'Arthur.jpg', '1988-09-08', '2 rue des massues', 50000, 'BARBARVILLE', 3, NULL, '2021-10-30', NULL),
(6, 'AUTIBET', 'Tintin', 'Millesabort2@', 'tintin.autibet@mail.fr', 1, 'Blaise.jpg', '1978-03-04', '35 rue des Aventures', 15000, 'Moulinsard', 3, NULL, '2021-10-21', NULL),
(7, 'CHU', 'Pika', 'Pikapika1@', 'pika.chu@mail.fr', 1, 'Bohort.jpg', '2001-01-01', '2 rue des embrouilles', 73215, 'KANTO', 3, NULL, '2022-02-11', NULL),
(8, 'KARDACHIANT', 'Kim', 'Tchouinmylife1@', 'kim.k@mail.fr', 1, 'Guenievre.jpg', '1655-04-01', '896 rue de l\'argent facile', 66333, 'ARRIERETRAINVILLE', 3, NULL, '2021-09-14', NULL),
(9, 'TOMB', 'Raider', 'Tombeaucool66@', 'raider.tomb@mail.fr', 1, 'Ghethenoc.jpg', '1999-06-02', '36 avenue de la super licence', 65874, 'MOMIEVILLE', 3, NULL, '2021-12-09', NULL),
(10, 'AUDITORE', 'Ezio', 'Toutestpermis2@', 'ezio.auditore@mail.fr', 1, 'Kadoc.jpg', '1452-04-18', '63 boulevard des ennuis ', 83000, 'Florence', 3, NULL, '2022-01-19', NULL),
(11, 'RISOLI', 'Philippe', 'Monbeaumicro45@', 'philippe.risoli@mail.fr', 1, 'Lancelot.jpg', '1954-02-15', '225 roue de la fortune', 58000, 'MICROVILLE', 3, NULL, '2021-09-12', NULL),
(12, 'COMPOTE', 'Kadoc', 'Cacacanard6@', 'kadoc.compote@mail.fr', 1, 'Leodagan.jpg', '1203-04-08', '26 rue de Kaamelott', 41000, 'KAAMELOTT', 3, NULL, '2022-03-17', NULL),
(13, 'UZUMAKI', 'Naruto', 'Datebayo77@', 'naruto.uzumaki@mail.fr', 1, 'Merlin.jpg', '2003-01-01', '65 rue des Ramen', 69000, 'KONOHA', 3, NULL, '2021-09-23', NULL),
(14, 'SMASH', 'Hulk', 'Destruction69@', 'hulk.smash@mail.fr', 1, 'Perceval.jpg', '1988-06-20', '10 allée du Massacre', 50100, 'Coupdboule', 3, NULL, '2022-06-06', NULL),
(15, 'SIN', 'Lee', 'Dashward500@', 'lee.sin@mail.fr', 1, 'Roparzh.jpg', '1920-10-08', '33 rue des kicks', 54900, 'Ratepastonq', 3, NULL, '2021-12-31', NULL),
(16, 'POPEYE', 'Damien', 'Epinards02@', 'damien.popeye@mail.fr', 1, 'Seli.jpg', '1979-02-14', '41 route des muscles', 14000, 'Matelot', 3, NULL, '2022-03-08', NULL),
(17, 'NEMAR', 'Jean', 'Feignant12@', 'jean.nemar@mail.fr', 1, 'Ygerne.jpg', '1970-09-18', '20 rue des dechets', 16900, 'Pasletemps', 3, NULL, '2021-06-01', NULL),
(18, 'PEACH', 'Princesse', 'Reinedeschampi8@', 'princesse.peach@mail.fr', 1, 'Lancelot.jpg', '1928-01-10', '10 royaume des toads', 53459, 'Marioland', 3, NULL, '2021-11-01', NULL),
(19, 'TEN', 'Ten', 'Shuriken300@', 'ten.ten@mail.fr', 1, 'Kadoc.jpg', '1991-10-12', '78 impasse des kunais', 69000, 'Konoha', 3, NULL, '2022-01-01', NULL),
(20, 'COEURDELION', 'Richard', 'Chevalier44@', 'coeurdelion.richard@mail.fr', 1, 'Arthur.jpg', '1170-12-01', '7 rue du chateau', 44036, 'Robinet', 3, NULL, '2022-02-01', NULL),
(21, 'SENSEI', 'Kakashi', 'Sharingan7@', 'sensei.kakashi@mail.fr', 1, 'Merlin.jpg', '1918-07-21', '16 allée du chidori', 69000, 'Konoha', 3, NULL, '2022-03-01', NULL),
(22, 'DUBOUCHON', 'Tomtom', 'Dubouchon05@', 'tomtom.dubouchon@mail.fr', 1, 'Perceval', '1990-07-01', '44 rue de la tambouille', 15001, 'Gourmetville', 3, NULL, '2021-01-01', NULL),
(23, 'MITHRANDIR', 'Gandalf', 'Magiebizarre55@', 'mithrandir.gandalf@mail.fr', 1, 'Arthur.jpg', '1000-10-10', '16 impasse de la pipe', 77777, 'Aiglons', 3, NULL, '2022-06-01', NULL),
(24, 'ZARRE', 'Bulbi', 'Attrapemoi99@', 'zarre.bulbi@mail.fr', 1, 'Karadoc.jpg', '2020-05-16', '1 rue de la fôret', 73215, 'Kanto', 3, NULL, '2022-02-05', NULL),
(29, 'Michel', 'Michel', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(30, 'test', 'test', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(31, 'test', 'test', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(32, 'test', 'test', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(33, 'test', 'test', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(34, 'test', 'test', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(35, 'test', 'test', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(36, 'test3', 'test3', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(37, 'test3', 'test3', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL),
(38, 'test3', 'test3', 'gfdsgs', 'hgfdhfd', 1, 'gfdsg', '1658-02-03', 'hgfdhgfd', 25424, 'gfdsgf', 2, NULL, '2021-09-05', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `IDUSERCREATE` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR`) REFERENCES `utilisateur` (`ID_USE`),
  ADD CONSTRAINT `IDUSERDELETE` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR_RETIRE`) REFERENCES `utilisateur` (`ID_USE`),
  ADD CONSTRAINT `IDUSERUPDATE` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR_MODIFIER`) REFERENCES `utilisateur` (`ID_USE`),
  ADD CONSTRAINT `idauteur` FOREIGN KEY (`IDENTIFIANT_AUTEUR`) REFERENCES `auteur` (`IDENTIFIANT_AUTEUR`),
  ADD CONSTRAINT `idserie` FOREIGN KEY (`IDENTIFIANT_SERIE`) REFERENCES `serie` (`IDENTIFIANT_SERIE`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`CODE_EXEMPLAIRE`) REFERENCES `exemplaire` (`CODE_EXEMPLAIRE`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR`) REFERENCES `utilisateur` (`ID_USE`);

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `CODEBDTK` FOREIGN KEY (`CODE BDTK`) REFERENCES `bdtk` (`CODE_BDTK`),
  ADD CONSTRAINT `NUMAL` FOREIGN KEY (`NUMERO_ALBUM`) REFERENCES `album` (`NUMERO_ALBUM`),
  ADD CONSTRAINT `codeetat` FOREIGN KEY (`CODE_ETAT`) REFERENCES `etat_exemplaire` (`CODE_ETAT`),
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR`) REFERENCES `utilisateur` (`ID_USE`),
  ADD CONSTRAINT `exemplaire_ibfk_2` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR__MODIFIE`) REFERENCES `utilisateur` (`ID_USE`);

--
-- Contraintes pour la table `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `EMPLA` FOREIGN KEY (`CODE_EMPLACEMENT`) REFERENCES `emplacement` (`CODE_EMPLACEMENT`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `ROLE` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`IDENTIFIANT_ROLE`),
  ADD CONSTRAINT `idusCreate` FOREIGN KEY (`ID_USE_CREATE`) REFERENCES `utilisateur` (`ID_USE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
