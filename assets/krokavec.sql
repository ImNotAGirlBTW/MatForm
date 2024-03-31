-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 31. bře 2024, 20:54
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `mat_projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `kniha`
--

CREATE TABLE `kniha` (
  `idKniha` int(11) NOT NULL,
  `nazev` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `Zanr_idZanr` int(11) NOT NULL,
  `Okruh_idOkruh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `kniha`
--

INSERT INTO `kniha` (`idKniha`, `nazev`, `autor`, `Zanr_idZanr`, `Okruh_idOkruh`) VALUES
(1, 'Publius Ovidius Naso', 'Proměny', 2, 1),
(2, 'Giovanni Boccaccio', 'Dekameron', 3, 1),
(3, 'William Shakespeare', 'Hamlet', 1, 1),
(4, 'William Shakespeare', 'Romeo a Julie', 1, 1),
(5, 'Jan Amos Komenský', 'Labyrint světa a ráj srdce', 3, 1),
(6, 'Moliére', 'Lakomec', 1, 1),
(7, 'Ezop', 'Bajky', 2, 1),
(8, 'Francois Villon', 'Balady', 2, 1),
(9, 'Honoré de Balzac', 'Evženie Grandetová', 3, 2),
(10, 'Lev Nikolajevič Tolstoj', 'Anna Kareninová', 3, 2),
(11, 'Karel Hynek Mácha', 'Máj', 2, 2),
(12, 'Josef Kajetán Tyl', 'Strakonický dudák', 1, 2),
(13, 'Karel Jaromír Erben', 'Kytice', 2, 2),
(14, 'Karel Havlíček Borovský', 'Král Lávra', 2, 2),
(15, 'Karel Havlíček Borovský', 'Křest sv. Vladimíra', 2, 2),
(16, 'Božena Němcová', 'Divá Bára', 3, 2),
(17, 'Jan Neruda', 'Povídky malostranské', 3, 2),
(18, 'Jaroslav Vrchlický', 'Noc na Karlštejně', 1, 2),
(19, 'Alois Jirásek', 'Staré pověsti české', 3, 2),
(20, 'Oscar Wilde', 'Jak je důležité míti Filipa', 1, 2),
(21, 'Oscar Wilde', 'Obraz Doriana Graye', 3, 2),
(22, 'Alois a Vilém Mrštíkové', 'Maryša', 1, 2),
(23, 'Božena Němcová', 'Babička', 3, 2),
(24, 'Emile Zola', 'Zabiják', 3, 2),
(25, 'Nikolaj Vasiljevič Gogol', 'Revizor', 1, 2),
(26, 'Alexandr Sergejevič Puškin', 'Evžen Oněgin', 2, 2),
(27, 'Erich Maria Remarque', 'Na západní frontě klid', 3, 3),
(28, 'George Bernard Shaw', 'Pygmalion', 1, 3),
(29, 'Antoine de Saint-Exupéry', 'Malý princ', 3, 3),
(30, 'Gabriel García Marquéz', 'Kronika ohlášené smrti', 3, 3),
(31, 'Alberto Moravia', 'Horalka', 3, 3),
(32, 'Michail Šolochov', 'Osud člověka', 3, 3),
(33, 'Ernest Hemingway', 'Stařec a moře', 3, 3),
(34, 'Ray Bradbury', '451° Fahrenheita', 3, 3),
(35, 'William Styron', 'Sophiina volba', 3, 3),
(36, 'Guillaume Apollinaire', 'Alkoholy', 2, 3),
(37, 'Romain Rolland', 'Petr a Lucie', 3, 3),
(38, 'Paulo Coelho', 'Alchymista', 3, 3),
(39, 'George Orwell', 'Farma zvířat', 3, 3),
(40, 'Franz Kafka', 'Proměna', 3, 3),
(41, 'John Ronald Reuel Tolkien', 'Pán prstenů: Společenstvo prstenu', 3, 3),
(42, 'Bohumil Hrabal', 'Ostře sledované vlaky', 3, 4),
(43, 'Bohumil Hrabal', 'Postřižiny', 3, 4),
(44, 'Viktor Dyk', 'Krysař', 3, 4),
(45, 'Jan Drda', 'Němá barikáda', 3, 4),
(46, 'Jan Otčenášek', 'Romeo, Julie a tma', 3, 4),
(47, 'Karel Čapek', 'Bílá nemoc', 1, 4),
(48, 'Karel Poláček', 'Bylo nás pět', 3, 4),
(49, 'Ivan Olbracht', 'Golet v údolí', 3, 4),
(50, 'Jaroslav Seifert', 'Všecky krásy světa', 3, 4),
(51, 'Vítězslav Nezval', 'Manon Lescaut', 1, 4),
(52, 'Arnošt Lustig', 'Modlitba pro Kateřinu Horowitzovou', 3, 4),
(53, 'Michal Viewegh', 'Báječná léta pod psa', 3, 4),
(54, 'František Hrubín', 'Romance pro křídlovku', 2, 4),
(55, 'Ota Pavel', 'Smrt krásných srnců', 3, 4),
(56, 'Petr Bezruč', 'Slezské písně', 2, 4),
(57, 'Jiří Wolker', 'Těžká hodina', 2, 4),
(58, 'Karel Čapek', 'Povídky z jedné kapsy, Povídky z druhé kapsy', 3, 4),
(59, 'František Kožík', 'Na dolinách svitá (Hejtman Šarovec)', 3, 4),
(60, 'Květa Legátová', 'Jozova Hanule', 3, 4),
(61, 'Jaroslav Hašek', 'Osudy dobrého vojáka Švejka za světové války 1', 3, 4),
(62, 'Jan Skácel', 'Smuténka', 2, 4),
(63, 'Irena Dousková', 'Hrdý Budžes', 3, 4),
(64, 'Karel Kryl', 'Kníška Karla Kryla', 2, 4),
(65, 'Miloslav Šimek a Jiří Grossmann', 'Povídky Šimka a Grossmanna', 3, 4),
(66, 'Ladislav Smoljak a Zdeněk Svěrák', 'Dobytí severního pólu', 1, 4),
(67, 'Jan Werich', 'Fimfárum', 3, 4),
(68, 'Kateřina Tučková', 'Žítkovské bohyně', 3, 4),
(69, 'Zdeněk Jirotka', 'Saturnin', 3, 4),
(70, 'Milan Kundera', 'Směšné lásky', 3, 4),
(71, 'Milan Kundera', 'Žert', 3, 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `okruh`
--

CREATE TABLE `okruh` (
  `idOkruh` int(11) NOT NULL,
  `nazev` varchar(255) DEFAULT NULL,
  `popis` varchar(255) DEFAULT NULL,
  `pocet` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `okruh`
--

INSERT INTO `okruh` (`idOkruh`, `nazev`, `popis`, `pocet`) VALUES
(1, 'SČ18', 'Světová a česká literatura do konce 18. století', 2),
(2, 'SČ19', 'Světová a česká literatura 19. století', 3),
(3, 'S2021', 'Světová literatura 20. a 21. století', 4),
(4, 'Č2021', 'Česká literatura 20. a 21. století', 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `podminky`
--

CREATE TABLE `podminky` (
  `idPodminky` int(11) NOT NULL,
  `popis` varchar(255) DEFAULT NULL,
  `pocet` smallint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `podminky`
--

INSERT INTO `podminky` (`idPodminky`, `popis`, `pocet`) VALUES
(1, 'Celkem', 20);

-- --------------------------------------------------------

--
-- Struktura tabulky `save`
--

CREATE TABLE `save` (
  `idSave` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `Users_idUsers` int(11) NOT NULL,
  `Kniha_idKniha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `save`
--

INSERT INTO `save` (`idSave`, `datum`, `Users_idUsers`, `Kniha_idKniha`) VALUES
(241, '2024-03-31', 6, 7),
(242, '2024-03-31', 6, 8),
(243, '2024-03-31', 6, 26),
(244, '2024-03-31', 6, 9),
(245, '2024-03-31', 6, 15),
(246, '2024-03-31', 6, 41),
(247, '2024-03-31', 6, 32),
(248, '2024-03-31', 6, 38),
(249, '2024-03-31', 6, 34),
(250, '2024-03-31', 6, 62),
(251, '2024-03-31', 6, 67),
(252, '2024-03-31', 6, 61),
(253, '2024-03-31', 6, 50),
(254, '2024-03-31', 6, 66),
(255, '2024-03-31', 6, 53),
(256, '2024-03-31', 6, 71),
(257, '2024-03-31', 6, 56),
(258, '2024-03-31', 6, 44),
(259, '2024-03-31', 6, 51),
(260, '2024-03-31', 6, 69);

-- --------------------------------------------------------

--
-- Struktura tabulky `skolni_rok`
--

CREATE TABLE `skolni_rok` (
  `id` int(11) NOT NULL,
  `skolni_rok` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `skolni_rok`
--

INSERT INTO `skolni_rok` (`id`, `skolni_rok`) VALUES
(1, '2024/2025');

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `isAdmin`) VALUES
(6, 'Theodor Jaroslav Krokavec', 'krokavec_theodor@oauh.cz', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `zanr`
--

CREATE TABLE `zanr` (
  `idZanr` int(11) NOT NULL,
  `nazev` varchar(255) DEFAULT NULL,
  `popis` varchar(255) DEFAULT NULL,
  `pocet` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `zanr`
--

INSERT INTO `zanr` (`idZanr`, `nazev`, `popis`, `pocet`) VALUES
(1, 'Dra', 'Drama', 2),
(2, 'Poe', 'Poezie', 2),
(3, 'Pro', 'Próza', 2);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `kniha`
--
ALTER TABLE `kniha`
  ADD PRIMARY KEY (`idKniha`,`Zanr_idZanr`,`Okruh_idOkruh`),
  ADD KEY `fk_Kniha_Zanr1_idx` (`Zanr_idZanr`),
  ADD KEY `fk_Kniha_Okruh1_idx` (`Okruh_idOkruh`);

--
-- Indexy pro tabulku `okruh`
--
ALTER TABLE `okruh`
  ADD PRIMARY KEY (`idOkruh`);

--
-- Indexy pro tabulku `podminky`
--
ALTER TABLE `podminky`
  ADD PRIMARY KEY (`idPodminky`);

--
-- Indexy pro tabulku `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`idSave`),
  ADD KEY `fk_Save_User1_idx` (`Users_idUsers`);

--
-- Indexy pro tabulku `skolni_rok`
--
ALTER TABLE `skolni_rok`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`idZanr`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kniha`
--
ALTER TABLE `kniha`
  MODIFY `idKniha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pro tabulku `okruh`
--
ALTER TABLE `okruh`
  MODIFY `idOkruh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `podminky`
--
ALTER TABLE `podminky`
  MODIFY `idPodminky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `save`
--
ALTER TABLE `save`
  MODIFY `idSave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT pro tabulku `skolni_rok`
--
ALTER TABLE `skolni_rok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `zanr`
--
ALTER TABLE `zanr`
  MODIFY `idZanr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `kniha`
--
ALTER TABLE `kniha`
  ADD CONSTRAINT `fk_Kniha_Okruh1` FOREIGN KEY (`Okruh_idOkruh`) REFERENCES `okruh` (`idOkruh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Kniha_Zanr1` FOREIGN KEY (`Zanr_idZanr`) REFERENCES `zanr` (`idZanr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `save`
--
ALTER TABLE `save`
  ADD CONSTRAINT `fk_Save_User1` FOREIGN KEY (`Users_idUsers`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
