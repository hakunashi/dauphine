-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 28 avr. 2024 à 15:07
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dauphineexam`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `imageUrl` varchar(250) DEFAULT NULL,
  `contenu` text NOT NULL,
  `titre` varchar(250) NOT NULL,
  `auteur` varchar(250) NOT NULL,
  `datePublication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `imageUrl`, `contenu`, `titre`, `auteur`, `datePublication`) VALUES
(1, 'https://ralfvanveen.com/wp-content/uploads/2021/06/Espace-r%C3%A9serv%C3%A9-_-Glossaire-1200x675.webp', 'L\'intelligence artificielle (IA) a connu des progrès fulgurants ces dernières années, et son impact se fait sentir dans de nombreux domaines, y compris la traduction. Les outils de traduction automatique (TA) basés sur l\'IA deviennent de plus en plus sophistiqués et précis, offrant une alternative viable aux traducteurs humains dans de nombreux cas.\r\n\r\nL\'un des principaux avantages de la traduction automatique basée sur l\'IA est sa rapidité. Les outils de TA peuvent traduire des textes en quelques secondes, ce qui est beaucoup plus rapide que la traduction humaine. Cela peut être particulièrement utile pour les entreprises qui ont besoin de traduire de grandes quantités de documents dans un court laps de temps.\r\n\r\nUn autre avantage de la traduction automatique basée sur l\'IA est son coût. Les outils de TA sont généralement beaucoup moins chers que les traducteurs humains, ce qui peut permettre aux entreprises d\'économiser de l\'argent. De plus, la traduction automatique peut être utilisée pour traduire des textes dans des langues que les traducteurs humains ne maîtrisent pas.\r\n\r\nCependant, il est important de noter que la traduction automatique n\'est pas encore parfaite. Les traductions produites par les outils de TA peuvent parfois être inexactes ou grammaticalement incorrectes. Il est donc important de relire attentivement les traductions automatiques avant de les utiliser.\r\n\r\nMalgré ses limites, la traduction automatique basée sur l\'IA est un outil puissant qui peut être utilisé pour traduire des textes rapidement et à moindre coût. À mesure que la technologie continue de se développer, la traduction automatique deviendra encore plus précise et fiable, ce qui en fera un outil encore plus précieux pour les entreprises et les particuliers. la rue la vraie', 'Article sur les IA', 'Gemini', '2024-04-27 14:46:16'),
(7, 'https://ralfvanveen.com/wp-content/uploads/2021/06/Espace-r%C3%A9serv%C3%A9-_-Glossaire-1200x675.webp', 'content teste des content zerfzefze fze zef zef zefz ef', 'titre', 'jose', '2024-04-28 14:58:28'),
(8, 'https://ralfvanveen.com/wp-content/uploads/2021/06/Espace-r%C3%A9serv%C3%A9-_-Glossaire-1200x675.webp', 'azeoaizjeaozi jeaozej aizej apoziejazpeij azpiej apziej azpiej azpie, apzie,a zpiejazp eijazpi ejapzi ejapziej apzej pazie azli, liddjazpi, azci,azc ,azpc,a zpi,ac az aze aze aze aze', 'le monde de demain', 'jose', '2024-04-28 14:58:34');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `nom`, `prenom`, `password`) VALUES
(1, 'jose', 'jose', 'bove', '$2y$10$ySsnoaZOybJuMU26jz.z8eNFQ8b1bizrGP6E8oL2ZuUo88oMoZY7q');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `annonce_id_uindex` (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateur_id_uindex` (`id`),
  ADD UNIQUE KEY `utilisateur_login_uindex` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
