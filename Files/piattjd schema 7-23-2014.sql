-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: ucfsh.ucfilespace.uc.edu:3306
-- Generation Time: Jul 23, 2014 at 01:04 AM
-- Server version: 5.6.12
-- PHP Version: 5.4.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `piattjd`
--

-- --------------------------------------------------------

--
-- Table structure for table `Abilities`
--

CREATE TABLE `Abilities` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Abilities`
--

INSERT INTO `Abilities` VALUES(1, 'Immolate', 'Mage', '5', '{skill level}', 'fire damage', '5', '{skill level}/3', '1');
INSERT INTO `Abilities` VALUES(2, 'Healing Hands', 'Priest', '4', '-{skill level}*2', 'pure damage', '{skill level}/3', '0', '1');
INSERT INTO `Abilities` VALUES(3, 'Bulwark', 'Knight', '3', '{skill level}/2', 'armor buff', '0', '{skill level}', '1');
INSERT INTO `Abilities` VALUES(4, 'Barrage', 'Archer', '4', '{skill level}', 'piercing damage', '8', '0', '{skill level}/2');
INSERT INTO `Abilities` VALUES(5, 'Troll Blood', 'Barbarian', '0', '-{skill level}/2', 'pure damage', '0', 'passive', '1');
INSERT INTO `Abilities` VALUES(6, 'Bite', 'Rat', '0', '{skill level}', 'Piercing', '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Dungeons`
--

CREATE TABLE `Dungeons` (
  `dID` int(11) NOT NULL AUTO_INCREMENT,
  `rooms` char(30) COLLATE latin1_general_cs NOT NULL,
  `loot` char(30) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`dID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Dungeons`
--

INSERT INTO `Dungeons` VALUES(1, '1', 'Spellbook');

-- --------------------------------------------------------

--
-- Table structure for table `Enemies`
--

CREATE TABLE `Enemies` (
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
-- Dumping data for table `Enemies`
--

INSERT INTO `Enemies` VALUES(1, 'Rat', 'Vermin', 'Rat', 1, 1, 1, 1, 1, 1, 1, 1, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `Hero`
--

CREATE TABLE `Hero` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Hero`
--

INSERT INTO `Hero` VALUES(1, 'Otto', '3da541559918a808c2402bba5012f6c60b27661c', 'Elf', 'Mage', 0, 'The Order', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, 'nexttoenemy|moveaway||yourhpbelow50|casthealing||notnexttoenemy|rangedattack');
INSERT INTO `Hero` VALUES(2, 'Thog', '3da541559918a808c2402bba5012f6c60b27661c', 'Orc', 'Warrior', 0, 'The Order', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(6, 'test', 'f3bf7bcc1b33ac0091e38c1fa58a51359dbdd03d', 'Human', 'Warrior', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(7, 'Zacharius', '1161e6ffd3637b302a5cd74076283a7bd1fc20d3', 'Human', 'Archer', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(8, 'Darksage', '70fce4438c78d612a283ea0f5b7a8b30c655a94a', 'Elf', 'Warrior', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(10, 'Arkangel', 'dc80e118fc8ed4c7a554f6bcdb7ab91056fcd1cf', 'Elf', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(11, 'Iztar', '3da541559918a808c2402bba5012f6c60b27661c', 'Elf', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(12, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Human', 'Warrior', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(13, 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', 'Human', 'Archer', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(14, 'cc', 'bdb480de655aa6ec75ca058c849c4faf3c0f75b1', 'Human', 'Warrior', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(15, 'c', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', 'Human', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(16, 'd', '3c363836cf4e16666669a25da280a1865c2d2874', 'Human', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(17, 'e', '58e6b3a414a1e090dfc6029add0f3555ccba127f', 'Human', 'Mage', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(18, 'asdf', '3da541559918a808c2402bba5012f6c60b27661c', 'Human', 'Barbarian', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(19, 'Durkon', '3da541559918a808c2402bba5012f6c60b27661c', 'Dwarf', 'Priest', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(21, 'knight', '3da541559918a808c2402bba5012f6c60b27661c', 'Orc', 'Knight', 0, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 50, '');
INSERT INTO `Hero` VALUES(22, 'Dan', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'Human', 'Mage', 50, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 5000, '');

-- --------------------------------------------------------

--
-- Table structure for table `HeroInventory`
--

CREATE TABLE `HeroInventory` (
  `heroId` int(11) DEFAULT NULL,
  `heroName` char(30) COLLATE latin1_general_cs DEFAULT NULL,
  `itemPrefix` char(30) COLLATE latin1_general_cs DEFAULT NULL,
  `itemName` char(30) COLLATE latin1_general_cs DEFAULT NULL,
  `itemSuffix` char(30) COLLATE latin1_general_cs DEFAULT NULL,
  `equip` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `HeroInventory`
--


-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `equip` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` VALUES(2, 1, 2, 1);
INSERT INTO `Inventory` VALUES(3, 2, 2, 1);
INSERT INTO `Inventory` VALUES(4, 3, 2, 1);
INSERT INTO `Inventory` VALUES(5, 4, 2, 1);
INSERT INTO `Inventory` VALUES(6, 5, 2, 1);
INSERT INTO `Inventory` VALUES(11, 6, 1, 1);
INSERT INTO `Inventory` VALUES(12, 7, 1, 1);
INSERT INTO `Inventory` VALUES(13, 6, 2, 1);
INSERT INTO `Inventory` VALUES(15, 1, 2, 1);
INSERT INTO `Inventory` VALUES(16, 1, 2, 1);
INSERT INTO `Inventory` VALUES(17, 10, 2, 1);
INSERT INTO `Inventory` VALUES(18, 10, 2, 1);
INSERT INTO `Inventory` VALUES(19, 7, 11, 1);
INSERT INTO `Inventory` VALUES(20, 9, 11, 1);
INSERT INTO `Inventory` VALUES(21, 9, 11, 1);
INSERT INTO `Inventory` VALUES(63, 10, 22, 1);
INSERT INTO `Inventory` VALUES(64, 7, 22, 0);
INSERT INTO `Inventory` VALUES(65, 14, 22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ItemModifiers`
--

CREATE TABLE `ItemModifiers` (
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
-- Dumping data for table `ItemModifiers`
--

INSERT INTO `ItemModifiers` VALUES(8, 'of Fire', 'suffix', 'This one is made of fire.', 0, 0, 0, 0, 0, 0, -1, 0);
INSERT INTO `ItemModifiers` VALUES(10, 'Bludgeoning', 'prefix', 'This one is heavy.', 0, 0, 2, 0, 0, 0, 0, 0);
INSERT INTO `ItemModifiers` VALUES(15, 'Rusty', 'prefix', 'This one is rusty.', -1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ItemModifiers` VALUES(17, 'Bent', 'prefix', 'This one is bent.', 0, -1, 0, 0, 0, 0, 0, 0);
INSERT INTO `ItemModifiers` VALUES(18, 'Weak', 'prefix', 'This one is weaker than normal.', 0, 0, 0, -1, -1, -1, 0, 0);
INSERT INTO `ItemModifiers` VALUES(22, 'Frail', 'prefix', 'This one feels like it will fall apart.', 0, 0, -1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
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
-- Dumping data for table `Items`
--

INSERT INTO `Items` VALUES(1, 'Dagger', NULL, NULL, 'HAND', 'A sharp dagger.', 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(2, 'Leather Armor', NULL, NULL, 'TORSO', 'Cheap leather armor.', 0, 0, 0, 0, 1, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(3, 'Leather Boots', NULL, NULL, 'FEET', 'Cheap leather boots.', 0, 0, 0, 0, 0, 0, 1, 0, 0);
INSERT INTO `Items` VALUES(4, 'Leather Gloves', NULL, NULL, 'ARMS', 'Cheap leather gloves.', 0, 0, 0, 0, 0, 1, 0, 0, 0);
INSERT INTO `Items` VALUES(5, 'Leather Greaves', NULL, NULL, 'LEGS', 'Cheap leather greaves.', 0, 0, 0, 0, 1, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(6, 'Mage Robe', NULL, NULL, 'TORSO', 'A basic robe for a mage.', 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(7, 'Staff', NULL, NULL, 'HAND', 'A basic wooden staff.', 0, 0, 0, 1, 0, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(9, 'Spellbook', NULL, NULL, 'HAND', 'A spellbook to hold spells.', 0, 0, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO `Items` VALUES(10, 'Spellbook', NULL, 8, 'HAND', 'A spellbook to hold spells.', 50, 0, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO `Items` VALUES(11, 'Short Sword', NULL, NULL, 'HAND', 'A basic sword.', 0, 2, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(12, 'Long Sword', NULL, NULL, 'HAND', 'A longer sword.', 0, 3, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(14, 'Wooden Shield', 18, NULL, 'HAND', 'A basic shield.', 0, 0, 0, 0, 2, 2, 2, 0, 0);
INSERT INTO `Items` VALUES(15, 'Bow', NULL, NULL, 'HAND', 'A basic wooden bow.', 0, 0, 2, 0, 0, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(16, 'Greataxe', NULL, NULL, 'HAND', 'A large double-sided axe.', 0, 4, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(19, 'Priest Robe', NULL, NULL, 'TORSO', 'A basic robe for a priest.', 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `Items` VALUES(20, 'Holy Symbol', NULL, NULL, 'HAND', 'The symbol of a deity.', 0, 0, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO `Items` VALUES(21, 'Mace', NULL, NULL, 'HAND', 'A basic mace.', 0, 0, 0, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
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
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` VALUES(20, 'asdf', 'asdf', 'test2', 'test2', '04-07-14 15:33:06', 0);
INSERT INTO `Messages` VALUES(23, 'fizh', 'Otto', 'hey', 'sup', '05-07-14 16:36:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Party`
--

CREATE TABLE `Party` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `cd` int(11) NOT NULL,
  `applicants` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Party`
--

INSERT INTO `Party` VALUES(1, 'The Order', 0, 'Dan,Durkon');

-- --------------------------------------------------------

--
-- Table structure for table `Rooms`
--

CREATE TABLE `Rooms` (
  `rID` int(11) NOT NULL AUTO_INCREMENT,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `enemies` text COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`rID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Rooms`
--

INSERT INTO `Rooms` VALUES(1, 5, 5, 'Rat|Rat|Rat|Rat|Rat');
