-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2020 at 04:28 PM
-- Server version: 10.4.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u673078778_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `additionalFacility`
--

CREATE TABLE `additionalFacility` (
  `id` int(11) NOT NULL,
  `owner_mob` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facility` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additionalFacility`
--

INSERT INTO `additionalFacility` (`id`, `owner_mob`, `facility`, `price`) VALUES
(1, '0723942008', 'skating', '120'),
(2, '0723942008', 'horse riding', '300'),
(3, '0746329405', 'paintball', '20'),
(4, '0723942009', 'swimming', '23'),
(7, '0723942009', 'rishi', '1000'),
(8, '0773900231', 'jumping', '200'),
(9, '0773900231', '77', '88');

-- --------------------------------------------------------

--
-- Table structure for table `additionalItems`
--

CREATE TABLE `additionalItems` (
  `id` int(11) NOT NULL,
  `owner_mob` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additionalItems`
--

INSERT INTO `additionalItems` (`id`, `owner_mob`, `item`, `price`) VALUES
(1, '0723942008', 'sandwitch', '20'),
(2, '0723942008', 'pizza', '56'),
(3, '0723942008', 'bugger', '1800'),
(4, '0746329405', 'ice', '20'),
(6, '0723942009', 'chees', '30'),
(7, '0723942009', 'cheese22', '22'),
(8, '0723942009', 'cheese2234', '30'),
(9, '0773900231', '20', '22');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userName` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `terms` varchar(1000) NOT NULL,
  `privacyPolicy` varchar(1000) NOT NULL,
  `refundPolicy` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `email`, `password`, `terms`, `privacyPolicy`, `refundPolicy`) VALUES
(2, 'cdcdc', 'dcdcd', 'cdccd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nnsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\nnsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nd minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n'),
(5, 'anesu', 'anesu@sixwares.net', 'dd10abc018f0939111e44f350028cdd7', 'kdanfdnjbd ', 'dhhahggdd', 'fjfjf'),
(6, 'Perseverance', 'perseverance@sixpence.co.zw', '067d8bb66ce5625e7b4c861559556069', ' \r\nmessi\r\n                        ', '                          Testing privacy policy.                            \r\n                          ', '                          Testing refund policy.                          \r\n                        '),
(7, 'aaa', 'a@g.com', 'e66508a138c48d566051d0b6d015d70c', ' aaa\r\n                                                    \r\n                        ', '                                                      \r\n               aa           ', '                                                    \r\n                        aa'),
(11, 'anesu', 'Aarong440@gmail.com', '067d8bb66ce5625e7b4c861559556069', ' 11\r\n                           \r\n                           \r\n                           \r\n                           \r\n                                                    \r\n                                                  \r\n                                                  \r\n                                                  \r\n                                                  \r\n                        ', '      11                                                                                                                                                        \r\n                                                      \r\n                                                      \r\n                                                      \r\n   11                                                   \r\n                          ', '                                                                                                                                                            \r\n      11                                            \r\n                                                  \r\n                                                  \r\n                                                  \r\n                        ');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_mobile` varchar(300) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_mode` varchar(1000) NOT NULL,
  `complementary` enum('1','2') DEFAULT NULL,
  `cancelled` enum('0','1') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `reservations` varchar(255) NOT NULL,
  `cost` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `owner_mob` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_mobile`, `place_name`, `date`, `pay_mode`, `complementary`, `cancelled`, `status`, `reservations`, `cost`, `image`, `owner_mob`) VALUES
(215, '111', 'Sarova Hotel', '2020-11-25 21:12:39', '1', '1', '', '', '11', '20', '1.jpg', '111'),
(212, '11', 'Mbui Cafe', '2020-11-23 16:48:13', '11', NULL, '0', '0', '1', '22', '1.jpg', '111'),
(211, '1234567890', 'Green Hills', '2020-11-14 10:21:43', 'PayUmoney', '1', '0', '0', '1', '700.0', 'res2.jpg', '0723942008'),
(216, 'ww', 'Sarova Hotel', '2020-11-24 14:14:22', 'casg', '1', '', '', '1', '23', '1.jpg', '2');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`) VALUES
(1, 'Farm House', 'Farm House.jpg', 'these laces give you the ultimate farm house experience'),
(2, 'Villa', 'Villa.jpg', 'this is what you\'ve been missing out on'),
(3, 'Apartment', 'Apartment.jpg', 'these are the best apartment buildings you can get in the area'),
(4, 'lounge', 'lounge.jpg', 'check out some of our best registered lounges in the region'),
(5, 'cafe', 'cafe.jpg', 'check out some of the best cafes in our assortment of places'),
(6, 'laravel', 'wagon.jpg', '11');

-- --------------------------------------------------------

--
-- Table structure for table `completedFoods`
--

CREATE TABLE `completedFoods` (
  `food_id` int(11) NOT NULL,
  `placeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodName` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservations` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userMobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodDescription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `completedFoods`
--

INSERT INTO `completedFoods` (`food_id`, `placeName`, `cost`, `foodName`, `reservations`, `image`, `userMobile`, `foodDescription`, `id`) VALUES
(114, 'Sarova Hotel', '89', 'sadza', '1', '1.jpg', '111', '.', '1'),
(115, 'Sarova Hotel', '223', 'wa', '90', '1.jpg', '111', 'qwqwqwqw', '1'),
(116, 'Sarova Hotel', '1', 'cj', '8', '5.jpg', '111', 'mnmnmnmnmn', '1'),
(117, 'Mbui Cafe', '30.46', 'best mexican cuisine', '1', 'res4.jpg', '8375898789', 'this is mexican', '115'),
(118, 'Mbui Cafe', '45.5', 'Sugarless for vegans', '1', 'res5.jpg', '8375898789', 'get the best nutritional value from this vegan cuisine while at the same time enjoy excuisite taste', '118'),
(119, 'rishi', '25.0', 'true', '9', '2540892.jpg', '8375898789', 'nice nice ', '119');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`id`, `name`, `description`, `restaurants`, `image`) VALUES
(2, 'mexican', 'check out amazing mexican cuisines', '', ''),
(3, 'spanish', '', '', ''),
(4, 'generic', '', '', ''),
(5, 'vegan', '', '', ''),
(6, 'non-vegan', '', '', ''),
(8, 'indian', '', '', ''),
(9, 'african', '', '', ''),
(10, 'carribean', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `image`) VALUES
(1, 'sauna', 'sauna.png'),
(2, 'swimming', 'swimming.png'),
(3, 'Snooker', 'Snooker.png'),
(4, 'Screen Projector', 'Screen Projector.png'),
(5, 'WIFI premises', 'WIFI premises.png'),
(6, 'Car Parking', 'Car Parking.png'),
(7, 'Bike Parking', 'Bike Parking.png'),
(8, 'massage', 'massage.png');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `favorite` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `user_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `image`, `favorite`, `name`, `description`, `user_mobile`) VALUES
(2, 'res2.jpg', '2', 'Green Hills', 'this is brief information about my cafe', '0837589879'),
(10, 'res1.jpg', '1', 'Mbui Cafe', '9.00 AM-09.00 PM Monday-Friday, 9.00 AM-5.00 PM Saturday, Closed on Sundays', '0723942008'),
(21, 'res2.jpg', '2', 'Green Hills', 'offers its patrons the finest hot and cold beverages, specializing in specialty coffees, blended teas, and other custom drinks. In addition, Green Hills will offer soft drinks, fresh-baked pastries, and other confections', '1234567890'),
(22, 'res1.jpg', '1', 'Mbui Cafe', 'will provide accessible and affordable high quality food, coffee-based products, and entertainment to the thousands of residents and hotel visitors located within a five-mile radius. In time', '8375898789');

-- --------------------------------------------------------

--
-- Table structure for table `foodBooking`
--

CREATE TABLE `foodBooking` (
  `id` int(11) NOT NULL,
  `placeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodName` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservations` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userMobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodDescription` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foodBooking`
--

INSERT INTO `foodBooking` (`id`, `placeName`, `cost`, `foodName`, `reservations`, `image`, `userMobile`, `foodDescription`) VALUES
(84, 'Mbui Cafe', '30.46', 'best mexican cuisine', '41', 'res4.jpg', '08375898789', 'this is mexican'),
(123, 'Green Hills', '20.00', 'Healthy mexican', '1', 'res1.jpg', '1234567890', 'gwhy not give this bowl of tasty mexican cuisine a shot? it\'s got just the right amount of sugars, minerals, proteins &amp; anti-oxidan'),
(124, 'Green Hills', '20.10', 'badass', '1', 'res1.jpg', '1234567890', 'this is a blend of different cuisines from our best chefs'),
(126, 'Sarova Hotel', '12', 'sadza', '5', '1.jpg', '111', 'chakalaka'),
(127, 'Sarova Hotel', '800', 'rice', '8', '1.jpg', '111', 'fried rice'),
(131, 'Mbui Cafe', '30.46', 'best mexican cuisine', '1', 'res4.jpg', '09871700863', 'this is mexican'),
(132, 'Mbui Cafe', '45.5', 'Sugarless for vegans', '1', 'res5.jpg', '09871700863', 'get the best nutritional value from this vegan cuisine while at the same time enjoy excuisite taste'),
(133, 'Mbui Cafe', '45.5', 'Sugarless for vegans', '1', 'res5.jpg', '09871700863', 'get the best nutritional value from this vegan cuisine while at the same time enjoy excuisite taste');

-- --------------------------------------------------------

--
-- Table structure for table `foodCategories`
--

CREATE TABLE `foodCategories` (
  `category_id` int(11) NOT NULL,
  `type` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foodCategories`
--

INSERT INTO `foodCategories` (`category_id`, `type`, `category_image`) VALUES
(1, 'Vegetables', 'Vegetables.png'),
(2, 'Grains', 'Grains.png'),
(3, 'Sandwitches', 'Sandwitches.png'),
(4, 'Fruits', 'Fruits.png'),
(5, 'Proteins', 'Proteins.png');

-- --------------------------------------------------------

--
-- Table structure for table `foodHelp`
--

CREATE TABLE `foodHelp` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodHelp`
--

INSERT INTO `foodHelp` (`id`, `question`, `answer`) VALUES
(2, 'What payment modes are accepted?', 'we accept cash payments mostly but this is also dependent on the place'),
(3, 'Testing Question', 'Testing Anwers'),
(4, 'Question1', 'Answer1');

-- --------------------------------------------------------

--
-- Table structure for table `foodReviews`
--

CREATE TABLE `foodReviews` (
  `id` int(11) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `user_mobile` varchar(1000) NOT NULL,
  `review` varchar(1000) DEFAULT NULL,
  `rating` varchar(1000) NOT NULL,
  `user_img` varchar(1000) NOT NULL,
  `food_name` varchar(1000) NOT NULL,
  `user_about` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodReviews`
--

INSERT INTO `foodReviews` (`id`, `user_name`, `user_mobile`, `review`, `rating`, `user_img`, `food_name`, `user_about`) VALUES
(13, 'Peter Mwangi', '0723942008', 'it\'s definitely not everyday that one gets a vegan meal this delicois...i\'d go back for it on any day and recommed it to anyone who\'s all about healthy living', '3', 'image_picker4039707807826931921.jpg', 'Sugarless for vegans', 'I love trying out new things'),
(14, 'Peter Mwangi', '0723942008', 'as the name suggests, this is indeed a healthy mexican cuisine and worth every penny spent', '4', 'image_picker4039707807826931921.jpg', 'Healthy mexican', 'I love trying out new things');

-- --------------------------------------------------------

--
-- Table structure for table `image_list`
--

CREATE TABLE `image_list` (
  `image_id` int(11) NOT NULL,
  `cafe_name` varchar(255) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `image_4` varchar(255) NOT NULL,
  `image_5` varchar(255) NOT NULL,
  `image_6` varchar(255) NOT NULL,
  `image_7` varchar(255) NOT NULL,
  `image_8` varchar(255) NOT NULL,
  `image_9` varchar(255) NOT NULL,
  `image_10` varchar(255) NOT NULL,
  `image_11` varchar(255) NOT NULL,
  `image_12` varchar(255) NOT NULL,
  `image_13` varchar(255) NOT NULL,
  `image_14` varchar(255) NOT NULL,
  `image_15` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_list`
--

INSERT INTO `image_list` (`image_id`, `cafe_name`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `image_7`, `image_8`, `image_9`, `image_10`, `image_11`, `image_12`, `image_13`, `image_14`, `image_15`) VALUES
(1, 'Mbui Cafe', 'res1.jpg', 'res1.jpg', '', 'res1.jpg', '', '', 'res1.jpg', '', 'res2.jpg', '', '', '', '', '', ''),
(2, 'Green Hills', 'res2.jpg', 'res2.jpg', '', 'res2.jpg', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'rishi', 'res3.jpg', 'res3.jpg', 'download.jpg', 'res3.jpg', 'res2.jpg', '', 'res3.jpg', '', 'res3.jpg', 'cafe2.jpg', '', '', '', '', ''),
(4, 'Inter-Continetal', 'res4.jpg', 'res4.jpg', '', 'res4.jpg', '', '', '', 'res5.jpg', '', '', '', '', '', '', ''),
(5, 'Green Stadium', 'res5.jpg', 'res5.jpg', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Tajs', 'res5.jpg', 'res4.jpg', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Club london', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'harare', 'download.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'uplands', 'dc8f71530cd2a6d1c5c4c5ebfd3a45c2.jpg', 'eba99387d59404072c322619f993dc96.jpg', '454a96bd55eb9253caf11c998091a09d.jpg', 'a35bcb3f376b9db20fbd7f85e4d887e1.jpg', '78b3eef25f39d38349a2a61db3e85571.jpg', 'b07d56366d396e9327d3aa7950819e34.jpg', '1f2c1a1ab863cfcc0bc6e0b0f0fa92a8.jpg', '8a90e0f6d94cb2128b400580bee62140.jpg', '6766e4a2426ae77350daeca7af4a4aa3.jpg', 'ce38ea7677e9e4489a118c3c9101e501.jpg', '1db3e4c8947e0e4b94c85e82f6bc56a7.jpg', '23abdf2f82684f86e43463794cf77ab5.jpg', '0bbcc58b9df5adb761decb243e8b2cfb.jpg', '625fc56f723b375db4ffde689f2663c9.jpg', '9039f35bec5101575a0fd08847921143.jpg'),
(11, 'Ranveer villa ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'uplands22', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '123446677', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'West delhi'),
(2, 'East delhi'),
(3, 'North delhi'),
(4, 'South delhi'),
(5, 'Central delhi'),
(6, 'vadodora');

-- --------------------------------------------------------

--
-- Table structure for table `miscHelp`
--

CREATE TABLE `miscHelp` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `miscHelp`
--

INSERT INTO `miscHelp` (`id`, `question`, `answer`) VALUES
(2, 'this is the second misc question', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore '),
(3, 'This is the third misc question', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore '),
(4, 'this is the fourth misc question', 'the questions are input directly from the database and can be changed at will to be displayed to the app userLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore '),
(5, 'sdfsdf', 'sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `notification` varchar(1000) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `user_mobile` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `dateCreated`, `user_mobile`) VALUES
(1, 'New order created at Green Hills', '2020-11-12 09:36:51', '1234567890'),
(2, 'Order id #92 at Green Hills has been canceled', '2020-11-12 09:37:04', '1234567890'),
(3, 'Order id #87 at Green Stadium has been canceled', '2020-11-12 10:21:01', '8375898789'),
(4, 'New order created at Green Hills', '2020-11-12 12:38:10', '1234567890'),
(5, 'Order id #93 at Green Hills has been canceled', '2020-11-12 12:38:29', '1234567890'),
(6, 'Order id #86 at Mbui Cafe has been canceled', '2020-11-12 14:05:25', '8375898789'),
(7, 'New order created at Green Hills', '2020-11-13 06:48:49', '1234567890'),
(8, 'New order created at Mbui Cafe', '2020-11-13 12:35:28', '8375898789'),
(9, 'New order created at Mbui Cafe', '2020-11-13 15:25:15', '1234567890'),
(10, 'New order created at Mbui Cafe', '2020-11-13 16:09:54', '8375898789'),
(11, 'New order created at Mbui Cafe', '2020-11-13 16:10:57', '8375898789'),
(12, 'New order created at Mbui Cafe', '2020-11-13 16:11:00', '8375898789'),
(13, 'New order created at Mbui Cafe', '2020-11-13 16:11:00', '8375898789'),
(14, 'New order created at Inter-Continetal', '2020-11-13 16:12:26', '8375898789'),
(15, 'New order created at Green Hills', '2020-11-13 16:23:35', '1234567890'),
(16, 'New order created at Green Hills', '2020-11-13 16:24:49', '1234567890'),
(17, 'New order created at Green Hills', '2020-11-13 16:26:13', '1234567890'),
(18, 'Order status changed', '2020-11-13 16:26:33', '1234567890'),
(19, 'New order created at Green Hills', '2020-11-13 16:40:00', '1234567890'),
(20, 'New order created at Green Hills', '2020-11-13 16:42:17', '1234567890'),
(21, 'New order created at Green Hills', '2020-11-14 01:59:10', '1234567890'),
(22, 'Order status changed', '2020-11-14 02:08:24', '1234567890'),
(23, 'New order created at Green Hills', '2020-11-14 02:09:39', '1234567890'),
(24, 'Order id #109 at Green Hills has been canceled', '2020-11-14 02:11:36', '1234567890'),
(25, 'New order created at Mbui Cafe', '2020-11-14 02:23:27', '8375898789'),
(26, 'New order created at Inter-Continetal', '2020-11-14 02:25:29', '8375898789'),
(27, 'New order created at Mbui Cafe', '2020-11-14 02:26:00', '8375898789'),
(28, 'New order created at Mbui Cafe', '2020-12-03 16:41:50', '8375898789'),
(29, 'New order created at Club london', '2020-12-03 16:57:25', '8375898789'),
(30, 'Order id #116 at Club london has been canceled', '2020-12-03 16:58:05', '8375898789'),
(31, 'Order id #116 at Club london has been canceled', '2020-12-03 16:58:07', '8375898789'),
(32, 'Order id #116 at Club london has been canceled', '2020-12-03 16:58:12', '8375898789'),
(33, 'New order created at Inter-Continetal', '2020-12-03 16:59:46', '8375898789'),
(34, 'New order created at Mbui Cafe', '2020-12-03 17:01:03', '8375898789'),
(35, 'Order id #118 at Mbui Cafe has been canceled', '2020-12-03 17:01:32', '8375898789'),
(36, 'New order created at rishi', '2020-12-03 17:03:29', '8375898789');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition`
--

CREATE TABLE `nutrition` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nutrition`
--

INSERT INTO `nutrition` (`id`, `name`, `quantity`, `food`, `restaurant`) VALUES
(1, 'Sugar', '100', 'Healthy mexican', 'Green Hills'),
(2, 'Protein', '20', 'Healthy mexican', 'Green Hills'),
(3, 'Fat', '10', 'Low Sugar spanish', 'Green Hills'),
(4, 'sugar2', '500', 'african', 'Sarova Hotel'),
(6, 'ww', 'ww', 'w', 'uplands'),
(7, 'Rishi', '10', 'chilli momos ', 'Ranveer villa '),
(8, 'Testing', '3', 'Testing', 'rishi');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total` varchar(1000) NOT NULL,
  `status` enum('completed','canceled','order received') NOT NULL,
  `foodTotal` varchar(255) NOT NULL,
  `reservationCost` varchar(1000) NOT NULL,
  `dateCreated` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `reservations` varchar(1000) NOT NULL,
  `payMode` varchar(1000) NOT NULL,
  `user_mobile` varchar(1000) NOT NULL,
  `placeName` varchar(1000) NOT NULL,
  `placeImage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `status`, `foodTotal`, `reservationCost`, `dateCreated`, `reservations`, `payMode`, `user_mobile`, `placeName`, `placeImage`) VALUES
(103, '700.0', 'order received', '0.0', '1', '2020-11-13 16:23:35.642646', '700.0', 'Cash', '1234567890', 'Green Hills', 'res2.jpg'),
(104, '700.0', 'order received', '0.0', '1', '2020-11-13 16:24:49.644382', '700.0', 'Cash', '1234567890', 'Green Hills', 'res2.jpg'),
(105, '2808.54', 'canceled', '8.54', '2', '2020-11-13 16:26:13.268060', '2800.0', 'Cash', '1234567890', 'Green Hills', 'res2.jpg'),
(106, '720.0', 'order received', '20.0', '1', '2020-11-13 16:39:59.871074', '700.0', 'Cash', '1234567890', 'Green Hills', 'res2.jpg'),
(107, '700.0', 'order received', '0.0', '1', '2020-11-13 16:42:17.016780', '700.0', 'instaMojo', '1234567890', 'Green Hills', 'res2.jpg'),
(108, '720.0', 'canceled', '20.0', '1', '2020-11-14 01:59:10.336767', '700.0', 'Cash', '1234567890', 'Green Hills', 'res2.jpg'),
(109, '708.54', 'canceled', '8.54', '1', '2020-11-14 02:09:39.068751', '700.0', 'Cash', '1234567890', 'Green Hills', 'res2.jpg'),
(110, '500.0', 'order received', '0.0', '1', '2020-11-14 02:23:26.893409', '500.0', 'Cash Payment', '8375898789', 'Mbui Cafe', 'res1.jpg'),
(111, '1500.0', 'order received', '0.0', '3', '2020-11-14 02:25:59.728420', '1500.0', 'Cash', '8375898789', 'Mbui Cafe', 'res1.jpg'),
(113, '3', 'order received', '2', '23', '2020-11-23 16:15:38.000000', '2', 'swipe', '111', 'Sarova Hotel', '1.jpg'),
(114, '100', 'completed', '1', '1', '2020-11-16 16:15:38.000000', '5', 'ecocash', '11', 'Sarova Hotel', '1.jpg'),
(115, '1100.46', 'order received', '30.46', '1', '2020-12-03 16:41:50.711366', '1070.0', 'Online Payment', '8375898789', 'Mbui Cafe', 'res1.jpg'),
(116, '1000.0', 'canceled', '0.0', '5', '2020-12-03 16:57:25.417515', '1000.0', 'Cash', '8375898789', 'Club london', 'cover.jpg'),
(117, '1000.0', 'order received', '0.0', '5', '2020-12-03 16:59:46.713009', '1000.0', 'Cash', '8375898789', 'Inter-Continetal', 'res4.jpg'),
(118, '1135.5', 'canceled', '45.5', '1', '2020-12-03 17:01:03.247507', '1090.0', 'Cash', '8375898789', 'Mbui Cafe', 'res1.jpg'),
(119, '4457.0', 'order received', '225.0', '1', '2020-12-03 17:03:28.821015', '0.0', 'Cash', '8375898789', 'rishi', 'cafe512512.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `placeDetails`
--

CREATE TABLE `placeDetails` (
  `cafe_id` int(11) NOT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `owner_mob` varchar(30) DEFAULT NULL,
  `owner_email` varchar(255) DEFAULT NULL,
  `owner_pass` varchar(255) DEFAULT NULL,
  `cafe_name` varchar(255) DEFAULT NULL,
  `owner_upi` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `service_area` int(11) DEFAULT NULL,
  `facilities` varchar(255) DEFAULT NULL,
  `primary_image` varchar(255) DEFAULT NULL,
  `secondary` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `cuisine` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `information` varchar(1000) NOT NULL,
  `full_reservation` varchar(1000) NOT NULL,
  `individual_reservation` varchar(1000) NOT NULL,
  `capacity` varchar(1000) NOT NULL,
  `trending` varchar(1000) NOT NULL,
  `popular` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `photoShoot` varchar(1000) NOT NULL,
  `cake` varchar(1000) NOT NULL,
  `apiKey` varchar(1000) NOT NULL,
  `authToken` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placeDetails`
--

INSERT INTO `placeDetails` (`cafe_id`, `owner_name`, `owner_mob`, `owner_email`, `owner_pass`, `cafe_name`, `owner_upi`, `location`, `cost`, `description`, `service_area`, `facilities`, `primary_image`, `secondary`, `status`, `cuisine`, `longitude`, `latitude`, `category`, `information`, `full_reservation`, `individual_reservation`, `capacity`, `trending`, `popular`, `address`, `photoShoot`, `cake`, `apiKey`, `authToken`) VALUES
(1, 'patshangala', '0746329405', 'patrickgithinji5@gmail.com', '$2y$10$gywmvaRnMc2z3hlhQiU1VOmz/XbwZ4VFW2wGURcdY82Ad7AdQKVqO', 'Mbui Cafe', 'payments', 'West delhi', 250, '9.00 AM-09.00 PM Monday-Friday, 9.00 AM-5.00 PM Saturday, Closed on Sundays', 0, 'sauna, swimming, WIFI permises', 'res1.jpg', 'secondary.jpg', 1, 'vegan, indian, mexican, carribean', '36.948107', '-0.440255', 'Farm House', 'will provide accessible and affordable high quality food, coffee-based products, and entertainment to the thousands of residents and hotel visitors located within a five-mile radius. In time', '8000', '500', '40', 'false', 'false', '1445, Kenyatta Avenue, Nakuru', '250', '300', '86d8b5a445e00b1d806818136bfc441e', 'b37c73fd16dc05aa5f70ab062404844f'),
(2, 'Sir Moh', '0723942008', 'patiyang6@gmail@gmail.com', '$2y$10$TVyBgamFnQHODfjo/3C91.I6Xqgwokd6DpJLlfGd08SBfi.qJuc5W', 'Green Hills', 'PayUmoney1', 'East delhi', 800, '9.00 AM-06.00 PM Monday-Friday, 8.00 AM-6.00 PM Saturday, 9.00 AM-5.00 PM Sundays', 0, 'Snooker, Screen Projector, WIFI permises, Car Parking', 'res2.jpg', 'secondary.jpg', 1, 'generic, spanish, chineese, african', '36.822670', '-1.279865', 'cafe', 'offers its patrons the finest hot and cold beverages, specializing in specialty coffees, blended teas, and other custom drinks. In addition, Green Hills will offer soft drinks, fresh-baked pastries, and other confections', '6000', '700', '80', 'false', 'false', '1358  Kimathi Way, Nyeri', '900', '250', '86d8b5a445e00b1d806818136bfc441e', 'b37c73fd16dc05aa5f70ab062404844f'),
(3, 'Patrick Mwangi', '0723942009', 'test@gmail.com', '$2y$10$eMyxzLj2s//RVhSMSoSNYenDJTiGhggp0PnJxvxXg2sA3WRYYtBLe', 'rishi', 'PayUmoney2', 'East delhi', 800, '6.00 AM-10.00 PM Monday-Friday, 10.00 AM-5.00 PM Saturday, Closed on Sundays', 15, 'sauna, Screen Projector, WIFI permises, swimming, massage', 'cafe512512.jpg', 'download.jpg', 1, 'spanish, mexican, vegan, carribean', '36.071477', '-0.287059', 'Villa', 'Sarova Hotel has been around for quite a while and we make it our top priority to see that all our customers are 100% satisfied with our services', '6700', '350', '70', 'false', 'false', '1845 Kamukunji Street Eldoret', '600', '170', '86d8b5a445e00b1d806818136bfc441e', 'b37c73fd16dc05aa5f70ab062404844f'),
(4, 'James Mwirigi', '0723942089', 'test1@gmail.com', '$2y$10$HK9UUuZsMObyazox5PH2..hT4UhSC1CKXV3BGqIcSXFjlKRR1FXXm', 'Inter-Continetal', 'PayUmoney3', 'South delhi', 450, '9.00 AM-09.00 PM Monday-Friday, 9.00 AM-5.00 PM Saturday & Sunday,', 0, 'sauna, Screen Projector, WIFI permises, Car Parking, Bike Parking, gym', 'res4.jpg', 'secondary.jpg', 5, 'indian, mexican, generic, vegan', '35.267238', '0.518279', 'lounge', 'You need it, we\'ve got it...if you are looking to get the biggest bang for your buck, inter-continental is definitely the place for you', '4000', '200', '60', 'false', 'false', '6005 Kanu Lane Nairobi', '750', '230', '86d8b5a445e00b1d806818136bfc441e', 'b37c73fd16dc05aa5f70ab062404844f'),
(5, 'Deborah Cherop', '0723942079', 'test2@gmail.com', '$2y$10$Kl4Nc9KSVfeiqND44MExVOA8.yxLPxuK.ICG6Vqo2kWO0JwTOq46u', 'Green Stadium', 'PayUmoney4', 'Central delhi', 3400, '9.00 AM-09.00 PM Monday-Friday, 9.00 AM-5.00 PM Saturday, Closed on Sundays', 0, 'sauna, massage, WIFI permises, Car Parking, Bike Parking', 'res5.jpg', 'secondary.jpg', 1, 'spanish, mexican, vegan, non-vegan, african', '35.282775', '-0.362868', 'Apartment', 'Since we were set up...Green Stadium has always prioritized giving the best services, meals and facilities to our clients and that is definitely what you ought to look forward to in your time spent over here', '2000', '80', '500', 'false', 'false', '13991 Embakasi Road Nyeri', '980', '500', '86d8b5a445e00b1d806818136bfc441e', 'b37c73fd16dc05aa5f70ab062404844f'),
(8, 'Tawanda Churchill Rundu', '0783041736', 'test@gmail.com', '$2y$10$HTlUly4nw8mv8Pr5NB/9KenwsRL6o2tDCmCDeafxqnxrG7VaPKEjS', 'Tajs', 'UPI', '5', 500, 'jhvjh\r\n								', 0, 'Bungie', 'res5.jpg', 'secondary.jpg', 1, 'jk', '1', '1', '5', '1\r\n', '1', '5', '25', 'false', 'false', '', '', '', '', ''),
(9, '1', '1', '1', '$2y$10$sESfAWL.GYrNl.4yNU.ulOSSUF0Uw8UCwPGUdBz0IwN.2ulQ74YYW', 'Taj', '1', '1', 1, '1', 1, '1', '1', '1', 3, '1', '1', '1', '1', '1', '1', '1', '1', 'false', 'false', '1', '1', '1', '', ''),
(16, 'Rishie', '8375898789', 'rkitcommpany@gmail.com', '$2y$10$9Zm2jPFJQ6z4yNviFY83IOJjeIYHDe4zjNbwqdhyad/NFS9OysO6C', 'Club london', 'rishiekashyap@okicici', '4', 400, 'Hello', 0, 'Snooker', 'cover.jpg', '20200601_225232_0F5539D8-F9D7-427E-9DAB-33FAD883C47B.jpeg', 0, 'Veg non veg ', '192', '152', '5', 'Left to right', '20000', '200', '100', 'false', 'false', '', '', '', '', ''),
(20, 'Ranveer ', '8882195695', 'ranveerfilms.rf@gmail.com', '$2y$10$vteHnuV1DwMdgmhSubtXk.Dpkj.k95NerSHJppVJjNzxZaLophVp2', 'Ranveer villa ', 'ranveerfilms.rf@oksbi', 'South delhi', 500, 'monday to sunday 24x7 open \r\n								', 0, 'summing pool , wifi, all parking , dance area , snooker , smoking zone ', '54b9fa2d0a21f914c2d8aaf3df06a7c1.jpg', '7930a6995e8db3716627878b8d866f54.jpg', 1, 'Veg , non Veg , Mexican , Chinese, Italian ', '12', '15', 'Villa', 'On 4 lush hectares in a commercial area, this polished hotel is 2 km from Chhattarpur subway station, 3 km from Mehrauli Archaeological Park and 4 km from the 12th-century Qutb Minar tower.\r\nWarmly decorated rooms feature free Wi-Fi, flat-screen TVs, safes and minibars. Upgraded rooms add sitting areas. Room service is available 24/7.\r\nThere are 4 casual restaurants, including a 24-hour eatery, as well as a train-themed terrace. Other amenities include an outdoor pool with a swim-up bar and a sundeck, in addition to a garden and a kids\' play area. Parking is available.\r\n', '20000', '500', '40', 'false', 'false', '', '', '', '', ''),
(19, 'aaron anesu gondoharishaye', '0773900231', 'aaronanesugondo@gmail.com', '$2y$10$IBBrumEcNqUqAokGCnEKVe0KPvWfO.jkMdvI/vHy1f8YksGmEU.Ly', 'uplands', '1w', 'North delhi', 1234, 'dhhdhsbhdbd hbdhbad ydb					', 2, '2', 'f1b78fecabf8cb2ff69c67b376559853.jpg', '2f88384971ca1f662523ddf1fed8da7d.jpg', 1, 'african dish', '22', '22', 'Apartment', 'idiffkni uhuguyfdg augb ud', '2', '2123', '1', 'false', 'false', 'w', 'w', 'w', '', ''),
(22, 'Anesu Gondo', '+263773900231', 'Aarong440@gmail.com', '', '123446677', '1', 'North delhi', 1, '1', 1, '1', '2fa91577702b4b478e5c2e2d8b86d6e6.jpg', 'a889574c68610b3916edbded2a47b604.jpg', 1, '1', '1', '1', 'lounge', '1', '1', '1', '1', 'true', 'false', '1', '1', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `placeMenu`
--

CREATE TABLE `placeMenu` (
  `menu_id` int(11) NOT NULL,
  `owner_mob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuisine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantityAvailable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placeMenu`
--

INSERT INTO `placeMenu` (`menu_id`, `owner_mob`, `cuisine`, `food_Image`, `food_description`, `featured`, `food_name`, `type`, `price`, `ingredients`, `quantityAvailable`) VALUES
(1, '0723942008', 'mexican', 'res1.jpg', 'gwhy not give this bowl of tasty mexican cuisine a shot? it\'s got just the right amount of sugars, minerals, proteins & anti-oxidan', 'true', 'Healthy mexican', 'Grains', '20.00', 'beans, wheat,vegetable oil', '100'),
(2, '0723942008', 'spanish', 'res2.jpg', 'it is not in vain that this is deemed as one of the tastiest and healthiest. In just a single plate, you\'ll be able to get an unimaginable amount of nutritional value and to add icing on the cake, the taste is not overlooked whatsoever which is even more the reason you should give this a shot', 'false', 'Low Sugar spanish', 'Grains', '8.35', 'black barley, red pepper, paprika', '80'),
(3, '0746329405', 'mexican', 'res4.jpg', 'this is mexican', 'true', 'best mexican cuisine', 'Vegetables', '30.46', 'brocolli, cabbages, spinach', '40'),
(4, '0746329405', 'vegan', 'res5.jpg', 'get the best nutritional value from this vegan cuisine while at the same time enjoy excuisite taste', 'true', 'Sugarless for vegans', 'Grains', '45.5', 'millet, buckwheat, barley', '300'),
(6, '0723942008', 'generic', 'res1.jpg', 'this is a blend of different cuisines from our best chefs', 'true', 'badass', 'Grains', '20.10', 'beans, wheat,vegetable oil', '45'),
(7, '0723942008', 'spanish', 'res1.jpg', 'if there was one word to descrive this, it\'s simply amazing.  this plate of a blend of delicacies will definitely be worth your reservation. give it a try', 'false', 'badass', 'Vegetables', '8.54', 'paprika, guacamole', '50'),
(8, '2', '2', NULL, '2', 'false', '2', '2', '2', '2', '2'),
(12, '0723942009', 'Nice', '2540892.jpg', 'nice nice ', '', 'true', 'hshshs ', '25 ', 'hjtyu ', '24');

-- --------------------------------------------------------

--
-- Table structure for table `placeReviews`
--

CREATE TABLE `placeReviews` (
  `id` int(11) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `user_mobile` varchar(1000) NOT NULL,
  `review` varchar(1000) DEFAULT NULL,
  `rating` varchar(1000) NOT NULL,
  `user_img` varchar(1000) NOT NULL,
  `place_name` varchar(1000) NOT NULL,
  `user_about` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placeReviews`
--

INSERT INTO `placeReviews` (`id`, `user_name`, `user_mobile`, `review`, `rating`, `user_img`, `place_name`, `user_about`) VALUES
(14, 'Peter Mwangi', '0723942008', 'Mbui cafe is simply amazing and one of the best there s...I am definitely paying a visit to this place yet again', '1', 'image_picker4039707807826931921.jpg', 'Mbui Cafe', 'I love trying out new things'),
(15, 'Peter Mwangi', '0723942008', 'Mbui cafe is simply amazing and one of the best there s...I am definitely paying a visit to this place yet again', '1', 'image_picker4039707807826931921.jpg', 'Mbui Cafe', 'I love trying out new things'),
(16, 'Peter Mwangi', '0723942008', 'It\'s an mazing place to be...the customer care is awesome but i\'ll take one star away for the slight delay in serving the meals. But, don\'t get me wrong, the meals are delicious as hell', '4', 'image_picker4039707807826931921.jpg', 'Green Hills', 'I love trying out new things'),
(17, 'Peter Mwangi', '0723942008', 'It\'s an amazing place and definitely worth trying out...I\'m definitely going to be a repeat customer at Mbui Cafe', '5', 'image_picker4039707807826931921.jpg', 'Mbui Cafe', 'I love trying out new things'),
(18, 'Peter Mwangi', '0723942008', 'It\'s an amazing place and definitely worth trying out...I\'m definitely going to be a repeat customer at Mbui Cafe', '5', 'image_picker4039707807826931921.jpg', 'Mbui Cafe', 'I love trying out new things');

-- --------------------------------------------------------

--
-- Table structure for table `placesHelp`
--

CREATE TABLE `placesHelp` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placesHelp`
--

INSERT INTO `placesHelp` (`id`, `question`, `answer`) VALUES
(2, 'this is the second places question', 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(3, 'this is the third places question', 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(4, 'this is the fourth places question', 'minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cafe_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_quant` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `set_active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cafe_id`, `product_name`, `product_price`, `product_quant`, `product_image`, `set_active`) VALUES
(6, 3, 'a', '8', 5, 'bmw.jpg', 1),
(7, 3, 'moringa', '80', 500, 'Parallel.jpg', 1),
(8, 3, 'a', '8', 5, 'bmw.jpg', 2),
(5, 3, 'Sadza', '250', 5, '2540892.jpg', 1),
(9, 19, 'ee', 'eee', 0, '5b245d02b2f7fa065c38fbe3ad3c896a.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_mobile` int(11) NOT NULL,
  `cafe_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `submitted` datetime NOT NULL DEFAULT current_timestamp(),
  `user_image` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `review` varchar(1000) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicesHelp`
--

CREATE TABLE `servicesHelp` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicesHelp`
--

INSERT INTO `servicesHelp` (`id`, `question`, `answer`) VALUES
(1, 'first services question', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor'),
(2, 'second services question', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(4, 'fgh', 'fgh');

-- --------------------------------------------------------

--
-- Table structure for table `service_area`
--

CREATE TABLE `service_area` (
  `id` int(11) NOT NULL,
  `area` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(15) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `cafe_id` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_id`, `cafe_id`, `amount`, `date`) VALUES
('', '30', '3', 700, '2020-11-18'),
('2', '30', '3', 20, '2020-11-18'),
('3', '30', '3', 700, '2020-11-18'),
('4', '30', '3', 1000, '2020-11-18 04:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(300) DEFAULT NULL,
  `user_mobile` varchar(300) DEFAULT NULL,
  `user_email` varchar(300) DEFAULT NULL,
  `user_address` varchar(1000) NOT NULL,
  `user_img` varchar(1000) NOT NULL,
  `user_status` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `user_about` varchar(1000) NOT NULL,
  `user_addon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_mobile`, `user_email`, `user_address`, `user_img`, `user_status`, `password`, `user_about`, `user_addon`) VALUES
(30, 'Patrick Mwangi', '254723942008', 'patiyang5@gmail.com', '104, Nakuru', 'image_picker1851501954376250646.jpg', '0', '$2y$10$BLvxMOx5ISHYrSqfmKmiqeLrdLAFqY6.MolU4DZ9ffBU8ulTHXBRy', 'this is the best me', '2020-11-04 08:33:02'),
(32, 'patshang', '254753323001', 'patshang@gmail.com', '188 Nyeri', '', '0', '$2y$10$ZclOLLhcqNIvJSO0CKjJMe/i6fCdMc/jdPqD0mvAV59AmtKXU./a.', 'I am awesome', '2020-11-04 10:21:34'),
(35, NULL, '0723942008', NULL, '', '', '0', '$2y$10$Os1ntwIwiCfmxAS9GqkwcOqvCWl6jWDEDtIbNSYreNDw6uxp4SROS', '', '2020-11-04 12:18:00'),
(37, NULL, '0753323001', NULL, '', '', '0', '$2y$10$XstOaZpZFLTWeUXKU0tZZeQ9DRpuaxtfrzipHirmW9thiTB4VYQbi', '', '2020-11-04 12:49:36'),
(39, NULL, '0700803354', NULL, '', '', '0', '$2y$10$tIvrXO5Z/l8DUBzYPgEhW.WobKMDRW4kT/9gQgsKTlaIIdbNR/w9C', '', '2020-11-04 14:07:30'),
(42, NULL, '0746320405', NULL, '', '', '0', '$2y$10$Yqzn0VFFO1X6GYysd.xjIufF2j1PPp12GbiYwRKFRrjRVPq8U54KO', '', '2020-11-04 21:55:42'),
(43, NULL, '746320405', NULL, '', '', '0', '$2y$10$UPhXt/0AixZ9m62ESI3MNeIk.lwoFZA4.LsvAGIiRq8QpHF8PoSu.', '', '2020-11-04 21:58:28'),
(44, 'rishie', '8375898789', 'rkitcommpany@gmail.com ', 'new delhi', 'image_picker6228405617155667375.jpg', '0', '$2y$10$5pprHlSxM9aEkNZPRNoTQOrwr0i3pSZSi.w2FSZy66zjHPj4VH.cG', 'me', '2020-11-05 01:07:55'),
(46, NULL, '09871700863', NULL, '', '', '0', '$2y$10$bMRJB4BrIlGqcGH9c9VyUerbzkzPsEk0ikyLdkCHNLaP3IAR4FyVe', '', '2020-11-05 11:46:46'),
(47, 'Petero', '723942008', 'petero@gmail.com', '1245', '', '0', '$2y$10$1QkooZeWpEil0kZ9Tt2dz.FgM00.fatxJFev5Fck0w3VZJVXaLGti', 'cdcdc', '2020-11-08 09:47:57'),
(51, NULL, '792028744', NULL, '', '', '0', '$2y$10$fGSX5z3AbqtAWs/gG4rH/.AkUe/zY5NqbbxNow/TLG7K0zbfMbDMK', '', '2020-11-09 00:34:12'),
(55, 'Ben', '1234567890', 'ben@test.com', '104', '', '0', '$2y$10$Nzl5/ETGmd5Il.5T51XbAOjHv24.X64CZk6IqC/Tc9K6Fplyt9vGW', 'about', '2020-11-09 01:01:06'),
(59, NULL, '8527377121', NULL, '', '', '0', '$2y$10$hX7c9glC38ywXygTr/Il7.A9GU3CIu20uC8n18kGOXeAfvvjN9Qry', '', '2020-11-10 07:55:53'),
(63, NULL, '7982200778', NULL, '', '', '0', '$2y$10$O8B/02MNFNn9EsiGGbKYNuHgVB90o/FF0R7D28bnhCFFss5oVpnNG', '', '2020-11-11 01:57:07'),
(79, NULL, '8920566137', NULL, '', '', '0', '$2y$10$EfnI/KXKp1xHNrlGpEKJV.pKprRJq5ZU80R2.SNRnZVsUN2DLy3Iu', '', '2020-11-19 10:12:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additionalFacility`
--
ALTER TABLE `additionalFacility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additionalItems`
--
ALTER TABLE `additionalItems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completedFoods`
--
ALTER TABLE `completedFoods`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodBooking`
--
ALTER TABLE `foodBooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodCategories`
--
ALTER TABLE `foodCategories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `foodHelp`
--
ALTER TABLE `foodHelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodReviews`
--
ALTER TABLE `foodReviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_list`
--
ALTER TABLE `image_list`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `cafe_owner` (`cafe_name`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscHelp`
--
ALTER TABLE `miscHelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition`
--
ALTER TABLE `nutrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placeDetails`
--
ALTER TABLE `placeDetails`
  ADD PRIMARY KEY (`cafe_id`),
  ADD UNIQUE KEY `owner_name` (`owner_name`,`owner_mob`,`owner_email`,`owner_upi`),
  ADD UNIQUE KEY `cafe_name` (`cafe_name`);

--
-- Indexes for table `placeMenu`
--
ALTER TABLE `placeMenu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `placeReviews`
--
ALTER TABLE `placeReviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placesHelp`
--
ALTER TABLE `placesHelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicesHelp`
--
ALTER TABLE `servicesHelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_area`
--
ALTER TABLE `service_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_mobile` (`user_mobile`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additionalFacility`
--
ALTER TABLE `additionalFacility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `additionalItems`
--
ALTER TABLE `additionalItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `completedFoods`
--
ALTER TABLE `completedFoods`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `cuisine`
--
ALTER TABLE `cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `foodBooking`
--
ALTER TABLE `foodBooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `foodCategories`
--
ALTER TABLE `foodCategories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foodHelp`
--
ALTER TABLE `foodHelp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foodReviews`
--
ALTER TABLE `foodReviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `image_list`
--
ALTER TABLE `image_list`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `miscHelp`
--
ALTER TABLE `miscHelp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `nutrition`
--
ALTER TABLE `nutrition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `placeDetails`
--
ALTER TABLE `placeDetails`
  MODIFY `cafe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `placeMenu`
--
ALTER TABLE `placeMenu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `placeReviews`
--
ALTER TABLE `placeReviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `placesHelp`
--
ALTER TABLE `placesHelp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicesHelp`
--
ALTER TABLE `servicesHelp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
