-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 07 fév. 2025 à 11:45
-- Version du serveur : 8.0.40
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BLOGART25`
--

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE`
--

CREATE TABLE `ARTICLE` (
  `numArt` int NOT NULL,
  `dtCreaArt` datetime DEFAULT CURRENT_TIMESTAMP,
  `dtMajArt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `libTitrArt` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `libChapoArt` text COLLATE utf8mb3_unicode_ci,
  `libAccrochArt` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parag1Art` text COLLATE utf8mb3_unicode_ci,
  `libSsTitr1Art` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parag2Art` text COLLATE utf8mb3_unicode_ci,
  `libSsTitr2Art` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parag3Art` text COLLATE utf8mb3_unicode_ci,
  `libConclArt` text COLLATE utf8mb3_unicode_ci,
  `urlPhotArt` varchar(70) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `numThem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `ARTICLE`
--

INSERT INTO `ARTICLE` (`numArt`, `dtCreaArt`, `dtMajArt`, `libTitrArt`, `libChapoArt`, `libAccrochArt`, `parag1Art`, `libSsTitr1Art`, `parag2Art`, `libSsTitr2Art`, `parag3Art`, `libConclArt`, `urlPhotArt`, `numThem`) VALUES
(49, '2025-02-07 10:38:14', '2025-02-12 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tinc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tinc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tinc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tinc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque ipsum.', '1738927724.jpg', 1),
(50, '2025-02-07 10:38:58', '2025-02-05 00:00:00', 'Lorem ipsum 2 : The lost lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tinc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tinc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tinc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id dictum magna. Vivamus nunc enim, tincidunt sed congue vel, scelerisque ac est. Curabitur quam nulla, gravida at leo et, placerat venenatis metus. Donec semper, ligula et blandit euismod, tellus libero cursus ex, non sagittis odio lectus ac ex. Maecenas augue libero, dictum a venenatis id, congue sit amet augue. Phasellus eget urna convallis nisi sagittis semper. Quisque tempus velit metus, et eleifend ipsum commodo nec. In vel neque ipsum.', '1738927744.jpg', 1),
(51, '2025-02-07 11:31:32', '2025-02-07 00:00:00', '“39-45” : sur les traces de la guerre à Bordeaux', 'Savez-vous vraiment comment était la ville de Bordeaux sous l’occupation Nazis ? 80 ans après la libération de notre ville, vous avez l’occasion de découvrir notre beau patrimoine à travers la seconde guerre mondiale.', 'Entre occupation, résistance et libération, un héritage historique toujours vivant à Bordeaux.', 'Nous sommes en 1944. Bordeaux subit les ravages de la guerre depuis maintenant 4 ans, la ville est au plus bas. L’ennemi exerce une répression constante et terrorise ceux qui nous ont précédés. Les Nazis savaient que Bordeaux était une ville stratégique de part sa localisation proche de l’Océan Atlantique. C’est pour cela qu’ils ont construit la Base sous-marine de Bacalan, afin d’y abriter les U-Boote de la Kriegsmarine. \r\nEn parallèle, les habitants ne se laissent pas abattre et organisent partout dans la ville la résistance Bordelaise. Elle émerge dès 1940, après le passage de la ville en zone occupée. Il y a notamment le réseau Alliance. C’est un réseau de renseignement, actif en Gironde, qui fournit des informations aux Alliés sur les mouvements de l’ennemi. De plus, les sabotages des infrastructures stratégiques, comme les voies ferrées et les dépôts de carburant, pour perturber la logistique allemande. Ils organisent aussi des stratégies pour cacher les Juifs persécutés et les protéger. Ces actions audacieuses contribuent à affaiblir l&#039;occupant et à préparer la libération de la ville. C’est finalement en août 1944 que les FFI libèrent Bordeaux après d’intenses combats.', 'Bordeaux 1944 : 80 ans après, une mémoire vivante entre histoire, résistance et liberté.', 'En 2024, Bordeaux fête un anniversaire majeur : les 80 ans de sa Libération. Cette commémoration est un moment privilégié pour revisiter l’histoire de la ville et la mémoire collective de ses habitants. Cette année, Bordeaux se souvient de ces moments-clés, comme la libération de la ville en août 1944, et les luttes menées pour retrouver la liberté.\r\nEn parcourant les lieux emblématiques de la ville, les visiteurs auront un aperçu de la guerre à Bordeaux. L’un des sites les plus marquants reste la Base sous-marine de Bacalan, ce colossal bunker construit par les Nazis pour abriter leurs sous-marins. Aujourd’hui, ce lieu impressionnant, à la fois sombre et fascinant, accueille des expositions et des événements culturels qui racontent son histoire et celle de l’occupation.\r\nCes lieux de mémoire ne sont pas seulement des espaces de recueillement, ce sont aussi des ponts entre le passé et le présent. Ils nous rappellent que l’histoire de Bordeaux, marquée par la guerre et la résistance, continue de résonner aujourd’hui. Et pour ceux qui souhaitent aller plus loin, ces institutions offrent des expositions temporaires et événements culturels qui célèbrent l’histoire de la ville.', 'Bordeaux occupée : un parcours historique à travers ses lieux emblématiques de la Seconde Guerre.', 'Le Pont de pierre, le Grand-Théâtre, la place Pey-Berland constituent autant de lieux emblématiques de la Seconde Guerre mondiale à Bordeaux. \r\nPlongez dans l’histoire de Bordeaux à travers un parcours unique qui vous mènera des rives de la Garonne au cœur de la ville. Le Pont de pierre, témoin silencieux des convois militaires et des déportations, ouvre cette visite immersive. Puis, direction le Grand-Théâtre, où se jouaient des scènes bien différentes de celles des spectacles. Enfin, la place Pey-Berland, avec sa cathédrale majestueuse, rappelle les moments de recueillement et de résistance spirituelle des Bordelais.\r\nAnimée par un médiateur du Centre national Jean Moulin, cette visite vous fera revivre l’atmosphère de l’époque à travers des anecdotes, des archives et des récits poignants. Une occasion unique de comprendre comment ces lieux, aujourd’hui symboles de la ville, ont été marqués par les heures sombres de l’Occupation et les espoirs de la Libération.\r\n\r\nPour prolonger cette immersion, le Musée d’Aquitaine propose une exposition riche en objets, photographies et témoignages. Une expérience à ne pas manquer pour tous les amateurs d’histoire et les curieux !', 'À travers ses rencontres et son passé, il nous à tout raconté. Avez-vous jamais voulu en apprendre plus sur la vie de notre métropole durant l’occupation allemande ?', '1738926280.jpg', 1),
(52, '2025-02-07 11:48:16', '2025-02-07 00:00:00', 'L’histoire de Bordeaux sous l’occupation racontée par un passionné', 'À travers ses rencontres et son passé, il nous à tout raconté. Avez-vous jamais voulu en apprendre plus sur la vie de notre métropole durant l’occupation allemande ?', 'Bordeaux, 80 ans après, un voyage au cœur de l’histoire, entre mémoire, résistance et liberté.', 'Nous avons eu l’honneur de pouvoir interviewer monsieur Pierre Auzereau, membre et vice -président de l’AGMRD (l’Association Gradignanaise pour la mémoire de la Résistance et de la Déportation). Chanceux, nous avons pu en apprendre beaucoup sur le rôle de Bordeaux et son fonctionnement durant la seconde guerre mondiale. Il nous a gentiment accueilli chez lui afin que l’on puisse lui poser quelques questions. Nous allons donc vous dévoiler tout ce qu’il nous à appris sur la guerre et la résistance à Bordeaux. Il est né dans la ville du port de la Lune en 1944, en pleine Deuxième Guerre mondiale. Ancien électricien, et engagé syndicalement au Parti Communiste Français (PCF). C’était pour lui comme une évidence de créer cette association en 2008 aux côtés de Daniel Province afin de maintenir la mémoire du peu connu, mais important appel de Tillon. Cette association permet également de lutter contre certaines idées extrémistes qui, de par le passé, ont mené au déclenchement de la Seconde Guerre mondiale. Elle permet donc de maintenir la mémoire mais aussi aux gens de faire prendre compte des erreurs commises par le passé pour ne pas les reproduire.', 'Bordeaux 1940: trois jours décisifs ont marqué l’histoire et lancé les premiers élans de résistance.', 'Pour lui, Bordeaux est une des villes les plus importantes de la Seconde Guerre mondiale en France. Et son destin s’est joué durant seulement 3 jours. Les fameux 17 - 18 - 19 Juin 1940, le premier jour le Maréchal Pétain appelle à cesser le combat, mais dans la foulée, Charles Tillon appelle les Français depuis Gradignan où il était réfugié, à ne pas se laisser faire et à continuer à se battre.\r\nCet appel est beaucoup moins connu que celui du 18 juin avec Charles De Gaulle, mais il à permis de changer la vision des communistes en France vu comme des Nazis à cette époque-là à cause du pacte germano-sovietique. Grâce à ça, le rôle central des communistes joueront plus tard dans la Résistance française. Ça y est, c’est le début de la résistance. Le 19 Bordeaux s’organise, tout le monde se met en place, notamment les ouvriers, les patrons, eux sont plus du côtés des collabos. Malgré cet élan de révolte, il est compliqué de s’organiser, ici, c’est la confusion est totale, les réfugiés et militaires sont bloqués dans la ville, tout le monde est dans le flou, pendant que l’ennemi est en chemin vers Bordeaux pour finalement occuper notre ville le 27 juin 1940.', 'Résistance et survie : le rôle crucial des femmes et les réalités de l’Occupation à Bordeaux.', '“Durant 4 ans, la résistance s’organise”, nous dit-il. Les résistants, eux, fonctionnent en réseaux triangulaires. Trois personnes se connaissaient et chacune de ces personnes en connaissait 3 autres ce qui permet aux groupes de se protéger. Mais selon lui, durant la guerre, les femmes ne sont pas respectées, pendant que les maquisards se cachent dans les forêts et organisent la résistance en cachette, elles, font passer les messages dans les rues, et font face à l’ennemi en le côtoyant chaque jour. Ce sont elles qui prennent tous les risques durant l’occupation. Il y a également des hommes, qui ne sont pas dans les réseaux de résistance et qui se sont fait enrôler de force afin d’aider les Allemands, comme le père de Pierre. Il faisait les sacs de ciment, et à été  logiquement réquisitionné pour la construction de la base sous-marine de Bordeaux au vu de son travail et de son expérience. “Il n’était pas fier”, nous dit-il. Mais obligé de suivre les directives soumises par les Nazis sous peine de se faire fusiller… car oui, plus de 350 otages et résistants se sont fait fusillée dans le terrain militaire Allemand situé dans la périphérie bordelaise nommée le camp Souge.', 'Entre courage et sacrifice, Bordeaux garde vive la mémoire de sa résistance pour éclairer l’avenir.', '1738926635.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `COMMENT`
--

CREATE TABLE `COMMENT` (
  `numCom` int NOT NULL,
  `dtCreaCom` datetime DEFAULT CURRENT_TIMESTAMP,
  `libCom` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `dtModCom` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `attModOK` tinyint(1) DEFAULT '0',
  `notifComKOAff` text COLLATE utf8mb3_unicode_ci,
  `dtDelLogCom` datetime DEFAULT NULL,
  `delLogiq` tinyint(1) DEFAULT '0',
  `numArt` int NOT NULL,
  `numMemb` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `LIKEART`
--

CREATE TABLE `LIKEART` (
  `numMemb` int NOT NULL,
  `numArt` int NOT NULL,
  `likeA` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MEMBRE`
--

CREATE TABLE `MEMBRE` (
  `numMemb` int NOT NULL,
  `prenomMemb` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nomMemb` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pseudoMemb` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `passMemb` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `eMailMemb` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dtCreaMemb` datetime DEFAULT CURRENT_TIMESTAMP,
  `dtMajMemb` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `accordMemb` tinyint(1) DEFAULT '1',
  `cookieMemb` varchar(70) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `numStat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `MEMBRE`
--

INSERT INTO `MEMBRE` (`numMemb`, `prenomMemb`, `nomMemb`, `pseudoMemb`, `passMemb`, `eMailMemb`, `dtCreaMemb`, `dtMajMemb`, `accordMemb`, `cookieMemb`, `numStat`) VALUES
(6, 'Mathis', 'Rossi', 'Mamathis', '$2y$10$kOdVxTccOfyCzT4XVYwtjeqnhUxKjlBbpDLp0cAJA77nBtrgIbsuC', 'azertyuiop@', '2025-02-06 10:30:55', '2025-02-06 10:31:34', 1, NULL, 1),
(8, 'Edouard', 'Tea', 'SNK_France', '$2y$10$Yy4CSmwkl53t0lFomMpO/OjjunCSRZs137NgIM87GHkSqVBt.SxXi', 'mathis.duclos3@gmail.com', '2025-02-07 11:57:40', NULL, 1, NULL, 2),
(9, 'Thibaud', 'DUCLOS', 'ThibaudPodo', '$2y$10$mtZJ8oEcyQ.2wJTVILoVmuQW5S/1IleWe5E7wODw9.wZ7ilCq9LgG', 'mathis.duclos3@gmail.com', '2025-02-07 12:00:24', NULL, 1, NULL, 3),
(10, 'Martine', 'Bornerie', 'AdminMartine', '$2y$10$oFulZGD4L7DXR0OY9PzbKOkI4XvdxDoFNfj3obDldDeRKLBsWa9gu', 'martine@mmi', '2025-02-07 12:20:11', '2025-02-07 12:20:58', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `MOTCLE`
--

CREATE TABLE `MOTCLE` (
  `numMotCle` int NOT NULL,
  `libMotCle` varchar(60) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `MOTCLE`
--

INSERT INTO `MOTCLE` (`numMotCle`, `libMotCle`) VALUES
(1, 'Bordeaux'),
(2, 'Guerre'),
(3, 'Résistance'),
(4, 'Histoire'),
(5, 'Monument'),
(6, 'Allemands'),
(7, 'Association');

-- --------------------------------------------------------

--
-- Structure de la table `MOTCLEARTICLE`
--

CREATE TABLE `MOTCLEARTICLE` (
  `numArt` int NOT NULL,
  `numMotCle` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `MOTCLEARTICLE`
--

INSERT INTO `MOTCLEARTICLE` (`numArt`, `numMotCle`) VALUES
(49, 3),
(49, 4),
(49, 5),
(49, 6),
(49, 7),
(50, 6),
(50, 7),
(51, 1),
(51, 2),
(51, 3),
(51, 6),
(52, 1),
(52, 2),
(52, 3),
(52, 4),
(52, 5),
(52, 6),
(52, 7);

-- --------------------------------------------------------

--
-- Structure de la table `STATUT`
--

CREATE TABLE `STATUT` (
  `numStat` int NOT NULL,
  `libStat` varchar(25) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dtCreaStat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `STATUT`
--

INSERT INTO `STATUT` (`numStat`, `libStat`, `dtCreaStat`) VALUES
(1, 'Administrateur', '2023-02-19 15:15:59'),
(2, 'Modérateur', '2023-02-19 15:19:12'),
(3, 'Membre', '2023-02-20 08:43:24');

-- --------------------------------------------------------

--
-- Structure de la table `THEMATIQUE`
--

CREATE TABLE `THEMATIQUE` (
  `numThem` int NOT NULL,
  `libThem` varchar(60) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `THEMATIQUE`
--

INSERT INTO `THEMATIQUE` (`numThem`, `libThem`) VALUES
(1, 'L\'événement'),
(2, 'L\'acteur-clé'),
(3, 'Le mouvement émergeant'),
(4, 'L\'insolite / le clin d\'œil');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`numArt`),
  ADD KEY `ARTICLE_FK` (`numArt`),
  ADD KEY `FK_ASSOCIATION_1` (`numThem`);

--
-- Index pour la table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD PRIMARY KEY (`numCom`),
  ADD KEY `COMMENT_FK` (`numCom`),
  ADD KEY `FK_ASSOCIATION_2` (`numArt`),
  ADD KEY `FK_ASSOCIATION_3` (`numMemb`);

--
-- Index pour la table `LIKEART`
--
ALTER TABLE `LIKEART`
  ADD PRIMARY KEY (`numMemb`,`numArt`),
  ADD KEY `LIKEART_FK` (`numMemb`,`numArt`),
  ADD KEY `FK_LIKEART1` (`numArt`);

--
-- Index pour la table `MEMBRE`
--
ALTER TABLE `MEMBRE`
  ADD PRIMARY KEY (`numMemb`),
  ADD KEY `MEMBRE_FK` (`numMemb`),
  ADD KEY `FK_ASSOCIATION_4` (`numStat`);

--
-- Index pour la table `MOTCLE`
--
ALTER TABLE `MOTCLE`
  ADD PRIMARY KEY (`numMotCle`),
  ADD KEY `MOTCLE_FK` (`numMotCle`);

--
-- Index pour la table `MOTCLEARTICLE`
--
ALTER TABLE `MOTCLEARTICLE`
  ADD PRIMARY KEY (`numArt`,`numMotCle`),
  ADD KEY `MOTCLEARTICLE_FK` (`numArt`),
  ADD KEY `MOTCLEARTICLE2_FK` (`numMotCle`);

--
-- Index pour la table `STATUT`
--
ALTER TABLE `STATUT`
  ADD PRIMARY KEY (`numStat`),
  ADD KEY `STATUT_FK` (`numStat`);

--
-- Index pour la table `THEMATIQUE`
--
ALTER TABLE `THEMATIQUE`
  ADD PRIMARY KEY (`numThem`),
  ADD KEY `THEMATIQUE_FK` (`numThem`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  MODIFY `numArt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `COMMENT`
--
ALTER TABLE `COMMENT`
  MODIFY `numCom` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `MEMBRE`
--
ALTER TABLE `MEMBRE`
  MODIFY `numMemb` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `MOTCLE`
--
ALTER TABLE `MOTCLE`
  MODIFY `numMotCle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `STATUT`
--
ALTER TABLE `STATUT`
  MODIFY `numStat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `THEMATIQUE`
--
ALTER TABLE `THEMATIQUE`
  MODIFY `numThem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`numThem`) REFERENCES `THEMATIQUE` (`numThem`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`numArt`) REFERENCES `ARTICLE` (`numArt`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`numMemb`) REFERENCES `MEMBRE` (`numMemb`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `LIKEART`
--
ALTER TABLE `LIKEART`
  ADD CONSTRAINT `FK_LIKEART1` FOREIGN KEY (`numArt`) REFERENCES `ARTICLE` (`numArt`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_LIKEART2` FOREIGN KEY (`numMemb`) REFERENCES `MEMBRE` (`numMemb`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `MEMBRE`
--
ALTER TABLE `MEMBRE`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`numStat`) REFERENCES `STATUT` (`numStat`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `MOTCLEARTICLE`
--
ALTER TABLE `MOTCLEARTICLE`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`numMotCle`) REFERENCES `MOTCLE` (`numMotCle`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`numArt`) REFERENCES `ARTICLE` (`numArt`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
