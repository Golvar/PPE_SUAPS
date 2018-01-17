-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 17 Janvier 2018 à 13:22
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `suaps`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `IDRESERV` int(11) NOT NULL,
  `IDUSER` int(11) NOT NULL,
  `USE_IDUSER` int(11) DEFAULT NULL,
  `DATEPREVU` varchar(255) DEFAULT NULL,
  `DATERESERV` varchar(255) DEFAULT NULL,
  `ANNULER` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`IDRESERV`, `IDUSER`, `USE_IDUSER`, `DATEPREVU`, `DATERESERV`, `ANNULER`) VALUES
(173, 10, NULL, '11/01/2018', '24/01/2018', 0),
(172, 10, NULL, '11/01/2018', '14/01/2018', 0),
(171, 10, NULL, '11/01/2018', '11/01/2018', 0),
(163, 9, NULL, '11/01/2018', '21/01/2018', 0),
(170, 11, NULL, '11/01/2018', '19/01/2018', 0),
(169, 11, NULL, '11/01/2018', '16/01/2018', 0),
(168, 11, NULL, '11/01/2018', '11/01/2018', 0),
(167, 12, NULL, '11/01/2018', '15/01/2018', 1),
(166, 12, NULL, '11/01/2018', '21/01/2018', 1),
(165, 4, NULL, '11/01/2018', '21/01/2018', 1),
(164, 9, NULL, '11/01/2018', '15/01/2018', 0),
(162, 9, NULL, '11/01/2018', '17/01/2018', 0),
(161, 9, NULL, '11/01/2018', '12/01/2018', 0),
(177, 4, 10, '15/01/2018', '17/01/2018', 1),
(159, 4, NULL, '11/01/2018', '13/01/2018', 0),
(158, 12, NULL, '11/01/2018', '13/01/2018', 0),
(157, 12, NULL, '11/01/2018', '11/01/2018', 0),
(178, 4, NULL, '15/01/2018', '15/01/2018', 1),
(179, 4, NULL, '15/01/2018', '15/01/2018', 1),
(180, 4, NULL, '15/01/2018', '15/01/2018', 1),
(181, 4, NULL, '15/01/2018', '15/01/2018', 1),
(182, 4, NULL, '15/01/2018', '15/01/2018', 1),
(183, 4, NULL, '15/01/2018', '15/01/2018', 1),
(184, 4, NULL, '15/01/2018', '15/01/2018', 1),
(185, 4, NULL, '15/01/2018', '15/01/2018', 1),
(186, 4, NULL, '15/01/2018', '15/01/2018', 1),
(187, 4, NULL, '15/01/2018', '15/01/2018', 1),
(188, 4, NULL, '15/01/2018', '15/01/2018', 1),
(189, 4, NULL, '15/01/2018', '15/01/2018', 1),
(190, 4, NULL, '15/01/2018', '15/01/2018', 1),
(191, 4, NULL, '15/01/2018', '15/01/2018', 1),
(192, 4, NULL, '15/01/2018', '15/01/2018', 1),
(193, 4, NULL, '15/01/2018', '15/01/2018', 1),
(194, 4, NULL, '15/01/2018', '15/01/2018', 1),
(195, 4, NULL, '15/01/2018', '15/01/2018', 1),
(196, 4, NULL, '15/01/2018', '15/01/2018', 1),
(197, 4, NULL, '15/01/2018', '15/01/2018', 1),
(198, 4, NULL, '15/01/2018', '15/01/2018', 1),
(199, 4, NULL, '15/01/2018', '15/01/2018', 1),
(200, 4, NULL, '15/01/2018', '15/01/2018', 1),
(201, 4, NULL, '15/01/2018', '15/01/2018', 1),
(202, 4, NULL, '15/01/2018', '15/01/2018', 1),
(203, 4, NULL, '15/01/2018', '15/01/2018', 1),
(204, 4, NULL, '15/01/2018', '15/01/2018', 1),
(205, 4, NULL, '15/01/2018', '15/01/2018', 1),
(206, 4, NULL, '15/01/2018', '15/01/2018', 1),
(322, 12, NULL, '15/01/2018', '17/01/2018', 1),
(218, 4, 10, '15/01/2018', '17/01/2018', 1),
(219, 4, NULL, '15/01/2018', '18/01/2018', 1),
(220, 4, NULL, '15/01/2018', '15/01/2018', 1),
(221, 4, NULL, '15/01/2018', '15/01/2018', 1),
(222, 4, NULL, '15/01/2018', '15/01/2018', 1),
(223, 4, NULL, '15/01/2018', '15/01/2018', 1),
(224, 4, NULL, '15/01/2018', '15/01/2018', 1),
(225, 4, NULL, '15/01/2018', '15/01/2018', 1),
(226, 4, NULL, '15/01/2018', '15/01/2018', 1),
(227, 4, NULL, '15/01/2018', '15/01/2018', 1),
(228, 4, NULL, '15/01/2018', '15/01/2018', 1),
(229, 4, NULL, '15/01/2018', '15/01/2018', 1),
(230, 4, NULL, '15/01/2018', '15/01/2018', 1),
(231, 4, NULL, '15/01/2018', '15/01/2018', 1),
(232, 4, NULL, '15/01/2018', '15/01/2018', 1),
(233, 4, NULL, '15/01/2018', '15/01/2018', 1),
(234, 4, NULL, '15/01/2018', '15/01/2018', 1),
(235, 4, NULL, '15/01/2018', '15/01/2018', 1),
(236, 4, NULL, '15/01/2018', '15/01/2018', 1),
(277, 12, NULL, '15/01/2018', '15/01/2018', 1),
(274, 12, NULL, '15/01/2018', '15/01/2018', 1),
(321, 12, NULL, '15/01/2018', '16/01/2018', 1),
(320, 12, NULL, '15/01/2018', '15/01/2018', 1),
(319, 12, NULL, '15/01/2018', '19/01/2018', 1),
(318, 12, NULL, '15/01/2018', '18/01/2018', 1),
(317, 12, NULL, '15/01/2018', '17/01/2018', 1),
(316, 12, NULL, '15/01/2018', '17/01/2018', 1),
(315, 12, NULL, '15/01/2018', '15/01/2018', 1),
(314, 12, NULL, '15/01/2018', '15/01/2018', 1),
(313, 12, NULL, '15/01/2018', '15/01/2018', 1),
(312, 12, NULL, '15/01/2018', '17/01/2018', 1),
(311, 12, NULL, '15/01/2018', '15/01/2018', 1),
(310, 12, NULL, '15/01/2018', '15/01/2018', 1),
(309, 12, NULL, '15/01/2018', '15/01/2018', 1),
(308, 12, NULL, '15/01/2018', '17/01/2018', 1),
(307, 12, NULL, '15/01/2018', '15/01/2018', 1),
(306, 12, NULL, '15/01/2018', '17/01/2018', 1),
(305, 12, NULL, '15/01/2018', '16/01/2018', 1),
(304, 12, NULL, '15/01/2018', '16/01/2018', 1),
(303, 12, NULL, '15/01/2018', '16/01/2018', 1),
(302, 12, NULL, '15/01/2018', '16/01/2018', 1),
(301, 12, NULL, '15/01/2018', '16/01/2018', 1),
(300, 12, NULL, '15/01/2018', '16/01/2018', 1),
(299, 12, NULL, '15/01/2018', '16/01/2018', 1),
(298, 12, NULL, '15/01/2018', '16/01/2018', 1),
(297, 12, NULL, '15/01/2018', '16/01/2018', 1),
(296, 12, NULL, '15/01/2018', '16/01/2018', 1),
(295, 12, NULL, '15/01/2018', '16/01/2018', 1),
(294, 12, NULL, '15/01/2018', '15/01/2018', 1),
(293, 12, NULL, '15/01/2018', '15/01/2018', 1),
(292, 12, NULL, '15/01/2018', '17/01/2018', 1),
(291, 12, NULL, '15/01/2018', '16/01/2018', 1),
(290, 12, NULL, '15/01/2018', '16/01/2018', 1),
(289, 12, NULL, '15/01/2018', '15/01/2018', 1),
(288, 12, NULL, '15/01/2018', '16/01/2018', 1),
(287, 12, NULL, '15/01/2018', '16/01/2018', 1),
(286, 12, NULL, '15/01/2018', '16/01/2018', 1),
(285, 12, NULL, '15/01/2018', '16/01/2018', 1),
(284, 12, NULL, '15/01/2018', '21/01/2018', 1),
(283, 12, NULL, '15/01/2018', '21/01/2018', 1),
(282, 12, NULL, '15/01/2018', '16/01/2018', 1),
(281, 12, NULL, '15/01/2018', '20/01/2018', 1),
(280, 12, NULL, '15/01/2018', '15/01/2018', 1),
(279, 12, NULL, '15/01/2018', '15/01/2018', 1),
(278, 12, NULL, '15/01/2018', '15/01/2018', 1),
(276, 12, NULL, '15/01/2018', '15/01/2018', 1),
(275, 12, NULL, '15/01/2018', '15/01/2018', 1),
(323, 12, NULL, '15/01/2018', '17/01/2018', 1),
(324, 12, NULL, '15/01/2018', '15/01/2018', 1),
(325, 12, NULL, '15/01/2018', '17/01/2018', 1),
(326, 12, NULL, '15/01/2018', '18/01/2018', 1),
(327, 4, NULL, '15/01/2018', '15/01/2018', 1),
(343, 4, NULL, '16/01/2018', '19/01/2018', 1),
(342, 12, NULL, '16/01/2018', '18/01/2018', 0),
(341, 12, NULL, '16/01/2018', '18/01/2018', 1),
(340, 12, NULL, '16/01/2018', '18/01/2018', 1),
(339, 12, NULL, '16/01/2018', '18/01/2018', 1),
(338, 4, 11, '16/01/2018', '20/01/2018', 1),
(337, 4, 11, '16/01/2018', '22/01/2018', 1),
(336, 4, 11, '16/01/2018', '20/01/2018', 1),
(335, 4, NULL, '16/01/2018', '19/01/2018', 1),
(334, 4, NULL, '16/01/2018', '19/01/2018', 1),
(333, 4, NULL, '15/01/2018', '18/01/2018', 1),
(332, 4, 10, '15/01/2018', '17/01/2018', 1),
(331, 4, 10, '15/01/2018', '17/01/2018', 1),
(330, 4, NULL, '15/01/2018', '15/01/2018', 1),
(329, 4, 11, '15/01/2018', '20/01/2018', 1),
(328, 4, NULL, '15/01/2018', '18/01/2018', 1),
(344, 4, NULL, '17/01/2018', '18/01/2018', 1),
(345, 4, 11, '17/01/2018', '20/01/2018', 1),
(346, 4, 11, '17/01/2018', '20/01/2018', 1),
(347, 4, NULL, '17/01/2018', '19/01/2018', 1),
(348, 4, 11, '17/01/2018', '22/01/2018', 0),
(349, 11, NULL, '17/01/2018', '17/01/2018', 1),
(350, 11, NULL, '17/01/2018', '17/01/2018', 1),
(351, 4, 10, '17/01/2018', '17/01/2018', 0),
(352, 11, NULL, '17/01/2018', '17/01/2018', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `IDUSER` int(11) NOT NULL,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `TYPE` varchar(255) DEFAULT NULL,
  `ADMIN` tinyint(1) DEFAULT NULL,
  `MAIL` varchar(255) DEFAULT NULL,
  `TELEPHONE` varchar(255) DEFAULT NULL,
  `TICKET_SEMAINE` int(11) DEFAULT '0',
  `TICKET_WE` int(11) DEFAULT '0',
  `PASSWORD` varchar(255) DEFAULT NULL,
  `NBRESERVATION` int(11) DEFAULT '0',
  `NBINVITATION` int(11) DEFAULT '0',
  `NBPARCOURS` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`IDUSER`, `NOM`, `PRENOM`, `USERNAME`, `TYPE`, `ADMIN`, `MAIL`, `TELEPHONE`, `TICKET_SEMAINE`, `TICKET_WE`, `PASSWORD`, `NBRESERVATION`, `NBINVITATION`, `NBPARCOURS`) VALUES
(1, 'admin', 'admin', 'admin', 'Administrateur', 1, 'admin@suaps.fr', '0628308168', 0, 0, '$2y$10$9jTN7GmhqmH0SBDOk94VO.bsKOSrzRxwU46E2jp7kNCEuF6ZO937C', 0, 0, 0),
(4, 'jullerot', 'léo', 'jullerot', 'Golfeur', 0, 'leojullerot@outlook.fr', '0628308168', 12, 28, '$2y$10$kmLjS7VrKKjzaSYJ92jjp.JsbcIOfXMZlmOTO2xcUwDpXZ8JC9xNO', 4, 11, 49),
(11, 'Erny', 'Pierre', 'erny', 'Golfeur', 0, 'pierre.erny@entea.fr', '', 11, 32, '$2y$10$9jTN7GmhqmH0SBDOk94VO.bsKOSrzRxwU46E2jp7kNCEuF6ZO937C', 1, 0, 2),
(12, 'Gross', 'Bernard', 'gross', 'Golfeur', 0, 'bernard.gross@entea.fr', '', 0, 0, '$2y$10$9jTN7GmhqmH0SBDOk94VO.bsKOSrzRxwU46E2jp7kNCEuF6ZO937C', -1, 8, 41),
(9, 'Cadet', 'Julie', 'cadet', 'Golfeur', 0, 'julie.cadet@entea.fr', '', 7, 9, '$2y$10$9jTN7GmhqmH0SBDOk94VO.bsKOSrzRxwU46E2jp7kNCEuF6ZO937C', 0, 0, 0),
(10, 'Galocha', 'Thomas', 'galocha', 'Golfeur', 0, 'galocha.thomas.BTS.SIO@gmail.com', '', 8, 9, '$2y$10$9jTN7GmhqmH0SBDOk94VO.bsKOSrzRxwU46E2jp7kNCEuF6ZO937C', 0, 0, 0),
(8, 'Wittmann', 'Océane', 'wittmann', 'Invité', 2, 'oceanewittmann@yahoo.fr', '0654125632', 0, 0, '$2y$10$9jTN7GmhqmH0SBDOk94VO.bsKOSrzRxwU46E2jp7kNCEuF6ZO937C', 0, 0, 0),
(13, 'jullerot', 'Claudine ', 'cjullerot', 'Invité', 2, 'cladinecroissant@gmail.com', '0685645213', 0, 0, '$2y$10$9jTN7GmhqmH0SBDOk94VO.bsKOSrzRxwU46E2jp7kNCEuF6ZO937C', 0, 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`IDRESERV`),
  ADD KEY `FK_INVITER` (`USE_IDUSER`),
  ADD KEY `FK_RESERVER` (`IDUSER`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDUSER`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `IDRESERV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `IDUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
