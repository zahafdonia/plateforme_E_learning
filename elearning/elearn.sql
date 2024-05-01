-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 27 avr. 2024 à 14:28
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `elearn`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'doniazahaf ', 'donia.zahaf@gmail.com ', 'donia123'),
(2, 'habibdrira ', ' habib.drira@gmail.com', 'habib123'),
(3, 'iteamsc ', ' iteamsc@gmail.com', 'iteam123'),
(4, 'adminiteam ', ' adminiteam@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_et` int(5) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `annee` int(4) NOT NULL,
  `classe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_et`, `nom`, `annee`, `classe`) VALUES
(1, 'java', 2022, '1ing'),
(2, 'python', 2024, '2ing'),
(3, 'web', 2023, 'licence'),
(4, 'analyse', 2024, '1ing');

-- --------------------------------------------------------

--
-- Structure de la table `former`
--

CREATE TABLE `former` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `specialite` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `cv` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `former`
--

INSERT INTO `former` (`id_user`, `username`, `email`, `password`, `specialite`, `experience`, `cv`) VALUES
(1, 'mohamed  ', 'mohamed@gmail.com', 'mohamed', NULL, NULL, NULL),
(2, 'wafa  ', 'wafa@gmail.com', 'wafa1234', NULL, NULL, NULL),
(3, 'malek  ', 'malek@gmail.com', 'malek55', NULL, NULL, NULL),
(4, 'fares', ' fares@gmail.com', ' fares22', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `classe` varchar(50) DEFAULT NULL,
  `niveau` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id_user`, `username`, `email`, `password`, `classe`, `niveau`, `image`) VALUES
(1, 'donia  ', 'donia@gmail.com', '123456', 'Ing_GL', 1, NULL),
(2, 'habib ', 'habib@gmail.com ', 'driraaaa', 'Ing_GL', 1, NULL),
(3, 'oussema  ', 'oussema@gmail.com', 'oussema1', 'Ing_GL', 3, NULL),
(4, 'mahdi  ', 'mahdi@gmail.com', 'mahdiii', 'licence_securite', 3, NULL),
(5, 'sirine  ', 'sirine@gmail.com', 'sirine20', 'prepa-mpi', 1, NULL),
(6, 'asma ', ' asma@gmail.com', 'asma88', 'Ing_Big_Data', 2, NULL),
(12, 'haifa', 'haifa@gmail.com', 'haifa123', 'Ing-cloud', 2, 'IMG-20220529-WA0006.jpg'),
(13, 'mariem', 'mariem@gmail.com', 'mariem1', 'licence_C_SCIENCES', 3, '426886933_701990318803810_1186612392474349888_n.jpg'),
(14, 'haifa', 'haifa@gmail.com', 'haifa123', 'Ing-cloud', 2, 'received_471694969991558.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

CREATE TABLE `teacher` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `matiere` varchar(100) DEFAULT NULL,
  `classe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `teacher`
--

INSERT INTO `teacher` (`id_user`, `username`, `email`, `password`, `matiere`, `classe`) VALUES
(1, 'asmacheker ', 'asmachaker@gmail.com', 'asma123', NULL, NULL),
(2, 'aaaaaaaa ', 'aaaaaaaa@gmail.com', '12345678', NULL, NULL),
(3, 'bbbbbbb ', 'bbbbbbb@gmail.com', '87654321', NULL, NULL),
(4, 'cccccc ', 'cccccc@gmail.com', '123456', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`) VALUES
(1, 'doniazahaf ', 'donia.zahaf@gmail.com ', 'donia123', 'admin'),
(2, 'habibdrira ', ' habib.drira@gmail.com', 'habib123', 'admin'),
(3, 'iteamsc ', ' iteamsc@gmail.com', 'iteam123', 'admin'),
(4, 'adminiteam ', ' adminiteam@gmail.com', 'admin123', 'admin'),
(5, 'donia  ', 'donia@gmail.com', '123456', 'student'),
(6, 'habib ', 'habib@gmail.com ', 'driraaaa', 'student'),
(7, 'oussema  ', 'oussema@gmail.com', 'oussema1', 'student'),
(8, 'mahdi  ', 'mahdi@gmail.com', 'mahdiii', 'student'),
(9, 'sirine  ', 'sirine@gmail.com', 'sirine20', 'student'),
(10, 'asma ', ' asma@gmail.com', 'asma88', 'student'),
(11, 'asmacheker ', 'asmachaker@gmail.com', 'asma123', 'enseignant'),
(12, 'aaaaaaaa ', 'aaaaaaaa@gmail.com', '12345678', 'enseignant'),
(13, 'bbbbbbb ', 'bbbbbbb@gmail.com', '87654321', 'enseignant'),
(14, 'cccccc ', 'cccccc@gmail.com', '123456', 'enseignant'),
(15, 'mohamed  ', 'mohamed@gmail.com', 'mohamed', 'formateur'),
(16, 'wafa  ', 'wafa@gmail.com', 'wafa1234', 'formateur'),
(17, 'malek  ', 'malek@gmail.com', 'malek55', 'formateur'),
(18, 'fares', ' fares@gmail.com', ' fares22', 'formateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_et`);

--
-- Index pour la table `former`
--
ALTER TABLE `former`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_et` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `former`
--
ALTER TABLE `former`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `former`
--
ALTER TABLE `former`
  ADD CONSTRAINT `former_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
