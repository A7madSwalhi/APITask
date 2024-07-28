-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2024 at 01:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school1`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrolid` int(11) NOT NULL,
  `student` int(11) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrolid`, `student`, `subject`) VALUES
(31, 1, 1),
(32, 1, 2),
(33, 2, 3),
(34, 2, 4),
(35, 3, 5),
(36, 3, 6),
(37, 4, 7),
(38, 4, 8),
(39, 13, 1),
(40, 13, 3),
(41, 6, 2),
(42, 6, 4),
(43, 7, 5),
(44, 7, 7),
(45, 8, 6),
(46, 8, 8),
(47, 9, 1),
(48, 9, 2),
(49, 10, 3),
(50, 10, 4),
(51, 11, 5),
(52, 11, 6),
(53, 12, 7),
(54, 12, 8),
(55, 13, 1),
(56, 13, 3),
(57, 14, 2),
(58, 14, 4),
(59, 15, 5),
(60, 15, 7),
(61, 7, 3),
(63, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `examid` int(11) NOT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `maxscore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`examid`, `subjectid`, `date`, `maxscore`) VALUES
(13, 1, '2024-06-15', 100),
(14, 1, '2024-07-15', 100),
(15, 2, '2024-06-17', 100),
(16, 2, '2024-07-17', 100),
(17, 1, '2019-10-10', 50),
(18, 3, '2024-07-19', 100),
(19, 4, '2024-06-21', 100),
(20, 4, '2024-07-21', 100),
(21, 5, '2024-06-23', 100),
(22, 6, '1999-05-02', 70),
(23, 7, '2024-06-27', 100),
(24, 8, '2024-06-29', 100);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_information` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `name`, `class`, `date_of_birth`, `address`, `contact_information`) VALUES
(1, 'Ahmad Al-Khatib', '10A', '2001-05-14', 'Amman, Jordan', '+962791234567'),
(2, 'Sara Abu-Hassan', '11B', '2000-11-22', 'Zarqa, Jordan', '+962795678901'),
(3, 'Omar Al-Masri', '9C', '2002-03-03', 'Irbid, Jordan', '+962799876543'),
(4, 'Laila Al-Momani', '10A', '2001-07-19', 'Aqaba, Jordan', '+962790112233'),
(6, 'Noor Al-Harbi', '11B', '2001-02-10', 'Madaba, Jordan', '+962791234568'),
(7, 'Khaled Al-Qudah', '9C', '2002-06-15', 'Ma\'an, Jordan', '+962795678902'),
(8, 'Rana Al-Bakri', '10A', '2000-08-30', 'Jerash, Jordan', '+962799876544'),
(9, 'Fadi Al-Tamimi', '12D', '2001-11-05', 'Karak, Jordan', '+962790112234'),
(10, 'Yara Al-Rawashdeh', '11B', '1999-01-14', 'Tafila, Jordan', '+962798765433'),
(11, 'Tariq Al-Saadi', '9C', '2002-04-20', 'Ajloun, Jordan', '+962791234569'),
(12, 'Hiba Al-Fayez', '10A', '2000-09-25', 'Mafraq, Jordan', '+962795678903'),
(13, 'Nadia Al-Zoubi', '12D', '2001-12-10', 'Balqa, Jordan', '+962799876545'),
(14, 'Bilal Al-Qawasmi', '11B', '2002-01-17', 'Russeifa, Jordan', '+962790112235'),
(15, 'Amina Al-Husseini', '10A', '1999-11-29', 'Sahab, Jordan', '+962798765434'),
(16, 'Ahmad', NULL, '2001-03-10', 'Balqa, Jordan', '+962788819923'),
(17, 'Yamin', NULL, '2007-02-10', 'Balqa, Jordan', '+962795879632'),
(18, 'Yamin', NULL, '2007-02-10', 'Balqa, Jordan', '+962795879632'),
(19, 'Bhaa', NULL, '1970-02-02', 'Bqaa, Jordan', '0788895911');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectid`, `name`, `description`) VALUES
(1, 'Mathematics', 'Study of numbers and shapes'),
(2, 'Physics', 'Study of matter and energy'),
(3, 'Chemistry', 'Study of substances and their interactions'),
(4, 'Biology', 'Study of living organisms'),
(5, 'History', 'Study of past events'),
(6, 'Geography', 'Study of Earth and its features'),
(7, 'English', 'Study of the English language'),
(8, 'Computer Science', 'Study of computers and computational systems');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `subject` int(100) DEFAULT NULL,
  `contact_information` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherid`, `name`, `subject`, `contact_information`) VALUES
(1, 'Ali Al-Najjar', 1, '+962791234600'),
(2, 'Mona Al-Ahmad', 2, '+962791234601'),
(3, 'Khaled Al-Tal', 3, '+962791234602'),
(4, 'Huda Al-Hassan', 4, '+962791234603'),
(5, 'Samir Al-Majali', 5, '+962791234604'),
(6, 'Reem Al-Rawashdeh', 6, '+962791234605'),
(7, 'Tareq Al-Jamal', 7, '+962791234606'),
(8, 'Lina Al-Saadi', 8, '+962791234607');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrolid`),
  ADD KEY `subject` (`subject`),
  ADD KEY `student` (`student`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`examid`),
  ADD KEY `subjectid` (`subjectid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherid`),
  ADD UNIQUE KEY `subject` (`subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrolid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `examid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subjects` (`subjectid`),
  ADD CONSTRAINT `enrollments_ibfk_3` FOREIGN KEY (`student`) REFERENCES `students` (`ID`),
  ADD CONSTRAINT `enrollments_ibfk_4` FOREIGN KEY (`student`) REFERENCES `students` (`ID`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`subjectid`) REFERENCES `subjects` (`subjectid`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subjects` (`subjectid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
