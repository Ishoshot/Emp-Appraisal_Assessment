-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 04:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appraisal`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `c_id` int(11) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  `proof` text,
  `lecturer` varchar(50) DEFAULT NULL,
  `complaint` text,
  `date` varchar(30) DEFAULT NULL,
  `mode` varchar(20) DEFAULT NULL,
  `photo` text,
  `user` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `category`, `level`, `proof`, `lecturer`, `complaint`, `date`, `mode`, `photo`, `user`) VALUES
(1, 'Harrassment', 'High', 'IMG_20181219_201212.jpg', 'Mrs Adebayo Mistura', 'Briefly Expalin What Happened Briefly Expalin What Happened  Briefly Expalin What Happened  Briefly Expalin What Happened  Briefly Expalin What Happened Briefly Expalin What Happened Briefly Expalin What Happened Briefly Expalin What Happened  Briefly Expalin What Happened ', '18 June 2019, 01:24 PM', 'Anonymos', 'avatar.png', 'ishoshot@gmail.com'),
(2, 'Embarrassment', 'Intermediate', '', 'Mrs Adebayo Mistura', 'Briefly Expalin What Happened', '18 June 2019, 01:26 PM', '16/85/0049', 'IMG_20181205_093037.jpg', 'ishoshot@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard  user', ''),
(2, 'Administrator ', '{\r\n\"admin\": 1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `praise`
--

CREATE TABLE `praise` (
  `a_id` int(11) NOT NULL,
  `mode` varchar(40) DEFAULT NULL,
  `photo` text,
  `lecturer` varchar(50) DEFAULT NULL,
  `reason` text,
  `rate` varchar(30) DEFAULT NULL,
  `praise` text,
  `improve` text,
  `date` varchar(30) DEFAULT NULL,
  `user` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `praise`
--

INSERT INTO `praise` (`a_id`, `mode`, `photo`, `lecturer`, `reason`, `rate`, `praise`, `improve`, `date`, `user`) VALUES
(1, '16/85/0049', 'avatar.png', 'Mrs Adebayo Mistura', 'Fantastic Relationship with Students', '80%', 'Write something cool about the lecturer, because It goes a long way in Career Development Write something cool about the lecturer, because It goes a long way in Career Development Write something cool about the lecturer, because It goes a long way in Career Development Write something cool about the lecturer, because It goes a long way in Career Development Write something cool about the lecturer, because It goes a long way in Career Development', 'Outline out my weaknesses inorder to help me Improve', '18 June 2019, 01:28 PM', 'ishoshot@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(64) NOT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `matric` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `department` varchar(40) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `photo` text,
  `salt` varchar(32) NOT NULL,
  `joined` varchar(25) NOT NULL,
  `group` int(11) NOT NULL,
  `opt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `title`, `username`, `password`, `surname`, `firstname`, `matric`, `email`, `phone`, `department`, `level`, `photo`, `salt`, `joined`, `group`, `opt`) VALUES
(2, 'Mr', 'adesoji@gmail.com', 'f88890906e8e222155ec2d59ab2c7c42bc02d2c343dbe93885dda9ccb4a1078f', 'Adegbesin', 'Soji', '00110011', 'adesoji@gmail.com', '09012345678', 'Computer Science', 'MSC', 'avatar.png', 'TZž-¼Y°~(•-„Öå?ð×HTdn_Š:•…%¦Ü', '18 June 2019, 12:54 PM', 2, NULL),
(6, 'Mrs', 'mistu@gmail.com', 'f065a73783ee71e6d4b60949ffd11fd4947f3068de21d7b1bfc6302527d6d739', 'Adebayo', 'Mistura', '1234567890', 'mistu@gmail.com', '09012345678', 'Computer Science', 'BsC', 'IMG_20180502_135549.jpg', 'GoQÆº®ío<céÂãX¡÷œ9úWQÔêÐËõ)%', '18 June 2019, 01:38 PM', 3, 'lecturer'),
(7, NULL, 'ishoshot@gmail.com', '1b587bade3ddf22a0fb7c9006b71d886d3cd2294153fbf65946e4eb710ce2628', 'Ishola', 'Oluwatobi', '16/85/0049', 'ishoshot@gmail.com', '08105575363', 'Computer Science', 'ND II', 'avatar.png', '<ušAôã![$4K³éA–p9Xò´ñªù', '01 July 2019, 03:42 PM', 1, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `praise`
--
ALTER TABLE `praise`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `praise`
--
ALTER TABLE `praise`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
