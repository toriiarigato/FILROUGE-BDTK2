-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 oct. 2021 à 14:13
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

INSERT INTO `album` (`NUMERO_ALBUM`, `TITRE_ALBUM`, `PRIX_ALBUM`, `IDENTIFIANT_AUTEUR`, `IDENTIFIANT_SERIE`, `IDENTIFIANT_UTILISATEUR`, `IDENTIFIANT_UTILISATEUR_MODIFIER`, `IDENTIFIANT_UTILISATEUR_RETIRE`, `LIB_POCH_ALB`) VALUES
(1, 'blabla', 14.5, 79, 53, 4, 4, NULL, 'fjdklfjld'),
(2, 'Machine qui rêve', 23.5, 14, 2, 4, NULL, NULL, 'machine_qui_reve.jpg'),
(61, 'Chez les castors', 9.8, 33, 30, 4, NULL, NULL, 'chez_les_castors.jpg'),
(182, 'L\'affaire le chat', 12.8, 66, 46, 4, NULL, NULL, 'l_affaire_le_chat.jpg'),
(183, 'Perceval et le dragon d\'airain', 12.9, 67, 47, 4, NULL, NULL, 'perceval_et_le_dragon_d_airain.jpg'),
(184, 'L\'armée du nécromant', 10.9, 67, 47, 4, NULL, NULL, 'l_armee_du_necromant.jpg'),
(258, 'blabla', 14.5, 79, 53, 4, NULL, NULL, 'fjdklfjld'),
(259, 'blabla', 14.5, 79, 53, 4, 4, 4, 'fjdklfjld'),
(260, 'blabla', 14.5, 79, 53, 4, 4, 4, 'fjdklfjld'),
(261, 'blabla', 14.5, 79, 53, 4, NULL, NULL, 'fjdklfjld'),
(262, 'blabla', 14.5, 79, 53, 4, NULL, NULL, 'fjdklfjld'),
(263, 'Des os pilants', 9.58, 79, 53, 4, NULL, NULL, 'des_os_pilants.jpg'),
(312, 'La saga des gaffes', 10.67, 23, 67, 4, NULL, NULL, 'la_saga_des_gaffes.jpg'),
(313, 'Gaffe à Lagaffe', 10.67, 23, 67, 4, NULL, NULL, 'gaffe_a_lagaffe.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `IDUSERCREATE` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR`) REFERENCES `utilisateur` (`IDENTIFIANT_UTILISATEUR`),
  ADD CONSTRAINT `IDUSERDELETE` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR_RETIRE`) REFERENCES `utilisateur` (`IDENTIFIANT_UTILISATEUR`),
  ADD CONSTRAINT `IDUSERUPDATE` FOREIGN KEY (`IDENTIFIANT_UTILISATEUR_MODIFIER`) REFERENCES `utilisateur` (`IDENTIFIANT_UTILISATEUR`),
  ADD CONSTRAINT `idauteur` FOREIGN KEY (`IDENTIFIANT_AUTEUR`) REFERENCES `auteur` (`IDENTIFIANT_AUTEUR`),
  ADD CONSTRAINT `idserie` FOREIGN KEY (`IDENTIFIANT_SERIE`) REFERENCES `serie` (`IDENTIFIANT_SERIE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
