-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 05:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zafadostore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `category_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`, `parent_category_id`, `category_type`) VALUES
(17, 'samsung', '', NULL, NULL),
(18, 'xiaomi', 'xiaomi', NULL, NULL),
(26, 'acer', 'acer', NULL, NULL),
(28, 'gamingpc', 'Gaming PC!', NULL, NULL),
(38, 'HP', '', NULL, NULL),
(52, 'oppo', 'oppo', NULL, NULL),
(54, 'asus', 'asus', NULL, NULL),
(59, 'apple', '', NULL, NULL),
(87, 'lenovo', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `password`) VALUES
(2, 'Stevanel', 'Tangdibendon', 'vanelpepe@gmail.com', '+6281343432957', 'NBH', 'almendo2005'),
(104, 'Kurt', 'Schmidt', 'kurtschmidt66@gmail.com', '0821 9850 5634', 'Berlin, Germany', 'almendo2005'),
(170, 'Clay ', 'Langi', 'claystevelangi@gmail.com', '0813 4532 4515', 'Student Boarding House', 'almendo2005'),
(193, 'Almendo Gabriel', 'Tetelepta', 'almendo.071105@gmail.com', '+6282198505634', 'Ambon', 'almendo2005'),
(215, 'Farhan', 'Yanuar', 'f4rh4n1401@gmail.com', '+6282218238319', 'Cibinong', 'farhan123'),
(372, 'Gabriel', 'Tetelepta', 'zulfikar.ahmad12@yahoo.com', '+6285243252962', 'Ambon', '123'),
(799, 'muhammad', 'yanuar', 'Saul_goodman@gmail.com', '082218238319', 'Perumahan Bukit Asri Blok B3 No 16A Pabuaran Cibinong Bogor', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `product_id` int(11) NOT NULL,
  `in_stock` tinyint(1) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `in_stock`, `category_id`, `product_name`, `description`) VALUES
(4, 1, 0, '', ''),
(5, 2, 0, '', ''),
(16, 1, 0, '', ''),
(23, 1, 0, '', ''),
(27, 5, 0, '', ''),
(28, 0, 0, '', ''),
(33, 1, 0, '', ''),
(42, 0, 0, '', ''),
(43, 0, 0, '', ''),
(50, 0, 0, '', ''),
(53, 1, 0, '', ''),
(55, 0, 0, '', ''),
(56, 1, 0, '', ''),
(57, 1, 0, '', ''),
(58, 0, 0, '', ''),
(60, 0, 0, '', ''),
(63, 2, 0, '', ''),
(65, 0, 0, '', ''),
(67, 0, 0, '', ''),
(75, 2, 0, '', ''),
(76, 1, 0, '', ''),
(79, 3, 0, '', ''),
(80, 3, 0, '', ''),
(84, 0, 0, '', ''),
(85, 0, 0, '', ''),
(88, 2, 0, '', ''),
(92, 4, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `names` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `pfp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`names`, `description`, `pfp`) VALUES
('Almendo Gabriel Tetelepta', 'Information Technology - 001202200002', 'almendo'),
('Farhan Yanuar', 'Information Technology - 001202200033', 'farhannaise'),
('Zahid Robbani', 'Information Technology - 001202200157', 'zahid');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_total` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `shipping_address` varchar(200) DEFAULT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `order_total`, `status`, `shipping_address`, `product_id`, `product_name`, `price`) VALUES
(6, 799, '2023-04-09', '1.00', 'paid', 'Perumahan Bukit Asri Blok B3 No 16A Pabuaran Cibinong Bogor', 28, 'iPhone 12 Pro Max', NULL),
(26, 104, '2023-04-10', '1.00', 'paid', 'Berlin, Germany', 27, 'Xiaomi Redmi 9T', NULL),
(41, 215, '2023-04-10', '1.00', 'paid', 'Cibinong', 80, 'Lenovo Ideapad 3', NULL),
(60, 170, '2023-04-10', '1.00', 'paid', 'Student Boarding House', 42, 'Lenovo ThinkPad X1 Carbon', NULL),
(81, 170, '2023-04-10', '1.00', 'paid', 'Student Boarding House', 75, 'HP Laptop Spectre X360 14-ef0063TU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `payment_date`, `payment_amount`, `payment_method`, `transaction_id`) VALUES
(3, 26, '2023-04-10', '2200000.00', 'Credit Card', '97'),
(16, 6, '2023-04-09', '22000000.00', 'Credit Card', '63'),
(51, 60, '2023-04-10', '27000000.00', 'Credit Card', '64'),
(58, 81, '2023-04-10', '23299000.00', 'Credit Card', '6'),
(91, 41, '2023-04-10', '7000000.00', 'Credit Card', '57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `in_stock` tinyint(1) DEFAULT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `category_id`, `description`, `in_stock`, `image_name`) VALUES
(4, 'Acer Swift 3', '18500000.00', 26, 'A premium ultrabook that comes with a 14-inch Full HD display, Intel Core i7 processor, 16GB RAM, and a 1TB SSD', 1, 'acerswift3'),
(5, 'Asus VivoBook 15', '5000000.00', 54, 'A budget-friendly laptop that comes with a 15.6-inch Full HD display, Intel Core i3 processor, 4GB RAM, and a 1TB HDD', 2, 'asusvivobook15'),
(16, 'Asus ZenBook 14', '21000000.00', 54, 'A premium ultrabook that comes with a 14-inch Full HD display, Intel Core i7 processor, 16GB RAM, and a 1TB SSD. It also features an NVIDIA GeForce MX350 graphics card for light gaming.', 1, 'asuszenbook14'),
(23, 'HP Spectre x360 2-in-1 Laptop 14-ef0005TU', '28000000.00', 38, '12th Generation Intel® Core™ i7 processor Windows 11 Home Intel® Iris® Xᵉ Graphics 32 GB LPDDR4x-4266 MHz RAM (onboard) Weighs 1.36 kg', 1, 'spectreef'),
(27, 'Xiaomi Redmi 9T', '2200000.00', 18, 'The Xiaomi Redmi 9T is a budget phone that comes with a 6.53-inch IPS LCD display, a quad-camera setup, and a 6,000mAh battery with fast charging.', 3, 'xiaomiredmi9t'),
(28, 'iPhone 12 Pro Max', '22000000.00', 59, 'The iPhone 12 Pro Max is a high-end phone that features a 6.7-inch Super Retina XDR display, a triple-camera setup with LiDAR scanner, and a 3,687mAh battery with fast charging', 1, 'iphone12promax'),
(33, 'Lenovo Legion 5', '19000000.00', 87, 'A gaming laptop that comes with a 15.6-inch Full HD display, AMD Ryzen 7 processor, 16GB RAM, and a 512GB SSD. It also features an NVIDIA GeForce GTX 1650 graphics card for gaming performance', 0, 'lenovolegion5'),
(42, 'Lenovo ThinkPad X1 Carbon', '27000000.00', 87, 'A premium ultrabook designed for professionals. It features a 14-inch WQHD display, Intel Core i7 processor, 16GB RAM, and a 1TB SSD', 3, 'lenovothinkpadcarbonx1'),
(43, 'Asus ROG Zephyrus G14', '38000000.00', 54, 'A high-end gaming laptop that comes with a 14-inch Full HD display, AMD Ryzen 9 processor, 16GB RAM, and a 1TB SSD. It also features an NVIDIA GeForce RTX 3060 graphics card for high-end gaming performance', 0, 'asuszephyrusg14'),
(50, 'Samsung Galaxy A32', '3399000.00', 17, 'The Samsung Galaxy A32 is another mid-range phone that features a 6.4-inch Super AMOLED display, a quad-camera setup, and a 5,000mAh battery with fast charging. It also comes in 4G and 5G variants. In Indonesia, the 4G variant is priced at around Rp 3,399,000', 0, 'samsungglxa32'),
(53, 'Samsung Galaxy S21 Ultra', '18499000.00', 17, 'The Samsung Galaxy S21 Ultra is a high-end phone that features a 6.8-inch Dynamic AMOLED 2X display, a quad-camera setup with a 108MP primary sensor, and a 5,000mAh battery with fast charging. It also comes with 5G support. In Indonesia, the Galaxy S21 Ultra is priced at around Rp 18,499,000.', 1, 'samsungglxs21ultra'),
(55, 'HP Victus 16', '21000000.00', 38, 'Up to Intel® Core™ i7-13700HX (up to 5.0 GHz with Intel® Turbo Boost Technology\r\nUp to 120W TGP with NVIDIA® GeForce RTX™ 4070 Laptop GPU (8 GB GDDR6 dedicated)\r\nUp to QHD (2560 x 1440), 240 Hz, 3 ms response time, IPS display with Low Blue Light', 0, 'victushp'),
(56, 'Oppo Reno6 Z', '4299000.00', 52, 'The Oppo Reno6 Z is a mid-range phone that features a 6.43-inch AMOLED display, a quad-camera setup, and a 4,310mAh battery with fast charging', 2, 'opporeno6z'),
(57, 'Farhan Ambatukam', '12000000.00', 28, 'AMD Ryzen 5 5600X CPU, NVIDIA GeForce GTX 1660 Super GPU, 8GB DDR4 RAM, 512GB SATA SSD, air cooling, and a compact case.', 1, 'farhanelvis'),
(58, 'Acer Predator Helios 300', '25000000.00', 26, 'A gaming laptop that comes with a 15.6-inch Full HD display, Intel Core i7 processor, 16GB RAM, and a 1TB SSD. It also features an NVIDIA GeForce RTX 3060 graphics card for high-end gaming performance. It\'s priced at around IDR 25,000,000.', 0, 'acerhelios300'),
(60, 'Oppo A16', '1699000.00', 52, 'The Oppo A16 is another budget phone that comes with a 6.52-inch HD+ display, a triple-camera setup, and a 5,000mAh battery with fast charging', 0, 'oppoa16'),
(63, 'Xiaomi Poco X3 Pro', '3500000.00', 18, 'The Xiaomi Poco X3 Pro is another mid-range phone that features a 6.67-inch IPS LCD display, a quad-camera setup, and a 5,160mAh battery with fast charging', 2, 'xiaomipocox3pro'),
(65, 'iPhone 11', '11000000.00', 59, 'The iPhone 11 was released in 2019 and is still a popular model due to its features and price. It comes with a 6.1-inch Liquid Retina display, a dual-camera setup with night mode, and a 3,110mAh battery with fast charging.', 0, 'iphone11'),
(67, 'Der Gabriel', '45000000.00', 28, 'Intel Core i9-11900K CPU, NVIDIA GeForce RTX 3080 GPU, 32GB DDR4 RAM, 1TB NVMe SSD, liquid cooling, and a premium case. ', 0, 'zafadobrutal'),
(75, 'HP Laptop Spectre X360 14-ef0063TU', '23299000.00', 38, '12th Generation Intel® Core™ i5 processor Windows 11 Home Single Language 16 GB LPDDR4x-4266 MHz RAM (onboard) Weighs 1.36 kg', 1, 'hpspectrex360'),
(76, 'iPhone 13', '15000000.00', 59, 'The iPhone 13 is the latest flagship phone from Apple, featuring a 6.1-inch Super Retina XDR display, a dual-camera setup with night mode, and a 3,227mAh battery with fast charging.', 2, 'iphone13'),
(79, 'Samsung Galaxy A52', '4999000.00', 17, 'The Samsung Galaxy A52 is a mid-range phone that offers a 6.5-inch Super AMOLED display, a quad-camera setup, and a 4,500mAh battery with fast charging. It comes in 4G and 5G variants, with the latter being more expensive. In Indonesia, the 4G variant is priced at around Rp 4,999,000', 3, 'samsungglxa52'),
(80, 'Lenovo Ideapad 3', '7000000.00', 87, 'A budget-friendly laptop that comes with a 15.6-inch Full HD display, Intel Core i5 processor, 8GB RAM, and a 256GB SSD.', 0, 'lenovoideapad3'),
(84, 'Xiaomi Redmi Note 10', '3000000.00', 18, 'The Xiaomi Redmi Note 10 is a mid-range phone that comes with a 6.43-inch AMOLED display, a quad-camera setup, and a 5,000mAh battery with fast charging.', 0, 'xiaomiredminote10'),
(85, 'Chasseur De Zahid', '25000000.00', 28, 'AMD Ryzen 7 5800X CPU, NVIDIA GeForce RTX 3070 GPU, 16GB DDR4 RAM, 1TB SATA SSD, air cooling, and a mid-tower case', 0, 'chasseurzahid'),
(88, 'Acer Aspire 5', '5500000.00', 26, 'A budget-friendly laptop that comes with a 15.6-inch Full HD display, AMD Ryzen 3 processor, 4GB RAM, and a 1TB HDD', 2, 'acerinspire5'),
(92, 'Oppo A53', '2299000.00', 52, 'The Oppo A53 is a budget phone that comes with a 6.5-inch HD+ display, a triple-camera setup, and a 5,000mAh battery with fast charging.', 3, 'oppoa53');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `customer_id`, `rating`, `review_text`, `review_date`) VALUES
(0, 92, 215, 9, 'ASELOLE', '2023-04-08'),
(54, 80, 215, 10, 'Keren banh', '2023-04-10'),
(68, 42, 170, 10, 'Keren banh', '2023-04-10'),
(97, 92, 215, 10, 'farhan ambatukam', '2023-04-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
