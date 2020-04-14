-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 14 Avril 2020 à 19:59
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cine`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_genre` int(11) NOT NULL,
  `release_date` int(11) NOT NULL,
  `director` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `actors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`id`, `title`, `id_genre`, `release_date`, `director`, `resum`, `duration`, `actors`) VALUES
(1, 'La Mouche', 1, 1987, 'David Cronenberg', 'Un jeune scientifique trop bien coiffé décide de créer une machine de téléportation dans son salon et de tester lui-même son équipement. Très beau et très nu, il s\'installe dans la cabine, suivi par une mouche. Son expérience est un succès mais...', 96, 'Jeff Goldblum, Geena Davis,...'),
(2, 'Rushmore', 2, 1998, 'Wes Anderson', 'Max Fischer est élève dans une école privée, Rushmore. Son père est un modeste coiffeur et c\'est grâce à une bourse que Max a pu intégrer l\'établissement. Peu doué pour les études, il est en revanche passionné par les activités annexes. Sa personnalité...', 93, 'Bill Murray, Jason Schwartzman, ...'),
(4, 'Napoleon Dynamite', 2, 2004, 'Jared Hess', 'Napoleon Dynamite est un lycéen nerd qui vit dans la ville de Preston, dans l\'Idaho aux États-Unis. Il vit chez sa grand-mère avec Kip, son grand frère de trente-deux ans qui passe son temps à chatter sur Internet.  Vient Oncle Rico...', 86, 'Jon Heder, Jon Gries'),
(5, 'Casablanca', 3, 1942, 'Michael Curtiz', 'Rick Blaine est un Américain amer et cynique, expatrié à Casablanca au Maroc où il est propriétaire du Rick\'s Café Américain. Ce night-club huppé attire une clientèle très variée...', 102, 'Humphrey Bogart, Ingrid Bergman,...'),
(6, 'Platoon', 4, 1986, 'Oliver Stone', 'L\'action se déroule pendant la guerre du Viêt Nam. Il est en partie inspiré par la propre vie du réalisateur, qui s\'est lui-même engagé comme volontaire pour la guerre du Viêt Nam où il a été blessé à deux reprises', 115, 'Charlie Sheen, Tom Béranger, Willem Dafoe, ...'),
(7, 'Demain', 5, 2015, 'Cyril Dion, Mélanie Laurent', 'Si montrer des solutions, raconter une histoire qui fait du bien, était la meilleure façon de résoudre les crises écologiques, économiques et sociales, que traversent nos pays ? ', 120, 'Mélanie Laurent, ...');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `name` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`id`, `id_genre`, `name`) VALUES
(1, 1, 'Science-fiction'),
(2, 2, 'Comedy'),
(3, 3, 'Drama'),
(4, 4, 'War'),
(5, 5, 'Documentary'),
(6, 6, 'Autobiography');

-- --------------------------------------------------------

--
-- Structure de la table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `name` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `name`, `firstname`, `username`, `email`, `password`, `creation_date`, `admin`) VALUES
(1, 'nuts', 'bené', 'Benénuts', 'benenuts@gmail.fr', 'coconuts', '2020-04-08 18:00:20', 0),
(2, 'Willy', 'Wonka', 'wonkaaimelechocolat', 'willy@chocolat.fr', 'crunch', '2020-04-08 18:00:20', 0),
(4, 'King', 'bobby', 'King bobby', 'king@gmail.fr', 'prout', '2020-04-08 18:00:20', 0),
(5, 'Gudule', '  martine', '  lililatigresse', 'martine@gudule.fr', 'cacahuète', '2020-04-08 18:00:20', 0),
(6, 'Monsieur', 'Roger', 'Rocky', 'roger@roger.com', 'troubadour', '2020-04-08 18:00:20', 1),
(8, 'Phil', 'Phil', 'Phiiil', 'phil@phil.fr', 'billmurray', '2020-04-09 18:00:20', 0),
(9, 'Lapointe', 'bobby', 'Grosfan', 'robert@robert.fr', 'passioncinéma', '2020-04-09 18:11:12', 0),
(12, 'Soubiroux', ' Bernadette', ' Bernie', 'bernie@soubirou.fr', 'jaimejesus', '2020-04-09 22:18:53', 0),
(15, 'Dupont-aignan', 'Truc', ' Dupontgnangnan', 'dupont@gnangnan.com', '$2y$10$PmuTdqzGRyxG8RRIFX4zIOTfat6ESzeD7fL0Ci1Eaa3V05YE60lwG', '2020-04-10 11:09:49', 0),
(16, 'Louis', 'Philippe', 'C\'estmoileroi', 'louis@philippe.fr', '$2y$10$EkTEksGQhPcWKKNGnSR.1e4geVCFQITALUk1HckegCssvOGNa2Y5y', '2020-04-10 17:56:35', 1),
(18, 'Dou', 'Scoubi', 'Scoubidou', 'scoubi@dou.com', '$2y$10$cozArtgFMOqhFE0geNXPSOTamiKnZoVbF/kols0FIwZEV0F/5mG2K', '2020-04-12 15:27:58', 0);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200407130450', '2020-04-07 13:05:43'),
('20200407130851', '2020-04-07 13:08:58');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
