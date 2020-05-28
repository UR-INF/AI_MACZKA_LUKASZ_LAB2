-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Maj 2020, 01:55
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pokemony`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `areny`
--

CREATE TABLE `areny` (
  `id_areny` int(11) NOT NULL,
  `nazwa_areny` varchar(32) NOT NULL,
  `opis_areny` varchar(256) NOT NULL,
  `miejscowosc` varchar(64) NOT NULL,
  `id_trenera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `areny`
--

INSERT INTO `areny` (`id_areny`, `nazwa_areny`, `opis_areny`, `miejscowosc`, `id_trenera`) VALUES
(1, 'Św. Jan Nepomucen na cokole', 'Zabytkowy okazały nepomuk pochodzący z 1755 r. Cokół w kształcie słupa ze skromnymi gzymsami', 'Leżajsk', 3),
(2, 'Park Miejski w Nisku', 'Park Miejski w Nisku im. Marii i Oliviera Resseguier', 'Nisko', 3),
(3, 'Pomnik bitwy pod Grunwaldem', 'Ogrodzony pomnik z Jezusem na krzyżu', 'Żołynia', 3),
(4, 'Figurka W Parku Inwalidów', 'Brak', 'Rzeszów', 27),
(5, 'Dom Pielgrzyma', 'Miejsce odpoczynku dla strudzonych wędrowców', 'Leżajsk', 27),
(6, 'Dworzec PKP Rzeszów Główny', 'Miejsce odjazdu pociągów', 'Rzeszów', 27),
(7, 'Pomnik Przy MCK', 'Odlany w brązie pomnik', 'Leżajsk', 27),
(8, 'Willa Secesyjna', 'Willa Secesyjna z 1900 roku', 'Rzeszów', 27),
(9, 'Aktywny Ogródek', 'Miejsce do ćwiczeń wraz z placem zabaw', 'Leżajsk', 27),
(10, 'Filharmonia Podkarpacka', 'Budynek Filharmonii Podkarpackiej', 'Rzeszów', 27),
(11, 'Tablica Nadleśnictwa Leżajsk', 'Znajduje się tutaj zbiór flory i fauny leśnej.', 'Leżajsk/Jelna', 3),
(12, 'Pływalnia Miejska W Leżajsku', 'Budynek pływalni miejskiej \"Oceanik\"', 'Leżajsk', 27),
(13, 'Test', 'Test', 'Test', 27),
(14, 'Testowa', 'Testowa', 'Lezajsk', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `druzyny`
--

CREATE TABLE `druzyny` (
  `id_druzyny` int(11) NOT NULL,
  `nazwa_druzyny` varchar(32) NOT NULL,
  `opis_druzyny` varchar(256) NOT NULL,
  `kolor_druzyny` varchar(32) NOT NULL,
  `id_lidera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `druzyny`
--

INSERT INTO `druzyny` (`id_druzyny`, `nazwa_druzyny`, `opis_druzyny`, `kolor_druzyny`, `id_lidera`) VALUES
(1, 'Valor', 'Team Valor relies on strength in battle. Valor\'s members believe that Pokémon are stronger and more warmhearted than humans and are interested in enhancing their natural power.', 'Czerwony', 1),
(2, 'Mystic', 'Team Mystic relies on analyzing every situation. Mystic\'s members believe that Pokémon have immeasurable wisdom and are interested in learning more about why Pokémon experience evolution.', 'Niebieski', 2),
(3, 'Instinct', 'Team Instinct relies on a trainer\'s instincts. Instinct\'s members believe that Pokémon have excellent intuition and are interested in learning more about its connection to the egg hatching process.', 'Żółty', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `liderzy`
--

CREATE TABLE `liderzy` (
  `id_lidera` int(11) NOT NULL,
  `nazwa_lidera` varchar(32) NOT NULL,
  `plec_lidera` varchar(16) NOT NULL,
  `pokemon_lidera` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `liderzy`
--

INSERT INTO `liderzy` (`id_lidera`, `nazwa_lidera`, `plec_lidera`, `pokemon_lidera`) VALUES
(1, 'Candela', 'Kobieta', 'Moltres'),
(2, 'Blanche', 'Nieokreślone', 'Articuno'),
(3, 'Spark', 'Mężczyzna', 'Zapdos');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pokemony`
--

CREATE TABLE `pokemony` (
  `id_pokemona` int(11) NOT NULL,
  `max_Cp` int(11) NOT NULL,
  `nazwa_pokemona` varchar(64) NOT NULL,
  `region_wystepowania_pokemona` varchar(64) NOT NULL,
  `typ_pokemona` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pokemony`
--

INSERT INTO `pokemony` (`id_pokemona`, `max_Cp`, `nazwa_pokemona`, `region_wystepowania_pokemona`, `typ_pokemona`) VALUES
(1, 1115, 'Bulbasaur', 'Kanto', 'Grass/Poison'),
(2, 1699, 'Ivysaur', 'Kanto', 'Grass/Poison'),
(3, 2720, 'Venusaur', 'Kanto', 'Grass/Poison'),
(4, 980, 'Charmander', 'Kanto', 'Fire'),
(5, 1653, 'Charmeleon', 'Kanto', 'Fire'),
(6, 2889, 'Charizard', 'Kanto', 'Fire/Flying'),
(7, 946, 'Squirtle', 'Kanto', 'Water'),
(8, 1488, 'Wartortle', 'Kanto', 'Water'),
(9, 2466, 'Blastoise', 'Kanto', 'Water'),
(10, 437, 'Caterpie', 'Kanto', 'Bug'),
(11, 450, 'Metapod', 'Kanto', 'Bug'),
(12, 1827, 'Butterfree', 'Kanto', 'Bug/Flying'),
(13, 456, 'Weedle', 'Kanto', 'Bug/Poison'),
(14, 432, 'Kakuna', 'Kanto', 'Bug/Poison'),
(15, 1846, 'Beedrill', 'Kanto', 'Bug/Poison'),
(16, 680, 'Pidgey', 'Kanto', 'Normal/Flying'),
(17, 1194, 'Pidgeotto', 'Kanto', 'Normal/Flying'),
(18, 2129, 'Pidgeot', 'Kanto', 'Normal/Flying'),
(19, 734, 'Rattata', 'Kanto', 'Normal'),
(20, 1730, 'Raticate', 'Kanto', 'Normal'),
(21, 798, 'Spearow', 'Kanto', 'Normal/Flying'),
(22, 1997, 'Fearow', 'Kanto', 'Normal/Flying'),
(23, 927, 'Ekans', 'Kanto', 'Poison'),
(24, 1921, 'Arbok', 'Kanto', 'Poison'),
(25, 938, 'Pikachu', 'Kanto', 'Electric'),
(26, 2182, 'Raichu', 'Kanto', 'Electric');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posiadanie`
--

CREATE TABLE `posiadanie` (
  `id_posiadania` int(11) NOT NULL,
  `id_trenera` int(11) NOT NULL,
  `id_pokemona` int(11) NOT NULL,
  `posiadane_cp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `posiadanie`
--

INSERT INTO `posiadanie` (`id_posiadania`, `id_trenera`, `id_pokemona`, `posiadane_cp`) VALUES
(117, 3, 1, 385),
(118, 3, 1, 879),
(120, 3, 4, 647),
(121, 3, 4, 48),
(122, 3, 4, 127),
(123, 3, 4, 649),
(124, 3, 4, 222),
(125, 3, 4, 454),
(126, 3, 4, 538),
(127, 3, 4, 73),
(128, 3, 4, 229),
(129, 3, 4, 649),
(130, 3, 4, 189),
(131, 3, 4, 110),
(132, 3, 10, 21),
(133, 3, 4, 757),
(134, 3, 4, 44),
(136, 3, 4, 697),
(137, 3, 4, 118),
(139, 3, 1, 561),
(140, 3, 1, 20),
(141, 3, 2, 724),
(142, 3, 2, 574),
(143, 3, 2, 265),
(144, 3, 2, 1115),
(145, 3, 2, 1504),
(146, 3, 2, 1111),
(147, 3, 2, 1438),
(148, 3, 2, 573),
(149, 3, 2, 1545),
(150, 3, 2, 1509),
(151, 3, 2, 1038),
(152, 3, 6, 2428),
(153, 3, 1, 982),
(154, 27, 1, 946),
(155, 27, 21, 684),
(156, 27, 22, 1002),
(157, 3, 1, 406),
(161, 27, 1, 104),
(162, 27, 2, 1091),
(163, 27, 16, 370),
(164, 27, 3, 1759),
(165, 27, 1, 823),
(166, 27, 1, 44),
(167, 27, 1, 678),
(168, 27, 1, 650),
(169, 27, 1, 1032),
(170, 27, 1, 223),
(171, 27, 1, 418),
(172, 27, 1, 1041),
(173, 27, 1, 860),
(174, 27, 1, 1066),
(179, 3, 1, 383),
(180, 3, 1, 440);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posiadanie_przedmiotu`
--

CREATE TABLE `posiadanie_przedmiotu` (
  `id_posiadania_przedmiotu` int(11) NOT NULL,
  `id_przedmiotu` int(11) NOT NULL,
  `id_trenera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `posiadanie_przedmiotu`
--

INSERT INTO `posiadanie_przedmiotu` (`id_posiadania_przedmiotu`, `id_przedmiotu`, `id_trenera`) VALUES
(1, 1, 27),
(2, 6, 27),
(3, 6, 27),
(4, 11, 27),
(5, 1, 27),
(6, 13, 27),
(7, 13, 27),
(8, 10, 27),
(9, 10, 27),
(10, 14, 27),
(11, 6, 27),
(12, 2, 27),
(13, 4, 27),
(14, 7, 27),
(15, 3, 27),
(16, 7, 27),
(17, 14, 27),
(18, 12, 3),
(19, 12, 3),
(20, 4, 3),
(22, 1, 27),
(23, 9, 27),
(24, 4, 27),
(25, 3, 27),
(27, 16, 3),
(28, 6, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id_przedmiotu` int(11) NOT NULL,
  `nazwa_przedmiotu` varchar(32) NOT NULL,
  `opis_przedmiotu` varchar(128) NOT NULL,
  `typ_przedmiotu` varchar(16) NOT NULL,
  `waga_przedmiotu` int(11) NOT NULL,
  `cena_przedmiotu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id_przedmiotu`, `nazwa_przedmiotu`, `opis_przedmiotu`, `typ_przedmiotu`, `waga_przedmiotu`, `cena_przedmiotu`) VALUES
(1, 'PokeBall', 'Służy do łapania pokemonów', 'Pokeball', 1, 1),
(2, 'Beach Glass', 'A piece of colored glass. Waves have rounded its edges', 'Upominek', 7, 125),
(3, 'Cactus Fruit', 'A cactus fruit that bears some resemblance to fruit commonly found in Desert Resort', 'Upominek', 10, 250),
(4, 'Chalky Stone', 'A small, withish stone picked up at the edge of the road', 'Upominek', 10, 50),
(5, 'Flower Fruits', 'These frits can`t be eaten, but some Pokemon enjoy collecting them', 'Upominek', 2, 25),
(6, 'Lone Earring', 'Its sparkle propably inspired your Pokemon to gift it to you', 'Upominek', 7, 1000),
(7, 'Marble', 'A round glass marble. You can see colored glass inside the transparent marble', 'Upominek', 7, 750),
(8, 'Mushroom', 'Mushrooms similar to those tend to grow on some Pokemon', 'Upominek', 2, 25),
(9, 'Pinecone', 'A hefty pinecone that amuses some Pokemon', 'Upominek', 3, 25),
(10, 'Leaf', 'Many Pokemon like to collect these leaves and gift them to Trainers', 'Upominek', 1, 10),
(11, 'Skipping Stone', 'A smooth stone that is the perfect shape for skipping on water', 'Upominek', 10, 300),
(12, 'Bouquet', 'A small bouquet that was made with heart and soul for a single Trainer', 'Upominek', 5, 150),
(13, 'Streachy Spring', 'A thin, small spring that’s totally stretched out', 'Upominek', 5, 25),
(14, 'Torn', 'A ticket, torn from usa and with faded text', 'Upominek', 1, 25),
(15, 'Tropical Flower', 'This tropical flower looks similar to those found in the Alola region', 'Upominek', 1, 50),
(16, 'Tropical Shell', 'A beautiful white shell that may have drifted from a sea in a warm region', 'Upominek', 3, 75);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trenerzy`
--

CREATE TABLE `trenerzy` (
  `id_trenera` int(11) NOT NULL,
  `imie_trenera` varchar(32) NOT NULL,
  `nazwisko_trenera` varchar(64) NOT NULL,
  `nick_trenera` varchar(32) NOT NULL,
  `haslo_trenera` varchar(256) NOT NULL,
  `level_trenera` int(11) NOT NULL,
  `id_druzyny` int(11) DEFAULT NULL,
  `id_przedmiotu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `trenerzy`
--

INSERT INTO `trenerzy` (`id_trenera`, `imie_trenera`, `nazwisko_trenera`, `nick_trenera`, `haslo_trenera`, `level_trenera`, `id_druzyny`, `id_przedmiotu`) VALUES
(3, 'Łukasz', 'Mączka', 'Monczall', '81dc9bdb52d04dc20036dbd8313ed055', 48, 1, 4),
(27, 'Aleksandra', 'M', 'Olciaaq', '202cb962ac59075b964b07152d234b70', 47, 2, 14),
(28, 'Łukasz', 'Mączka', 'Monczall1', 'c20ad4d76fe97759aa27a0c99bff6710', 12, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `areny`
--
ALTER TABLE `areny`
  ADD PRIMARY KEY (`id_areny`),
  ADD KEY `FK_id_trenera` (`id_trenera`);

--
-- Indeksy dla tabeli `druzyny`
--
ALTER TABLE `druzyny`
  ADD PRIMARY KEY (`id_druzyny`),
  ADD KEY `FK_id_lidera` (`id_lidera`);

--
-- Indeksy dla tabeli `liderzy`
--
ALTER TABLE `liderzy`
  ADD PRIMARY KEY (`id_lidera`);

--
-- Indeksy dla tabeli `pokemony`
--
ALTER TABLE `pokemony`
  ADD PRIMARY KEY (`id_pokemona`);

--
-- Indeksy dla tabeli `posiadanie`
--
ALTER TABLE `posiadanie`
  ADD PRIMARY KEY (`id_posiadania`),
  ADD KEY `FK_posiadanie__id_trenera` (`id_trenera`),
  ADD KEY `FK_posiadanie__id_pokemona` (`id_pokemona`);

--
-- Indeksy dla tabeli `posiadanie_przedmiotu`
--
ALTER TABLE `posiadanie_przedmiotu`
  ADD PRIMARY KEY (`id_posiadania_przedmiotu`),
  ADD KEY `FK_posiadanie_przedmiotu_id_trenera` (`id_trenera`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`id_przedmiotu`);

--
-- Indeksy dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  ADD PRIMARY KEY (`id_trenera`),
  ADD KEY `FK_id_przedmiotu` (`id_przedmiotu`),
  ADD KEY `FK_id_druzyny` (`id_druzyny`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `areny`
--
ALTER TABLE `areny`
  MODIFY `id_areny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `druzyny`
--
ALTER TABLE `druzyny`
  MODIFY `id_druzyny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `liderzy`
--
ALTER TABLE `liderzy`
  MODIFY `id_lidera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `pokemony`
--
ALTER TABLE `pokemony`
  MODIFY `id_pokemona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `posiadanie`
--
ALTER TABLE `posiadanie`
  MODIFY `id_posiadania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT dla tabeli `posiadanie_przedmiotu`
--
ALTER TABLE `posiadanie_przedmiotu`
  MODIFY `id_posiadania_przedmiotu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id_przedmiotu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  MODIFY `id_trenera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `areny`
--
ALTER TABLE `areny`
  ADD CONSTRAINT `FK_id_trenera` FOREIGN KEY (`id_trenera`) REFERENCES `trenerzy` (`id_trenera`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `druzyny`
--
ALTER TABLE `druzyny`
  ADD CONSTRAINT `FK_id_lidera` FOREIGN KEY (`id_lidera`) REFERENCES `liderzy` (`id_lidera`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `posiadanie`
--
ALTER TABLE `posiadanie`
  ADD CONSTRAINT `FK_posiadanie__id_pokemona` FOREIGN KEY (`id_pokemona`) REFERENCES `pokemony` (`id_pokemona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_posiadanie__id_trenera` FOREIGN KEY (`id_trenera`) REFERENCES `trenerzy` (`id_trenera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `posiadanie_przedmiotu`
--
ALTER TABLE `posiadanie_przedmiotu`
  ADD CONSTRAINT `FK_posiadanie_przedmiotu_id_trenera` FOREIGN KEY (`id_trenera`) REFERENCES `trenerzy` (`id_trenera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  ADD CONSTRAINT `FK_id_druzyny` FOREIGN KEY (`id_druzyny`) REFERENCES `druzyny` (`id_druzyny`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_przedmiotu` FOREIGN KEY (`id_przedmiotu`) REFERENCES `przedmioty` (`id_przedmiotu`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
