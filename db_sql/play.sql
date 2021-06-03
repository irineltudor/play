-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 02, 2021 la 03:03 PM
-- Versiune server: 10.4.17-MariaDB
-- Versiune PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `play`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rating_no` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `pegi_age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `game`
--

INSERT INTO `game` (`id`, `title`, `url`, `category`, `rating_no`, `rating`, `pegi_age`) VALUES
(3, 'Counter-Strike: Global Offensive', 'https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/', 'FPS', NULL, NULL, 0),
(4, 'Apex Legends™', 'https://store.steampowered.com/app/1172470/Apex_Legends/', 'FreetoPlay', NULL, NULL, 16),
(7, 'Left 4 Dead 2', 'https://store.steampowered.com/app/550/Left_4_Dead_2/', 'Zombies', NULL, NULL, 0),
(9, 'Valheim', 'https://store.steampowered.com/app/892970/Valheim/', 'OpenWorldSurvivalCraft', 1, 5, 0),
(10, 'Terraria', 'https://store.steampowered.com/app/105600/Terraria/', 'OpenWorldSurvivalCraft', NULL, NULL, 0),
(11, 'Raft', 'https://store.steampowered.com/app/648800/Raft/', 'Survival', NULL, NULL, 0),
(12, 'ARK: Survival Evolved', 'https://store.steampowered.com/app/346110/ARK_Survival_Evolved/', 'OpenWorldSurvivalCraft', NULL, NULL, 16);

--
-- Declanșatori `game`
--
DELIMITER $$
CREATE TRIGGER `eraseBeforeGame` BEFORE DELETE ON `game` FOR EACH ROW BEGIN
DELETE FROM tournaments WHERE game_id = OLD.id;
DELETE FROM user_game WHERE game_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `review`
--

CREATE TABLE `review` (
  `id` int(200) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `review`
--

INSERT INTO `review` (`id`, `game_id`, `user_id`, `rating`, `comment`) VALUES
(14, 9, 2, 5, 'I love this Game!');

--
-- Declanșatori `review`
--
DELIMITER $$
CREATE TRIGGER `updateRatingGame` AFTER DELETE ON `review` FOR EACH ROW BEGIN
DECLARE value1 int(11);
DECLARE value2 int(11);
SELECT rating_no , rating into value2,value1 FROM game WHERE id=OLD.game_id;
SET value1 = (value1*value2 - OLD.rating)/(value2 - 1);
SET value2 = value2 - 1;
UPDATE game SET game.rating_no = value2, game.rating = value1 WHERE id=OLD.game_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Declanșatori `tournaments`
--
DELIMITER $$
CREATE TRIGGER `eraseBeforeTournament` BEFORE DELETE ON `tournaments` FOR EACH ROW BEGIN
DELETE FROM user_tournament WHERE tournament_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `emailaddress`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 1),
(2, 'test', 'test', 'test', 'test', 'test@gmail.com', 0);

--
-- Declanșatori `user`
--
DELIMITER $$
CREATE TRIGGER `eraseBeforeUser` BEFORE DELETE ON `user` FOR EACH ROW BEGIN
DELETE FROM user_tournament WHERE user_id = OLD.id;
 DELETE FROM user_game WHERE user_id = OLD.id;
DELETE FROM review WHERE user_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_game`
--

CREATE TABLE `user_game` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `user_game`
--

INSERT INTO `user_game` (`id`, `user_id`, `game_id`) VALUES
(12, 2, 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_tournament`
--

CREATE TABLE `user_tournament` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `user_team_name` varchar(255) NOT NULL,
  `user_ign` varchar(255) NOT NULL,
  `user_rank` varchar(255) NOT NULL,
  `user_phone_number` varchar(255) NOT NULL,
  `score` int(101) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexuri pentru tabele `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `emailaddress` (`emailaddress`);

--
-- Indexuri pentru tabele `user_game`
--
ALTER TABLE `user_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_game_user_id` (`user_id`),
  ADD KEY `fk_user_game_game_id` (`game_id`);

--
-- Indexuri pentru tabele `user_tournament`
--
ALTER TABLE `user_tournament`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `review`
--
ALTER TABLE `review`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `user_game`
--
ALTER TABLE `user_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `user_tournament`
--
ALTER TABLE `user_tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constrângeri pentru tabele `user_game`
--
ALTER TABLE `user_game`
  ADD CONSTRAINT `fk_user_game_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `fk_user_game_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
