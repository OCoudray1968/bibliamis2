-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 03 mai 2021 à 07:16
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliamis_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `genders_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4A1B2A92A76ED395` (`user_id`),
  KEY `IDX_4A1B2A92477C57FD` (`genders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `author`, `comments`, `image_name`, `created_at`, `updated_at`, `genders_id`) VALUES
(1, 1, 'Test', 'Olivier Coudray', 'Test avec le Genre', NULL, '2021-04-21 08:00:45', '2021-04-21 08:00:45', 1),
(2, 1, 'Le souffle des Dieux', 'Bernard Werber', NULL, 'le-souffle-des-dieux-608117916468c267621700.jpg', '2021-04-22 08:28:33', '2021-04-22 08:28:33', 2),
(3, 3, 'test 3', 'moi meme', 'ceci est un exemple', 'la-guerre-des-etoiles-60867accb438c442311536.jpg', '2021-04-26 10:33:16', '2021-04-26 10:33:16', 2);

-- --------------------------------------------------------

--
-- Structure de la table `discs`
--

DROP TABLE IF EXISTS `discs`;
CREATE TABLE IF NOT EXISTS `discs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `genders_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3DD550F2A76ED395` (`user_id`),
  KEY `IDX_3DD550F2477C57FD` (`genders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `discs`
--

INSERT INTO `discs` (`id`, `user_id`, `title`, `artist`, `support`, `comments`, `image_name`, `created_at`, `updated_at`, `genders_id`) VALUES
(1, 1, 'Back in Black', 'AC/DC', 'CD', 'Un des meilleurs albums de AC/DC', 'backinblack-607fd2abd312d511850739.jpg', '2021-04-21 09:22:19', '2021-04-21 09:27:18', 8);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210226084613', '2021-03-12 08:45:40', 385),
('DoctrineMigrations\\Version20210301071517', '2021-03-12 08:45:41', 194),
('DoctrineMigrations\\Version20210303150501', '2021-03-12 08:45:41', 802),
('DoctrineMigrations\\Version20210308072118', '2021-03-12 08:45:42', 1561),
('DoctrineMigrations\\Version20210310075233', '2021-03-12 08:45:44', 322),
('DoctrineMigrations\\Version20210310153016', '2021-03-12 08:45:44', 206),
('DoctrineMigrations\\Version20210312074108', '2021-03-12 08:45:44', 5863),
('DoctrineMigrations\\Version20210315142201', '2021-03-15 15:23:07', 175),
('DoctrineMigrations\\Version20210317070210', '2021-03-17 08:03:43', 2721),
('DoctrineMigrations\\Version20210416062843', '2021-04-16 06:29:11', 15293),
('DoctrineMigrations\\Version20210419065420', '2021-04-19 08:54:55', 43890),
('DoctrineMigrations\\Version20210419081250', '2021-04-19 10:13:03', 2802),
('DoctrineMigrations\\Version20210419094947', '2021-04-19 11:49:54', 2641),
('DoctrineMigrations\\Version20210419135856', '2021-04-19 15:59:06', 7233),
('DoctrineMigrations\\Version20210421055738', '2021-04-21 05:57:58', 2148),
('DoctrineMigrations\\Version20210421070130', '2021-04-21 07:01:43', 1941),
('DoctrineMigrations\\Version20210421081210', '2021-04-21 08:12:19', 3811),
('DoctrineMigrations\\Version20210422133402', '2021-04-22 13:34:19', 11675),
('DoctrineMigrations\\Version20210422135220', '2021-04-22 13:52:34', 1135),
('DoctrineMigrations\\Version20210429075838', '2021-04-29 08:00:20', 8584);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `genders_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FF232B31A76ED395` (`user_id`),
  KEY `IDX_FF232B31477C57FD` (`genders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `user_id`, `title`, `support`, `comments`, `image_name`, `created_at`, `updated_at`, `genders_id`) VALUES
(1, 1, 'Fifa 2021', 'DVD', 'the best ever', 'fifa2021-607ff0417c9d5648191980.jpg', '2021-04-21 11:28:33', '2021-04-21 11:28:33', 9),
(2, 1, 'Call Of Duty', 'Blue Ray', 'One of the best WarGame', 'callofduty-60802ccae27c6261145604.jpg', '2021-04-21 15:46:50', '2021-04-21 15:46:50', 10),
(3, 1, 'Formula1 2019', 'CD', 'Simulation de formule 1', NULL, '2021-04-21 15:47:54', '2021-04-21 15:47:54', 9),
(4, 1, 'Moto GP 2019', 'CD', 'Simulation de Motos Grand Prix', NULL, '2021-04-21 15:48:34', '2021-04-21 15:48:34', 9),
(5, 1, 'test', 'CD', NULL, NULL, '2021-04-21 15:51:42', '2021-04-21 15:51:42', 10),
(6, 1, 'test2', 'CD', NULL, NULL, '2021-04-21 15:52:07', '2021-04-21 15:52:07', 1),
(7, 1, 'Test3', 'CD', NULL, NULL, '2021-04-21 15:52:30', '2021-04-21 15:52:30', 9);

-- --------------------------------------------------------

--
-- Structure de la table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gender`
--

INSERT INTO `gender` (`id`, `genre`) VALUES
(1, 'Thriller'),
(2, 'Science-fiction'),
(3, 'Romantique'),
(4, 'Rap'),
(5, 'Rock and Roll'),
(6, 'Variété Française'),
(7, 'Variété Internationale'),
(8, 'Hard Rock'),
(9, 'Simulation sportive'),
(10, 'Guerre');

-- --------------------------------------------------------

--
-- Structure de la table `loanning`
--

DROP TABLE IF EXISTS `loanning`;
CREATE TABLE IF NOT EXISTS `loanning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lender_id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `loan_date` datetime NOT NULL DEFAULT current_timestamp(),
  `back_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ongoing` tinyint(1) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `disc_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CE65810F855D3E3D` (`lender_id`),
  KEY `IDX_CE65810F11CE312B` (`borrower_id`),
  KEY `IDX_CE65810F16A2B381` (`book_id`),
  KEY `IDX_CE65810FC38F37CA` (`disc_id`),
  KEY `IDX_CE65810F8F93B6FC` (`movie_id`),
  KEY `IDX_CE65810FE48FD905` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `loanning`
--

INSERT INTO `loanning` (`id`, `lender_id`, `borrower_id`, `loan_date`, `back_date`, `ongoing`, `book_id`, `disc_id`, `movie_id`, `game_id`) VALUES
(6, 1, 3, '2021-04-29 10:22:26', '2021-04-29 10:22:26', 1, 2, NULL, NULL, NULL),
(7, 1, 3, '2021-04-29 10:36:42', '2021-04-29 10:36:42', 1, NULL, 1, NULL, NULL),
(8, 1, 3, '2021-04-29 10:37:48', '2021-04-29 10:37:48', 1, NULL, NULL, NULL, 2),
(9, 1, 3, '2021-04-29 10:38:56', '2021-04-29 10:38:56', 1, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `genders_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C1B2E806A76ED395` (`user_id`),
  KEY `IDX_C1B2E806477C57FD` (`genders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `user_id`, `title`, `director`, `comments`, `image_name`, `created_at`, `updated_at`, `genders_id`) VALUES
(1, 1, 'Titanic', 'James Cameron', 'Le bateau coule à la fin', 'titanic-607fdf7d6f928043079639.jpg', '2021-04-21 10:17:01', '2021-04-21 10:17:01', 3),
(2, 3, 'La guerre des étoiles', 'George Lucas', 'Le 1er des la saga', 'la-guerre-des-etoiles-608a71cc6b7d6194951975.jpg', '2021-04-29 10:43:56', '2021-04-29 10:43:56', 2);

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_requests`
--

DROP TABLE IF EXISTS `reset_password_requests`;
CREATE TABLE IF NOT EXISTS `reset_password_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_16646B41A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `roles`, `password`, `created_at`, `updated_at`, `is_verified`) VALUES
(1, 'Olivier', 'Coudray', 'ocoudray@hotmail.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$R1hxZjBia1AwOVBtdjVOOA$6iNtmGgjwvT8Cce1LzhmwkDYkbtDb735Xf1FFJwt2Ik', '2021-03-12 09:31:03', '2021-03-18 16:30:57', 0),
(3, 'Nathalie', 'Millo', 'nath_millo@yahoo.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$VndhWHdrM21OOGoyaGoubQ$MmZGWi+VZQt/ZPLpZNUe+5XbOM8+TVfKZbWhfGKI+pY', '2021-03-15 16:00:19', '2021-03-15 16:02:19', 1),
(4, 'test', 'test', 'test@hotmail.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$QUhsNEF1WW8zZkh6dHJ5Tg$O2CKT8Yn6+33jkZG2FJfS+n9CBOAvP67M5lkMUbmuU4', '2021-03-16 16:10:58', '2021-03-16 16:11:54', 1),
(5, 'test2', 'test2', 'nonverife@moi.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$ZHViRnZBTXFtWEIvOWhlUw$Pc4M73L18y0oMJ2AkwwuY3xDeueOlAjhFLthp+g/IVk', '2021-03-23 08:12:12', '2021-03-23 08:12:12', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_4A1B2A92477C57FD` FOREIGN KEY (`genders_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `FK_4A1B2A92A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `discs`
--
ALTER TABLE `discs`
  ADD CONSTRAINT `FK_3DD550F2477C57FD` FOREIGN KEY (`genders_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `FK_3DD550F2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `FK_FF232B31477C57FD` FOREIGN KEY (`genders_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `FK_FF232B31A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `loanning`
--
ALTER TABLE `loanning`
  ADD CONSTRAINT `FK_CE65810F11CE312B` FOREIGN KEY (`borrower_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_CE65810F16A2B381` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `FK_CE65810F855D3E3D` FOREIGN KEY (`lender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_CE65810F8F93B6FC` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `FK_CE65810FC38F37CA` FOREIGN KEY (`disc_id`) REFERENCES `discs` (`id`),
  ADD CONSTRAINT `FK_CE65810FE48FD905` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `FK_C1B2E806477C57FD` FOREIGN KEY (`genders_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `FK_C1B2E806A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `reset_password_requests`
--
ALTER TABLE `reset_password_requests`
  ADD CONSTRAINT `FK_16646B41A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
