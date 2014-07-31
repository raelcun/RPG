-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2014 at 05:53 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpg`
--
CREATE DATABASE IF NOT EXISTS `rpg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rpg`;

-- --------------------------------------------------------

--
-- Table structure for table `dungeons`
--

CREATE TABLE IF NOT EXISTS `dungeons` (
  `dID` int(11) NOT NULL AUTO_INCREMENT,
  `rooms` char(30) COLLATE latin1_general_cs NOT NULL,
  `loot` char(30) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`dID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dungeons`
--

INSERT INTO `dungeons` (`dID`, `rooms`, `loot`) VALUES
(1, '1', 'Spellbook');

-- --------------------------------------------------------

--
-- Table structure for table `enemies`
--

CREATE TABLE IF NOT EXISTS `enemies` (
  `eID` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) COLLATE latin1_general_cs NOT NULL,
  `race` char(30) COLLATE latin1_general_cs NOT NULL,
  `prof` char(30) COLLATE latin1_general_cs NOT NULL,
  `str` int(11) NOT NULL DEFAULT '1',
  `con` int(11) NOT NULL DEFAULT '1',
  `agi` int(11) NOT NULL DEFAULT '1',
  `dex` int(11) NOT NULL DEFAULT '1',
  `int` int(11) NOT NULL DEFAULT '1',
  `wis` int(11) NOT NULL DEFAULT '1',
  `cha` int(11) NOT NULL DEFAULT '1',
  `act` int(11) NOT NULL DEFAULT '1',
  `per` char(11) COLLATE latin1_general_cs NOT NULL DEFAULT '1',
  `battleplan` text COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`eID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=2 ;

--
-- Dumping data for table `enemies`
--

INSERT INTO `enemies` (`eID`, `name`, `race`, `prof`, `str`, `con`, `agi`, `dex`, `int`, `wis`, `cha`, `act`, `per`, `battleplan`) VALUES
(1, 'Rat', 'Vermin', 'Rat', 1, 1, 1, 1, 1, 1, 1, 1, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE IF NOT EXISTS `hero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) COLLATE latin1_general_cs NOT NULL,
  `pw` char(40) COLLATE latin1_general_cs NOT NULL,
  `race` char(30) COLLATE latin1_general_cs NOT NULL,
  `prof` char(30) COLLATE latin1_general_cs NOT NULL,
  `xp` int(11) NOT NULL DEFAULT '0',
  `party` char(30) COLLATE latin1_general_cs NOT NULL DEFAULT '',
  `str` int(11) NOT NULL DEFAULT '1',
  `con` int(11) NOT NULL DEFAULT '1',
  `agi` int(11) NOT NULL DEFAULT '1',
  `dex` int(11) NOT NULL DEFAULT '1',
  `int` int(11) NOT NULL DEFAULT '1',
  `wis` int(11) NOT NULL DEFAULT '1',
  `cha` int(11) NOT NULL DEFAULT '1',
  `act` int(11) NOT NULL DEFAULT '1',
  `per` int(11) NOT NULL DEFAULT '1',
  `gold` int(11) NOT NULL DEFAULT '50',
  `battleplan` char(255) COLLATE latin1_general_cs NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=24 ;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `name`, `pw`, `race`, `prof`, `xp`, `party`, `str`, `con`, `agi`, `dex`, `int`, `wis`, `cha`, `act`, `per`, `gold`, `battleplan`) VALUES
(1, 'Otto', '3da541559918a808c2402bba5012f6c60b27661c', 'Elf', 'Mage', 0, 'The Order', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, 'nexttoenemy|moveaway||yourhpbelow50|casthealing||notnexttoenemy|rangedattack'),
(2, 'Thog', '3da541559918a808c2402bba5012f6c60b27661c', 'Orc', 'Warrior', 0, 'The Order', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(6, 'test', 'f3bf7bcc1b33ac0091e38c1fa58a51359dbdd03d', 'Human', 'Warrior', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(7, 'Zacharius', '1161e6ffd3637b302a5cd74076283a7bd1fc20d3', 'Human', 'Archer', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(8, 'Darksage', '70fce4438c78d612a283ea0f5b7a8b30c655a94a', 'Elf', 'Warrior', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(10, 'Arkangel', 'dc80e118fc8ed4c7a554f6bcdb7ab91056fcd1cf', 'Elf', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(11, 'Iztar', '3da541559918a808c2402bba5012f6c60b27661c', 'Elf', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(12, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Human', 'Warrior', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(13, 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', 'Human', 'Archer', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(14, 'cc', 'bdb480de655aa6ec75ca058c849c4faf3c0f75b1', 'Human', 'Warrior', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(15, 'c', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', 'Human', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(16, 'd', '3c363836cf4e16666669a25da280a1865c2d2874', 'Human', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(17, 'e', '58e6b3a414a1e090dfc6029add0f3555ccba127f', 'Human', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(18, 'asdf', '3da541559918a808c2402bba5012f6c60b27661c', 'Human', 'Barbarian', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(19, 'Durkon', '3da541559918a808c2402bba5012f6c60b27661c', 'Dwarf', 'Priest', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(21, 'knight', '3da541559918a808c2402bba5012f6c60b27661c', 'Orc', 'Knight', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, ''),
(22, 'Dan', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'Human', 'Mage', 50, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 5000, ''),
(23, 'Dan2', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'Human', 'Barbarian', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');

-- --------------------------------------------------------

--
-- Table structure for table `heroinventory`
--

CREATE TABLE IF NOT EXISTS `heroinventory` (
  `heroId` int(11) DEFAULT NULL,
  `heroName` char(30) COLLATE latin1_general_cs DEFAULT NULL,
  `itemPrefix` char(30) COLLATE latin1_general_cs DEFAULT NULL,
  `itemName` char(30) COLLATE latin1_general_cs DEFAULT NULL,
  `itemSuffix` char(30) COLLATE latin1_general_cs DEFAULT NULL,
  `equip` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `heroskills`
--

CREATE TABLE IF NOT EXISTS `heroskills` (
  `skillID` int(11) NOT NULL,
  `heroID` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`skillID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `heroskills`
--

INSERT INTO `heroskills` (`skillID`, `heroID`, `level`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `equip` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item`, `owner`, `equip`) VALUES
(2, 1, 2, 1),
(3, 2, 2, 1),
(4, 3, 2, 1),
(5, 4, 2, 1),
(6, 5, 2, 1),
(11, 6, 1, 1),
(12, 7, 1, 1),
(13, 6, 2, 1),
(15, 1, 2, 1),
(16, 1, 2, 1),
(17, 10, 2, 1),
(18, 10, 2, 1),
(19, 7, 11, 1),
(20, 9, 11, 1),
(21, 9, 11, 1),
(63, 10, 22, 1),
(64, 7, 22, 0),
(65, 14, 22, 2),
(66, 1, 23, 0),
(67, 5, 23, 0),
(68, 4, 23, 0),
(69, 2, 23, 0),
(70, 3, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemmodifiers`
--

CREATE TABLE IF NOT EXISTS `itemmodifiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) COLLATE latin1_general_cs NOT NULL,
  `type` char(30) COLLATE latin1_general_cs NOT NULL,
  `des` char(255) COLLATE latin1_general_cs NOT NULL DEFAULT '',
  `sdam` int(11) NOT NULL DEFAULT '0',
  `pdam` int(11) NOT NULL DEFAULT '0',
  `bdam` int(11) NOT NULL DEFAULT '0',
  `sarm` int(11) NOT NULL DEFAULT '0',
  `parm` int(11) NOT NULL DEFAULT '0',
  `barm` int(11) NOT NULL DEFAULT '0',
  `hpreg` int(11) NOT NULL DEFAULT '0',
  `mpreg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=23 ;

--
-- Dumping data for table `itemmodifiers`
--

INSERT INTO `itemmodifiers` (`id`, `name`, `type`, `des`, `sdam`, `pdam`, `bdam`, `sarm`, `parm`, `barm`, `hpreg`, `mpreg`) VALUES
(8, 'of Fire', 'suffix', 'This one is made of fire.', 0, 0, 0, 0, 0, 0, -1, 0),
(10, 'Bludgeoning', 'prefix', 'This one is heavy.', 0, 0, 2, 0, 0, 0, 0, 0),
(15, 'Rusty', 'prefix', 'This one is rusty.', -1, 0, 0, 0, 0, 0, 0, 0),
(17, 'Bent', 'prefix', 'This one is bent.', 0, -1, 0, 0, 0, 0, 0, 0),
(18, 'Weak', 'prefix', 'This one is weaker than normal.', 0, 0, 0, -1, -1, -1, 0, 0),
(22, 'Frail', 'prefix', 'This one feels like it will fall apart.', 0, 0, -1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) COLLATE latin1_general_cs NOT NULL,
  `prefix_modifier` int(11) DEFAULT NULL,
  `suffix_modifier` int(11) DEFAULT NULL,
  `slot` char(30) COLLATE latin1_general_cs NOT NULL,
  `des` char(255) COLLATE latin1_general_cs NOT NULL DEFAULT '',
  `market` int(11) NOT NULL DEFAULT '0',
  `sdam` int(11) NOT NULL DEFAULT '0',
  `pdam` int(11) NOT NULL DEFAULT '0',
  `bdam` int(11) NOT NULL DEFAULT '0',
  `sarm` int(11) NOT NULL DEFAULT '0',
  `parm` int(11) NOT NULL DEFAULT '0',
  `barm` int(11) NOT NULL DEFAULT '0',
  `hpreg` int(11) NOT NULL DEFAULT '0',
  `mpreg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullname` (`prefix_modifier`,`name`,`suffix_modifier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=22 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `prefix_modifier`, `suffix_modifier`, `slot`, `des`, `market`, `sdam`, `pdam`, `bdam`, `sarm`, `parm`, `barm`, `hpreg`, `mpreg`) VALUES
(1, 'Dagger', NULL, NULL, 'HAND', 'A sharp dagger.', 0, 0, 1, 0, 0, 0, 0, 0, 0),
(2, 'Leather Armor', NULL, NULL, 'TORSO', 'Cheap leather armor.', 0, 0, 0, 0, 1, 0, 0, 0, 0),
(3, 'Leather Boots', NULL, NULL, 'FEET', 'Cheap leather boots.', 0, 0, 0, 0, 0, 0, 1, 0, 0),
(4, 'Leather Gloves', NULL, NULL, 'ARMS', 'Cheap leather gloves.', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(5, 'Leather Greaves', NULL, NULL, 'LEGS', 'Cheap leather greaves.', 0, 0, 0, 0, 1, 0, 0, 0, 0),
(6, 'Mage Robe', NULL, NULL, 'TORSO', 'A basic robe for a mage.', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Staff', NULL, NULL, 'HAND', 'A basic wooden staff.', 0, 0, 0, 1, 0, 0, 0, 0, 0),
(9, 'Spellbook', NULL, NULL, 'HAND', 'A spellbook to hold spells.', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(10, 'Spellbook', NULL, 8, 'HAND', 'A spellbook to hold spells.', 50, 0, 0, 0, 0, 0, 0, 0, 1),
(11, 'Short Sword', NULL, NULL, 'HAND', 'A basic sword.', 0, 2, 0, 0, 0, 0, 0, 0, 0),
(12, 'Long Sword', NULL, NULL, 'HAND', 'A longer sword.', 0, 3, 0, 0, 0, 0, 0, 0, 0),
(14, 'Wooden Shield', 18, NULL, 'HAND', 'A basic shield.', 0, 0, 0, 0, 2, 2, 2, 0, 0),
(15, 'Bow', NULL, NULL, 'HAND', 'A basic wooden bow.', 0, 0, 2, 0, 0, 0, 0, 0, 0),
(16, 'Greataxe', NULL, NULL, 'HAND', 'A large double-sided axe.', 0, 4, 0, 0, 0, 0, 0, 0, 0),
(19, 'Priest Robe', NULL, NULL, 'TORSO', 'A basic robe for a priest.', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'Holy Symbol', NULL, NULL, 'HAND', 'The symbol of a deity.', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(21, 'Mace', NULL, NULL, 'HAND', 'A basic mace.', 0, 0, 0, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` char(30) COLLATE latin1_general_cs NOT NULL,
  `sender` char(30) COLLATE latin1_general_cs NOT NULL,
  `subject` text COLLATE latin1_general_cs NOT NULL,
  `message` text COLLATE latin1_general_cs NOT NULL,
  `timestamp` char(30) COLLATE latin1_general_cs NOT NULL,
  `unread` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=24 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `receiver`, `sender`, `subject`, `message`, `timestamp`, `unread`) VALUES
(20, 'asdf', 'asdf', 'test2', 'test2', '04-07-14 15:33:06', 0),
(23, 'fizh', 'Otto', 'hey', 'sup', '05-07-14 16:36:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `cd` int(11) NOT NULL,
  `applicants` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `name`, `cd`, `applicants`) VALUES
(1, 'The Order', 0, 'Dan,Durkon');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `rID` int(11) NOT NULL AUTO_INCREMENT,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `enemies` text COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`rID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rID`, `length`, `width`, `enemies`) VALUES
(1, 5, 5, 'Rat|Rat|Rat|Rat|Rat');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) COLLATE latin1_general_cs NOT NULL,
  `prof` char(30) COLLATE latin1_general_cs NOT NULL,
  `cost` text COLLATE latin1_general_cs NOT NULL,
  `effect` text COLLATE latin1_general_cs NOT NULL,
  `type` text COLLATE latin1_general_cs NOT NULL,
  `range` text COLLATE latin1_general_cs NOT NULL,
  `duration` text COLLATE latin1_general_cs NOT NULL,
  `targets` text COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=9 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `prof`, `cost`, `effect`, `type`, `range`, `duration`, `targets`) VALUES
(1, 'Immolate', 'Mage', '5', '{skill level}', 'fire damage', '5', '{skill level}/3', '1'),
(2, 'Healing Hands', 'Priest', '4', '-{skill level}*2', 'pure damage', '{skill level}/3', '0', '1'),
(3, 'Bulwark', 'Knight', '3', '{skill level}/2', 'armor buff', '0', '{skill level}', '1'),
(4, 'Barrage', 'Archer', '4', '{skill level}', 'piercing damage', '8', '0', '{skill level}/2'),
(5, 'Troll Blood', 'Barbarian', '0', '-{skill level}/2', 'pure damage', '0', 'passive', '1'),
(6, 'Mana Regeneration Level 1', 'Mage', '', 'mpRegen*1.4', 'passive', '', '', ''),
(7, 'Mana Regeneration Level 2', 'Mage', '', 'mpRegen*1.8', 'passive', '', '', ''),
(8, 'Mana Regeneration Level 3', 'Mage', '', 'mpRegen*2.2', 'passive', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `skilltree`
--

CREATE TABLE IF NOT EXISTS `skilltree` (
  `FromSkillId` int(11) NOT NULL,
  `ToSkillId` int(11) NOT NULL,
  `XPRequired` int(11) NOT NULL,
  PRIMARY KEY (`FromSkillId`,`ToSkillId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilltree`
--

INSERT INTO `skilltree` (`FromSkillId`, `ToSkillId`, `XPRequired`) VALUES
(6, 7, 100),
(7, 8, 150);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
