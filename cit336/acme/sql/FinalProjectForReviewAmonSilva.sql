-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Dez-2018 às 03:25
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Category classifications of inventory items';

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Cannon'),
(2, 'Explosive'),
(3, 'Misc'),
(4, 'Rocket'),
(5, 'Trap');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comments`) VALUES
(1, 'Amon', 'Silva', 'amon.bernardo@hotmail.com', '$2y$10$HaS3nSTt82Nc2yt/gf74qeuczvvyl/Q8NpIYDA2NapB2voTVF6RYW', '1', ''),
(2, 'Admin', 'User', 'admin@cit336.net', '$2y$10$a.Tv.Lypja/0CQhcaaRFruiEgD1DqVXjtjmYfv9/KKTUk1CCc1CiG', '3', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `ImgId` int(10) UNSIGNED NOT NULL,
  `InvId` int(10) UNSIGNED NOT NULL,
  `ImgName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ImgPath` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ImgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `images`
--

INSERT INTO `images` (`ImgId`, `InvId`, `ImgName`, `ImgPath`, `ImgDate`) VALUES
(27, 8, 'anvil.png', '/acme/images/products/anvil.png', '2018-11-28 16:57:13'),
(28, 8, 'anvil-tn.png', '/acme/images/products/anvil-tn.png', '2018-11-28 16:57:13'),
(29, 3, 'catapult.png', '/acme/images/products/catapult.png', '2018-11-28 16:57:24'),
(30, 3, 'catapult-tn.png', '/acme/images/products/catapult-tn.png', '2018-11-28 16:57:24'),
(31, 14, 'helmet.png', '/acme/images/products/helmet.png', '2018-11-28 17:08:01'),
(32, 14, 'helmet-tn.png', '/acme/images/products/helmet-tn.png', '2018-11-28 17:08:01'),
(33, 4, 'roadrunner.jpg', '/acme/images/products/roadrunner.jpg', '2018-11-28 17:08:28'),
(34, 4, 'roadrunner-tn.jpg', '/acme/images/products/roadrunner-tn.jpg', '2018-11-28 17:08:28'),
(35, 5, 'trap.jpg', '/acme/images/products/trap.jpg', '2018-11-28 17:08:50'),
(36, 5, 'trap-tn.jpg', '/acme/images/products/trap-tn.jpg', '2018-11-28 17:08:51'),
(37, 13, 'piano.jpg', '/acme/images/products/piano.jpg', '2018-11-28 17:09:25'),
(38, 13, 'piano-tn.jpg', '/acme/images/products/piano-tn.jpg', '2018-11-28 17:09:25'),
(39, 6, 'hole.png', '/acme/images/products/hole.png', '2018-11-28 17:09:49'),
(40, 6, 'hole-tn.png', '/acme/images/products/hole-tn.png', '2018-11-28 17:09:49'),
(41, 7, 'no-image.png', '/acme/images/products/no-image.png', '2018-11-28 17:10:08'),
(42, 7, 'no-image-tn.png', '/acme/images/products/no-image-tn.png', '2018-11-28 17:10:08'),
(43, 10, 'mallet.png', '/acme/images/products/mallet.png', '2018-11-28 17:10:29'),
(44, 10, 'mallet-tn.png', '/acme/images/products/mallet-tn.png', '2018-11-28 17:10:29'),
(45, 9, 'rubberband.jpg', '/acme/images/products/rubberband.jpg', '2018-11-28 17:11:13'),
(46, 9, 'rubberband-tn.jpg', '/acme/images/products/rubberband-tn.jpg', '2018-11-28 17:11:13'),
(47, 2, 'mortar.jpg', '/acme/images/products/mortar.jpg', '2018-11-28 17:11:26'),
(48, 2, 'mortar-tn.jpg', '/acme/images/products/mortar-tn.jpg', '2018-11-28 17:11:26'),
(49, 15, 'rope.jpg', '/acme/images/products/rope.jpg', '2018-11-28 17:11:44'),
(50, 15, 'rope-tn.jpg', '/acme/images/products/rope-tn.jpg', '2018-11-28 17:11:44'),
(51, 12, 'seed.jpg', '/acme/images/products/seed.jpg', '2018-11-28 17:12:18'),
(52, 12, 'seed-tn.jpg', '/acme/images/products/seed-tn.jpg', '2018-11-28 17:12:18'),
(53, 1, 'rocket.png', '/acme/images/products/rocket.png', '2018-11-28 17:12:34'),
(54, 1, 'rocket-tn.png', '/acme/images/products/rocket-tn.png', '2018-11-28 17:12:34'),
(55, 17, 'bomb.png', '/acme/images/products/bomb.png', '2018-11-28 17:12:49'),
(56, 17, 'bomb-tn.png', '/acme/images/products/bomb-tn.png', '2018-11-28 17:12:49'),
(57, 16, 'fence.png', '/acme/images/products/fence.png', '2018-11-28 17:13:09'),
(58, 16, 'fence-tn.png', '/acme/images/products/fence-tn.png', '2018-11-28 17:13:09'),
(59, 11, 'tnt.png', '/acme/images/products/tnt.png', '2018-11-28 17:13:21'),
(60, 11, 'tnt-tn.png', '/acme/images/products/tnt-tn.png', '2018-11-28 17:13:21'),
(61, 21, 'movie.jpg', '/acme/images/products/movie.jpg', '2018-11-28 17:33:48'),
(62, 21, 'movie-tn.jpg', '/acme/images/products/movie-tn.jpg', '2018-11-28 17:33:48'),
(63, 21, 'BB Gun - Young Man ActivityV2.jpg', '/acme/images/products/BB Gun - Young Man ActivityV2.jpg', '2018-11-28 20:19:58'),
(64, 21, 'BB Gun - Young Man ActivityV2-tn.jpg', '/acme/images/products/BB Gun - Young Man ActivityV2-tn.jpg', '2018-11-28 20:19:58'),
(67, 8, 'pexels-photo-669277.jpeg', '/acme/images/products/pexels-photo-669277.jpeg', '2018-11-28 20:26:18'),
(68, 8, 'pexels-photo-669277-tn.jpeg', '/acme/images/products/pexels-photo-669277-tn.jpeg', '2018-11-28 20:26:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invName` varchar(50) NOT NULL DEFAULT '',
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL DEFAULT '',
  `invThumbnail` varchar(50) NOT NULL DEFAULT '',
  `invPrice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invStock` smallint(6) NOT NULL DEFAULT '0',
  `invSize` smallint(6) NOT NULL DEFAULT '0',
  `invWeight` smallint(6) NOT NULL DEFAULT '0',
  `invLocation` varchar(35) NOT NULL DEFAULT '',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `invVendor` varchar(20) NOT NULL DEFAULT '',
  `invStyle` varchar(20) NOT NULL DEFAULT '',
  `invFeatured` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Acme Inc. Inventory Table';

--
-- Extraindo dados da tabela `inventory`
--

INSERT INTO `inventory` (`invId`, `invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`, `invFeatured`) VALUES
(1, 'Rocket', 'Rocket for multiple purposes. This can be launched independently to deliver a payload or strapped on to help get you to where you want to be FAST!!! Really Fast!', '/acme/images/products/rocket.png', '/acme/images/products/rocket-tn.png', '1320.00', 5, 60, 90, 'California', 4, 'Goddard', 'metal', NULL),
(2, 'Mortar', 'Our Mortar is very powerful. This cannon can launch a projectile or bomb 3 miles. Made of solid steel and mounted on cement or metal stands [not included].', '/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '1500.00', 26, 250, 750, 'San Jose', 1, 'Smith & Wesson', 'Metal', NULL),
(3, 'Catapult', 'Our best wooden catapult. Ideal for hurling objects for up to 1000 yards. Payloads of up to 300 lbs.', '/acme/images/products/catapult.png', '/acme/images/products/catapult-tn.png', '2500.00', 4, 1569, 400, 'Cedar Point, IO', 1, 'Wooden Creations', 'Wood', NULL),
(4, 'Female RoadRunner Cutout', 'This carbon fiber backed cutout of a female roadrunner is sure to catch the eye of any male roadrunner.', '/acme/images/products/roadrunner.jpg', '/acme/images/products/roadrunner-tn.jpg', '20.00', 500, 27, 2, 'San Jose', 5, 'Picture Perfect', 'Carbon Fiber', NULL),
(5, 'Giant Mouse Trap', 'Our big mouse trap. This trap is multifunctional. It can be used to catch dogs, mountain lions, road runners or even muskrats. Must be staked for larger varmints [stakes not included] and baited with approptiate bait [sold seperately].\r\n', '/acme/images/products/trap.jpg', '/acme/images/products/trap-tn.jpg', '20.00', 34, 470, 28, 'Cedar Point, IO', 5, 'Rodent Control', 'Wood', NULL),
(6, 'Instant Hole', 'Instant hole - Wonderful for creating the appearance of openings.', '/acme/images/products/hole.png', '/acme/images/products/hole-tn.png', '25.00', 269, 24, 2, 'San Jose', 3, 'Hidden Valley', 'Ether', NULL),
(7, 'Koenigsegg CCX', 'This high performance car is sure to get you where you are going fast. It holds the production car land speed record at an amazing 250mph.', '/acme/images/products/no-image.png', '/acme/images/products/no-image.png', '500000.00', 1, 25000, 3000, 'San Jose', 3, 'Koenigsegg', 'Metal', NULL),
(8, 'Anvil', '50 lb. Anvil - perfect for any task requireing lots of weight. Made of solid, tempered steel.', '/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '150.00', 15, 80, 50, 'San Jose', 5, 'Steel Made', 'Metal', 1),
(9, 'Monster Rubber Band', 'These are not tiny rubber bands. These are MONSTERS! These bands can stop a train locamotive or be used as a slingshot for cows. Only the best materials are used!', '/acme/images/products/rubberband.jpg', '/acme/images/products/rubberband-tn.jpg', '4.00', 4589, 75, 1, 'Cedar Point, IO', 3, 'Rubbermaid', 'Rubber', NULL),
(10, 'Mallet', 'Ten pound mallet for bonking roadrunners on the head. Can also be used for bunny rabbits.', '/acme/images/products/mallet.png', '/acme/images/products/mallet-tn.png', '25.00', 100, 36, 10, 'Cedar Point, IA', 3, 'Wooden Creations', 'Wood', NULL),
(11, 'TNT', 'The biggest bang for your buck with our nitro-based TNT. Price is per stick.', '/acme/images/products/tnt.png', '/acme/images/products/tnt-tn.png', '10.00', 1000, 25, 2, 'San Jose', 2, 'Nobel Enterprises', 'Plastic', NULL),
(12, 'Roadrunner Custom Bird Seed Mix', 'Our best varmint seed mix - varmints on two or four legs can\'t resist this mix. Contains meat, nuts, cereals and our own special ingredient. Guaranteed to bring them in. Can be used with our monster trap.', '/acme/images/products/seed.jpg', '/acme/images/products/seed-tn.jpg', '8.00', 150, 24, 3, 'San Jose', 5, 'Acme', 'Plastic', NULL),
(13, 'Grand Piano', 'This grand piano is guaranteed to play well and smash anything beneath it if dropped from a height.', '/acme/images/products/piano.jpg', '/acme/images/products/piano-tn.jpg', '3500.00', 36, 500, 1200, 'Cedar Point, IA', 3, 'Wulitzer', 'Wood', NULL),
(14, 'Crash Helmet', 'This carbon fiber and plastic helmet is the ultimate in protection for your head. comes in assorted colors.', '/acme/images/products/helmet.png', '/acme/images/products/helmet-tn.png', '100.00', 25, 48, 9, 'San Jose', 3, 'Suzuki', 'Carbon Fiber', NULL),
(15, 'Nylon Rope', 'This nylon rope is ideal for all uses. Each rope is the highest quality nylon and comes in 100 foot lengths.', '/acme/images/products/rope.jpg', '/acme/images/products/rope-tn.jpg', '15.00', 200, 200, 6, 'San Jose', 3, 'Marina Sales', 'Nylon', NULL),
(16, 'Sticky Fence', 'This fence is covered with Gorilla Glue and is guaranteed to stick to anything that touches it and is sure to hold it tight.', '/acme/images/products/fence.png', '/acme/images/products/fence-tn.png', '75.00', 15, 48, 2, 'San Jose', 3, 'Acme', 'Nylon', NULL),
(17, 'Small Bomb', 'Bomb with a fuse - A little old fashioned, but highly effective. This bomb has the ability to devistate anything within 30 feet.', '/acme/images/products/bomb.png', '/acme/images/products/bomb-tn.png', '275.00', 58, 30, 12, 'San Jose', 2, 'Nobel Enterprises', 'Metal', NULL),
(21, '.Test Amon', '.Test Amon', '/acme/images/products/movie.jpg', '/acme/images/products/movie-tn.jpg', '0.01', 1, 0, 0, 'Rio de Janeiro', 1, '0123', 'number', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImgId`),
  ADD KEY `InvId` (`InvId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_Image` FOREIGN KEY (`InvId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
