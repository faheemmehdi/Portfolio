-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 09:14 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `abouttext` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `heading`, `abouttext`) VALUES
(1, 'Professional Heading', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aspernatur, sed dicta minima architecto commodi consequuntur quidem officiis et earum magnam, est eum minus<br> doloribus vero excepturi im<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aspernatur, sed dicta ');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `profile_img` varchar(250) NOT NULL,
  `web_title` varchar(250) NOT NULL,
  `web_footer` varchar(255) NOT NULL,
  `siteicon` varchar(200) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `site_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `description`, `profile_img`, `web_title`, `web_footer`, `siteicon`, `keywords`, `site_description`) VALUES
(1, 'Faheem Mehdi', 'Best Developer', 'faheem (1).jpg', 'Faheem Mehdi || BakesCode', 'awdmwkdm', 'title.png', 'programmer,php developer,web developermckdsd', 'This is portfolio website');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_msg` varchar(300) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `user_name`, `user_email`, `user_msg`, `date_time`, `status`) VALUES
(56, 'faheem', 'faheem@gmail.com', 'dnkeajda', '2020-10-21 12:02:24', 1),
(57, 'Faheem mehdi', 'faheem@gmail.com', 'Hello sir', '2020-10-27 18:03:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `insta` varchar(250) NOT NULL,
  `linkedin` varchar(250) NOT NULL,
  `github` varchar(250) NOT NULL,
  `medium` varchar(250) NOT NULL,
  `stackoverflow` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `googleplus` varchar(255) NOT NULL,
  `quora` varchar(255) NOT NULL,
  `keybase` varchar(255) NOT NULL,
  `reddit` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailbody` varchar(250) NOT NULL,
  `whatsapp` varchar(250) NOT NULL,
  `whatsappmsg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `fb`, `insta`, `linkedin`, `github`, `medium`, `stackoverflow`, `twitter`, `youtube`, `googleplus`, `quora`, `keybase`, `reddit`, `email`, `emailbody`, `whatsapp`, `whatsappmsg`) VALUES
(1, 'https://www.facebook.com/faheem.mehdi/', 'https://www.instagram.com/faheem.mehdi/', 'https://www.linkedin.com/faheem.mehdi/', 'https://www.github.com/faheem.mehdi/', 'https://www.medium.com/faheem.mehdi/', 'https://www.stackoverflow.com/faheem.mehdi/', 'www.akjdk.comdkmwk', 'https://www.stackoverflow.com/faheem.mehdi/', 'googleplus11', 'quoraquoraquora', 'keybasekeybasekeybase', 'redditredditreddit', 'faheem@gmail.com', 'Hello, Faheem Mehdi', '+923157079241', 'Hello, Faheem Mehdi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'de20f43e34ce2c3d24acc6302f428c20cc6c4ae6');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `percentage` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `percentage`) VALUES
(9, 'CSS', 95),
(10, 'JQuery', 75),
(11, 'BootStrap', 85),
(17, 'php', 99),
(18, 'Jquery', 62);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `bgcolor` varchar(255) NOT NULL,
  `fontcolor` varchar(255) NOT NULL,
  `iconcolor` varchar(255) NOT NULL,
  `aboutbtn` varchar(255) NOT NULL,
  `resumebtn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `bgcolor`, `fontcolor`, `iconcolor`, `aboutbtn`, `resumebtn`) VALUES
(1, '#ededed', '#1a1919', '#463f3f', '#29a6db', '#00ff00');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `id` int(11) NOT NULL,
  `total_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`id`, `total_count`) VALUES
(1, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
