-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 nov. 2023 à 09:57
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `schema`
--

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `label`, `amount`, `created_at`, `updated_at`) VALUES
(12, 8, 'bmw 1', 20000, '2023-11-13 00:09:13', '2023-11-13 00:09:13'),
(15, 7, 'darius5', 50, '2023-11-13 00:16:25', '2023-11-13 00:16:36');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'motdepasse123', '2023-11-12 10:50:04', '2023-11-12 10:50:04'),
(2, 'Darius', 'darius@gmail.com', '$2y$10$m7q9OeNjx/22y1.9J/A4sesMTmxlmXcYUAcfvzxMbtpZiAJYHidyy', '2023-11-12 11:40:27', '2023-11-12 11:40:27'),
(3, 'mohammed', 'momo@gmail.com', '$2y$10$d8u8OYdDMSiJYxORc27h2usYJjkrAaLc3yU1RHrtZqtYEAZN/aNN2', '2023-11-12 11:43:12', '2023-11-12 11:43:12'),
(4, 'eric', 'eric@gmail.com', '$2y$10$Xd9gxQ2QQWyy/DPK923LgeIkoN5ZYRCLiBVEcgDG.KukZEBsA9Rh2', '2023-11-12 11:44:19', '2023-11-12 11:44:19'),
(5, 'dedede', 'dada@gmail.fr', '$2y$10$i7VGbSevwXY7Xmrcy8IY4OFrujXqZgNScy5rzRkpEzURdMQg74caK', '2023-11-12 12:17:07', '2023-11-12 12:17:07'),
(6, 'kaisa', 'kaisa@yahoo.fr', '$2y$10$V7BU6ns.yK7DrgD0K5k2SOr0j01LF17Wyw74kaadfEWAvUoFRlLbG', '2023-11-12 12:21:41', '2023-11-12 12:21:41'),
(7, 'darius75', 'darius75@gmail.com', '$2y$10$BsJxIASZwY9weaTF94/b8OVpumqhNIcLXhXJhavykd6raOVSyhoYK', '2023-11-12 12:33:18', '2023-11-12 12:33:18'),
(8, 'alex', 'alex@gmail.com', '$2y$10$cFzmpByz5cpCTnIscPSVJemSudJKl3JlwgWXIJNG4Bq4ubo/dzjXW', '2023-11-12 23:56:21', '2023-11-12 23:56:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
