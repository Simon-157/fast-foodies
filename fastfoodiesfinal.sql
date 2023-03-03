-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2023 at 11:54 AM
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
-- Database: `fastfoodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `menu_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 2, 15, 2, '2023-02-27 06:04:45', '2023-02-27 06:04:45'),
(7, 2, 16, 1, '2023-02-27 06:04:45', '2023-02-27 06:04:45'),
(8, 2, 17, 3, '2023-02-27 06:04:45', '2023-02-27 06:04:45'),
(9, 2, 18, 2, '2023-02-27 06:04:45', '2023-02-27 06:04:45'),
(10, 2, 19, 1, '2023-02-27 06:04:45', '2023-02-27 06:04:45'),
(24, 1, 17, 1, '2023-02-27 22:21:57', '2023-02-27 22:21:57'),
(25, 1, 15, 1, '2023-02-27 22:22:06', '2023-02-27 22:22:06'),
(28, 1, 19, 1, '2023-02-27 22:22:50', '2023-02-27 22:22:50'),
(29, 1, 27, 1, '2023-02-28 10:59:10', '2023-02-28 10:59:10'),
(30, 1, 37, 1, '2023-02-28 15:55:19', '2023-02-28 15:55:19'),
(31, 1, 41, 1, '2023-02-28 15:57:57', '2023-02-28 15:57:57'),
(32, 1, 17, 1, '2023-03-02 18:01:50', '2023-03-02 18:01:50'),
(33, 1, 23, 1, '2023-03-02 18:30:21', '2023-03-02 18:30:21'),
(34, 17, 12, 1, '2023-03-03 08:26:46', '2023-03-03 08:26:46'),
(35, 17, 13, 1, '2023-03-03 08:26:51', '2023-03-03 08:26:51'),
(36, 17, 12, 1, '2023-03-03 08:26:54', '2023-03-03 08:26:54'),
(37, 17, 15, 1, '2023-03-03 08:27:01', '2023-03-03 08:27:01'),
(38, 17, 21, 1, '2023-03-03 08:27:07', '2023-03-03 08:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `food_imgUrl` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `restaurant_id`, `food_name`, `food_description`, `price`, `quantity`, `food_imgUrl`, `created_at`, `updated_at`) VALUES
(9, 1, 'Grilled Salmon', 'Freshly caught grilled salmon with mixed vegetables', '25.99', 10, 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(10, 1, 'Pesto Pasta', 'Penne pasta with homemade pesto sauce and cherry tomatoes', '15.99', 15, 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(11, 1, 'Classic Caesar Salad', 'Romaine lettuce, croutons, shaved parmesan cheese, and classic Caesar dressing', '12.99', 20, 'https://images.pexels.com/photos/699953/pexels-photo-699953.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(12, 1, 'New York Cheesecake', 'Classic creamy cheesecake with graham cracker crust', '8.99', 12, 'https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(13, 2, 'Kung Pao Chicken', 'Spicy stir-fry dish with chicken, peanuts, and vegetables', '18.99', 10, 'https://images.pexels.com/photos/1633578/pexels-photo-1633578.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(14, 2, 'Beef and Broccoli', 'Stir-fry dish with tender beef and broccoli in a savory sauce', '19.99', 10, 'https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(15, 2, 'Vegetable Fried Rice', 'Fluffy fried rice with mixed vegetables', '10.99', 20, 'https://images.pexels.com/photos/5768972/pexels-photo-5768972.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(16, 2, 'Fortune Cookies', 'Classic crispy cookies with fortunes inside', '2.99', 30, 'https://images.pexels.com/photos/15532964/pexels-photo-15532964.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(17, 3, 'Margherita Pizza', 'Classic pizza with tomato sauce, fresh mozzarella, and basil', '14.99', 8, 'https://images.pexels.com/photos/1337825/pexels-photo-1337825.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(18, 3, 'Pepperoni Pizza', 'Classic pizza with tomato sauce, pepperoni, and mozzarella cheese', '16.99', 10, 'https://images.pexels.com/photos/15476360/pexels-photo-15476360.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(19, 3, 'Caesar Salad', 'Classic Caesar salad with romaine lettuce, croutons, and parmesan cheese', '12.99', 15, 'https://images.pexels.com/photos/15476372/pexels-photo-15476372.jpeg?auto=compress&cs=tinysrgb&w', '2023-02-21 00:15:54', '2023-02-21 00:15:54'),
(20, 1, 'Grilled Salmon', 'Freshly caught grilled salmon with mixed vegetables', '25.99', 10, 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(21, 1, 'Pesto Pasta', 'Penne pasta with homemade pesto sauce and cherry tomatoes', '15.99', 15, 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(22, 1, 'Classic Caesar Salad', 'Romaine lettuce, croutons, shaved parmesan cheese, and classic Caesar dressing', '12.99', 20, 'https://images.pexels.com/photos/699953/pexels-photo-699953.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(23, 1, 'New York Cheesecake', 'Classic creamy cheesecake with graham cracker crust', '8.99', 12, 'https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(24, 2, 'Kung Pao Chicken', 'Spicy stir-fry dish with chicken, peanuts, and vegetables', '18.99', 10, 'https://images.pexels.com/photos/1633578/pexels-photo-1633578.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(25, 2, 'Beef and Broccoli', 'Stir-fry dish with tender beef and broccoli in a savory sauce', '19.99', 10, 'https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(26, 2, 'Vegetable Fried Rice', 'Fluffy fried rice with mixed vegetables', '10.99', 20, 'https://images.pexels.com/photos/5768972/pexels-photo-5768972.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(27, 2, 'Fortune Cookies', 'Classic crispy cookies with fortunes inside', '2.99', 30, 'https://images.pexels.com/photos/15532964/pexels-photo-15532964.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(28, 3, 'Margherita Pizza', 'Classic pizza with tomato sauce, fresh mozzarella, and basil', '14.99', 8, 'https://images.pexels.com/photos/1337825/pexels-photo-1337825.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(29, 3, 'Pepperoni Pizza', 'Classic pizza with tomato sauce, pepperoni, and mozzarella cheese', '16.99', 10, 'https://images.pexels.com/photos/15476360/pexels-photo-15476360.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(30, 3, 'Caesar Salad', 'Classic Caesar salad with romaine lettuce, croutons, and parmesan cheese', '12.99', 15, 'https://images.pexels.com/photos/15476372/pexels-photo-15476372.jpeg?auto=compress&cs=tinysrgb&w', '2023-02-21 00:17:36', '2023-02-21 00:17:36'),
(36, 10, 'Salmon Sashimi', 'Thinly sliced fresh salmon with PLantain', '15.00', 4, 'https://images.pexels.com/photos/1337825/pexels-photo-1337825.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:37', '2023-03-02 23:43:38'),
(37, 10, 'Tuna Sashimi', 'Thinly sliced fresh tuna', '17.99', 4, 'https://images.pexels.com/photos/15476360/pexels-photo-15476360.jpeg?auto=compress&cs=tinysrgb&w=400', '2023-02-21 00:17:37', '2023-02-21 00:17:37'),
(41, 10, 'Waakye', 'A ghanaian delicous meal', '89.00', 5, 'https://ucarecdn.com/2633a8fb-e45b-420e-8b2d-f93e6f17650b/', '2023-02-24 11:02:23', '2023-02-24 11:02:23'),
(43, 10, 'Jambalaya', 'A delicious nigerian food made with rice and vegetables', '74.00', 5, 'https://ucarecdn.com/522fd616-4f0e-48c6-8668-009f550b9921/', '2023-03-02 23:33:35', '2023-03-02 23:44:36'),
(44, 10, 'Pepper RIce', 'A continental foodie made with rice and pepper', '45.00', 8, 'https://ucarecdn.com/d413e4f4-1c3f-4e19-a955-82fe1a0d50c7/', '2023-03-03 07:44:02', '2023-03-03 07:44:02'),
(45, 10, 'Pepper Soup', 'A continental foodie made with rice and pepper', '85.00', 8, 'https://ucarecdn.com/d413e4f4-1c3f-4e19-a955-82fe1a0d50c7/', '2023-03-03 07:46:32', '2023-03-03 07:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity` int(11) DEFAULT 0,
  `food_imgUrl` text DEFAULT 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `restaurant_id`, `name`, `description`, `price`, `created_at`, `updated_at`, `quantity`, `food_imgUrl`) VALUES
(1, 1, 'Cheeseburger', 'Juicy beef patty with melted cheese', '9.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(2, 1, 'Fries', 'Crispy and golden fries', '3.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(3, 1, 'Milkshake', 'Creamy vanilla milkshake', '4.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(4, 2, 'Margherita Pizza', 'Classic pizza with tomato sauce and mozzarella cheese', '12.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(5, 2, 'Caesar Salad', 'Romaine lettuce with croutons, parmesan cheese and caesar dressing', '8.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(6, 2, 'Garlic Bread', 'Toasty garlic bread with a sprinkle of parsley', '3.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(7, 3, 'Chicken Tikka Masala', 'Grilled chicken in creamy tomato sauce', '14.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(8, 3, 'Naan Bread', 'Soft and fluffy bread', '2.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(9, 3, 'Samosa', 'Crispy pastry filled with spiced vegetables or meat', '5.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80'),
(10, 4, 'Sushi Roll', 'Assorted fresh fish and vegetables wrapped in rice and seaweed', '16.99', '2023-02-18 13:57:32', '2023-02-18 13:57:32', 0, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `status` enum('pending','confirmed','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `restaurant_id`, `menu_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'pending', '2023-02-21 14:31:02', '2023-02-21 14:31:02'),
(2, 1, 2, 2, 'pending', '2023-02-21 14:31:02', '2023-02-21 14:31:02'),
(3, 1, 3, 3, 'pending', '2023-02-21 14:31:02', '2023-02-21 14:31:02'),
(4, 1, 4, 4, 'pending', '2023-02-21 14:31:02', '2023-02-21 14:31:02'),
(5, 1, 5, 5, 'pending', '2023-02-21 14:31:02', '2023-02-21 14:31:02'),
(6, 1, 3, 1, 'pending', '2023-02-21 14:31:55', '2023-02-21 14:31:55'),
(7, 1, 1, 2, 'confirmed', '2023-02-21 14:31:55', '2023-02-21 14:31:55'),
(8, 1, 1, 3, 'pending', '2023-02-21 14:31:55', '2023-02-21 14:31:55'),
(9, 2, 4, 4, 'delivered', '2023-02-21 14:31:55', '2023-02-21 14:31:55'),
(10, 3, 5, 5, 'cancelled', '2023-02-21 14:31:55', '2023-02-21 14:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` enum('credit_card','debit_card','paypal','cash') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `amount`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 11, '40.00', 'credit_card', '2023-01-05 10:15:00', '2023-01-05 10:15:00'),
(2, 12, '50.00', 'debit_card', '2023-01-07 13:30:00', '2023-01-07 13:30:00'),
(3, 13, '100.00', 'paypal', '2023-01-12 09:45:00', '2023-01-12 09:45:00'),
(4, 14, '25.00', 'cash', '2023-01-18 16:20:00', '2023-01-18 16:20:00'),
(5, 15, '80.00', 'credit_card', '2023-01-23 11:00:00', '2023-01-23 11:00:00'),
(6, 16, '60.00', 'debit_card', '2023-02-02 15:45:00', '2023-02-02 15:45:00'),
(7, 17, '35.00', 'paypal', '2023-02-05 08:30:00', '2023-02-05 08:30:00'),
(8, 18, '15.00', 'cash', '2023-02-13 14:10:00', '2023-02-13 14:10:00'),
(9, 19, '70.00', 'credit_card', '2023-02-19 12:30:00', '2023-02-19 12:30:00'),
(10, 20, '55.00', 'debit_card', '2023-02-25 17:20:00', '2023-02-25 17:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `placed_orders`
--

CREATE TABLE `placed_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `status` enum('pending','confirmed','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placed_orders`
--

INSERT INTO `placed_orders` (`id`, `user_id`, `restaurant_id`, `menu_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 1, 10, 10, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(12, 2, 10, 11, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(13, 3, 10, 12, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(14, 4, 10, 13, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(15, 5, 10, 14, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(16, 1, 10, 15, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(17, 7, 10, 16, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(18, 1, 10, 17, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(19, 9, 10, 18, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33'),
(20, 1, 10, 19, 'pending', '2023-02-22 19:17:33', '2023-02-22 19:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL,
  `uniquecode` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_url` text DEFAULT 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `res_name`, `res_address`, `phone_number`, `res_email`, `uniquecode`, `created_at`, `updated_at`, `img_url`) VALUES
(1, 'Burger Joint', '123 Main St, Anytown USA', '555-1234', 'burgerjoint@example.com', 1001, '2023-02-18 13:57:32', '2023-02-18 13:57:32', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(2, 'Pizzeria', '456 First Ave, Anytown USA', '555-5678', 'pizzeria@example.com', 1002, '2023-02-18 13:57:32', '2023-02-18 13:57:32', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(3, 'Indian Restaurant', '789 Second St, Anytown USA', '555-9012', 'indianrestaurant@example.com', 1003, '2023-02-18 13:57:32', '2023-02-18 13:57:32', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(4, 'Sushi Bar', '012 Third Ave, Anytown USA', '555-3456', 'sushibar@example.com', 1004, '2023-02-18 13:57:32', '2023-02-18 13:57:32', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(5, 'Mexican Restaurant', '345 Fourth St, Anytown USA', '555-7890', 'mexicanrestaurant@example.com', 1005, '2023-02-18 13:57:32', '2023-02-18 13:57:32', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(6, 'ghgfahgf', 'feqhfiehi', '787879897', 'affshdfds@gmail.com', 75665, '2023-02-20 11:04:14', '2023-02-20 11:04:14', 'https://ucarecdn.com/e5f2cebc-f1f3-4f32-9540-b154561017e1/'),
(7, 'Big Ben', 'Ashesi, Hive', '05596845511', 'bigben@gmail.com', 41915, '2023-02-20 11:07:19', '2023-02-20 11:07:19', 'https://ucarecdn.com/01ea7b4a-87f7-4f28-b7bd-53cf1e2888fe/'),
(8, 'Munchies', 'Berekuso,covert', '4566987412', 'munchies@gmail.com', 85128, '2023-02-20 11:41:20', '2023-02-20 11:41:20', 'https://ucarecdn.com/56e30636-c885-424e-ba73-712352fb9ab9/'),
(9, 'Shata Eatery', 'Ksi, Overhead', '+235678941265', 'shat@gmail.com', 47856, '2023-02-20 11:44:35', '2023-02-20 11:44:35', 'https://ucarecdn.com/7ff6dd9b-d52f-4136-a8bb-143d9797d8a5/'),
(10, 'Big bos', 'Ashesi,Berekuso', '7894561235', 'bos@gmail.com', 24120, '2023-02-20 14:44:33', '2023-02-21 19:20:39', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(22, 'Simon\'s Eatery', 'Ashesi,Berekuso', '0552592929', 'boatengsimonjnr157@gmail.com', 32246, '2023-02-21 13:38:42', '2023-02-21 19:21:06', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(23, 'Big bos Eatery', 'Accra, Ashesi', '0552596598', 'big@gmail.com', 97999, '2023-02-21 17:07:46', '2023-02-21 19:20:51', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(24, 'Simon\'s Eatery 2', 'Ashesi,Berekuso', '0552592929', 'eatery@gmail.com', 95265, '2023-02-21 17:19:31', '2023-02-21 19:20:45', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(25, 'Simon\'s Eatery 2', 'Ashesi,Berekuso', '0552592929', 'eatery4@gmail.com', 26911, '2023-02-21 17:26:27', '2023-02-21 19:21:01', 'https://w7.pngwing.com/pngs/579/415/png-transparent-customer-relationship-management-sales-business-marketing-company-text-service-thumbnail.png'),
(26, 'Simon\'s Eatery', 'Ashesi,Berekuso', '0552592929', 'bos1@gmail.com', 80763, '2023-02-21 18:14:28', '2023-02-21 19:20:30', 'https://ucarecdn.com/71fe2fe6-93f3-45c3-b897-dba3941d0b03/'),
(27, 'Simon\'s Eatery', 'Ashesi,Berekuso', '0552592929', 'bos3@gmail.com', 97290, '2023-02-21 18:16:07', '2023-02-21 19:20:23', 'https://ucarecdn.com/71fe2fe6-93f3-45c3-b897-dba3941d0b03/'),
(28, 'Ben\'s Eatery', 'Ashesi,Berekuso', '0552592929', 'ben@gmail.com', 51371, '2023-02-21 18:26:04', '2023-02-21 19:20:19', 'https://ucarecdn.com/71fe2fe6-93f3-45c3-b897-dba3941d0b03/'),
(29, 'DBee Cafeteria', 'Tema, Accra', '0552592929', 'akwesi@gmail.com', 75822, '2023-02-21 18:29:33', '2023-02-21 19:20:10', 'https://ucarecdn.com/71fe2fe6-93f3-45c3-b897-dba3941d0b03/'),
(30, '', '', '', '', 70186, '2023-02-21 18:38:36', '2023-02-21 19:20:03', 'https://ucarecdn.com/71fe2fe6-93f3-45c3-b897-dba3941d0b03/'),
(31, 'James Eatery', 'Ashesi,Berekuso', '0552592929', 'james@gmail.com', 238, '2023-02-21 19:09:00', '2023-02-21 19:20:15', 'https://ucarecdn.com/71fe2fe6-93f3-45c3-b897-dba3941d0b03/'),
(32, 'Simon\'s Eatery', 'Ashesi,Berekuso', '0552592929', 'cafe2@gmail.com', 6550, '2023-02-21 19:19:20', '2023-02-21 19:19:20', 'https://ucarecdn.com/71fe2fe6-93f3-45c3-b897-dba3941d0b03/'),
(33, 'Simon\'s Eatery', 'Tema, Accra', '0552592929', 'boatengs157@gmail.com', 43919, '2023-02-21 19:24:14', '2023-02-21 19:24:14', 'https://ucarecdn.com/138188a4-a45f-4a56-836d-7dd25f89dc95/'),
(34, 'guyman eatery', 'Ashesi,Berekuso', '0552592929', 'guyman@gmail.com', 21458, '2023-02-21 19:36:27', '2023-02-21 19:36:27', 'https://ucarecdn.com/7ea78b86-1b2b-48b3-b185-ecfc97f4b606/'),
(35, 'Simon\'s Eatery', 'Ashesi,Berekuso', '7894561235', 'cafe10@gmail.com', 54785, '2023-02-21 19:39:25', '2023-02-21 19:39:25', 'https://ucarecdn.com/1cd1a478-c762-4bef-b5dc-986ac9de2555/'),
(36, 'Gimon\'s Cafeteria', 'Ashesi,Berekuso', '0552592929', 'gim@gmail.com', 12294, '2023-02-23 19:35:27', '2023-02-23 19:35:27', 'https://ucarecdn.com/be599310-e442-4e30-a4ee-dbcffebbd87e/'),
(37, 'Akorno', 'hbhfhef', '65646465464', 'akorno@gmail.com', 7356, '2023-02-24 11:07:11', '2023-02-24 11:07:11', ''),
(38, 'Hy', 'Knust, Kumasi', '77889995', 'hy@gmail.com', 21266, '2023-02-28 11:17:36', '2023-02-28 11:17:36', 'https://ucarecdn.com/d976110b-e8dc-451a-ada7-e09e46a86b29/'),
(39, 'Boateng\'s Eatery', '', '0552592920', 'bos54@gmail.com', 92515, '2023-02-28 11:25:17', '2023-02-28 11:25:17', 'https://ucarecdn.com/17dab73a-04bd-48c4-9900-f4bed3198c07/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `profileImg` varchar(255) DEFAULT 'https://i.pravatar.cc/75',
  `user_address` varchar(255) NOT NULL DEFAULT 'Accra Ghana',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `user_email`, `user_password`, `profileImg`, `user_address`, `created_at`, `updated_at`) VALUES
(1, 'Boateng', 'Simon Junior', 'boatengsimonjnr157@gmail.com', '$2y$10$hKXFuCY70iUZYKKWMdV92O5FID6hQhB85uj0tpk8CVSWluuiAHVFC', 'https://lh3.googleusercontent.com/a/AEdFTp6dqUo1a9Hglp2p9vnAbf_uUY4DxFgRjtgnkgrE=s96-c', 'Accra Ghana', '2023-02-18 13:58:28', '2023-02-18 13:58:28'),
(2, 'simon', 'owusu', 'owusu@gmail.com', '$2y$10$kikviWtIr/UdETSYumGLw.F2pnLmEftCC7AKWhkAvt0SO1bTYCviO', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-18 13:59:44', '2023-02-18 13:59:44'),
(3, 'simon', 'owusu', 'kumasi@gmail.com', '$2y$10$zQOp3gq.TgDElWfcjmBWHOFWALa0P35Kc7KYc8D..LP9Zf04rAnXy', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-20 15:09:35', '2023-02-20 15:09:35'),
(4, 'junior', 'simon', 'junior@gmail.com', '$2y$10$BvRqJ/.JFUKLEicWSrNOle5DEpMyWUPGE8WXi1k0lmNGSHNeAulL6', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-21 17:08:50', '2023-02-21 17:08:50'),
(5, 'owusu', 'owusu', 'bos@gmail.com', '$2y$10$.Tg5hmv508Wku19AIH0EdOIq9f6.R4XXReJCJW1zH/XWqrr5vAUNy', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-21 19:45:28', '2023-02-21 19:45:28'),
(6, '', '', '', '$2y$10$Z47Y0fEi60.Kji1L2NOgZ.wt.vLPXeubK0WS6hHwjiLlsUH.KshlS', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-21 19:51:42', '2023-02-21 19:51:42'),
(7, 'frehsip', 'nor', 'nor@gmail.com', '$2y$10$BiaqkDJemZGv1UfAMUkGMut0WC30gBnaTLB//BI89VrwsUolxJbq6', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-21 19:56:13', '2023-02-21 19:56:13'),
(8, 'simon', 'simon', 'sim45@gmail.com', '$2y$10$KG0uHFHZuwhBivOnEyg7Z.cgo2EQIw.sltEEw7O3ySjgSRvFDwXnK', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-21 19:58:38', '2023-02-21 19:58:38'),
(9, 'gordon', 'duku', 'gordon@gmail.com', '$2y$10$JahSG0V8PhYArUb4O.d6guCx.nG7Di2QGQjp.ydTQtHpXc/FnLblm', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-21 22:16:15', '2023-02-21 22:16:15'),
(10, 'ghf', '4fr', 'wa@gmail.com', '$2y$10$gOEPdmOsrYUKS6989F0c2.sBOoQhMI/g1Vqom.XklLwPceRJoPxPC', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-23 10:23:41', '2023-02-23 10:23:41'),
(11, 'ghgh', 'gh', 'gh@gmail.com', '$2y$10$x4L6EJVEqoA/vFRXAcK6GOXO4zxIXpE8Rd.vcVg6gTaM0zhwSn1ba', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-23 10:26:14', '2023-02-23 10:26:14'),
(12, 'gg', 'rf', 'rfrf@gmail.com', '$2y$10$eGj28N8R2tG8cqam.SfGJ.tDdJ6tyvg3YXEFHRgFyYVBy9ODKh6JG', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-23 10:26:44', '2023-02-23 10:26:44'),
(13, 'efd', 'efd', 'efd@gmail.com', '$2y$10$9WoZQSa83Gwa5AiwtxNgHeJCexfUxkvbZlfqRRCriAEwHHquE37qW', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-23 10:29:03', '2023-02-23 10:29:03'),
(14, 'junior', 'nor', 'gord@gmail.com', '$2y$10$DqigwVo63jyO4MqHFOZcuO8gg531nshLCez/R/RDVjt5pDL1uapVu', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-02-23 10:37:45', '2023-02-23 10:37:45'),
(17, 'Simon ', 'Boateng', 'simon2929@gmail.com', '$2y$10$nye9MIWqLy08c0Wy0w6X.uiaQID2BBxTqxsMrkH9bVl.clM2nlvL.', 'https://i.pravatar.cc/75', 'Accra Ghana', '2023-03-03 08:02:12', '2023-03-03 08:02:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`restaurant_id`,`menu_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `placed_orders`
--
ALTER TABLE `placed_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `res_email` (`res_email`),
  ADD UNIQUE KEY `uniquecode` (`uniquecode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_password` (`user_password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `placed_orders`
--
ALTER TABLE `placed_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `placed_orders`
--
ALTER TABLE `placed_orders`
  ADD CONSTRAINT `placed_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `placed_orders_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `placed_orders_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
