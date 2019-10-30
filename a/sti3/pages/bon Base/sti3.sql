-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 27 avr. 2019 à 14:16
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sti3`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `idcl` int(11) NOT NULL,
  `codecl` varchar(35) NOT NULL,
  `libellecl` varchar(100) NOT NULL,
  `idniv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idcl`, `codecl`, `libellecl`, `idniv`) VALUES
(1, 'STI3', 'Science et Technique de l\'informatique 3', 1),
(2, 'STI2', 'Science et Technique de l\'informatique 2', 3),
(5, 'Genie C3', 'Genie Civile 3', 1),
(7, 'BTP1', 'Batimen et Traveau Public 1', 2),
(8, 'BTS2', 'Batimen Traveau Souperieur 2', 4),
(9, 'Fin Compta', 'Finance Comptabilite', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idcours` int(15) NOT NULL,
  `libellec` varchar(100) NOT NULL,
  `volumeHor` int(10) NOT NULL,
  `idcl` int(10) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `evaluer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idcours`, `libellec`, `volumeHor`, `idcl`, `iduser`, `active`, `evaluer`) VALUES
(1, 'PHP AVANCE', 30, 1, 36, 1, 0),
(2, 'HTML/CSS', 20, 8, 35, 1, 0),
(3, 'JAVA3', 40, 1, 18, 1, 0),
(4, 'JAVA2', 20, 2, 31, 1, 0),
(5, 'MERISE', 40, 8, 31, 1, 0),
(6, 'UML3', 25, 1, 35, 1, 1),
(9, 'electricite', 25, 7, 31, 1, 0),
(11, 'Math-Fin', 25, 9, NULL, 0, 0),
(12, 'PYTHON', 35, 1, 31, 0, 0),
(13, 'Reseaux', 25, 1, 35, 0, 0),
(14, 'S.E', 20, 2, 36, 0, 0),
(15, 'Teleinformatique', 30, 2, NULL, 0, 0),
(16, 'Droit-2', 25, 2, 31, 1, 0),
(17, 'Droit-3', 30, 1, 31, 1, 0),
(18, 'anglais', 20, 1, 36, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_classe`
--

CREATE TABLE `ligne_classe` (
  `idclasse` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `datelignecl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_classe`
--

INSERT INTO `ligne_classe` (`idclasse`, `iduser`, `datelignecl`) VALUES
(7, 23, '2019-04-02'),
(5, 26, '2019-04-11'),
(2, 27, '2019-04-10'),
(2, 24, '2019-04-10'),
(1, 25, '2019-04-14'),
(1, 5, '2019-04-14'),
(1, 30, '2019-04-17'),
(2, 37, '2019-04-17'),
(1, 38, '2019-04-27'),
(1, 39, '2019-04-27'),
(1, 40, '2019-04-27');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_prof_cours`
--

CREATE TABLE `ligne_prof_cours` (
  `idprof` int(11) NOT NULL,
  `idcours` int(11) NOT NULL,
  `dateLignPrCrs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_prof_cours`
--

INSERT INTO `ligne_prof_cours` (`idprof`, `idcours`, `dateLignPrCrs`) VALUES
(18, 3, '2019-04-10'),
(31, 1, '2019-04-11'),
(36, 14, '2019-04-27'),
(35, 13, '2019-04-17'),
(31, 16, '2019-04-27'),
(31, 17, '2019-04-27'),
(36, 18, '2019-04-27'),
(31, 12, '2019-04-27');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_score_cours_etu`
--

CREATE TABLE `ligne_score_cours_etu` (
  `idetu` int(11) NOT NULL,
  `idcours` int(11) NOT NULL,
  `idquest` int(11) NOT NULL,
  `dateLigne` datetime NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_score_cours_etu`
--

INSERT INTO `ligne_score_cours_etu` (`idetu`, `idcours`, `idquest`, `dateLigne`, `score`) VALUES
(37, 3, 1, '2019-04-26 05:16:27', 13),
(30, 3, 2, '2019-04-26 05:17:46', 30),
(37, 16, 3, '2019-04-26 17:47:51', 13),
(37, 16, 4, '2019-04-26 17:48:12', 13),
(37, 16, 5, '2019-04-26 17:49:35', 13),
(5, 17, 6, '2019-04-27 03:39:55', 29),
(24, 16, 7, '2019-04-27 03:42:09', 29),
(5, 17, 8, '2019-04-27 12:21:14', 16),
(5, 17, 9, '2019-04-27 13:23:04', 18),
(39, 3, 10, '2019-04-27 13:35:35', 14);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `idniveau` int(11) NOT NULL,
  `codeniv` varchar(50) NOT NULL,
  `libelleniv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`idniveau`, `codeniv`, `libelleniv`) VALUES
(1, 'L3', 'licence 3'),
(2, 'L1', 'licence 1'),
(3, 'L2', 'licence 2'),
(4, 'MST1', 'MASTER 1'),
(5, 'MST2', 'MASTER 2'),
(11, 'MST1', 'MASTER 1'),
(12, 'MST1', 'MASTER 1'),
(13, 'MST1', 'MASTER 1'),
(14, 'MST1', 'MASTER 1'),
(15, 'MST2', 'MASTER 2');

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `idquest` int(11) NOT NULL,
  `titreq` varchar(255) NOT NULL,
  `detailq` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`idquest`, `titreq`, `detailq`, `date`) VALUES
(1, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-26 05:16:27'),
(2, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-26 05:17:46'),
(3, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-26 17:47:51'),
(4, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-26 17:48:12'),
(5, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-26 17:49:35'),
(6, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-27 03:39:55'),
(7, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-27 03:42:09'),
(8, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-27 12:21:14'),
(9, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-27 13:23:04'),
(10, 'ORGANISATION MATERIEL DU COURS', 'Comment appreciez-vous la programmation de ce cours ?', '2019-04-27 13:35:35');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `login` varchar(35) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `profil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `nom`, `prenom`, `date`, `login`, `pwd`, `profil`) VALUES
(5, 'diop', 'baye dame', '2019-04-04', 'baye1823@gmail.com', '57f5de5a02b571f2b4a3d2403d9999d4ae0fa1ef', 'etu'),
(18, 'sarr', 'fatou', '2019-04-12', 'fatou@gmail.com', '3d5087b2f450566cee02f836559fc886b0022280', 'prof'),
(22, 'diop', 'assane', '2019-04-12', 'assane@gmail.com', '10e0e1471eef5297430377ac1ab2353557ed3ca5', 'admin'),
(23, 'DIOP', 'ALASSANE', '2019-04-12', 'alassane@gmail.com', '10e0e1471eef5297430377ac1ab2353557ed3ca5', 'etu'),
(24, 'BALY', 'BOUSSO', '2019-04-14', 'bon@gmail.com', '3b4f14403e709da5b91e1679d6e9ad1b00b9d903', 'etu'),
(25, 'diop', 'ramatoulaye', '2019-04-15', 'ramatoulaye@gmail.com', 'dd11a0d1b3145b5aa44f114db9712e321e360f8e', 'etu'),
(26, 'SARR', 'AWA', '2019-04-17', 'awa@gmail.com', '31f887109a40300a811b4c53b824bd37028b7744', 'etu'),
(27, 'SARR', 'AWA', '2019-04-17', 'awa@gmail.com', '31f887109a40300a811b4c53b824bd37028b7744', 'etu'),
(29, 'diop', 'khalil', '2019-04-17', 'khalilorange@gmail.com', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'etu'),
(30, 'diop', 'khalil', '2019-04-17', 'khalilorange@gmail.com', '8c6617dbddaf5ee6d4dd0a91108429ecf6018408', 'etu'),
(31, 'KOR', 'OUSMANE', '2019-04-09', 'ousmane@gmail.com', '2406180b66f10fff2942faed64af4c4443e63cf8', 'prof'),
(35, 'SARR', 'ADAMA', '2019-04-17', 'adama@gmail.com', 'a2be9b448cc1a650c6fac671486061ad3ca4ca49', 'prof'),
(36, 'SARR', 'MOUSSA', '2019-04-17', 'moussa@gmail.com', '137591da2ecd87f03256981c7b539487e5f2b4ef', 'prof'),
(37, 'ngom', 'mame', '2019-04-17', 'mame@gmail.com', '1d8518b5ffe107be80a067d9f3b686125d51e251', 'etu'),
(38, 'MBACKE', 'SAMBA', '2019-04-27', 'samba@gmail.com', 'b36ad305938559dea2a95eef18d3f247c200501f', 'etu'),
(39, 'fall', 'alima', '2019-04-27', 'alima@gmail.com', '4c8141e2e31f04643c9a50134247486129efe880', 'etu'),
(40, 'diallo', 'assane', '2019-04-27', 'assane@gmail.com', '10e0e1471eef5297430377ac1ab2353557ed3ca5', 'etu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`idcl`),
  ADD KEY `idniv` (`idniv`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idcours`),
  ADD KEY `idcl` (`idcl`),
  ADD KEY `iduser` (`iduser`);

--
-- Index pour la table `ligne_classe`
--
ALTER TABLE `ligne_classe`
  ADD KEY `idclasse` (`idclasse`),
  ADD KEY `iduser` (`iduser`);

--
-- Index pour la table `ligne_prof_cours`
--
ALTER TABLE `ligne_prof_cours`
  ADD KEY `idprof` (`idprof`),
  ADD KEY `idcours` (`idcours`);

--
-- Index pour la table `ligne_score_cours_etu`
--
ALTER TABLE `ligne_score_cours_etu`
  ADD KEY `idetu` (`idetu`),
  ADD KEY `idcours` (`idcours`),
  ADD KEY `idquest` (`idquest`) USING BTREE;

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`idniveau`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`idquest`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `idcl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idcours` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `idniveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `idquest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`idniv`) REFERENCES `niveau` (`idniveau`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`idcl`) REFERENCES `classe` (`idcl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ligne_classe`
--
ALTER TABLE `ligne_classe`
  ADD CONSTRAINT `ligne_classe_ibfk_1` FOREIGN KEY (`idclasse`) REFERENCES `classe` (`idcl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_classe_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ligne_prof_cours`
--
ALTER TABLE `ligne_prof_cours`
  ADD CONSTRAINT `ligne_prof_cours_ibfk_1` FOREIGN KEY (`idcours`) REFERENCES `cours` (`idcours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_prof_cours_ibfk_2` FOREIGN KEY (`idprof`) REFERENCES `utilisateur` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ligne_score_cours_etu`
--
ALTER TABLE `ligne_score_cours_etu`
  ADD CONSTRAINT `ligne_score_cours_etu_ibfk_1` FOREIGN KEY (`idcours`) REFERENCES `cours` (`idcours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_score_cours_etu_ibfk_2` FOREIGN KEY (`idetu`) REFERENCES `utilisateur` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_score_cours_etu_ibfk_3` FOREIGN KEY (`idquest`) REFERENCES `questionnaire` (`idquest`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
