-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 22 juin 2019 à 09:50
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_des_salles`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(70) NOT NULL,
  `passwrd` varchar(70) NOT NULL,
  `Filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `user`, `passwrd`, `Filename`) VALUES
(12, 'cse@esi.dz', '$2y$10$VDnGz5X5/TiUcC8Urd01NOZEN1HMD/yhuCGP7mBjNQYnNV4Vsehha', 'uploads/cse_hq.png'),
(13, 'shellmates@esi.dz', '$2y$10$HrNYRz8ZmMeZ5RFCNwvcD.gM5VXpcnYc8hDPZkimEcyQfclxk8qNe', 'uploads/50775281_228645928073769_7301195496960294912_n.png'),
(3, 'gdg@esi.dz', '$2y$10$Ugu7lcma.anipLel08Ucve5XWGTHaOdZL3rQ4H72drR1zde8irzxu', 'uploads/51441844_1130975863748239_8619733036444942336_n.png'),
(14, 'codeshare@esi.dz', '$2y$10$8SdnS.QgTGcmZJlD6WVSuukt8qOQfij98UeEf13RBgOudwW/.4Bmu', 'uploads/logo-1.png'),
(8, 'etic2@esi.dz', '$2y$10$/NcKUW7fyIpdPhmsV0wByOktVzX9kZyVyeWkI1d/c74zqDIDSGTaW', 'uploads/etic.png'),
(10, 'admin@esi.dz', '$2y$10$hv.dt4rHVOrZTp5TIv2JsOqc79S.D2S6GxOGM4.ACXX9EuY0sB.8m', 'uploads/lol.png'),
(15, 'cace@esi.dz', '$2y$10$gcvSTsYK.cFW6ajvWlOLo.yHosA00GjIRLPgDGBxDWcW5FuPi1cVi', 'uploads/black-01.png'),
(16, 'admin1@esi.dz', '$2y$10$y8ywNO4H61zVPkHYl4crMOzDEmI1MGp9Qm84jQsn5l8TcRoFeW0AS', 'uploads/60223427_135931324168514_6700455638129967104_n.jpg'),
(17, 'test', 'test', 'test'),
(18, 'test', 'test', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
