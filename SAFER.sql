-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 09 jan. 2023 à 06:39
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SAFER`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE `bien` (
  `id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `descriptif` longtext NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `surface` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `illustration` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`id`, `reference`, `intitule`, `descriptif`, `localisation`, `surface`, `prix`, `type_id`, `categorie_id`, `illustration`, `slug`) VALUES
(61, '17.03.017', 'Activités Equestres, Apiculture, Chasse,', 'Propriété Charente-Maritime', '17200', '17Ha', '330000', 2, 5, 'f279b56384e3bdf98b007e139acc21f3d75f5336.jpg', '1703017'),
(62, '19.07.118', 'FERME 100% HERBAGERE/ ELEVAGE LAITIER', 'Située à l\'orée d\'un bourg, à 10 minutes des services et commerces.', '35200', '34Ha', '950', 1, 5, '62ba721efee0322d7827cbc8e67de30a7644163d.jpg', '1907118'),
(63, '23.16.104', 'Propriété Creuse', 'Dans un hameau à moins de 10 minutes d\'un bourg avec services et commerces, et d\'un village ayant un intérêt touristique sur les routes de St-Jacques-de-Compostelle.', '23320', '1Ha55', '860', 1, 4, '1b52dafd38e66e469184611845e25bf2b34521b0.jpg', '2316104'),
(64, '30VI9700', 'Propriété Gard', 'Ensemble immobilier proche d\'un plan d\'eau aménagé', '34290', '29Ha', '2000', 1, 5, '2f83b01ccba748cb70359a6dfb58f8bd39727081.jpg', '30vi9700'),
(65, '313453DR', 'Idéal société de chasse', 'Terrain boisé classé ONF', '22700', '35Ha', '120000', 2, 2, '736a8566c6a2c3f84cb566afe5137462a4834560.jpg', '313453dr'),
(66, '344334UJ', 'Sapinière', 'Sapinière en cours de bail, cherche reprise', '35200', '1,8Ha', '800', 1, 2, '21be465a3b7f8ff2d08ef0bd842befcd2c94f8d9.jpg', '344334uj'),
(67, '345E7EG', 'Bois sur pied', 'Diverses essences sur place', '29510', '6Ha', '30000', 2, 2, 'a1574d3f2cbbdcf680cd8022a5392a7cfd4ad737.jpg', '345e7eg'),
(68, '34AG10897', 'Tourisme rural-hébergement', 'Au nord de l\'Hérault, proche des axes routiers et à 45 minutes de Montpellier', '34070', '1Ha90', '1 490 000', 2, 4, '3a075a69342e4a4a205390e5bf8eb475c9fece19.jpg', '34ag10897'),
(69, '34VI6979', 'Propriété viticole et sa cave', 'Au cœur de l\'appellation Saint-Chinian', '34280', '30Ha', '1 500 000', 2, 4, '0f548fd769c19051ac1cf0242d8e4b8b193a739c.jpg', '34vi6979'),
(70, '38TB22187', 'Vallons du Voironnais', '13 Ha de terrain', '38500', '13Ha', '2000', 1, 3, '4c6a590666b4d7a9ec2ca3e9cca2765554854e6d.jpg', '38tb22187'),
(71, '43LM220118', 'Prairies en pays glazik', 'Usage petits animaux type caprins', '29510', '1ha22', '15000', 2, 1, '176495874a16386a9e15dda9acc4a50895a40316.jpg', '43lm220118'),
(72, '44 22 AN 08', 'Bâtiments avicoles à transmettre', 'Site avicole à transmettre sur la commune de Nort-sur-Erdre, au nord de Nantes.', '44220', '2Ha', '200000', 2, 4, '73b35329324557d8619f7e7b610c0df14218fc01.jpg', '44-22-an-08'),
(73, '47.06.098', 'PRET A USAGE sur 95 ha - PLAINE DES VOSGES', 'A 5 min de Villeneuve-sur-Lot', '47300', '14Ha', '11000', 1, 3, 'fd0e8d0393c3e82049320fe9acca678e204f2319.jpg', '4706098'),
(74, '48EL11345', 'Propriété Lozère', 'Ensemble bâti avec environ 1ha55', '48370', '1Ha55', '700', 1, 4, 'a6c7ad09f10c0b047ff721688fd528aaaf49176d.jpg', '48el11345'),
(75, '48RE11201', 'Situé à 15 minutes de Mende', 'idéal pour polyculture sur 14 ha', '30430', '10Ha', '1300', 1, 3, 'f5d8b42d846af4ef6ac005eb8fec578849bc44af.jpg', '48re11201'),
(76, '55VS', 'Propriété Meuse', 'FERME DE COURUPT : Secteur Sainte-Menehould / Clermont-en-Argonne / Revigny', '88340', '59Ha', 'Nous consulter', 1, 5, '4eed0ddd9118bc44135adbefdf43ad1323329a5f.jpg', '55vs'),
(77, '5667DB', 'Ancienne ferme équestre en ruine', 'Terrains actuellement loués', '29510', '12Ha', '156000', 2, 3, 'c63a34a86b66fd0e0aaf273d702919e43f5ebc5a.jpg', '5667db'),
(78, '64.02.59', 'Productions végétales', 'La parcelle se situe dans le Béarn sur la commune de LAGOR.', '64150', '2Ha', '7700', 2, 1, '179556ebeb82e5d5ec8e07a4053daa514e224603.jpg', '640259'),
(79, '64.03.60', 'Propriété située dans un secteur vallonné', 'Propriété Pyrénées-Atlantiques', '23500', '6Ha', '650', 1, 4, '5d4dd7eedb20645f12e2b2a420aae94314e4b7e7.jpg', '640360'),
(80, '65.23.876', 'Terrain classé T4', 'cloturé et partiellement boisé', '56500', '1,2Ha', '500', 1, 2, 'd69d638b155eb3f95617b88d7c93f489a28ea246.jpg', '6523876'),
(81, '7629CA', 'Prairies sur les plateaux', 'Parcelle de terre labourable d\'environ 2 ha', '81090', '76Ha', '400000', 2, 1, 'a9228a1851b98b82409e5ffe0347bc603bb52919.jpg', '7629ca'),
(82, '765DN', 'Prairies orientées nord ouest', 'Lot d\'un seul tenant', '56500', '11Ha', '113000', 2, 1, '82b772d50d6dc60f0d761b3dae8a095bc1648143.jpg', '765dn'),
(83, '76RZDC', 'Terrain proche cours d\'eau', 'Non accessible par la route, uniquement chemin d\'exploitation', '35200', '5,5Ha', '3000', 1, 1, '2be514dc0a837b93ea0d5615091554d583864602.jpg', '76rzdc'),
(84, '81EL11100', 'Secteur du Ségala-Viaur', 'les secteurs les plus en pente sont empiérés', '12200', '54Ha', '400000', 2, 2, '2312643978281d5b06f6ee1f11a94db68a83db36.jpg', '81el11100'),
(85, '88 FB', 'Vittel Dombrot : Ouest vosgien, secteur de VITTEL', 'Terrains d\'environ 6,5 ha', '88170', '6,5Ha', 'Nous consulter', 2, 3, '7eaa617ff930323ddad6a763b2c7d1be70fdbbe2.jpg', '88-fb'),
(86, '9875RDC', 'Terrain avec abri', 'Pour propriétaire équin', '44110', '1,2Ha', '1200', 1, 1, 'f4dd8710a3c015303b2ff45d329b0654a353ee44.jpg', '9875rdc'),
(87, 'AA 72 22 0088 R', 'Exploitation Agricole spécialisée en polyculture élevage', 'Exploitation située dans le Sud Est de La Sarthe, entre la commune d\'Ecommoy (72220) et Sarcé (72327)', '72220', '87Ha', 'a', 2, 5, 'e1be6f5344b4c93be6d6dc3aafd44d274dfcb8c1.jpg', 'aa-72-22-0088-r'),
(88, 'MQ14170356', 'Propriété Calvados', 'JFD : Noue de Sienne (14)', '14380', '17Ha', '173 440', 2, 5, 'a30303d8c9ba2ce6de027cf9eb053c4df9718684.jpg', 'mq14170356'),
(89, 'QDSGF56', 'Bois domainial', 'Bois accessible avec sentiers', '44110', '32Ha', '12000', 1, 2, '1e643f4c55ca2610dbc3d5535906e45f46746e3a.jpg', 'qdsgf56'),
(90, 'Z34.345.45', 'Légèrement en Pente', 'Idéal paturage moutons', '22700', '3,4Ha', '2400', 1, 1, 'fe7c178bcab51285a4ab3298750c2d70ae49723c.jpg', 'z3434545');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(1, 'Prairie'),
(2, 'Bois'),
(3, 'Terrain agricole'),
(4, 'Bâtiments'),
(5, 'Exploitations');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221226203826', '2022-12-26 20:42:25', 57),
('DoctrineMigrations\\Version20221226220640', '2022-12-26 22:07:49', 59),
('DoctrineMigrations\\Version20221230013546', '2022-12-30 01:37:01', 58),
('DoctrineMigrations\\Version20221230022128', '2022-12-30 02:21:47', 81),
('DoctrineMigrations\\Version20221230023836', '2022-12-30 02:38:44', 49),
('DoctrineMigrations\\Version20221230024049', '2022-12-30 02:40:53', 37),
('DoctrineMigrations\\Version20221230024708', '2022-12-30 02:47:50', 56),
('DoctrineMigrations\\Version20221230031020', '2022-12-30 03:10:25', 51),
('DoctrineMigrations\\Version20221230170417', '2022-12-30 17:04:20', 86),
('DoctrineMigrations\\Version20221230171048', '2022-12-30 17:10:52', 42),
('DoctrineMigrations\\Version20230108155141', '2023-01-08 15:51:48', 80);

-- --------------------------------------------------------

--
-- Structure de la table `favori`
--

CREATE TABLE `favori` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `bien_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `favori`
--

INSERT INTO `favori` (`id`, `utilisateur_id`, `bien_id`) VALUES
(124, 24, 61),
(125, 24, 62),
(126, 7, 68),
(127, 7, 69);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Location'),
(2, 'Vente');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacts` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `contacts`) VALUES
(1, 'sd@fg.c', '[]', 'qwert', 'sd', 'sd', '12345'),
(3, 'qwerty@m.ci', '[]', 'asdfg', 'benard', 'vfgt', '987654321'),
(4, 'ajsnnsn@kkdk.xjsnn', '[]', '$2y$13$kRll.0R.jxWbzVW.x3.yBeIo9kpv8bvVkVT4f6kc3t1mELPBsSroi', 'Raphael', 'DJAA', '753345403'),
(6, 'sd@fmdmsk.com', '[]', '$2y$13$y0/FkSqYgs1bbIoboR6eWeF1amwvTLS7CJaKd05AGWXyzNwtuJ//q', 'qwe', 'w', '122'),
(7, 'boss@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$LkES883h2jZl6HFzI/zm.usWj664ocdL6TUbU7FdY6j1ndbNoxdr6', 'boss', 'boss', '123456789'),
(8, 'test@t.com', '[]', '$2y$13$IAXL4c6ISk9i5TyK9eqBL.xpZsUBQaJoWFu3XWiYdMXPJ.cn7BHTS', 'test', 'test', '12345678'),
(10, 'dd@dd.dd', '[]', '$2y$13$yz5aN68yuwFXayzhLtHMQesCdm8XvIKrEcLIMFxmwOij234jOaQUW', 'dd', 'dd', '1234567890'),
(12, 'dun@dun.un', '[]', '$2y$13$KLyTQxtAbfABswnkukXCdu4lwM.SqXVg0wSU5nTu8eK5T2xHkGgyi', 'dun', 'dun', '2345678909'),
(14, 'dun@dun.u7', '[]', '$2y$13$JQ/9UgkD4adm1HdH1jFLt.ah5NCqxnwbN.uvtrTwJ3KzK1lBsET5.', 'dun', 'dun', '2345678909'),
(16, 'dun@dun.u45', '[]', '$2y$13$JoaA3f2uMbBKI..2a2BlKOBhu0.8hfbq7MgMjaQS411ipfltpbWfa', 'dun', 'dun', '2345678909'),
(17, 'dun@dun.u46', '[]', '$2y$13$9DjpyQ34OHCrimtPwQhlQeoKUAFcSSkSNRcI.LU27D4zcNOcv/HsC', 'dun', 'dun', '2345678909'),
(18, 'ddddd@fdfdd.ddndnd', '[]', '$2y$13$OJZQtiBFKpV3jyS4tAEQd.f6hZ5vh7xSRYWoX5SOruyNfOJxU0YUy', 'ddddd', 'ddddd', '1121222112'),
(20, 'vv@jhh.f', '[]', '$2y$13$iN9QiGeBI5RLaBm6bFW4jeLw1nb9SIZ3aF7wqj3tByE1Lc.cEa3eW', 'gggg', 'fff', '1286676886'),
(24, 'djaaraphael5@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$eHtk/4iDi/v0c2MLFfEiseCNenKwjHuEZAB3hyR9cuJsCzI9iztIO', 'admin', 'admin', '1234567890'),
(25, 'djaaraphael6@gmail.com', '[]', '$2y$13$FvMTMnmL/SBz6.ObTgDt..XE2SZz1sMs8tf5s.aT7vOp9y6xarYSS', 'admin', 'admin', '1234450000');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_45EDC386C54C8C93` (`type_id`),
  ADD KEY `IDX_45EDC386BCF5E72D` (`categorie_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `favori`
--
ALTER TABLE `favori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EF85A2CCFB88E14F` (`utilisateur_id`),
  ADD KEY `IDX_EF85A2CCBD95B80F` (`bien_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bien`
--
ALTER TABLE `bien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `favori`
--
ALTER TABLE `favori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bien`
--
ALTER TABLE `bien`
  ADD CONSTRAINT `FK_1111C504BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FK_1111C504C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `favori`
--
ALTER TABLE `favori`
  ADD CONSTRAINT `FK_EF85A2CCBD95B80F` FOREIGN KEY (`bien_id`) REFERENCES `bien` (`id`),
  ADD CONSTRAINT `FK_EF85A2CCFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
