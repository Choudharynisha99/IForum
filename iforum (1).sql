-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 02:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text DEFAULT NULL,
  `category_desc` varchar(200) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `category_image`) VALUES
(1, 'python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation', 'image/christopher-gower-m_HRfLhgABo-unsplash.jpg'),
(2, 'C++', 'C++ is an object-oriented programming language which gives a clear structure to programs and allows code to be reused, lowering development costs.', 'image/rubaitul-azad-ZIPFteu-R8k-unsplash.jpg'),
(3, 'PHP', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995', 'image/mohammad-rahmani-gA396xahf-Q-unsplash.jpg'),
(4, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language and core technology of the Web, alongside HTML and CSS. 99% of websites use JavaScript on the client side for webpage behavior. Web brows', 'image/mohammad-rahmani-gA396xahf-Q-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `email`, `username`, `pass`) VALUES
(1, 'nisha99@gmail.com', 'nisha09', '$2y$10$OrJOoFvL.sFiQBh2Zms.Qug7pCQrsoFe3aGBbXiqf8Pq4kdRAHwSq'),
(2, 'radha99@gmail.com', 'radha12', '$2y$10$.XjIpfFv6lTjEVgFvsvVx./fvRPRyS2BvPsKqikwluR3SorEcQMg6'),
(3, 'vishal98@gmail.com', 'vishal89', 'vishal\r\n'),
(4, 'vishal98@gmail.com', 'vishal89', 'vishal\r\n'),
(5, 'krishan89@gmail.com', 'krishna11', '$2y$10$8MYWvZtMYxcsooAhpKE38.5n4SGvUHYz1LBnjp4Lu3CR2qYxZe/DW'),
(6, 'karan99@gmail.com', 'karan09', '$2y$10$mqZ.ndRF99Re/su.gbTmXOBIEacNWEdTgVL.DtohwdPm5J1EXLlX.'),
(7, 'ashu09@gmail.com', 'ashu99', '$2y$10$09BlkLJ946iKL0ielkxdQuyRoCM7QL6qJP0kEq/wp5hPAZQTbg3Cu'),
(8, 'komal33@gmail.com', 'komal33', '$2y$10$tdJU3pAc05webcu3tFL1K.WsU43Z.0n9WsEJ4fugI1JgVojw.JECS'),
(9, 'ishika17@gmail.com', 'ishika17', '$2y$10$S1JUIlOBEo37447qGNGYnOpeyIEujOKZ8t3WBS2fqUm0N7yPf/hJi'),
(10, 'khushi21@gmail.com', 'khushi21', '$2y$10$a9nZbm9Id40S8lj/1JWyieO8.FDMpbtNJ49CB1MVLBfPCTioIvZHK'),
(11, 'ishita01@gmail.com', 'ishita01', '$2y$10$Ltt8J7mQOWGo6RkUVcKmN.RH8PE9fODOu3Vj5gBwhi9bTDY/kG6rW'),
(12, 'meera11@gmail.com', 'meera11', '$2y$10$4Sm9yuypej2ahP9IFpf8quQFG8e2ujb.vboGiOZesUJd7lLTWTJkO');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_email` varchar(255) DEFAULT NULL,
  `slider_password` varchar(255) DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_email`, `slider_password`, `slider_image`) VALUES
(1, 'nisha99@gmail.com', 'nish', 'image/chris-ried-ieic5Tq8YMk-unsplash.jpg'),
(2, 'radha99@gmail.com', 'radha', 'image/rubaitul-azad-ZIPFteu-R8k-unsplash.jpg'),
(3, 'vishal89@gmail.coom', 'vishal', 'image/christopher-gower-m_HRfLhgABo-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `threadlist`
--

CREATE TABLE `threadlist` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(200) DEFAULT NULL,
  `thread_description` varchar(255) DEFAULT NULL,
  `thread_cat_id` int(11) DEFAULT NULL,
  `thread_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threadlist`
--

INSERT INTO `threadlist` (`thread_id`, `thread_title`, `thread_description`, `thread_cat_id`, `thread_user`) VALUES
(1, 'server problem', 'server ', 1, 1),
(3, 'variable declaration problem', 'variable ', 1, 2),
(5, 'server problem', 'xampp is not installing', 3, 3),
(6, 'server problem', 'can not connecting', 2, 11),
(7, 'What does the following code snippet do?', 'Multiplies two numbers and prints the result what does it do', 1, 12),
(8, 'Python program to check whether the string is Symmetrical or Palindrome', ' A string is said to be symmetrical if both the halves of the string are the same and a string is said to be a palindrome string if one half of the string is the reverse of the other half', 1, 12),
(9, ' Program to Print the ASCII Value of a Character.', 'each character has some ASCII value associated with it. In this problem, we have to print the ASCII value of the character in the console not able to access', 2, 12),
(10, 'program in C++ to print the sum of two numbers.', 'program in C++ to print the sum of two numbers.\r\nSample Output:\r\nPrint the sum of two numbers', 2, 12),
(11, 'PHP_INT_MAX is a PHP constant that corresponds to the largest supported integer value ', 'The result of var_dump(PHP_INT_MAX + 1) will be displayed as a double (in the case of this specific example, it will display double(9.2233720368548E+18)). The key here is for the candidate to know that PHP handles large integers by converting them ', 3, 12),
(12, 'program and async function is not working', 'async function making problem', 4, 12),
(13, 'what is PEAR', '\r\nPEAR is a framework and repository for PHP components that can be reused. PHP Extension and Application Repository (PEAR) is an acronym for PHP ', 3, 1),
(14, 'variable declaration problem', 'variable not declared', 2, 1),
(15, 'program in C++ ', 'getting problem in fetching loops', 2, 1),
(16, 'What does the following code snippet do?', 'snippet do anything ', 2, 1),
(17, 'xampp is not working ', 'can not download till', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `th_comment`
--

CREATE TABLE `th_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_description` varchar(200) DEFAULT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `comment_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `th_comment`
--

INSERT INTO `th_comment` (`comment_id`, `comment_description`, `thread_id`, `comment_by`) VALUES
(1, 'my concern should be added', 1, 11),
(2, 'my concern should be added', 1, 11),
(3, 'try to install there latest version and keep downloading in back of screen it will come in your pc folder automatically after completing downloading file', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `threadlist`
--
ALTER TABLE `threadlist`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `thread_user` (`thread_user`);
ALTER TABLE `threadlist` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_description`);

--
-- Indexes for table `th_comment`
--
ALTER TABLE `th_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_by` (`comment_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `threadlist`
--
ALTER TABLE `threadlist`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `th_comment`
--
ALTER TABLE `th_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `threadlist`
--
ALTER TABLE `threadlist`
  ADD CONSTRAINT `threadlist_ibfk_1` FOREIGN KEY (`thread_user`) REFERENCES `signup` (`id`);

--
-- Constraints for table `th_comment`
--
ALTER TABLE `th_comment`
  ADD CONSTRAINT `comment_by` FOREIGN KEY (`comment_by`) REFERENCES `signup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
