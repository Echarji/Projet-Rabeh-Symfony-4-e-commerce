-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 28 mai 2019 à 02:06
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rabeh_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheter`
--

CREATE TABLE `acheter` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `acheter`
--

INSERT INTO `acheter` (`id`, `id_user`, `id_livre`) VALUES
(15, 3, 19),
(16, 3, 21),
(18, 3, 18),
(19, 3, 15);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`, `image`, `created_at`) VALUES
(1, 'Narratifs', 'Les genres narratifs sont caractérisés par le récit de l\'enchaînement plus ou moins complexe des événements, des péripéties avec la possibilité d\'en établir le schéma narratif et de définir le principe général de l\'action par le schéma actanciel qui expose les différents rôles présents dans le récit. On peut également définir le statut du narrateur (ou des narrateurs), distinct(s) de l\'auteur sauf mention particulière, ainsi que les points de vue narratifs choisis et la structure chronologique de l\'œuvre.', 'aaak', '2019-04-24 00:00:00'),
(2, 'Les histoires courtes', 'sont très stimulantes car les phrases, dont le nombre correspond bien au niveau de l’enfant, sont soutenues par des illustrations vives et colorées, qui enrichissent le texte.', 'aaa', '2019-04-24 00:00:00'),
(3, 'Mathématique. Sciences exactes et naturelles', 'scscsc', 'cc', '2014-01-01 14:11:00');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numtel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `numtel`, `message`, `created_at`) VALUES
(1, 'aaa', 'eeee', '123', 'messsssss', '2019-04-26 22:08:24'),
(2, 'aaa', 'eeee', '123', 'messsssss', '2019-04-26 22:09:01'),
(3, 'zzzzz', 'mmmm', 'pppppp', 'ooooooooooooo', '2019-04-26 22:10:32'),
(4, 'aaaaa', 'aa@aa.aa', '12345678', 'attttttttttttaaaaaaaaaaaaaaaaaaaaa', '2019-05-03 09:48:19');

-- --------------------------------------------------------

--
-- Structure de la table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkfb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linktw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkyo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkgo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `footer`
--

INSERT INTO `footer` (`id`, `tel`, `adresse`, `description1`, `linkfb`, `linktw`, `linkyo`, `linkgo`, `email`, `description2`) VALUES
(1, '+216 25 501 398', 'M\'saken', 'Au lieu de porter votre attention sur tout un tas de choses en même temps (réseaux sociaux, SMS, conversation avec ses collègues, envoi de différents mails…), la lecture vous oblige à n’être concentré que sur le contenu que vous lisez. Le monde qui vous e', 'https://fr-fr.facebook.com/', 'https://twitter.com/?lang=fr', 'https://www.youtube.com/', 'https://www.google.com/?hl=fr', 'hamdirabeh669@gmail.com', 'La lecture accroît vos connaissances');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(3, 'aaazz', 'aaazz', 'aaa@aaa.aaa', 'aaa@aaa.aaa', 1, NULL, '$2y$13$tNCChvSxw39Lse9NEn5wv.RDyAqcJe6HlMkmRLn4tW9dJuaYJ4gk.', '2019-05-03 09:48:49', NULL, NULL, 'a:0:{}'),
(5, 'Rabeh', 'rabeh', 'hamdirabeh669@gmail.com', 'hamdirabeh669@gmail.com', 1, NULL, '$2y$13$NhhbGdvfadQXqhgQkAD8meChH3KoyDML7jT2O9PCTS3QobLHsm/aC', '2019-05-03 09:50:53', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `id_categori_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cout1` double NOT NULL,
  `remise` double NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `id_categori_id`, `image`, `nom`, `description`, `cout1`, `remise`, `slug`, `created_at`) VALUES
(15, 1, 'image1', 'Poétique du récit', 'Sous ses formes presque infinies, le récit est présent dans tous les temps, dans tous les lieux, dans toutes les sociétés ; le récit commence avec l\'histoire même de l\'humanité ; il n\'y a pas, il n\'y a jamais eu nulle part aucun peuple sans récit ; toutes les classes, tous les groupes humains ont leurs récits, et bien souvent ces récits sont goûtés en commun, par des hommes de culture différente, voire opposée : le récit se moque de la bonne et de la mauvaise littérature : international, transhistorique, transculturel, le récit est là, comme la vie. Les spécialistes de plusieurs pays (France, Etats-Unis, Allemagne) se trouvent réunis ici autour d\'une problématique commune : récit, narrateur, narration, personnage.', 600, 20, '3', '2019-05-01 22:44:18'),
(16, 1, 'image2', 'Le veilleur du Britannia', 'Je suis mort sans papiers, renversé par un bus de la ligne 95. On a pu m\'identifier grâce aux recherches de la patronne du Britannia, Marie-Anne Piéton, étonnée de ne pas me voir apparaître dans le hall de réception, à dix-neuf heures tapantes, comme toujours depuis huit ans. Quand elle s\'est présentée à l\'institut, on m\'avait nettoyé la face et remodelé un peu le crâne. Elle fut catégorique : il s\'agissait bien de son veilleur de nuit, un homme sur qui elle avait toujours pu compter.', 700, 25, '3', '2019-05-01 22:45:19'),
(17, 2, 'image3', 'Légendes et sortilèges', 'Toi qui liras ces pages, prends conscience du pouvoir que tu tiens dans tes mains.  Ce recueil est un grimoire. La magie qui le parcourt ressuscite les légendes enfouies au plus profond des mémoires. Trouble les règles de l’éternel combat du Bien contre le Mal. Donne naissance à des êtres qui n’existent pas encore.  Toi qui liras ces pages, prends conscience du pouvoir que tu tiens dans tes mains.  C’est le Temps que tu t’apprêtes à libérer.', 400, 27, '3', '2019-05-01 22:47:53'),
(18, 2, 'image4', 'Histoires courtes pour s\'endormir', 'Un nouveau recueil d’histoires superbement illustrées, parfaites pour être lues aux jeunes enfants à la fin d’une journée bien remplie. · Onze histoires tendres mettant en scène des animaux drôles et attachants. · Un tigre qui a peur de nager, une souris qui cherche où se cache le bonheur de son ami le blaireau, un chien qui envoie des messages au mystérieux propriétaire d’un ballon jaune…', 11, 10, '3', '2019-05-01 22:50:36'),
(19, 2, 'image5', 'La chambre des officiers', '1914. Tous sourit à Adrien, ingénieur officier. La guerre éclate et lors d\'une reconnaissance sur les bords de la Meuse, un éclat d\'obus le défigure. Le voilà devenu une « gueule cassée ». Adrien ne connaîtra pas les tranchées mais le Val-de-Grâce, dans une chambre réservée aux officiers. Une pièce sans miroir, où l\'on ne se voit que dans le regard des autres. Adrien y restera cinq ans. Cinq ans pour penser à l\'après, pour penser à Clémence qui l\'a connu avec sa gueule d\'ange.', 566, 20, '3', '2019-05-01 23:01:34'),
(20, 3, 'image6', 'Sciences exactes et sciences de l\'homme', 'Sciences exactes et sciences de l\'homme', 12, 20, '3', '2019-05-01 23:18:42'),
(21, 3, 'image7', 'Sciences exactes? Les limites de la science', 'Physicien de formation, François Bastien a enseigné dans de nombreux domaines : mathématiques, électricité, optique, thermodynamique, physique des vibrations, physique des capteurs, acoustique des solides, informatique, électronique numérique et électrotechnique. Il a tenu un blog où se sont regroupées certaines interrogations sur les sciences exactes. Son livre présente donc des réflexions sur la recherche scientifique. Un changement d’échelle de la communauté scientifique entraîne nécessairement un bouleversement. L’auteur tend à sortir de la doctrine « hors de l’école point de salut » qui freine la promotion sociale, en proposant par exemple un Musée de la Science inconnue. Il invite également à lutter contre les effets de la multiplication des publications scientifiques, en faisant naître des journaux de critiques scientifiques comme il en existe pour la littérature. Par ailleurs, la prise en compte des limites de la science, d’un point de vue philosophique et pratique, est discutée.', 400, 20, '3', '2019-05-01 23:19:33');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numtel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkfb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linktw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkins` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresseemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedenaissance` datetime NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_old`
--

CREATE TABLE `user_old` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numtel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkfb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linktw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkins` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresseemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedenaissance` datetime NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AC634F995A4D078A` (`id_categori_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_old`
--
ALTER TABLE `user_old`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acheter`
--
ALTER TABLE `acheter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_old`
--
ALTER TABLE `user_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_AC634F995A4D078A` FOREIGN KEY (`id_categori_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
