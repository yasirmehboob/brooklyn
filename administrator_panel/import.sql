-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 13, 2017 at 10:41 AM
-- Server version: 5.5.42-log
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `descp` longtext NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `descp`, `user`) VALUES
(1, '&lt;h1&gt;About us&amp;nbsp;&lt;/h1&gt;\r\n\r\n&lt;p&gt;Tutuapp APK is available easily on the internet. Before downloading the app make sure it is from a trusted site or else it may add up bugs to your phone. To install TuTuApp APK on your device, just follow these easy steps and you ï»¿areï»¿ done!&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Modify the following in your device: Open Settings option of the app.&lt;/li&gt;\r\n	&lt;li&gt;Scroll down to the security menu and click it.&lt;/li&gt;\r\n	&lt;li&gt;Go to the &amp;ldquo;Unknown Sources&amp;rdquo; option there.&lt;/li&gt;\r\n	&lt;li&gt;Click the check box to enable the unknown sources option.&lt;/li&gt;\r\n	&lt;li&gt;Now you are ready to download Tutuapp APK, Download app using the link here: TuTu App&amp;nbsp;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', 'ornalet');

-- --------------------------------------------------------

--
-- Table structure for table `act`
--

CREATE TABLE `act` (
  `id` int(11) NOT NULL DEFAULT '0',
  `t_ref` varchar(20) NOT NULL,
  `r_ref` varchar(20) NOT NULL,
  `act` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dt` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(11) NOT NULL,
  `blood` varchar(3) NOT NULL,
  `status` int(1) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `blood`, `status`, `del`) VALUES
(1, 'O-', 1, 'N'),
(2, 'G+', 1, 'Y'),
(3, 'A-', 1, 'N'),
(4, 'A+', 1, 'N'),
(5, 'B-', 1, 'N'),
(6, 'B+', 1, 'N'),
(7, 'AB-', 1, 'N'),
(8, 'AB+', 1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dir` varchar(200) NOT NULL,
  `files_1` varchar(200) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country_id`, `city`, `dir`, `files_1`, `del`) VALUES
(1, 3, 'ABBOTTABAD', 'city', 'city-11-02-17-21-54-05.jpg', 'N'),
(2, 1, 'ATTOCK', 'city', 'city-11-02-17-21-26-37.jpg', 'N'),
(3, 1, 'BAGH', 'city', 'city-11-02-17-21-27-17.jpg', 'N'),
(4, 1, 'BAHAWAL NAGAR', 'city', 'city-11-02-17-21-52-28.jpg', 'N'),
(5, 1, 'BAHAWALPUR', 'city', 'city-11-02-17-21-52-51.jpg', 'N'),
(6, 1, 'BANNU', 'city', 'city-12-02-17-19-20-07.jpg', 'N'),
(7, 1, 'BATKHELA', '', '', 'N'),
(8, 1, 'BHAKKAR', '', '', 'N'),
(9, 1, 'BHIMBER', '', '', 'N'),
(10, 1, 'CHAKWAL', '', '', 'N'),
(11, 1, 'CHARSADDA', '', '', 'N'),
(12, 1, 'CHITRAL', '', '', 'N'),
(13, 1, 'DADU', '', '', 'N'),
(14, 1, 'DERA GHAZI KHAN', '', '', 'N'),
(15, 1, 'DERA ISMAIL KHAN', '', '', 'N'),
(16, 1, 'FAISALABAD', '', '', 'N'),
(17, 1, 'GILGIT', '', '', 'N'),
(18, 1, 'GUJAR KHAN', '', '', 'N'),
(19, 1, 'GUJRANWALA', '', '', 'N'),
(20, 1, 'GUJRAT', '', '', 'N'),
(21, 1, 'Hafiz Abad', '', '', 'N'),
(22, 1, 'HARIPUR', '', '', 'N'),
(23, 1, 'HYDERABAD', '', '', 'N'),
(24, 1, 'ISLAMABAD', '', '', 'N'),
(25, 1, 'JACOBABAD', '', '', 'N'),
(26, 1, 'JHANG', '', '', 'N'),
(27, 1, 'JHELUM', '', '', 'N'),
(28, 1, 'Kahuta', '', '', 'N'),
(29, 1, 'KARACHI ALHYDRI', '', '', 'N'),
(30, 1, 'KASHMIR', '', '', 'N'),
(31, 1, 'KARACHI', '', '', 'N'),
(33, 1, 'KARAK', '', '', 'N'),
(34, 1, 'KASUR', '', '', 'N'),
(35, 1, 'KHAIR PUR', '', '', 'N'),
(36, 1, 'KHANEWAL', '', '', 'N'),
(37, 1, 'KHUSHAB', '', '', 'N'),
(38, 1, 'KHUZDAR', '', '', 'N'),
(39, 1, 'KOHAT', '', '', 'N'),
(40, 1, 'KORANGI', '', '', 'N'),
(41, 1, 'KOTLI  (AK)', '', '', 'N'),
(43, 1, 'LAHORE', '', '', 'N'),
(44, 1, 'Lakki Marwat', '', '', 'N'),
(45, 1, 'LARKANA', '', '', 'N'),
(46, 1, 'LAYYAH', '', '', 'N'),
(47, 1, 'LORALAI', '', '', 'N'),
(48, 1, 'MANDI BAHAUDDIN', '', '', 'N'),
(49, 1, 'MANSEHRA', '', '', 'N'),
(50, 1, 'MARDAN', '', '', 'N'),
(51, 1, 'MIANWALI', '', '', 'N'),
(52, 1, 'MIRPUR', '', '', 'N'),
(53, 1, 'MIRPUR KHAS', '', '', 'N'),
(54, 1, 'MULTAN', '', '', 'N'),
(55, 1, 'MURREE', '', '', 'N'),
(56, 1, 'MUZAFFARABAD', '', '', 'N'),
(57, 1, 'MUZAFFARGARH', '', '', 'N'),
(58, 1, 'NAROWAL', '', '', 'N'),
(59, 1, 'NAWABSHAH', '', '', 'N'),
(60, 1, 'NEW TOWN', '', '', 'N'),
(61, 1, 'NOWSHERA', '', '', 'N'),
(62, 1, 'OKARA', '', '', 'N'),
(63, 1, 'Palandri', '', '', 'N'),
(64, 1, 'PESHAWAR', '', '', 'N'),
(65, 1, 'QILA SHEIKHUPURA', '', '', 'N'),
(66, 1, 'QUETTA', '', '', 'N'),
(67, 1, 'RAHIMYAR KHAN', '', '', 'N'),
(68, 1, 'RAWALKOT', '', '', 'N'),
(69, 1, 'RAWALPINDI', '', '', 'N'),
(70, 1, 'SAHIWAL', '', '', 'N'),
(71, 1, 'SAIDU SHARIF', '', '', 'N'),
(72, 1, 'SANGHAR', '', '', 'N'),
(73, 1, 'SARGODHA', '', '', 'N'),
(74, 1, 'SHIKARPUR', '', '', 'N'),
(75, 1, 'SIALKOT', '', '', 'N'),
(76, 1, 'SIBI', '', '', 'N'),
(77, 1, 'SUKKUR', '', '', 'N'),
(78, 1, 'TALAGANG', '', '', 'N'),
(79, 1, 'TANK', '', '', 'N'),
(80, 1, 'TOBA TAKE SINGH', '', '', 'N'),
(81, 1, 'TURBAT', '', '', 'N'),
(82, 1, 'VEHARI', '', '', 'N'),
(83, 1, 'WAH CANTT', '', '', 'N'),
(84, 2, 'Auckland', '', '', 'N'),
(88, 1, 'New City', 'city', 'city-11-02-17-21-20-27.jpg', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Pakistan'),
(2, 'New Zealand'),
(3, 'Russia');

-- --------------------------------------------------------

--
-- Table structure for table `ornasys`
--

CREATE TABLE `ornasys` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `domain` varchar(300) NOT NULL,
  `icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ornasys`
--

INSERT INTO `ornasys` (`id`, `user`, `logo`, `domain`, `icon`) VALUES
(1, 'Un-Named', 'logo.png', 'www.reddrop.com.pk', 'fa-university');

-- --------------------------------------------------------

--
-- Table structure for table `ornasys_mnu`
--

CREATE TABLE `ornasys_mnu` (
  `id` int(11) NOT NULL,
  `folder` varchar(500) NOT NULL,
  `reg_id` varchar(11) NOT NULL,
  `f_nm` varchar(30) NOT NULL,
  `f_lnk` varchar(50) NOT NULL,
  `user` varchar(10) NOT NULL,
  `dt` varchar(11) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ornasys_mnu`
--

INSERT INTO `ornasys_mnu` (`id`, `folder`, `reg_id`, `f_nm`, `f_lnk`, `user`, `dt`, `del`, `icon`) VALUES
(59, '', '', 'Access Privileges', 'privilege-list', 'ornalet', '1476683623', 'N', 'fa-lock '),
(60, '', '', 'Change Password', 'change-password', 'ornalet', '1476683623', 'N', 'fa-key'),
(62, '', '', 'About Us', 'about', 'ornalet', '1476683623', 'N', 'fa-info'),
(63, '', 'N/A', 'Content Privileges', 'content-privilege-list', 'ornalet', '1486832229', 'N', 'fa-database ');

-- --------------------------------------------------------

--
-- Table structure for table `ornasys_tbl`
--

CREATE TABLE `ornasys_tbl` (
  `id` int(11) NOT NULL,
  `tname_db` varchar(20) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `binary_object` varchar(3) NOT NULL DEFAULT 'no',
  `user` varchar(20) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `del` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ornasys_tbl`
--

INSERT INTO `ornasys_tbl` (`id`, `tname_db`, `display_name`, `binary_object`, `user`, `icon`, `dt`, `del`) VALUES
(16, 'city', 'Cities', 'yes', 'ornalet', 'fa-users', '', 'N'),
(17, 'country', 'Countries', 'no', 'ornalet', 'fa-map-signs', '', 'N'),
(20, 'pins', 'Pins', 'no', 'ornalet', 'fa-map-pin', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `location` varchar(20) NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `del` varchar(1) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pins`
--

INSERT INTO `pins` (`id`, `name`, `description`, `location`, `country`, `city`, `del`, `dt`, `user`) VALUES
(1, 'Basit ', 'This is a testing Pin', 'Khyaban e Sir Syed ', 1, 1, 'N', '1486833341', 'ornalet');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `display_name`, `name`, `password`) VALUES
(1, 'Basit Hameed', 'ornalet', '3267c8273860b22f541f4f76c860b581');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country fk` (`country_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ornasys`
--
ALTER TABLE `ornasys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ornasys_mnu`
--
ALTER TABLE `ornasys_mnu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ornasys_tbl`
--
ALTER TABLE `ornasys_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country` (`country`),
  ADD KEY `city` (`city`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ornasys_mnu`
--
ALTER TABLE `ornasys_mnu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `ornasys_tbl`
--
ALTER TABLE `ornasys_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `countryid` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `ornasys_tbl`
--
ALTER TABLE `ornasys_tbl`
  ADD CONSTRAINT `user fk1` FOREIGN KEY (`user`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pins`
--
ALTER TABLE `pins`
  ADD CONSTRAINT `city fk` FOREIGN KEY (`city`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `country fk` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user fk` FOREIGN KEY (`user`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
