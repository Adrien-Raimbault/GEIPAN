-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 02 mars 2022 à 16:21
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `geipan`
--

-- --------------------------------------------------------

--
-- Structure de la table `observations`
--

CREATE TABLE `observations` (
  `id_observation` int(11) NOT NULL,
  `obsDateTime` datetime NOT NULL,
  `obsDuration` time DEFAULT NULL,
  `obsLocation` varchar(255) DEFAULT NULL,
  `obsCardinalPoint` varchar(255) DEFAULT NULL,
  `obsWeather` varchar(255) DEFAULT NULL,
  `obsDescription` text NOT NULL,
  `id_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `roleLabel` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `roleLabel`) VALUES
(1, 'ADMIN'),
(2, 'REGISTERED'),
(3, 'GUEST');

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

CREATE TABLE `states` (
  `id_state` int(11) NOT NULL,
  `stateNumber` varchar(3) NOT NULL,
  `stateLabel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `states`
--

INSERT INTO `states` (`id_state`, `stateNumber`, `stateLabel`) VALUES
(1, '01', 'Ain'),
(2, '02', 'Aisne'),
(3, '03', 'Allier'),
(4, '04', 'Alpes-de-Haute-Provence'),
(5, '05', 'Hautes-Alpes'),
(6, '06', 'Alpes-Maritimes'),
(7, '07', 'Ard�che'),
(8, '08', 'Ardennes'),
(9, '09', 'Ari�ge'),
(10, '10', 'Aube'),
(11, '11', 'Aude'),
(12, '12', 'Aveyron'),
(13, '13', 'Bouches-du-Rh�ne'),
(14, '14', 'Calvados'),
(15, '15', 'Cantal'),
(16, '16', 'Charente'),
(17, '17', 'Charente-Maritime'),
(18, '18', 'Cher'),
(19, '19', 'Corr�ze'),
(20, '21', 'C�te-d\'Or'),
(21, '22', 'C�tes-d\'Armor'),
(22, '23', 'Creuse'),
(23, '24', 'Dordogne'),
(24, '25', 'Doubs'),
(25, '26', 'Dr�me'),
(26, '27', 'Eure'),
(27, '28', 'Eure-et-Loir'),
(28, '29', 'Finist�re'),
(29, '2A', 'Corse-du-Sud'),
(30, '2B', 'Haute-Corse'),
(31, '30', 'Gard'),
(32, '31', 'Haute-Garonne'),
(33, '32', 'Gers'),
(34, '33', 'Gironde'),
(35, '34', 'H�rault'),
(36, '35', 'Ille-et-Vilaine'),
(37, '36', 'Indre'),
(38, '37', 'Indre-et-Loire'),
(39, '38', 'Is�re'),
(40, '39', 'Jura'),
(41, '40', 'Landes'),
(42, '41', 'Loir-et-Cher'),
(43, '42', 'Loire'),
(44, '43', 'Haute-Loire'),
(45, '44', 'Loire-Atlantique'),
(46, '45', 'Loiret'),
(47, '46', 'Lot'),
(48, '47', 'Lot-et-Garonne'),
(49, '48', 'Loz�re'),
(50, '49', 'Maine-et-Loire'),
(51, '50', 'Manche'),
(52, '51', 'Marne'),
(53, '52', 'Haute-Marne'),
(54, '53', 'Mayenne'),
(55, '54', 'Meurthe-et-Moselle'),
(56, '55', 'Meuse'),
(57, '56', 'Morbihan'),
(58, '57', 'Moselle'),
(59, '58', 'Ni�vre'),
(60, '59', 'Nord'),
(61, '60', 'Oise'),
(62, '61', 'Orne'),
(63, '62', 'Pas-de-Calais'),
(64, '63', 'Puy-de-D�me'),
(65, '64', 'Pyr�n�es-Atlantiques'),
(66, '65', 'Hautes-Pyr�n�es'),
(67, '66', 'Pyr�n�es-Orientales'),
(68, '67', 'Bas-Rhin'),
(69, '68', 'Haut-Rhin'),
(70, '69', 'Rh�ne'),
(71, '70', 'Haute-Sa�ne'),
(72, '71', 'Sa�ne-et-Loire'),
(73, '72', 'Sarthe'),
(74, '73', 'Savoie'),
(75, '74', 'Haute-Savoie'),
(76, '75', 'Paris'),
(77, '76', 'Seine-Maritime'),
(78, '77', 'Seine-et-Marne'),
(79, '78', 'Yvelines'),
(80, '79', 'Deux-S�vres'),
(81, '80', 'Somme'),
(82, '81', 'Tarn'),
(83, '82', 'Tarn-et-Garonne'),
(84, '83', 'Var'),
(85, '84', 'Vaucluse'),
(86, '85', 'Vend�e'),
(87, '86', 'Vienne'),
(88, '87', 'Haute-Vienne'),
(89, '88', 'Vosges'),
(90, '89', 'Yonne'),
(91, '90', 'Territoire de Belfort'),
(92, '91', 'Essonne'),
(93, '92', 'Hauts-de-Seine'),
(94, '93', 'Seine-Saint-Denis'),
(95, '94', 'Val-de-Marne'),
(96, '95', 'Val-d\'Oise'),
(97, '971', 'Guadeloupe'),
(98, '972', 'Martinique'),
(99, '973', 'Guyane'),
(100, '974', 'La R�union'),
(101, '976', 'Mayotte');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `userFirstname` varchar(255) DEFAULT NULL,
  `userMail` varchar(255) NOT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `userAvatar` varchar(255) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `userName`, `userFirstname`, `userMail`, `userPassword`, `userAvatar`, `id_role`) VALUES
(8, 'TEST', 'Test', 'test@test.fr', '$2y$10$fF4FJQWHOMlvtY.QavfINOoIZByiv5UdhcaNGg3SnR5WUM6JEumge', '/Applications/MAMP/htdocs/GEIPAN/avatars/avatar_default.png', 1),
(9, 'GUEST', 'Invite', 'invite@test.fr', '$2y$10$6D.rxhFjcnbAYowqw98/..YaIo2fZnP6Cq.yNvZvQLsZ9HC/TQKuq', '/Applications/MAMP/htdocs/GEIPAN/avatars/avatar_default.png', 3),
(10, 'REGISTERED', 'Regis', 'regis@test.fr', '$2y$10$8OGzbxbLjqr6edV8Zbag6.TXjPPpNuITYRkXniIGygGe6kEDIKY32', '/Applications/MAMP/htdocs/GEIPAN/avatars/avatar_default.png', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users_has_observations`
--

CREATE TABLE `users_has_observations` (
  `id_user` int(11) NOT NULL,
  `id_observation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `observations`
--
ALTER TABLE `observations`
  ADD PRIMARY KEY (`id_observation`),
  ADD KEY `fk_observations_states_idx` (`id_state`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id_state`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_users_roles1_idx` (`id_role`);

--
-- Index pour la table `users_has_observations`
--
ALTER TABLE `users_has_observations`
  ADD PRIMARY KEY (`id_user`,`id_observation`),
  ADD KEY `fk_users_has_observations_observations1_idx` (`id_observation`),
  ADD KEY `fk_users_has_observations_users1_idx` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `observations`
--
ALTER TABLE `observations`
  MODIFY `id_observation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `states`
--
ALTER TABLE `states`
  MODIFY `id_state` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `observations`
--
ALTER TABLE `observations`
  ADD CONSTRAINT `fk_observations_states` FOREIGN KEY (`id_state`) REFERENCES `states` (`id_state`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_has_observations`
--
ALTER TABLE `users_has_observations`
  ADD CONSTRAINT `fk_users_has_observations_observations1` FOREIGN KEY (`id_observation`) REFERENCES `observations` (`id_observation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_observations_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
