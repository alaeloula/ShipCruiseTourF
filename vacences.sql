-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 30 jan. 2023 à 11:16
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vacences`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_ch` int NOT NULL,
  `prix` int NOT NULL,
  `id_t` int DEFAULT NULL,
  `id_navire` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_ch`, `prix`, `id_t`, `id_navire`) VALUES
(5, 20000, 1, 9),
(6, 45, 1, 8),
(8, 80, 2, 8),
(9, 150, 2, 9);

-- --------------------------------------------------------

--
-- Structure de la table `croisiere`
--

CREATE TABLE `croisiere` (
  `id_croisiere` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_navire` int NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `nbr_nuit` int DEFAULT NULL,
  `port_depart` int DEFAULT NULL,
  `date_depart` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `croisiere`
--

INSERT INTO `croisiere` (`id_croisiere`, `title`, `id_navire`, `image`, `nbr_nuit`, `port_depart`, `date_depart`) VALUES
(29, 'khbza bnina', 8, 'squolette.png', 5, 1, '2023-01-12'),
(30, 'summer', 9, 'Sans titre-1.png', 4, 36, '2023-01-21');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `croisierevs`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `croisierevs` (
`id_croisiere` int
,`title` varchar(255)
,`id_navire` int
,`image` varchar(50)
,`nbr_nuit` int
,`port_depart` int
,`date_depart` date
,`ship` varchar(20)
,`port_dep` varchar(25)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `cr_cl`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `cr_cl` (
`id_croisiere` int
,`title` varchar(255)
,`id_navire` int
,`image` varchar(50)
,`nbr_nuit` int
,`port_depart` int
,`date_depart` date
,`nom` varchar(20)
,`prix` int
,`portdep` varchar(25)
);

-- --------------------------------------------------------

--
-- Structure de la table `navire`
--

CREATE TABLE `navire` (
  `id_n` int NOT NULL,
  `nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `navire`
--

INSERT INTO `navire` (`id_n`, `nom`) VALUES
(8, 'tgv'),
(9, 'faiza');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `id_p` int NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `pays` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`id_p`, `nom`, `pays`) VALUES
(1, 'Madrid', 'Spain'),
(35, 'tangermed', 'morroco'),
(36, 'mexixo', 'mexico');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reserv` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `id_croisiere` int DEFAULT NULL,
  `date_reserv` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_chambre` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reserv`, `id_client`, `id_croisiere`, `date_reserv`, `id_chambre`) VALUES
(4, 14, 29, '2023-01-27 09:12:26', 6);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id_croisiere` int NOT NULL,
  `id_port` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id_croisiere`, `id_port`) VALUES
(30, 1),
(29, 35),
(30, 35),
(29, 36);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `trajetvs`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `trajetvs` (
`id_cr` int
,`id_port` int
,`nom` varchar(25)
,`pays` varchar(25)
);

-- --------------------------------------------------------

--
-- Structure de la table `type_chambre`
--

CREATE TABLE `type_chambre` (
  `id_t` int NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_chambre`
--

INSERT INTO `type_chambre` (`id_t`, `type`, `quantite`) VALUES
(1, 'solo', 1),
(2, 'duo', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_u` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `name`, `email`, `password`, `role`) VALUES
(14, 'alaa', 'alaa@gmail.com', '$2y$10$Dv3Ltj64aa3DAI1PlR0cxOSMtoSCJqyPN6H6TJXG7QWUjU2Lk39rq', 1),
(15, 'bogmla', 'bogmla@gmail.com', '$2y$10$Dv3Ltj64aa3DAI1PlR0cxOSMtoSCJqyPN6H6TJXG7QWUjU2Lk39rq', 0),
(16, 'haytam', 'ben@gmail.com', '$2y$10$3ZD2osYo2LR2zsCZDjeo9eUsDNEcEvAws6oA418WpIYusUYW5TUQu', 0);

-- --------------------------------------------------------

--
-- Structure de la vue `croisierevs`
--
DROP TABLE IF EXISTS `croisierevs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `croisierevs`  AS SELECT `c`.`id_croisiere` AS `id_croisiere`, `c`.`title` AS `title`, `c`.`id_navire` AS `id_navire`, `c`.`image` AS `image`, `c`.`nbr_nuit` AS `nbr_nuit`, `c`.`port_depart` AS `port_depart`, `c`.`date_depart` AS `date_depart`, `n`.`nom` AS `ship`, `p`.`nom` AS `port_dep` FROM ((`croisiere` `c` join `navire` `n` on((`n`.`id_n` = `c`.`id_navire`))) join `port` `p` on((`c`.`port_depart` = `p`.`id_p`)))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `cr_cl`
--
DROP TABLE IF EXISTS `cr_cl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cr_cl`  AS SELECT `c`.`id_croisiere` AS `id_croisiere`, `c`.`title` AS `title`, `c`.`id_navire` AS `id_navire`, `c`.`image` AS `image`, `c`.`nbr_nuit` AS `nbr_nuit`, `c`.`port_depart` AS `port_depart`, `c`.`date_depart` AS `date_depart`, `n`.`nom` AS `nom`, `ch`.`prix` AS `prix`, `p`.`nom` AS `portdep` FROM (((`croisiere` `c` join `navire` `n` on((`n`.`id_n` = `c`.`id_navire`))) join `chambre` `ch` on((`ch`.`id_navire` = `n`.`id_n`))) join `port` `p` on((`c`.`port_depart` = `p`.`id_p`))) WHERE (`ch`.`id_t` = 1)  ;

-- --------------------------------------------------------

--
-- Structure de la vue `trajetvs`
--
DROP TABLE IF EXISTS `trajetvs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trajetvs`  AS SELECT `c`.`id_croisiere` AS `id_cr`, `t`.`id_port` AS `id_port`, `p`.`nom` AS `nom`, `p`.`pays` AS `pays` FROM ((`croisiere` `c` join `trajet` `t` on((`c`.`id_croisiere` = `t`.`id_croisiere`))) join `port` `p` on((`t`.`id_port` = `p`.`id_p`)))  ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_ch`),
  ADD KEY `chambre_ibfk_1` (`id_t`),
  ADD KEY `fk_name` (`id_navire`);

--
-- Index pour la table `croisiere`
--
ALTER TABLE `croisiere`
  ADD PRIMARY KEY (`id_croisiere`),
  ADD KEY `port_depart` (`port_depart`),
  ADD KEY `croisiere_ibfk_2` (`id_navire`);

--
-- Index pour la table `navire`
--
ALTER TABLE `navire`
  ADD PRIMARY KEY (`id_n`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reserv`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id_croisiere`,`id_port`),
  ADD KEY `fk_port` (`id_port`);

--
-- Index pour la table `type_chambre`
--
ALTER TABLE `type_chambre`
  ADD PRIMARY KEY (`id_t`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_ch` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `croisiere`
--
ALTER TABLE `croisiere`
  MODIFY `id_croisiere` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `navire`
--
ALTER TABLE `navire`
  MODIFY `id_n` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `port`
--
ALTER TABLE `port`
  MODIFY `id_p` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reserv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_chambre`
--
ALTER TABLE `type_chambre`
  MODIFY `id_t` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`id_t`) REFERENCES `type_chambre` (`id_t`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`id_navire`) REFERENCES `navire` (`id_n`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
