-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 30, 2023 at 10:12 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brooklyn_new`
--

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
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `titile` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `dt` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `titile`, `type`, `del`, `dt`, `user`) VALUES
(1, 'adf', 2, '', '1685099418', 'ornalet'),
(5, 'new aaa', 3, '', '1685102797', 'ornalet');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_link`
--

CREATE TABLE `attribute_link` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribuite_id` int(11) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `dt` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_type`
--

CREATE TABLE `attribute_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `dt` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_type`
--

INSERT INTO `attribute_type` (`id`, `type`, `del`, `dt`, `user`) VALUES
(1, 'Swatches', 'N', '1684512771', 'unknown'),
(2, 'Dropdown', 'N', '1684512846', 'unknown'),
(3, 'Colors', 'N', '1684515286', 'unknown'),
(4, 'Sizes', 'N', '1684515293', 'unknown');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(200) NOT NULL,
  `color_code` varchar(10) NOT NULL,
  `files_1` varchar(200) NOT NULL,
  `dir` varchar(200) NOT NULL,
  `tooltip` varchar(50) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(5) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `dt` varchar(20) NOT NULL,
  `del` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `display_name`, `name`, `password`, `dt`, `del`) VALUES
(0, 'Miscellaneous', 'unknown', '3079bce163903d281f671a0496e3657d', '', 'Y'),
(1, 'Yasir Mehboob', 'ornalet', '3267c8273860b22f541f4f76c860b581', '', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `comment_report`
--

CREATE TABLE `comment_report` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `report_by_user` varchar(200) NOT NULL,
  `dt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `cnic` varchar(25) NOT NULL,
  `email` varchar(150) NOT NULL,
  `email_verify` varchar(1) NOT NULL DEFAULT 'N',
  `mobile_number` varchar(20) NOT NULL,
  `mobile_number_verify` varchar(1) NOT NULL DEFAULT 'N',
  `shipping_address_1` text NOT NULL,
  `shipping_address_2` text NOT NULL,
  `files_1` varchar(100) NOT NULL,
  `dir` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL DEFAULT 'Uncategorized',
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `app_id` text NOT NULL,
  `app_id_ios` text NOT NULL,
  `dt` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `del` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `f_name`, `l_name`, `gender`, `dob`, `cnic`, `email`, `email_verify`, `mobile_number`, `mobile_number_verify`, `shipping_address_1`, `shipping_address_2`, `files_1`, `dir`, `city`, `username`, `password`, `app_id`, `app_id_ios`, `dt`, `status`, `del`) VALUES
(15, 'Yasir', 'Mehboob', 'Male', '2016-12-31', '657657576576', 'yasir_u@yahoo.com', 'N', '3465134970', 'N', 'Office no 1, 10th Floor, Green Trust Tower Blue Area', '', 'users-03-08-19-10-11-37.png', 'users', 'Regular', 'metafit', '3267c8273860b22f541f4f76c860b581', '', '', '1564812697', 'approved', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `customer_category`
--

CREATE TABLE `customer_category` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `del` varchar(1) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_category`
--

INSERT INTO `customer_category` (`id`, `category`, `del`, `dt`, `user`) VALUES
(1, 'Regular', 'N', '1486832229', 'phadmin'),
(2, 'Temporary', 'N', '1486832229', 'phadmin'),
(5, 'Uncategorized', 'N', '1486832229', 'phadmin');

-- --------------------------------------------------------

--
-- Table structure for table `customer_log`
--

CREATE TABLE `customer_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `action_user` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `computer_name` varchar(200) NOT NULL,
  `dt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_address` text NOT NULL COMMENT 'The Shipping Address for this Order',
  `customer_note` text NOT NULL COMMENT 'A Note or a Message from customer at the time of order placement',
  `invoice_total` int(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL COMMENT 'The Mode of Payment, E.G COD',
  `payment_clearance_status` varchar(1) NOT NULL DEFAULT 'N',
  `shipping_vendor` int(11) NOT NULL COMMENT 'The Shipping Company',
  `shipping_charges` decimal(6,2) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'not_fulfilled' COMMENT 'Current Status of the Order',
  `order_handler` varchar(200) NOT NULL DEFAULT 'unknown' COMMENT 'The Person Who manage and pack the order to the delivery person, Typically the Sales Manager',
  `order_handler_comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_trans`
--

CREATE TABLE `orders_trans` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_value_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `actual_price` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ornasys`
--

CREATE TABLE `ornasys` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `domain` varchar(300) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `maintenance_mode` varchar(10) NOT NULL DEFAULT 'disabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ornasys`
--

INSERT INTO `ornasys` (`id`, `user`, `logo`, `domain`, `icon`, `maintenance_mode`) VALUES
(1, 'BigShop', 'logo.png', 'www.bigbookcloud.com', 'fa-dumbbell', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `ornasys_menu_plugin`
--

CREATE TABLE `ornasys_menu_plugin` (
  `id` int(11) NOT NULL,
  `plugin` varchar(100) NOT NULL,
  `access_to` varchar(20) NOT NULL,
  `sort` int(11) NOT NULL,
  `dir` varchar(10) NOT NULL DEFAULT 'inc',
  `del` varchar(1) NOT NULL DEFAULT 'n',
  `dt` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ornasys_menu_plugin`
--

INSERT INTO `ornasys_menu_plugin` (`id`, `plugin`, `access_to`, `sort`, `dir`, `del`, `dt`, `user`) VALUES
(1, 'user_counter.inc', 'ornalet', 1, 'inc', 'Y', '1491121012', 'ornalet'),
(2, 'content_counter.php', 'ornalet', 1, 'inc', 'Y', '1491121033', 'ornalet'),
(3, 'content_widget.php', 'ornalet', 3, 'inc', 'Y', '1491121100', 'ornalet'),
(4, 'plugin_user_feed.php', 'ornalet', 2, 'inc', 'Y', '1491121100', 'ornalet'),
(5, 'plugin_announcement.php', 'ornalet', 3, 'inc', 'Y', '1491121100', 'ornalet'),
(6, 'plugin_ecommerce.php', 'ornalet', 1, 'inc', 'N', '1491121100', 'ornalet');

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
  `sort` int(11) NOT NULL DEFAULT '1',
  `dt` varchar(11) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ornasys_mnu`
--

INSERT INTO `ornasys_mnu` (`id`, `folder`, `reg_id`, `f_nm`, `f_lnk`, `user`, `sort`, `dt`, `del`, `icon`) VALUES
(59, '', '', 'Access Privileges', 'privilege-list', 'ornalet', 0, '1476683623', 'N', 'fa-lock '),
(60, '', '', 'Change Password', 'change-password', 'ornalet', 1, '1476683623', 'N', 'fa-key'),
(63, '', 'N/A', 'Content Privileges', 'content-privilege-list', 'ornalet', 1, '1486832229', 'N', 'fa-table '),
(65, '', 'N/A', 'Customers', 'customer-list', 'ornalet', 1, '1490866000', 'N', 'fa-user '),
(69, '', 'N/A', 'Product', 'product', 'ornalet', 1, '1490896471', 'N', 'fa-shopping-basket '),
(72, '', 'N/A', 'DashBoard Plugins', 'content-list.php?t=ornasys_menu_plugin&ext=', 'ornalet', 1, '1491121692', 'N', 'fa-bar-chart '),
(75, '', 'N/A', 'Report Privilages', 'report-list', 'ornalet', 0, '1515922144', 'N', 'fa-print '),
(79, '', 'N/A', 'Product Arrangement', 'product_arrangement', 'ornalet', 2, '1684483887', 'N', 'fa-sitemap '),
(80, '', 'N/A', 'Attributes', 'product_attribute', 'ornalet', 3, '1684502455', 'N', 'fa-paperclip '),
(81, '', 'N/A', 'Invoices', 'product_invoice', 'ornalet', 4, '1684592580', 'N', 'fa-bookmark ');

-- --------------------------------------------------------

--
-- Table structure for table `ornasys_rep`
--

CREATE TABLE `ornasys_rep` (
  `id` int(11) NOT NULL,
  `rep_nm` varchar(200) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `binary_object` varchar(3) NOT NULL DEFAULT 'no',
  `user` varchar(20) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ornasys_tbl`
--

CREATE TABLE `ornasys_tbl` (
  `id` int(11) NOT NULL,
  `tname_db` varchar(50) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `binary_object` varchar(3) NOT NULL DEFAULT 'no',
  `user` varchar(20) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `del` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ornasys_tbl`
--

INSERT INTO `ornasys_tbl` (`id`, `tname_db`, `display_name`, `sort`, `binary_object`, `user`, `icon`, `dt`, `del`) VALUES
(1, 'attribute_type', 'Attribute Category', 1, 'no', 'ornalet', 'th-large', '1684512626', 'N'),
(2, 'product_category_basic', 'Product Category', 1, 'no', 'ornalet', '', '1687867541', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `descp` text NOT NULL,
  `product_category` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `price` decimal(6,1) NOT NULL,
  `sale` varchar(1) NOT NULL DEFAULT 'N',
  `sale_discounted_price` int(11) NOT NULL,
  `hot_selling` varchar(1) NOT NULL DEFAULT 'N',
  `featured_product` varchar(1) NOT NULL DEFAULT 'N',
  `new_arrival` varchar(1) NOT NULL DEFAULT 'N',
  `taxable` varchar(1) NOT NULL DEFAULT 'N',
  `tax_percentage` decimal(6,1) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `dt` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `descp`, `product_category`, `rating`, `tags`, `price`, `sale`, `sale_discounted_price`, `hot_selling`, `featured_product`, `new_arrival`, `taxable`, `tax_percentage`, `del`, `dt`, `user`) VALUES
(1, 'Formen', '', 2, 0, '', '120.0', 'o', 100, 'o', 'o', 'o', 'Y', '17.0', 'N', '1687868241', 'ornalet'),
(3, 'CMZ-3', '', 1, 0, '', '1762.0', 'Y', 1500, '', 'Y', '', 'Y', '16.0', 'N', '1687868376', 'ornalet'),
(5, 'name', '', 1, 0, '', '500.0', 'Y', 200, 'Y', 'Y', '', 'N', '17.0', 'N', '1687889704', 'ornalet'),
(6, 'prod name', '<p>taing</p>\r\n', 1, 0, '', '1340.0', 'Y', 23, '', 'Y', '', 'Y', '23.0', 'N', '1688135401', 'ornalet'),
(7, 'prod name', '<p>taing</p>\r\n', 1, 0, '', '1340.0', 'Y', 23, '', 'Y', '', 'Y', '23.0', 'N', '1688135401', 'ornalet'),
(8, 'name', '', 2, 0, '', '0.0', 'Y', 243, '', 'Y', '', 'Y', '234.0', 'N', '1688135445', 'ornalet'),
(9, 'Producd name testing', '<p>tesing data from desctipion</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2, 0, '', '5000.0', '', 768, 'Y', 'Y', 'Y', 'Y', '576.0', 'N', '1688135680', 'ornalet'),
(10, 'proejct name', '<p>stestsg</p>\r\n', 3, 0, '', '12.0', 'Y', 23, '', 'Y', '', 'N', '0.0', 'N', '1688136342', 'ornalet');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'parent',
  `parent_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `dt` int(20) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `title`, `type`, `parent_id`, `sort`, `icon`, `dt`, `del`, `user`) VALUES
(1, 'Winters', 'parent', 0, 0, '', 1684297429, 'N', 'ornalet'),
(2, 'Summers', 'parent', 0, 0, '', 1684297429, 'N', 'ornalet'),
(3, 'Sale', 'parent', 0, 0, '', 1684297429, 'N', 'ornalet'),
(4, 'New Arrival', 'parent', 0, 0, '', 1684297429, 'N', 'ornalet'),
(5, 'Hot Selling', 'parent', 0, 0, '', 1684297429, 'N', 'ornalet'),
(6, 'Boys', 'child', 1, 0, '', 1684297429, 'N', 'ornalet'),
(7, 'Boys', 'child', 2, 0, '', 1684297429, 'N', 'ornalet'),
(8, 'Girls', 'child', 1, 0, '', 1684297429, 'N', 'ornalet'),
(10, 'Shirts', 'child', 6, 0, '', 1684297429, 'N', 'ornalet'),
(11, 'Pants', 'child', 6, 0, '', 1684297429, 'N', 'ornalet'),
(12, 'Active Wears', 'child', 6, 0, '', 1684297429, 'N', 'ornalet'),
(13, 'Accessories', 'child', 6, 0, '', 1684297429, 'N', 'ornalet'),
(14, 'T-Shirts', 'child', 10, 0, '', 1684297429, 'N', 'ornalet'),
(15, 'Polo-Shirts', 'child', 10, 0, '', 1684297429, 'N', 'ornalet'),
(16, 'casual-Shirts', 'child', 10, 0, '', 1684297429, 'N', 'ornalet'),
(17, 'Swimming suites ', 'child', 12, 0, '', 1684297429, 'N', 'ornalet'),
(18, 'Gym Track Suites ', 'child', 12, 0, '', 1684297429, 'N', 'ornalet');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_basic`
--

CREATE TABLE `product_category_basic` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `dt` varchar(20) NOT NULL,
  `user` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category_basic`
--

INSERT INTO `product_category_basic` (`id`, `category`, `del`, `dt`, `user`) VALUES
(1, 'Vitamins', 'N', '', 'ornalet'),
(2, 'For Mens', 'N', '1687867635', 'unknown'),
(3, 'Skin Care', 'N', '1687867650', 'unknown');

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `del` varchar(1) NOT NULL,
  `dt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `files_1` varchar(200) NOT NULL,
  `dir` varchar(200) NOT NULL,
  `dt` varchar(20) NOT NULL DEFAULT 'N',
  `del` varchar(1) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_vendors`
--

CREATE TABLE `shipping_vendors` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(200) NOT NULL,
  `shiping_charges` decimal(6,2) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'N',
  `dt` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titile` (`titile`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `attribute_link`
--
ALTER TABLE `attribute_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `attribuite_id` (`attribuite_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `attribute_type`
--
ALTER TABLE `attribute_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_id` (`attribute_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country fk` (`country_id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comment_report`
--
ALTER TABLE `comment_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `report_by_user` (`report_by_user`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- Indexes for table `customer_category`
--
ALTER TABLE `customer_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `customer_log`
--
ALTER TABLE `customer_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `action_user` (`action_user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shipping_vendor` (`shipping_vendor`),
  ADD KEY `shipping_vendor_2` (`shipping_vendor`),
  ADD KEY `order_handler` (`order_handler`);

--
-- Indexes for table `orders_trans`
--
ALTER TABLE `orders_trans`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `attribute_value_id` (`attribute_value_id`);

--
-- Indexes for table `ornasys`
--
ALTER TABLE `ornasys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ornasys_menu_plugin`
--
ALTER TABLE `ornasys_menu_plugin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_user` (`access_to`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `ornasys_mnu`
--
ALTER TABLE `ornasys_mnu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `ornasys_rep`
--
ALTER TABLE `ornasys_rep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `ornasys_tbl`
--
ALTER TABLE `ornasys_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `product_category_basic`
--
ALTER TABLE `product_category_basic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer` (`customer`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `shipping_vendors`
--
ALTER TABLE `shipping_vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `attribute_link`
--
ALTER TABLE `attribute_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attribute_type`
--
ALTER TABLE `attribute_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment_report`
--
ALTER TABLE `comment_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `customer_category`
--
ALTER TABLE `customer_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_log`
--
ALTER TABLE `customer_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ornasys_menu_plugin`
--
ALTER TABLE `ornasys_menu_plugin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ornasys_mnu`
--
ALTER TABLE `ornasys_mnu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `ornasys_rep`
--
ALTER TABLE `ornasys_rep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ornasys_tbl`
--
ALTER TABLE `ornasys_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `product_category_basic`
--
ALTER TABLE `product_category_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_vendors`
--
ALTER TABLE `shipping_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute`
--
ALTER TABLE `attribute`
  ADD CONSTRAINT `users_fk_attribuite` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attribute_link`
--
ALTER TABLE `attribute_link`
  ADD CONSTRAINT `attribuite_id_fk` FOREIGN KEY (`attribuite_id`) REFERENCES `attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_attribuite_link` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attribute_type`
--
ALTER TABLE `attribute_type`
  ADD CONSTRAINT `users_fk_7678` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD CONSTRAINT `attribuite_id_fk_123` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_9832` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `countryid` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_id_fk_768` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `person_who_handel_order_fk` FOREIGN KEY (`order_handler`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shiping_vendor_fk_76` FOREIGN KEY (`shipping_vendor`) REFERENCES `shipping_vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_trans`
--
ALTER TABLE `orders_trans`
  ADD CONSTRAINT `attribuite_value_id_fk_788` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_value` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_id_fk_756` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id_fk_098` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `prod_cat_id_fk_897` FOREIGN KEY (`product_category`) REFERENCES `product_category_basic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_52` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `cms_user_fk_90` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_category_basic`
--
ALTER TABLE `product_category_basic`
  ADD CONSTRAINT `username_fk_hadsklfh` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `customer_username_fk` FOREIGN KEY (`customer`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk_76781` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_id_fk_t81` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_986d` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping_vendors`
--
ALTER TABLE `shipping_vendors`
  ADD CONSTRAINT `cms_user_fk_768ship` FOREIGN KEY (`user`) REFERENCES `cms_users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
