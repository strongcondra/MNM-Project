-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2020 at 06:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `image` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(5, 'cafe', 'cafe.jpg', 'check out some of the best cafes in our assortment of places');

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
(1, 'chineese', 'these are the best chineese cuisines', '', ''),
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
(3, 'Sarova Hotel', 'res3.jpg', 'res3.jpg', '', 'res3.jpg', 'res2.jpg', '', 'res3.jpg', '', 'res3.jpg', '', '', '', '', '', ''),
(4, 'Inter-Continetal', 'res4.jpg', 'res4.jpg', '', 'res4.jpg', '', '', '', 'res5.jpg', '', '', '', '', '', '', ''),
(5, 'Green Stadium', 'res5.jpg', 'res5.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
(1, 'west_delhi'),
(2, 'east_delhi'),
(3, 'north_delhi'),
(4, 'south_delhi'),
(5, 'north_delhi');

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
  `trending` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placeDetails`
--

INSERT INTO `placeDetails` (`cafe_id`, `owner_name`, `owner_mob`, `owner_email`, `owner_pass`, `cafe_name`, `owner_upi`, `location`, `cost`, `description`, `service_area`, `facilities`, `primary_image`, `secondary`, `status`, `cuisine`, `longitude`, `latitude`, `category`, `information`, `full_reservation`, `individual_reservation`, `capacity`, `trending`) VALUES
(1, 'patshangala', '0746329405', 'patrickgithinji5@gmail.com', '$2y$10$gywmvaRnMc2z3hlhQiU1VOmz/XbwZ4VFW2wGURcdY82Ad7AdQKVqO', 'Mbui Cafe', 'payments', 'west_delhi', 250, 'this is brief information about my cafe', 0, 'sauna, swimming pool, wi-fi', 'res1.jpg', 'secondary.jpg', 0, 'vegan, indian, mexican, carribean', '-0.440255', '36.948107', 'Farm House', 'We\'re open 24/7 Monday-friday &amp; till noon on weekends &amp; holidays', '8000', '500', '40', 'true'),
(2, 'Sir Moh', '0723942008', 'patiyang6@gmail@gmail.com', '$2y$10$TVyBgamFnQHODfjo/3C91.I6Xqgwokd6DpJLlfGd08SBfi.qJuc5W', 'Green Hills', 'PayUmoney1', 'east_delhi', 800, 'this is brief information about my cafe', 0, 'Snooker, Screen Projector, WIFI permises, Car Parking, gym', 'res2.jpg', 'secondary.jpg', 0, 'generic, spanish, chineese, african', '-1.279865', '36.822670', 'cafe', 'We\'re open 24/7 Monday-friday &amp; till noon on weekends &amp; holidays', '6000', '700', '80', 'false'),
(3, 'Peter Mwangi', '0723942009', 'test@gmail.com', '$2y$10$6ZnC1.AEDe6qxlBkXOuv6utf61WMF8gNTiMhLnO9vqq8rMu1FLAme', 'Sarova Hotel', 'PayUmoney2', 'north_delhi', 600, 'this is brief information about my cafe', 0, 'sauna, Screen Projector, WIFI permises, Swimming, massage', 'res3.jpg', 'secondary.jpg', 0, 'spanish, mexican, vegan, carribean', '-0.287059', '36.071477', 'villa', 'We\'re open 24/7 Monday-friday &amp; till noon on weekends &amp; holidays', '6700', '350', '70', 'true'),
(4, 'James Mwirigi', '0723942089', 'test1@gmail.com', '$2y$10$HK9UUuZsMObyazox5PH2..hT4UhSC1CKXV3BGqIcSXFjlKRR1FXXm', 'Inter-Continetal', 'PayUmoney3', 'south_delhi', 450, 'this is brief information about my cafe', 0, 'sauna, Screen Projector, wi-fi, Car Parking, Bike Parking, gym', 'res4.jpg', 'secondary.jpg', 0, 'indian, mexican, generic, vegan', '0.518279', '35.267238', 'lounge', 'We\'re open 24/7 Monday-friday', '4000', '200', '60', 'false'),
(5, 'Deborah Cherop', '0723942079', 'test2@gmail.com', '$2y$10$Kl4Nc9KSVfeiqND44MExVOA8.yxLPxuK.ICG6Vqo2kWO0JwTOq46u', 'Green Stadium', 'PayUmoney4', 'north_delhi', 3400, 'this is brief information about my cafe', 0, 'sauna, massage, wi-fi, Car Parking, Bike Parking', 'res5.jpg', 'secondary.jpg', 0, 'spanish, mexican, vegan, non-vegan, african', '-0.362868', '35.282775', 'Apartment', 'We\'re open 24/7 Monday-friday &amp; in the weekends as well', '2000', '80', '500', 'true');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) DEFAULT NULL,
  `user_mobile` varchar(150) DEFAULT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `user_img` varchar(300) DEFAULT NULL,
  `user_address` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `user_status` enum('0','1') DEFAULT NULL,
  `user_addon` datetime DEFAULT current_timestamp(),
  `user_about` varchar(1000) NOT NULL,
  `card_number` varchar(1000) NOT NULL,
  `card_expiry` varchar(1000) NOT NULL,
  `cvc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_mobile`, `user_email`, `user_img`, `user_address`, `password`, `user_status`, `user_addon`, `user_about`, `card_number`, `card_expiry`, `cvc`) VALUES
(1, '', '0723942008', '', '', '', '$2y$10$.l3GLwmrqsg49qo5N1Hp8ulvLhqx6UrMKYYKOq2oD449KpPp2IOQm', '0', '2020-10-11 17:37:15', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `placeDetails`
--
ALTER TABLE `placeDetails`
  ADD PRIMARY KEY (`cafe_id`),
  ADD UNIQUE KEY `owner_name` (`owner_name`,`owner_mob`,`owner_email`,`owner_upi`),
  ADD UNIQUE KEY `cafe_name` (`cafe_name`);

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
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_mobile` (`user_mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cuisine`
--
ALTER TABLE `cuisine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_list`
--
ALTER TABLE `image_list`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placeDetails`
--
ALTER TABLE `placeDetails`
  MODIFY `cafe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
