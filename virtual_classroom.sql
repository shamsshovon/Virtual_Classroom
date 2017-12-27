-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2017 at 06:46 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminuser` varchar(50) NOT NULL,
  `adminpass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminuser`, `adminpass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `A_id` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `right_ans` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`A_id`, `q_no`, `right_ans`, `ans`) VALUES
(3, 1, 1, 'Hyper Text Markup Language'),
(4, 1, 0, 'Hyperlinks and Text Markup Language'),
(5, 1, 0, 'Home Tool Markup Language'),
(6, 1, 0, 'HTML Quiz'),
(7, 2, 0, 'Microsoft'),
(8, 2, 0, 'Google'),
(9, 2, 1, 'The World Wide Web Consortium'),
(10, 2, 0, 'Mozilla'),
(11, 3, 0, 'Computer Style Sheets'),
(12, 3, 0, 'Creative Style Sheets'),
(13, 3, 0, 'Colorful Style Sheets'),
(14, 3, 1, 'Cascading Style Sheets'),
(19, 4, 1, 'Hypertext Preprocessor'),
(20, 4, 0, 'Private Home Page'),
(21, 4, 0, 'Personal Hypertext Processor'),
(22, 4, 0, 'Hyper Text Markup Language'),
(23, 5, 1, 'Perl and C'),
(24, 5, 0, 'VBScript'),
(25, 5, 0, 'JavaScript'),
(26, 5, 0, 'jQuery');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `a_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`a_id`, `username`, `file_name`) VALUES
(1, 'kazi', 'uploads/7a7afaba28.docx'),
(2, 'kazi', 'uploads/36038d5bcc.docx'),
(3, 'galib', 'uploads/7d79f159f0.docx'),
(4, 'galib', 'uploads/f098757541.docx'),
(5, 'basak', 'uploads/6bc5cd55ed.docx'),
(6, 'basak', 'uploads/e6943f5108.docx');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `dis_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`dis_id`, `username`, `descr`) VALUES
(2, 'Galib', 'In his interesting discussion, he mentioned the necessity for safety in health, occupation, food, information and every other important factor for life safety. In his lecture, he also elaborated the ideas of safety and health issues which are widely discussed in modern times. He provided students with the information of application and necessities of different safety equipment and systems, their utilities. He also enlightened the students by sharing his experiences with the major clients such as Unilever'),
(3, 'Golam', 'To further expand the coverage of the a2i, a thrust project of the Prime Minister, it has sought the participation of the academia to ensure its success. AIUB together with the other 3 universities were officially designated to partner in the implementation of this project. The present efforts of the government to pursue this project is enormous. However, in view of the growing demand from various sectors and for better understanding of its mechanism and application, it is necessary that more educational institutions be involved in the project.'),
(4, 'Shovon', 'Together with East West University, Metropolitan University and University of Asia  Pacific, AIUB signed the MOU that signals the official participation of AIUB in the project. The Office of the Prime Minister was represented by Mr. Kabir Bin Anwar, Director, General Administration and Project Director, a2i Programme. After the signing, The Vice Chancellors of the 3 other universities delivered a brief address and the Pro Vice Chancellor, Prof. Dr. Charles C. Villanueva who represented the Vice Chancellor, Dr. Carmen Z. Lamagna'),
(5, 'kazi', 'The Office of the Prime Minister was represented by Mr. Kabir Bin Anwar, Director, General Administration and Project Director, a2i Programme. After the signing, The Vice Chancellors of the 3 other universities delivered a brief address and the Pro Vice Chancellor, Prof. Dr. Charles C.'),
(6, 'kazi', 'The present efforts of the government to pursue this project is enormous. However, in view of the growing demand from various sectors and for better understanding of its mechanism and application, it is necessary that more educational institutions be involved in the project.'),
(8, 'kazi', 'The present efforts of the government to pursue this project is enormous. However, in view of the growing demand from various sectors and for better understanding of its mechanism and application, it is necessary that more educational institutions be involved in the project.'),
(10, 'Admin', 'Together with East West University, Metropolitan University and University of Asia Pacific, AIUB signed the MOU that signals the official participation of AIUB in the project.'),
(11, 'Admin', 'In his interesting discussion, he mentioned the necessity for safety in health, occupation, food, information and every other important factor for life safety. In his lecture, he also elaborated the ideas of safety and health issues which are widely discussed in modern times. He provided students with the information of application and necessities of different safety equipment and systems, their utilities.');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_no`, `question`) VALUES
(1, 1, 'What does HTML stand for?'),
(2, 2, 'Who is making the Web standards?'),
(3, 3, 'What does CSS stand for?'),
(8, 4, 'What does PHP stand for?'),
(9, 5, 'The PHP syntax is most similar to');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(1, 'Kazi Sahabuddin', 'kazi', '123', 'kazi@gmail.com', 0),
(2, 'Hafizur Rahman', 'galib', '123', 'galib@gmail.com', 0),
(4, 'Shovon Basak', 'basak', '123', 'basak@gmail.com', 0),
(5, 'Sumon', 'sumon', '123', 'sumon@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`),
  ADD UNIQUE KEY `question` (`q_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
