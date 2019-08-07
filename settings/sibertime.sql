-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 08:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybrbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `postUserId` int(11) NOT NULL,
  `postContent` varchar(500) NOT NULL,
  `postDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postUserId`, `postContent`, `postDate`) VALUES
(52, 1, 'Ozgur yazilimin gucune inaniyoruz </br>\r\n\'Pentest Penceresi\' adli konusmasinda sektordeki eleman eksikligine dikkat ceken Siber Time Kurucu Ortagi Murat Sahin, \"Biz firmamizi kurarken sektorun eleman eksikligini de gidermek amaciyla yola ciktik. Mumkun oldugunca stajyer alarak saha calisani yetistiriyoruz.\"...', '2019-08-06 04:48:30'),
(53, 22, 'Alan Mathison Turing, Ingiliz matematikci, bilgisayar bilimcisi ve kriptolog. Bilgisayar biliminin kurucusu sayilir. Gelistirmis oldugu Turing testi ile makinelerin ve bilgisayarlarin dusunme yetisine sahip olup olamayacaklari konusunda bir kriter one surmustur.', '2019-08-06 04:53:57'),
(54, 22, 'Uzun ugraslar sonunda Bombe cihazlari, Nazilerin sifreli mesajlarini desifre ederek Nazi Almanyasi karsisinda cok buyuk bir avantaj saglar ve savasin gidisatini degistirir.', '2019-08-06 04:55:21'),
(55, 22, '\"Bilgisayar Mekanizmasi ve Zeka\" isimli makalesinde yapay zeka konularina deginen Turing, bir makinenin \"akilli\" sayilabilmesi icin gereken standartlari belirleyen bir deney tasarlar.', '2019-08-06 04:55:37'),
(56, 22, 'Turing testi adi verilen bu test, makinenin karsisindaki denegin, gormeden iletisime gectigi seyin makine mi yoksa insan mi oldugunu tahmin etmesi esasina dayanmaktadir.', '2019-08-06 04:55:44'),
(57, 1, 'Post , Neden daha guvenli ? <br>\r\n- Get ile yapilan istekler Onbellege kayit olurken Post ile yapilan istekler kaydedilmez.<br>\r\n- Get ile yapilan istekler Tarayici Gecmisinde kayit olurken Post ile yapilan istekler kaydedilmez.', '2019-08-06 04:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `userNameSurname` varchar(250) NOT NULL,
  `userEmail` varchar(250) NOT NULL,
  `userCity` varchar(250) NOT NULL,
  `userImage` varchar(500) NOT NULL DEFAULT '/img/mustafa-kemal-ataturk.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `userNameSurname`, `userEmail`, `userCity`, `userImage`) VALUES
(1, 'sibertime', 'sibertime', 'SiberTime', 'info[et]sibertime[nokta]com[nokta]tr', 'İstanbul', '/img/index.png'),
(22, 'alanturing', 'alanturing', 'Alan Turing', '-', 'Maida Vale', '/img/turing.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
