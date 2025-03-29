-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 07:19 AM
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
-- Database: `petty`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `accessoriescategory` varchar(255) NOT NULL,
  `Name_specific` varchar(255) NOT NULL,
  `accessoriespettype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`product_id`, `product_name`, `price`, `product_image`, `accessoriescategory`, `Name_specific`, `accessoriespettype`) VALUES
(1, 'Clicker', 9.99, 'img/accessories/clicker(cat).jpg', 'training-kits', 'Cat Training Kits', 'cat'),
(2, 'Silky Cat', 9.99, 'img/accessories/grooming(cat).jpg', 'wellness-products', 'Cat Wellness Products', 'cat'),
(3, 'Dog Carriers', 9.99, 'img/accessories/carrier(dog).jpg', 'carriers', 'Dog Carriers', 'dog'),
(4, 'Cat Bed', 9.99, 'img/accessories/bed(cat).jpg', 'beds', 'Cat Beds', 'cat'),
(5, 'Clicker', 9.99, 'img/accessories/clicker(dog).jpg', 'training-kits', 'Dog Training Kits', 'dog'),
(6, 'Cat Carriers', 9.99, 'img/accessories/carrier(cat).jpg', 'carriers', 'Cat Carriers', 'cat'),
(7, 'Cat Toys', 9.99, 'img/accessories/toys(cat).jpg', 'toys', 'Cat Toys', 'cat'),
(8, 'Weave poles', 9.99, 'img/accessories/Weave poles.jpg', 'training-kits', 'Cat Dog Rabbit training-kits', 'cat dog rabbit'),
(9, 'Rabbit Carriers', 9.99, 'img/accessories/carrier(rabbit).jpg', 'carriers', 'Rabbit Carriers', 'rabbit'),
(10, 'Oticbliss', 9.99, 'img/accessories/grooming(dog).jpg', 'wellness-products', 'Dog Wellness Products', 'dog'),
(11, 'Dog Bed', 9.99, 'img/accessories/bed(dog).jpg', 'beds', 'Dog Beds', 'dog'),
(12, 'Clicker', 9.99, 'img/accessories/clicker(rabbit).jpg', 'training-kits', 'Rabbit Training Kits', 'rabbit'),
(13, 'Aquariam', 9.99, 'img/accessories/aquarium.jpg', 'carriers', 'Fish Carriers', 'fish'),
(14, 'Dog Toys', 9.99, 'img/accessories/toys(dog).jpg', 'toys', 'Dog Toys', 'dog'),
(15, 'PURE and natural pet', 9.99, 'img/accessories/grooming(rabbit).jpg', 'wellness-products', 'Rabbit Wellness Products', 'rabbit'),
(16, 'Clicker', 9.99, 'img/accessories/clicker(bird).jpg', 'training-kits', 'Bird Training Kits', 'bird'),
(17, 'Bird Toys', 9.99, 'img/accessories/toys(bird).jpg', 'toys', 'Bird Toys', 'bird'),
(18, 'Bird Carriers', 9.99, 'img/accessories/carrier(bird).jpg', 'carriers', 'Bird Carriers', 'bird'),
(19, 'Rabbit Bed', 9.99, 'img/accessories/bed(rabbit).jpg', 'beds', 'Rabbit Beds', 'rabbit'),
(20, 'Mineral grit', 19.99, 'img/accessories/grooming(bird).jpg', 'wellness-products', 'Bird Wellness Products', 'bird'),
(21, 'rabbit', 29.99, 'img/accessories/clicker(bird).jpg', 'training-kit', 'Rabbit Training Kit', 'rabbit');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerSL` int(100) NOT NULL,
  `CustomerID` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `phone_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerSL`, `CustomerID`, `FirstName`, `LastName`, `Email`, `Password`, `Image`, `phone_number`) VALUES
(21, '', '', '', '', '', '', 0),
(1, '1', '1', '1', '1@gmail.com', '12', 'img/pic/HABIB.jpg', 0),
(8, 'ah7', 'Ah', 'ha', 'ah@gmail.com', '123456', 'Ahsan.jpg', 0),
(10, 'ah70', 'Ahs', 'hab', 'ah4@gmail.com', '90', 'HABIB.jpg', 0),
(16, 'c1', 'wert', 'efd', 'dafds@dfg.hgfd', 'sadsfdgf', 'demo cv 1.jpg', 0),
(19, 'DRH', 'JYJYJ', 'RSGRGRGRGRG', 'WDEE@KDFUBS.SGFBIFDG', '3243252', 'demo cv 1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpID` varchar(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PhoneNumber` int(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpID`, `Name`, `PhoneNumber`, `Email`, `Password`, `Image`) VALUES
('e1', 'Ahsan', 1317426848, 'ah@gmail.com', '123456', 'img/edit.png'),
('e3', 'ahsan', 2147483647, 'em@gmail.com', '9364394326', 'WhatsApp Image 2024-08-18 at 11.51.54_6fc90066.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_plans`
--

CREATE TABLE `exercise_plans` (
  `id` int(11) NOT NULL,
  `selected_package` varchar(255) NOT NULL,
  `pet_type` varchar(255) NOT NULL,
  `activity_level` varchar(255) NOT NULL,
  `exercise_time_from` time NOT NULL,
  `exercise_time_to` time NOT NULL,
  `special_notes` text DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feeding_criteria`
--

CREATE TABLE `feeding_criteria` (
  `id` int(11) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `dietary_preference` varchar(255) NOT NULL,
  `meal_plan` varchar(255) NOT NULL,
  `feeding_schedule` time NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `Name_specific` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `Quality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`product_id`, `product_name`, `price`, `product_image`, `category`, `Name_specific`, `type`, `Quality`) VALUES
(1, 'Royal Canin', 29.99, 'img/foodproduct/dogfood-1(can).webp', 'dog-food', 'Canned Dog Food', 'canned', 'premium'),
(2, 'Whisks', 39.99, 'img/foodproduct/catfood-4(dk).jpg', 'cat-food', 'Dry Kibble Cat Food', 'dry-kibble', 'basic'),
(3, 'ZuPreem Pure Fun', 25.99, 'img/foodproduct/birdfood-1.jpg', 'bird-food', 'Bird Food', ' -', 'basic'),
(4, 'Wardley', 49.99, 'img/foodproduct/fishfood(aq).jpg', 'fish-food', 'Fish Food', '-', 'basic'),
(5, 'Wild Harvest', 65.99, 'img/foodproduct/rabbitfood-2.jpg', 'rabbit-food', 'Rabbit Food', '-', 'basic'),
(6, 'Pedigree', 35.99, 'img/foodproduct/dogfood-2(can).webp', 'dog-food', 'Canned Dog Food', 'canned', 'basic'),
(7, 'Royal Canin', 75.99, 'img/foodproduct/catfood-1(can).jpg', 'cat-food', 'Canned Cat Food', 'canned', 'premium'),
(8, 'ZuPreem Fruitblend Flavor', 28.99, 'img/foodproduct/birdfood-2.jpg', 'bird-food', 'Bird Food', '-', 'basic'),
(9, 'My Little Lion', 35.99, 'img/foodproduct/catfood-2(can).jpg', 'cat-food', 'Canned Cat Food', 'canned', 'basic'),
(10, 'Canidae', 29.99, 'img/foodproduct/dogfood-3(can).webp', 'dog-food', 'Canned Dog Food', 'canned', 'basic'),
(11, 'Hill\'s Healthy Cuisin', 75.99, 'img/foodproduct/catfood-3(can).jpg', 'cat-food', 'Canned Cat Food', 'canned', 'premium'),
(12, 'Kaytee', 45.99, 'img/foodproduct/rabbitfood-1.jpg', 'rabbit-food', 'Rabbit Food', '-', 'basic'),
(13, 'Kibbles nBits ORIGINAL', 24.99, 'img/foodproduct/dogfood-4(dk).jpg', 'dog-food', 'Dry Kibble Dog Food', 'dry-kibble', 'basic'),
(14, 'Source Freeze Dried Chicken', 99.99, 'img/foodproduct/dogfood-6(fd).jpg', 'dog-food', 'Freeze Dried Dog Food', 'freeze-dried', 'premium'),
(15, 'Meow MIX', 75.99, 'img/foodproduct/catfood-5(dk).jpg', 'cat-food', 'Dry Kibble Cat Food', 'dry-kibble', 'premium'),
(16, 'Birdfood cake', 95.99, 'img/foodproduct/birdfood-3.jpg', 'bird-food', 'Canned Bird Food', 'canned', 'premium'),
(17, 'Kibbles nBits', 79.99, 'img/foodproduct/dogfood-5(dk).webp', 'dog-food', 'Dry Kibble Dog Food', 'dry-kibble', 'premium'),
(18, 'Orijen ORIGINAL', 135.99, 'img/foodproduct/catfood-6(fd).jpg', 'cat-food', 'Freeze Dried Cat Food', 'freeze-dried', 'premium'),
(19, 'Source Freeze Dried Salmon', 145.99, 'img/foodproduct/catfood-7(fd).jpg', 'cat-food', 'Freeze Dried Cat Food', 'freeze-dried', 'premium'),
(20, 'Stewart PRO-TREAT', 219.99, 'img/foodproduct/dogfood-7(fd).jpg', 'dog-food', 'Freeze Dried Canned Dog Food', 'canned freeze-dried', 'premium'),
(21, 'Royal Canin', 55.99, 'img/foodproduct/dogfood-9(hp).jpg', 'dog-food', 'High Protein Dog Food', 'high-protein', 'basic'),
(22, 'Instinct Ultimate Protein', 165.99, 'img/foodproduct/catfood-8(hp).jpg', 'cat-food', 'High Protein Cat Food', 'high-protein', 'premium'),
(23, 'Tropical Flakes', 149.99, 'img/foodproduct/fishfood(cd).jpg', 'fish-food', 'Canned Fish Food', 'canned', 'premium'),
(24, 'clean protein', 135.99, 'img/foodproduct/catfood-9(hp).jpg', 'cat-food', 'High Protein Cat Food', 'high-protein', 'premium'),
(25, 'Natural Balance', 69.99, 'img/foodproduct/dogfood-10(v).jpg', 'dog-food', 'Vegan Dog Food', 'vegan', 'basic'),
(26, 'OXBOW Organic', 165.99, 'img/foodproduct/rabbitfood-3.jpg', 'rabbit-food', 'Rabbit Food', '-', 'premium'),
(27, 'ONEPLANET', 135.99, 'img/foodproduct/catfood-10(v).jpg', 'cat-food', 'Vegan Cat Food', 'vegan', 'premium'),
(28, 'Dog CHOW', 29.99, 'img/foodproduct/dogfood-8(hp).jpg', 'dog-food', 'High Protein Canned Dog Food', 'high-protein', 'basic'),
(29, 'Fish Bits', 99.99, 'img/foodproduct/fishfood(hp).jpg', 'fish-food', 'High Protein Fish Food', 'high-protein', 'basic'),
(30, 'Rabbit food', 45.99, 'img/foodproduct/rabbitfood.jpg', 'rabbitfood', 'Rabbit Food', '-', 'basic');

-- --------------------------------------------------------

--
-- Table structure for table `grooming_services`
--

CREATE TABLE `grooming_services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `Name_specific` varchar(255) NOT NULL,
  `name_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`product_id`, `product_name`, `price`, `product_image`, `category`, `Name_specific`, `name_code`) VALUES
(1, 'Persian', 189.99, 'img/pet/Persian(cat).jpg', 'cat', 'Persian Cat', 'persian'),
(2, 'Labrador Retriever', 229.99, 'img/pet/Labrador Retriever(dog).jpg', 'dog', 'Labrador Retriever Dog', 'labrador-retriever'),
(3, 'Goldfish', 59.99, 'img/pet/Goldfish.jpg', 'fish', 'Goldfish Fish', 'goldfish'),
(4, 'Finch', 59.99, 'img/pet/Finch(bird).jpg', 'bird', 'Finch Bird', 'finch'),
(5, 'Canary', 59.99, 'img/pet/Canary(bird).jpg', 'bird', 'Canary Bird', 'canary'),
(6, 'Cockatoo', 59.99, 'img/pet/Cockatoo(bird).jpg', 'bird', 'Cockatoo Bird', 'cockatoo'),
(7, 'Budgerigar (Budgie)', 59.99, 'img/pet/Budgerigar(bird).jpg', 'bird', 'Budgerigar Bird', 'budgerigar'),
(8, 'British Shorthair', 179.99, 'img/pet/British Shorthair(cat).jpg', 'cat', 'British Shorthair Cat', 'british-shorthair'),
(9, 'Flemish Giant', 179.99, 'img/pet/Flemish-Giant(rabbit).jpg', 'rabbit', 'Flemish Giant Rabbit', 'flemish-giant'),
(10, 'Mini-Rex', 179.99, 'img/pet/Mini-Rex(rabbit).jpg', 'rabbit', 'Mini-Rex Rabbit', 'mini-rex'),
(11, 'Golden Retriever', 259.99, 'img/pet/Golden Retriever(dog).jpg', 'dog', 'Golden Retriever Dog', 'golden-retriever'),
(12, 'Discus', 69.99, 'img/pet/Discus(fish).jpg', 'fish', 'Discus Fish', 'discus'),
(13, 'Bengal', 149.99, 'img/pet/Bengal(cat).jpg', 'cat', 'Bengal Cat', 'bengal'),
(14, 'Bulldog', 199.99, 'img/pet/Bulldog.jpg', 'dog', 'Bulldog Dog', 'bulldog'),
(17, 'Scottish Fold', 159.99, 'img/pet/Scottish Fold(cat).jpg', 'cat', 'Scottish Fold Cat', 'scottish-fold'),
(18, 'Poodle', 169.99, 'img/pet/Poodle(dog).jpg', 'dog', 'Poodle Dog', 'poodle'),
(19, 'Munchkin', 159.99, 'img/pet/Munchkin(cat).jpg', 'cat', 'Munchkin Cat', 'munchkin'),
(20, 'Betta', 69.99, 'img/pet/Betta(fish).jpg', 'fish', 'Betta Fish', 'betta'),
(21, 'Yorkshire Terrier', 144.99, 'img/pet/Yorkshire Terrier(dog).jpg', 'dog', 'Yorkshire Terrier Dog', 'yorkshire-terrier'),
(22, ' dog', 299.99, 'img/pet/dog1.jpg', 'dog', 'Golden Retriever', 'golden-retriever');

-- --------------------------------------------------------

--
-- Table structure for table `pet_boarding_bookings`
--

CREATE TABLE `pet_boarding_bookings` (
  `id` int(11) NOT NULL,
  `plan_type` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_type` varchar(255) NOT NULL,
  `dietary_preference` varchar(255) NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_training_sessions`
--

CREATE TABLE `pet_training_sessions` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `pet_type` varchar(255) NOT NULL,
  `training_plan` varchar(255) NOT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time` time NOT NULL,
  `additional_comments` text DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `CustomerSL` (`CustomerSL`),
  ADD UNIQUE KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `exercise_plans`
--
ALTER TABLE `exercise_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeding_criteria`
--
ALTER TABLE `feeding_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `grooming_services`
--
ALTER TABLE `grooming_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pet_boarding_bookings`
--
ALTER TABLE `pet_boarding_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_training_sessions`
--
ALTER TABLE `pet_training_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerSL` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `exercise_plans`
--
ALTER TABLE `exercise_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feeding_criteria`
--
ALTER TABLE `feeding_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `grooming_services`
--
ALTER TABLE `grooming_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pet_boarding_bookings`
--
ALTER TABLE `pet_boarding_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_training_sessions`
--
ALTER TABLE `pet_training_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
