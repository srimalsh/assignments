-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 02:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clique_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`articleID` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subTitle` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headerImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `htmlName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articleContent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editedBy` tinyint(4) NOT NULL DEFAULT '0',
  `approvedBy` tinyint(4) NOT NULL DEFAULT '0',
  `isApproved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleID`, `title`, `subTitle`, `headerImage`, `htmlName`, `category`, `articleContent`, `publishedDate`, `editedBy`, `approvedBy`, `isApproved`) VALUES
(1, 'test title one', 'test sub title one', NULL, '', 'a', 'test sub title onetest sub title onetest sub title onetest sub title onetest sub title onetest sub title onetest sub title onetest sub title onetest sub title onetest sub title onetest sub title one', '2022-04-12 17:27:55', 0, 0, 1),
(26, 'John', 'Doe', '428-capture.jpg', NULL, NULL, '<p>This is some sample content.</p>', '2022-04-14 12:06:04', 1, 0, 0),
(27, 'John', 'Doe', '822-capture.jpg', NULL, NULL, '<p>This is some sample content.</p>', '2022-04-14 12:11:54', 1, 0, 0),
(28, 'John', 'Doe', '318-capture.jpg', NULL, NULL, '<p>This is some sample content.</p>', '2022-04-14 12:12:40', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userID` int(11) NOT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userpass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `displayname`, `username`, `userpass`, `level`) VALUES
(1, 'Srimal Iresh', 'srimal@abcd.com', 'b3f947379e88aab49c26f395aa0ebaee', 0),
(2, 'asdasd', 'asdasd', '356a192b7913b04c54574d18c28d46e6395428ab', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`articleID`), ADD KEY `isApproved` (`isApproved`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
