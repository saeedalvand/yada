-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2017 at 09:03 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yadar`
--

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE `plays` (
  `playId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `stationId` int(11) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'in seconds',
  `won` tinyint(4) NOT NULL COMMENT '0 or 1',
  `playDateTime` datetime NOT NULL,
  `precisionGained` int(11) NOT NULL,
  `gemsGained` int(11) NOT NULL,
  `flaws` int(11) NOT NULL COMMENT 'number of times incorrect choice is selected',
  `protectUsed` tinyint(4) NOT NULL,
  `emoticonUsed` tinyint(4) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plays`
--

INSERT INTO `plays` (`playId`, `userId`, `stationId`, `duration`, `won`, `playDateTime`, `precisionGained`, `gemsGained`, `flaws`, `protectUsed`, `emoticonUsed`, `score`) VALUES
(35, 14, 11, 28, 1, '2017-02-20 14:05:00', 5, 1, 2, 0, 0, 4),
(36, 14, 12, 43, 1, '2017-02-20 14:06:06', 5, 0, 3, 0, 1, 3),
(37, 14, 14, 33, 1, '2017-02-20 14:07:13', 6, 1, 0, 0, 0, 7),
(38, 14, 13, 35, 1, '2017-02-20 14:07:55', 6, 1, 3, 1, 0, 4),
(39, 10, 11, 28, 1, '2017-02-20 14:05:00', 5, 1, 2, 0, 0, 4),
(40, 10, 12, 43, 1, '2017-02-20 14:06:06', 5, 0, 3, 0, 1, 3),
(41, 10, 14, 33, 1, '2017-02-20 14:07:13', 6, 1, 0, 0, 0, 7),
(42, 10, 13, 35, 1, '2017-02-20 14:07:55', 6, 1, 3, 1, 0, 4),
(43, 10, 12, 25, 1, '2017-02-20 15:33:32', 6, 1, 0, 0, 1, 7),
(44, 11, 11, 28, 1, '2017-01-20 14:05:00', 5, 1, 2, 0, 0, 4),
(45, 6, 12, 43, 1, '2017-02-15 14:06:06', 5, 0, 3, 0, 1, 32),
(53, 6, 11, 28, 1, '2016-02-20 14:05:00', 5, 1, 2, 0, 0, 1),
(54, 7, 12, 43, 1, '2017-02-17 14:06:06', 5, 0, 3, 0, 1, 3),
(55, 7, 14, 33, 1, '2017-02-20 14:07:13', 6, 1, 0, 0, 0, 7),
(56, 12, 13, 35, 1, '2017-02-06 14:07:55', 6, 1, 3, 1, 0, 4),
(57, 12, 11, 28, 1, '2017-02-10 14:05:00', 5, 1, 2, 0, 0, 4),
(58, 12, 12, 43, 1, '2017-02-20 14:06:06', 5, 0, 3, 0, 1, 3),
(59, 10, 14, 33, 1, '2017-02-20 14:07:13', 6, 1, 0, 0, 0, 7),
(60, 10, 13, 35, 1, '2017-02-20 14:07:55', 6, 1, 3, 1, 0, 4),
(61, 10, 12, 25, 1, '2017-02-20 15:33:32', 6, 1, 0, 0, 1, 7),
(62, 11, 11, 28, 1, '2017-01-20 14:05:00', 5, 1, 2, 0, 0, 4),
(63, 6, 12, 43, 1, '2017-02-12 14:06:06', 5, 0, 3, 0, 1, 32),
(64, 10, 13, 33, 1, '2017-02-21 23:05:08', 4, 1, 1, 0, 0, 4),
(65, 10, 13, 34, 1, '2017-02-21 23:05:52', 7, 2, 0, 0, 0, 8),
(66, 10, 13, 20, 1, '2017-02-21 23:09:23', 7, 2, 0, 0, 0, 8),
(67, 10, 13, 27, 1, '2017-02-21 23:10:07', 7, 2, 0, 0, 0, 8),
(68, 10, 4, 37, 1, '2017-02-21 23:29:01', 7, 1, 1, 0, 0, 7),
(69, 10, 4, 27, 1, '2017-02-21 23:29:47', 7, 2, 0, 0, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pointsbeforeexam`
--

CREATE TABLE `pointsbeforeexam` (
  `uid` int(11) NOT NULL,
  `precisionValue` int(11) NOT NULL,
  `perfectionValue` int(11) NOT NULL,
  `punctualityValue` int(11) NOT NULL,
  `presenceValue` int(11) NOT NULL,
  `paceValue` int(11) NOT NULL,
  `step` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `loginId` text NOT NULL,
  `email` text NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '0= female, 1=male',
  `avatar` tinyint(4) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `controlTest` tinyint(4) NOT NULL COMMENT 'between 1 to 5',
  `level` tinyint(4) NOT NULL COMMENT 'between 1 to 6',
  `score` int(11) NOT NULL,
  `precisionValue` int(11) NOT NULL,
  `perfectionValue` int(11) NOT NULL,
  `punctualityValue` int(11) NOT NULL,
  `presenceValue` int(11) NOT NULL,
  `paceValue` int(11) NOT NULL,
  `version` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `loginId`, `email`, `gender`, `avatar`, `age`, `controlTest`, `level`, `score`, `precisionValue`, `perfectionValue`, `punctualityValue`, `presenceValue`, `paceValue`, `version`) VALUES
(2, 'mehran', '', '', 1, 7, 2, 2, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(3, 'm341ehran', 'AvIJ1487356110dZzb', 'an@anine.an', 121, 127, 127, 2, 127, 0, 0, 0, 0, 0, 0, '41.0'),
(4, 'mehran', 'xDaW1487370389mrnZ', 'an@anine.cn', 1, 7, 2, 2, 1, 0, 0, 0, 0, 0, 0, '1.0'),
(5, 'Mehranou', 'xQk61487370487ZqzT', '', 1, 0, 3, 1, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(6, 'Mehranou', '7CUp1487370633RF7Q', '', 1, 0, 3, 1, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(7, 'Mehran', 'TzC01487518529k24w', '', 1, 0, 1, 5, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(8, 'Mehran', 'dbvs1487518563bVUF', '', 1, 0, 1, 5, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(9, 'Mehran', 'z7CE1487520124b24P', '', 1, 0, 1, 5, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(10, 'azghar', 'zPXv1487520154ehE5', '', 1, 0, 1, 5, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(11, 'khanaf', 'M5XV1487520290BnHj', '', 1, 0, 1, 5, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(12, 'firooz', '5xVZ1487520395kh4z', '', 1, 0, 1, 5, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(13, 'masoud', 'u2Ad1487520564LNhf', '', 1, 0, 1, 5, 0, 0, 0, 0, 0, 0, 0, '1.0'),
(14, 'saeed', 'JJTY1487520652Ew7z', 'gholizadeh1992@gmail.com', 1, 0, 1, 5, 1, 0, 0, 0, 0, 0, 0, '1.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plays`
--
ALTER TABLE `plays`
  ADD PRIMARY KEY (`playId`);

--
-- Indexes for table `pointsbeforeexam`
--
ALTER TABLE `pointsbeforeexam`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plays`
--
ALTER TABLE `plays`
  MODIFY `playId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
