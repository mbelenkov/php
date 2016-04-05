-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 08:44 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maksim_project`
--
CREATE DATABASE IF NOT EXISTS `maksim_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `maksim_project`;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
`genre_id` mediumint(9) NOT NULL,
  `genre_name` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Animation'),
(4, 'Biography'),
(5, 'Comedy'),
(6, 'Crime'),
(7, 'Drama'),
(8, 'Family'),
(9, 'Fantasy'),
(10, 'History'),
(11, 'Horror'),
(12, 'Musical'),
(13, 'Mystery'),
(14, 'Romance'),
(15, 'Sci-Fi'),
(16, 'Sport'),
(17, 'Thriller'),
(18, 'War'),
(19, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
`movie_id` mediumint(9) NOT NULL,
  `title` varchar(50) NOT NULL,
  `release_date` datetime NOT NULL,
  `description` text NOT NULL,
  `critic_rating` tinyint(2) NOT NULL,
  `user_rating` tinyint(2) NOT NULL,
  `moviepic` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `release_date`, `description`, `critic_rating`, `user_rating`, `moviepic`) VALUES
(1, 'test movie', '2016-03-30 00:00:00', 'this is a test movie', 0, 0, ''),
(2, 'The Dark Knight', '2008-07-18 00:00:00', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.', 0, 0, ''),
(3, 'Inception', '2010-07-16 00:00:00', 'A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.', 0, 0, ''),
(4, 'Star Wars: Episode V - The Empire Strikes Back', '1980-06-20 00:00:00', 'After the rebels have been brutally overpowered by the Empire on their newly established base, Luke Skywalker takes advanced Jedi training with Master Yoda, while his friends are pursued by Darth Vader as part of his plan to capture Luke.', 0, 0, ''),
(5, 'The Lord of the Rings: The Two Towers', '2002-12-18 00:00:00', 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron''s new ally, Saruman, and his hordes of Isengard.', 0, 0, ''),
(6, 'The Matrix', '1999-03-31 00:00:00', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 0, 0, ''),
(7, 'Vishwaroopam', '2013-01-25 00:00:00', 'Vishwanathan, a Kathak dance teacher in New York, is in a rather happy marriage with Nirupama who is a nuclear oncologist. She hires a detective to keep a watch on her husband, who apparently ends up in a wrong place that reveals Vishwanathan''s true identity. ', 0, 0, ''),
(8, 'Star Wars: Episode IV - A New Hope', '1977-05-25 00:00:00', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a wookiee and two droids to save the galaxy from the Empire''s world-destroying battle-station, while also attempting to rescue Princess Leia from the evil Darth Vader.', 0, 0, ''),
(9, '1', '2014-01-10 00:00:00', 'A rock star must overcome his psychological inhibitions to seek revenge for his parents'' death.', 0, 0, ''),
(10, 'Baahubali: The Beginning', '2015-07-09 00:00:00', 'In ancient India, an adventurous and daring man becomes involved in a decades old feud between two warring people.', 0, 0, ''),
(11, 'Saving Private Ryan', '2016-04-04 00:00:00', 'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.', 0, 0, ''),
(12, 'The Lord of the Rings: The Return of the King', '2003-12-17 00:00:00', 'Gandalf and Aragorn lead the World of Men against Sauron''s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring. ', 0, 0, ''),
(13, 'The Lord of the Rings: The Fellowship of the Ring', '2001-12-19 00:00:00', 'A meek Hobbit and eight companions set out on a journey to destroy the One Ring and the Dark Lord Sauron.', 0, 0, ''),
(14, 'Interstellar', '2014-11-07 00:00:00', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity''s survival.', 0, 0, ''),
(15, 'Spirited Away', '2003-03-28 00:00:00', 'During her family''s move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.', 0, 0, ''),
(16, 'Raiders of the Lost Ark', '1981-06-12 00:00:00', 'Archaeologist and adventurer Indiana Jones is hired by the US government to find the Ark of the Covenant before the Nazis.', 0, 0, ''),
(17, 'Lion King', '1994-06-24 00:00:00', 'Lion cub and future king Simba searches for his identity. His eagerness to please others and penchant for testing his boundaries sometimes gets him into trouble.', 0, 0, ''),
(18, 'Grave of the Fireflies', '1988-04-16 00:00:00', 'A tragic film covering a young boy and his little sister''s struggle to survive in Japan during World War II.', 0, 0, ''),
(19, 'Princess Mononoke', '1977-07-12 00:00:00', 'On a journey to find the cure for a Tatarigami''s curse, Ashitaka finds himself in the middle of a war between the forest gods and Tatara, a mining colony. In this quest he also meets San, the Mononoke Hime.', 0, 0, ''),
(20, 'WALL-E', '2008-06-27 00:00:00', 'In the distant future, a small waste-collecting robot inadvertently embarks on a space journey that will ultimately decide the fate of mankind.', 0, 0, ''),
(21, 'Zootopia', '2016-03-04 00:00:00', 'In a city of anthropomorphic animals, a rookie bunny cop and a cynical con artist fox must work together to uncover a conspiracy.', 0, 0, ''),
(22, 'Toy Story 3', '2010-06-18 00:00:00', 'The toys are mistakenly delivered to a day-care center instead of the attic right before Andy leaves for college, and it''s up to Woody to convince the other toys that they weren''t abandoned and to return home.', 0, 0, ''),
(23, 'Toy Story', '1995-11-22 00:00:00', 'A cowboy doll is profoundly threatened and jealous when a new spaceman figure supplants him as top toy in a boy''s room.', 0, 0, ''),
(24, 'Inside Out', '2015-06-19 00:00:00', 'After young Riley is uprooted from her Midwest life and moved to San Francisco, her emotions - Joy, Fear, Anger, Disgust and Sadness - conflict on how best to navigate a new city, house, and school.', 0, 0, ''),
(25, 'Up', '2009-05-29 00:00:00', 'Seventy-eight year old Carl Fredricksen travels to Paradise Falls in his home equipped with balloons, inadvertently taking a young stowaway.', 0, 0, ''),
(26, 'Schindler''s List', '1994-02-04 00:00:00', 'In Poland during World War II, Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 0, 0, ''),
(27, 'Goodfellas', '1990-09-21 00:00:00', 'Henry Hill and his friends work their way up through the mob hierarchy.', 0, 0, ''),
(28, 'The Intouchables', '2011-11-02 00:00:00', 'After he becomes a quadriplegic from a paragliding accident, an aristocrat hires a young man from the projects to be his caregiver.', 0, 0, ''),
(29, 'The Pianist', '2003-03-28 00:00:00', 'A Polish Jewish musician struggles to survive the destruction of the Warsaw ghetto of World War II.', 0, 0, ''),
(30, 'Braveheart', '1995-05-24 00:00:00', 'When his secret bride is executed for assaulting an English soldier who tried to rape her, William Wallace begins a revolt against King Edward I of England.', 0, 0, ''),
(31, 'Lawrence of Arabia', '1962-12-11 00:00:00', 'Follows a brilliant, flamboyant and controversial British military figure and his conflicted loyalties during wartime service.', 0, 0, ''),
(32, 'Amadeus', '1985-04-05 00:00:00', 'The incredible story of Wolfgang Amadeus Mozart, told by his peer and secret rival Antonio Salieri - now confined to an insane asylum.', 0, 0, ''),
(33, 'Bhaag Milkha Bhaag', '2013-07-12 00:00:00', 'The truth behind the ascension of Milkha "The Flying Sikh" Singh who was scarred because of the India-Pakistan partition.', 0, 0, ''),
(34, 'Downfall', '2005-04-08 00:00:00', 'Traudl Junge, the final secretary for Adolf Hitler, tells of the Nazi dictator''s final days in his Berlin bunker at the end of WWII.', 0, 0, ''),
(35, 'Raging Bull', '1980-12-19 00:00:00', 'An emotionally self-destructive boxer''s journey through life, as the violence and temper that leads him to the top in the ring, destroys his life outside it.', 0, 0, ''),
(36, 'Andaz Apna Apna', '1994-11-04 00:00:00', 'Two slackers competing for the affections of an heiress, inadvertently become her protectors from an evil criminal.', 0, 0, ''),
(37, 'Life Is Beautiful', '1999-02-12 00:00:00', 'When an open-minded Jewish librarian and his son become victims of the Holocaust, he uses a perfect mixture of will, humor and imagination to protect his son from the dangers around their camp.', 0, 0, ''),
(38, 'City Lights', '1931-03-07 00:00:00', 'With the aid of a wealthy erratic tippler, a dewy-eyed tramp who has fallen in love with a sightless flower girl accumulates money to be able to help her medically.', 0, 0, ''),
(39, 'Hera Pheri', '2000-03-31 00:00:00', 'Three unemployed men find the answer to all their money problems when they recieve a call from a kidnapper.', 0, 0, ''),
(40, 'Modern Times', '1936-02-25 00:00:00', 'The Tramp struggles to live in modern industrial society with the help of a young homeless woman. ', 0, 0, ''),
(41, 'Back to the Future', '1985-07-03 00:00:00', 'A young man is accidentally sent thirty years into the past in a time-traveling DeLorean invented by his friend, Dr. Emmett Brown, and must make sure his high-school-age parents unite in order to save his own existence.', 0, 0, ''),
(42, 'Dr. Strangelove', '1964-01-29 00:00:00', 'An insane general triggers a path to nuclear holocaust that a war room full of politicians and generals frantically try to stop.', 0, 0, ''),
(43, 'The Great Dictator', '1941-03-07 00:00:00', 'Dictator Adenoid Hynkel tries to expand his empire while a poor Jewish barber tries to avoid persecution from Hynkel''s regime.', 0, 0, ''),
(44, 'Sholay', '1975-08-15 00:00:00', 'After his family is murdered by a notorious and ruthless bandit, a former police officer enlists the services of two outlaws to capture him.', 0, 0, ''),
(45, 'The Shawshank Redemption', '1994-10-14 00:00:00', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 0, 0, ''),
(46, 'The Godfather', '1972-03-24 00:00:00', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 0, 0, ''),
(47, 'The Godfather: Part II', '1974-12-20 00:00:00', 'The early life and career of Vito Corleone in 1920s New York is portrayed while his son, Michael, expands and tightens his grip on his crime syndicate stretching from Lake Tahoe, Nevada to pre-revolution 1958 Cuba.', 0, 0, ''),
(48, '12 Angry Men', '1957-04-01 00:00:00', 'A jury holdout attempts to prevent a miscarriage of justice by forcing his colleagues to reconsider the evidence.', 0, 0, ''),
(49, 'Pulp Fiction', '1994-10-14 00:00:00', 'The lives of two mob hit men, a boxer, a gangster''s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 0, 0, ''),
(50, 'City of God', '2004-02-13 00:00:00', 'Two boys growing up in a violent neighborhood of Rio de Janeiro take different paths: one becomes a photographer, the other a drug dealer.', 0, 0, ''),
(51, 'Se7en', '1995-09-22 00:00:00', 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his modus operandi.', 0, 0, ''),
(52, 'Fight Club', '1999-10-15 00:00:00', 'An insomniac office worker, looking for a way to change his life, crosses paths with a devil-may-care soap maker, forming an underground fight club that evolves into something much, much more.', 0, 0, ''),
(53, 'It''s a Wonderful Life', '1947-01-07 00:00:00', 'An angel helps a compassionate but despairingly frustrated businessman by showing what life would have been like if he never existed.', 0, 0, ''),
(54, 'Like Stars on Earth', '2007-12-21 00:00:00', 'An eight-year-old boy is thought to be lazy and a trouble-maker, until the new art teacher has the patience and compassion to discover the real problem behind his struggles in school.', 0, 0, ''),
(55, 'Chakde! India', '2007-08-10 00:00:00', 'A disgraced hockey player coaches the women''s national team to win back his honor and dignity.', 0, 0, ''),
(56, 'The Kid', '1921-02-06 00:00:00', 'The Tramp cares for an abandoned child, but events put that relationship in jeopardy.', 0, 0, ''),
(57, 'The Green Mile', '1999-12-10 00:00:00', 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder and rape, yet who has a mysterious gift.', 0, 0, ''),
(58, 'Rang De Basanti', '2006-01-26 00:00:00', 'The story of six young Indians who assist an English Woman to film a documentary on the extremist freedom fighters from their past, and the events that lead them to relive the long forgotten saga of freedom.', 0, 0, ''),
(59, 'The Great Escape', '1963-07-04 00:00:00', 'Allied P.O.W.s plan for several hundred of their number to escape from a German camp during World War II.', 0, 0, ''),
(60, 'Gone with the Wind', '1940-01-17 00:00:00', 'A manipulative Southern belle carries on a turbulent affair with a blockade runner during the American Civil War.', 0, 0, ''),
(61, 'Spotlight', '2015-11-25 00:00:00', 'The true story of how the Boston Globe uncovered the massive scandal of child molestation and cover-up within the local Catholic Archdiocese, shaking the entire Catholic Church to its core.', 0, 0, ''),
(62, 'Psycho', '1960-09-08 00:00:00', 'A Phoenix secretary steals $40,000 from her employer''s client, goes on the run and checks into a remote motel run by a young man under the domination of his mother.', 0, 0, ''),
(63, 'Alien', '1979-06-22 00:00:00', 'After a space merchant vessel perceives an unknown transmission as distress call, their landing on the source planet finds one of the crew attacked by a mysterious lifeform. Continuing their journey back to Earth with the attacked crew having recovered and the critter deceased, they soon realize that its life cycle has merely begun.', 0, 0, ''),
(64, 'The Shining', '1980-05-23 00:00:00', 'A family heads to an isolated hotel for the winter where an evil and spiritual presence influences the father into violence, while his psychic son sees horrific forebodings from the past and of the future.', 0, 0, ''),
(65, 'Aliens', '1986-07-18 00:00:00', 'The planet from Alien (1979) has been colonized, but contact is lost. This time, the rescue team has impressive firepower, but will it be enough?', 0, 0, ''),
(66, 'The Thing', '1982-06-25 00:00:00', 'It''s the first week of winter in 1982. An American Research Base is greeted by an alien force, that can assimilate anything it touches. It''s up to the members to stay alive, and be sure of who is human, and who has become one of the Things.', 0, 0, ''),
(67, 'Diabolique', '1955-11-21 00:00:00', 'The wife of a cruel headmaster and his mistress conspire to kill him, but after the murder is committed, his body disappears, and strange events begin to plague the two women.', 0, 0, ''),
(68, 'What Ever Happened to Baby Jane?', '1962-10-31 00:00:00', 'A former child star torments her paraplegic sister in their decaying Hollywood mansion.', 0, 0, ''),
(69, 'The Cabinet of Dr. Caligari', '1921-03-19 00:00:00', 'Dr. Caligari''s somnambulist, Cesare, and his deadly predictions.', 0, 0, ''),
(70, 'The Exorcist', '1973-12-26 00:00:00', 'When a teenage girl is possessed by a mysterious entity, her mother seeks the help of two priests to save her daughter.', 0, 0, ''),
(71, 'Nosferatu', '1929-06-03 00:00:00', 'Vampire Count Orlok expresses interest in a new residence and real estate agent Hutter''s wife.', 0, 0, ''),
(72, 'Singin'' in the Rain', '1952-04-11 00:00:00', 'A silent film production company and cast make a difficult transition to sound.', 0, 0, ''),
(73, 'Dilwale Dulhania Le Jayenge', '1995-10-20 00:00:00', 'A young man and woman - both of Indian descent but born and raised in Britain - fall in love during a trip to Switzerland. However, the girl''s traditional father takes her back to India to fulfill a betrothal promise.', 0, 0, ''),
(74, 'Lagaan: Once Upon a Time in India', '2002-05-08 00:00:00', 'The people of a small village in Victorian India stake their future on a game of cricket against their ruthless British rulers.', 0, 0, ''),
(75, 'The Wizard of Oz', '1939-08-25 00:00:00', 'Dorothy Gale is swept away to a magical land in a tornado and embarks on a quest to see the Wizard who can help her return home.', 0, 0, ''),
(76, 'Pink Floyd The Wall', '1982-09-17 00:00:00', 'A confined but troubled rock star descends into madness in the midst of his physical and social isolation from everyone.', 0, 0, ''),
(77, 'Beauty and the Beast', '1991-11-22 00:00:00', 'Belle, whose father is imprisoned by the Beast, offers herself instead, unaware her captor to be an enchanted prince.', 0, 0, ''),
(78, 'The Nightmare Before Christmas', '1993-10-29 00:00:00', 'Jack Skellington, king of Halloween Town, discovers Christmas Town, but doesn''t quite understand the concept.', 0, 0, ''),
(79, 'Duck Soup', '1933-11-17 00:00:00', 'Rufus T. Firefly is named president/dictator of bankrupt Freedonia and declares war on neighboring Sylvania over the love of wealthy Mrs. Teasdale.', 0, 0, ''),
(80, 'Drishyam', '2015-07-31 00:00:00', 'Desperate measures are taken by a man who tries to save his family from the dark side of the law, after they commit an unexpected crime.', 0, 0, ''),
(81, 'The Usual Suspects', '1995-09-15 00:00:00', 'A sole survivor tells of the twisty events leading up to a horrific gun battle on a boat, which begin when five criminals meet at a seemingly random police lineup.', 0, 0, ''),
(82, 'Rear Window', '1954-08-01 00:00:00', 'A wheelchair-bound photographer spies on his neighbours from his apartment window and becomes convinced one of them has committed murder.', 0, 0, ''),
(83, 'Memento', '2001-05-25 00:00:00', 'A man creates a strange system to help him remember things; so he can hunt for the murderer of his wife without his short-term memory loss being an obstacle.', 0, 0, ''),
(84, 'Forrest Gump', '1994-07-06 00:00:00', 'Forrest Gump, while not intelligent, has accidentally been present at many historic moments, but his true love, Jenny Curran, eludes him.', 0, 0, ''),
(85, 'Casablanca', '1943-01-23 00:00:00', 'In Casablanca, Morocco during the early days of World War II, an American expatriate meets a former lover, with unforeseen complications.', 0, 0, ''),
(86, 'Amélie', '2002-02-08 00:00:00', 'Amelie is an innocent and naive girl in Paris with her own sense of justice. She decides to help those around her and, along the way, discovers love. ', 0, 0, ''),
(87, 'Vertigo', '1958-07-21 00:00:00', 'A San Francisco detective suffering from acrophobia investigates the strange activities of an old friend''s wife, all the while becoming dangerously obsessed with her.', 0, 0, ''),
(88, 'Eternal Sunshine of the Spotless Mind', '2004-03-19 00:00:00', 'When their relationship turns sour, a couple undergoes a procedure to have each other erased from their memories. But it is only through the process of loss that they discover what they had to begin with.', 0, 0, ''),
(89, 'Terminator 2: Judgment Day', '1991-07-03 00:00:00', 'A cyborg, identical to the one who failed to kill Sarah Connor, must now protect her young son, John Connor, from a more advanced cyborg, made out of liquid metal.', 0, 0, ''),
(90, 'The Prestige', '2006-10-20 00:00:00', 'Two stage magicians engage in competitive one-upmanship in an attempt to create the ultimate stage illusion.', 0, 0, ''),
(91, 'Warrior', '2011-09-09 00:00:00', 'The youngest son of an alcoholic former boxer returns home, where he''s trained by his father for competition in a mixed martial arts tournament - a path that puts the fighter on a collision course with his estranged, older brother.', 0, 0, ''),
(92, 'Rush', '2013-09-27 00:00:00', 'The merciless 1970s rivalry between Formula One rivals James Hunt and Niki Lauda.', 0, 0, ''),
(93, 'Million Dollar Baby', '2005-01-28 00:00:00', 'A determined woman works with a hardened boxing trainer to become a professional.', 0, 0, ''),
(94, 'Ip Man', '2008-12-12 00:00:00', 'A semi-biographical account of Yip Man, the successful martial arts master who taught the Chinese martial art of Wing Chun to the world.', 0, 0, ''),
(95, 'Rocky', '1976-12-03 00:00:00', 'Rocky Balboa, a small-time boxer, gets a supremely rare chance to fight the heavy-weight champion, Apollo Creed, in a bout in which he strives to go the distance for his self-respect.', 0, 0, ''),
(96, 'The Hustler', '1961-09-25 00:00:00', 'An up-and-coming pool player plays a long-time champion in a single high-stakes match.', 0, 0, ''),
(97, 'The Silence of the Lambs', '1991-02-14 00:00:00', 'A young F.B.I. cadet must confide in an incarcerated and manipulative killer to receive his help on catching another serial killer who skins his victims.', 0, 0, ''),
(98, 'Léon: The Professional', '1994-11-18 00:00:00', 'Mathilda, a 12-year-old girl, is reluctantly taken in by Léon, a professional assassin, after her family is murdered. Léon and Mathilda form an unusual relationship, as she becomes his protégée and learns the assassin''s trade.', 0, 0, ''),
(99, 'The Bandit', '1996-11-29 00:00:00', 'The epic adventures of the legendary Baran the Bandit following his release from prison. After serving 35 years, it is no surprise that the world has changed dramatically.', 0, 0, ''),
(100, 'Apocalypse Now', '1979-08-15 00:00:00', 'During the Vietnam War, Captain Willard is sent on a dangerous mission into Cambodia to assassinate a renegade colonel who has set himself up as a god among a local tribe.', 0, 0, ''),
(101, 'Paths of Glory', '1957-10-25 00:00:00', 'After refusing to attack an enemy position, a general accuses the soldiers of cowardice and their commanding officer must defend them.', 0, 0, ''),
(102, 'Das Boot', '1982-02-10 00:00:00', 'The claustrophobic world of a WWII German U-boat; boredom, filth, and sheer terror.', 0, 0, ''),
(103, 'The Good, the Bad and the Ugly', '1967-12-29 00:00:00', 'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.', 0, 0, ''),
(104, 'Once Upon a Time in the West', '1969-07-04 00:00:00', 'Epic story of a mysterious stranger with a harmonica who joins forces with a notorious desperado to protect a beautiful widow from a ruthless assassin working for the railroad.', 0, 0, ''),
(105, 'Django Unchained', '2012-12-25 00:00:00', 'With the help of a German bounty hunter, a freed slave sets out to rescue his wife from a brutal Mississippi plantation owner.', 0, 0, ''),
(106, 'The Treasure of the Sierra Madre', '1948-01-24 00:00:00', 'Fred Dobbs and Bob Curtin, two Americans searching for work in Mexico, convince an old prospector to help them mine for gold in the Sierra Madre Mountains.', 0, 0, ''),
(107, 'For a Few Dollars More', '1967-05-10 00:00:00', 'Two bounty hunters with the same intentions team up to track down a Western outlaw.', 0, 0, ''),
(108, 'Unforgiven', '1992-08-07 00:00:00', 'Retired Old West gunslinger William Munny reluctantly takes on one last job, with the help of his old partner and a young man.', 0, 0, ''),
(109, 'The Revenant', '2016-01-08 00:00:00', 'A frontiersman on a fur trading expedition in the 1820s fights for survival after being mauled by a bear and left for dead by members of his own hunting team.', 0, 0, ''),
(110, 'Butch Cassidy and the Sundance Kid', '1969-10-24 00:00:00', 'Two Western bank/train robbers flee to Bolivia when the law gets too close.', 0, 0, ''),
(111, 'The Man Who Shot Liberty Valance', '1962-04-22 00:00:00', 'A senator, who became famous for killing a notorious outlaw, returns for the funeral of an old friend and tells the truth about his deed.', 0, 0, ''),
(112, 'High Noon', '1952-07-30 00:00:00', 'A marshall, personally compelled to face a returning deadly enemy, finds that his own town refuses to help him.', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

DROP TABLE IF EXISTS `movie_genres`;
CREATE TABLE IF NOT EXISTS `movie_genres` (
`movie_genres_id` mediumint(9) NOT NULL,
  `movie_id` mediumint(9) NOT NULL,
  `genre_id` mediumint(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=345 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`movie_genres_id`, `movie_id`, `genre_id`) VALUES
(1, 2, 1),
(2, 2, 6),
(3, 2, 7),
(4, 3, 1),
(5, 3, 13),
(6, 3, 15),
(7, 3, 17),
(8, 4, 1),
(9, 4, 2),
(10, 4, 9),
(11, 4, 15),
(12, 5, 1),
(13, 5, 2),
(14, 5, 7),
(15, 5, 9),
(16, 6, 1),
(17, 6, 15),
(18, 7, 1),
(19, 7, 2),
(20, 7, 6),
(21, 7, 13),
(22, 7, 17),
(23, 8, 1),
(24, 8, 2),
(25, 8, 9),
(26, 8, 15),
(27, 9, 1),
(28, 9, 13),
(29, 9, 17),
(30, 10, 1),
(31, 10, 2),
(32, 10, 7),
(33, 10, 9),
(34, 10, 18),
(35, 11, 1),
(36, 11, 7),
(37, 11, 18),
(38, 12, 2),
(39, 12, 7),
(40, 12, 9),
(41, 13, 2),
(42, 13, 7),
(43, 13, 9),
(44, 14, 2),
(45, 14, 7),
(46, 14, 15),
(47, 15, 2),
(48, 15, 3),
(49, 15, 8),
(50, 15, 9),
(51, 16, 1),
(52, 16, 2),
(53, 17, 2),
(54, 17, 3),
(55, 17, 7),
(56, 17, 8),
(57, 17, 12),
(58, 18, 3),
(59, 18, 7),
(60, 18, 18),
(61, 19, 2),
(62, 19, 3),
(63, 19, 9),
(64, 20, 2),
(65, 20, 3),
(66, 20, 8),
(67, 20, 15),
(68, 21, 1),
(69, 21, 2),
(70, 21, 3),
(71, 21, 5),
(72, 21, 6),
(73, 21, 8),
(74, 22, 2),
(75, 22, 3),
(76, 22, 5),
(77, 22, 8),
(78, 22, 9),
(79, 23, 2),
(80, 23, 3),
(81, 23, 5),
(82, 23, 8),
(83, 23, 9),
(84, 24, 2),
(85, 24, 3),
(86, 24, 5),
(87, 24, 7),
(88, 24, 8),
(89, 24, 9),
(90, 25, 2),
(91, 25, 3),
(92, 25, 5),
(93, 25, 8),
(94, 26, 4),
(95, 26, 7),
(96, 26, 10),
(97, 27, 4),
(98, 27, 6),
(99, 27, 7),
(100, 28, 4),
(101, 28, 5),
(102, 28, 7),
(103, 29, 4),
(104, 29, 7),
(105, 29, 18),
(106, 30, 4),
(107, 30, 7),
(108, 30, 10),
(109, 30, 18),
(110, 31, 2),
(111, 31, 4),
(112, 31, 7),
(113, 31, 10),
(114, 31, 18),
(115, 32, 4),
(116, 32, 7),
(117, 32, 10),
(119, 33, 1),
(120, 33, 4),
(121, 33, 7),
(122, 33, 10),
(123, 33, 16),
(124, 34, 4),
(125, 34, 7),
(126, 34, 10),
(127, 34, 18),
(128, 35, 4),
(129, 35, 7),
(130, 35, 16),
(131, 36, 5),
(132, 36, 8),
(133, 36, 14),
(134, 37, 5),
(135, 37, 7),
(136, 37, 14),
(137, 37, 18),
(138, 38, 5),
(139, 38, 7),
(140, 38, 14),
(141, 39, 5),
(142, 39, 6),
(143, 39, 17),
(144, 40, 5),
(145, 40, 7),
(146, 41, 2),
(147, 41, 5),
(148, 41, 15),
(149, 42, 5),
(150, 43, 5),
(151, 43, 7),
(152, 43, 18),
(153, 44, 1),
(154, 44, 2),
(155, 44, 5),
(156, 44, 7),
(157, 44, 12),
(158, 44, 17),
(159, 45, 6),
(160, 45, 7),
(161, 46, 6),
(162, 46, 7),
(163, 47, 6),
(164, 47, 7),
(165, 48, 6),
(166, 48, 7),
(167, 49, 6),
(168, 49, 7),
(169, 50, 6),
(170, 50, 7),
(171, 51, 6),
(172, 51, 7),
(173, 51, 13),
(174, 52, 7),
(175, 53, 7),
(176, 53, 8),
(177, 53, 9),
(178, 53, 14),
(179, 54, 7),
(180, 54, 8),
(181, 55, 7),
(182, 55, 8),
(183, 55, 16),
(184, 56, 5),
(185, 56, 7),
(186, 56, 8),
(187, 57, 6),
(188, 57, 7),
(189, 57, 9),
(190, 58, 5),
(191, 58, 7),
(192, 58, 10),
(193, 59, 2),
(194, 59, 7),
(195, 59, 10),
(196, 60, 7),
(197, 60, 10),
(198, 60, 14),
(199, 61, 4),
(200, 61, 7),
(201, 61, 10),
(202, 62, 11),
(203, 62, 13),
(204, 62, 17),
(205, 63, 11),
(206, 63, 15),
(207, 64, 7),
(208, 64, 11),
(209, 65, 1),
(210, 65, 11),
(211, 65, 15),
(212, 66, 11),
(213, 66, 15),
(214, 67, 7),
(215, 67, 11),
(216, 67, 13),
(217, 67, 17),
(218, 68, 7),
(219, 68, 11),
(220, 68, 17),
(221, 69, 9),
(222, 69, 11),
(223, 69, 13),
(224, 69, 17),
(225, 70, 11),
(226, 71, 9),
(227, 71, 11),
(228, 72, 5),
(229, 72, 12),
(230, 72, 14),
(231, 73, 5),
(232, 73, 7),
(233, 73, 12),
(234, 73, 14),
(235, 74, 5),
(236, 74, 7),
(237, 74, 12),
(238, 74, 14),
(239, 74, 16),
(240, 75, 2),
(241, 75, 8),
(242, 75, 9),
(243, 75, 12),
(244, 76, 3),
(245, 76, 7),
(246, 76, 12),
(247, 77, 3),
(248, 77, 8),
(249, 77, 9),
(250, 77, 12),
(251, 77, 14),
(252, 78, 3),
(253, 78, 8),
(254, 78, 9),
(255, 78, 12),
(256, 79, 5),
(257, 79, 12),
(258, 79, 18),
(259, 80, 7),
(260, 80, 13),
(261, 80, 17),
(262, 81, 6),
(263, 81, 7),
(264, 81, 13),
(265, 82, 13),
(266, 82, 17),
(267, 83, 13),
(268, 83, 17),
(269, 84, 7),
(270, 84, 14),
(271, 85, 7),
(272, 85, 14),
(273, 85, 18),
(274, 86, 5),
(275, 86, 14),
(276, 87, 13),
(277, 87, 14),
(278, 87, 17),
(279, 88, 7),
(280, 88, 14),
(281, 88, 15),
(282, 89, 1),
(283, 89, 15),
(284, 90, 7),
(285, 90, 13),
(286, 90, 15),
(287, 91, 7),
(288, 91, 16),
(289, 92, 1),
(290, 92, 4),
(291, 92, 7),
(292, 92, 16),
(293, 93, 7),
(294, 93, 16),
(295, 94, 1),
(296, 94, 4),
(297, 94, 7),
(298, 94, 16),
(299, 95, 7),
(300, 95, 16),
(301, 96, 7),
(302, 96, 16),
(303, 97, 6),
(304, 97, 7),
(305, 97, 17),
(306, 98, 6),
(307, 98, 7),
(308, 98, 17),
(309, 99, 6),
(310, 99, 7),
(311, 99, 17),
(312, 100, 7),
(313, 100, 18),
(314, 101, 7),
(315, 101, 18),
(316, 102, 2),
(317, 102, 7),
(318, 102, 17),
(319, 102, 18),
(320, 103, 19),
(321, 104, 19),
(322, 105, 7),
(323, 105, 19),
(324, 106, 1),
(325, 106, 2),
(326, 106, 7),
(327, 106, 19),
(328, 107, 19),
(329, 108, 19),
(330, 109, 2),
(331, 109, 7),
(332, 109, 17),
(333, 109, 19),
(334, 110, 4),
(335, 110, 6),
(336, 110, 7),
(337, 110, 19),
(338, 111, 19),
(339, 112, 19),
(340, 1, 2),
(341, 1, 4),
(342, 1, 7),
(343, 1, 13),
(344, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
`review_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `date` datetime NOT NULL,
  `rating` tinyint(2) NOT NULL,
  `body` text NOT NULL,
  `movie_id` mediumint(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `date`, `rating`, `body`, `movie_id`) VALUES
(1, 3, '2016-03-31 11:20:00', 7, 'This was an okay movie.', 1),
(2, 5, '2016-03-31 11:20:00', 5, 'I was genuinely displeased.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`user_id` mediumint(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `bio` text NOT NULL,
  `date_joined` datetime NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_critic` tinyint(1) NOT NULL,
  `userpic` text NOT NULL,
  `secret_key` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `bio`, `date_joined`, `is_admin`, `is_critic`, `userpic`, `secret_key`) VALUES
(1, 'mBelenkov', 'mbelenkov1227@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'first account', '2016-03-30 11:16:15', 1, 1, '', '74a40514b40b031a440c9550b494250459d4ce90'),
(3, 'testAccountRegular', 'you@mail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', '2016-03-31 11:02:23', 0, 0, '', '7d842076e0698bc2d7ff363816ff1682db7fca94'),
(5, 'testAccountCritic', 'you2@mail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', '2016-03-31 11:03:41', 0, 1, '', '03b27bc93e247464854f0d6c27e83b85be0689f7'),
(6, 'melissa', 'you3@mail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', '2016-03-31 11:26:23', 0, 0, '', '1b7cc3b7ad5c2d4e75acc4a95f07b11570a468f4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
 ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
 ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
 ADD PRIMARY KEY (`movie_genres_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
MODIFY `genre_id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
MODIFY `movie_id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
MODIFY `movie_genres_id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=345;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `review_id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
