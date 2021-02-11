-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 10:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Dumping data for table `court_case_category`
--

INSERT INTO `court_case_category` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'General', 1610620113, 1610620113, 2, 2),
(2, 'SGBV cases', 1610620169, 1610620169, 2, 2),
(3, 'Child Custody Cases', 1610697695, 1610697695, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `court_case_subcategory`
--

--
-- Dumping data for table `court_case_subcategory`
--

INSERT INTO `court_case_subcategory` (`id`, `name`, `category_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Pleadings', 2, 1610620152, 1610620152, 2, 2),
(2, 'Victim impact statement/Submissions', 2, 1610620187, 1610620187, 2, 2),
(3, 'Judgement', 1, 1610697733, 1610697733, 2, 2),
(5, 'Judgement', 2, 1613031070, 1613031070, 2, 2),
(6, 'Plaint file', 3, 1613031100, 1613031100, 2, 2),
(7, 'Pretrial Conference', 3, 1613031122, 1613031122, 2, 2),
(8, 'Submission', 3, 1613031137, 1613031137, 2, 2),
(9, 'Custody Order/Judgement:', 3, 1613031153, 1613031153, 2, 2),
(10, 'Advert', 3, 1613031169, 1613031169, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `court_case_category`
--
ALTER TABLE `court_case_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_case_subcategory`
--
ALTER TABLE `court_case_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-court_case_subcategory-category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `court_case_category`
--
ALTER TABLE `court_case_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `court_case_subcategory`
--
ALTER TABLE `court_case_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `court_case_subcategory`
--
ALTER TABLE `court_case_subcategory`
  ADD CONSTRAINT `fk-court_case_subcategory-category_id` FOREIGN KEY (`category_id`) REFERENCES `court_case_category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
