-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2015 at 08:50 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acc`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_head`
--

CREATE TABLE IF NOT EXISTS `acc_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `acc_nm_h` varchar(4) NOT NULL,
  `dt` varchar(14) NOT NULL,
  `user` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc_nm_h` (`acc_nm_h`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `acc_head`
--

INSERT INTO `acc_head` (`id`, `title`, `acc_nm_h`, `dt`, `user`) VALUES
(1, 'Assets', '0001', '02/18/2015', ''),
(2, 'Laibility', '0002', '02/18/2015', ''),
(4, 'Operating Revenue Accounts', '0004', '02/18/2015', ''),
(5, 'Expenses', '0005', '02/18/2015', ''),
(6, 'Owner''s Equity Accounts', '0006', '02/18/2015', '');

-- --------------------------------------------------------

--
-- Table structure for table `acc_mast`
--

CREATE TABLE IF NOT EXISTS `acc_mast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_nm_h` varchar(4) NOT NULL,
  `acc_nm_s` varchar(4) NOT NULL,
  `acc_nm` varchar(14) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cont_per` varchar(100) NOT NULL,
  `comp_nm` varchar(100) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `folio` int(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ntn` varchar(50) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `dt` varchar(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  `opbal` int(11) NOT NULL,
  `clbal` int(11) NOT NULL,
  `b_sheet` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc_nm` (`acc_nm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `acc_mast`
--

INSERT INTO `acc_mast` (`id`, `acc_nm_h`, `acc_nm_s`, `acc_nm`, `title`, `cont_per`, `comp_nm`, `currency`, `folio`, `tel`, `cell`, `email`, `ntn`, `gst`, `dt`, `user`, `opbal`, `clbal`, `b_sheet`) VALUES
(1, '0001', '0001', '0001-0001-0001', 'International Human Rights Commission', 'Dr Shahid Amin Khan', 'International Human Rights Commission Head Quarters ', 'PKR', 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '02/18/2015', '', 0, 0, ''),
(2, '0004', '0003', '0004-0003-0002', 'Web Designing', '', 'Ornament Solutions', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(3, '0004', '0003', '0004-0003-0003', 'Web Modifications', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(4, '0004', '0003', '0004-0003-0004', 'Web Upgradation', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(5, '0004', '0003', '0004-0003-0005', 'Design and Development', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(6, '0004', '0006', '0004-0006-0006', 'Logo Designing', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(7, '0004', '0006', '0004-0006-0007', 'Branding', 'Yasir Mehboob', 'Ornament Solutions', 'PKR', 225, '051-4410465', '0346-5134970', 'yasir_u@yahoo.com', 'N/A', 'N/A', '02/18/2015', '', 0, 0, ''),
(8, '0004', '0006', '0004-0006-0008', 'Misc Designing', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(9, '0004', '0004', '0004-0004-0009', 'Domain name', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(10, '0004', '0004', '0004-0004-0010', 'Hosting Charges', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(11, '0001', '0007', '0001-0007-0011', 'Cash In Hand', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(12, '0004', '0003', '0004-0003-0012', 'Consultancy Charges', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(13, '0005', '0002', '0005-0002-0013', 'Discount ', '', '', 'PKR', 0, '', '', '', '', '', '02/18/2015', '', 0, 0, ''),
(14, '0001', '0001', '0001-0001-0014', 'Mirza Zaheer ahmed', 'Zaheer', 'kalsym technologies', 'PKR', 0, '68768768', '68768768', '', 'n/a', 'n/a', '02/28/2015', '', -2000, 0, ''),
(15, '0005', '0002', '0005-0002-0015', 'Testing', '89', 'ornament', 'PKR', 89, '89', '89', '9', '9', '9', '03/04/2015', '', 9, 0, '9'),
(16, '0001', '0008', '0001-0008-0016', 'Goods Purchased', '', '', '', 0, '', '', '', '', '', '03/11/2015', '', 0, 0, ''),
(17, '0001', '0008', '0001-0008-0017', 'Subassembly Inventory', '', '', '', 0, '', '', '', '', '', '03/11/2015', '', 0, 0, ''),
(18, '0001', '0008', '0001-0008-0018', 'Product Inventory', '', '', '', 0, '', '', '', '', '', '03/11/2015', '', 0, 0, ''),
(19, '0001', '0010', '0001-0010-0019', 'Insurance', '', '', '', 0, '', '', '', '', '', '03/11/2015', '', 0, 0, ''),
(20, '0005', '0002', '0005-0002-0020', 'Traveling', 'Yasir', 'ornament', '161', 0, '9879879', '8797987', 'yasir_u@yahoo.com', '7987987', '79879879', '03/14/2015', 'ornalet', 500, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `acc_sub`
--

CREATE TABLE IF NOT EXISTS `acc_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `acc_nm_h` varchar(4) NOT NULL,
  `acc_nm_s` varchar(4) NOT NULL,
  `dt` varchar(14) NOT NULL,
  `user` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `acc_nm_s` (`acc_nm_s`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `acc_sub`
--

INSERT INTO `acc_sub` (`id`, `title`, `acc_nm_h`, `acc_nm_s`, `dt`, `user`) VALUES
(1, 'Accounts Receiveable', '0001', '0001', '02/18/2015', ''),
(2, 'Operating Expense Accounts', '0005', '0002', '02/18/2015', ''),
(3, 'Web Development Services', '0004', '0003', '02/18/2015', ''),
(5, 'Domain and Hosting Services', '0004', '0004', '02/18/2015', ''),
(6, 'Graphics', '0004', '0006', '02/18/2015', ''),
(7, 'Liquid Asset', '0001', '0007', '02/18/2015', ''),
(8, 'Inventories', '0001', '0008', '03/11/2015', ''),
(10, 'Prepaid Expenses', '0001', '0010', '03/11/2015', '');

-- --------------------------------------------------------

--
-- Table structure for table `acc_trans`
--

CREATE TABLE IF NOT EXISTS `acc_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vnumb` varchar(6) NOT NULL,
  `vtype` varchar(2) NOT NULL,
  `vdate` varchar(15) NOT NULL,
  `sys_dt` varchar(14) NOT NULL,
  `acc_nm` varchar(14) NOT NULL,
  `debit` int(11) NOT NULL,
  `crdit` int(11) NOT NULL,
  `descp` text NOT NULL,
  `user` varchar(20) NOT NULL,
  `chq_no` varchar(30) NOT NULL,
  `chq_dt` varchar(16) NOT NULL,
  `pyee` varchar(300) NOT NULL,
  `del` varchar(1) NOT NULL DEFAULT 'n',
  `pnt` varchar(1) NOT NULL,
  `lst_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `acc_nm` (`acc_nm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `acc_trans`
--

INSERT INTO `acc_trans` (`id`, `vnumb`, `vtype`, `vdate`, `sys_dt`, `acc_nm`, `debit`, `crdit`, `descp`, `user`, `chq_no`, `chq_dt`, `pyee`, `del`, `pnt`, `lst_upd`) VALUES
(1, '000001', 'jv', '2013-09-13', '02/18/2015', '0001-0001-0001', 75000, 0, 'Website Development Services for www.ihrchq.org', '', '', '', '', 'n', '', '2015-03-12 08:29:23'),
(2, '000001', 'jv', '2013-09-13', '02/18/2015', '0004-0003-0005', 0, 75000, 'Website Development Services for www.ihrchq.org', '', '', '', '', 'n', '', '2015-03-12 08:29:23'),
(3, '000003', 'br', '2013-10-05', '02/18/2015', '0001-0001-0001', 0, 15000, 'Partial Payment against www.ihrchq.org', '', '', '', '', 'n', '', '2015-02-18 08:26:55'),
(4, '000003', 'br', '2013-10-05', '02/18/2015', '0001-0007-0011', 15000, 0, 'Partial Payment against www.ihrchq.org', '', '', '', '', 'n', '', '2015-02-18 08:26:55'),
(5, '000005', 'br', '2013-11-20', '02/18/2015', '0001-0001-0001', 0, 15000, 'Partial Payment against www.ihrchq.org', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(6, '000005', 'br', '2013-11-20', '02/18/2015', '0001-0007-0011', 15000, 0, 'Partial Payment against www.ihrchq.org', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(7, '000007', 'br', '2013-12-05', '02/18/2015', '0001-0001-0001', 0, 5000, 'Partial Payment against www.ihrchq.org', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(8, '000007', 'br', '2013-12-05', '02/18/2015', '0001-0007-0011', 5000, 0, 'Partial Payment against www.ihrchq.org', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(9, '000009', 'jv', '2014-08-28', '02/18/2015', '0004-0003-0005', 0, 40000, 'Website Development Services for MUPH.ORG', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(10, '000009', 'jv', '2014-08-28', '02/18/2015', '0001-0001-0001', 40000, 0, 'Website Development Services for MUPH.ORG', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(11, '000011', 'cr', '2014-09-03', '02/18/2015', '0001-0001-0001', 0, 20000, 'Cash Receiving against Advance payment for MUPH.ORG Development ', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(12, '000011', 'cr', '2014-09-03', '02/18/2015', '0001-0007-0011', 20000, 0, 'Cash Receiving against Advance payment for MUPH.ORG Development ', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(13, '000013', 'cr', '2014-10-23', '02/18/2015', '0001-0001-0001', 0, 20000, 'Cash Receiving against  IHRCHQ.ORG Outstandings', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(14, '000013', 'cr', '2014-10-23', '02/18/2015', '0001-0007-0011', 20000, 0, 'Cash Receiving against  IHRCHQ.ORG Outstandings', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(15, '000015', 'cr', '2014-10-22', '02/18/2015', '0001-0001-0001', 0, 10000, 'Cash Receiving against  MUPH.ORG Development', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(16, '000015', 'cr', '2014-10-22', '02/18/2015', '0001-0007-0011', 10000, 0, 'Cash Receiving against  MUPH.ORG Development', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(17, '000017', 'jv', '2014-10-11', '02/18/2015', '0004-0003-0012', 0, 10000, 'IHRC.org Monthly Consultancy dues for the month of Sep 2014', '', '', '', '', 'n', '', '2015-02-20 06:42:43'),
(18, '000017', 'jv', '2014-10-11', '02/18/2015', '0001-0001-0001', 10000, 0, 'IHRC.org Monthly Consultancy dues for the month of Sep 2014', '', '', '', '', 'n', '', '2015-02-20 06:42:58'),
(19, '000019', 'cr', '2014-10-20', '02/18/2015', '0001-0001-0001', 0, 20000, 'Cash Receiving against IHRCHQ.ORG Outstandings', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(20, '000019', 'cr', '2014-10-20', '02/18/2015', '0001-0007-0011', 20000, 0, 'Cash Receiving against IHRCHQ.ORG Outstandings', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(21, '000021', 'cr', '2014-10-25', '02/18/2015', '0001-0001-0001', 0, 10000, 'Cash Receiving against MUPH.ORG Development ', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(22, '000021', 'cr', '2014-10-25', '02/18/2015', '0001-0007-0011', 10000, 0, 'Cash Receiving against MUPH.ORG Development', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(23, '000023', 'jv', '2014-11-12', '02/18/2015', '0004-0003-0004', 0, 20000, 'MUPH.ORG Additional Features charges ', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(24, '000023', 'jv', '2014-11-12', '02/18/2015', '0001-0001-0001', 20000, 0, 'MUPH.ORG Additional Features charges ', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(25, '000025', 'jv', '2014-11-11', '02/18/2015', '0001-0001-0001', 10000, 0, 'IHRC.org Monthly Consultancy dues for the month of Oct-Nov 2014', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(26, '000025', 'jv', '2014-11-11', '02/18/2015', '0004-0003-0012', 0, 10000, 'IHRC.org Monthly Consultancy dues for the month of Oct-Nov 2014', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(27, '000027', 'jv', '2014-12-11', '02/18/2015', '0001-0001-0001', 10000, 0, 'IHRC.org Monthly Consultancy dues for the month of Nov-Dec 2014', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(28, '000027', 'jv', '2014-12-11', '02/18/2015', '0004-0003-0012', 0, 10000, 'IHRC.org Monthly Consultancy dues for the month of Nov-Dec 2014', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(29, '000029', 'cr', '2015-01-27', '02/18/2015', '0001-0001-0001', 0, 15000, 'Payment against MUPH.ORG Modification Partial Payment', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(30, '000029', 'cr', '2015-01-27', '02/18/2015', '0001-0007-0011', 15000, 0, 'Payment against MUPH.ORG Modification Partial Payment', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(31, '000031', 'jv', '2015-02-01', '02/18/2015', '0005-0002-0013', 5000, 0, 'Discount Given in Consultancy Ask by Mr Dr Shahid Amin Khan', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(32, '000031', 'jv', '2015-02-01', '02/18/2015', '0001-0001-0001', 0, 5000, 'Discount Given in Consultancy Ask by Mr Dr Shahid Amin Khan', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(39, '000039', 'jv', '2015-01-11', '03/04/2015', '0001-0001-0001', 10000, 0, 'IHRC.org Monthly Consultancy dues for the month of Dec-2014  Jan-2015', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(40, '000039', 'jv', '2015-01-11', '03/04/2015', '0004-0003-0012', 0, 10000, 'IHRC.org Monthly Consultancy dues for the month of Dec-2014  Jan-2015', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(41, '000041', 'jv', '2015-02-11', '03/04/2015', '0001-0001-0001', 10000, 0, 'IHRC.org Monthly Consultancy dues for the month of Jan- Feb-2015', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(42, '000041', 'jv', '2015-02-11', '03/04/2015', '0004-0003-0012', 0, 10000, 'IHRC.org Monthly Consultancy dues for the month of Jan- Feb-2015', '', '', '', '', 'n', '', '2015-03-04 11:53:34'),
(178, '000178', 'jv', '2015-03-11', '03/12/2015', '0001-0001-0001', 10000, 0, 'IHRC.org Monthly Consultancy dues for the month of Feb- Mar-2015', '', '', '', '', 'N', 'N', '0000-00-00 00:00:00'),
(179, '000178', 'jv', '2015-03-11', '03/12/2015', '0004-0003-0012', 0, 10000, 'IHRC.org Monthly Consultancy dues for the month of Feb- Mar-2015', '', '', '', '', 'N', 'N', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `act`
--

CREATE TABLE IF NOT EXISTS `act` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_ref` varchar(20) NOT NULL,
  `r_ref` varchar(20) NOT NULL,
  `act` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `dt` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `act`
--

INSERT INTO `act` (`id`, `t_ref`, `r_ref`, `act`, `user`, `status`, `ip`, `dt`) VALUES
(2, 'acc_trans', '000043', 'del', '', 'l', '127.0.0.1', '03/04/2015 03:51:53'),
(3, 'acc_trans', '000043', 'del', '', 'l', '127.0.0.1', '03/04/2015 03:53:47'),
(4, 'acc_trans', '000043', 'del', '', 'l', '127.0.0.1', '03/04/2015 03:54:06'),
(5, 'acc_trans', '000043', 'del', '', 'l', '127.0.0.1', '03/04/2015 03:54:38'),
(6, 'acc_trans', '000043', 'del', '', 'l', '127.0.0.1', '03/04/2015 03:56:43'),
(7, 'acc_trans', '000043', 'del', '', 'l', '127.0.0.1', '03/04/2015 03:57:13'),
(8, 'acc_trans', '000043', 'recall', '', 'l', '127.0.0.1', '03/05/2015 03:05:17'),
(9, 'acc_trans', '000043', 'del', '', 'l', '127.0.0.1', '03/05/2015 03:06:29'),
(10, 'acc_trans', '000043', 'recall', '', 'l', '127.0.0.1', '03/05/2015 03:06:45'),
(11, 'acc_trans', '000043', 'del', '', 'l', '127.0.0.1', '03/05/2015 03:08:08'),
(12, 'acc_trans', '000043', 'recall', '', 'l', '127.0.0.1', '03/05/2015 03:08:32'),
(13, 'acc_trans', '000033', 'del', '', 'l', '127.0.0.1', '03/05/2015 03:28:08'),
(14, 'acc_trans', '000146', 'del', '', 'l', '127.0.0.1', '03/08/2015 03:12:58'),
(15, 'acc_trans', '000160', 'print', '', 'l', '127.0.0.1', '03/08/2015 03:51:11'),
(16, 'acc_trans', '000162', 'print', '', 'l', '127.0.0.1', '03/08/2015 03:59:39'),
(17, 'acc_trans', '000164', 'print', '', 'l', '127.0.0.1', '03/08/2015 03:01:57'),
(18, 'acc_mast', '0004-0006-0007', 'update', '', 'l', '127.0.0.1', '03/08/2015 03:58:49'),
(19, 'acc_trans', '000170', 'print', '', 'l', '127.0.0.1', '03/08/2015 03:08:29'),
(20, 'acc_trans', '000170', 'del', '', 'l', '127.0.0.1', '03/08/2015 03:15:41'),
(21, 'acc_mast', '0005-0002-0015', 'update', '', 'l', '127.0.0.1', '03/08/2015 03:33:13'),
(22, 'acc_trans', '000001', 'del', '', 'l', '127.0.0.1', '03/12/2015 03:29:01'),
(23, 'acc_trans', '000001', 'recall', '', 'l', '127.0.0.1', '03/12/2015 03:29:23'),
(24, 'acc_trans', '000176', 'del', '', 'l', '127.0.0.1', '03/12/2015 03:47:39'),
(25, 'acc_trans', '000172', 'del', '', 'l', '127.0.0.1', '03/13/2015 03:53:41'),
(26, 'acc_trans', '000238', 'print', '', 'l', '127.0.0.1', '03/14/2015 03:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `albm`
--

CREATE TABLE IF NOT EXISTS `albm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `albm_nm` varchar(100) NOT NULL,
  `descp` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id_countries` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `iso_alpha2` varchar(2) DEFAULT NULL,
  `iso_alpha3` varchar(3) DEFAULT NULL,
  `iso_numeric` int(11) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `currency_name` varchar(32) DEFAULT NULL,
  `currrency_symbol` varchar(3) DEFAULT NULL,
  `flag` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_countries`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id_countries`, `name`, `iso_alpha2`, `iso_alpha3`, `iso_numeric`, `currency_code`, `currency_name`, `currrency_symbol`, `flag`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 4, 'AFN', 'Afghani', '؋', 'AF.png'),
(2, 'Albania', 'AL', 'ALB', 8, 'ALL', 'Lek', 'Lek', 'AL.png'),
(3, 'Algeria', 'DZ', 'DZA', 12, 'DZD', 'Dinar', NULL, 'DZ.png'),
(4, 'American Samoa', 'AS', 'ASM', 16, 'USD', 'Dollar', '$', 'AS.png'),
(5, 'Andorra', 'AD', 'AND', 20, 'EUR', 'Euro', '€', 'AD.png'),
(6, 'Angola', 'AO', 'AGO', 24, 'AOA', 'Kwanza', 'Kz', 'AO.png'),
(7, 'Anguilla', 'AI', 'AIA', 660, 'XCD', 'Dollar', '$', 'AI.png'),
(8, 'Antarctica', 'AQ', 'ATA', 10, '', '', NULL, 'AQ.png'),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 28, 'XCD', 'Dollar', '$', 'AG.png'),
(10, 'Argentina', 'AR', 'ARG', 32, 'ARS', 'Peso', '$', 'AR.png'),
(11, 'Armenia', 'AM', 'ARM', 51, 'AMD', 'Dram', NULL, 'AM.png'),
(12, 'Aruba', 'AW', 'ABW', 533, 'AWG', 'Guilder', 'ƒ', 'AW.png'),
(13, 'Australia', 'AU', 'AUS', 36, 'AUD', 'Dollar', '$', 'AU.png'),
(14, 'Austria', 'AT', 'AUT', 40, 'EUR', 'Euro', '€', 'AT.png'),
(15, 'Azerbaijan', 'AZ', 'AZE', 31, 'AZN', 'Manat', 'ман', 'AZ.png'),
(16, 'Bahamas', 'BS', 'BHS', 44, 'BSD', 'Dollar', '$', 'BS.png'),
(17, 'Bahrain', 'BH', 'BHR', 48, 'BHD', 'Dinar', NULL, 'BH.png'),
(18, 'Bangladesh', 'BD', 'BGD', 50, 'BDT', 'Taka', NULL, 'BD.png'),
(19, 'Barbados', 'BB', 'BRB', 52, 'BBD', 'Dollar', '$', 'BB.png'),
(20, 'Belarus', 'BY', 'BLR', 112, 'BYR', 'Ruble', 'p.', 'BY.png'),
(21, 'Belgium', 'BE', 'BEL', 56, 'EUR', 'Euro', '€', 'BE.png'),
(22, 'Belize', 'BZ', 'BLZ', 84, 'BZD', 'Dollar', 'BZ$', 'BZ.png'),
(23, 'Benin', 'BJ', 'BEN', 204, 'XOF', 'Franc', NULL, 'BJ.png'),
(24, 'Bermuda', 'BM', 'BMU', 60, 'BMD', 'Dollar', '$', 'BM.png'),
(25, 'Bhutan', 'BT', 'BTN', 64, 'BTN', 'Ngultrum', NULL, 'BT.png'),
(26, 'Bolivia', 'BO', 'BOL', 68, 'BOB', 'Boliviano', '$b', 'BO.png'),
(27, 'Bosnia and Herzegovina', 'BA', 'BIH', 70, 'BAM', 'Marka', 'KM', 'BA.png'),
(28, 'Botswana', 'BW', 'BWA', 72, 'BWP', 'Pula', 'P', 'BW.png'),
(29, 'Bouvet Island', 'BV', 'BVT', 74, 'NOK', 'Krone', 'kr', 'BV.png'),
(30, 'Brazil', 'BR', 'BRA', 76, 'BRL', 'Real', 'R$', 'BR.png'),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 86, 'USD', 'Dollar', '$', 'IO.png'),
(32, 'British Virgin Islands', 'VG', 'VGB', 92, 'USD', 'Dollar', '$', 'VG.png'),
(33, 'Brunei', 'BN', 'BRN', 96, 'BND', 'Dollar', '$', 'BN.png'),
(34, 'Bulgaria', 'BG', 'BGR', 100, 'BGN', 'Lev', 'лв', 'BG.png'),
(35, 'Burkina Faso', 'BF', 'BFA', 854, 'XOF', 'Franc', NULL, 'BF.png'),
(36, 'Burundi', 'BI', 'BDI', 108, 'BIF', 'Franc', NULL, 'BI.png'),
(37, 'Cambodia', 'KH', 'KHM', 116, 'KHR', 'Riels', '៛', 'KH.png'),
(38, 'Cameroon', 'CM', 'CMR', 120, 'XAF', 'Franc', 'FCF', 'CM.png'),
(39, 'Canada', 'CA', 'CAN', 124, 'CAD', 'Dollar', '$', 'CA.png'),
(40, 'Cape Verde', 'CV', 'CPV', 132, 'CVE', 'Escudo', NULL, 'CV.png'),
(41, 'Cayman Islands', 'KY', 'CYM', 136, 'KYD', 'Dollar', '$', 'KY.png'),
(42, 'Central African Republic', 'CF', 'CAF', 140, 'XAF', 'Franc', 'FCF', 'CF.png'),
(43, 'Chad', 'TD', 'TCD', 148, 'XAF', 'Franc', NULL, 'TD.png'),
(44, 'Chile', 'CL', 'CHL', 152, 'CLP', 'Peso', NULL, 'CL.png'),
(45, 'China', 'CN', 'CHN', 156, 'CNY', 'Yuan Renminbi', '¥', 'CN.png'),
(46, 'Christmas Island', 'CX', 'CXR', 162, 'AUD', 'Dollar', '$', 'CX.png'),
(47, 'Cocos Islands', 'CC', 'CCK', 166, 'AUD', 'Dollar', '$', 'CC.png'),
(48, 'Colombia', 'CO', 'COL', 170, 'COP', 'Peso', '$', 'CO.png'),
(49, 'Comoros', 'KM', 'COM', 174, 'KMF', 'Franc', NULL, 'KM.png'),
(50, 'Cook Islands', 'CK', 'COK', 184, 'NZD', 'Dollar', '$', 'CK.png'),
(51, 'Costa Rica', 'CR', 'CRI', 188, 'CRC', 'Colon', '₡', 'CR.png'),
(52, 'Croatia', 'HR', 'HRV', 191, 'HRK', 'Kuna', 'kn', 'HR.png'),
(53, 'Cuba', 'CU', 'CUB', 192, 'CUP', 'Peso', '₱', 'CU.png'),
(54, 'Cyprus', 'CY', 'CYP', 196, 'CYP', 'Pound', NULL, 'CY.png'),
(55, 'Czech Republic', 'CZ', 'CZE', 203, 'CZK', 'Koruna', 'Kč', 'CZ.png'),
(56, 'Democratic Republic of the Congo', 'CD', 'COD', 180, 'CDF', 'Franc', NULL, 'CD.png'),
(57, 'Denmark', 'DK', 'DNK', 208, 'DKK', 'Krone', 'kr', 'DK.png'),
(58, 'Djibouti', 'DJ', 'DJI', 262, 'DJF', 'Franc', NULL, 'DJ.png'),
(59, 'Dominica', 'DM', 'DMA', 212, 'XCD', 'Dollar', '$', 'DM.png'),
(60, 'Dominican Republic', 'DO', 'DOM', 214, 'DOP', 'Peso', 'RD$', 'DO.png'),
(61, 'East Timor', 'TL', 'TLS', 626, 'USD', 'Dollar', '$', 'TL.png'),
(62, 'Ecuador', 'EC', 'ECU', 218, 'USD', 'Dollar', '$', 'EC.png'),
(63, 'Egypt', 'EG', 'EGY', 818, 'EGP', 'Pound', '£', 'EG.png'),
(64, 'El Salvador', 'SV', 'SLV', 222, 'SVC', 'Colone', '$', 'SV.png'),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 226, 'XAF', 'Franc', 'FCF', 'GQ.png'),
(66, 'Eritrea', 'ER', 'ERI', 232, 'ERN', 'Nakfa', 'Nfk', 'ER.png'),
(67, 'Estonia', 'EE', 'EST', 233, 'EEK', 'Kroon', 'kr', 'EE.png'),
(68, 'Ethiopia', 'ET', 'ETH', 231, 'ETB', 'Birr', NULL, 'ET.png'),
(69, 'Falkland Islands', 'FK', 'FLK', 238, 'FKP', 'Pound', '£', 'FK.png'),
(70, 'Faroe Islands', 'FO', 'FRO', 234, 'DKK', 'Krone', 'kr', 'FO.png'),
(71, 'Fiji', 'FJ', 'FJI', 242, 'FJD', 'Dollar', '$', 'FJ.png'),
(72, 'Finland', 'FI', 'FIN', 246, 'EUR', 'Euro', '€', 'FI.png'),
(73, 'France', 'FR', 'FRA', 250, 'EUR', 'Euro', '€', 'FR.png'),
(74, 'French Guiana', 'GF', 'GUF', 254, 'EUR', 'Euro', '€', 'GF.png'),
(75, 'French Polynesia', 'PF', 'PYF', 258, 'XPF', 'Franc', NULL, 'PF.png'),
(76, 'French Southern Territories', 'TF', 'ATF', 260, 'EUR', 'Euro  ', '€', 'TF.png'),
(77, 'Gabon', 'GA', 'GAB', 266, 'XAF', 'Franc', 'FCF', 'GA.png'),
(78, 'Gambia', 'GM', 'GMB', 270, 'GMD', 'Dalasi', 'D', 'GM.png'),
(79, 'Georgia', 'GE', 'GEO', 268, 'GEL', 'Lari', NULL, 'GE.png'),
(80, 'Germany', 'DE', 'DEU', 276, 'EUR', 'Euro', '€', 'DE.png'),
(81, 'Ghana', 'GH', 'GHA', 288, 'GHC', 'Cedi', '¢', 'GH.png'),
(82, 'Gibraltar', 'GI', 'GIB', 292, 'GIP', 'Pound', '£', 'GI.png'),
(83, 'Greece', 'GR', 'GRC', 300, 'EUR', 'Euro', '€', 'GR.png'),
(84, 'Greenland', 'GL', 'GRL', 304, 'DKK', 'Krone', 'kr', 'GL.png'),
(85, 'Grenada', 'GD', 'GRD', 308, 'XCD', 'Dollar', '$', 'GD.png'),
(86, 'Guadeloupe', 'GP', 'GLP', 312, 'EUR', 'Euro', '€', 'GP.png'),
(87, 'Guam', 'GU', 'GUM', 316, 'USD', 'Dollar', '$', 'GU.png'),
(88, 'Guatemala', 'GT', 'GTM', 320, 'GTQ', 'Quetzal', 'Q', 'GT.png'),
(89, 'Guinea', 'GN', 'GIN', 324, 'GNF', 'Franc', NULL, 'GN.png'),
(90, 'Guinea-Bissau', 'GW', 'GNB', 624, 'XOF', 'Franc', NULL, 'GW.png'),
(91, 'Guyana', 'GY', 'GUY', 328, 'GYD', 'Dollar', '$', 'GY.png'),
(92, 'Haiti', 'HT', 'HTI', 332, 'HTG', 'Gourde', 'G', 'HT.png'),
(93, 'Heard Island and McDonald Islands', 'HM', 'HMD', 334, 'AUD', 'Dollar', '$', 'HM.png'),
(94, 'Honduras', 'HN', 'HND', 340, 'HNL', 'Lempira', 'L', 'HN.png'),
(95, 'Hong Kong', 'HK', 'HKG', 344, 'HKD', 'Dollar', '$', 'HK.png'),
(96, 'Hungary', 'HU', 'HUN', 348, 'HUF', 'Forint', 'Ft', 'HU.png'),
(97, 'Iceland', 'IS', 'ISL', 352, 'ISK', 'Krona', 'kr', 'IS.png'),
(98, 'India', 'IN', 'IND', 356, 'INR', 'Rupee', '₹', 'IN.png'),
(99, 'Indonesia', 'ID', 'IDN', 360, 'IDR', 'Rupiah', 'Rp', 'ID.png'),
(100, 'Iran', 'IR', 'IRN', 364, 'IRR', 'Rial', '﷼', 'IR.png'),
(101, 'Iraq', 'IQ', 'IRQ', 368, 'IQD', 'Dinar', NULL, 'IQ.png'),
(102, 'Ireland', 'IE', 'IRL', 372, 'EUR', 'Euro', '€', 'IE.png'),
(103, 'Israel', 'IL', 'ISR', 376, 'ILS', 'Shekel', '₪', 'IL.png'),
(104, 'Italy', 'IT', 'ITA', 380, 'EUR', 'Euro', '€', 'IT.png'),
(105, 'Ivory Coast', 'CI', 'CIV', 384, 'XOF', 'Franc', NULL, 'CI.png'),
(106, 'Jamaica', 'JM', 'JAM', 388, 'JMD', 'Dollar', '$', 'JM.png'),
(107, 'Japan', 'JP', 'JPN', 392, 'JPY', 'Yen', '¥', 'JP.png'),
(108, 'Jordan', 'JO', 'JOR', 400, 'JOD', 'Dinar', NULL, 'JO.png'),
(109, 'Kazakhstan', 'KZ', 'KAZ', 398, 'KZT', 'Tenge', 'лв', 'KZ.png'),
(110, 'Kenya', 'KE', 'KEN', 404, 'KES', 'Shilling', NULL, 'KE.png'),
(111, 'Kiribati', 'KI', 'KIR', 296, 'AUD', 'Dollar', '$', 'KI.png'),
(112, 'Kuwait', 'KW', 'KWT', 414, 'KWD', 'Dinar', NULL, 'KW.png'),
(113, 'Kyrgyzstan', 'KG', 'KGZ', 417, 'KGS', 'Som', 'лв', 'KG.png'),
(114, 'Laos', 'LA', 'LAO', 418, 'LAK', 'Kip', '₭', 'LA.png'),
(115, 'Latvia', 'LV', 'LVA', 428, 'LVL', 'Lat', 'Ls', 'LV.png'),
(116, 'Lebanon', 'LB', 'LBN', 422, 'LBP', 'Pound', '£', 'LB.png'),
(117, 'Lesotho', 'LS', 'LSO', 426, 'LSL', 'Loti', 'L', 'LS.png'),
(118, 'Liberia', 'LR', 'LBR', 430, 'LRD', 'Dollar', '$', 'LR.png'),
(119, 'Libya', 'LY', 'LBY', 434, 'LYD', 'Dinar', NULL, 'LY.png'),
(120, 'Liechtenstein', 'LI', 'LIE', 438, 'CHF', 'Franc', 'CHF', 'LI.png'),
(121, 'Lithuania', 'LT', 'LTU', 440, 'LTL', 'Litas', 'Lt', 'LT.png'),
(122, 'Luxembourg', 'LU', 'LUX', 442, 'EUR', 'Euro', '€', 'LU.png'),
(123, 'Macao', 'MO', 'MAC', 446, 'MOP', 'Pataca', 'MOP', 'MO.png'),
(124, 'Macedonia', 'MK', 'MKD', 807, 'MKD', 'Denar', 'ден', 'MK.png'),
(125, 'Madagascar', 'MG', 'MDG', 450, 'MGA', 'Ariary', NULL, 'MG.png'),
(126, 'Malawi', 'MW', 'MWI', 454, 'MWK', 'Kwacha', 'MK', 'MW.png'),
(127, 'Malaysia', 'MY', 'MYS', 458, 'MYR', 'Ringgit', 'RM', 'MY.png'),
(128, 'Maldives', 'MV', 'MDV', 462, 'MVR', 'Rufiyaa', 'Rf', 'MV.png'),
(129, 'Mali', 'ML', 'MLI', 466, 'XOF', 'Franc', NULL, 'ML.png'),
(130, 'Malta', 'MT', 'MLT', 470, 'MTL', 'Lira', NULL, 'MT.png'),
(131, 'Marshall Islands', 'MH', 'MHL', 584, 'USD', 'Dollar', '$', 'MH.png'),
(132, 'Martinique', 'MQ', 'MTQ', 474, 'EUR', 'Euro', '€', 'MQ.png'),
(133, 'Mauritania', 'MR', 'MRT', 478, 'MRO', 'Ouguiya', 'UM', 'MR.png'),
(134, 'Mauritius', 'MU', 'MUS', 480, 'MUR', 'Rupee', '₨', 'MU.png'),
(135, 'Mayotte', 'YT', 'MYT', 175, 'EUR', 'Euro', '€', 'YT.png'),
(136, 'Mexico', 'MX', 'MEX', 484, 'MXN', 'Peso', '$', 'MX.png'),
(137, 'Micronesia', 'FM', 'FSM', 583, 'USD', 'Dollar', '$', 'FM.png'),
(138, 'Moldova', 'MD', 'MDA', 498, 'MDL', 'Leu', NULL, 'MD.png'),
(139, 'Monaco', 'MC', 'MCO', 492, 'EUR', 'Euro', '€', 'MC.png'),
(140, 'Mongolia', 'MN', 'MNG', 496, 'MNT', 'Tugrik', '₮', 'MN.png'),
(141, 'Montserrat', 'MS', 'MSR', 500, 'XCD', 'Dollar', '$', 'MS.png'),
(142, 'Morocco', 'MA', 'MAR', 504, 'MAD', 'Dirham', NULL, 'MA.png'),
(143, 'Mozambique', 'MZ', 'MOZ', 508, 'MZN', 'Meticail', 'MT', 'MZ.png'),
(144, 'Myanmar', 'MM', 'MMR', 104, 'MMK', 'Kyat', 'K', 'MM.png'),
(145, 'Namibia', 'NA', 'NAM', 516, 'NAD', 'Dollar', '$', 'NA.png'),
(146, 'Nauru', 'NR', 'NRU', 520, 'AUD', 'Dollar', '$', 'NR.png'),
(147, 'Nepal', 'NP', 'NPL', 524, 'NPR', 'Rupee', '₨', 'NP.png'),
(148, 'Netherlands', 'NL', 'NLD', 528, 'EUR', 'Euro', '€', 'NL.png'),
(149, 'Netherlands Antilles', 'AN', 'ANT', 530, 'ANG', 'Guilder', 'ƒ', 'AN.png'),
(150, 'New Caledonia', 'NC', 'NCL', 540, 'XPF', 'Franc', NULL, 'NC.png'),
(151, 'New Zealand', 'NZ', 'NZL', 554, 'NZD', 'Dollar', '$', 'NZ.png'),
(152, 'Nicaragua', 'NI', 'NIC', 558, 'NIO', 'Cordoba', 'C$', 'NI.png'),
(153, 'Niger', 'NE', 'NER', 562, 'XOF', 'Franc', NULL, 'NE.png'),
(154, 'Nigeria', 'NG', 'NGA', 566, 'NGN', 'Naira', '₦', 'NG.png'),
(155, 'Niue', 'NU', 'NIU', 570, 'NZD', 'Dollar', '$', 'NU.png'),
(156, 'Norfolk Island', 'NF', 'NFK', 574, 'AUD', 'Dollar', '$', 'NF.png'),
(157, 'North Korea', 'KP', 'PRK', 408, 'KPW', 'Won', '₩', 'KP.png'),
(158, 'Northern Mariana Islands', 'MP', 'MNP', 580, 'USD', 'Dollar', '$', 'MP.png'),
(159, 'Norway', 'NO', 'NOR', 578, 'NOK', 'Krone', 'kr', 'NO.png'),
(160, 'Oman', 'OM', 'OMN', 512, 'OMR', 'Rial', '﷼', 'OM.png'),
(161, 'Pakistan', 'PK', 'PAK', 586, 'PKR', 'Rupee', '₨', 'PK.png'),
(162, 'Palau', 'PW', 'PLW', 585, 'USD', 'Dollar', '$', 'PW.png'),
(163, 'Palestinian Territory', 'PS', 'PSE', 275, 'ILS', 'Shekel', '₪', 'PS.png'),
(164, 'Panama', 'PA', 'PAN', 591, 'PAB', 'Balboa', 'B/.', 'PA.png'),
(165, 'Papua New Guinea', 'PG', 'PNG', 598, 'PGK', 'Kina', NULL, 'PG.png'),
(166, 'Paraguay', 'PY', 'PRY', 600, 'PYG', 'Guarani', 'Gs', 'PY.png'),
(167, 'Peru', 'PE', 'PER', 604, 'PEN', 'Sol', 'S/.', 'PE.png'),
(168, 'Philippines', 'PH', 'PHL', 608, 'PHP', 'Peso', 'Php', 'PH.png'),
(169, 'Pitcairn', 'PN', 'PCN', 612, 'NZD', 'Dollar', '$', 'PN.png'),
(170, 'Poland', 'PL', 'POL', 616, 'PLN', 'Zloty', 'zł', 'PL.png'),
(171, 'Portugal', 'PT', 'PRT', 620, 'EUR', 'Euro', '€', 'PT.png'),
(172, 'Puerto Rico', 'PR', 'PRI', 630, 'USD', 'Dollar', '$', 'PR.png'),
(173, 'Qatar', 'QA', 'QAT', 634, 'QAR', 'Rial', '﷼', 'QA.png'),
(174, 'Republic of the Congo', 'CG', 'COG', 178, 'XAF', 'Franc', 'FCF', 'CG.png'),
(175, 'Reunion', 'RE', 'REU', 638, 'EUR', 'Euro', '€', 'RE.png'),
(176, 'Romania', 'RO', 'ROU', 642, 'RON', 'Leu', 'lei', 'RO.png'),
(177, 'Russia', 'RU', 'RUS', 643, 'RUB', 'Ruble', 'руб', 'RU.png'),
(178, 'Rwanda', 'RW', 'RWA', 646, 'RWF', 'Franc', NULL, 'RW.png'),
(179, 'Saint Helena', 'SH', 'SHN', 654, 'SHP', 'Pound', '£', 'SH.png'),
(180, 'Saint Kitts and Nevis', 'KN', 'KNA', 659, 'XCD', 'Dollar', '$', 'KN.png'),
(181, 'Saint Lucia', 'LC', 'LCA', 662, 'XCD', 'Dollar', '$', 'LC.png'),
(182, 'Saint Pierre and Miquelon', 'PM', 'SPM', 666, 'EUR', 'Euro', '€', 'PM.png'),
(183, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 670, 'XCD', 'Dollar', '$', 'VC.png'),
(184, 'Samoa', 'WS', 'WSM', 882, 'WST', 'Tala', 'WS$', 'WS.png'),
(185, 'San Marino', 'SM', 'SMR', 674, 'EUR', 'Euro', '€', 'SM.png'),
(186, 'Sao Tome and Principe', 'ST', 'STP', 678, 'STD', 'Dobra', 'Db', 'ST.png'),
(187, 'Saudi Arabia', 'SA', 'SAU', 682, 'SAR', 'Rial', '﷼', 'SA.png'),
(188, 'Senegal', 'SN', 'SEN', 686, 'XOF', 'Franc', NULL, 'SN.png'),
(189, 'Serbia and Montenegro', 'CS', 'SCG', 891, 'RSD', 'Dinar', 'Дин', 'CS.png'),
(190, 'Seychelles', 'SC', 'SYC', 690, 'SCR', 'Rupee', '₨', 'SC.png'),
(191, 'Sierra Leone', 'SL', 'SLE', 694, 'SLL', 'Leone', 'Le', 'SL.png'),
(192, 'Singapore', 'SG', 'SGP', 702, 'SGD', 'Dollar', '$', 'SG.png'),
(193, 'Slovakia', 'SK', 'SVK', 703, 'SKK', 'Koruna', 'Sk', 'SK.png'),
(194, 'Slovenia', 'SI', 'SVN', 705, 'EUR', 'Euro', '€', 'SI.png'),
(195, 'Solomon Islands', 'SB', 'SLB', 90, 'SBD', 'Dollar', '$', 'SB.png'),
(196, 'Somalia', 'SO', 'SOM', 706, 'SOS', 'Shilling', 'S', 'SO.png'),
(197, 'South Africa', 'ZA', 'ZAF', 710, 'ZAR', 'Rand', 'R', 'ZA.png'),
(198, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 239, 'GBP', 'Pound', '£', 'GS.png'),
(199, 'South Korea', 'KR', 'KOR', 410, 'KRW', 'Won', '₩', 'KR.png'),
(200, 'Spain', 'ES', 'ESP', 724, 'EUR', 'Euro', '€', 'ES.png'),
(201, 'Sri Lanka', 'LK', 'LKA', 144, 'LKR', 'Rupee', '₨', 'LK.png'),
(202, 'Sudan', 'SD', 'SDN', 736, 'SDD', 'Dinar', NULL, 'SD.png'),
(203, 'Suriname', 'SR', 'SUR', 740, 'SRD', 'Dollar', '$', 'SR.png'),
(204, 'Svalbard and Jan Mayen', 'SJ', 'SJM', 744, 'NOK', 'Krone', 'kr', 'SJ.png'),
(205, 'Swaziland', 'SZ', 'SWZ', 748, 'SZL', 'Lilangeni', NULL, 'SZ.png'),
(206, 'Sweden', 'SE', 'SWE', 752, 'SEK', 'Krona', 'kr', 'SE.png'),
(207, 'Switzerland', 'CH', 'CHE', 756, 'CHF', 'Franc', 'CHF', 'CH.png'),
(208, 'Syria', 'SY', 'SYR', 760, 'SYP', 'Pound', '£', 'SY.png'),
(209, 'Taiwan', 'TW', 'TWN', 158, 'TWD', 'Dollar', 'NT$', 'TW.png'),
(210, 'Tajikistan', 'TJ', 'TJK', 762, 'TJS', 'Somoni', NULL, 'TJ.png'),
(211, 'Tanzania', 'TZ', 'TZA', 834, 'TZS', 'Shilling', NULL, 'TZ.png'),
(212, 'Thailand', 'TH', 'THA', 764, 'THB', 'Baht', '฿', 'TH.png'),
(213, 'Togo', 'TG', 'TGO', 768, 'XOF', 'Franc', NULL, 'TG.png'),
(214, 'Tokelau', 'TK', 'TKL', 772, 'NZD', 'Dollar', '$', 'TK.png'),
(215, 'Tonga', 'TO', 'TON', 776, 'TOP', 'Pa''anga', 'T$', 'TO.png'),
(216, 'Trinidad and Tobago', 'TT', 'TTO', 780, 'TTD', 'Dollar', 'TT$', 'TT.png'),
(217, 'Tunisia', 'TN', 'TUN', 788, 'TND', 'Dinar', NULL, 'TN.png'),
(218, 'Turkey', 'TR', 'TUR', 792, 'TRY', 'Lira', 'YTL', 'TR.png'),
(219, 'Turkmenistan', 'TM', 'TKM', 795, 'TMM', 'Manat', 'm', 'TM.png'),
(220, 'Turks and Caicos Islands', 'TC', 'TCA', 796, 'USD', 'Dollar', '$', 'TC.png'),
(221, 'Tuvalu', 'TV', 'TUV', 798, 'AUD', 'Dollar', '$', 'TV.png'),
(222, 'U.S. Virgin Islands', 'VI', 'VIR', 850, 'USD', 'Dollar', '$', 'VI.png'),
(223, 'Uganda', 'UG', 'UGA', 800, 'UGX', 'Shilling', NULL, 'UG.png'),
(224, 'Ukraine', 'UA', 'UKR', 804, 'UAH', 'Hryvnia', '₴', 'UA.png'),
(225, 'United Arab Emirates', 'AE', 'ARE', 784, 'AED', 'Dirham', NULL, 'AE.png'),
(226, 'United Kingdom', 'GB', 'GBR', 826, 'GBP', 'Pound', '£', 'GB.png'),
(227, 'United States', 'US', 'USA', 840, 'USD', 'Dollar', '$', 'US.png'),
(228, 'United States Minor Outlying Islands', 'UM', 'UMI', 581, 'USD', 'Dollar ', '$', 'UM.png'),
(229, 'Uruguay', 'UY', 'URY', 858, 'UYU', 'Peso', '$U', 'UY.png'),
(230, 'Uzbekistan', 'UZ', 'UZB', 860, 'UZS', 'Som', 'лв', 'UZ.png'),
(231, 'Vanuatu', 'VU', 'VUT', 548, 'VUV', 'Vatu', 'Vt', 'VU.png'),
(232, 'Vatican', 'VA', 'VAT', 336, 'EUR', 'Euro', '€', 'VA.png'),
(233, 'Venezuela', 'VE', 'VEN', 862, 'VEF', 'Bolivar', 'Bs', 'VE.png'),
(234, 'Vietnam', 'VN', 'VNM', 704, 'VND', 'Dong', '₫', 'VN.png'),
(235, 'Wallis and Futuna', 'WF', 'WLF', 876, 'XPF', 'Franc', NULL, 'WF.png'),
(236, 'Western Sahara', 'EH', 'ESH', 732, 'MAD', 'Dirham', NULL, 'EH.png'),
(237, 'Yemen', 'YE', 'YEM', 887, 'YER', 'Rial', '﷼', 'YE.png'),
(238, 'Zambia', 'ZM', 'ZMB', 894, 'ZMK', 'Kwacha', 'ZK', 'ZM.png'),
(239, 'Zimbabwe', 'ZW', 'ZWE', 716, 'ZWD', 'Dollar', 'Z$', 'ZW.png');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(200) NOT NULL,
  `albm_id` int(11) NOT NULL,
  `descp` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_nm` varchar(50) NOT NULL,
  `tbl_ref` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lgf_log`
--

CREATE TABLE IF NOT EXISTS `lgf_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_nm` varchar(100) NOT NULL,
  `dt` varchar(16) NOT NULL,
  `lxp` varchar(10) NOT NULL,
  `lcc` varchar(100) NOT NULL,
  `nou` int(11) NOT NULL,
  `dbinfo` varchar(200) NOT NULL,
  `ad_usr` varchar(100) NOT NULL,
  `ad_pass` varchar(300) NOT NULL,
  `ad_eml` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_hd` varchar(200) NOT NULL,
  `s_hd` varchar(50) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `del_yn` varchar(2) NOT NULL,
  `news_detail` longtext NOT NULL,
  `news_short` varchar(150) NOT NULL,
  `post_by` varchar(200) NOT NULL,
  `img_sml` varchar(200) NOT NULL,
  `img_lrg` varchar(200) NOT NULL,
  `nws_position` varchar(1) NOT NULL,
  `img_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ornasys`
--

CREATE TABLE IF NOT EXISTS `ornasys` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `domain` varchar(300) NOT NULL,
  `lxp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ornasys`
--

INSERT INTO `ornasys` (`id`, `user`, `logo`, `domain`, `lxp`) VALUES
(1, 'Ornament Solutions', 'logo.png', 'www.ornamentsolutions.com', '81128145383936');

-- --------------------------------------------------------

--
-- Table structure for table `ornasys_mnu`
--

CREATE TABLE IF NOT EXISTS `ornasys_mnu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` varchar(11) NOT NULL,
  `f_nm` varchar(30) NOT NULL,
  `f_lnk` varchar(50) NOT NULL,
  `user` varchar(10) NOT NULL,
  `dt` varchar(11) NOT NULL,
  `icon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `ornasys_mnu`
--

INSERT INTO `ornasys_mnu` (`id`, `reg_id`, `f_nm`, `f_lnk`, `user`, `dt`, `icon`) VALUES
(9, 'f24h2014', 'Manage Contents', 'ed_list', 'ornalet', '10-Jul-2014', 'manage'),
(10, 'f24h2014', 'Access Privillages', 'mnu', 'ornalet', '10-Jul-2014', 'access'),
(11, 'f24h2014', 'Power Control', 'ed_list-ornasys', 'ornalet', '10-Jul-2014', 'power'),
(12, 'f24h2014', 'Create User', 'user', 'ornalet', '10-Jul-2014', 'users'),
(13, 'f24h2014', 'Change Passwords', 'change-password', 'ornalet', '10-Jul-2014', 'password'),
(14, 'f24h2014', 'Support', 'http://www.ornamentsolutions.com/contact-us.html', 'all', '10-Jul-2014', 'support'),
(15, 'muph2014', 'Album', 'add-album', 'Ornalet', '01-Sep-2014', 'album'),
(16, 'muph2014', 'Image Gallery', 'image-gallery', 'Ornalet', '01-Sep-2014', 'photo'),
(17, 'f24h2014', 'CONTESTANTS', 'new-contest', 'Ornalet', '01-Sep-2014', 'femail'),
(18, 'muph2014', 'Judges', 'new-judg', 'Ornalet', '01-Sep-2014', 'judges'),
(19, 'muph2014', 'Sponsors', 'new-spons', 'Ornalet', '01-Sep-2014', 'spons'),
(21, 'muph2014', 'Management Team', 'new-manag', 'Ornalet', '01-Sep-2014', 'management'),
(24, 'muph2014', 'Inbox / Applications', 'application-que', 'Ornalet', '14-Sep-2014', 'inbox'),
(25, 'f24h2014', 'Inbox', 'application-que', 'drshahid ', '15-Sep-2014', 'inbox'),
(26, 'muph2014', 'Manage Images', 'ed_pic', 'ornalet', '22-Sep-2014', 'img-manage'),
(27, 'muph2014', 'News and Updates', 'post_news', 'ornalet', '22-Sep-2014', 'news'),
(28, 'f24h2014', 'Manage Contents', 'ed_list', 'admin', '10-Jul-2014', 'manage'),
(29, 'f24h2014', 'Create User', 'user', 'admin', '10-Jul-2014', 'users'),
(30, 'f24h2014', 'Change Passwords', 'change-password', 'admin', '10-Jul-2014', 'password'),
(31, 'muph2014', 'Album', 'add-album', 'admin', '01-Sep-2014', 'album'),
(32, 'muph2014', 'Image Gallery', 'image-gallery', 'admin', '01-Sep-2014', 'photo'),
(33, 'f24h2014', 'CONTESTANTS', 'new-contest', 'admin', '01-Sep-2014', 'femail'),
(34, 'muph2014', 'Judges', 'new-judg', 'admin', '01-Sep-2014', 'judges'),
(35, 'muph2014', 'Sponsors', 'new-spons', 'admin', '01-Sep-2014', 'spons'),
(36, 'muph2014', 'Management Team', 'new-manag', 'admin', '01-Sep-2014', 'management'),
(37, 'muph2014', 'Inbox / Applications', 'application-que', 'admin', '14-Sep-2014', 'inbox'),
(38, 'muph2014', 'Manage Images', 'ed_pic', 'admin', '22-Sep-2014', 'img-manage'),
(39, 'muph2014', 'News and Updates', 'post_news', 'admin', '22-Sep-2014', 'news');

-- --------------------------------------------------------

--
-- Table structure for table `ornasys_tbl`
--

CREATE TABLE IF NOT EXISTS `ornasys_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tname_db` varchar(20) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ornasys_tbl`
--

INSERT INTO `ornasys_tbl` (`id`, `tname_db`, `display_name`) VALUES
(1, 'albm', 'Photo Album'),
(2, 'contest', 'Contestants'),
(3, 'gallery', 'Images and Photos'),
(4, 'judg', 'Judges'),
(5, 'manag', 'Management Team'),
(6, 'spons', 'Sponsors'),
(7, 'video', 'Video''s Embed Links'),
(8, 'news', 'News and Updates');

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE IF NOT EXISTS `prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(500) NOT NULL,
  `descp` text NOT NULL,
  `pack_size` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `rate` int(11) NOT NULL,
  `exp_dt` varchar(15) NOT NULL,
  `mfg_dt` varchar(15) NOT NULL,
  `dt` varchar(15) NOT NULL,
  `user` varchar(50) NOT NULL,
  `valid` varchar(15) NOT NULL,
  `stkhnd` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nm` (`nm`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`id`, `nm`, `descp`, `pack_size`, `unit`, `rate`, `exp_dt`, `mfg_dt`, `dt`, `user`, `valid`, `stkhnd`, `cat_id`) VALUES
(2, 'almonds', 'dry fruits', 1, 'KG', 100, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 1),
(4, 'nuts', 'dry fruits', 1, 'KG', 100, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 1),
(5, 'Apricotes', 'dry fruits', 1, 'KG', 100, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 1),
(6, 'Kishmish', 'dry fruits', 1, 'KG', 100, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 1),
(7, 'Mongphali', 'dry fruits', 1, 'KG', 100, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 1),
(8, 'Chalgoza', 'dry fruits', 1, 'KG', 100, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 1),
(9, 'Akhroot', 'dry fruits', 1, 'KG', 100, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 1),
(11, 'chicken', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(34, 'Qorma Chicken', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(35, 'Qima', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(36, 'Mutton', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(37, 'beef', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(38, 'Beef Tikka', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(39, 'Beef Qima', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(40, 'Chicen Qima', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(41, 'Brost Pices', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(42, 'Shawarma Chicken', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(43, 'chicken Tikka', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2),
(44, 'Roll pratha Chatni', 'dry fruits', 2, 'kg', 500, '21/01/15', '21/01/15', '21/01/15', 'yasir', '21/01/15', 20000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prod_cat`
--

CREATE TABLE IF NOT EXISTS `prod_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prod_cat`
--

INSERT INTO `prod_cat` (`id`, `cat`) VALUES
(1, 'dry fruits'),
(2, 'meat');

-- --------------------------------------------------------

--
-- Table structure for table `sale_m`
--

CREATE TABLE IF NOT EXISTS `sale_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(25) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `change` int(11) NOT NULL,
  `dis` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dt` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bill_id` (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_t`
--

CREATE TABLE IF NOT EXISTS `sale_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(25) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dt` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'ornalet', '3267c8273860b22f541f4f76c860b581'),
(16, 'Admin', '0d0eda0ae29f387f2bb440091b12a0a1'),
(17, 'drshahid ', 'c7930a985816cf7c0d0fe37dc7facba5'),
(18, 'kalsym', '89da365c3e674f19d46583d7663e686f');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  `pst_by` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_counter`
--

CREATE TABLE IF NOT EXISTS `visitor_counter` (
  `counts` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_counter`
--

INSERT INTO `visitor_counter` (`counts`) VALUES
(28545);

-- --------------------------------------------------------

--
-- Table structure for table `vtyp`
--

CREATE TABLE IF NOT EXISTS `vtyp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vtype` varchar(2) NOT NULL,
  `descp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vtyp`
--

INSERT INTO `vtyp` (`id`, `vtype`, `descp`) VALUES
(1, 'cp', 'Cash Payment'),
(2, 'bp', 'Bank Payment'),
(3, 'cr', 'Cash Receiveing'),
(4, 'br', 'Bank Receiveing'),
(5, 'jv', 'Journal Voucher'),
(6, 'pv', 'Purchase Voucher'),
(7, 'sv', 'Sale Voucher'),
(8, 'sr', 'Sale Return'),
(9, 'pr', 'Purchase Return');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prod`
--
ALTER TABLE `prod`
  ADD CONSTRAINT `prod_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `prod_cat` (`id`);

--
-- Constraints for table `sale_t`
--
ALTER TABLE `sale_t`
  ADD CONSTRAINT `sale_t_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `prod` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
