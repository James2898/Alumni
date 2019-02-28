-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 06:18 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_profile_picture` blob NOT NULL,
  `admin_fname` text COLLATE utf8mb4_bin NOT NULL,
  `admin_mname` text COLLATE utf8mb4_bin NOT NULL,
  `admin_lname` text COLLATE utf8mb4_bin NOT NULL,
  `admin_email` text COLLATE utf8mb4_bin NOT NULL,
  `admin_cno` text COLLATE utf8mb4_bin NOT NULL,
  `admin_lno` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_profile_picture`, `admin_fname`, `admin_mname`, `admin_lname`, `admin_email`, `admin_cno`, `admin_lno`) VALUES
(1, '', 'James Emmanuel', 'Montealegre', 'Martinez', 'amajamesmartinez@gmail.com', '12345678910', '12345678910');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_ID` int(11) NOT NULL,
  `alumni_student_ID` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_profile_picture` blob NOT NULL,
  `alumni_fname` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_mname` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_lname` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_cno` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_lno` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_email` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_facebook` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_linkedin` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_website` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_degree` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_major` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_grad_year` text COLLATE utf8mb4_bin NOT NULL,
  `alumni_register_date` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_ID`, `alumni_student_ID`, `alumni_profile_picture`, `alumni_fname`, `alumni_mname`, `alumni_lname`, `alumni_cno`, `alumni_lno`, `alumni_email`, `alumni_facebook`, `alumni_linkedin`, `alumni_website`, `alumni_degree`, `alumni_major`, `alumni_grad_year`, `alumni_register_date`) VALUES
(1, '16004187600', '', 'James Emmanuel', 'Montealegre', 'Martinez', '124567890', '1234567890', 'amajamesmartinez@gmail.com', 'www.facebook.com/James2898', 'www.linkedin.com/James2898', 'www.James2898.com', '1', '1', '2019', '2019-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_ID` int(11) NOT NULL,
  `announcement_title` text COLLATE utf8mb4_bin NOT NULL,
  `announcement_content` text COLLATE utf8mb4_bin NOT NULL,
  `announcement_date` text COLLATE utf8mb4_bin NOT NULL,
  `announcement_statust` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_ID` int(11) NOT NULL,
  `appointment_alumni_ID` int(11) NOT NULL,
  `appointment_details` text COLLATE utf8mb4_bin NOT NULL,
  `appointment_datetime` text COLLATE utf8mb4_bin NOT NULL,
  `appointment_status` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1kguihu0o8fvu1ii37mqv7ssb1tkd8cc', '::1', 1551322111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332323131313b),
('65gmnt9g8pgh2bmi4vn7necaffl51qos', '::1', 1551322176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332323037353b6163636f756e745f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f6c6576656c7c733a313a2231223b),
('m29g5oglitieb1rmeaje88vtm3cba4sk', '::1', 1551322475, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332323437353b),
('0955ds60pqa45i91r8s7f51op8mhsl6f', '::1', 1551322475, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332323437353b),
('aieamgbohu2nabjnbt3q0p85m4', '::1', 1551322657, ''),
('ja9g0gnsv1u4mf2hdeuf18ur86', '::1', 1551322667, ''),
('eg13j1gkqpg7b1eht0kop0b8d0', '::1', 1551322683, ''),
('37i6hs8o8vtssltbena2eb56di5rd2q0', '::1', 1551322969, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332323936393b),
('r4tv5tesb88umoeiu2akdm5b8htl6mit', '::1', 1551323751, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332333735313b6163636f756e745f747970657c733a353a2261646d696e223b),
('qblgcstirreqckfm6dicei0qj9q3nfnr', '::1', 1551324173, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332343137333b6163636f756e745f747970657c733a353a2261646d696e223b),
('qus025lg2eapd8s4dlf8q6ukbleg8h33', '::1', 1551324566, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332343536363b6163636f756e745f747970657c733a353a2261646d696e223b),
('nihg5m9nhshul0ih562hgd7lsaa135p7', '::1', 1551325076, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332353037363b6163636f756e745f747970657c733a353a2261646d696e223b),
('74t29tb01n7vsmrdr3r7inmv6e2l9mj3', '::1', 1551325925, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332353932353b6163636f756e745f747970657c733a353a2261646d696e223b),
('fovn8ctlikcbgk6sh85qoln7j4pnjj9d', '::1', 1551326299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332363239393b6163636f756e745f747970657c733a353a2261646d696e223b),
('0jk7nse12eae5h15r8jhb5tvn27usppu', '::1', 1551326612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332363631323b6163636f756e745f747970657c733a353a2261646d696e223b),
('k0lrviftoocgdg23phc8ms181c3k22pq', '::1', 1551327046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332373034363b6163636f756e745f747970657c733a353a2261646d696e223b),
('0nqi8ivtehtruep6t1ogfskjvgt4c6u1', '::1', 1551327567, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332373536373b6163636f756e745f747970657c733a353a2261646d696e223b),
('crhgmaovv48uq089eqeu2j253mqvsm3a', '::1', 1551329754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313332393735343b6163636f756e745f747970657c733a353a2261646d696e223b),
('ru9rkovkjmkc5plsuek4egnnfdvcq7r5', '::1', 1551330604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313333303630343b6163636f756e745f747970657c733a353a2261646d696e223b),
('3aa3okiucnlh2rakfq0eiadjf0lk1vbj', '::1', 1551330605, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535313333303630343b6163636f756e745f747970657c733a353a2261646d696e223b);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_ID` int(11) NOT NULL,
  `company_name` int(11) NOT NULL,
  `company_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_ID` int(11) NOT NULL,
  `course_college` text COLLATE utf8mb4_bin NOT NULL,
  `course_title` text COLLATE utf8mb4_bin NOT NULL,
  `course_description` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_ID` int(11) NOT NULL,
  `login_user_ID` int(11) NOT NULL,
  `login_password` text COLLATE utf8mb4_bin NOT NULL,
  `login_level` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_ID`, `login_user_ID`, `login_password`, `login_level`) VALUES
(1, 1, 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8mb4_bin NOT NULL,
  `description` longtext COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialization_ID` int(11) NOT NULL,
  `specialization_course_ID` text COLLATE utf8mb4_bin NOT NULL,
  `specialization_name` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `theme_ID` int(11) NOT NULL,
  `theme_color` int(11) NOT NULL,
  `theme_description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `work_ID` int(11) NOT NULL,
  `work_company_ID` int(11) NOT NULL,
  `work_alumni_ID` int(11) NOT NULL,
  `work_alumni_position` text COLLATE utf8mb4_bin NOT NULL,
  `work_alumni_salary_range` text COLLATE utf8mb4_bin NOT NULL,
  `work_alumni_status` text COLLATE utf8mb4_bin NOT NULL,
  `work_alumni_start` text COLLATE utf8mb4_bin NOT NULL,
  `work_alumni_end` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_ID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_ID`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_ID`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_ID`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`work_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `work_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
