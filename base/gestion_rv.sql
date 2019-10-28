-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 15 Octobre 2019 à 13:19
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_rv`
--

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `iddomaine` int(11) NOT NULL,
  `idserv` int(11) NOT NULL,
  `nomdomaine` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`iddomaine`, `idserv`, `nomdomaine`) VALUES
(1, 1, 'ORL/tete et coud'),
(2, 1, 'ORL/ Yeux'),
(3, 1, 'hjqbqhw'),
(4, 2, 'nb   hhjb'),
(5, 3, 'hmejkedj'),
(6, 1, 'ORL/tete et coud'),
(12, 3, 'r,en,m'),
(13, 1, 'gvefd'),
(14, 1, 'rrrrr'),
(15, 2, 'sss'),
(16, 1, 'eee'),
(17, 2, 'fff'),
(18, 1, 'eee'),
(19, 1, 'vv'),
(20, 1, 'nn'),
(21, 1, 'qq'),
(22, 2, '55');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idpatient` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `adresse` varchar(35) NOT NULL,
  `datenaiss` date NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `antmedico` varchar(100) NOT NULL,
  `dateajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`idpatient`, `nom`, `prenom`, `adresse`, `datenaiss`, `telephone`, `sexe`, `antmedico`, `dateajout`) VALUES
(1, 'ndiaye', 'moussa', 'nord foire', '1998-10-22', '709872832', 'Homme', 'anemie ', '2019-10-09 00:00:00'),
(2, 'jjsbndj', 'sxn n', 'bjkbsjb', '1992-09-28', '78662662', 'Femme', 'iqas', '2019-10-09 00:00:00'),
(3, 'sakho', 'amadou', 'adresse', '1999-02-10', '763920832', 'Femme', 'xbh bhb hdqb', '2019-10-11 16:52:26'),
(4, 'hauiuabjb', 'MANN', 'k,hiah hf ,hu', '1999-02-10', '776289271', 'Homme', 'A NHBAKQD,HHV ', '2019-10-11 17:04:19'),
(5, 'n.sdhuj', 'nhjdn', 'wsbdkbk', '1992-09-28', '773773732', 'Femme', 'njrnjhnwub', '2019-10-11 17:08:02'),
(6, 'kor', 'ousmane', 'keur mama', '1999-02-19', '789320199', 'Homme', 'ajmkabjb bnb', '2019-10-13 16:38:36'),
(7, 'diop', 'fatou', 'parcelles', '2003-10-20', '776211987', 'Homme', 'uihsdiyrjkzbhbh', '2019-10-13 16:47:32'),
(8, 'ui wehuiw', 'iusdmbj', 'uiui wbjb', '1999-04-19', '762118191', 'Homme', 'hsh , lohbsjk unmb kui', '2019-10-13 16:52:03'),
(9, 'uieuiwhk', 'uuwhukj', 'uuihej,bujk', '1992-09-28', '787773562', 'Homme', 'wifkwruk', '2019-10-13 16:55:16'),
(10, 'uujkbsdjkbujk', 'skubjb', 'jkbjksbjsbnjku', '1992-09-28', '779928202', 'Homme', 'jnsjkbjkb', '2019-10-13 16:58:11'),
(11, 'uiuidu', 'sub', 'iyyuwy', '1992-09-28', '778222209', 'Homme', 'wuihuuj', '2019-10-13 17:18:03'),
(12, 'jbjnakbk', 'lajkbj', 'jkbjkbjksdbjk', '1992-09-28', '776266252', 'Homme', 'nhsjknjsdnj', '2019-10-13 17:23:26'),
(13, 'UBSDJB', 'KBSDJHKB', 'JKBSJKBJ', '1992-09-28', '779928202', 'Homme', 'SDJHKBJHB', '2019-10-13 17:26:08'),
(14, 'JJSJ', 'UJBDULBJK', 'LBNJSBNJK', '1999-02-19', '776155611', 'Homme', 'IHNDHN', '2019-10-13 17:27:10'),
(15, 'YGFYF', 'YFYYF', 'YGUKF', '1999-02-19', '776543213', 'Homme', 'YJGYJFY', '2019-10-13 17:32:42'),
(16, 'JNJSUJ', 'NJSUH', ' JD JM,', '1992-09-28', '776624552', 'Homme', 'SJKUIVJ NM,', '2019-10-13 17:38:58'),
(17, 'BJKHD ', 'JBNJKXUOHDNM', 'JM,DUD', '1992-09-28', '772562872', 'Homme', 'JKUDU', '2019-10-13 17:40:00'),
(18, 'JDJBN', 'KLNDJB', 'JSDJJBJ', '1999-02-19', '776211109', 'Femme', 'NJJDNJ', '2019-10-13 17:42:24'),
(19, 'kl sdin', 'nldns', 'k insd ', '1999-04-19', '776638829', 'Femme', 'nklsnkl', '2019-10-13 17:51:40'),
(20, 'nklndkl', 'klniln', 'knklndskin', '1999-02-19', '770278202', 'Femme', 'nlsnilsdnl', '2019-10-13 17:53:09'),
(21, 'bjkjnjj', 'jrrhbkhb', 'sdnjnvsioh', '1992-09-28', '773892002', 'Homme', 'HOsdkjbjksbuk', '2019-10-13 21:28:13');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `idprofil` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`idprofil`, `libelle`) VALUES
(1, 'administrateur'),
(2, 'secretaire'),
(3, 'medecin');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `idrv` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `idmed` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `idsecretaire` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `rvreporte` int(11) NOT NULL,
  `datefin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `idserv` int(11) NOT NULL,
  `nomserv` varchar(255) NOT NULL,
  `specialite` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`idserv`, `nomserv`, `specialite`) VALUES
(1, 'odontologie', 'ORL'),
(2, 'dentaire', 'carie dentaire'),
(3, 'chirurgie', 'churirgie dentaire');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `datenaiss` date NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mdp` varchar(35) NOT NULL,
  `idprofil` int(11) NOT NULL,
  `iddomaine` int(11) DEFAULT NULL,
  `idserv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `nom`, `prenom`, `adresse`, `datenaiss`, `sexe`, `telephone`, `email`, `mdp`, `idprofil`, `iddomaine`, `idserv`) VALUES
(9, 'diouf', 'amy', 'golf', '1998-01-11', 'Femme', '773288604', 'amy@gmail.com', 'amy', 2, NULL, 1),
(10, 'diop', 'khalil', 'parcelles', '1994-12-09', 'Homme', '777911628', 'khalil@gmail.com', 'khalil', 3, 1, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`iddomaine`),
  ADD KEY `idserv` (`idserv`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idpatient`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idprofil`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`idrv`),
  ADD KEY `idsecretaire` (`idsecretaire`),
  ADD KEY `rendez_vous_medecins_FK` (`idmed`),
  ADD KEY `rendez_vous_patient0_FK` (`idpatient`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`idserv`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `le profil de l utilisateur` (`idprofil`),
  ADD KEY `iddomaine` (`iddomaine`),
  ADD KEY `idserv` (`idserv`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `iddomaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `idpatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `idprofil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `idrv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `idserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD CONSTRAINT `domaine_ibfk_1` FOREIGN KEY (`idserv`) REFERENCES `services` (`idserv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`idsecretaire`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendez_vous_medecins_FK` FOREIGN KEY (`idmed`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendez_vous_patient0_FK` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `le profil de l utilisateur` FOREIGN KEY (`idprofil`) REFERENCES `profil` (`idprofil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`iddomaine`) REFERENCES `domaine` (`iddomaine`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`idserv`) REFERENCES `services` (`idserv`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
