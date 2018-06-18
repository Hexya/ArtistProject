-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 06 juin 2018 à 10:20
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `artiste`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `city` varchar(255) COLLATE utf8_bin NOT NULL,
  `country` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `salt` varchar(30) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(255) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `firstname`, `name`, `address`, `city`, `country`, `email`, `lat`, `lon`, `password`, `salt`, `avatar`, `pseudo`, `active`, `updated_at`, `deleted_at`) VALUES
(5, 'Pikachu', 'SAN', '78 bourg pallette street', 'Paname cityGang', '', 'palette@gmail.com', 0, 0, '12345', '', '5af2c53ea2125pikachu.png', 'PikaPika', 1, '2018-05-09 11:54:06', '0000-00-00 00:00:00'),
(9, 'Vegita', 'SAN', 'namek corp', 'Paname cityGang', '', 'namekcorp@gmail.com', 0, 0, '0987654321', 'OfJJ6vQ@1oIz0CifGP2wP6', '5af2d24e327542318040dccec4c4806d64f3fd1be7bd4.jpg', 'Vegita', 1, '2018-05-09 12:49:50', '0000-00-00 00:00:00'),
(10, 'Gzeegz', 'GEZGZE', 'gezgez', 'Paname cityGang', '', 'egzze@gezgez.fr', 0, 0, '$2y$11$aFAlVkpJRVZsZWcyM2VxdeUoFY2c294EQtut7klt5/8dwvO.JW68u', 'hP%VJIEVleg23eqvYsq4SR', '', 'efz', 0, '2018-05-09 14:34:33', '0000-00-00 00:00:00'),
(11, 'Fezefz', 'EZFZE', '', 'Paname cityGang', '', 'fzfez', 0, 0, '$2y$11$oxeWyUtTK/Tpq1PuXu/2Ne14rPc51X.PQWo6gZLUcJsnHivlrZu9O', '', '', 'fez', 0, '2018-05-09 14:36:06', '0000-00-00 00:00:00'),
(14, 'Hexya', 'ASAHI', '55 Av Corp Namek', 'Namek', 'Japon', 'hexya@gmail.com', 0, 0, '', '', '', 'Hexya', 1, '2018-06-03 15:56:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `artwork`
--

CREATE TABLE `artwork` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `art_desc` text COLLATE utf8_bin NOT NULL,
  `art_media` varchar(255) COLLATE utf8_bin NOT NULL,
  `art_active` tinyint(1) NOT NULL,
  `art_artiste` int(11) NOT NULL,
  `art_category` int(11) NOT NULL,
  `art_updated_at` datetime NOT NULL,
  `art_deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `artwork`
--

INSERT INTO `artwork` (`art_id`, `art_title`, `art_desc`, `art_media`, `art_active`, `art_artiste`, `art_category`, `art_updated_at`, `art_deleted_at`) VALUES
(9, 'How To Become A Samouraï', 'This is an article about how you can improve your power becoming a Samoura&iuml; to become a better personne of..', '5b13f520176b4migoii-tattoo-5.jpg', 1, 14, 4, '2018-06-03 16:03:12', '0000-00-00 00:00:00'),
(10, 'Inked Life Style', 'A tattoo is a form of body modification where a design is made by inserting ink, dyes and pigments, either indelible..', '5b13f61260472Alex_Nike-4.jpg', 1, 14, 5, '2018-06-03 16:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `cat_pict` varchar(255) COLLATE utf8_bin NOT NULL,
  `cat_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_pict`, `cat_active`) VALUES
(4, 'Jap', '5b13eef02ac6bJapan.png', 1),
(5, 'Fr', '5b13ef08489c8France.png', 1),
(6, 'Kor', '5b13ef3215c5aKorea.png', 1),
(7, 'Us', '5b13ef439d4b8Us.png', 1),
(8, 'Bra', '5b13ef6d9b6c3Brazil.png', 1),
(10, 'Sp', '5b1599622d061Spain.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `con_id` int(11) NOT NULL,
  `con_usr_id` int(11) NOT NULL,
  `con_date_start` datetime NOT NULL,
  `con_date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `mess_id` int(11) NOT NULL,
  `mess_text` text NOT NULL,
  `mess_active` tinyint(4) NOT NULL DEFAULT '1',
  `mess_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `sess_id` int(11) NOT NULL,
  `sess_name` varchar(255) NOT NULL,
  `sess_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`sess_id`, `sess_name`, `sess_active`) VALUES
(1, 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `usr_salt` varchar(255) COLLATE utf8_bin NOT NULL,
  `usr_active` tinyint(1) NOT NULL,
  `usr_updated_at` datetime NOT NULL,
  `usr_deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `fk_category` (`art_category`),
  ADD KEY `fk_artiste` (`art_artiste`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`con_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mess_id`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sess_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `sess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `fk_artiste` FOREIGN KEY (`art_artiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`art_category`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
