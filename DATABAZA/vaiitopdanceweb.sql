-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 21.Jan 2026, 23:09
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `vaiitopdanceweb`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `oznamy`
--

CREATE TABLE `oznamy` (
  `id` int(11) NOT NULL,
  `nadpis` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `cas` varchar(50) DEFAULT NULL,
  `kde` varchar(255) DEFAULT NULL,
  `kolko` varchar(255) DEFAULT NULL,
  `popis` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `TypOznamu` enum('HO','TM1','TM2','POK','ZAC') NOT NULL DEFAULT 'HO',
  `foto_path` varchar(255) DEFAULT NULL,
  `autor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `oznamy`
--

INSERT INTO `oznamy` (`id`, `nadpis`, `datum`, `cas`, `kde`, `kolko`, `popis`, `created_at`, `TypOznamu`, `foto_path`, `autor_id`) VALUES
(24, 'qqqqqq', '2026-01-31', 'qqqqqqqqq', 'qqqqqq', 'qqqqqq', 'asdsdfgdfgghgjhhhhhhhhhhhhhhhhhhhhhhhhhhsdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfdsdfgdfgsdasdsdfgdfgsdasdsfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsdasdsdfgdfgsd\r\n', '2026-01-21 12:05:23', 'HO', 'uploads/oznamy/oznam_6970c103eb8520.56507754.jpg', 8),
(25, 'jojo', '2006-06-30', '555', '5555', '555', '5555555', '2026-01-21 15:17:21', 'HO', 'uploads/oznamy/oznam_6970ee011642b8.39692861.jpg', 9),
(26, 'aaaaa', '2026-01-11', 'sdfs', 'dfsd', '', 'sdfsdfsdsdfsdfsdfsdf', '2026-01-21 15:37:57', 'TM1', 'uploads/oznamy/default.png', 9);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `sutaze`
--

CREATE TABLE `sutaze` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) NOT NULL,
  `mesto` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `typy` varchar(255) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `sutaze`
--

INSERT INTO `sutaze` (`id`, `nazov`, `mesto`, `adresa`, `typy`, `autor_id`, `created_at`) VALUES
(3, 'dfgdf', 'gdfgdf', 'gdfgd', 'fgdfgd', 9, '2026-01-21 17:27:22'),
(4, 'dfsdf', 'sdfsdf', 'sfsdf', 'sdfsdf', 8, '2026-01-21 20:44:08');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tanecne_pary`
--

CREATE TABLE `tanecne_pary` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

--
-- Sťahujem dáta pre tabuľku `tanecne_pary`
--

INSERT INTO `tanecne_pary` (`id`, `user1_id`, `user2_id`, `created_at`) VALUES
(3, 6, 11, '2026-01-21 21:23:45');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `ucast_na_sutazi`
--

CREATE TABLE `ucast_na_sutazi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sutaz_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `ucast_na_sutazi`
--

INSERT INTO `ucast_na_sutazi` (`id`, `user_id`, `sutaz_id`, `created_at`) VALUES
(7, 11, 4, '2026-01-21 21:00:56');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `MENO` varchar(50) NOT NULL,
  `PRIEZVISKO` varchar(50) NOT NULL,
  `MAIL` varchar(50) NOT NULL,
  `HESLO` varchar(255) NOT NULL,
  `ROLA` enum('trener','user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`ID`, `MENO`, `PRIEZVISKO`, `MAIL`, `HESLO`, `ROLA`) VALUES
(4, 'Majko', 'Pajko', 'ssss@gmail.com', '$2y$10$lI7A/xkhhY9mithP/V6HnelIRSVpkSpu7RCdNEHSkrkcd16Z3MPti', 'user'),
(5, 'Majkoa', 'Pajkoa', 'ddddd@gmail.com', '$2y$10$QxhVGwHQhq3JG/DWNQNuLucOk/rHGDibarTDt3Q/KSUZWZIaDnt9O', 'user'),
(6, 'aaa', 'aaa', 'aaaaaa@gmail.com', '$2y$10$XcA1TcTa21b0WjsisMx/xutPsLS.9PtbK0MdFtkt5v38wtfb9P.xe', 'user'),
(7, 'ff', 'ff', 'ff@gmail.com', '$2y$10$itcA0BQNq8LyQ04j1yCxQu2GucH6jM.px54U9Vn5tSu0erz8jBWVi', 'admin'),
(8, 'Admin', 'Admin', 'admin@admin.com', '$2y$10$YsEalTcv58i2vmbnTvKgzu3mAY5dCtEQ.yG886IsffVvT3nq/B1CO', 'admin'),
(9, 'trener', 'trener', 'trener@trener.com', '$2y$10$T5ii.EZZjBZ1tQqXyXdDS.v7iWI2Cz1xCj8kGiW7aUS4NdZ2cB9ha', 'trener'),
(10, 'dfsdf', 'sgsdf', 'sdfsd@gmail.com', '$2y$10$VJ3zXemd9mmagXJ3qL0DAex70XlcekcqYbW0aS1Yr3DqcDhLcyjKO', 'user'),
(11, 'user', 'user', 'user@user.com', '$2y$10$t3danvClLeTWZoDfOeskCe73ktuUsO2VR3W6Ggqn3MAQI4.8A4lae', 'user');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `oznamy`
--
ALTER TABLE `oznamy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_oznamy_autor` (`autor_id`);

--
-- Indexy pre tabuľku `sutaze`
--
ALTER TABLE `sutaze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sutaze_autor` (`autor_id`);

--
-- Indexy pre tabuľku `tanecne_pary`
--
ALTER TABLE `tanecne_pary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user1_id` (`user1_id`,`user2_id`),
  ADD KEY `fk_par_user2` (`user2_id`);

--
-- Indexy pre tabuľku `ucast_na_sutazi`
--
ALTER TABLE `ucast_na_sutazi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`sutaz_id`),
  ADD KEY `fk_ucast_sutaz` (`sutaz_id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `oznamy`
--
ALTER TABLE `oznamy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pre tabuľku `sutaze`
--
ALTER TABLE `sutaze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `tanecne_pary`
--
ALTER TABLE `tanecne_pary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `ucast_na_sutazi`
--
ALTER TABLE `ucast_na_sutazi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `oznamy`
--
ALTER TABLE `oznamy`
  ADD CONSTRAINT `fk_oznamy_autor` FOREIGN KEY (`autor_id`) REFERENCES `users` (`ID`) ON UPDATE CASCADE;

--
-- Obmedzenie pre tabuľku `sutaze`
--
ALTER TABLE `sutaze`
  ADD CONSTRAINT `fk_sutaze_autor` FOREIGN KEY (`autor_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Obmedzenie pre tabuľku `tanecne_pary`
--
ALTER TABLE `tanecne_pary`
  ADD CONSTRAINT `fk_par_user1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_par_user2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Obmedzenie pre tabuľku `ucast_na_sutazi`
--
ALTER TABLE `ucast_na_sutazi`
  ADD CONSTRAINT `fk_ucast_sutaz` FOREIGN KEY (`sutaz_id`) REFERENCES `sutaze` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ucast_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
