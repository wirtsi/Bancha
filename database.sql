-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 18. Mai 2009 um 10:47
-- Server Version: 5.0.45
-- PHP-Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Datenbank: `cakext`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `actors`
-- 

CREATE TABLE `actors` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- 
-- Daten für Tabelle `actors`
-- 

INSERT INTO `actors` (`id`, `name`) VALUES 
(1, 'Dennis Hopper'),
(2, 'Marlon Brando'),
(3, 'Mr. T'),
(8, 'Markus Lange'),
(9, 'Christian Bale'),
(10, 'Heath Ledger'),
(11, 'Tim Roth'),
(12, 'Bruno Glanz'),
(13, 'Josh Lucas'),
(14, 'Al Pacino'),
(15, 'Robert De Niro'),
(16, 'Andy Garcia'),
(17, 'Val Kilmer'),
(18, 'Meg Ryan'),
(19, 'Tom Cruise'),
(20, 'Keanu Reeves'),
(21, 'Naomie Harris'),
(22, 'Cameron Diaz'),
(23, 'Leonardo DiCaprio'),
(24, 'Ewan McGregor'),
(25, 'Kurt Russel'),
(26, 'Bruce Willis'),
(27, 'Brad Pitt'),
(28, 'Willem Dafoe'),
(29, 'Charlie Sheen'),
(30, 'Uma Thurman'),
(31, 'Samuel Jackson'),
(32, 'Tim Roth');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `directors`
-- 

CREATE TABLE `directors` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `alive` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

-- 
-- Daten für Tabelle `directors`
-- 

INSERT INTO `directors` (`id`, `name`, `alive`) VALUES 
(1, 'Francis Ford Coppola', 1),
(2, 'Oliver Stone', 1),
(5, 'Danny Boyle', 1),
(6, 'Quentin Tarantino', 1),
(12, 'Christopher Nolan', 1),
(13, 'Mary Harron', 1);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `movies`
-- 

CREATE TABLE `movies` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `director_id` int(11) NOT NULL,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `director_id` (`director_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- 
-- Daten für Tabelle `movies`
-- 

INSERT INTO `movies` (`id`, `director_id`, `name`, `year`) VALUES 
(1, 1, 'Apocalipse Now', 1979),
(2, 2, 'Natural Born Killers', 2001),
(3, 5, 'Slumdog Millionaire', 2003),
(4, 12, 'Batman - The Dark Knight', 2008),
(5, 13, 'American Psycho', 2000),
(6, 1, 'Youth Without Youth', 2008),
(7, 1, 'The Godfather', 1972),
(8, 1, 'The Godfather II', 1975),
(9, 1, 'The Godfather III', 1990),
(10, 1, 'Bram StokerÂ´s Dracula', 1992),
(11, 2, 'The Doors', 1991),
(12, 2, 'Born on the Fourth of July', 1989),
(13, 2, 'Any Given Sunday', 1999),
(14, 5, '28 Days Later', 2002),
(15, 5, 'The Beach', 2000),
(16, 5, 'Trainspotting', 1996),
(17, 6, 'Death Proof', 2007),
(18, 6, 'Grindhouse', 2007),
(19, 6, 'Inglourious Basterds', 2009),
(20, 2, 'Platoon', 1996),
(21, 6, 'Kill Bill', 2003),
(22, 6, 'Jackie Brown', 1997),
(23, 6, 'Four Rooms', 1996),
(24, 6, 'Pulp Fiction', 1994),
(25, 6, 'Reservoir Dogs', 1991);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `movies_actors`
-- 

CREATE TABLE `movies_actors` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `movie_id` (`movie_id`,`actor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=137 ;

-- 
-- Daten für Tabelle `movies_actors`
-- 

INSERT INTO `movies_actors` (`id`, `movie_id`, `actor_id`) VALUES 
(82, 1, 2),
(55, 1, 3),
(38, 2, 1),
(83, 2, 2),
(57, 2, 3),
(66, 3, 1),
(84, 3, 2),
(72, 3, 8),
(76, 4, 9),
(77, 4, 10),
(78, 5, 9),
(81, 5, 13),
(133, 6, 11),
(123, 6, 12),
(119, 7, 2),
(120, 7, 14),
(126, 8, 14),
(127, 8, 15),
(128, 9, 14),
(129, 9, 16),
(118, 10, 20),
(91, 11, 17),
(92, 11, 18),
(121, 12, 19),
(124, 13, 14),
(125, 13, 22),
(96, 14, 21),
(102, 15, 23),
(103, 16, 24),
(104, 17, 25),
(117, 18, 26),
(106, 19, 27),
(107, 20, 28),
(108, 20, 29),
(131, 21, 30),
(115, 22, 31),
(134, 23, 11),
(111, 23, 32),
(135, 24, 11),
(116, 24, 26),
(132, 24, 30),
(114, 24, 31),
(136, 25, 11),
(130, 25, 32);
