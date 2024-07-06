-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 02:27 PM
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
-- Database: `atms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `class_id`) VALUES
(1, 4, 8),
(2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `course_id`, `course_date`, `status`, `lecturer_id`, `date`) VALUES
(4, 8, '2024-04-04 12:12:08', 'Not set', 1, '2024-04-02 23:00:00'),
(5, 11, '2024-04-03 01:31:05', 'Not set', 4, '2024-04-02 23:00:00'),
(6, 11, '2024-04-03 14:15:43', 'Inactive', 2, '2024-04-02 23:00:00'),
(8, 8, '2024-04-04 12:12:17', 'Inactive', 2, '2024-04-03 13:31:25'),
(9, 10, '2024-04-03 14:14:56', 'Inactive', 2, '2024-04-03 13:32:28'),
(10, 10, '2024-04-03 14:15:57', 'Inactive', 2, '2024-04-03 13:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_title`, `department`) VALUES
(7, 'CMP411', 'Queueing Theory', 'Computer Science'),
(8, 'CMP 410', 'Project Management', 'Computer Science'),
(9, 'CMP 311', 'Introduction to programming', 'Computer Science'),
(10, 'CMP 111', 'Into. to OOP', 'Computer Science'),
(11, 'CMP 211', 'Computer Structure', 'Computer Science'),
(12, 'CMP 412', 'Computer Network and Security', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `course_allocation`
--

CREATE TABLE `course_allocation` (
  `allocation_id` int(11) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `course_option` varchar(255) DEFAULT NULL,
  `allocated_for` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_allocation`
--

INSERT INTO `course_allocation` (`allocation_id`, `lecturer_id`, `course_id`, `level`, `department`, `course_option`, `allocated_for`) VALUES
(2, 1, 8, NULL, 'Computer Science', NULL, 'Lecturer'),
(3, NULL, 8, '400 Level', 'Computer Science', 'Compulsory', 'Student'),
(5, 2, 11, NULL, 'Computer Science', NULL, 'Lecturer'),
(6, 2, 10, NULL, 'Computer Science', NULL, 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `exam_officer`
--

CREATE TABLE `exam_officer` (
  `exam_officer_id` int(11) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_officer`
--

INSERT INTO `exam_officer` (`exam_officer_id`, `lecturer_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `secret_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`secret_id`) VALUES
('$2y$10$Ki9D37d/zkOSKFaG2uMF.uNBRg5ysSQm7N5Ls1k/pHzl/JrA851Fu'),
('$2y$10$Ki9D37d/zkOSKFaG2uMF.uNBRg5ysSQm7N5Ls1k/pHzl/JrA851Fu');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_id`, `fullname`, `email`, `faculty`, `department`, `password`) VALUES
(1, 'Sidi Samaila Agya', 'sidisamailaagya@gmail.com', 'FNAS', 'Computer Science', '1'),
(2, 'Benita Dogo Joseph', 'sam1@gmail.com', 'FNAS', 'Computer Science', '$2y$10$RNbiUbX80hFlJGD.FS080ujT8A3xGcB9UgTkpzNjlvi4wDwlBCcXq'),
(3, 'Nuru ibrahim', 'nuru@gmail.com', 'FNAS', 'Computer Science', '$2y$10$NwpDo3oLoLoEn/2w0i6..O0hati4DdhowfRtjEPF8/JmeL8g1/Dwe'),
(4, 'Lecturer', 'sidi@gmail.com', 'FNAS', 'Computer Science', '$2y$10$htNVMDBTOwixnRvMut860eK4CX8m9CjloBqqDJwpoU4jggAqnwqbu');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `matricno` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fullname`, `matricno`, `faculty`, `department`, `password`) VALUES
(1, '$fullname', '$matric', '$faculty', '$department', '$password'),
(2, 'Nuru ibrahim', '0219047000847', 'FNAS', 'Computer Science', '1'),
(3, 'Sidi Samaila Agya', '0219047000847', 'FNAS', 'Computer Science', '$2y$10$w4EVVfq2deEaHoq01tNL4.d/Y1dKQ3hmxLsgxIUbrUdFgmORWtC9G'),
(4, 'Nuru ibrahim', '0219047000204', 'FNAS', 'Computer Science', '$2y$10$s./AOpjUQmHSYhYTGtmT8.ieFlbsvbdt/KuBwHokmxSWi6troWZp2'),
(5, 'Nur', '001', 'FNAS', 'Computer Science', '$2y$10$DMbwHVJCjsBsl4r3GRWgK.Q2uYeY9nTMxMrzLrALaxz5miYTZZ9Z6'),
(6, 'sam', '1', 'FNAS', 'Computer Science', '$2y$10$OkfyFiCY7XB2U3XcREfVyevfTpy99bpO8fQFEsRg/uMOFn4CyMw06'),
(7, 'Nuru ibrahim', '0219047', 'FNAS', 'Computer Science', '$2y$10$59l.zqumusPi8m.gwnthk.wA5QtO/q0FPV1D3upbwlTuLXyjWdMYq'),
(8, 'Sidi Samaila Agya', '01', 'FNAS', 'Computer Science', '$2y$10$YO2G3F/KzON9L5vNXe/GAOOnBiSDvJFp9JDeBbjVeN7rNJ/5BImTq'),
(9, 'Nuru ibrahim', '0000', 'FNAS', 'Computer Science', '$2y$10$K87IYRGaGxJ/tL7b541NzevkXHe/09LmUvff9c.mSXn4I.q37P0em'),
(10, 'Nuru ibrahim', '123', 'FNAS', 'Computer Science', '$2y$10$NB7OIQBJc79DTU1pHkBCbu8brNir4/bkdhfliHAzdS4z0iaetFChi'),
(11, 'Samaila', '0219', 'FNAS', 'Computer Science', '$2y$10$LIG2gE/2u/AcHeAPBHjTOemMW4kAJiZWWbvZeCxiwgvCsLxib.UVe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id_join` (`student_id`),
  ADD KEY `class_id_join` (`class_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `course_id_join` (`course_id`),
  ADD KEY `lecturer_id_key` (`lecturer_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_allocation`
--
ALTER TABLE `course_allocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `lecturer_id` (`lecturer_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `exam_officer`
--
ALTER TABLE `exam_officer`
  ADD PRIMARY KEY (`exam_officer_id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_allocation`
--
ALTER TABLE `course_allocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_officer`
--
ALTER TABLE `exam_officer`
  MODIFY `exam_officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lecturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `class_id_join` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `student_id_join` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `course_id_join` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `lecturer_id_key` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`);

--
-- Constraints for table `course_allocation`
--
ALTER TABLE `course_allocation`
  ADD CONSTRAINT `course_allocation_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`),
  ADD CONSTRAINT `course_allocation_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `exam_officer`
--
ALTER TABLE `exam_officer`
  ADD CONSTRAINT `exam_officer_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
