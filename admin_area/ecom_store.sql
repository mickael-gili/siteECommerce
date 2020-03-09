-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 09 mars 2020 à 08:33
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
-- Base de données :  `ecom_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Homme', 'Une sélection spécial Homme est disponible.'),
(2, 'Femme', 'Une sélection spécial Femme est disponible.'),
(3, 'Enfants', 'Une sélection spécial Enfants est disponible.'),
(4, 'Autre', 'Pour plus idées et astuces rendez-vous ici.');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`) VALUES
(2, 1, 2, '2020-03-09 06:22:21', 'Huile essentielle d eucalyptus', 'eucalyptus.jpg', 'eucalyptus.jpg', 'eucalyptus.jpg', 6, 'eucalyptus', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.'),
(3, 1, 2, '2020-03-09 06:23:54', 'Huile essentielle de lavande fine', 'he_lavande_fine_1.jpg', 'he_lavande_fine_1.jpg', 'he_lavande_fine_1.jpg', 6, 'lavande', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.'),
(4, 2, 1, '2020-03-09 06:25:30', 'Huile essentielle angÃ©lique racines', 'huile-essentielle-angelique-racines-bio.jpg', 'huile-essentielle-angelique-racines-bio.jpg', 'huile-essentielle-angelique-racines-bio.jpg', 7, 'angelique', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.'),
(5, 4, 3, '2020-03-09 06:26:37', 'Huile essentielle arbre Ã  thÃ©', 'huile-essentielle-arbre-a-the-bio.jpg', 'huile-essentielle-arbre-a-the-bio.jpg', 'huile-essentielle-arbre-a-the-bio.jpg', 6, 'arbre Ã  thÃ©', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.'),
(7, 3, 2, '2020-03-09 06:28:50', 'Huile essentielle de katafray cedrelopsis grevei', 'huile-essentielle-de-katafray-cedrelopsis-grevei.jpg', 'huile-essentielle-de-katafray-cedrelopsis-grevei.jpg', 'huile-essentielle-de-katafray-cedrelopsis-grevei.jpg', 7, 'katafray', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.'),
(8, 5, 2, '2020-03-09 06:29:56', 'Huile essentielle menthe poivrÃ©', 'huile-essentielle-de-menthe-poivree-inde-bio.jpg', 'huile-essentielle-de-menthe-poivree-inde-bio.jpg', 'Huile-essentielle-Romarin-ABV-Phytosun-Aroms-flacon-de-5.jpg', 7, 'menthe', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.'),
(9, 2, 3, '2020-03-09 07:15:08', 'Huile essentielle de Romarin', 'Huile-essentielle-Romarin-ABV-Phytosun-Aroms-flacon-de-5.jpg', 'Huile-essentielle-Romarin-ABV-Phytosun-Aroms-flacon-de-5.jpg', 'Huile-essentielle-Romarin-ABV-Phytosun-Aroms-flacon-de-5.jpg', 7, 'romarin', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.'),
(10, 5, 3, '2020-03-09 07:22:01', 'Huile essentielle Bio de Citron', 'huile-essentielle-citron.jpg', 'huile-essentielle-citron.jpg', 'huile-essentielle-citron.jpg', 5, 'citron', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.');

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Soin du visage', 'Notre soin du visage est un soin du corps destiné à préserver la propreté du visage (nettoyage par un pain dermatologique, un lait de toilette ou une émulsion nettoyante, gommage), à l embellir (maquillage, épilation), le raffermir (tonique, massage), le tonifier ou le régénérer (masque, peeling).\r\n\r\n'),
(2, 'Soin du corps', 'Nous proposons des soins du corps qui sont pratiqués partout dans le monde, et ce depuis des millénaires. Les massages sont l une des formes de soins du corps les plus anciennes. Leurs origines remonteraient à plus de 6000 ans. '),
(3, 'Soin des levres', 'Comme le reste du visage et du corps, les lèvres doivent être choyées tout au long de l année. Et cette remarque vaut encore plus quand arrive la saison hivernale qui peut rapidement malmener les zones et les peaux sensibles. Les coupables ? Les changements de température, l humidité, le vent et l air froid qui déshydratent l épiderme et la rend plus vulnérable. Alors, pour éviter de mettre à mal votre beau sourire et de souffrir de gerçures ou de peaux mortes disgracieuses, il est primordial de mettre en place une routine de soins adaptée.'),
(4, 'Soin des pieds', 'Nos pieds en voient de toutes les couleurs ! Dans des hauts talons ou des baskets, sur les pavés citadins ou sur les galets des plages, ils endurent les chocs les plus durs... Alors, la moindre des choses est d\'en prendre soin ! De beaux pieds nus dans une sandale ultra chic, c est tellement plus glamour !'),
(5, 'Soin des cheveux', 'Les masques sont de formidables restructurant de la fibre capillaire. Ils nourrissent et fortifient en profondeur les cheveux les plus fragiles. Résultat : des cheveux plus souples et faciles à coiffer. Tout cela est rendu possible grâce aux actifs qu ils contiennent et qui colmatent les brèches de la fibre capillaire tout en gainant la cuticule.');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide number 1', 'slide-1.jpg'),
(2, 'Slide number 2', 'slide-2.jpg'),
(3, 'Slide number 3', 'slide-3.jpg'),
(5, 'Slide number 4', 'slide-5.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
