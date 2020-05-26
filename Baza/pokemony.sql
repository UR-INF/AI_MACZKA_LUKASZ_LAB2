-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Maj 2020, 01:59
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
(3, 'Łukasz', 'Mączka', 'Monczall', 'c20ad4d76fe97759aa27a0c99bff6710', 40, 1, NULL),
(27, 'Aleksandra', 'Mierzwa', 'Olciaaq', '3fb511631777733f7e0628e9e0267e02', 40, NULL, NULL),
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
  MODIFY `id_areny` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_posiadania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id_przedmiotu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  MODIFY `id_trenera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- Ograniczenia dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  ADD CONSTRAINT `FK_id_druzyny` FOREIGN KEY (`id_druzyny`) REFERENCES `druzyny` (`id_druzyny`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_przedmiotu` FOREIGN KEY (`id_przedmiotu`) REFERENCES `przedmioty` (`id_przedmiotu`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
