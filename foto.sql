-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 09:54 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foto`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photoID` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `custID`, `event`, `date`, `location`, `description`, `photoID`, `status`, `title`) VALUES
(5, 7, 'family', '2017-10-18', 'Madaraka', 'shoot', 1, 'accepted', 'Madaraka,Family'),
(6, 7, 'fashion', '2017-10-27', 'Thika', 'in need of some fashion photographer', 1, 'pending', ''),
(7, 7, 'portrait', '2017-10-31', 'Nairobi', 'self potrait of myself and family', 1, 'pending', ''),
(8, 13, 'wedding', '2017-10-27', 'nairobi', 'my dream wedding', 1, 'accepted', 'Wedding,Nairobi '),
(9, 13, 'fashion', '31/10/2017', 'Nairobi', 'fashion', 1, 'pending', ''),
(10, 13, 'decor', '2017-10-26', 'kisumu', 'new house pictures', 1, 'rejected', ''),
(11, 13, 'decor', '2017-10-28', 'meru', 'my new home', 1, 'pending', ''),
(12, 13, 'lifestyle', '2017-10-28', 'nyahururu', 'my lifestyle', 1, 'pending', ''),
(13, 13, 'decor', '2017-10-20', 'nyahururu', 'my fabolous house', 1, 'accepted', 'decor nyahururu'),
(14, 13, 'wedding', '2017-11-03', 'meru', 'dream wedding', 1, 'pending', ''),
(15, 13, 'wedding', '2017-11-02', 'meru', 'the wedding', 1, 'accepted', 'wedding ,meru'),
(16, 14, 'baby', '2017-11-03', 'Nairobi West', 'babys first walk', 1, 'pending', ''),
(17, 14, 'baby', '2017-11-02', 'Madaraka', 'babys first walk', 1, 'pending', ''),
(18, 13, 'landscape', '5/11/2017', 'nairobi', 'landscape', 1, 'pending', ''),
(19, 11, '', '2017-11-15', 'Syokimau', 'Wedding Photos', 1, 'accepted', ' ,Syokimau'),
(20, 11, '', '2017-12-14', 'Kakamega', 'Party', 1, 'pending', ''),
(21, 20, 'decor', '2017-11-09', 'Nakuru', 'Something', 1, 'pending', ''),
(22, 22, '', '2017-12-11', 'Nairobi', 'Fashion Shoot', 1, 'accepted', ' ,Nairobi'),
(23, 23, '', '2017-11-24', 'Madaraka', 'Mayai', 1, 'accepted', ' ,Madaraka'),
(24, 23, 'Lifestyle', '2017-12-12', 'Nairobi', 'Shoot', 2, 'pending', ''),
(25, 23, 'Lifestyle', '2017-12-17', 'Nakuru', 'Urban', 4, 'pending', ''),
(26, 23, 'Decor', '2017-11-19', 'Laisamis', 'Architecture', 3, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `firstName`, `surname`, `email`, `phone_number`, `picture`) VALUES
(7, 'kirigo ', 'karanja', 'sharon@gmail.com', 713774575, ''),
(8, 'Lynette ', 'David', 'lynn@gmail.com', 723556734, ''),
(9, '', 'james', 'bond@gmail.com', 723556734, ''),
(11, '', 'john', 'doe@gmail.com', 123949, ''),
(12, 'brian ', 'john', 'brian@gmail.com', 723556734, ''),
(13, 'brian', 'mutuma', 'mutuma@gmail.com', 713774575, '78785-p1.jpg'),
(14, 'Ann ', 'Wairigia', 'ann@gmail.com', 724907184, '98753-flower.jpg'),
(15, '', 'charles', 'charleswafula29gmail.com', 2345, ''),
(16, 'mum', 'mwenda', 'mwenda@gmail.com', 724907184, ''),
(17, 'cyril', 'odiwuor', 'cyrilondime@gmail.com', 701252134, ''),
(18, 'charles', 'wafula', 'charleswafula29@gmail.com', 790450728, '65939-638283.jpg'),
(19, 'brian ', 'john', 'johnb@gmail.com', 723556734, ''),
(20, 'Ruth', 'Maina', 'rmaina66@gmail.com', 712978546, ''),
(21, 'Wesley', 'Jabuya', 'wes@gmail.com', 742644267, ''),
(22, 'Sheldon', 'Cooper', 'sheldon@gmail.com', 734626326, ''),
(23, 'David', 'Kariuki', 'davie@gmail.com', 725353734, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_upload`
--

CREATE TABLE `customer_upload` (
  `picID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `folderName` varchar(255) NOT NULL,
  `custID` int(11) NOT NULL,
  `datePosted` varchar(10) NOT NULL,
  `timePosted` time NOT NULL,
  `extension` varchar(6) NOT NULL,
  `edit_status` varchar(255) NOT NULL,
  `dateEdited` varchar(10) NOT NULL,
  `timeEdited` time DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_upload`
--

INSERT INTO `customer_upload` (`picID`, `name`, `folderName`, `custID`, `datePosted`, `timePosted`, `extension`, `edit_status`, `dateEdited`, `timeEdited`, `description`) VALUES
(173, 'IMG_4026', 'Dogs', 20, '2017-11-09', '17:25:39', 'jpg', 'edited', '2017-11-10', '08:47:32', ''),
(174, 'IMG_4045', 'Dogs', 20, '2017-11-09', '17:25:39', 'jpg', 'edited', '2017-11-10', '08:47:32', ''),
(175, 'IMG_3965', 'Dogs', 20, '2017-11-09', '17:25:39', 'jpg', 'edited', '2017-11-10', '08:47:32', ''),
(176, 'IMG_4026-2', 'Dogs', 20, '2017-11-09', '17:25:40', 'jpg', 'edited', '2017-11-11', '12:39:22', ''),
(177, 'IMG_3976', 'Dogs', 20, '2017-11-09', '17:25:40', 'jpg', 'edited', '2017-11-11', '12:39:22', ''),
(178, 'elizabeth-lies-159007', 'Dogs', 20, '2017-11-09', '17:26:31', 'jpg', 'In Progress', '', NULL, ''),
(179, 'ben-o-sullivan-382817', 'Dogs', 20, '2017-11-09', '17:26:32', 'jpg', 'In Progress', '', NULL, ''),
(180, 'alessandro-viaro-94370', 'Dogs', 20, '2017-11-09', '17:26:32', 'jpg', 'In Progress', '', NULL, ''),
(181, 'myles-tan-84040', 'Dogs', 20, '2017-11-09', '17:26:32', 'jpg', 'In Progress', '', NULL, ''),
(182, 'andrew-neel-128377', 'Dogs', 20, '2017-11-09', '17:26:32', 'jpg', 'In Progress', '', NULL, ''),
(183, 'elizabeth-lies-159007', 'Uncategorised', 20, '2017-11-09', '17:27:10', 'jpg', 'edited', '2017-11-09', '18:35:46', ''),
(184, 'luisa-rusche-2228', 'Uncategorised', 20, '2017-11-09', '17:27:10', 'jpg', 'edited', '2017-11-09', '18:35:46', ''),
(185, 'ben-o-sullivan-382817', 'Uncategorised', 20, '2017-11-09', '17:27:10', 'jpg', 'edited', '2017-11-09', '18:35:46', ''),
(186, 'myles-tan-84040', 'Uncategorised', 20, '2017-11-09', '17:27:10', 'jpg', 'edited', '2017-11-09', '18:35:46', ''),
(187, 'alessandro-viaro-94370', 'Uncategorised', 20, '2017-11-09', '17:27:10', 'jpg', 'edited', '2017-11-09', '18:35:46', ''),
(188, 'andrew-neel-128377', 'Uncategorised', 20, '2017-11-09', '17:27:10', 'jpg', 'edited', '2017-11-09', '18:35:46', ''),
(189, 'IMG_2153-2', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(190, 'IMG_2153', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(191, 'IMG_2153-3', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(192, 'IMG_2153-5', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(193, 'IMG_2153-4', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(194, 'IMG_2155', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(195, 'IMG_2156', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(196, 'IMG_2157', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(197, 'IMG_2158', 'Cars', 21, '2017-11-09', '17:28:19', 'jpg', 'In Progress', '', NULL, ''),
(198, '_DSC2247', 'Portraits', 21, '2017-11-09', '17:30:48', 'jpg', 'edited', '2017-11-09', '18:16:30', ''),
(199, '_DSC2249', 'Portraits', 21, '2017-11-09', '17:30:48', 'jpg', 'edited', '2017-11-09', '18:16:30', ''),
(200, '_DSC2250', 'Portraits', 21, '2017-11-09', '17:30:48', 'jpg', 'edited', '2017-11-09', '18:16:30', ''),
(201, '_DSC2244', 'Portraits', 21, '2017-11-09', '17:30:48', 'jpg', 'edited', '2017-11-09', '18:16:30', ''),
(202, 'DSC_7411', 'Uncategorised', 21, '2017-11-09', '17:31:23', 'JPG', 'edited', '2017-11-09', '18:05:45', ''),
(203, 'DSC_7326', 'Uncategorised', 21, '2017-11-09', '17:31:36', 'JPG', 'edited', '2017-11-09', '17:52:15', ''),
(204, 'DSC_7280', 'Uncategorised', 21, '2017-11-09', '17:31:38', 'JPG', 'edited', '2017-11-09', '17:50:53', ''),
(205, 'DSC_7342', 'Uncategorised', 21, '2017-11-09', '17:31:39', 'JPG', 'edited', '2017-11-09', '17:50:04', ''),
(206, 'IMG_2796', 'Shoot', 21, '2017-11-09', '17:34:29', 'jpg', 'edited', '2017-11-09', '17:35:47', ''),
(207, 'IMG_2735', 'Shoot', 21, '2017-11-09', '17:34:29', 'jpg', 'edited', '2017-11-09', '17:35:47', ''),
(208, 'IMG_2735-4', 'Shoot', 21, '2017-11-09', '17:34:29', 'jpg', 'edited', '2017-11-09', '17:35:47', ''),
(209, 'IMG_2679', 'Shoot', 21, '2017-11-09', '17:34:29', 'jpg', 'edited', '2017-11-09', '17:35:47', ''),
(210, 'IMG_2784', 'Shoot', 21, '2017-11-09', '17:34:29', 'jpg', 'edited', '2017-11-09', '17:35:47', ''),
(211, 'IMG_2153', 'Cars', 22, '2017-11-11', '13:07:19', 'jpg', 'edited', '2017-11-13', '06:52:56', 'The photos were well taken'),
(212, 'IMG_2153-4', 'Cars', 22, '2017-11-11', '13:07:19', 'jpg', 'edited', '2017-11-13', '06:52:56', 'The photos were well taken'),
(213, 'IMG_2153-5', 'Cars', 22, '2017-11-11', '13:07:19', 'jpg', 'edited', '2017-11-13', '06:52:56', 'The photos were well taken'),
(214, 'IMG_2155', 'Cars', 22, '2017-11-11', '13:07:19', 'jpg', 'edited', '2017-11-13', '06:52:56', 'The photos were well taken'),
(215, 'IMG_2153-2', 'Cars', 22, '2017-11-11', '13:07:19', 'jpg', 'edited', '2017-11-13', '06:52:56', 'The photos were well taken'),
(216, 'IMG_2153-3', 'Cars', 22, '2017-11-11', '13:07:19', 'jpg', 'edited', '2017-11-13', '06:52:56', 'The photos were well taken'),
(217, 'IMG_2185', 'Fashion', 22, '2017-11-11', '17:09:30', 'jpg', 'edited', '2017-11-13', '15:35:13', 'Fashion Shoot'),
(218, 'IMG_2185-3', 'Fashion', 22, '2017-11-11', '17:09:30', 'jpg', 'edited', '2017-11-13', '15:35:13', 'Fashion Shoot'),
(219, 'IMG_1732', 'Fashion', 22, '2017-11-11', '17:09:30', 'jpg', 'edited', '2017-11-13', '15:35:13', 'Fashion Shoot'),
(220, 'IMG_2185-4', 'Fashion', 22, '2017-11-12', '19:56:57', 'jpg', 'edited', '2017-11-12', '19:57:38', ''),
(221, '1469139396kcc', 'Urban', 8, '2017-11-12', '21:26:28', 'jpg', 'Unedited', '', NULL, ''),
(222, 'ben-o-sullivan-382817', 'Urban', 8, '2017-11-12', '21:26:28', 'jpg', 'Unedited', '', NULL, ''),
(223, 'elizabeth-lies-159007', 'Urban', 8, '2017-11-12', '21:26:29', 'jpg', 'Unedited', '', NULL, ''),
(224, 'githinji-wanjohi-372333', 'Urban', 8, '2017-11-12', '21:26:30', 'jpg', 'Unedited', '', NULL, ''),
(225, 'andrew-neel-128377', 'Urban', 8, '2017-11-12', '21:26:30', 'jpg', 'Unedited', '', NULL, ''),
(226, 'alessandro-viaro-94370', 'Urban', 8, '2017-11-12', '21:26:31', 'jpg', 'Unedited', '', NULL, ''),
(227, 'joanna-kosinska-412005', 'Urban', 8, '2017-11-12', '21:26:31', 'jpg', 'Unedited', '', NULL, ''),
(228, 'luisa-rusche-2228', 'Urban', 8, '2017-11-12', '21:26:31', 'jpg', 'Unedited', '', NULL, ''),
(229, 'myles-tan-84040', 'Urban', 8, '2017-11-12', '21:26:31', 'jpg', 'Unedited', '', NULL, ''),
(230, 'joey-kyber-132520', 'Urban', 8, '2017-11-12', '21:26:31', 'jpg', 'Unedited', '', NULL, ''),
(231, 'tobias-keller-104263', 'Urban', 8, '2017-11-12', '21:26:32', 'jpg', 'Unedited', '', NULL, ''),
(232, 'sweet-ice-cream-photography-106738', 'Urban', 8, '2017-11-12', '21:26:33', 'jpg', 'Unedited', '', NULL, ''),
(233, 'IMG_4026', 'Uncategorised', 8, '2017-11-12', '22:06:02', 'jpg', 'Unedited', '', NULL, ''),
(234, 'blurred', 'Uncategorised', 8, '2017-11-12', '22:06:03', 'jpg', 'Unedited', '', NULL, ''),
(235, 'IMG_3965', 'Uncategorised', 8, '2017-11-12', '22:06:03', 'jpg', 'Unedited', '', NULL, ''),
(236, 'IMG_3976', 'Uncategorised', 8, '2017-11-12', '22:06:03', 'jpg', 'Unedited', '', NULL, ''),
(237, 'IMG_4026-2', 'Uncategorised', 8, '2017-11-12', '22:06:03', 'jpg', 'Unedited', '', NULL, ''),
(238, 'IMG_4055', 'Uncategorised', 8, '2017-11-12', '22:06:40', 'jpg', 'Unedited', '', NULL, ''),
(239, 'IMG_4097', 'Uncategorised', 8, '2017-11-12', '22:06:53', 'jpg', 'Unedited', '', NULL, ''),
(240, 'IMG_4141', 'Uncategorised', 8, '2017-11-12', '22:09:47', 'jpg', 'Unedited', '', NULL, ''),
(241, 'IMG_4045-4', 'Uncategorised', 8, '2017-11-12', '22:12:41', 'jpg', 'Unedited', '', NULL, ''),
(242, 'blurred', 'November', 8, '2017-11-13', '16:02:31', 'jpg', 'Unedited', '', NULL, ''),
(243, 'IMG_3965', 'November', 8, '2017-11-13', '16:02:31', 'jpg', 'Unedited', '', NULL, ''),
(244, 'IMG_4026', 'November', 8, '2017-11-13', '16:02:31', 'jpg', 'Unedited', '', NULL, ''),
(245, 'IMG_4045', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(246, 'IMG_3976', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(247, 'IMG_4026-2', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(248, 'IMG_4045-3', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(249, 'IMG_4045-2', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(250, 'IMG_4097', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(251, 'IMG_4055', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(252, 'IMG_4045-4', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(253, 'IMG_4045-5', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(254, 'IMG_4132', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(255, 'IMG_4141', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(256, 'IMG_4161', 'November', 8, '2017-11-13', '16:02:32', 'jpg', 'Unedited', '', NULL, ''),
(257, 'Church-House-1-1024x666', 'Architecture', 23, '2017-11-14', '07:51:37', 'jpg', 'edited', '2017-11-14', '08:00:14', 'Nice Architectural pictures. Easy edit'),
(258, 'Mombasa_PIC', 'Architecture', 23, '2017-11-14', '07:51:37', 'jpg', 'edited', '2017-11-14', '08:00:14', 'Nice Architectural pictures. Easy edit'),
(259, 'joey-kyber-132520', 'Architecture', 23, '2017-11-14', '07:51:38', 'jpg', 'In Progress', '', NULL, ''),
(260, 'IMG_4045-4', 'Animals', 23, '2017-11-14', '07:52:34', 'jpg', 'Unedited', '', NULL, ''),
(261, 'IMG_4026-2', 'Animals', 23, '2017-11-14', '07:52:34', 'jpg', 'Unedited', '', NULL, ''),
(262, 'IMG_4045', 'Animals', 23, '2017-11-14', '07:52:34', 'jpg', 'Unedited', '', NULL, ''),
(263, 'IMG_4141', 'Animals', 23, '2017-11-14', '07:52:34', 'jpg', 'Unedited', '', NULL, ''),
(264, 'IMG_4055', 'Animals', 23, '2017-11-14', '07:52:35', 'jpg', 'Unedited', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `photoID` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reject_reason` varchar(255) NOT NULL,
  `datePosted` varchar(255) NOT NULL,
  `seen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `bookID`, `custID`, `photoID`, `status`, `reject_reason`, `datePosted`, `seen`) VALUES
(1, 22, 22, 1, 'accepted', '', '2017-11-12', ''),
(2, 23, 23, 1, 'accepted', '', '2017-11-14', ''),
(3, 0, 0, 0, '', '', '2017-11-14', '');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `name`) VALUES
(1, 'Landscape'),
(2, 'Portrait'),
(3, 'Lifestyle'),
(4, 'Family'),
(5, 'Decor'),
(6, 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messID` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `viewed` varchar(255) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messID`, `date`, `name`, `email`, `message`, `viewed`) VALUES
(1, '7/11/2017', 'kirigo', 'sharon@gmail.com', 'first trial', 'read'),
(2, '7/11/2017', 'kamau njeri', 'sharon@gmail.com', 'second try', 'unread'),
(3, '7/11/2017', 'karanja', 'sharon@gmail.com', 'third try', 'unread'),
(4, '7/11/2017', 'kirigo karanja', 'sharon@gmail.com', 'fourth try', 'read'),
(5, '9/11/2017', 'kamau njeri', 'sharon@gmail.com', 'fifth try', 'read'),
(6, '21/10/2017', 'kirigo karanja', 'sharon@gmail.com', '6th try', 'unread'),
(7, '21/10/2017', 'kirigo karanja', 'sharon@gmail.com', '7th try', 'read'),
(8, '9/11/2017', 'sharon kirigo', 'sharon@gmail.com', '8th try', 'unread'),
(9, '21/10/2017', 'sharon kirigo', 'sharon@gmail.com', 'trial', 'unread'),
(10, '9/11/2017', 'sharon kirigo', 'sharon@gmail.com', 'almost there', 'unread'),
(11, '9/11/2017', 'sharon kirigo', 'sharon@gmail.com', 'almost', 'read'),
(12, '21/10/2017', 'sharon kirigo', 'sharon@gmail.com', 'almost', 'read'),
(13, '9/11/2017', 'sharon kirigo', 'sharon@gmail.com', 'about time', 'read'),
(14, '21/10/2017', 'kirigo karanja', 'sharon@gmail.com', 'finally', 'read'),
(15, '1/11/2017', 'kirigo karanja', 'sharon@gmail.com', 'its working', 'read'),
(16, '1/11/2017', 'kirigo karanja', 'sharon@gmail.com', 'yeaaahhh', 'read'),
(17, '11/11/2017', 'kirigo karanja', 'kirigokaranja@gmail.com', 'booyaah!!', 'read'),
(18, '11/11/2017', 'kirigo karanja', 'kirigokaranja@gmail.com', 'thats what i like', 'read'),
(19, '11/11/2017', 'kuchiki byakuya', 'byakuya@gmail.com', 'This is an amazing landing page', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `photoID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`photoID`, `firstName`, `surname`, `email`, `phone_number`, `status`) VALUES
(1, 'Jonathan ', 'Ive', 'jonathan@gmail.com', 768456234, 'active'),
(2, 'Sharon', 'Karanja', 'karanja@gmail.com', 735373532, 'active'),
(3, 'Eunice', 'Manyasi', 'emanyasi@gmail.com', 734362527, 'active'),
(4, 'Githinji', 'Wanjohi', 'githinji@gmail.com', 735352624, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `photographer_upload`
--

CREATE TABLE `photographer_upload` (
  `picID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datePosted` varchar(11) NOT NULL,
  `extension` varchar(6) NOT NULL,
  `photographerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer_upload`
--

INSERT INTO `photographer_upload` (`picID`, `name`, `datePosted`, `extension`, `photographerID`) VALUES
(14, 'IMG_3965', '2017-11-14', 'jpg', 1),
(15, 'IMG_4055', '2017-11-14', 'jpg', 1),
(16, 'IMG_4097', '2017-11-14', 'jpg', 1),
(17, 'IMG_4026-2', '2017-11-14', 'jpg', 1),
(18, 'IMG_4141', '2017-11-14', 'jpg', 1),
(19, 'IMG_4132', '2017-11-14', 'jpg', 1),
(20, 'boba-jovanovic-65138', '2017-11-14', 'jpg', 4),
(21, 'Screenshot_20170531-113219', '2017-11-14', 'jpg', 4),
(22, 'mpumelelo-macu-283883', '2017-11-14', 'jpg', 4),
(23, 'download', '2017-11-14', 'jpg', 4),
(24, 'wallpaper1', '2017-11-14', 'jpg', 4),
(25, 'tanja-heffner-259382', '2017-11-14', 'jpg', 4),
(26, 'wallpaper4', '2017-11-14', 'jpg', 4),
(27, '1469139396kcc', '2017-11-14', 'jpg', 2),
(28, 'ben-o-sullivan-382817', '2017-11-14', 'jpg', 2),
(29, 'luisa-rusche-2228', '2017-11-14', 'jpg', 2),
(30, 'joey-kyber-132520', '2017-11-14', 'jpg', 2),
(31, 'andrew-neel-128377', '2017-11-14', 'jpg', 2),
(32, 'alessandro-viaro-94370', '2017-11-14', 'jpg', 2),
(33, 'joanna-kosinska-412005', '2017-11-14', 'jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_type`, `email`, `password`, `active`) VALUES
('2', '', '1234', 'active'),
('1', 'ann@gmail.com', '1234', 'active'),
('1', 'bond@gmail.com', '1234', 'active'),
('1', 'brian@gmail.com', '1234', 'active'),
('1', 'charleswafula29@gmail.com', '1234', 'active'),
('1', 'charleswafula29gmail.com', '2345', 'active'),
('1', 'cyrilondime@gmail.com', '1234', 'active'),
('1', 'davie@gmail.com', 'dae756902e748a6be61db88f4a936f93', 'active'),
('1', 'doe@gmail.com', '1234', 'active'),
('2', 'emanyasi@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'active'),
('2', 'githinji@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'active'),
('1', 'johnb@gmail.com', '1234', 'active'),
('2', 'jonathan@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'active'),
('2', 'karanja@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'active'),
('1', 'lynn@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'active'),
('3', 'main@admin.com', '18C6D818AE35A3E8279B5330EDA01498', 'active'),
('1', 'mutuma@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'active'),
('1', 'mwenda@gmail.com', '1234', 'active'),
('1', 'rmaina66@gmail.com', '1234', 'active'),
('1', 'sharon@gmail.com', '1234', 'active'),
('1', 'sheldon@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'active'),
('1', 'wes@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_id`, `user_type`) VALUES
(1, 'customer'),
(2, 'photographer'),
(3, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `custID` (`custID`),
  ADD KEY `photoID` (`photoID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `customer_upload`
--
ALTER TABLE `customer_upload`
  ADD PRIMARY KEY (`picID`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messID`);

--
-- Indexes for table `photographer`
--
ALTER TABLE `photographer`
  ADD PRIMARY KEY (`photoID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `photographer_upload`
--
ALTER TABLE `photographer_upload`
  ADD PRIMARY KEY (`picID`),
  ADD KEY `photographerID` (`photographerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `customer_upload`
--
ALTER TABLE `customer_upload`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `photographer`
--
ALTER TABLE `photographer`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `photographer_upload`
--
ALTER TABLE `photographer_upload`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`photoID`) REFERENCES `photographer` (`photoID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `customer_upload`
--
ALTER TABLE `customer_upload`
  ADD CONSTRAINT `customer_upload_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`);

--
-- Constraints for table `photographer`
--
ALTER TABLE `photographer`
  ADD CONSTRAINT `photographer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `photographer_upload`
--
ALTER TABLE `photographer_upload`
  ADD CONSTRAINT `photographer_upload_ibfk_1` FOREIGN KEY (`photographerID`) REFERENCES `photographer` (`photoID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
