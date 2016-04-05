-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 08:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maksim_blog`
--
CREATE DATABASE IF NOT EXISTS `maksim_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `maksim_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
`category_id` smallint(6) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Movies & Shows'),
(2, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `date` datetime NOT NULL,
  `body` text NOT NULL,
  `post_id` smallint(6) NOT NULL,
  `is_approved` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `date`, `body`, `post_id`, `is_approved`) VALUES
(1, 1, '2016-03-09 09:38:38', 'I also like sandwiches', 1, 1),
(2, 2, '2016-03-09 09:38:38', 'These are some good movie suggestions', 2, 1),
(4, 1, '2016-03-15 09:34:19', 'They are great!', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
`link_id` smallint(6) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_id`, `title`, `url`, `description`, `user_id`) VALUES
(1, 'IMDB', 'http://www.imdb.com/', 'A good movie Database', 1),
(2, 'Food Network', 'http://www.foodnetwork.com/', 'A place for recipes', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
`post_id` smallint(6) NOT NULL,
  `title` varchar(120) NOT NULL,
  `date` datetime NOT NULL,
  `body` text NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `allow_comments` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `date`, `body`, `user_id`, `category_id`, `is_published`, `allow_comments`) VALUES
(1, 'Cupcakes', '2016-03-09 09:31:41', 'Cheesecake gummies pie I love pastry chocolate marzipan chocolate bar I love. Cake jelly muffin brownie donut ice cream marshmallow gummies. Croissant muffin biscuit marzipan I love chocolate danish. Apple pie jelly-o jujubes gummies toffee. Marzipan halvah donut lollipop marshmallow sweet roll. Cake croissant tiramisu souffl&#233; gummi bears halvah chupa chups fruitcake fruitcake. Jelly cake gummies souffl&#233; cheesecake fruitcake cotton candy chocolate. Lollipop tootsie roll macaroon cookie chocolate I love. Fruitcake liquorice toffee halvah. Cake wafer I love cupcake marshmallow. Oat cake jelly beans jelly-o. Marzipan cake drag&#233;e chocolate. Brownie candy sesame snaps dessert I love liquorice. Gummies cupcake halvah.\r\n<br>\r\n<br>\r\nI love souffl&#233; I love. Drag&#233;e pastry jujubes jujubes sesame snaps. Lemon drops cookie sesame snaps sweet roll brownie. Halvah fruitcake liquorice apple pie wafer donut halvah bear claw gummies. Pie gummi bears cake cheesecake jelly cookie. Tart bear claw danish gingerbread muffin drag&#233;e cake lemon drops. Chocolate bar I love cupcake I love gummies. Muffin icing pastry I love danish jujubes lemon drops chocolate bar. I love cupcake I love wafer biscuit carrot cake lemon drops cotton candy I love. Wafer sweet roll wafer gummies chupa chups cookie sesame snaps. Croissant drag&#233;e halvah danish. Icing jelly candy I love tiramisu pie oat cake chocolate cake sugar plum.', 2, 2, 1, 1),
(2, 'Jim Carrey vs Clint Eastwood', '2016-03-09 09:31:41', 'Man''s gotta know his limitations. This is my gun, Clyde! Your entrance was good, his was better. Look ma i''m road kill It''s because i''m green isn''t it! Are you feeling lucky punk Brain freeze. Well, do you have anything to say for yourself? What you have to ask yourself is, do I feel lucky. Well do ya'' punk? Excuse me, I''d like to ASS you a few questions. Alrighty Then It''s because i''m green isn''t it!\r\n<br>\r\n<br>\r\nLook ma i''m road kill Excuse me, I''d like to ASS you a few questions. You want a guarantee, buy a toaster. You want a guarantee, buy a toaster. Man''s gotta know his limitations. Good Morning, oh in case I don''t see you, good afternoon, good evening and goodnight. What you have to ask yourself is, do I feel lucky. Well do ya'' punk? don''t p!ss down my back and tell me it''s raining. This is the AK-47 assault rifle, the preferred weapon of your enemy; and it makes a distinctive sound when fired at you, so remember it. Alrighty Then This is the AK-47 assault rifle, the preferred weapon of your enemy; and it makes a distinctive sound when fired at you, so remember it. Dyin'' ain''t much of a livin'', boy.\r\n<br>\r\n<br>\r\nAre you feeling lucky punk We''re going for a ride on the information super highway. Look at that, it''s exactly three seconds before I honk your nose and pull your underwear over your head. Good Morning, oh in case I don''t see you, good afternoon, good evening and goodnight. Here. Put that in your report!" AND "I may have found a way out of here. Look at that, it''s exactly three seconds before I honk your nose and pull your underwear over your head. Ever notice how sometimes you come across somebody you shouldn''t have F**ked with? Well, I''m that guy. I just heard about evans new position,good luck to you evan backstabber, bastard, i mean baxter. Your entrance was good, his was better. When a naked man''s chasing a woman through an alley with a butcher knife and a hard-on, I figure he''s not out collecting for the Red Cross. You see, in this world there''s two kinds of people, my friend: Those with loaded guns and those who dig. You dig. You see, in this world there''s two kinds of people, my friend: Those with loaded guns and those who dig. You dig. ', 1, 1, 1, 1),
(3, 'Johnny Depp', '2016-03-10 09:38:08', 'A drug person can learn to cope with things like seeing their dead grandmother crawling up their leg with a knife in her teeth. But no one should be asked to handle this trip. Do you like my meadow? Try some of my grass! Please have a blade, please do, it''s so delectable and so darn good looking! Well, then, I confess, it is my intention to commandeer one of these ships, pick up a crew in Tortuga, raid, pillage, plunder and otherwise pilfer my weasely black guts out. Giddy-up... no, no this way... good horsey. Do you like my meadow? Try some of my grass! Please have a blade, please do, it''s so delectable and so darn good looking! Holy Jesus. What are these goddamn animals? We are very much alike, you and I, I and you... us. Do you like my meadow? Try some of my grass! Please have a blade, please do, it''s so delectable and so darn good looking! Forget about it" is, like, if you agree with someone, you know, like "Raquel Welch is one great piece of ass. Forget about it!" But then, if you disagree, like "A Lincoln is better than a Cadillac? Forget about it!" You know? But then, it''s also like if something''s the greatest thing in the world, like, "Minghia! Those peppers! Forget about it!" A drug person can learn to cope with things like seeing their dead grandmother crawling up their leg with a knife in her teeth. But no one should be asked to handle this trip. What? No. We can''t stop here. This is bat country. Well, then, I confess, it is my intention to commandeer one of these ships, pick up a crew in Tortuga, raid, pillage, plunder and otherwise pilfer my weasely black guts out.\r\n<br>\r\n<br>\r\nWe had two bags of grass, seventy-five pellets of mescaline, five sheets of high-powered blotter acid, a saltshaker half-full of cocaine, and a whole galaxy of multi-colored uppers, downers, screamers, laughers... Well, then, I confess, it is my intention to commandeer one of these ships, pick up a crew in Tortuga, raid, pillage, plunder and otherwise pilfer my weasely black guts out. We had two bags of grass, seventy-five pellets of mescaline, five sheets of high-powered blotter acid, a saltshaker half-full of cocaine, and a whole galaxy of multi-colored uppers, downers, screamers, laughers... Giddy-up... no, no this way... good horsey. A drug person can learn to cope with things like seeing their dead grandmother crawling up their leg with a knife in her teeth. But no one should be asked to handle this trip. Me? I''m dishonest, and a dishonest man you can always trust to be dishonest. Honestly. It''s the honest ones you want to watch out for, because you can never predict when they''re going to do something incredibly... stupid. What? No. We can''t stop here. This is bat country. What? No. We can''t stop here. This is bat country. Me? I''m dishonest, and a dishonest man you can always trust to be dishonest. Honestly. It''s the honest ones you want to watch out for, because you can never predict when they''re going to do something incredibly... stupid. Well, then, I confess, it is my intention to commandeer one of these ships, pick up a crew in Tortuga, raid, pillage, plunder and otherwise pilfer my weasely black guts out. Giddy-up... no, no this way... good horsey. Me? I''m dishonest, and a dishonest man you can always trust to be dishonest. Honestly. It''s the honest ones you want to watch out for, because you can never predict when they''re going to do something incredibly... stupid.\r\n<br>\r\n<br>\r\nWe''re not sheep! Holy Jesus. What are these goddamn animals? Forget about it" is, like, if you agree with someone, you know, like "Raquel Welch is one great piece of ass. Forget about it!" But then, if you disagree, like "A Lincoln is better than a Cadillac? Forget about it!" You know? But then, it''s also like if something''s the greatest thing in the world, like, "Minghia! Those peppers! Forget about it!" We are very much alike, you and I, I and you... us. Do you like my meadow? Try some of my grass! Please have a blade, please do, it''s so delectable and so darn good looking! Forget about it" is, like, if you agree with someone, you know, like "Raquel Welch is one great piece of ass. Forget about it!" But then, if you disagree, like "A Lincoln is better than a Cadillac? Forget about it!" You know? But then, it''s also like if something''s the greatest thing in the world, like, "Minghia! Those peppers! Forget about it!" We''re not sheep! We''re not sheep! We are very much alike, you and I, I and you... us. We are very much alike, you and I, I and you... us. We had two bags of grass, seventy-five pellets of mescaline, five sheets of high-powered blotter acid, a saltshaker half-full of cocaine, and a whole galaxy of multi-colored uppers, downers, screamers, laughers... What? No. We can''t stop here. This is bat country.\r\n<br>\r\n<br>\r\nHoly Jesus. What are these goddamn animals? A drug person can learn to cope with things like seeing their dead grandmother crawling up their leg with a knife in her teeth. But no one should be asked to handle this trip. Forget about it" is, like, if you agree with someone, you know, like "Raquel Welch is one great piece of ass. Forget about it!" But then, if you disagree, like "A Lincoln is better than a Cadillac? Forget about it!" You know? But then, it''s also like if something''s the greatest thing in the world, like, "Minghia! Those peppers! Forget about it!" Giddy-up... no, no this way... good horsey. We''re not sheep! We had two bags of grass, seventy-five pellets of mescaline, five sheets of high-powered blotter acid, a saltshaker half-full of cocaine, and a whole galaxy of multi-colored uppers, downers, screamers, laughers... Me? I''m dishonest, and a dishonest man you can always trust to be dishonest. Honestly. It''s the honest ones you want to watch out for, because you can never predict when they''re going to do something incredibly... stupid. Holy Jesus. What are these goddamn animals? ', 1, 1, 1, 1),
(4, 'test post', '2016-03-30 09:33:08', 'testing1234', 1, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `userpic` varchar(40) NOT NULL,
  `date_joined` datetime NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `secret_key` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `bio`, `userpic`, `date_joined`, `is_admin`, `secret_key`) VALUES
(1, 'Maksim', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'mbelenkov1227@gmail.com', 'Le Bio', '4199481771c610a06f67b9d6c37fd1aee025b896', '2016-03-09 09:26:31', 1, '414af5aae19243055ef962ec5a81e4d8a5728809'),
(2, 'Random User', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'random@mail.com', 'Le Random User Bio', '', '2016-03-09 09:26:31', 0, 'eb6069a22f47ab4c0f0e06719ecc281b39947441'),
(4, 'Bob', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bob@mail.com', '', '804ac490942766ac0f12322b31ccd5db31a2153e', '2016-03-22 09:23:29', 0, '021a17daad1e719d1812eea4f39f4a8e2b5efbbd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
 ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `category_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
MODIFY `link_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `post_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
