-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2017 at 06:45 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

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
(6, 7, 'fashion', '2017-10-27', 'Thika', 'in need of some fashion photographer', 1, 'accepted', 'fashion ,Thika'),
(7, 7, 'portrait', '2017-10-31', 'Nairobi', 'self potrait of myself and family', 1, 'accepted', 'portrait ,Nairobi'),
(8, 13, 'wedding', '2017-10-27', 'nairobi', 'my dream wedding', 1, 'accepted', 'Wedding,Nairobi '),
(9, 13, 'fashion', '31/10/2017', 'Nairobi', 'fashion', 1, 'rejected', ''),
(10, 13, 'decor', '2017-10-26', 'kisumu', 'new house pictures', 1, 'accepted', 'decor ,kisumu'),
(11, 13, 'decor', '2017-10-28', 'meru', 'my new home', 1, 'rejected', ''),
(12, 13, 'lifestyle', '2017-10-28', 'nyahururu', 'my lifestyle', 1, 'pending', ''),
(13, 13, 'decor', '2017-10-20', 'nyahururu', 'my fabolous house', 1, 'accepted', 'decor nyahururu'),
(14, 13, 'wedding', '2017-11-03', 'meru', 'dream wedding', 1, 'pending', ''),
(15, 13, 'wedding', '2017-11-02', 'meru', 'the wedding', 1, 'accepted', 'wedding ,meru'),
(16, 14, 'baby', '2017-11-03', 'Nairobi West', 'babys first walk', 1, 'pending', ''),
(17, 14, 'baby', '2017-11-02', 'Madaraka', 'babys first walk', 1, 'pending', ''),
(18, 13, 'landscape', '5/11/2017', 'nairobi', 'landscape', 1, 'pending', ''),
(19, 13, 'Landscape', '9/11/2017', 'nairobi', 'backyard', 1, 'pending', ''),
(20, 14, 'Landscape', '2017-11-23', 'Embakasi', 'My backyard', 4, 'accepted', 'Landscape ,Embakasi');

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
(19, 'brian ', 'john', 'johnb@gmail.com', 723556734, '');

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
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_upload`
--

INSERT INTO `customer_upload` (`picID`, `name`, `folderName`, `custID`, `datePosted`, `timePosted`, `extension`, `edit_status`, `dateEdited`, `description`) VALUES
(1, '638283', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(2, '5aTjJhj-knd-wallpaper', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(3, 'aggiornamento-sito-dopo-algoritmo', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(4, '60854-OAOEZX-752', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(5, '61677-OAN4OG-161', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(6, 'doc6', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(7, 'doc5', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(8, 'embedded-systems-design_2_orig', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(9, 'embedded-systems-laboratory-systems', '', 13, '2017-11-03', '00:00:00', 'jpg', 'Unedited', '', ''),
(10, '2', 'Uncategorised', 13, '2017-11-10', '08:44:38', 'jpg', 'Unedited', '', ''),
(11, 'boris-baldinger-367773', 'try', 13, '2017-11-11', '11:47:45', 'jpg', 'Unedited', '', '');

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
  `seen` varchar(255) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `bookID`, `custID`, `photoID`, `status`, `reject_reason`, `datePosted`, `seen`) VALUES
(1, 7, 7, 1, 'accepted', '', '12.00.00 PM', 'unseen'),
(2, 9, 13, 1, 'rejected', 'busy then', '12.00.00 PM', 'unseen'),
(3, 11, 13, 1, 'rejected', 'not available', '12.00.00 PM', 'unseen'),
(4, 10, 13, 1, 'accepted', '', '2017-11-08', 'unseen'),
(5, 20, 14, 4, 'accepted', '', '2017-11-11', 'unseen');

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
(5, 'Decor');

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
(1, '', 'kirigo', 'sharon@gmail.com', 'first trial', 'read'),
(2, '', 'kamau njeri', 'sharon@gmail.com', 'second try', 'unread'),
(3, '', 'karanja', 'sharon@gmail.com', 'third try', 'unread'),
(4, '', 'kirigo karanja', 'sharon@gmail.com', 'fourth try', 'read'),
(5, '', 'kamau njeri', 'sharon@gmail.com', 'fifth try', 'read'),
(6, '', 'kirigo karanja', 'sharon@gmail.com', '6th try', 'unread'),
(7, '', 'kirigo karanja', 'sharon@gmail.com', '7th try', 'read'),
(8, '', 'sharon kirigo', 'sharon@gmail.com', '8th try', 'unread'),
(9, '', 'sharon kirigo', 'sharon@gmail.com', 'trial', 'unread'),
(10, '', 'sharon kirigo', 'sharon@gmail.com', 'almost there', 'unread'),
(11, '', 'sharon kirigo', 'sharon@gmail.com', 'almost', 'read'),
(12, '', 'sharon kirigo', 'sharon@gmail.com', 'almost', 'read'),
(13, '', 'sharon kirigo', 'sharon@gmail.com', 'about time', 'read'),
(14, '', 'kirigo karanja', 'sharon@gmail.com', 'finally', 'read'),
(15, '', 'kirigo karanja', 'sharon@gmail.com', 'its working', 'read'),
(16, '', 'kirigo karanja', 'sharon@gmail.com', 'yeaaahhh', 'read'),
(17, '', 'kirigo karanja', 'kirigokaranja@gmail.com', 'booyaah!!', 'read'),
(18, '', 'kirigo karanja', 'kirigokaranja@gmail.com', 'thats what i like', 'read'),
(19, '', 'kuchiki byakuya', 'byakuya@gmail.com', 'This is an amazing landing page', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `photoID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`photoID`, `firstName`, `surname`, `email`, `phone_number`, `status`) VALUES
(1, 'Jonathan ', 'Ive', 'jonathan@gmail.com', '768456234', 'active'),
(2, 'Sharon', 'Karanja', 'karanja@gmail.com', '713774575', 'active'),
(3, 'Eunice ', 'Manyasi', 'emanyasi@gmail.com', '0788345678', 'inactive'),
(4, 'Githinji', 'Wanjohi', 'githinji@gmail.com', '0796889456', 'active');

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
(21, 'boris-baldinger-367773', '2017-11-09', 'jpg', 1),
(22, 'fabrizio-conti-437995', '2017-11-09', 'jpg', 1),
(23, 'julien-laurent-374836', '2017-11-09', 'jpg', 1),
(24, 'fabrizio-conti-437995', '2017-11-09', 'jpg', 1),
(25, 'boris-baldinger-367773', '2017-11-09', 'jpg', 1),
(26, 'julien-laurent-374836', '2017-11-09', 'jpg', 1),
(27, 'lens', '2017-11-09', 'jpg', 1),
(28, 'rucksack-magazine-356790', '2017-11-09', 'jpg', 1),
(29, '638283', '2017-11-10', 'jpg', 3),
(30, 'aggiornamento-sito-dopo-algoritmo', '2017-11-10', 'jpg', 3),
(31, '61677-OAN4OG-161', '2017-11-10', 'jpg', 3),
(32, 'aggiornamento-sito-dopo-algoritmo', '2017-11-10', 'jpg', 3),
(33, 'piron-guillaume-367208', '2017-11-11', 'jpg', 1),
(34, 'piron-guillaume-361682', '2017-11-11', 'jpg', 1),
(35, 'Camera', '2017-11-11', 'jpg', 4),
(36, 'alif-ngoylung-243373', '2017-11-11', 'jpg', 4),
(37, 'daria-nepriakhina-99257', '2017-11-11', 'jpg', 4),
(38, 'daniel-frank-201417', '2017-11-11', 'jpg', 4),
(39, 'boris-baldinger-367773', '2017-11-11', 'jpg', 4);

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
('1', 'ann@gmail.com', '1234', 'active'),
('1', 'bond@gmail.com', '1234', 'active'),
('1', 'brian@gmail.com', '1234', 'active'),
('1', 'charleswafula29@gmail.com', '1234', 'active'),
('1', 'charleswafula29gmail.com', '2345', 'active'),
('1', 'cyrilondime@gmail.com', '1234', 'active'),
('1', 'doe@gmail.com', '1234', 'active'),
('2', 'emanyasi@gmail.com', '1234', 'inactive'),
('2', 'githinji@gmail.com', '1234', 'active'),
('1', 'johnb@gmail.com', '1234', 'active'),
('2', 'jonathan@gmail.com', '1234', 'active'),
('2', 'karanja@gmail.com', '1234', 'active'),
('1', 'lynn@gmail.com', '1234', 'active'),
('3', 'main@admin.com', 'admin01', 'active'),
('1', 'mutuma@gmail.com', '1234', 'active'),
('1', 'mwenda@gmail.com', '1234', 'active'),
('1', 'sharon@gmail.com', '1234', 'active');

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
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `customer_upload`
--
ALTER TABLE `customer_upload`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `photographer`
--
ALTER TABLE `photographer`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `photographer_upload`
--
ALTER TABLE `photographer_upload`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
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
