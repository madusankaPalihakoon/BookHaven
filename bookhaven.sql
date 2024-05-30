-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2024 at 05:47 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookhaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation_book`
--

DROP TABLE IF EXISTS `donation_book`;
CREATE TABLE IF NOT EXISTS `donation_book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `cover` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `ISBN` varchar(225) DEFAULT NULL,
  `book_description` varchar(225) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donation_book`
--

INSERT INTO `donation_book` (`id`, `name`, `cover`, `author`, `publisher`, `ISBN`, `book_description`, `category`) VALUES
(1, 'Animal Science: Biology and Technology', 'https://th.bing.com/th/id/R.9bc4b7a0e23b307498819de6e11d3157?rik=Uqhwh1H21YqASg&pid=ImgRaw&r=0', 'Robert M. Thorne', 'Pearson', '978-0132623896', 'Comprehensive introduction to animal science', 'Animal Science'),
(2, 'Animal Feeding and Nutrition', 'https://th.bing.com/th/id/R.9de36ce48a0322cc59716df0877b44ed?rik=lwo99je9%2fMKnqA&riu=http%3a%2f%2fwww.acsbookshop.com%2fdatabase%2fimages%2fanimal-feed-nutrition-pdf-ebook-main-5983-5983.jpg&ehk=zCeTwtxBhVUTiygv5VGMP6By322dM', 'Marshall H. Jurgens', 'Kendall Hunt Publishing', '978-0757591137', 'Detailed book on animal nutrition', 'Animal Science'),
(3, 'Principles of Animal Science', 'https://th.bing.com/th/id/R.973be8fd07e264e71bba04258c36a6ee?rik=IRvTQ3Cg9gHWQA&pid=ImgRaw&r=0', 'D. Jason Mollett', 'Cengage Learning', '978-1111138776', 'Overview of principles in animal science', 'Animal Science'),
(4, 'Agricultural Export and Marketing', 'https://th.bing.com/th/id/OIP.QjaX_Ngcbi2MwSPOWIkiawAAAA?pid=ImgDetMain', 'John J. Curry', 'ABC-CLIO', '978-1440835824', 'Insights into agricultural export marketing', 'Export Agriculture'),
(5, 'Export Agriculture: Practices and Strategies', 'https://th.bing.com/th/id/OIP.EVLmy9OZH7FfkCUZKlxj-gHaLO?rs=1&pid=ImgDetMain', 'Samuel A. Navarro', 'CRC Press', '978-1482232911', 'Strategies for successful agricultural export', 'Export Agriculture'),
(6, 'Sustainable Agriculture and Export', 'https://th.bing.com/th/id/R.8b4f6a1023b226f17b0bba3f37b22d2e?rik=r647zRlD9Tz2Jw&pid=ImgRaw&r=0', 'Sarah J. Trent', 'Springer', '978-3319676668', 'Sustainable practices in export agriculture', 'Export Agriculture'),
(7, 'Management: Tasks, Responsibilities, Practices', 'https://th.bing.com/th/id/OIP.USrwZg-W_mR2KFotNTBrlQHaJg?pid=ImgDetMain', 'Peter F. Drucker', 'Harper Business', '978-0060878979', 'Fundamental management principles by Peter Drucker', 'Management'),
(8, 'Principles of Management', 'https://th.bing.com/th/id/R.c0d3f18f70b5e1b8ad0ba6067da5e62a?rik=Sgnco9rs8JKBkw&pid=ImgRaw&r=0', 'Charles W. L. Hill', 'McGraw-Hill Education', '978-0078029463', 'Comprehensive principles of management', 'Management'),
(9, 'Management: An Introduction', 'https://th.bing.com/th/id/R.9ebc5dee84ffb3564618e78a975765f1?rik=auT46I3wYEF6FQ&pid=ImgRaw&r=0', 'David Boddy', 'Pearson', '978-1292088594', 'Introduction to management concepts and practices', 'Management'),
(10, 'Introduction to Applied Science', 'https://th.bing.com/th/id/R.3f6baa1619d474938f1b5186b73c5f02?rik=mVamDSiIwhF6DQ&pid=ImgRaw&r=0', 'James Trefil', 'Wiley', '978-1118955055', 'Introductory applied science concepts', 'Applied Science'),
(11, 'Applied Physics', 'https://th.bing.com/th/id/OIP.6ULWR9ZCff_BksErrMNlJwHaJ4?pid=ImgDetMain', 'Dale Ewen', 'Pearson', '978-0136116332', 'Fundamentals of applied physics', 'Applied Science'),
(12, 'Applied Chemistry', 'https://th.bing.com/th/id/OIP.hJFhXCDiIrPwJ2i5Pz0dmwHaJ5?pid=ImgDetMain', 'H. Stephen Stoker', 'Cengage Learning', '978-1111427109', 'Detailed exploration of applied chemistry', 'Applied Science'),
(13, 'Technology in Action', 'https://th.bing.com/th/id/OIP.biUL7SDg_2xdxp-W4plY1gHaHa?rs=1&pid=ImgDetMain', 'Alan Evans', 'Pearson', '978-0134289105', 'Comprehensive technology textbook', 'Technology'),
(14, 'Introduction to Information Technology', 'https://th.bing.com/th/id/OIP.68loNoX2AKqCdl_dzwO-QgHaLR?pid=ImgDetMain', 'Efraim Turban', 'Wiley', '978-0471073805', 'Introduction to IT concepts and practices', 'Technology'),
(15, 'Technology Ventures: From Idea to Enterprise', 'https://images-na.ssl-images-amazon.com/images/I/51j7-YE66SL.jpg', 'Richard C. Dorf', 'McGraw-Hill Education', '978-0073523423', 'Guidance on creating technology ventures', 'Technology'),
(16, 'Precision Agriculture Technology', 'https://th.bing.com/th/id/OIP.2_2hd8oWGgCy-7xXo7X73QHaLH?pid=ImgDetMain', 'Qin Zhang', 'CRC Press', '978-1439880579', 'Advanced precision agriculture technologies', 'Export Agriculture'),
(17, 'Managing Technology and Innovation', 'https://th.bing.com/th/id/R.3d7d2f724602c5e2e6ddbfab0e0b2892?rik=UjwquosYGjjTnQ&pid=ImgRaw&r=0', 'Robert Verburg', 'Routledge', '978-0415997817', 'Insights into managing technology and innovation', 'Management'),
(18, 'Animal Genetics and Breeding', 'https://th.bing.com/th/id/R.e9f76783ab09fa04a736aee8dc093393?rik=oP9epUabA4XGFA&pid=ImgRaw&r=0', 'J. Van der Werf', 'CABI', '978-1780649750', 'Comprehensive guide to animal genetics', 'Animal Science'),
(19, 'Sustainable Food Production', 'https://th.bing.com/th/id/R.c072a0b21cb454c9f2437a57ea890186?rik=l0Mgxfd6M3zC5g&pid=ImgRaw&r=0', 'Paul Christou', 'Springer', '978-1493928002', 'Methods for sustainable food production', 'Export Agriculture'),
(20, 'Applied Materials Science', 'https://th.bing.com/th/id/OIP.RkXooIRVfjODmy-trvjQHwAAAA?pid=ImgDetMain', 'Deborah D.L. Chung', 'CRC Press', '978-0849317912', 'Materials science applications and principles', 'Applied Science');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `verification` varchar(225) DEFAULT NULL,
  `verification_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `address`, `phone`, `password`, `verification`, `verification_at`, `created_at`) VALUES
(1, 'sanjaya madusanka', 'pmsmpalihakoon@gmail.com', 'www.sanjayamadusanka2017@gmail.com', 'diyanilla kandura, watagamuwa, bandarawela', '0755329030', '$2y$10$qabPhzvMqX81BGy.bChyS.qA6lFDA38Cbc5OFMEX9fpoM2gnADzo.', '$2y$10$P6YoKn.TtjsQqh8CElgznu36W0VcXoL1uOnNhMRNYUc3mAy./fzte', '2024-05-25 22:33:15', '2024-05-25 15:30:26'),
(2, 'sanjaya madusanka', 'pmsmpalihakoon@gmail.com', 'www.sanjayamadusanka2017@gmail.com', 'diyanilla kandura, watagamuwa, bandarawela', '0755329030', '$2y$10$B/3czELA2D2y1u9SR6AZ..hsaCDEkn8twS1dMYE7eVoCyk/vpchR.', '$2y$10$xTIJZOBiyY3k9F///sG9tOSKaaApWFdXA5YYYeATNvrgmll3sPvqi', NULL, '2024-05-27 17:58:44'),
(3, 'sanjaya madusanka', 'pmsmpalihakoon@gmail.com', 'www.sanjayamadusanka2017@gmail.com', 'diyanilla kandura, watagamuwa, bandarawela', '0755329030', '$2y$10$YN3qaPWEPDaHgLr68MdU8ODalO.SxDd47zkGjtJcS8nYYBJepqa2O', '$2y$10$fzbLmiVVFwNGzn5Lx3OAIOdHKnprILN4Dt0bp9EsIb6qMEId3IZTq', NULL, '2024-05-27 17:59:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
