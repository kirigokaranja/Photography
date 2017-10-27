-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 09:43 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foto2`
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
  `photoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'kirigo karanja', '', 'sharon@gmail.com', 713774575, ''),
(8, 'Githinji Wanjohi', '', 'gyth.wanjohi@gmail.com', 710700123, ''),
(9, 'g', '', 'g@g.com', 724536725, ''),
(10, 'Sheldon', 'Cooper', 'sheldon@gmail.com', 717472552, ''),
(11, 'Mkenya', 'Daima', 'mk@gmail.com', 717643735, ''),
(12, 'Wesley', 'Jabuya', 'jabuya@gmail.com', 714363543, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_upload`
--

CREATE TABLE `customer_upload` (
  `picID` int(11) NOT NULL,
  `datePosted` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `extension` varchar(6) NOT NULL,
  `edit_status` varchar(255) NOT NULL,
  `DateEdited` varchar(10) NOT NULL,
  `custID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_upload`
--

INSERT INTO `customer_upload` (`picID`, `datePosted`, `name`, `extension`, `edit_status`, `DateEdited`, `custID`) VALUES
(48, '0000-00-00', 'IMG_2185-2', 'jpg', 'Unedited', '', 10),
(49, '0000-00-00', 'IMG_1878', 'jpg', 'Edited', '', 10),
(50, '0000-00-00', 'IMG_2153', 'jpg', 'Edited', '', 10),
(51, '0000-00-00', 'IMG_2151', 'jpg', 'Unedited', '', 10),
(52, '0000-00-00', 'IMG_2328', 'JPG', 'Unedited', '', 10),
(53, '0000-00-00', 'IMG_2331', 'JPG', 'Unedited', '', 10),
(54, '0000-00-00', 'IMG_2330', 'JPG', 'Unedited', '', 10),
(55, '0000-00-00', 'IMG_2333', 'JPG', 'Unedited', '', 10),
(56, '0000-00-00', 'IMG_2332', 'JPG', 'Unedited', '', 10),
(57, '0000-00-00', 'IMG_2329', 'JPG', 'Unedited', '', 10),
(58, '0000-00-00', 'IMG_2335', 'JPG', 'Unedited', '', 10),
(59, '0000-00-00', 'IMG_2334', 'JPG', 'Unedited', '', 10),
(60, '0000-00-00', 'IMG_2336', 'JPG', 'Unedited', '', 10),
(61, '0000-00-00', 'IMG_2142', 'JPG', 'Unedited', '', 10),
(62, '0000-00-00', 'IMG_2095', 'JPG', 'Unedited', '', 10),
(63, '0000-00-00', 'IMG_2066', 'JPG', 'Unedited', '', 10),
(64, '0000-00-00', 'IMG_1946', 'JPG', 'Unedited', '', 10),
(65, '0000-00-00', 'IMG_1851', 'JPG', 'Unedited', '', 10),
(66, '0000-00-00', '_DSC2247', 'jpg', 'Unedited', '', 10),
(67, '0000-00-00', '_DSC2255', 'jpg', 'Unedited', '', 10),
(68, '0000-00-00', '_DSC2259', 'jpg', 'Unedited', '', 10),
(69, '2017-10-26', 'DSC_7313', 'JPG', 'Unedited', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messID`, `name`, `email`, `message`) VALUES
(1, 'Githinji Wanjohi', 'gyth.wanjohi@gmail.com', 'I want photos!!'),
(2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `photoID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`photoID`, `name`, `email`, `phone_number`) VALUES
(1, 'Jonathan Ive', 'jonathan@gmail.com', 768456234);

-- --------------------------------------------------------

--
-- Table structure for table `photographer_upload`
--

CREATE TABLE `photographer_upload` (
  `picID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `photographerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('customer', 'g@g.com', '123', 'active'),
('customer', 'gyth.wanjohi@gmail.com', '1234', 'active'),
('customer', 'jabuya@gmail.com', '1234', 'active'),
('photographer', 'jonathan@gmail.com', '12345678', 'active'),
('customer', 'mk@gmail.com', '1234', 'active'),
('customer', 'sharon@gmail.com', '1234', 'active'),
('customer', 'sheldon@gmail.com', '1234', 'active');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer_upload`
--
ALTER TABLE `customer_upload`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `photographer`
--
ALTER TABLE `photographer`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `photographer_upload`
--
ALTER TABLE `photographer_upload`
  MODIFY `picID` int(11) NOT NULL AUTO_INCREMENT;
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
