-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 09:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rck`
--

-- --------------------------------------------------------

--
-- Table structure for table `asylum_type`
--

CREATE TABLE `asylum_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asylum_type`
--

INSERT INTO `asylum_type` (`id`, `name`, `desc`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Asylum', 'Seeking asylum', NULL, 1612527150, 1612527150, NULL, NULL),
(2, 'Refugee', 'Refugee ', NULL, 1612527173, 1612527173, NULL, NULL),
(3, 'Kenyan', 'Description of a kenyan citizen', NULL, 1612527194, 1612527194, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `caseoutcomes`
--

CREATE TABLE `caseoutcomes` (
  `id` int(11) NOT NULL,
  `outcome` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `casestatus`
--

CREATE TABLE `casestatus` (
  `id` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `casetype`
--

CREATE TABLE `casetype` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casetype`
--

INSERT INTO `casetype` (`id`, `type`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Insecurity', 'Insecurity', 1611745660, 1611745660, 2, 2),
(2, 'RSD Fast Tracking', 'RSD Fast Tracking', 1611745681, 1611745681, 2, 2),
(3, 'Counselling', 'Counselling', 1611748779, 1611748779, 2, 2),
(4, 'RSD Appeal', 'RSD Appeal meaning', 1611748821, 1611748821, 2, 2),
(5, 'Data Transfer', 'Data Transfer data', 1611748843, 1611748843, 2, 2),
(6, 'Work Permit', 'Work Permit desc', 1611748866, 1611748866, 2, 2),
(7, 'Business Permit', 'Business Permit description', 1611748891, 1611748891, 2, 2),
(8, 'Child Protection', 'Child Protection description', 1611748915, 1611748915, 2, 2),
(9, 'Custody Case', 'Custody Case description', 1611748940, 1611748940, 2, 2),
(10, 'Divorce', 'Divorce description', 1611748970, 1611748970, 2, 2),
(11, 'Court Case', 'Court Case description', 1611749029, 1611749029, 2, 2),
(12, 'Police Case', 'Police Case description', 1611749053, 1611749053, 2, 2),
(13, 'Family Tracing', 'Family Tracing description', 1611749078, 1611749078, 2, 2),
(14, 'Family Reunification', 'Family Reunification description', 1611749118, 1611749118, 2, 2),
(15, 'Social Assistance', 'Social Assistance description', 1611749170, 1611749170, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `case_register`
--

CREATE TABLE `case_register` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `accused_name` varchar(255) DEFAULT NULL,
  `accussed_idno` varchar(255) DEFAULT NULL,
  `complainant_name` varchar(255) DEFAULT NULL,
  `court` varchar(255) DEFAULT NULL,
  `representing_lawyer` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `case_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `case_update`
--

CREATE TABLE `case_update` (
  `id` int(11) NOT NULL,
  `police_case_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conflict`
--

CREATE TABLE `conflict` (
  `id` int(11) NOT NULL,
  `conflict` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conflict`
--

INSERT INTO `conflict` (`id`, `conflict`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Ethic Crashes', 1611138624, 1611138624, 2, 2),
(2, 'Cattle Rustling', 1611138654, 1611138654, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `counseling`
--

CREATE TABLE `counseling` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `intervention_id` int(11) NOT NULL,
  `presenting_problem` text DEFAULT NULL,
  `therapeutic` text DEFAULT NULL,
  `conseptualization` text DEFAULT NULL,
  `intervention` text DEFAULT NULL,
  `counsellors` text DEFAULT NULL,
  `counseling_intake_form` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counseling`
--

INSERT INTO `counseling` (`id`, `code`, `date`, `session`, `intervention_id`, `presenting_problem`, `therapeutic`, `conseptualization`, `intervention`, `counsellors`, `counseling_intake_form`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 234, 0, '12345', 14, 'jhg', 'khj', 'hkh', 'khjkh', 'kjhjkhjk', '', 1612129919, 1612129919, 2, 2),
(2, 234, 1612569600, '12345', 14, 'jhg', 'khj', 'hkh', 'khjkh', 'kjhjkhjk', '', 1612129943, 1612130122, 2, 2),
(3, 234, 0, '12345', 14, 'jhg', 'khj', 'hkh', 'khjkh', 'kjhjkhjk', '1612130150-code-1.jpg.optimal.jpg', 1612130150, 1612130150, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `counsellors`
--

CREATE TABLE `counsellors` (
  `id` int(11) NOT NULL,
  `counsellor` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellors`
--

INSERT INTO `counsellors` (`id`, `counsellor`, `code`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Maina Kimani', '2003', 1610630601, 1610630601, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `CountyID` int(11) NOT NULL,
  `CountyName` varchar(45) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `RegionID` int(11) DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`CountyID`, `CountyName`, `Notes`, `RegionID`, `CreatedDate`, `CreatedBy`) VALUES
(1, 'MOMBASA', '', 1, '2017-09-17 04:34:19', 1),
(2, 'KWALE', NULL, NULL, '2017-09-17 04:34:19', 1),
(3, 'KILIFI', NULL, NULL, '2017-09-17 04:34:19', 1),
(4, 'TANA RIVER', NULL, NULL, '2017-09-17 04:34:19', 1),
(5, 'LAMU', NULL, NULL, '2017-09-17 04:34:19', 1),
(6, 'TAITA-TAVETA', NULL, NULL, '2017-09-17 04:34:19', 1),
(7, 'GARISSA', NULL, NULL, '2017-09-17 04:34:19', 1),
(8, 'WAJIR', NULL, NULL, '2017-09-17 04:34:19', 1),
(9, 'MANDERA', NULL, NULL, '2017-09-17 04:34:19', 1),
(10, 'MARSABET', NULL, NULL, '2017-09-17 04:34:19', 1),
(11, 'ISIOLO', NULL, NULL, '2017-09-17 04:34:19', 1),
(12, 'MERU', NULL, NULL, '2017-09-17 04:34:19', 1),
(13, 'THARAKA-NITHI', NULL, NULL, '2017-09-17 04:34:19', 1),
(14, 'EMBU', NULL, NULL, '2017-09-17 04:34:19', 1),
(15, 'KITUI', NULL, NULL, '2017-09-17 04:34:19', 1),
(16, 'MACHAKOS', NULL, NULL, '2017-09-17 04:34:19', 1),
(17, 'MAKUENI', NULL, NULL, '2017-09-17 04:34:19', 1),
(18, 'NYANDARUA', NULL, NULL, '2017-09-17 04:34:19', 1),
(19, 'NYERI', NULL, NULL, '2017-09-17 04:34:19', 1),
(20, 'KIRINYAGA', NULL, 1, '2017-09-17 04:34:19', 1),
(21, 'MURANGA', NULL, NULL, '2017-09-17 04:34:19', 1),
(22, 'KIAMBU', NULL, NULL, '2017-09-17 04:34:19', 1),
(23, 'TURKANA', NULL, NULL, '2017-09-17 04:34:19', 1),
(24, 'WEST POKOT', NULL, NULL, '2017-09-17 04:34:19', 1),
(25, 'SAMBURU', NULL, NULL, '2017-09-17 04:34:19', 1),
(26, 'TRANS NZOIA', NULL, NULL, '2017-09-17 04:34:19', 1),
(27, 'UASIN GISHU', NULL, NULL, '2017-09-17 04:34:19', 1),
(28, 'ELGEYO MARAKWET', NULL, NULL, '2017-09-17 04:34:19', 1),
(29, 'NANDI', NULL, NULL, '2017-09-17 04:34:19', 1),
(30, 'BARINGO', NULL, NULL, '2017-09-17 04:34:19', 1),
(31, 'LAIKIPIA', NULL, NULL, '2017-09-17 04:34:19', 1),
(32, 'NAKURU', NULL, NULL, '2017-09-17 04:34:19', 1),
(33, 'NAROK', NULL, NULL, '2017-09-17 04:34:19', 1),
(34, 'KAJIADO', NULL, NULL, '2017-09-17 04:34:19', 1),
(35, 'KERICHO', NULL, NULL, '2017-09-17 04:34:19', 1),
(36, 'BOMET', NULL, NULL, '2017-09-17 04:34:19', 1),
(37, 'KAKAMEGA', NULL, NULL, '2017-09-17 04:34:19', 1),
(38, 'VIHIGA', NULL, NULL, '2017-09-17 04:34:19', 1),
(39, 'BUNGOMA', NULL, NULL, '2017-09-17 04:34:19', 1),
(40, 'BUSIA', NULL, NULL, '2017-09-17 04:34:19', 1),
(41, 'SIAYA', NULL, NULL, '2017-09-17 04:34:19', 1),
(42, 'KISUMU', NULL, NULL, '2017-09-17 04:34:19', 1),
(43, 'HOMA BAY', NULL, NULL, '2017-09-17 04:34:19', 1),
(44, 'MIGORI', NULL, NULL, '2017-09-17 04:34:19', 1),
(45, 'KISII', NULL, NULL, '2017-09-17 04:34:19', 1),
(46, 'NYAMIRA', NULL, NULL, '2017-09-17 04:34:19', 1),
(47, 'NAIROBI', NULL, NULL, '2017-09-17 04:34:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Somali', 1611060800, 1611060800, 2, 2),
(2, 'Ethiopia', 1611060813, 1611060813, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `court_cases`
--

CREATE TABLE `court_cases` (
  `id` int(11) NOT NULL,
  `no_of_refugees` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `offence` varchar(255) DEFAULT NULL,
  `first_instance_interview` text DEFAULT NULL,
  `magistrate` varchar(255) DEFAULT NULL,
  `court_proceeding_id` int(11) DEFAULT NULL,
  `date_of_arrainment` int(11) DEFAULT NULL,
  `case_status` varchar(255) DEFAULT NULL,
  `next_court_date` int(11) DEFAULT NULL,
  `legal_officer_id` int(11) DEFAULT NULL,
  `counsellor_id` int(11) DEFAULT NULL,
  `court_case_category_id` int(11) DEFAULT NULL,
  `court_case_subcategory_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `refugee_id` int(11) DEFAULT NULL,
  `legal_officer` varchar(255) DEFAULT NULL,
  `counsellor` varchar(255) DEFAULT NULL,
  `offence_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court_cases`
--

INSERT INTO `court_cases` (`id`, `no_of_refugees`, `name`, `offence`, `first_instance_interview`, `magistrate`, `court_proceeding_id`, `date_of_arrainment`, `case_status`, `next_court_date`, `legal_officer_id`, `counsellor_id`, `court_case_category_id`, `court_case_subcategory_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `refugee_id`, `legal_officer`, `counsellor`, `offence_id`) VALUES
(22, 1, 'wamwangi', 'sexual offence', 'qwertgh', 'kamau wa ngoroge', 2, 1610668800, 'closed', 0, 1, 1, 3, NULL, 1611324060, 1611324060, 2, 2, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `court_case_category`
--

CREATE TABLE `court_case_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court_case_category`
--

INSERT INTO `court_case_category` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'test', 1610620113, 1610620113, 2, 2),
(2, 'cat2', 1610620169, 1610620169, 2, 2),
(3, 'General', 1610697695, 1610697695, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `court_case_proceeding`
--

CREATE TABLE `court_case_proceeding` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `court_case_id` int(11) NOT NULL,
  `case_status` varchar(255) DEFAULT NULL,
  `next_court_date` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court_case_proceeding`
--

INSERT INTO `court_case_proceeding` (`id`, `name`, `desc`, `court_case_id`, `case_status`, `next_court_date`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'get this', 'this is made', 22, 'open', 2021, 1611641977, 1611641977, 2, 2),
(2, 'get this', 'Yes this is a test', 22, 'closed', NULL, 1611644020, 1611644020, 2, 2),
(3, 'get this', 'yes', 22, 'open', 2021, 1611644113, 1611644113, 2, 2),
(4, 'get this', 'this is great', 22, 'open', 1610496000, 1611644556, 1611644556, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `court_case_subcategory`
--

CREATE TABLE `court_case_subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court_case_subcategory`
--

INSERT INTO `court_case_subcategory` (`id`, `name`, `category_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'subtest', 1, 1610620152, 1610620152, 2, 2),
(2, 'subcat2', 2, 1610620187, 1610620187, 2, 2),
(3, 'Judgement', 3, 1610697733, 1610697733, 2, 2),
(4, 'Other', 3, 1610697745, 1610697745, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `court_docs_uploads`
--

CREATE TABLE `court_docs_uploads` (
  `id` int(11) NOT NULL,
  `doc_path` text DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `court_case_id` int(11) NOT NULL,
  `court_uploads_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court_docs_uploads`
--

INSERT INTO `court_docs_uploads` (`id`, `doc_path`, `filename`, `court_case_id`, `court_uploads_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, '/uploads/court_cases/1611819671-1545326756_codes_story.jpg', '1611819671-1545326756_codes_story.jpg', 22, 3, 1611819671, 1611819671, 2, 2),
(4, '/uploads/court_cases/1612869384-960x0.jpg', '1612869384-960x0.jpg', 22, 3, 1612869384, 1612869384, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `court_uploads`
--

CREATE TABLE `court_uploads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court_uploads`
--

INSERT INTO `court_uploads` (`id`, `name`, `desc`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 'charge_sheet', 'Court case Charge sheet describes the .............', 1610973110, 1610973110, 2, 2),
(4, 'court_attendance_form', 'Court Attendance Form is the ........', 1610973195, 1610973202, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `demographics`
--

CREATE TABLE `demographics` (
  `id` int(11) NOT NULL,
  `demography` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demographics`
--

INSERT INTO `demographics` (`id`, `demography`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Birth', 'births', 1611138418, 1611138466, 2, 2),
(2, 'Death', 'Deaths', 1611138432, 1611138432, 2, 2),
(3, 'Migration', 'm', 1611138453, 1611138453, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dependant`
--

CREATE TABLE `dependant` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `refugee_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dependant`
--

INSERT INTO `dependant` (`id`, `names`, `relationship_id`, `refugee_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 'aSs', 2, 2, 1611302235, 1611302235, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `disability_type`
--

CREATE TABLE `disability_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disability_type`
--

INSERT INTO `disability_type` (`id`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Mental', 'mental inability', 1612766890, 1612766890, 2, 2),
(2, 'Physical', 'physical gift', 1612766914, 1612766914, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `form_of_torture`
--

CREATE TABLE `form_of_torture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_of_torture`
--

INSERT INTO `form_of_torture` (`id`, `name`, `desc`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'rape', 'raping, forceful romance', NULL, 1611309856, 1611309856, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Male', 1611138571, 1611138571, 2, 2),
(2, 'Female', 1611138580, 1611138580, 2, 2),
(3, 'Other', 1611138589, 1611138589, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `identification_training_status`
--

CREATE TABLE `identification_training_status` (
  `id` int(11) NOT NULL,
  `status` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `identification_training_target`
--

CREATE TABLE `identification_training_target` (
  `id` int(11) NOT NULL,
  `target_description` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `identification_type`
--

CREATE TABLE `identification_type` (
  `id` int(11) NOT NULL,
  `identification` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identification_type`
--

INSERT INTO `identification_type` (`id`, `identification`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'ID', 'National ID', 1611138717, 1611138717, 2, 2),
(2, 'Passport', 'passport', 1611138732, 1611138732, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `intervention`
--

CREATE TABLE `intervention` (
  `id` int(11) NOT NULL,
  `intervention_type_id` varchar(255) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `situation_description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `court_case` int(11) DEFAULT NULL,
  `police_case` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `counseling_intake_form` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intervention`
--

INSERT INTO `intervention` (`id`, `intervention_type_id`, `case_id`, `situation_description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `court_case`, `police_case`, `client_id`, `counseling_intake_form`) VALUES
(1, '1,2', 1, 'testing', 1611746775, 1611746775, 2, 2, NULL, NULL, NULL, NULL),
(2, '1,2', 2, 'testing this', 1611747924, 1611747924, 2, 2, 22, NULL, 2, NULL),
(3, '2', 4, 'changes to this', 1611749632, 1611749632, 2, 2, 22, 8, 2, NULL),
(4, '1,2', 3, 'testing', 1611906947, 1611906947, NULL, NULL, NULL, NULL, 2, NULL),
(5, '1,2', 3, 'testing', 1611907046, 1611907046, NULL, NULL, NULL, NULL, 2, NULL),
(6, '2', 1, 'tes', 1612127516, 1612127516, 2, 2, NULL, NULL, 2, NULL),
(7, '1,2', 1, 'tes', 1612127790, 1612127790, 2, 2, NULL, NULL, 2, NULL),
(8, '1,2', 6, 'tes', 1612127848, 1612127848, 2, 2, NULL, NULL, 2, NULL),
(9, '1,2', 6, 'tes', 1612127875, 1612127875, 2, 2, NULL, NULL, 2, NULL),
(10, '1,2', 5, 'sertyhjkl', 1612128012, 1612128012, 2, 2, NULL, NULL, 2, NULL),
(11, '2', 5, ',mjhnbvc', 1612128091, 1612128091, 2, 2, NULL, NULL, 2, NULL),
(12, '1,2', 5, ',mjhnbvc', 1612128239, 1612128239, 2, 2, NULL, NULL, 2, NULL),
(13, '1,2', 5, ',mjhnbvc', 1612128258, 1612244635, 2, 2, NULL, NULL, 2, '1612244635-JD Product & Technology  Manager.docx.pdf'),
(14, '1,2', 5, ',mjhnbvc', 1612129021, 1612165658, 2, 2, NULL, NULL, 2, '1612165658-960x0.jpg'),
(15, '1', 4, 'test', 1612864445, 1612864445, 2, 2, NULL, NULL, NULL, NULL),
(16, '1', 4, 'test', 1612864605, 1612864605, 2, 2, NULL, NULL, NULL, NULL),
(17, '1', 4, 'test', 1612864615, 1612864615, 2, 2, NULL, NULL, NULL, NULL),
(18, '1', 4, 'test', 1612865007, 1612865007, 2, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intervention_attachment`
--

CREATE TABLE `intervention_attachment` (
  `id` int(11) NOT NULL,
  `intervention_id` int(11) DEFAULT NULL,
  `filename` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL,
  `doc_path` varchar(255) DEFAULT NULL,
  `upload_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intervention_attachment`
--

INSERT INTO `intervention_attachment` (`id`, `intervention_id`, `filename`, `created_at`, `updated_at`, `created_by`, `updated_by`, `mime`, `doc_path`, `upload_id`) VALUES
(31, 3, '1612880380-960x0.jpg', 1612880380, 1612880380, 2, 2, NULL, '/uploads/multiple/interventions/1612880380-960x0.jpg', NULL),
(32, 3, '1612880380-1545326756_codes_story.jpg', 1612880380, 1612880380, 2, 2, NULL, '/uploads/multiple/interventions/1612880380-1545326756_codes_story.jpg', NULL),
(33, 3, '1612880401-960x0.jpg', 1612880401, 1612880401, 2, 2, NULL, '/uploads/interventions/1612880401-960x0.jpg', 6),
(34, 3, '1612880690-code-1.jpg.optimal.jpg', 1612880690, 1612880690, 2, 2, NULL, '/uploads/multiple/interventions/1612880690-code-1.jpg.optimal.jpg', NULL),
(35, 3, '1612880690-design test.png', 1612880690, 1612880690, 2, 2, NULL, '/uploads/multiple/interventions/1612880690-design test.png', NULL),
(36, 3, '1612880713-design test.png', 1612880713, 1612880713, 2, 2, NULL, '/uploads/multiple/interventions/1612880713-design test.png', NULL),
(37, 3, '1612882136-960x0.jpg', 1612882136, 1612882136, 2, 2, NULL, '/uploads/interventions/1612882136-960x0.jpg', 2),
(38, 3, '1612882166-design test.png', 1612882166, 1612882166, 2, 2, NULL, '/uploads/interventions/1612882166-design test.png', 6),
(39, 3, '1612882196-design test.png', 1612882196, 1612882196, 2, 2, NULL, '/uploads/interventions/1612882196-design test.png', 8),
(40, 3, '1612882236-960x0.jpg', 1612882236, 1612882236, 2, 2, NULL, '/uploads/interventions/1612882236-960x0.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `intervention_type`
--

CREATE TABLE `intervention_type` (
  `id` int(11) NOT NULL,
  `intervention_type` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intervention_type`
--

INSERT INTO `intervention_type` (`id`, `intervention_type`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Legal Advice', 'Legal Advice', 1611745539, 1611745539, 2, 2),
(2, 'Counselling', 'Counselling', 1611745560, 1611745560, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `intervention_upload`
--

CREATE TABLE `intervention_upload` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intervention_upload`
--

INSERT INTO `intervention_upload` (`id`, `issue_id`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 4, 'Rejection letter', 'Rejection letter description', 2, 2, 1611749234, 1611749234),
(3, 4, 'Statement of fact from RAS', 'Statement of fact from RAS desc', 2, 2, 1611749283, 1611749283),
(4, 4, 'Form to enter appearance', 'Form to enter appearance desc', 2, 2, 1611749312, 1611749312),
(5, 4, 'Memorandum of appeal', 'Memorandum of appeal desc', 2, 2, 1611749341, 1611749341),
(6, 4, 'Proceedings', 'Proceedings desc', 2, 2, 1611749371, 1611749371),
(7, 4, 'Submission and Authorities', 'Submission and Authorities desc', 2, 2, 1611749397, 1611749397),
(8, 4, 'Decision of the appeal', 'Decision of the appeal desc', 2, 2, 1611749421, 1611749421);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `id` int(11) NOT NULL,
  `lskId` varchar(150) NOT NULL,
  `cellNumber` varchar(15) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `website` varchar(80) DEFAULT NULL,
  `lawfirmName` varchar(150) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `full_names` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`id`, `lskId`, `cellNumber`, `email`, `website`, `lawfirmName`, `type`, `rating`, `created_at`, `updated_at`, `created_by`, `updated_by`, `full_names`) VALUES
(1, '23', '0722222222', 'lawrence@gmail.com', 'http://www.lawrence.com', 'Lawrence Gachanja And Advocates', '2', NULL, 1610607017, 1610607017, 2, 2, 'Lawrence');

-- --------------------------------------------------------

--
-- Table structure for table `lawyerrating`
--

CREATE TABLE `lawyerrating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `magistrate`
--

CREATE TABLE `magistrate` (
  `id` int(11) NOT NULL,
  `names` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1610441131),
('m130524_201442_init', 1610441153),
('m190124_110200_add_verification_token_column_to_user_table', 1610441154),
('m201202_101350_create_intervention_type_table', 1610441154),
('m201202_101836_create_casestatus_table', 1610441155),
('m201202_102118_create_caseOutcomes_table', 1610441155),
('m201202_102955_create_lawyer_table', 1610441155),
('m201202_103141_create_lawyerRating_table', 1610441156),
('m201202_103234_create_caseType_table', 1610441156),
('m201202_104112_create_policeStation_table', 1610441157),
('m201202_104239_create_user_group_table', 1610441157),
('m201202_104358_create_rsvp_status_table', 1610441158),
('m201202_104709_create_work_station_table', 1610441158),
('m201202_104925_create_refugee_camp_table', 1610441158),
('m201202_110026_create_user_profile_table', 1610441163),
('m201202_110748_create_refugee_table', 1610441168),
('m201202_110848_create_country_table', 1610441168),
('m201202_111002_create_demographics_table', 1610441168),
('m201202_111106_create_identification_type_table', 1610441168),
('m201202_112154_create_training_table', 1610441169),
('m201202_112245_create_identification_training_status_table', 1610441169),
('m201202_112355_create_identification_training_target_table', 1610441169),
('m201202_113116_create_intervention_table', 1610441171),
('m201202_113428_create_intervention_attachment_table', 1610441173),
('m201202_120235_add_mime_column_to_intervention_attachment_table', 1610441173),
('m201202_184948_create_police_table', 1610441174),
('m201202_191915_create_conflict_table', 1610441175),
('m201202_211029_add_full_names_column_to_lawyer_table', 1610441176),
('m201203_063552_create_gender_table', 1610441176),
('m201203_080430_create_case_register_table', 1610441176),
('m201203_084007_add_case_type_column_to_case_register_table', 1610444055),
('m210112_090331_create_police_uploads_table', 1610702696),
('m210112_100944_create_police_cases_table', 1610456916),
('m210112_101645_create_case_update_table', 1610448898),
('m210112_105936_create_magistrate_table', 1610455868),
('m210112_110439_create_court_proceeding_table', 1610455868),
('m210112_110707_create_counsellors_table', 1610455868),
('m210112_110904_create_court_case_category_table', 1610455869),
('m210112_111005_create_court_case_subcategory_table', 1610455870),
('m210112_111402_create_court_uploads_table', 1610455871),
('m210112_125014_create_police_docs_upload_table', 1610702699),
('m210112_125451_create_court_cases_table', 1610456746),
('m210112_130800_create_court_docs_uploads_table', 1610702702),
('m210119_131737_create_relationship_table', 1611123475),
('m210120_061551_create_rck_offices_table', 1611123477),
('m210120_070539_create_dependant_table', 1611127110),
('m210120_075628_create_mode_of_entry_table', 1611129401),
('m210120_080934_add_rck_column_to_refugee_table', 1611130244),
('m210121_064053_create_refugee_uploads_table', 1611211265),
('m210121_091131_create_refugee_docs_upload_table', 1611221501),
('m210121_093059_create_refugee_docs_upload_table', 1611221580),
('m210122_073821_add_rck_office_id_column_to_refugee_camp_table', 1611301688),
('m210122_074312_add_refugee_id_column_to_police_cases_table', 1611301689),
('m210122_074328_add_refugee_id_column_to_court_cases_table', 1611301691),
('m210122_074452_add_physical_address_column_to_refugee_table', 1611301691),
('m210122_092714_create_asylum_type_table', 1611307752),
('m210122_092752_create_source_of_info_table', 1611307752),
('m210122_092816_create_form_of_torture_table', 1611307752),
('m210122_092836_create_source_of_income_table', 1611307753),
('m210122_123833_create_court_proceeding_table', 1611319200),
('m210122_125501_create_court_case_proceeding_table', 1611320158),
('m210122_125536_create_police_case_proceeding_table', 1611320160),
('m210122_134429_create_nature_of_proceeding_table', 1611323115),
('m210127_094548_add_foreigns_column_to_intervention_table', 1611740765),
('m210127_100202_create_intervention_upload_table', 1611741955),
('m210127_100537_add_column_path_to_intervention_attachment_table', 1611741955),
('m210127_100916_add_path_column_to_intervention_attachment_table', 1611742164),
('m210127_113713_add_client_column_to_intervention_table', 1611747442),
('m210128_092012_create_training_table', 1611825778),
('m210128_094002_create_training_upload_table', 1611826810),
('m210131_210242_create_counseling_table', 1612127114),
('m210201_072236_add_counseling_intake_column_to_intervention_table', 1612164164),
('m210205_122659_add_id_no_column_to_refugee_table', 1612528039),
('m210205_133256_create_disability_type_table', 1612532066),
('m210205_133415_add_fields_for_refugee_column_to_refugee_table', 1612532075),
('m210208_092443_add_column_code_to_rck_offices_table', 1612776297),
('m210208_092811_add_code_column_to_rck_offices_table', 1612776516),
('m210209_090353_create_offence_table', 1612861452),
('m210210_063050_create_organizer_table', 1612938665),
('m210210_063833_add_organizer_id_column_to_training_table', 1612939122),
('m210210_065405_add_legal_counselor_column_to_court_cases_table', 1612940102),
('m210210_065450_add_police_station_column_to_police_cases_table', 1612940104);

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_entry`
--

CREATE TABLE `mode_of_entry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mode_of_entry`
--

INSERT INTO `mode_of_entry` (`id`, `name`, `desc`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'immigration border', 'yes', 1611138881, 1611138881, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nature_of_proceeding`
--

CREATE TABLE `nature_of_proceeding` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nature_of_proceeding`
--

INSERT INTO `nature_of_proceeding` (`id`, `name`, `desc`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Mention', 'A mention in court', 1611323477, 1611323477, 2, 2),
(2, 'Judgement', 'judgement of a case', 1611323497, 1611323497, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE `offence` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`id`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Theft', 'this is it', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`id`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'RCK ', 'rck office', 1612942660, 1612942660, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `id` int(11) NOT NULL,
  `names` varchar(150) NOT NULL,
  `station_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `policestation`
--

CREATE TABLE `policestation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(150) NOT NULL,
  `closest_camp` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policestation`
--

INSERT INTO `policestation` (`id`, `name`, `location`, `closest_camp`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Kileleshwa', 'Nairobi', 'ngong road', 1610605987, 1610605987, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `police_cases`
--

CREATE TABLE `police_cases` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contacts` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `police_station_id` int(11) NOT NULL,
  `investigating_officer` varchar(255) DEFAULT NULL,
  `investigating_officer_contacts` varchar(100) DEFAULT NULL,
  `ob_number` varchar(255) DEFAULT NULL,
  `ob_details` varchar(255) DEFAULT NULL,
  `offence` varchar(255) NOT NULL,
  `complainant` varchar(255) NOT NULL,
  `first_instance_interview` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `refugee_id` int(11) DEFAULT NULL,
  `policestation` varchar(255) DEFAULT NULL,
  `offence_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police_cases`
--

INSERT INTO `police_cases` (`id`, `name`, `gender`, `contacts`, `age`, `police_station_id`, `investigating_officer`, `investigating_officer_contacts`, `ob_number`, `ob_details`, `offence`, `complainant`, `first_instance_interview`, `created_at`, `updated_at`, `created_by`, `updated_by`, `refugee_id`, `policestation`, `offence_id`) VALUES
(8, 'Mr. Kamau', 'male', '0710345130', '28', 1, 'korir', '0734123123', 'N009', ';olikjhgf', 'changes', 'kamau', 'wertyu', 1611322066, 1611322066, 2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `police_case_proceeding`
--

CREATE TABLE `police_case_proceeding` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `police_case_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `police_docs_upload`
--

CREATE TABLE `police_docs_upload` (
  `id` int(11) NOT NULL,
  `doc_path` text DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `police_case_id` int(11) NOT NULL,
  `police_uploads_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police_docs_upload`
--

INSERT INTO `police_docs_upload` (`id`, `doc_path`, `filename`, `police_case_id`, `police_uploads_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(36, '/uploads/police_cases/1612869542-960x0.jpg', '1612869542-960x0.jpg', 8, 1, 1612869542, 1612869542, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `police_uploads`
--

CREATE TABLE `police_uploads` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police_uploads`
--

INSERT INTO `police_uploads` (`id`, `name`, `desc`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'ID', 'ID number', NULL, NULL, NULL, NULL),
(2, 'P3', 'P3 number', NULL, NULL, NULL, NULL),
(3, 'Statement', 'Police Statement', NULL, NULL, NULL, NULL),
(4, 'Charge_Sheet', 'Charge Sheet More Info', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rck_offices`
--

CREATE TABLE `rck_offices` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rck_offices`
--

INSERT INTO `rck_offices` (`id`, `name`, `desc`, `created_at`, `updated_at`, `created_by`, `updated_by`, `code`) VALUES
(1, 'Westlands, Nairobi', 'This offices belong in Westlands near mpaka road', 1611127642, 1612776826, 2, 2, 'NRB');

-- --------------------------------------------------------

--
-- Table structure for table `refugee`
--

CREATE TABLE `refugee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `camp` int(11) DEFAULT NULL,
  `cell_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `gender` int(1) NOT NULL,
  `country_of_origin` int(11) DEFAULT NULL,
  `demography_id` int(11) DEFAULT NULL,
  `date_of_birth` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `conflict` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `nhcr_case_no` varchar(255) DEFAULT NULL,
  `return_refugee` int(11) DEFAULT NULL,
  `rck_no` varchar(255) DEFAULT NULL,
  `rck_office_id` int(11) NOT NULL,
  `arrival_date` int(11) DEFAULT NULL,
  `has_disability` int(11) DEFAULT NULL,
  `disability_desc` text DEFAULT NULL,
  `asylum_status` int(11) DEFAULT NULL,
  `rsd_appointment_date` int(11) DEFAULT NULL,
  `reason_for_rsd_appointment` text DEFAULT NULL,
  `source_of_info_abt_rck` text DEFAULT NULL,
  `mode_of_entry_id` int(11) NOT NULL,
  `victim_of_turture` int(11) DEFAULT NULL,
  `form_of_torture` text DEFAULT NULL,
  `source_of_income` varchar(255) DEFAULT NULL,
  `job_details` text DEFAULT NULL,
  `has_work_permit` int(11) DEFAULT NULL,
  `arrested_due_to_lack_of_work_permit` int(11) DEFAULT NULL,
  `interested_in_work_permit` int(11) DEFAULT NULL,
  `interested_in_citizenship` int(11) DEFAULT NULL,
  `physical_address` varchar(255) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `source_of_info_id` int(11) DEFAULT NULL,
  `disability_type_id` int(11) DEFAULT NULL,
  `source_of_income_id` varchar(255) DEFAULT NULL,
  `form_of_torture_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refugee`
--

INSERT INTO `refugee` (`id`, `first_name`, `middle_name`, `last_name`, `user_group_id`, `user_id`, `image`, `camp`, `cell_number`, `email_address`, `gender`, `country_of_origin`, `demography_id`, `date_of_birth`, `id_type`, `conflict`, `created_at`, `updated_at`, `created_by`, `updated_by`, `nhcr_case_no`, `return_refugee`, `rck_no`, `rck_office_id`, `arrival_date`, `has_disability`, `disability_desc`, `asylum_status`, `rsd_appointment_date`, `reason_for_rsd_appointment`, `source_of_info_abt_rck`, `mode_of_entry_id`, `victim_of_turture`, `form_of_torture`, `source_of_income`, `job_details`, `has_work_permit`, `arrested_due_to_lack_of_work_permit`, `interested_in_work_permit`, `interested_in_citizenship`, `physical_address`, `client_id`, `id_no`, `source_of_info_id`, `disability_type_id`, `source_of_income_id`, `form_of_torture_id`) VALUES
(2, 'Mohammed', 'Razak', 'Abdul', 4, NULL, '', NULL, '0787654321', 'abdul@gmail.com', 1, 1, 2, 2021, 1, 1, 1611302130, 1611302130, 2, 2, 'NHCR65478', NULL, 'RCK345', 1, 1610064000, 1, 'asdasd', 1, 1609459200, 'asd', 'source of infor', 1, 1, 'toture', 'farmer', 'yes', 0, 0, 0, 0, 'kangethe', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Mohammed', 'Razak', 'Abdul', 4, NULL, '', 3, '0787654321', 'abdulkorir@gmail.com', 1, 1, NULL, 2021, 1, 1, 1612769654, 1612769654, 2, 2, 'NHCR65478', NULL, 'RCK345', 1, 1612310400, 1, 'wah', 1, 1612742400, 'test', 'saw a flier on the road', 1, 1, 'cant describe', 'hawking', 'exchanging clouds', 1, NULL, NULL, NULL, 'kangemi', NULL, '', NULL, NULL, NULL, NULL),
(16, 'david', 'mark', 'mwangi', 4, NULL, '', NULL, '0787654334', 'abdulkorir@gmail.com', 1, 1, NULL, 2021, 1, 1, 1612782226, 1612782226, 2, 2, 'NHCR65423', NULL, 'NRB-16-2021', 1, 1612224000, NULL, '', 2, 0, '', '', 1, NULL, '', '', '', 1, NULL, NULL, NULL, 'rwanda', NULL, '', NULL, NULL, NULL, NULL),
(17, 'david', 'mark', 'mwangi', 4, NULL, '', NULL, '0787654334', 'abdulkorir@gmail.com', 1, 1, NULL, 2021, 1, 1, 1612782291, 1612782291, 2, 2, 'NHCR65423', NULL, 'RCK345', 1, 1612224000, NULL, '', 2, 0, '', '', 1, NULL, '', '', '', 1, NULL, NULL, NULL, 'rwanda', NULL, '', NULL, NULL, NULL, NULL),
(18, 'david', 'mark', 'mwangi', 4, NULL, '', NULL, '0787654334', 'abdulkorir@gmail.com', 1, 1, NULL, 2021, 1, 1, 1612782312, 1612792357, 2, 2, 'NHCR65423', NULL, 'NRB-18-2021', 1, 1612224000, NULL, '', 2, 0, '', '', 1, 1, '', '', '', 1, NULL, NULL, NULL, 'rwanda', NULL, '', NULL, NULL, '', '1,0');

-- --------------------------------------------------------

--
-- Table structure for table `refugee_camp`
--

CREATE TABLE `refugee_camp` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `county` int(11) DEFAULT NULL,
  `subcounty` int(11) DEFAULT NULL,
  `locality_description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `rck_office` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refugee_camp`
--

INSERT INTO `refugee_camp` (`id`, `name`, `county`, `subcounty`, `locality_description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `rck_office`) VALUES
(3, 'kakuma 001', 7, 30, 'test', 1611303157, 1611303157, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `refugee_docs_upload`
--

CREATE TABLE `refugee_docs_upload` (
  `id` int(11) NOT NULL,
  `doc_path` text DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `upload_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refugee_docs_upload`
--

INSERT INTO `refugee_docs_upload` (`id`, `doc_path`, `filename`, `model_id`, `upload_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(74, '/uploads/refugees/1612872956-960x0.jpg', '1612872956-960x0.jpg', 3, 9, NULL, NULL, NULL, NULL),
(75, '/uploads/refugees/1612872967-960x0.jpg', '1612872967-960x0.jpg', 3, 8, NULL, NULL, NULL, NULL),
(76, '/uploads/multiple/refugees/1612873078-960x0.jpg', '1612873078-960x0.jpg', 3, NULL, NULL, NULL, NULL, NULL),
(77, '/uploads/multiple/refugees/1612873078-design test.png', '1612873078-design test.png', 3, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refugee_uploads`
--

CREATE TABLE `refugee_uploads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refugee_uploads`
--

INSERT INTO `refugee_uploads` (`id`, `name`, `desc`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'refugee_id', 'Refugee Id', 0, NULL, NULL, NULL, NULL),
(2, 'minor_pass', 'Minor Pass', 0, NULL, NULL, NULL, NULL),
(3, 'asylumSeekerPass', 'Asylum Seeker Pass', 1, NULL, NULL, NULL, NULL),
(4, 'asylumSeekerCertificate', 'Asylum Seeker Certificate', 1, 1611216105, 1611216105, 2, 2),
(5, 'proofOfRegistration', 'Proof of Registration', 1, 1611216134, 1611216134, 2, 2),
(6, 'UNHCRMandate', 'UNHCR Mandate', 1, 1611216180, 1611216180, 2, 2),
(7, 'waitingSlip', 'Waiting Slip', 1, 1611216202, 1611216202, 2, 2),
(8, 'UNHCRLetterOfRecognition', 'UNHCR Letter Of Recognition', 1, 1611216245, 1611216245, 2, 2),
(9, 'movementPass', 'Movement Pass', 1, 1611216339, 1611216339, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Cousin', 1611125685, 1611125685, 2, 2),
(2, 'Brother', 1611125699, 1611125699, 2, 2),
(3, 'Sister', 1611125709, 1611125709, 2, 2),
(4, 'Mother', 1611125718, 1611125718, 2, 2),
(5, 'Father', 1611125727, 1611125727, 2, 2),
(6, 'Son', 1611125737, 1611125737, 2, 2),
(7, 'Daughter', 1611125746, 1611125746, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rsvp_status`
--

CREATE TABLE `rsvp_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `source_of_income`
--

CREATE TABLE `source_of_income` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `source_of_income`
--

INSERT INTO `source_of_income` (`id`, `name`, `desc`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Jobless', 'A state where a human being doesn\'t have a job', NULL, 1612774329, 1612774329, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `source_of_info`
--

CREATE TABLE `source_of_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `source_of_info`
--

INSERT INTO `source_of_info` (`id`, `name`, `desc`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Social Media', 'socials', NULL, 1612852380, 1612852380, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subcounties`
--

CREATE TABLE `subcounties` (
  `SubCountyID` int(11) NOT NULL,
  `SubCountyName` varchar(45) DEFAULT NULL,
  `CountyID` int(11) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `Deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcounties`
--

INSERT INTO `subcounties` (`SubCountyID`, `SubCountyName`, `CountyID`, `Notes`, `CreatedDate`, `CreatedBy`, `Deleted`) VALUES
(1, 'CHANGAMWE', 1, NULL, '2020-07-02 11:18:58', NULL, 0),
(2, 'JOMVU', 1, NULL, '2020-07-02 11:18:58', NULL, 0),
(3, 'KISAUNI', 1, NULL, '2020-07-02 11:18:58', NULL, 0),
(4, 'NYALI', 1, NULL, '2020-07-02 11:18:58', NULL, 0),
(5, 'LIKONI', 1, NULL, '2020-07-02 11:18:58', NULL, 0),
(6, 'MVITA', 1, NULL, '2020-07-02 11:18:58', NULL, 0),
(7, 'MSAMBWENI', 2, NULL, '2020-07-02 11:18:58', NULL, 0),
(8, 'LUNGA LUNGA', 2, NULL, '2020-07-02 11:18:58', NULL, 0),
(9, 'MATUGA', 2, NULL, '2020-07-02 11:18:58', NULL, 0),
(10, 'KINAGO', 2, NULL, '2020-07-02 11:18:58', NULL, 0),
(11, 'KILIFI NORTH', 3, NULL, '2020-07-02 11:18:58', NULL, 0),
(12, 'KILIFI SOUTH', 3, NULL, '2020-07-02 11:18:58', NULL, 0),
(13, 'KALOLENI', 3, NULL, '2020-07-02 11:18:58', NULL, 0),
(14, 'RABAI', 3, NULL, '2020-07-02 11:18:58', NULL, 0),
(15, 'GANZE', 3, NULL, '2020-07-02 11:18:58', NULL, 0),
(16, 'MALINDI', 3, NULL, '2020-07-02 11:18:58', NULL, 0),
(17, 'MAGARINI', 3, NULL, '2020-07-02 11:18:58', NULL, 0),
(18, 'GARSEN', 4, NULL, '2020-07-02 11:18:58', NULL, 0),
(19, 'GALOLE', 4, NULL, '2020-07-02 11:18:58', NULL, 0),
(20, 'BURA', 4, NULL, '2020-07-02 11:18:58', NULL, 0),
(21, 'LAMU EAST', 5, NULL, '2020-07-02 11:18:58', NULL, 0),
(22, 'LAMU WEST', 5, NULL, '2020-07-02 11:18:58', NULL, 0),
(23, 'TAVETA', 6, NULL, '2020-07-02 11:18:58', NULL, 0),
(24, 'WUNDANYI', 6, NULL, '2020-07-02 11:18:58', NULL, 0),
(25, 'MWATATE', 6, NULL, '2020-07-02 11:18:58', NULL, 0),
(26, 'VOI', 6, NULL, '2020-07-02 11:18:58', NULL, 0),
(27, 'GARISSA TOWNSHIP', 7, NULL, '2020-07-02 11:18:58', NULL, 0),
(28, 'BALAMBALA', 7, NULL, '2020-07-02 11:18:58', NULL, 0),
(29, 'LAGDERA', 7, NULL, '2020-07-02 11:18:58', NULL, 0),
(30, 'DADAAB', 7, NULL, '2020-07-02 11:18:58', NULL, 0),
(31, 'FAFI', 7, NULL, '2020-07-02 11:18:58', NULL, 0),
(32, 'IJARA', 7, NULL, '2020-07-02 11:18:58', NULL, 0),
(33, 'WAJIR NORTH', 8, NULL, '2020-07-02 11:18:58', NULL, 0),
(34, 'WAJIR EAST', 8, NULL, '2020-07-02 11:18:58', NULL, 0),
(35, 'TARBAJ', 8, NULL, '2020-07-02 11:18:58', NULL, 0),
(36, 'WAJIR WEST', 8, NULL, '2020-07-02 11:18:58', NULL, 0),
(37, 'ELDAS', 8, NULL, '2020-07-02 11:18:58', NULL, 0),
(38, 'WAJIR SOUTH', 8, NULL, '2020-07-02 11:18:58', NULL, 0),
(39, 'MANDERA WEST', 9, NULL, '2020-07-02 11:18:58', NULL, 0),
(40, 'BANISSA', 9, NULL, '2020-07-02 11:18:58', NULL, 0),
(41, 'MANDERA NORTH', 9, NULL, '2020-07-02 11:18:58', NULL, 0),
(42, 'MANDERA SOUTH', 9, NULL, '2020-07-02 11:18:58', NULL, 0),
(43, 'MANDERA EAST', 9, NULL, '2020-07-02 11:18:58', NULL, 0),
(44, 'LAFEY', 9, NULL, '2020-07-02 11:18:58', NULL, 0),
(45, 'MOYALE', 10, NULL, '2020-07-02 11:18:58', NULL, 0),
(46, 'NORTH HORR', 10, NULL, '2020-07-02 11:18:58', NULL, 0),
(47, 'SAKU', 10, NULL, '2020-07-02 11:18:58', NULL, 0),
(48, 'LAISAMIS', 10, NULL, '2020-07-02 11:18:58', NULL, 0),
(49, 'ISIOLO NORTH', 11, NULL, '2020-07-02 11:18:58', NULL, 0),
(50, 'ISIOLO SOUTH', 11, NULL, '2020-07-02 11:18:58', NULL, 0),
(51, 'IGEMBE SOUTH', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(52, 'IGEMBE CENTRAL', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(53, 'IGEMBE NORTH', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(54, 'TIGANIA WEST', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(55, 'TIGANIA EAST', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(56, 'NORTH IMENTI', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(57, 'BUURI', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(58, 'CENTRAL IMENTI', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(59, 'SOUTH IMENTI', 12, NULL, '2020-07-02 11:18:58', NULL, 0),
(60, 'MAARA', 13, NULL, '2020-07-02 11:18:58', NULL, 0),
(61, 'CHUKA/IGAMBANG\'OMBE', 13, NULL, '2020-07-02 11:18:58', NULL, 0),
(62, 'THARAKA', 13, NULL, '2020-07-02 11:18:58', NULL, 0),
(63, 'MANYATTA', 14, NULL, '2020-07-02 11:18:58', NULL, 0),
(64, 'RUNYENJES', 14, NULL, '2020-07-02 11:18:58', NULL, 0),
(65, 'MBEERE SOUTH', 14, NULL, '2020-07-02 11:18:58', NULL, 0),
(66, 'MBEERE NORTH', 14, NULL, '2020-07-02 11:18:58', NULL, 0),
(67, 'MWINGI NORTH', 15, NULL, '2020-07-02 11:18:58', NULL, 0),
(68, 'MWINGI WEST', 15, NULL, '2020-07-02 11:18:58', NULL, 0),
(69, 'MWINGI CENTRAL', 15, NULL, '2020-07-02 11:18:58', NULL, 0),
(70, 'KITUI WEST', 15, NULL, '2020-07-02 11:18:58', NULL, 0),
(71, 'KITUI RURAL', 15, NULL, '2020-07-02 11:18:58', NULL, 0),
(72, 'KITUI CENTRAL', 15, NULL, '2020-07-02 11:18:58', NULL, 0),
(73, 'KITUI EAST', 15, NULL, '2020-07-02 11:18:58', NULL, 0),
(74, 'KITUI SOUTH', 15, NULL, '2020-07-02 11:18:58', NULL, 0),
(75, 'MASINGA', 16, NULL, '2020-07-02 11:18:58', NULL, 0),
(76, 'YATTA', 16, NULL, '2020-07-02 11:18:58', NULL, 0),
(77, 'KANGUNDO', 16, NULL, '2020-07-02 11:18:58', NULL, 0),
(78, 'MATUNGULU', 16, NULL, '2020-07-02 11:18:58', NULL, 0),
(79, 'KATHIANI', 16, NULL, '2020-07-02 11:18:58', NULL, 0),
(80, 'MAVOKO', 16, NULL, '2020-07-02 11:18:58', NULL, 0),
(81, 'MACHAKOS TOWN', 16, NULL, '2020-07-02 11:18:58', NULL, 0),
(82, 'MWALA', 16, NULL, '2020-07-02 11:18:58', NULL, 0),
(83, 'MBOONI', 17, NULL, '2020-07-02 11:18:58', NULL, 0),
(84, 'KILOME', 17, NULL, '2020-07-02 11:18:58', NULL, 0),
(85, 'KAITI', 17, NULL, '2020-07-02 11:18:58', NULL, 0),
(86, 'MAKUENI', 17, NULL, '2020-07-02 11:18:58', NULL, 0),
(87, 'KIBWEZI WEST', 17, NULL, '2020-07-02 11:18:58', NULL, 0),
(88, 'KIBWEZI EAST', 17, NULL, '2020-07-02 11:18:58', NULL, 0),
(89, 'KINANGOP', 18, NULL, '2020-07-02 11:18:58', NULL, 0),
(90, 'KIPIPIRI', 18, NULL, '2020-07-02 11:18:58', NULL, 0),
(91, 'OL KALOU', 18, NULL, '2020-07-02 11:18:58', NULL, 0),
(92, 'OL JORO OROK', 18, NULL, '2020-07-02 11:18:58', NULL, 0),
(93, 'NDARAGWA', 18, NULL, '2020-07-02 11:18:58', NULL, 0),
(94, 'TETU', 19, NULL, '2020-07-02 11:18:58', NULL, 0),
(95, 'KIENI', 19, NULL, '2020-07-02 11:18:58', NULL, 0),
(96, 'MATHIRA', 19, NULL, '2020-07-02 11:18:58', NULL, 0),
(97, 'OTHAYA', 19, NULL, '2020-07-02 11:18:58', NULL, 0),
(98, 'MUKURWENI', 19, NULL, '2020-07-02 11:18:58', NULL, 0),
(99, 'NYERI TOWN', 19, NULL, '2020-07-02 11:18:58', NULL, 0),
(100, 'MWEA', 20, NULL, '2020-07-02 11:18:58', NULL, 0),
(101, 'GICHUGU', 20, NULL, '2020-07-02 11:18:58', NULL, 0),
(102, 'NDIA', 20, NULL, '2020-07-02 11:18:58', NULL, 0),
(103, 'KIRINYAGA CENTRAL', 20, NULL, '2020-07-02 11:18:58', NULL, 0),
(104, 'KANGEMA', 21, NULL, '2020-07-02 11:18:58', NULL, 0),
(105, 'MATHIOYA', 21, NULL, '2020-07-02 11:18:58', NULL, 0),
(106, 'KIHARU', 21, NULL, '2020-07-02 11:18:58', NULL, 0),
(107, 'KIGUMO', 21, NULL, '2020-07-02 11:18:58', NULL, 0),
(108, 'MARAGWA', 21, NULL, '2020-07-02 11:18:58', NULL, 0),
(109, 'KANDARA', 21, NULL, '2020-07-02 11:18:58', NULL, 0),
(110, 'GATANGA', 21, NULL, '2020-07-02 11:18:58', NULL, 0),
(111, 'GATUNDU SOUTH', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(112, 'GATUNDU NORTH', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(113, 'JUJA', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(114, 'THIKA TOWN', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(115, 'RUIRU', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(116, 'GITHUNGURI', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(117, 'KIAMBU', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(118, 'KIAMBAA', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(119, 'KABETE', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(120, 'KIKUYU', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(121, 'LIMURU', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(122, 'LARI', 22, NULL, '2020-07-02 11:18:58', NULL, 0),
(123, 'TURKANA NORTH', 23, NULL, '2020-07-02 11:18:58', NULL, 0),
(124, 'TURKANA WEST', 23, NULL, '2020-07-02 11:18:58', NULL, 0),
(125, 'TURKANA CENTRAL', 23, NULL, '2020-07-02 11:18:58', NULL, 0),
(126, 'LOIMA', 23, NULL, '2020-07-02 11:18:58', NULL, 0),
(127, 'TURKANA SOUTH', 23, NULL, '2020-07-02 11:18:58', NULL, 0),
(128, 'TURKANA EAST', 23, NULL, '2020-07-02 11:18:58', NULL, 0),
(129, 'KAPENGURIA', 24, NULL, '2020-07-02 11:18:58', NULL, 0),
(130, 'SIGOR', 24, NULL, '2020-07-02 11:18:58', NULL, 0),
(131, 'KACHELIBA', 24, NULL, '2020-07-02 11:18:58', NULL, 0),
(132, 'POKOT SOUTH', 24, NULL, '2020-07-02 11:18:58', NULL, 0),
(133, 'SAMBURU WEST', 25, NULL, '2020-07-02 11:18:58', NULL, 0),
(134, 'SAMBURU NORTH', 25, NULL, '2020-07-02 11:18:58', NULL, 0),
(135, 'SAMBURU EAST', 25, NULL, '2020-07-02 11:18:58', NULL, 0),
(136, 'KWANZA', 26, NULL, '2020-07-02 11:18:58', NULL, 0),
(137, 'ENDEBESS', 26, NULL, '2020-07-02 11:18:58', NULL, 0),
(138, 'SABOTI', 26, NULL, '2020-07-02 11:18:58', NULL, 0),
(139, 'KIMININI', 26, NULL, '2020-07-02 11:18:58', NULL, 0),
(140, 'CHERANGANY', 26, NULL, '2020-07-02 11:18:58', NULL, 0),
(141, 'SOY', 27, NULL, '2020-07-02 11:18:58', NULL, 0),
(142, 'TURBO', 27, NULL, '2020-07-02 11:18:58', NULL, 0),
(143, 'MOIBEN', 27, NULL, '2020-07-02 11:18:58', NULL, 0),
(144, 'AINABKOI', 27, NULL, '2020-07-02 11:18:58', NULL, 0),
(145, 'KAPSERET', 27, NULL, '2020-07-02 11:18:58', NULL, 0),
(146, 'KESSES', 27, NULL, '2020-07-02 11:18:58', NULL, 0),
(147, 'MARAKWET EAST', 28, NULL, '2020-07-02 11:18:58', NULL, 0),
(148, 'MARAKWET WEST', 28, NULL, '2020-07-02 11:18:58', NULL, 0),
(149, 'KEIYO NORTH', 28, NULL, '2020-07-02 11:18:58', NULL, 0),
(150, 'KEIYO SOUTH', 28, NULL, '2020-07-02 11:18:58', NULL, 0),
(151, 'TINDERET', 29, NULL, '2020-07-02 11:18:58', NULL, 0),
(152, 'ALDAI', 29, NULL, '2020-07-02 11:18:58', NULL, 0),
(153, 'NANDI HILLS', 29, NULL, '2020-07-02 11:18:58', NULL, 0),
(154, 'CHESUMEI', 29, NULL, '2020-07-02 11:18:58', NULL, 0),
(155, 'EMGWEN', 29, NULL, '2020-07-02 11:18:58', NULL, 0),
(156, 'MOSOP', 29, NULL, '2020-07-02 11:18:58', NULL, 0),
(157, 'TIATY', 30, NULL, '2020-07-02 11:18:58', NULL, 0),
(158, 'BARINGO NORTH', 30, NULL, '2020-07-02 11:18:58', NULL, 0),
(159, 'BARINGO CENTRAL', 30, NULL, '2020-07-02 11:18:58', NULL, 0),
(160, 'BARINGO SOUTH', 30, NULL, '2020-07-02 11:18:58', NULL, 0),
(161, 'MOGOTIO', 30, NULL, '2020-07-02 11:18:58', NULL, 0),
(162, 'ELDAMA RAVINE', 30, NULL, '2020-07-02 11:18:58', NULL, 0),
(163, 'LAIKIPIA WEST', 31, NULL, '2020-07-02 11:18:58', NULL, 0),
(164, 'LAIKIPIA EAST', 31, NULL, '2020-07-02 11:18:58', NULL, 0),
(165, 'LAIKIPIA NORTH', 31, NULL, '2020-07-02 11:18:58', NULL, 0),
(166, 'MOLO', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(167, 'NJORO', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(168, 'NAIVASHA', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(169, 'GILGIL', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(170, 'KURESOI SOUTH', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(171, 'KURESOI NORTH', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(172, 'SUBUKIA', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(173, 'RONGAI', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(174, 'BAHATI', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(175, 'NAKURU TOWN WEST', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(176, 'NAKURU TOWN EAST', 32, NULL, '2020-07-02 11:18:58', NULL, 0),
(177, 'KILGORIS', 33, NULL, '2020-07-02 11:18:58', NULL, 0),
(178, 'EMURUA DIKIRR', 33, NULL, '2020-07-02 11:18:58', NULL, 0),
(179, 'NAROK NORTH', 33, NULL, '2020-07-02 11:18:58', NULL, 0),
(180, 'NAROK EAST', 33, NULL, '2020-07-02 11:18:58', NULL, 0),
(181, 'NAROK SOUTH', 33, NULL, '2020-07-02 11:18:58', NULL, 0),
(182, 'NAROK WEST', 33, NULL, '2020-07-02 11:18:58', NULL, 0),
(183, 'KAJIADO NORTH', 34, NULL, '2020-07-02 11:18:58', NULL, 0),
(184, 'KAJIADO CENTRAL', 34, NULL, '2020-07-02 11:18:58', NULL, 0),
(185, 'KAJIADO EAST', 34, NULL, '2020-07-02 11:18:58', NULL, 0),
(186, 'KAJIADO WEST', 34, NULL, '2020-07-02 11:18:58', NULL, 0),
(187, 'KAJIADO SOUTH', 34, NULL, '2020-07-02 11:18:58', NULL, 0),
(188, 'KIPKELION EAST', 35, NULL, '2020-07-02 11:18:58', NULL, 0),
(189, 'KIPKELION WEST', 35, NULL, '2020-07-02 11:18:58', NULL, 0),
(190, 'AINAMOI', 35, NULL, '2020-07-02 11:18:58', NULL, 0),
(191, 'BURETI', 35, NULL, '2020-07-02 11:18:58', NULL, 0),
(192, 'BELGUT', 35, NULL, '2020-07-02 11:18:58', NULL, 0),
(193, 'SIGOWET/SOIN', 35, NULL, '2020-07-02 11:18:58', NULL, 0),
(194, 'SOTIK', 36, NULL, '2020-07-02 11:18:58', NULL, 0),
(195, 'CHEPALUNGU', 36, NULL, '2020-07-02 11:18:58', NULL, 0),
(196, 'BOMET EAST', 36, NULL, '2020-07-02 11:18:58', NULL, 0),
(197, 'BOMET CENTRAL', 36, NULL, '2020-07-02 11:18:58', NULL, 0),
(198, 'KONOIN', 36, NULL, '2020-07-02 11:18:58', NULL, 0),
(199, 'LUGARI', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(200, 'LIKUYANI', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(201, 'MALAVA', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(202, 'LURAMBI', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(203, 'NAVAKHOLO', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(204, 'MUMIAS WEST', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(205, 'MUMIAS EAST', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(206, 'MATUNGU', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(207, 'BUTERE', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(208, 'KHWISERO', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(209, 'SHINYALU', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(210, 'IKOLOMANI', 37, NULL, '2020-07-02 11:18:58', NULL, 0),
(211, 'VIHIGA', 38, NULL, '2020-07-02 11:18:58', NULL, 0),
(212, 'SABATIA', 38, NULL, '2020-07-02 11:18:59', NULL, 0),
(213, 'HAMISI', 38, NULL, '2020-07-02 11:18:59', NULL, 0),
(214, 'LUANDA', 38, NULL, '2020-07-02 11:18:59', NULL, 0),
(215, 'EMUHAYA', 38, NULL, '2020-07-02 11:18:59', NULL, 0),
(216, 'MT. ELGON', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(217, 'SIRISIA', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(218, 'KABUCHAI', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(219, 'BUMULA', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(220, 'KANDUYI', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(221, 'WEBUYE EAST', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(222, 'WEBUYE WEST', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(223, 'KIMILILI', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(224, 'TONGAREN', 39, NULL, '2020-07-02 11:18:59', NULL, 0),
(225, 'TESO NORTH', 40, NULL, '2020-07-02 11:18:59', NULL, 0),
(226, 'TESO SOUTH', 40, NULL, '2020-07-02 11:18:59', NULL, 0),
(227, 'NAMBALE', 40, NULL, '2020-07-02 11:18:59', NULL, 0),
(228, 'MATAYOS', 40, NULL, '2020-07-02 11:18:59', NULL, 0),
(229, 'BUTULA', 40, NULL, '2020-07-02 11:18:59', NULL, 0),
(230, 'FUNYULA', 40, NULL, '2020-07-02 11:18:59', NULL, 0),
(231, 'BUDALANGI', 40, NULL, '2020-07-02 11:18:59', NULL, 0),
(232, 'UGENYA', 41, NULL, '2020-07-02 11:18:59', NULL, 0),
(233, 'UGUNJA', 41, NULL, '2020-07-02 11:18:59', NULL, 0),
(234, 'ALEGO USONGA', 41, NULL, '2020-07-02 11:18:59', NULL, 0),
(235, 'GEM', 41, NULL, '2020-07-02 11:18:59', NULL, 0),
(236, 'BONDO', 41, NULL, '2020-07-02 11:18:59', NULL, 0),
(237, 'RARIEDA', 41, NULL, '2020-07-02 11:18:59', NULL, 0),
(238, 'KISUMU EAST', 42, NULL, '2020-07-02 11:18:59', NULL, 0),
(239, 'KISUMU WEST', 42, NULL, '2020-07-02 11:18:59', NULL, 0),
(240, 'KISUMU CENTRAL', 42, NULL, '2020-07-02 11:18:59', NULL, 0),
(241, 'SEME', 42, NULL, '2020-07-02 11:18:59', NULL, 0),
(242, 'NYANDO', 42, NULL, '2020-07-02 11:18:59', NULL, 0),
(243, 'MUHORONI', 42, NULL, '2020-07-02 11:18:59', NULL, 0),
(244, 'NYAKACH', 42, NULL, '2020-07-02 11:18:59', NULL, 0),
(245, 'KASIPUL', 43, NULL, '2020-07-02 11:18:59', NULL, 0),
(246, 'KABONDO KASIPUL', 43, NULL, '2020-07-02 11:18:59', NULL, 0),
(247, 'KARACHUONYO', 43, NULL, '2020-07-02 11:18:59', NULL, 0),
(248, 'RANGWE', 43, NULL, '2020-07-02 11:18:59', NULL, 0),
(249, 'HOMA BAY TOWN', 43, NULL, '2020-07-02 11:18:59', NULL, 0),
(250, 'NDHIWA', 43, NULL, '2020-07-02 11:18:59', NULL, 0),
(251, 'SUBA NORTH', 43, NULL, '2020-07-02 11:18:59', NULL, 0),
(252, 'SUBA SOUTH', 43, NULL, '2020-07-02 11:18:59', NULL, 0),
(253, 'RONGO', 44, NULL, '2020-07-02 11:18:59', NULL, 0),
(254, 'AWENDO', 44, NULL, '2020-07-02 11:18:59', NULL, 0),
(255, 'SUNA EAST', 44, NULL, '2020-07-02 11:18:59', NULL, 0),
(256, 'SUNA WEST', 44, NULL, '2020-07-02 11:18:59', NULL, 0),
(257, 'URIRI', 44, NULL, '2020-07-02 11:18:59', NULL, 0),
(258, 'NYATIKE', 44, NULL, '2020-07-02 11:18:59', NULL, 0),
(259, 'KURIA WEST', 44, NULL, '2020-07-02 11:18:59', NULL, 0),
(260, 'KURIA EAST', 44, NULL, '2020-07-02 11:18:59', NULL, 0),
(261, 'BONCHARI', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(262, 'SOUTH MUGIRANGO', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(263, 'BOMACHOGE BORABU', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(264, 'BOBASI', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(265, 'BOMACHOGE CHACHE', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(266, 'NYARIBARI MASABA', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(267, 'NYARIBARI CHACHE', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(268, 'KITUTU CHACHE NORTH', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(269, 'KITUTU CHACHE SOUTH', 45, NULL, '2020-07-02 11:18:59', NULL, 0),
(270, 'KITUTU MASABA', 46, NULL, '2020-07-02 11:18:59', NULL, 0),
(271, 'WEST MUGIRANGO', 46, NULL, '2020-07-02 11:18:59', NULL, 0),
(272, 'NORTH MUGIRANGO', 46, NULL, '2020-07-02 11:18:59', NULL, 0),
(273, 'BORABU', 46, NULL, '2020-07-02 11:18:59', NULL, 0),
(274, 'WESTLANDS', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(275, 'DAGORETTI NORTH', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(276, 'DAGORETTI SOUTH', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(277, 'LANGATA', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(278, 'KIBRA', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(279, 'ROYSAMBU', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(280, 'KASARANI', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(281, 'RUARAKA', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(282, 'EMBAKASI SOUTH', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(283, 'EMBAKASI NORTH', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(284, 'EMBAKASI CENTRAL', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(285, 'EMBAKASI EAST', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(286, 'EMBAKASI WEST', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(287, 'MAKADARA', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(288, 'KAMUKUNJI', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(289, 'STAREHE', 47, NULL, '2020-07-02 11:18:59', NULL, 0),
(290, 'MATHARE', 47, NULL, '2020-07-02 11:18:59', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `organizer` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `facilitators` text DEFAULT NULL,
  `no_of_participants` text DEFAULT NULL,
  `participants_scan` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `organizer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `organizer`, `date`, `topic`, `venue`, `facilitators`, `no_of_participants`, `participants_scan`, `created_by`, `updated_by`, `created_at`, `updated_at`, `organizer_id`) VALUES
(31, 'korir', 0, 'the best test', 'Karen', 'maina,\r\nmwangi', '4', '1611838188-960x0.jpg', 2, 2, 1611838188, 1611838188, NULL),
(33, '', 0, 'the best test', '', 'francis', '30', '1612942936-cicd.png', 2, 2, 1612942936, 1612942936, NULL),
(34, '', 2147483647, 'the best test', 'Karen', 'francies', '30', '1612943251-design test.png', 2, 2, 1612943251, 1612943251, 1),
(35, '', 2147483647, 'the best test', 'Karen', 'francies', '30', '1612943267-design test.png', 2, 2, 1612943267, 1612943267, 1);

-- --------------------------------------------------------

--
-- Table structure for table `training_upload`
--

CREATE TABLE `training_upload` (
  `id` int(11) NOT NULL,
  `doc_path` text DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `training_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_upload`
--

INSERT INTO `training_upload` (`id`, `doc_path`, `filename`, `training_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(7, '/uploads/multiple/training/1611838188-code-1.jpg.optimal.jpg', '1611838188-code-1.jpg.optimal.jpg', 31, NULL, NULL, NULL, NULL),
(8, '/uploads/multiple/training/1612942936-code-1.jpg.optimal.jpg', '1612942936-code-1.jpg.optimal.jpg', 33, NULL, NULL, NULL, NULL),
(9, '/uploads/multiple/training/1612943267-code-1.jpg.optimal.jpg', '1612943267-code-1.jpg.optimal.jpg', 35, NULL, NULL, NULL, NULL),
(10, '/uploads/multiple/training/1612943267-design test.png', '1612943267-design test.png', 35, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(2, 'kievo23', 'D9IPoRei3nk2nh1KHNVE0Igyp1-mcg5J', '$2y$13$GYwRtc3fha/SiwXdwtfywuxV3rHTrQzsErB0dyhOZ6rado6r5PAUG', NULL, 'kelhege@gmail.com', 10, 1610540084, 1610540084, 'Q_oTvuBv1X0sFG1fJBfQR69Hl5OTB_oW_1610540084'),
(15, 'kievo', '29belvvNtDtpOmNR-Dqrwrt5euQMBAH2', '$2y$13$mv7HMZj.da1dz7FrqyTRkeVXtwyntdIW478KdOc1kzIZNx0qhHx6K', NULL, 'kelvinchege@gmail.com', 9, 1612429700, 1612429700, '7-Hu5OyFfeHmjyjDnhbBmPJkU2nWQSum_1612429700'),
(16, 'ki', '1O-q_JpbERzVj6yfBRb3hHvrxqRQbl2N', '$2y$13$ctu8u7pZg2fh7FyZ7VM3quDaTXonK.C8RMViQqSoku6ilkcyNZrAm', NULL, 'bytesavage@protonmail.com', 9, 1612429848, 1612429848, 'M1Fqbgu67V4ApnuhJfc-sN_6oXnaF0gN_1612429848');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `group` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `group`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'RCK user', 'User Privilleges', 1606945544, 1606945544, 2, 2),
(2, 'Administrator', 'A super user', 1606945638, 1606945638, 2, 2),
(3, 'Data Entry', 'Accessing only data intensive input interfaces.', 1606945696, 1606945696, 2, 2),
(4, 'Refugee', 'Refugee Population', 1606979228, 1606979228, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `station` int(11) DEFAULT NULL,
  `cell_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `gender` int(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `work_station`
--

CREATE TABLE `work_station` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `closest_camp` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asylum_type`
--
ALTER TABLE `asylum_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caseoutcomes`
--
ALTER TABLE `caseoutcomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casestatus`
--
ALTER TABLE `casestatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casetype`
--
ALTER TABLE `casetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_register`
--
ALTER TABLE `case_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_update`
--
ALTER TABLE `case_update`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-case_update-police_case_id` (`police_case_id`);

--
-- Indexes for table `conflict`
--
ALTER TABLE `conflict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counseling`
--
ALTER TABLE `counseling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-counseling-intervention_id` (`intervention_id`);

--
-- Indexes for table `counsellors`
--
ALTER TABLE `counsellors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`CountyID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_cases`
--
ALTER TABLE `court_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-court_cases-legal_officer_id` (`legal_officer_id`),
  ADD KEY `idx-court_cases-counsellor_id` (`counsellor_id`),
  ADD KEY `idx-court_cases-court_case_category_id` (`court_case_category_id`),
  ADD KEY `idx-court_cases-court_case_subcategory_id` (`court_case_subcategory_id`),
  ADD KEY `idx-court_cases-refugee_id` (`refugee_id`),
  ADD KEY `idx-court_cases-offence_id` (`offence_id`);

--
-- Indexes for table `court_case_category`
--
ALTER TABLE `court_case_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_case_proceeding`
--
ALTER TABLE `court_case_proceeding`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-court_case_proceeding-court_case_id` (`court_case_id`);

--
-- Indexes for table `court_case_subcategory`
--
ALTER TABLE `court_case_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-court_case_subcategory-category_id` (`category_id`);

--
-- Indexes for table `court_docs_uploads`
--
ALTER TABLE `court_docs_uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-court_docs_uploads-court_case_id` (`court_case_id`),
  ADD KEY `idx-court_docs_uploads-court_uploads_id` (`court_uploads_id`);

--
-- Indexes for table `court_uploads`
--
ALTER TABLE `court_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demographics`
--
ALTER TABLE `demographics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dependant`
--
ALTER TABLE `dependant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-dependant-relationship_id` (`relationship_id`),
  ADD KEY `idx-dependant-refugee_id` (`refugee_id`);

--
-- Indexes for table `disability_type`
--
ALTER TABLE `disability_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_of_torture`
--
ALTER TABLE `form_of_torture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identification_training_status`
--
ALTER TABLE `identification_training_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identification_training_target`
--
ALTER TABLE `identification_training_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identification_type`
--
ALTER TABLE `identification_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-intervention-court_case` (`court_case`),
  ADD KEY `idx-intervention-police_case` (`police_case`),
  ADD KEY `idx-intervention-client_id` (`client_id`);

--
-- Indexes for table `intervention_attachment`
--
ALTER TABLE `intervention_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-intervention_attachment-intervention_id` (`intervention_id`),
  ADD KEY `idx-intervention_attachment-upload_id` (`upload_id`);

--
-- Indexes for table `intervention_type`
--
ALTER TABLE `intervention_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intervention_upload`
--
ALTER TABLE `intervention_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-intervention_upload-issue_id` (`issue_id`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyerrating`
--
ALTER TABLE `lawyerrating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magistrate`
--
ALTER TABLE `magistrate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `mode_of_entry`
--
ALTER TABLE `mode_of_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nature_of_proceeding`
--
ALTER TABLE `nature_of_proceeding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offence`
--
ALTER TABLE `offence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-police-station_id` (`station_id`);

--
-- Indexes for table `policestation`
--
ALTER TABLE `policestation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police_cases`
--
ALTER TABLE `police_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-police_cases-police_station_id` (`police_station_id`),
  ADD KEY `idx-police_cases-refugee_id` (`refugee_id`),
  ADD KEY `idx-police_cases-offence_id` (`offence_id`);

--
-- Indexes for table `police_case_proceeding`
--
ALTER TABLE `police_case_proceeding`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-police_case_proceeding-police_case_id` (`police_case_id`);

--
-- Indexes for table `police_docs_upload`
--
ALTER TABLE `police_docs_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-police_docs_upload-police_case_id` (`police_case_id`),
  ADD KEY `idx-police_docs_upload-police_uploads_id` (`police_uploads_id`);

--
-- Indexes for table `police_uploads`
--
ALTER TABLE `police_uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `rck_offices`
--
ALTER TABLE `rck_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refugee`
--
ALTER TABLE `refugee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-refugee-user_group_id` (`user_group_id`),
  ADD KEY `idx-refugee-user_id` (`user_id`),
  ADD KEY `idx-refugee-camp` (`camp`),
  ADD KEY `idx-refugee-rck_office_id` (`rck_office_id`),
  ADD KEY `idx-refugee-mode_of_entry_id` (`mode_of_entry_id`),
  ADD KEY `idx-refugee-disability_type_id` (`disability_type_id`);

--
-- Indexes for table `refugee_camp`
--
ALTER TABLE `refugee_camp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-refugee_camp-rck_office` (`rck_office`);

--
-- Indexes for table `refugee_docs_upload`
--
ALTER TABLE `refugee_docs_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-refugee_docs_upload-model_id` (`model_id`),
  ADD KEY `idx-refugee_docs_upload-upload_id` (`upload_id`);

--
-- Indexes for table `refugee_uploads`
--
ALTER TABLE `refugee_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `rsvp_status`
--
ALTER TABLE `rsvp_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source_of_income`
--
ALTER TABLE `source_of_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source_of_info`
--
ALTER TABLE `source_of_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcounties`
--
ALTER TABLE `subcounties`
  ADD PRIMARY KEY (`SubCountyID`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-training-organizer_id` (`organizer_id`);

--
-- Indexes for table `training_upload`
--
ALTER TABLE `training_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-training_upload-training_id` (`training_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_profile-user_group_id` (`user_group_id`),
  ADD KEY `idx-user_profile-user_id` (`user_id`),
  ADD KEY `idx-user_profile-station` (`station`);

--
-- Indexes for table `work_station`
--
ALTER TABLE `work_station`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asylum_type`
--
ALTER TABLE `asylum_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `caseoutcomes`
--
ALTER TABLE `caseoutcomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casestatus`
--
ALTER TABLE `casestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casetype`
--
ALTER TABLE `casetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `case_register`
--
ALTER TABLE `case_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_update`
--
ALTER TABLE `case_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conflict`
--
ALTER TABLE `conflict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counseling`
--
ALTER TABLE `counseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `counsellors`
--
ALTER TABLE `counsellors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `CountyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `court_cases`
--
ALTER TABLE `court_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `court_case_category`
--
ALTER TABLE `court_case_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `court_case_proceeding`
--
ALTER TABLE `court_case_proceeding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `court_case_subcategory`
--
ALTER TABLE `court_case_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `court_docs_uploads`
--
ALTER TABLE `court_docs_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `court_uploads`
--
ALTER TABLE `court_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `demographics`
--
ALTER TABLE `demographics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dependant`
--
ALTER TABLE `dependant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disability_type`
--
ALTER TABLE `disability_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_of_torture`
--
ALTER TABLE `form_of_torture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `identification_training_status`
--
ALTER TABLE `identification_training_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identification_training_target`
--
ALTER TABLE `identification_training_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identification_type`
--
ALTER TABLE `identification_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `intervention_attachment`
--
ALTER TABLE `intervention_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `intervention_type`
--
ALTER TABLE `intervention_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `intervention_upload`
--
ALTER TABLE `intervention_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lawyerrating`
--
ALTER TABLE `lawyerrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `magistrate`
--
ALTER TABLE `magistrate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mode_of_entry`
--
ALTER TABLE `mode_of_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nature_of_proceeding`
--
ALTER TABLE `nature_of_proceeding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offence`
--
ALTER TABLE `offence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policestation`
--
ALTER TABLE `policestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `police_cases`
--
ALTER TABLE `police_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `police_case_proceeding`
--
ALTER TABLE `police_case_proceeding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `police_docs_upload`
--
ALTER TABLE `police_docs_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `police_uploads`
--
ALTER TABLE `police_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rck_offices`
--
ALTER TABLE `rck_offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refugee`
--
ALTER TABLE `refugee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `refugee_camp`
--
ALTER TABLE `refugee_camp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `refugee_docs_upload`
--
ALTER TABLE `refugee_docs_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `refugee_uploads`
--
ALTER TABLE `refugee_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rsvp_status`
--
ALTER TABLE `rsvp_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `source_of_income`
--
ALTER TABLE `source_of_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `source_of_info`
--
ALTER TABLE `source_of_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcounties`
--
ALTER TABLE `subcounties`
  MODIFY `SubCountyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `training_upload`
--
ALTER TABLE `training_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_station`
--
ALTER TABLE `work_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_update`
--
ALTER TABLE `case_update`
  ADD CONSTRAINT `fk-case_update-police_case_id` FOREIGN KEY (`police_case_id`) REFERENCES `police_cases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counseling`
--
ALTER TABLE `counseling`
  ADD CONSTRAINT `fk-counseling-intervention_id` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `court_cases`
--
ALTER TABLE `court_cases`
  ADD CONSTRAINT `fk-court_cases-counsellor_id` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-court_cases-court_case_category_id` FOREIGN KEY (`court_case_category_id`) REFERENCES `court_case_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-court_cases-court_case_subcategory_id` FOREIGN KEY (`court_case_subcategory_id`) REFERENCES `court_case_subcategory` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-court_cases-legal_officer_id` FOREIGN KEY (`legal_officer_id`) REFERENCES `lawyer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-court_cases-offence_id` FOREIGN KEY (`offence_id`) REFERENCES `offence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-court_cases-refugee_id` FOREIGN KEY (`refugee_id`) REFERENCES `refugee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `court_case_proceeding`
--
ALTER TABLE `court_case_proceeding`
  ADD CONSTRAINT `fk-court_case_proceeding-court_case_id` FOREIGN KEY (`court_case_id`) REFERENCES `court_cases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `court_case_subcategory`
--
ALTER TABLE `court_case_subcategory`
  ADD CONSTRAINT `fk-court_case_subcategory-category_id` FOREIGN KEY (`category_id`) REFERENCES `court_case_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `court_docs_uploads`
--
ALTER TABLE `court_docs_uploads`
  ADD CONSTRAINT `fk-court_docs_uploads-court_case_id` FOREIGN KEY (`court_case_id`) REFERENCES `court_cases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-court_docs_uploads-court_uploads_id` FOREIGN KEY (`court_uploads_id`) REFERENCES `court_uploads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dependant`
--
ALTER TABLE `dependant`
  ADD CONSTRAINT `fk-dependant-refugee_id` FOREIGN KEY (`refugee_id`) REFERENCES `refugee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-dependant-relationship_id` FOREIGN KEY (`relationship_id`) REFERENCES `relationship` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `fk-intervention-client_id` FOREIGN KEY (`client_id`) REFERENCES `refugee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-intervention-court_case` FOREIGN KEY (`court_case`) REFERENCES `court_cases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-intervention-police_case` FOREIGN KEY (`police_case`) REFERENCES `police_cases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `intervention_attachment`
--
ALTER TABLE `intervention_attachment`
  ADD CONSTRAINT `fk-intervention_attachment-intervention_id` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-intervention_attachment-upload_id` FOREIGN KEY (`upload_id`) REFERENCES `intervention_upload` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `intervention_upload`
--
ALTER TABLE `intervention_upload`
  ADD CONSTRAINT `fk-intervention_upload-issue_id` FOREIGN KEY (`issue_id`) REFERENCES `casetype` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `police`
--
ALTER TABLE `police`
  ADD CONSTRAINT `fk-police-station_id` FOREIGN KEY (`station_id`) REFERENCES `policestation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `police_cases`
--
ALTER TABLE `police_cases`
  ADD CONSTRAINT `fk-police_cases-offence_id` FOREIGN KEY (`offence_id`) REFERENCES `offence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-police_cases-police_station_id` FOREIGN KEY (`police_station_id`) REFERENCES `policestation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-police_cases-refugee_id` FOREIGN KEY (`refugee_id`) REFERENCES `refugee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `police_case_proceeding`
--
ALTER TABLE `police_case_proceeding`
  ADD CONSTRAINT `fk-police_case_proceeding-police_case_id` FOREIGN KEY (`police_case_id`) REFERENCES `police_cases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `police_docs_upload`
--
ALTER TABLE `police_docs_upload`
  ADD CONSTRAINT `fk-police_docs_upload-police_case_id` FOREIGN KEY (`police_case_id`) REFERENCES `police_cases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-police_docs_upload-police_uploads_id` FOREIGN KEY (`police_uploads_id`) REFERENCES `police_uploads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refugee`
--
ALTER TABLE `refugee`
  ADD CONSTRAINT `fk-refugee-camp` FOREIGN KEY (`camp`) REFERENCES `refugee_camp` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-refugee-disability_type_id` FOREIGN KEY (`disability_type_id`) REFERENCES `disability_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-refugee-mode_of_entry_id` FOREIGN KEY (`mode_of_entry_id`) REFERENCES `mode_of_entry` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-refugee-rck_office_id` FOREIGN KEY (`rck_office_id`) REFERENCES `rck_offices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refugee_camp`
--
ALTER TABLE `refugee_camp`
  ADD CONSTRAINT `fk-refugee_camp-rck_office` FOREIGN KEY (`rck_office`) REFERENCES `rck_offices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refugee_docs_upload`
--
ALTER TABLE `refugee_docs_upload`
  ADD CONSTRAINT `fk-refugee_docs_upload-model_id` FOREIGN KEY (`model_id`) REFERENCES `refugee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-refugee_docs_upload-upload_id` FOREIGN KEY (`upload_id`) REFERENCES `refugee_uploads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `fk-training-organizer_id` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_upload`
--
ALTER TABLE `training_upload`
  ADD CONSTRAINT `fk-training_upload-training_id` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `fk-user_profile-station` FOREIGN KEY (`station`) REFERENCES `work_station` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_profile-user_group_id` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_profile-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
